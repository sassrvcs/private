<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Subscription;
use Stripe\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Addonservice;
use Stripe\Product;
use Stripe\Price;
use Illuminate\Support\Str;

class StripeController extends Controller
{
    /** Show embedded payment page */
    public function showPaymentForm()
    {
        $packages = Package::all();
        $addons   = Addonservice::all();

        return view('stripe.pay', compact('packages', 'addons'));
    }

    /** Create PaymentIntent + Subscriptions + return clientSecret */
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
    $currency = 'usd';
    $amount = 0;

    // Handle package
    if ($request->package_id) {
        $package = \App\Models\Package::findOrFail($request->package_id);
        $amount += (float) $package->package_price;
    }

    // Handle addons (multiple)
    if ($request->addons && is_array($request->addons)) {
        $addons = \App\Models\AddonService::whereIn('id', $request->addons)->get();

        foreach ($addons as $addon) {
            $amount += (float) $addon->price;
        }
    }

    // Convert to cents for Stripe
    $stripeAmount = intval($amount * 100);

        // 1. CUSTOMER
        $customer = Customer::create([
            'email' => $request->email,
            'name'  => $request->name,
        ]);

        $oneTimeAmounts = 0;

        /** Collect items */
        $items = [];

        // PACKAGE (one time)
        $package = Package::where('stripe_price_id', $request->package)->first();
        if ($package) {
            $oneTimeAmounts += $package->package_price * 100;
            $items[] = ['type' => 'one_time', 'price_id' => $package->stripe_price_id];
        }

        // ADD-ONS
        foreach ($request->addons ?? [] as $price_id) {
            $addon = \DB::table('add_on_services')->where('stripe_price_id', $price_id)->first();
            if (!$addon) continue;

            if ($addon->billing_type == 'one_time') {
                $oneTimeAmounts += $addon->price * 100;
                $items[] = ['type' => 'one_time', 'price_id' => $price_id];

            } else {
                // subscription
                $items[] = ['type' => 'subscription', 'price_id' => $price_id];
            }
        }

        /** CREATE PAYMENT INTENT ONLY FOR ONE-TIME ITEMS */
        $intent = null;
        if ($oneTimeAmounts > 0) {
            $intent = PaymentIntent::create([
                'amount'   => $oneTimeAmounts,
                'currency' => 'usd',
                'customer' => $customer->id,
                'automatic_payment_methods' => ['enabled' => true],
                'metadata' => [
                    'user_id' => $user->id,
                ]
            ]);
        }
        // dd($intent->toArray());
        /** CREATE SUBSCRIPTIONS (WITHOUT PAYMENT NOW) */
        $subscription_ids = [];
        foreach ($items as $i) {
            if ($i['type'] === 'subscription') {
                $subscription = Subscription::create([
                    'customer' => $customer->id,
                    'items'    => [
                        ['price' => $i['price_id']]
                    ],
                    'payment_behavior' => 'default_incomplete',
                    'expand' => ['latest_invoice.payment_intent'],
                ]);
                $subscription_ids[] = $subscription->id;
            }
        }

        /** SAVE TEMP ORDER BEFORE PAYMENT */
        /* $order = Order::create([
            // 'customer_email'   => $customer->email,
            'user_id'      => $customer->id,
            'package_price_id' => $req->package,
            'addons'           => json_encode($req->addons),
            'amount'           => $oneTimeAmounts,
            'subscriptions'    => json_encode($subscription_ids),
            'status'           => 'pending',
        ]); */
        $order = new \App\Models\Order();
        $order->user_id = $user->id;
        $order->cart_id = 1; // if you have cart logic, update accordingly
        $order->order_id = 'ORD-' . strtoupper(uniqid()); // internal order reference
        $order->payable_amount = $amount;
        $order->payment_mode = "online";
        $order->payment_status = "pending";
        $order->order_status = "pending";

        $order->stripe_customer_id = $customer->id;
        $order->payment_intent_id = $intent->id;
        $order->currency = $currency;

        $order->save();

        return response()->json([
            'clientSecret' => $intent->client_secret,
            'customer' => $customer->id,
            'order_id' => $order->id,
        ]);
    }


    /** WEBHOOK : finalize database after successful payment */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sig = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig, $secret
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        if ($event->type === 'payment_intent.succeeded') {
            $pi = $event->data->object;
            $order = Order::where('amount', $pi->amount)->where('status', 'pending')->first();

            if ($order) {
                $order->status = 'paid';
                $order->invoice_id = $pi->id;
                $order->save();
            }
        }

        return response('OK', 200);
    }

    //create product in stripe
    public function createProducts()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $created = [];

        // ✅ 1️⃣ ONE-TIME PRODUCT
        $productOneTime = Product::create([
            'name' => 'Company Name Registration Service',
        ]);

        $priceOneTime = Price::create([
            'product' => $productOneTime->id,
            'unit_amount' => 50 * 100, // $100
            'currency' => 'usd',
        ]);

        $created[] = [
            'type' => 'one_time',
            'product_id' => $productOneTime->id,
            'price_id' => $priceOneTime->id,
        ];

        // ✅ 2️⃣ MONTHLY SUBSCRIPTION PRODUCT
        $productMonthly = Product::create([
            'name' => 'Monthly Registration Service',
        ]);

        $priceMonthly = Price::create([
            'product' => $productMonthly->id,
            'unit_amount' => 19 * 100, // $29
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'month'
            ]
        ]);

        $created[] = [
            'type' => 'monthly',
            'product_id' => $productMonthly->id,
            'price_id' => $priceMonthly->id,
        ];

        // ✅ 3️⃣ YEARLY SUBSCRIPTION PRODUCT
        $productYearly = Product::create([
            'name' => 'Yearly Legal Technical Support',
        ]);

        $priceYearly = Price::create([
            'product' => $productYearly->id,
            'unit_amount' => 49 * 100, // $199
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'year'
            ]
        ]);

        $created[] = [
            'type' => 'yearly',
            'product_id' => $productYearly->id,
            'price_id' => $priceYearly->id,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Stripe products & prices created successfully',
            'data' => $created
        ]);
    }
    //fetch products from stripe
    public function syncFromStripe()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $products = Product::all(['limit' => 100]);

        if (empty($products->data)) {
            return response()->json([
                'status' => false,
                'message' => 'No products found in Stripe.'
            ]);
        }

        foreach ($products->data as $product) {

            $prices = Price::all([
                'product' => $product->id,
                'active'  => true,
            ]);

            foreach ($prices->data as $price) {

                $amount = $price->unit_amount / 100;
                $billingType = 'one_time';

                if ($price->type === 'recurring') {
                    if ($price->recurring->interval === 'month') {
                        $billingType = 'monthly';
                    } elseif ($price->recurring->interval === 'year') {
                        $billingType = 'yearly';
                    }
                }

                // ✅ RULE:
                // One-time products go into PACKAGES
                // Subscriptions go into ADD-ON SERVICES

                if ($billingType === 'one_time') {

                    Package::updateOrCreate(
                        [
                            'stripe_price_id' => $price->id
                        ],
                        [
                            'package_name' => $product->name,
                            'stripe_product_id' => $product->id,
                            'package_price' => $amount,
                            'package_type' => 'shares',
                            'description' => $product->description,
                        ]
                    );

                } else {

                    AddOnService::updateOrCreate(
                        [
                            'stripe_price_id' => $price->id
                        ],
                        [
                            'service_name' => $product->name,
                            'stripe_product_id' => $product->id,
                            'price' => $amount,
                            'billing_type' => $billingType,
                            'slug' => Str::slug($product->name),
                        ]
                    );

                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Stripe products synced successfully into Packages & Add-on Services tables.'
        ]);
    }
}
