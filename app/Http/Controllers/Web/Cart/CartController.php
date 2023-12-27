<?php

namespace App\Http\Controllers\Web\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartAcessRequest;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Cart\CartService;
use App\Services\CompanieSearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\Package\PackageService;


class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CompanieSearchService $companieSearchService,
        protected PackageService $packageService,

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

        if(auth()->check()) {
           // dd('!!!Authorised...');
           $this->cartService->addToCartViaSession($id);
        } else {
            // dd('!!!Show...');
            $this->cartService->addToCartViaSession($id);
        }
        // dd($data);
        if( isset($sessionCart) && count($sessionCart) >= 2){
            return redirect(route('review-company-package'));
        }else{
            return redirect(route('addon-services',['indx'=>'0']));
        }
    }

    public function update_cart_after($id,$index)
    {
        // dd($id);
        $sessionCart = Session::get('cart');
        $package = $this->packageService->getPackage($id);

        $sessionCart[$index]['price']           = $package->package_price;
        $sessionCart[$index]['package_id']      = $package->id;
        $sessionCart[$index]['company_name']      = $sessionCart[$index]['company_name'];
        $sessionCart[$index]['package_name']    = $package->package_name;
        $sessionCart[$index]['package_description']    = $package->description;
        $sessionCart[$index]['package_features'] =$package->features;
        $sessionCart[$index]['package_status']  = 1;
        $sessionCart[$index]['step_complete']   = 1;
        $sessionCart[$index]['addon_service'][] = [
            'price' => '4.99',
            'quantity' => 1,
            'service_id' => (int)100,
            'service_name' => 'Pre-Submission Review (we check your company details to avoid mistakes)',
            'service_status' => 1,
        ];

        Session::put('cart', $sessionCart);

        // if(auth()->check()) {
        //    // dd('!!!Authorised...');
        //    $this->cartService->addToCartViaSession($id,'package',$index);
        // } else {
        //     // dd('!!!Show...');
        //     $this->cartService->addToCartViaSession($id,'package',$index);
        // }
        // dd($data);
        if( isset($sessionCart) && count($sessionCart) >= 2){
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
