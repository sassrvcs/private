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
use App\Models\orderTransaction;

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
        //$updatedValue   = $this->cartService->searchAndUpdateCompany($request->validated());
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

        $order = $request->order;

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
        $order_details = Order::where('order_id',$request->query('orderID'))->first();
        //dd($order_details);
        $order_transaction = new orderTransaction;
        $order_transaction->order_id =$request->query('orderID');
        $order_transaction->status=$request->query('STATUS');
        $order_transaction->PAYID=$request->query('PAYID');
        $order_transaction->ACCEPTANCE=$request->query('ACCEPTANCE');
        $order_transaction->SHASIGN=$request->query('SHASIGN');
        $order_transaction->amount=null;
         $order_transaction->save();

        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);

        $xml = '<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope"
        xmlns:dsig="http://www.w3.org/2000/09/xmldsig#"
        xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <EnvelopeVersion />
        <Header>
            <MessageDetails>
                <Class>CompanyIncorporation</Class>
                <Qualifier>request</Qualifier>
                <TransactionID>'.$transaction_id.'</TransactionID>
                <GatewayTest>0</GatewayTest>
            </MessageDetails>
            <SenderDetails>
                <IDAuthentication>
                    <SenderID>7db721e60d22d2b868d5c975cb19a74b</SenderID>
                    <Authentication>
                        <Method>clear</Method>
                        <Value>658fd00434fdfb12569537cbc7205b4f</Value>
                    </Authentication>
                </IDAuthentication>
                <!-- <EmailAddress>contact@formationshunt.co.uk</EmailAddress> -->
            </SenderDetails>
        </Header>
        <GovTalkDetails>
            <Keys />
        </GovTalkDetails>
        <Body>
            <FormSubmission
                xmlns="http://xmlgw.companieshouse.gov.uk/Header"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
                <FormHeader>
                    <CompanyName>'.$order_details->company_name.'</CompanyName>
                    <PackageReference>4076</PackageReference>
                    <FormIdentifier>CompanyIncorporation</FormIdentifier>
                    <SubmissionNumber>'.$six_digit_random_number.'</SubmissionNumber>
                    <ContactName>Divyaba Harishchandrasinh</ContactName>
                    <ContactNumber>0744627777</ContactNumber>
                </FormHeader>
                <DateSigned>2023-08-09</DateSigned>
                <Form>
                    <CompanyIncorporation
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd"
                        xmlns="http://xmlgw.companieshouse.gov.uk">
                        <CompanyType>BYSHR</CompanyType>
                        <CountryOfIncorporation>EW</CountryOfIncorporation>
                        <RegisteredOfficeAddress>
                            <Premise>112</Premise>
                            <Street>Watford Road</Street>
                            <Thoroughfare>Wembley</Thoroughfare>
                            <PostTown>London</PostTown>
                            <Country>GBR</Country>
                            <Postcode>HA0 3HF</Postcode>
                        </RegisteredOfficeAddress>
                        <DataMemorandum>true</DataMemorandum>
                        <Articles>BYSHRMODEL</Articles>
                        <RestrictedArticles>false</RestrictedArticles>
                        <Appointment>
                            <ConsentToAct>true</ConsentToAct>
                            <Director>
                                <Person>
                                    <Title>Miss</Title>
                                    <Forename>Divyaba</Forename>
                                    <Surname>Harishchandrasinh</Surname>
                                    <ServiceAddress>
                                        <SameAsRegisteredOffice>true</SameAsRegisteredOffice>
                                    </ServiceAddress>
                                    <DOB>1970-05-23</DOB>
                                    <Nationality>British</Nationality>
                                    <Occupation>Director</Occupation>
                                    <CountryOfResidence>United Kingdom</CountryOfResidence>
                                    <ResidentialAddress>
                                        <Address>
                                            <Premise>112</Premise>
                                            <Street>Watford Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Greater London</PostTown>
                                            <Country>GBR</Country>
                                            <Postcode>HA0 3HF</Postcode>
                                        </Address>
                                    </ResidentialAddress>
                                </Person>
                            </Director>
                        </Appointment>
                        <PSCs>
                            <PSC>
                                <PSCNotification>
                                    <Individual>
                                        <Title></Title>
                                        <Forename>Divyaba</Forename>
                                        <Surname>Harishchandrasinh</Surname>
                                        <ServiceAddress>
                                            <SameAsRegisteredOffice>true</SameAsRegisteredOffice>
                                        </ServiceAddress>
                                        <DOB>1970-05-23</DOB>
                                        <Nationality>British</Nationality>
                                        <CountryOfResidence>United Kingdom</CountryOfResidence>
                                        <ResidentialAddress>
                                            <Address>
                                                <Premise>112</Premise>
                                                <Street>Watford Road</Street>
                                                <Thoroughfare>Wembley</Thoroughfare>
                                                <PostTown>Greater London</PostTown>
                                                <Country>GBR</Country>
                                                <Postcode>HA0 3HF</Postcode>
                                            </Address>
                                        </ResidentialAddress>
                                        <ConsentStatement>true</ConsentStatement>
                                    </Individual>
                                    <NatureOfControls>
                                        <NatureOfControl>SIGINFLUENCECONTROL</NatureOfControl>
                                    </NatureOfControls>
                                </PSCNotification>
                            </PSC>
                        </PSCs>
                        <StatementOfCapital>
                            <Capital>
                                <TotalAmountUnpaid>0</TotalAmountUnpaid>
                                <TotalNumberOfIssuedShares>1</TotalNumberOfIssuedShares>
                                <ShareCurrency>GBP</ShareCurrency>
                                <TotalAggregateNominalValue>1.00</TotalAggregateNominalValue>
                                <Shares>
                                    <ShareClass>Ordinary</ShareClass>
                                    <PrescribedParticulars>Each share is entitled to one vote in any circumstances. Each share has equal rights to dividends. Each share is entitled to participate in a distribution arising from a winding up of the company</PrescribedParticulars>
                                    <NumShares>1</NumShares>
                                    <AggregateNominalValue>1.00</AggregateNominalValue>
                                </Shares>
                            </Capital>
                        </StatementOfCapital>
                        <Subscribers>
                            <Person>
                                <Forename>Divyaba</Forename>
                                <Surname>Harishchandrasinh</Surname>
                            </Person>
                            <Address>
                                <Premise>112</Premise>
                                <Street>Watford Road</Street>
                                <Thoroughfare>Wembley</Thoroughfare>
                                <PostTown>Greater London</PostTown>
                                <Country>GBR</Country>
                                <Postcode>HA0 3HF</Postcode>
                            </Address>
                            <Authentication>
                                <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                <PersonalData>BUR</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>TEL</PersonalAttribute>
                                <PersonalData>111</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>MUM</PersonalAttribute>
                                <PersonalData>SUH</PersonalData>
                            </Authentication>
                            <Shares>
                                <ShareClass>Ordinary</ShareClass>
                                <NumShares>1</NumShares>
                                <AmountPaidDuePerShare>1</AmountPaidDuePerShare>
                                <AmountUnpaidPerShare>0</AmountUnpaidPerShare>
                                <ShareCurrency>GBP</ShareCurrency>
                                <ShareValue>1</ShareValue>
                            </Shares>
                            <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company and to take at least one share.</MemorandumStatement>
                        </Subscribers>
                        <Authoriser>
                            <Subscribers>
                                <Subscriber>
                                    <Person>
                                        <Forename>Divyaba</Forename>
                                        <Surname>Harishchandrasinh</Surname>
                                    </Person>
                                    <Authentication>
                                        <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                        <PersonalData>BUR</PersonalData>
                                    </Authentication>
                                    <Authentication>
                                        <PersonalAttribute>TEL</PersonalAttribute>
                                        <PersonalData>111</PersonalData>
                                    </Authentication>
                                    <Authentication>
                                        <PersonalAttribute>MUM</PersonalAttribute>
                                        <PersonalData>SUH</PersonalData>
                                    </Authentication>
                                </Subscriber>
                            </Subscribers>
                        </Authoriser>
                        <SameDay>false</SameDay>
                        <SameName>false</SameName>
                        <NameAuthorisation>false</NameAuthorisation>
                        <SICCodes>
                            <SICCode>96090</SICCode>
                        </SICCodes>
                    </CompanyIncorporation>
                </Form>
            </FormSubmission>
        </Body>
    </GovTalkMessage>';


       // dd($xml);


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

        //return view('frontend.checkout_steps.search_compant', compact('sessionCart'));
        return redirect(route('review-company-package'));
    }
}
