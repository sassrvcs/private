<?php

namespace App\Http\Controllers\Web\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartAcessRequest;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Cart\CartService;
use App\Services\CompanieSearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CompanieSearchService $companieSearchService
    ) { }

    /**
     * Update cart as per company mane and details.
     * @param CartAcessRequest
     */
    public function index(CartAcessRequest $request)
    {
        $searchText = $request->validated();
        $response = $this->companieSearchService->searchCompany($searchText['company_name']);

        if($response['message'] == CompanieSearchService::COMPANY_AVAILABLE) {
            $cart = $this->cartService->updateCart($request->validated());
            return $response;
        } else {
            return $response;
        }
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sessionCart = Session::get('cart');
        if (count($sessionCart) > 0) {
            $updated_sessioncart = [];
            foreach ($sessionCart as $key => $value) {
                if (isset($value['price'])) {
                   $updated_sessioncart[] = $value;
                }
            }
            $sessionCart = $updated_sessioncart;
        }
        if(auth()->check()) {
           // dd('!!!Authorised...');
           $this->cartService->addToCartViaSession($id);
        } else {
            // dd('!!!Show...');
            $this->cartService->addToCartViaSession($id);
        }
        // dd($data);
        if( isset($sessionCart) && count($sessionCart) >= 1){
            return redirect(route('review-company-package'));
        }else{
            return redirect(route('addon-services',['indx'=>'0']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->type);
        $cart_index = $request->indx;
        $response = $this->cartService->addToCartViaSession($id, $request->type, $cart_index);
        return $response;
    }

    public function updateCart(Request $request)
    {
        // dd($request->all());
        $response = $this->cartService->updateCartTable($request);
        return ['status' => 200, 'response' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = $this->cartService->removeAddonService($id, $request->indx);
        return $response;
        // ['message' => CompanieSearchService::COMPANY_AVAILABLE, 'search_text' => '', 'is_sensitive' => '', 'is_sensitive_word' => '']
    }
}
