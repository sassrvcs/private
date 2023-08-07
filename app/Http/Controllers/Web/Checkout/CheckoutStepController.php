<?php

namespace App\Http\Controllers\Web\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Addon\AddonService;
use App\Services\Cart\CartService;
use App\Services\Checkout\CheckoutService;
use App\Services\Country\CountryService;
use App\Services\Package\PackageService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutStepController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected AddonService $addonService,
        protected PackageService $packageService,
        protected CountryService $countryService,
        protected UserService $userService,
        protected CheckoutService $checkoutService
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
        $user = [];
        $sessionCart    = $this->cartService->getCartViaSession();
        $package        = $this->packageService->index(end($sessionCart)['package_name']);
        $countries      = $this->countryService->countryList();
        
        $package = $package[0] ?? '';

        if(auth()->user()) {
            $user = $this->userService->show(auth()->user()->id);
        }
        // dd($user);

        return view('frontend.checkout_steps.checkout', compact('sessionCart', 'package', 'countries', 'user'));
    }
    
    /**
     * Register a new customer from checkout
     * @param Request $request
     */
    public function checkoutCustomer(Request $request)
    {
        // dd(auth()->user());
        if (auth()->user()) {
            $checkout = $this->checkoutService->doCheckoutFinalStep($request, auth()->user());
            // dd($checkout);
            if ($checkout) {
                return redirect()->route('my-account');
            }
        }
    }
}