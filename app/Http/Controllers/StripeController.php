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
use Illuminate\Support\Facades\Log;

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
        Stripe::setApiKey(config('services.stripe.secret'));

        $cart = session('cart');

        if (empty($cart)) {
            return response()->json(['error' => 'Cart empty'], 400);
        }

        $total = 0;

        foreach ($cart as $item) {

            // Package
            $price = isset($item['price']) ? (float) $item['price'] : 0;
            $qty   = isset($item['quantity']) ? (int) $item['quantity'] : 1;

            $total += $price * $qty;

            // Add-ons
            if (!empty($item['addon_service'])) {
                foreach ($item['addon_service'] as $addon) {
                    $addonPrice = isset($addon['price']) ? (float) $addon['price'] : 0;
                    $addonQty   = isset($addon['quantity']) ? (int) $addon['quantity'] : 1;

                    $total += $addonPrice * $addonQty;
                }
            }
        }

        // Convert to cents
        $amountInCents = (int) round($total * 100);

        if ($amountInCents < 1) {
            return response()->json(['error' => 'Invalid payment amount'], 400);
        }

        try {

            $intent = PaymentIntent::create([
                'amount'   => $amountInCents,
                'currency' => 'gbp',
                'automatic_payment_methods' => ['enabled' => true],
                'metadata' => [
                    'company_name' => $cart[0]['company_name'] ?? '',
                    'package_id'   => $cart[0]['package_id'] ?? '',
                ],
            ]);

            return response()->json([
                'clientSecret' => $intent->client_secret
            ]);

        } catch (\Exception $e) {

            Log::error('Stripe PaymentIntent Error', [
                'message' => $e->getMessage(),
                'amount'  => $amountInCents,
            ]);

            return response()->json([
                'error' => 'Unable to initiate payment'
            ], 500);
        }
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

    public function paymentSuccess(Request $request)
    {
        // ✅ Save order here in DB if needed

        return response()->json([
            'message' => 'Payment successful'
        ]);
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
                    'unit_amount' => $service->price * 100,
                    'currency' => 'GBP',
                ]);
            } elseif($service->billing_type == 'monthly'){
                $priceMonthly = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $service->price * 100,
                    'currency' => 'gbp',
                    'recurring' => [
                        'interval' => 'month'
                    ]
                ]);
            } elseif($service->billing_type == 'yearly'){
                $priceYearly = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $service->price * 100,
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
