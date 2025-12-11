<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
// use Stripe\PaymentIntent;
use App\Models\User;
use App\Models\Addonservice;
use App\Models\Order;

class StripePayController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $services = Addonservice::all();

        return view('admin.payment.stripe_pay', compact('orders', 'services'));
    }

    // AJAX — Return Company Name
    public function orderDetails(Request $req)
    {
        $order = Order::find($req);

        return response()->json([
            'company_name' => $order->company_name ?? '',
        ]);
    }

    // Schedule Subscription
    public function schedule(Request $req)
    {
        $req->validate([
            'order_id' => 'required',
            'service_id' => 'required',
            'start_date' => 'required|date'
        ]);

        $order = Order::findOrFail($req->order_id);
        $service = Addonservice::findOrFail($req->service_id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customerId = $order->stripe_customer_id;

        if (!$service->stripe_price_id) {
            return back()->with('error', 'Service does not have a Stripe Price ID.');
        }

        $subscription = \Stripe\Subscription::create([
            'customer' => $customerId,
            'items' => [
                ['price' => $service->stripe_price_id],
            ],
            'billing_cycle_anchor' => strtotime($req->start_date),
            'proration_behavior' => 'none',
            'expand' => ['latest_invoice.payment_intent'],
        ]);

        return back()->with('success', 'Subscription scheduled successfully!');
    }
}
