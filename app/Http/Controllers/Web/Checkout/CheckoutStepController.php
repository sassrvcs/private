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
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

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
        $total_amount =0;
        // dump($sessionCart);
        $indx = $request->indx;
        return view('frontend.checkout_steps.addon_services', compact('sessionCart', 'addonServices','total_amount', 'indx'));
    }

    /**
     * Check user is authorised or not
     * @Checkout step -> 4
     */
    public function validateAuthentication(Request $request)
    {
        // dd($request);
        $order_id=null;
        $indx = $request->indx;

        if($request->query('order')){
            $checkout = Order::with('cart.package','cart.addonCartServices.service')->where('order_id',$request->query('order'))->first();
            // dd($checkout);
            $sessionCart =[];
            $package =$checkout->cart->package ?? [];
            $countries =[];
            $user = [];
            // dd($checkout);
            return view('frontend.checkout_steps.checkout', compact('sessionCart', 'package', 'countries', 'user','checkout'));
        }
        else{

            $user = [];
            $request        = (object) [];
            $totalPrice     = 0;
            $sessionCart    = $this->cartService->getCartViaSession();
            $package        = $this->packageService->index(end($sessionCart)['package_name']);
            $countries      = $this->countryService->countryList();

            $package = $package[0] ?? '';
            if(count($sessionCart) > 1) {
                foreach (end($sessionCart)['addon_service'] as $addonService) {
                    $totalPrice = $totalPrice + $addonService['price'];
                    // dump($addonService['price']);
                }
            } else {
                foreach ($sessionCart[0]['addon_service'] as $addonService) {
                    $totalPrice = $totalPrice + $addonService['price'];
                }
            }

            $request->total_amount = $totalPrice;

            if(auth()->user()) {
                $user = $this->userService->show(auth()->user()->id);
                $checkout = $this->checkoutService->doCheckoutFinalStep($request, auth()->user());
                return view('frontend.checkout_steps.checkout', compact('sessionCart', 'package', 'countries', 'user','checkout','indx'));
            }else{
                return view('frontend.checkout_steps.checkout', compact('sessionCart', 'package', 'countries', 'user', 'indx'));

            }

        }
    }

    /**
     * Register a new customer from checkout
     * @param Request $request
     */
    public function checkoutCustomer(Request $request)
    {
        // dd($request);
        // $validate = Validator::make($request->all(), [
        //     'title'             => 'required',
        //     'forename'          => 'required|alpha',
        //     'surname'           => 'required|alpha',
        //     // 'phone'             => 'required|numeric|digits_between:8,13',
        //     // 'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users',
        //     'post_code'         => 'required',
        //     'county'            => 'required',
        //     'house_no'          => 'required',
        //     'street'            => 'required',
        //     'town'              => 'required',
        //     'billing_country'   => 'required',
        // ],[
        //     'title.required'    => 'Title is required.',
        //     'forename.required' => 'Forename is required.',
        //     'surname.required'  => 'Surname is required.',
        //     // 'phone.required'    => 'Phone number is required.',
        //     // 'phone.required'    => 'Phone number is required.',
        //     'phone.numeric'     => 'Please enter valid phone number.',
        //     'county.required'   =>'This field is required.',
        //     'street.required'   =>'This field is required.',
        //     'town.required'     =>'This field is required.',
        //     'post_code.required'=>'This field is required.',
        //     'house_no.required' =>'This field is required.',
        //     'billing_country.required' =>'This field is required.',
        // ]);

        // if($validate->fails()) {
        //     return back()->withErrors($validate->errors())->withInput();
        // }

        // if (auth()->user()) {
        //     $checkout = $this->checkoutService->doCheckoutFinalStep($request, auth()->user());
        //     if ($checkout) {
        //         return redirect()->route('my-account')->with('success','Company has been registerd successfully');
        //     }
        // }
        return $this->paymentNow($request);
    }

    public function paymentNow(Request $request){
        // dd($request);
        if(isset($request->step) && $request->step == 'final_payment') {}
        $order = $request->order;

        $paymentUrl = "https://mdepayments.epdq.co.uk/ncol/test/orderstandard_utf8.asp"; // Barclays payment gateway URL
        $pspid = "epdq1638710";
        $shaInPasscode = "";
        $shaOutPasscode = "F&I4s97SdqEE(lDAaJ";
        $amount = $request->total_amount * 100;
        $currency = "GBP";
        $orderID = "ORDER12356".time();
        $formData = array(
            "PSPID" => $pspid,
            "orderID" => $order,
            "amount" => $amount,
            "currency" => $currency,
            "ACCEPTURL" => route('payment-success'),
            "DECLINEURL" => route('payment-declined'),
            "EXCEPTIONURL" => route('payment-exception'),
            "CANCELURL" => route('payment-cancelled')
        );

        ksort($formData);

        $shaString = "";
        foreach ($formData as $field => $value) {
            $shaString .= strtoupper($field) . "=" . $value . $shaOutPasscode;
        }

        $shaOutSignature = hash('sha512',$shaString);
        $formData["SHASIGN"] = $shaOutSignature;
        // dd($formData);
        return view('frontend.payment_getway.view', compact('formData', 'paymentUrl'));


    }

    public function paymentSuccess(Request $request){
        dd($request);
    }
    public function paymentDeclined(Request $request){
        dd($request);
    }
    public function paymentException(Request $request){
        dd($request);
    }
    public function paymentCancelled(Request $request){
        dd($request);
    }

    /**
     * Delete session cart item
     * @Checkout step -> 2
    */
    public function deleteCartItem(Request $request)
    {
        $session_indx = $request->indx;

        $sessionCart1 = Session::get('cart');
        /*foreach($sessionCart1 as $key => $sessionC){
            if ( $sessionC['company_name'] == $session_indx ) {
                echo $key;
                unset($sessionCart1[$key]);
            }
        }*/

        unset($sessionCart1[$session_indx]);

        Session::put('cart', $sessionCart1);

        $sessionCart = Session::get('cart');

        return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
    }
}
