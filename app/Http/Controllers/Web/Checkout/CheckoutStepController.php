<?php

namespace App\Http\Controllers\Web\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Mail\FinalSubmitMail;
use App\Services\Addon\AddonService;
use App\Services\Cart\CartService;
use App\Services\XMLCreation\GenerateXmlService;
use App\Services\Checkout\CheckoutService;
use App\Services\Country\CountryService;
use App\Services\Package\PackageService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\orderTransaction;
use Illuminate\Support\Str;
use App\Mail\MailWithAttachmentTest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Services\Invoice\InvoiceService;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use PDF;
use App\Models\Address;
use App\Models\Companie;
use Redirect;

class CheckoutStepController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected AddonService $addonService,
        protected PackageService $packageService,
        protected CountryService $countryService,
        protected UserService $userService,
        protected CheckoutService $checkoutService,
        protected GenerateXmlService $xmlService,
        protected InvoiceService $invoiceService,
        protected OrderService $orderService,
        protected CompanyFormService $companyFormService,
        protected BusinessEssentialsService $businessEssentialsService,

    ) { }

    /**
     * Review company name and selected package
     * @Checkout step -> 2
    */
    public function reviewCompanyPackage()
    {
        $sessionCart = Session::get('cart');

        // dd( $sessionCart );
        return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
    }

    /**
     * @checkout step -> 3
     * @param CheckoutStepRequest $request
     */
    public function addOnServices(CheckoutStepRequest $request)
    {
        //$updatedValue   = $this->cartService->searchAndUpdateCompany($request->validated());
        $sessionCart    = $this->cartService->getCartViaSession();

        $addonServices  = $this->addonService->index();

        $total_amount =0;
        // dump($sessionCart);
        $indx = $request->indx;
        // dd($sessionCart);
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
        if($request){

            $indx = $request->indx;
        }else{
            $indx = $request->query('indx');
        }

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
            $package        = $this->packageService->index($sessionCart[$indx]['package_name']);
            // dd($sessionCart);
            $countries      = $this->countryService->countryList();

            $package = $package[0] ?? '';

                foreach ($sessionCart[$indx]['addon_service'] as $addonService) {
                    $totalPrice = $totalPrice + $addonService['price'];
                    // dump($addonService['price']);
                }

            $request->total_amount = $totalPrice;
            $request->indx=$indx;
                // dd($sessionCart, $package,$indx);
            if(auth()->user()) {
                // dd($request);
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

        return $this->paymentNow($request);
    }

    public function paymentNow(Request $request){


        $order = $request->order.'/'.uniqid().Str::random(10);

        $paymentUrl = "https://mdepayments.epdq.co.uk/ncol/test/orderstandard_utf8.asp"; // Barclays payment gateway URL
        $pspid = "epdq1638710";
        $shaInPasscode = "";
        $shaOutPasscode = "F&I4s97SdqEE(lDAaJ";
        $amount = $request->total_amount *100;
        $currency = "GBP";
        // $orderID = "ORDER12356".time();
        $formData = array(
            "PSPID" => $pspid,
            "orderID" => $order,
            "amount" => $amount,
            "order" => $request->order,
            "currency" => $currency,
            "ACCEPTURL" => route('payment-success'),
            "DECLINEURL" => route('payment-declined'),
            "EXCEPTIONURL" => route('payment-exception'),
            "CANCELURL" => route('payment-cancelled')
        );

        ksort($formData);
        // dd($formData);
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
        // dd($request);
        $order_arr = explode('/',$request->query('orderID'));
        $order_id =$order_arr[0];

        $order_details = Order::where('order_id',$order_id)->first();

        $company = Companie::where('order_id',$order_id)->first();
        $order_transaction = new orderTransaction;
        if($company){
            $order_transaction->step = 1;

        }else{
            $order_transaction->step = 0;
        }
        $company->status = '1';
        $company->save();

        $order_transaction->order_id =$order_id;
        $order_transaction->uuid =$request->query('orderID');
        $order_transaction->status=$request->query('STATUS');
        $order_transaction->PAYID=$request->query('PAYID');
        $order_transaction->ACCEPTANCE=$request->query('ACCEPTANCE');
        $order_transaction->SHASIGN=$request->query('SHASIGN');
        $order_transaction->amount=null;
        $order_transaction->save();

        $filename = 'Invoice'.uniqid().Str::random(10).'.pdf';


        $name = auth()->user()->title.' '.auth()->user()->forename.' '.auth()->user()->surname;
        $pdf = $this->generatePdf($order_id);
        $filePath = storage_path('app/public/attachments/'.$filename);
        file_put_contents($filePath, $pdf );
        $content = ['name'=>$name,'pdf'=>$filePath,'order_id'=>$order_id];
        try {
           $status =  Mail::to(auth()->user()->email)->send(new FinalSubmitMail ($content));
        } catch (\Throwable $th) {
            throw $th;
        }


        return view('frontend.payment_getway.success');

    }

    public function paymentDeclined(Request $request){
                return view('frontend.payment_getway.declined');

    }
    public function paymentException(Request $request){
                return view('frontend.payment_getway.exception');

    }
    public function paymentCancelled(Request $request){
                return view('frontend.payment_getway.cancelled');

    }

    public function generatePdf($order_id)
    {
        $user = auth()->user();

        $order_id = $order_id;

        $order = $this->orderService->getOrder($order_id);

        $deliveryPartner = $this->companyFormService->getCompanieName( $order_id );

        $all_order = $this->businessEssentialsService->showOrder( $order_id );

        $transaction = $this->orderService->getOrderFinalTransaction($order_id);

        $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
            ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
            ->where('addresses.user_id', $user->id)
            ->where('addresses.address_type','billing_address')
            ->first();

        $net_total = 0;
        $total_vat =0;

        $data = [
            'order' => $order,
            'deliveryPartner' => $deliveryPartner,
            'user' => $user,
            'all_order' => $all_order,
            'net_total' => $net_total,
            'total_vat' => $total_vat,
            'transaction' => $transaction,
            'billing_address' => $billing_address
        ]; // Convert the model to an array

        $pdf = PDF::loadView('PDF.invoice', $data);
        $pdf->render();
        return $pdf->output();
        // return $pdf->download('_efilling.pdf');
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
        $sessionCart1 = array_values ($sessionCart1 );
        Session::put('cart', $sessionCart1);

        $sessionCart = Session::get('cart');

        // return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
        return Redirect::back();
    }
}
