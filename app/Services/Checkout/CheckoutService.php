<?php

namespace App\Services\Checkout;

// use App\Models\Addonservice;

use App\Models\AddonCartService;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    const NO_RESPONSE = 'Please try again.';

    /**
     * Submit the checkout request and create a new order with cart information
     * @param object $$addonServices
     * @param object $user
     * @return bool result
     */
    public function doCheckoutFinalStep($request, $user)
    {
        // dd($request);
        $order='';
        $sessionCart = Session::get('cart', []);

        return DB::transaction(function () use ($request, $user, $sessionCart,$order) {
            $addonServices = [];
            $cart = $sessionCart[$request->indx];
            
            $shoppingCart = ShoppingCart::create([
                'user_id'    => $user->id,
                'package_id' => $cart['package_id'] ?? '',
                'quantity'   => $cart['quantity'] ?? 1,
                'price'      => $request->total_amount,
            ]);

            // Create a new order in database with pending status
            if ($shoppingCart) {
               $order= Order::updateOrCreate([
                    'user_id'       => $user->id,
                    'company_name'  => $cart['company_name']
                ],[
                    'user_id'       => $user->id,
                    'cart_id'       => $shoppingCart->id,
                    'order_id'      => $this->generateOrderId(), // create random order id
                    'payable_amount'=> $request->total_amount,
                    'company_name'  => $cart['company_name'] ?? '',
                    'payment_mode'  => 'cod',
                    'payment_status'=> 'pending',
                    'order_status'  => 'pending'
                ]);
            }

            foreach($cart['addon_service'] as $addonService) {
                $addonServices[] = [
                    'cart_id'    => $shoppingCart->id,
                    'service_id' => $addonService['service_id'],
                ];
            }

            AddonCartService::insert($addonServices);

            return $order;
        });
    }

    /**
     * Generate a new order ID from this order
     * @return integer $orderId
     */
    private function generateOrderId()
    {
        $orderId = date('ims')-rand(10,99);
        return $orderId;
    }
}
