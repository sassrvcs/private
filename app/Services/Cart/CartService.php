<?php

namespace App\Services\Cart;

// use App\Models\Addonservice;

use App\Services\Addon\AddonService;
use App\Services\Package\PackageService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CartService
{
    const NO_RESPONSE = 'Please try again.';

    public function __construct(
        protected PackageService $packageService,
        protected AddonService $addonService
    ) { }
    
    /**
     * Add compamy in session variable || Cart section 1st step
     * @param string $companyName
     */
    public function addCompany($companyName, $updateParam = false)
    {
        $cart = Session::get('cart', []);
        Session::forget('cart');
        
        $cartItem = [
            'company_name' => $companyName,
        ];

        $cart[] = $cartItem;
        Session::put('cart', $cart);
    }

    /**
     * Update session cart as per company name
     * @param array $request
     */
    public function updateCart($request)
    {
        $cart = Session::get('cart', []);

        if( isset($cart[0]['company_name'])) {
            $cart[0]['company_name'] = $request['company_name'];
        }

        Session::put('cart', $cart);
    }

    /**
     * Search compant mane as per company name || Cart section 2nd step
     * @param  string  $searchText
     * @return 'messsge as per data'
     */
    public function addToCartViaSession($addedItemId, $type = 'package')
    {
        if ($type == 'package') {
            $package = $this->packageService->getPackage($addedItemId);
        
            // Get the cart from the session
            $cart = Session::get('cart', []);
            $cartItemCount = count($cart) -1;

            $existingCartItem = null;
            if($cartItemCount < 1) {
                foreach ($cart as $index => $cartItem) {
                    if (isset($cartItem['company_name']) && !empty($cartItem['company_name'])) {
                        $existingCartItem = $index;
                        break;
                    }
                }
            } else {
                $existingCartItem = $cartItemCount;
            }
        
            if ($existingCartItem !== null) {
                // Item already exists in the cart, update its quantity and price
                if (isset($cart[$existingCartItem]['quantity'])) {
                    $cart[$existingCartItem]['quantity'] += 1;
                } else {
                    // If 'quantity' key is not set, initialize it to 1
                    $cart[$existingCartItem]['quantity'] = 1;
                }

                $cart[$existingCartItem]['price']           = $package->package_price;
                $cart[$existingCartItem]['package_id']      = $package->id;
                $cart[$existingCartItem]['package_name']    = $package->package_name;
                $cart[$existingCartItem]['package_status']  = 1;
                $cart[$existingCartItem]['step_complete']   = 1;
                $cart[$existingCartItem]['addon_service'] = [];
            } else {

                $cartItem = [
                    'price'          => $package->package_price,
                    'quantity'       => 1,
                    'product_id'     => $package->id,
                    'package_name'   => $package->package_name,
                    'package_status' => 1,
                    'addon_service'  => []
                ];
        
                $cart[] = $cartItem;
            }
        
            // Save the updated cart back to the session
            Session::put('cart', $cart);
            // dd($cart);
            return true;
        }

        if($type == 'service') {
            // dd('Working....!');
            $this->updateAddonService($addedItemId);
        }
    }

    /**
     * Search and update data as per company name and price || || Cart section 3nd step
     * @param array $request
     */
    public function searchAndUpdateCompany($request)
    {
        $sessionCart = Session::get('cart', []);
        $updated = false;

        foreach ($sessionCart as &$cartItem) {
            if (isset($cartItem['company_name']) && $cartItem['company_name'] === $request['company_name'] && isset($cartItem['price']) && $cartItem['price'] === $request['pack_price']) {
                // Update the item's quantity or any other attribute you want to change
                $cartItem['step_complete'] = $request['checkout_step'];
                $updated = true;
                break;
            }
        }

        // If the item was not found in the session cart, add it as a new item
        // if (!$updated) {
        //     $cartItem = [
        //         'company_name' => $companyName,
        //         'price' => $price,
        //         'quantity' => 1,
        //     ];
        //     $sessionCart[] = $cartItem;
        // }

        Session::put('cart', $sessionCart);

        return $updated;
    }

    public function getCartViaSession()
    {
        $sessionCart = Session::get('cart');
        return $sessionCart;
    }

    /**
     * Update addon service
     */
    private function updateAddonService($service_id)
    {
        $service = $this->addonService->edit($service_id);
        // dd($service);

        // Get the cart from the session
        $cart = Session::get('cart', []);
        $cartItemCount = count($cart) -1;

        // dd($cart);
        $existingCartItem = null;
        if($cartItemCount < 1) {
            foreach ($cart as $index => $cartItem) {
                if (isset($cartItem['company_name']) && !empty($cartItem['company_name'])) {
                    $existingCartItem = $index;
                    break;
                }
            }
        } else {
            $existingCartItem = $cartItemCount;
        }

        if ($existingCartItem !== null) {

            // Check if the service with the same name already exists in the cart
            $existingService = null;
            foreach ($cart[$existingCartItem]['addon_service'] as $index => $addonService) {
                if ($addonService['service_name'] === $service->service_name) {
                    $existingService = $index;
                    break;
                }
            }

            if ($existingService !== null) {
                return false;
            } else {

                if (!isset($cart[$existingCartItem]['addon_service'])) {
                    // If the 'addon_service' key is not set, initialize it as an empty array
                    $cart[$existingCartItem]['addon_service'] = [];
                }
        
                // Add the new service to the 'addon_service' array
                $cart[$existingCartItem]['addon_service'][] = [
                    'price' => $service->price,
                    'quantity' => 1,
                    'service_id' => $service->id,
                    'service_name' => $service->service_name,
                    'service_status' => 1,
                ];
            }
        }

        // $cart[$existingCartItem]['addon_service'] = $cartItem;
        // Save the updated cart back to the session
        // dd($cart);

        Session::put('cart', $cart);
        return true;
    }


    /**
     * Remove service ID from session | cart
     * @param string $service_key_id
     */
    // public function removeAddonService($service_key_id)
    // {
    //     // Get the cart from the session
    //     $cart = Session::get('cart', []);
    //     // dd(end($cart)['addon_service']);
    //     if (isset(end($cart)['addon_service']) && is_array(end($cart)['addon_service'])) {
    //         // Debugging statement: Print the array before removing the element
    //         // dump(end($cart)['addon_service']);
    //         // $data = end($cart)['addon_service'];

    //         // dump($data);'
    //         // if(isset(end($cart)['addon_service'][$service_key_id])) {
    //             // unset(end($cart)['addon_service'][$service_key_id]);
    //             dump($service_key_id);
    //             $data = end($cart)['addon_service'];
    //             // dump(end($cart)['addon_service']);
    //             // dump($data);
    //             unset($data[$service_key_id]);

    //             // dd($data);

    //             Session::put('cart', $data);
    //             return true;
    //         // }

    //         // Debugging statement: Print the array after removing the element
    //         // dd(end($cart['addon_service']));
    //         // dd(end($cart)['addon_service']);
    //     }
    //     // dd('Stop');
    //     // Save the updated cart back to the session
        
    //     return false;
    // }
    
    public function removeAddonService($service_key_id)
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);
        // dd(end($cart)['addon_service']);
        if (isset(end($cart)['addon_service']) && is_array(end($cart)['addon_service'])) {
            
            dump($service_key_id);
            $data = end($cart)['addon_service'];
            
            unset($data[$service_key_id]);

            end($cart)['addon_service'] = $data;

            Session::put('cart', $cart);

            return true;
        }
        // dd('Stop');
        // Save the updated cart back to the session
        
        return false;
    }
}