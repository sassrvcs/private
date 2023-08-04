<?php

namespace App\Http\Controllers\Web\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Addon\AddonService;
use App\Services\Cart\CartService;
use App\Services\Country\CountryService;
use App\Services\Package\PackageService;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutStepController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected AddonService $addonService,
        protected PackageService $packageService,
        protected CountryService $countryService,
    ) { }

    /** 
     * Review company name and selected package
     * @Checkout step -> 2  
    */
    public function reviewCompanyPackage()
    {
        $sessionCart = Session::get('cart');
        // dump( $sessionCart );
        return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
    }

    /**
     * @checkout step -> 3
     * @param CheckoutStepRequest $request
     */
    public function addOnServices(CheckoutStepRequest $request)
    {
        $updatedValue   = $this->cartService->searchAndUpdateCompany($request->validated());
        $sessionCart    = $this->cartService->getCartViaSession();
        $addonServices  = $this->addonService->index();
        // dump($sessionCart);
        return view('frontend.checkout_steps.addon_services', compact('sessionCart', 'addonServices'));
    }

    /**
     * Check user is authorised or not
     * @Checkout step -> 4
     */
    public function validateAuthentication()
    {
        $sessionCart    = $this->cartService->getCartViaSession();
        $package        = $this->packageService->index(['name' => end($sessionCart)['package_name']]);
        $countries      = $this->countryService->countryList();
        
        $package = $package[0] ?? '';
        return view('frontend.checkout_steps.checkout', compact('sessionCart', 'package', 'countries'));
    }
    
    /**
     * Checks out final step
     * @Checkout step -> 5
     */
    public function checkoutFinal()
    {
        // $sessionCart    = $this->cartService->getCartViaSession();
        // dd($sessionCart);
    }
}