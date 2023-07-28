<?php

namespace App\Services\Cart;

use App\Services\Package\PackageService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CartService
{
    const NO_RESPONSE = 'Please try again.';

    public function __construct(protected PackageService $packageService)
    { }
    
    /**
     * Add compamy in session variable || Cart section 1st step
     * @param string $companyName
     */
    public function addCompany($companyName, $updateParam = false)
    {
        $cart = Session::get('cart', []);
        // Session::forget('cart');
        // die;
        foreach ($cart as $index => $cartItem) {
            if (isset($cartItem['company_name']) && !empty($cartItem['company_name']) && $cartItem['company_name'] != $companyName  && $updateParam == false) {
                // Delete Cart Session First And Re-Assign Data 

                $cartItem = [
                    'company_name' => $companyName,
                ];
            } else if (isset($cartItem['company_name']) && !empty($cartItem['company_name']) && $cartItem['company_name'] != $companyName && $updateParam == true) {
                $cart[$index]['company_name'] = $companyName;
                break;
            } else {
                $cartItem = [
                    'company_name' => $companyName,
                ];

                $cart[] = $cartItem;
            }
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
            } else {

                $cartItem = [
                    'price'          => $package->package_price,
                    'quantity'       => 1,
                    'product_id'     => $package->id,
                    'package_name'   => $package->package_name,
                    'package_status' => 1,
                ];
        
                $cart[] = $cartItem;
            }
        
            // Save the updated cart back to the session
            Session::put('cart', $cart);
            // dd($cart);
            return true;
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
}