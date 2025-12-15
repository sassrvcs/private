<?php

namespace App\Http\Controllers\Web\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Mail\CustomPaymentMail;
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
use App\Models\Custom_payment;
use App\Models\purchaseAddressCart;
use Redirect;
use DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
            
                // dd($sessionCart);
            if(auth()->user()) {
                // dd($request);
                $user = $this->userService->show(auth()->user()->id);
                $checkout = $this->checkoutService->doCheckoutFinalStep($request, auth()->user());
                $sessionCart[$indx]['order_id'] = $checkout->order_id;
                $sessionCart[$indx]['amount'] = $totalPrice;
                Session::put('cart', $sessionCart);
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

        $details = [
            'order_id' => $order,
            'total_amount' => $request->total_amount,
            'accept_url' => route('payment-success'),
        ];
        return $this->ProcessPayment($request,$details);

        // $paymentUrl = "https://mdepayments.epdq.co.uk/ncol/test/orderstandard_utf8.asp"; // Barclays payment gateway URL
        // $pspid = "epdq1638710";
        // $shaInPasscode = "";
        // $shaOutPasscode = "F&I4s97SdqEE(lDAaJ";
        // $amount = $request->total_amount *100;
        // $currency = "GBP";
        // // $orderID = "ORDER12356".time();
        // $formData = array(
        //     "PSPID" => $pspid,
        //     "orderID" => $order,
        //     "amount" => $amount,
        //     "order" => $request->order,
        //     "currency" => $currency,
        //     "ACCEPTURL" => route('payment-success'),
        //     "DECLINEURL" => route('payment-declined'),
        //     "EXCEPTIONURL" => route('payment-exception'),
        //     "CANCELURL" => route('payment-cancelled')
        // );

        // ksort($formData);
        // // dd($formData);
        // $shaString = "";
        // foreach ($formData as $field => $value) {
        //     $shaString .= strtoupper($field) . "=" . $value . $shaOutPasscode;
        // }

        // $shaOutSignature = hash('sha512',$shaString);
        // $formData["SHASIGN"] = $shaOutSignature;
        // // dd($formData);
        // return view('frontend.payment_getway.view', compact('formData', 'paymentUrl'));


    }

    public function servicePaymentNow(Request $request){
        //service payment
        $order = $request->order_id.'/'.uniqid().Str::random(10);
        $details = [
            'order_id' => $order,
            'total_amount' => $request->total_amount,
            'accept_url' => route('service-payment-success'),
        ];
        return $this->ProcessPayment($request,$details);
    }
    public function custom_payment(Request $request){

        $request->validate([
            'custom_payment_name'=>'required',
            'custom_payment_email'=>'required|email',
            'custom_payment_amount'=>'required|numeric|gt:0',
        ],[
            'custom_payment_name.required'=>'Name is required',
            'custom_payment_email.required'=>'Email is required',
            'custom_payment_amount.required'=>'Amount is required',
            'custom_payment_amount.gt' => 'The Amount field must be a positive value.',
        ]);

        //service payment
        $order_id = $this->generateCustomPayOrderID();
        $order = $order_id.'/'.uniqid().Str::random(10);
        $user_id= null;
        if (auth()->check()){
            $user_id= auth()->user()->id;
        }
        // dd($request->all());
        Custom_payment::create([
            'name'=>$request->custom_payment_name,
            'email'=>$request->custom_payment_email,
            'order_id' =>$order_id,
            'user_id' => $user_id,
            'amount' => $request->custom_payment_amount,
            'custom_payment_status'=>0,

        ]);
        $details = [
            'order_id' => $order,
            'total_amount' => $request->custom_payment_amount,
            'accept_url' => route('custom-payment-success'),
        ];
        return $this->ProcessPayment($request,$details);
    }
    //DON'T TOUCH THIS PROCESSPAYMENT FUNCTION WITHOUT PROPER KT
    public function ProcessPayment(Request $request,$details){

        // dd($request);
        /* $payment_mode = env('PAYMENT_ENV','LIVE');
        if ($payment_mode!='TEST'){
            $paymentUrl = env('LIVE_PAYMENT_URL',);
            $shaOutPasscode = env('LIVE_SHAOUTPASSCODE');
            $pspid = env('LIVE_PSPID');
        }else{
            $paymentUrl = env('TEST_PAYMENT_URL');
            $pspid = env('TEST_PSPID');
            $shaOutPasscode = env('TEST_SHAOUTPASSCODE');
        }
        $order = $details['order_id'];
        $shaInPasscode = "";
        $amount = $details['total_amount'] *100;
        $currency = "GBP";
        // $orderID = "ORDER12356".time();
        $formData = array(
            "PSPID" => $pspid,
            "ORDERID" => $order,
            "AMOUNT" => $amount,
            "CURRENCY" => $currency,
            "LANGUAGE" => "en_US",
            "ACCEPTURL" => $details['accept_url'],
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
        return view('frontend.payment_getway.view', compact('formData', 'paymentUrl')); */
        return view('frontend.payment_getway.view'); 
    }


    public function paymentSuccess(Request $request){
        // dd($request);
        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntentId = $request->query('payment_intent');
        $intent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

        $order_id = $intent->metadata->order_id;
        $amount = $intent->amount;

        $order_details = Order::where('order_id',$order_id)->first();

        $company = Companie::where('order_id',$order_id)->first();
        $exist_order = orderTransaction::where('PAYID',$request->query('PAYID'))->first();
        if(!$exist_order){
            $order_transaction = new orderTransaction;
            if($company){
                $order_transaction->step = 1;
                $company->status = '1';
                $company->save();
            }else{
                $order_transaction->step = 0;
            }

            $order_transaction->order_id =$order_id;
            $order_transaction->uuid =$order_id;
            /* $order_transaction->status=$request->query('STATUS');
            $order_transaction->PAYID=$request->query('PAYID');
            $order_transaction->ACCEPTANCE=$request->query('ACCEPTANCE');
            $order_transaction->SHASIGN=$request->query('SHASIGN'); */
            $order_transaction->amount=$amount;
            $order_transaction->save();

            if ($intent->redirect_status == 'succeeded') {
                Order::where('order_id', $order_id)->update([
                    'payment_status' => 'paid',
                    'order_status' => 'progress'
                ]);
            }
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
        $purchased_company_addresses = purchaseAddressCart::where('order_id',$order_id)->whereIn('address_type',['registered_address','business_address'])->get();
        $purchased_appointment_addresses = purchaseAddressCart::where('order_id',$order_id)->where('address_type','appointment_address')->select(DB::raw('SUM(price) as total_sum'), DB::raw('COUNT(*) as qnt'))->get();
        $total_purchased_address_amount = purchaseAddressCart::where('order_id',$order_id)->sum('price');
        if ($total_purchased_address_amount==null) {
            $total_purchased_address_amount=0;
        }
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
            'billing_address' => $billing_address,
            'purchased_company_addresses' => $purchased_company_addresses,
            'purchased_appointment_addresses' => $purchased_appointment_addresses,
            'total_purchased_address_amount' => $total_purchased_address_amount
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
    public function custom_payment_success(Request $request)
    {
        $order_arr = explode('/',$request->query('orderID'));
        $order_id =$order_arr[0];

        $order_transaction = Custom_payment::where('order_id',$order_id)->first();

        if ($order_transaction) {
            if($order_transaction->custom_payment_status==0)
            {
           $update =  Custom_payment::where('order_id',$order_id)->update([
                'uuid' =>$request->query('orderID'),
                'status'=>$request->query('STATUS'),
                'PAYID'=>$request->query('PAYID'),
                'ACCEPTANCE'=>$request->query('ACCEPTANCE'),
                'SHASIGN'=>$request->query('SHASIGN'),
                'custom_payment_status'=>1

            ]);
            }
            // if ($update) {
                // $userDetails = (Auth::user());
                // $filename = 'Invoice'.uniqid().Str::random(10).'.pdf';

                // $name = "Myname";
                // $pdf = $this->purchasedServiceInvoice($id=null,$order_transaction->id);
                // $filePath = storage_path('app/public/attachments/'.$filename);
                // file_put_contents($filePath, $pdf );
                // // dd($filePath);
                try {
                    $user_mail = ['name'=>$order_transaction->name,'refId'=>$request->query('PAYID'),'amount'=>$order_transaction->amount];
                    $admin_mail = ['name'=>'Admin','refId'=>$request->query('PAYID'),'amount'=>$order_transaction->amount];
                    // $status =  Mail::to('debasish.ghosh@technoexponent.co.in')->send(new ServicePurchaseMail ($order_transaction,$userDetails,$filePath));
                    $status =  Mail::to($order_transaction->email)->send(new CustomPaymentMail ($user_mail));
                    $status =  Mail::to('contact@formationshunt.co.uk')->send(new CustomPaymentMail ($admin_mail));

                 } catch (\Throwable $th) {
                    //  throw $th;
                 }
                return view('frontend.payment_getway.success');

            // }else{
            //     echo "problem occur,please contact admin";
            // }
        }




    }
    public function generateCustomPayOrderID()
    {
        // $orderId = date('ims')-rand(10,99);
       list($usec, $sec) = explode(" ", microtime());
        $id =  ($usec+$sec);
        $id = explode(".", $id);
        $orderId = @$id[0].@$id[1];
        $dupOrder = Custom_payment::where('order_id', $orderId)->first();
        if ($dupOrder) {
            $this->generateCustomPayOrderID();
        }
        return $orderId;
    }
}
