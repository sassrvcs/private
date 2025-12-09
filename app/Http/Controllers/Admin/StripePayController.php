<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\User;
use App\Models\Addonservice;
use App\Models\Order;

class StripePayController extends Controller
{
    public function index()
    {
        return view('admin.payment.stripe_pay', [
            'customers' => User::all(),
            'orders' => Order::all(),
            'services'  => Addonservice::all(),
        ]);
    }

    public function createIntent(Request $request)
    {
        $service = Addonservice::find($request->service_id);

        if ($service->amount < 0.50) {
            return back()->with('error', 'Stripe requires minimum $0.50 charge in USD.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // ✅ Create or reuse Stripe Customer
        /* if ($request->stripe_customer_id) {
            $customerId = $request->stripe_customer_id;
        } else {
            $customer = Customer::create([
                'email' => $request->email ?? 'guest@test.com',
            ]);
            $customerId = $customer->id;
        } */

            $customerId = 'cus_TZ7VGhKus5rCPm';

        $intent = PaymentIntent::create([
            'amount' => $service->amount * 100,
            'currency' => 'usd',
            'metadata' => [
                'user_id' => $request->user_id,
                'service_id' => $service->id,
                'billing_type' => $service->billing_type,
            ],
        ]);
        dd($intent);
        return view('admin.stripe_pay', [
            'customers' => User::all(),
            'services' => Service::all(),
            'clientSecret' => $intent->client_secret
        ]);
    }


    public function complete(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntentId = $request->payment_intent_id;

        $intent = PaymentIntent::retrieve($paymentIntentId);

        // Save order
        Order::create([
            'user_id'            => $intent->metadata->user_id,
            'service_id'         => $intent->metadata->service_id,
            'billing_type'       => $intent->metadata->billing_type,
            'amount'             => $intent->amount_received / 100,
            'payment_intent_id'  => $intent->id,
            'stripe_customer_id' => $intent->customer,
            'status'             => 'paid',
        ]);

        return response()->json(['success' => true]);
    }
}
