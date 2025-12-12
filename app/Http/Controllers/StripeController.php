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
use App\Models\ShoppingCart;

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
            $package = Package::findOrFail($request->package_id);
            $amount += (float) $package->package_price;
        }

        // Handle addons (multiple)
        if ($request->addons && is_array($request->addons)) {
            $addons = Addonservice::whereIn('id', $request->addons)->get();

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

        $cart = ShoppingCart::firstOrCreate(
            [
                'user_id' => $user->id
            ], 
            [
                'package_id' => $package->id
            ]
        );
        //create order
        $order = new \App\Models\Order();
        $order->user_id = $user->id;
        $order->cart_id = $cart->id; // if you have cart logic, update accordingly
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

        $services = Addonservice::all();
        foreach($services as $service){
            $product = Product::create([
                'name' => $service->service_name,
            ]);
            if($service->billing_type == 'one_time'){
                $priceOneTime = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $service->price,
                    'currency' => 'GBP',
                ]);
            } elseif($service->billing_type == 'monthly'){
                $priceMonthly = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $service->price,
                    'currency' => 'gbp',
                    'recurring' => [
                        'interval' => 'month'
                    ]
                ]);
            } elseif($service->billing_type == 'yearly'){
                $priceYearly = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $service->price,
                    'currency' => 'gbp',
                    'recurring' => [
                        'interval' => 'year'
                    ]
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Stripe products & prices created successfully'
        ]);
    }
    //fetch products from stripe
   public function syncFromStripe()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $allProducts = [];
        $startingAfter = null;

        // 🔄 Fetch ALL products using pagination
        do {
            $params = ['limit' => 100];
            if (!empty($startingAfter)) {
                $params['starting_after'] = $startingAfter;
            }

            $response = Product::all($params);
            $batch = $response->data;

            if (!empty($batch)) {
                $allProducts = array_merge($allProducts, $batch);
                $startingAfter = end($batch)->id;
            }

        } while ($response->has_more);

        if (empty($allProducts)) {
            return response()->json([
                'status' => false,
                'message' => 'No products found in Stripe.'
            ]);
        }

        foreach ($allProducts as $product) {

            // 🔄 Fetch all prices for this product
            $prices = Price::all([
                'product' => $product->id,
                'limit'   => 100,
            ]);

            foreach ($prices->data as $price) {

                $amount = $price->unit_amount / 100;

                // Detect billing type
                $billingType = 'one_time';

                if (isset($price->recurring)) {
                    if ($price->recurring->interval === 'month') {
                        $billingType = 'monthly';
                    } elseif ($price->recurring->interval === 'year') {
                        $billingType = 'yearly';
                    }
                }

                // 🔥 HERE: Always update ONLY add_on_services table
                Addonservice::updateOrCreate(
                    [
                        'service_name'     => $product->name,
                    ],
                    [
                        'service_name'     => $product->name,
                        'stripe_price_id'  => $price->id,
                        'stripe_product_id' => $product->id,
                        'price'            => $amount,
                        'billing_type'     => $billingType,
                        'slug'             => Str::slug($product->name)
                    ]
                );
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'All Stripe products synced successfully into Add-on Services.'
        ]);
    }

}
