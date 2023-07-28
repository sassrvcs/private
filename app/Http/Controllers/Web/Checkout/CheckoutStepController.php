<?php

namespace App\Http\Controllers\Web\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Cart\CartService;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutStepController extends Controller
{
    public function __construct(protected CartService $cartService)
    { }

    /** 
     * Review company name and selected package
     * @Checkout step -> 2  
    */
    public function reviewCompanyPackage()
    {
        $sessionCart = Session::get('cart');
        return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
    }

    /**
     * 
     * @param CheckoutStepRequest $request
     */
    public function addOnServices(CheckoutStepRequest $request)
    {
        $updatedValue = $this->cartService->searchAndUpdateCompany($request->validated());
        // if($updatedValue == true) {
        // }
        $sessionCart = $this->cartService->getCartViaSession();
        return view('frontend.checkout_steps.addon_services', compact('sessionCart'));
    }
}
