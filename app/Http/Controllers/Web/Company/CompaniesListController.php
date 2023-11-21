<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;
use App\Models\Address;
use App\Models\Companie;
use App\Models\companyXmlDetail;
use App\Models\Country;
use App\Models\Purchase_address;
use App\Models\Order;
use App\Models\Package;
use App\Models\Jurisdiction;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Str;
use App\Services\XMLCreation\GenerateXmlService;

class CompaniesListController extends Controller
{
    public  function __construct(
        protected UserService $userService,
        protected CompanyFormService $companyFormService,
        protected OrderService $orderService,
        protected GenerateXmlService $xmlService,

    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // dd($request);
        $authID = auth()->user()->id;
        $companies = $this->userService->show($authID, $request);
            // dd($companies->orders->toArray());
        return view('frontend.companies.company', compact('companies'));
    }

    public function importCompany(Request $request){

        if($request->isMethod('post')){

            $fetch_result= $this->xmlService->importCompany($request);
            $company_number=$request->company_number;
            $company_authcode=$request->company_authcode;
            return view('frontend.companies.import_company',compact('fetch_result','company_number','company_authcode','request'));
        }else{
            $fetch_result=[];
            $company_number='';
            $company_authcode='';
            return view('frontend.companies.import_company',compact('fetch_result','company_number','company_authcode','request'));
        }

    }

    public function importCompanyAdd(Request $request){

        $fetch_result= $this->xmlService->importCompany($request);
        dd($fetch_result);
        if($fetch_result){
            // Create Order
            $company_name_exist = Companie::where('companie_name',$fetch_result['Body']['CompanyData']['CompanyName'])->first();
            // if(!$company_name_exist){

                if($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYSHR'){
                    $package_type = 'shares';
                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYGUAR'){
                    $package_type = 'Guarantee';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'LLP'){
                    $package_type = 'LLP';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'PLC'){
                    $package_type = 'PLC_Package';

                }
                // dd($package_type);
                $package = Package::where('package_type',$package_type)->first();

                // Cart add

                $sopping_cart = new ShoppingCart;
                $sopping_cart->user_id = auth()->user()->id;
                $sopping_cart->package_id = $package->id;
                $sopping_cart->quantity = '1';
                $sopping_cart->price = $package->package_price;
                // $sopping_cart->save();



                $order =  new Order;
                $order->order_id = $this->generateOrderId();
                $order->user_id  = auth()->user()->id;
                $order->cart_id = $sopping_cart->id;
                $order->company_number = $request->company_number;
                $order->company_name = $fetch_result['Body']['CompanyData']['CompanyName'];
                $order->auth_code =$request->company_authcode;
                // $order->save();

                // Add Address

                $juridiction_id = Jurisdiction::where('value',$fetch_result['Body']['CompanyData']['Jurisdiction'])->pluck('id')->first();
                $Office_address = new Address;
                $Office_address->user_id = auth()->user()->id;
                $Office_address->address_type = 'office_address';
                $Office_address->house_number = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Premise'];
                $Office_address->street = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Street'];

                $Office_address->locality = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Thoroughfare'];
                $Office_address->town = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['PostTown'];
                $Office_address->county = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Country'];
                $Office_address->post_code = @$fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Postcode'];
                // $Office_address->save();

                if($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYSHR'){
                    $company_type = 'Limited By Shares';
                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYGUAR'){
                    $company_type = 'Limited By Guarantee';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'LLP'){
                    $company_type = 'Limited Liability Partnership';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'PLC'){
                    $company_type = 'Public Limited Company';

                }

                // Add Company

                $company = new Companie;
                $company->user_id = auth()->user()->id;
                $company->jurisdiction_id = $juridiction_id;
                $company->order_id = $order->order_id;
                $company->office_address = $Office_address->id;
                $company->companie_name = $fetch_result['Body']['CompanyData']['CompanyName'];
                $company->companie_type = $company_type;
                // $company->save();

                // Appointment Details

                foreach ($fetch_result['Body']['CompanyData']['Officers']['Director'] as $key => $data) {

                    if(isset($data['Person'])){

                        // dd($data['Person']);
                        // dd($data['Person']['ServiceAddress']['Address']['Premise']);
                        $nationlity_id = Nationality::where('nationality',$data['Person']['Nationality'])->pluck('id')->first();
                        // Resident Add for Person
                        $residential_address = new Address;
                        $residential_address->user_id = auth()->user()->id;
                        $residential_address->address_type = 'primary_address';
                        $residential_address->house_number = @$data['Person']['ResidentialAddress']['Address']['Premise'];
                        $residential_address->street = @$data['Person']['ResidentialAddress']['Address']['Street'];
                        $residential_address->locality = @$data['Person']['ResidentialAddress']['Address']['Thoroughfare'];
                        $residential_address->town = @$data['Person']['ResidentialAddress']['Address']['PostTown'];
                        $residential_address->county = @$data['Person']['ResidentialAddress']['Address']['Country'];
                        $residential_address->post_code = @$data['Person']['ResidentialAddress']['Address']['Postcode'];
                        // $residential_address->save();

                        // create Person


                        $person = new PersonOfficer;
                        $person->order_id = $order->order_id;
                        $person->user_id = auth()->user()->id;
                        $person->dob_day = @$data['Person']['DOB'];

                        if(is_array(@$data['Person']['Forename'])){
                            $forname = implode(' ',@$data['Person']['Forename']);
                        }else{
                            $forname =@$data['Person']['Forename'];

                        }

                        $person->first_name = $forname;
                        $person->last_name = @$data['Person']['Surname'];
                        $person->nationality = $nationlity_id;
                        $person->occupation = @$data['Person']['Occupation'];
                        $person->add_id = $residential_address->id;

                        // $person->save();

                        // Create Appointment


                            $service_address = new Address;
                            $service_address->user_id = auth()->user()->id;
                            $service_address->address_type = 'primary_address';
                            $service_address->house_number = @$data['Person']['ServiceAddress']['Address']['Premise'];
                            $service_address->street =@$data['Person']['ServiceAddress']['Address']['Street'];
                            $service_address->locality =@$data['Person']['ServiceAddress']['Address']['Thoroughfare'];
                            $service_address->town =@$data['Person']['ServiceAddress']['Address']['PostTown'];
                            $service_address->county =@$data['Person']['ServiceAddress']['Address']['Country'];
                            $service_address->post_code =@$data['Person']['ServiceAddress']['Address']['Postcode'];


                        // $service_address->save();

                        $appointment = new Person_appointment;
                        $appointment->user_id = auth()->user()->id;
                        $appointment->person_officer_id = $person->id;
                        $appointment->own_address_id = $service_address->id;
                        $appointment->position = 'Director';
                        $appointment->order = $order->order_id;
                        $appointment->appointment_type = 'person';
                        // $appointment->save();

                    }
                    if(isset($data['Corporate'])){

                        $residential_address = new Address;
                        $residential_address->user_id = auth()->user()->id;
                        $residential_address->address_type = 'primary_address';
                        $residential_address->house_number = @$data['Corporate']['Address']['Premise'];
                        $residential_address->street =@$data['Corporate']['Address']['Street'];
                        $residential_address->town =@$data['Corporate']['Address']['PostTown'];
                        $residential_address->county =@$data['Corporate']['Address']['Country'];
                        $residential_address->post_code =@$data['Corporate']['Address']['Postcode'];

                        // $residential_address->save();

                        $person = new PersonOfficer;
                        $person->order_id = $order->order_id;
                        $person->user_id = auth()->user()->id;
                        $person->legal_name = $data['Corporate']['CorporateName'];
                        if(isset($data['Corporate']['CompanyIdentification']['NonEEA'])){
                            $person->place_registered = @$data['Corporate']['CompanyIdentification']['NonEEA']['PlaceRegistered'];
                            $person->registration_number = @$data['Corporate']['CompanyIdentification']['NonEEA']['RegistrationNumber'];
                            $person->law_governed = @$data['Corporate']['CompanyIdentification']['NonEEA']['LawGoverned'];
                            $person->legal_form = @$data['Corporate']['CompanyIdentification']['NonEEA']['LegalForm'];
                        }

                        $person->add_id = $residential_address->id;
                        // $person->save();

                        $appointment = new Person_appointment;
                        $appointment->user_id = auth()->user()->id;
                        $appointment->person_officer_id = $person->id;
                        $appointment->position = 'Director';
                        $appointment->order = $order->order_id;
                        $appointment->appointment_type = 'corporate';
                        $appointment->save();
                    }
                    // dd($data);
                }


                // if(isset($fetch_result['Body']['CompanyData']['Officers']['Secretary'])){

                //     foreach($fetch_result['Body']['CompanyData']['Officers']['Secretary'] as $key => $data){
                //         dd($data);
                //         $name_exist = PersonOfficer::where('first_name',$data['Forename'])->where('last_name',$data['Surname'])->first();
                //         if($name_exist){
                //             dd('name Found');
                //         }else{
                //            // dd($data['Person']);


                //         // create Person
                //         $person = new PersonOfficer;
                //         $person->order_id = $order->order_id;
                //         $person->user_id = auth()->user()->id;
                //         $person->first_name = $data['Person']['Forename'];
                //         $person->last_name = $data['Person']['Surname'];
                //         // $person->save();

                //         // Create Appointment
                //         $service_address = new Address;
                //         $service_address->user_id = auth()->user()->id;
                //         $service_address->address_type = 'primary_address';
                //         $service_address->house_number = $data['Person']['ResidentialAddress']['Address']['Premise'];
                //         $service_address->street =$data['Person']['ResidentialAddress']['Address']['Street'];
                //         $service_address->locality =$data['Person']['ResidentialAddress']['Address']['Thoroughfare'];
                //         $service_address->town =$data['Person']['ResidentialAddress']['Address']['PostTown'];
                //         $service_address->county =$data['Person']['ResidentialAddress']['Address']['Country'];
                //         $service_address->post_code =$data['Person']['ResidentialAddress']['Address']['Postcode'];

                //         // $service_address->save();

                //         $appointment = new Person_appointment;
                //         $appointment->user_id = auth()->user()->id;
                //         $appointment->person_officer_id = $person->id;
                //         $appointment->own_address_id = $service_address->id;
                //         $appointment->position = 'Director';
                //         $appointment->order = $order->order_id;
                //         $appointment->appointment_type = 'person';
                //         // $appointment->save();

                //         }
                //     }
                // }


            // }




        }
    }

    public function generateOrderId()
    {
        // $orderId = date('ims')-rand(10,99);
       list($usec, $sec) = explode(" ", microtime());
        $id =  ($usec+$sec);
        $id = explode(".", $id);
        $orderId = @$id[0].@$id[1];
        $dupOrder = Order::where('order_id', $orderId)->first();
        if ($dupOrder) {
            $this->generateOrderId();
        }
        return $orderId;
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function acceptedCompanyDetails(Request $request)
    {
        $order_id = $request->order;

        $order = $this->orderService->getOrder($order_id);

        $cartInfo = ShoppingCart::where(['user_id' => auth()->user()->id])->get()->first();

        $user = Auth::user();
        $countryList = Country::all();
        $purchase_address = Purchase_address::where('address_type', 'registered_address')->get();
        $primary_address_list = Address::join('countries','countries.id','=','addresses.billing_country')
                                    ->select('addresses.house_number','countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
                                    ->where('addresses.user_id',Auth::user()->id)
                                    ->orderBy('addresses.id','DESC')
                                    ->distinct()
                                    ->get()
                                    ->toArray();

        $shoppingCartId = '';
        if (!empty($cartInfo)) {
            if (!empty($cartInfo['id'])) {
                $shoppingCartId = $cartInfo['id'];
            } else {
                $shoppingCartId = '';
            }
        }

        $used_address = Address::where('user_id', auth()->user()->id)->get();
        $countries = Country::all()->toArray();

        $person_officers = PersonOfficer::where('order_id', $order_id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $order_id)->get()->toArray();
        $getCompanyNoDate =  companyXmlDetail::where('order_id',$request->query('order'))->get()->first();
        if($getCompanyNoDate&&@($getCompanyNoDate['pdf_content']!=''))
        {
            $pdfcontent = true;
        }else{
            $pdfcontent = false;
        }
        $review = $this->companyFormService->getCompanieName($order_id);

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        return view('frontend.companies.overview', compact('pdfcontent','used_address', 'countries', 'shoppingCartId', 'person_officers',
            'appointmentsList','review','order','primary_address_list','countryList','user','purchase_address'));
    }
    public function efillingPdf(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::where('id',$request->query('c_id'))->get()->first();

        $order_id = $request->query('order');
        $order_details = Order::where('order_id',$order_id)->get()->first();
        $person_officers_director_id=[];
        $director_names ='';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Director', $positionArray)){
                if ($director_names=='') {
                    $director_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_director_id)){
                        $director_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_director_id,$val['person_officer_id']);
            }
        }

        $data = ['customer_name'=>$director_names,'company_name'=>$company_details['companie_name'],'order_ref'=>$order_id,'auth_code'=>$order_details['auth_code']];
        $pdf = PDF::loadView('PDF.efilling_pdf',$data);

        return $pdf->download($order_details['company_name'].'_efilling.pdf');
    }
    public function generateCertificate(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::with('officeAddressWithoutForwAddress')->with('forwAddress')->where('id',$request->query('c_id'))->get()->first();
        $getCompanyNoDate =  companyXmlDetail::where('order_id',$request->query('order'))->get()->first();
        $date = '';
        try {
            $date = date('d/m/y', strtotime($getCompanyNoDate['updated_at']));
        } catch (\Throwable $th) {
        }
        $company_number = $getCompanyNoDate['company_no']??'';
        $address_details = $company_details['office_address']!=null?$company_details['officeAddressWithoutForwAddress']:$company_details['forwAddress'];
        $company_name = $company_details['companie_name'];
        $company_office_address = $this->construct_address($address_details);
        $registered_in = @$address_details['county'];
        $shareholders_names ='';
        $director_names ='';
        $customer_name = auth()->user()->title.' '.auth()->user()->forename.' '.auth()->user()->surname;
        $number_of_shares=null;
        $person_officers_id = [];
        $person_officers_director_id=[];
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){
                $number_of_shares+= $val['sh_quantity'];
                if ($shareholders_names=='') {
                    $shareholders_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_id)){
                        $shareholders_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_id,$val['person_officer_id']);
            }
            if(in_array('Director', $positionArray)){
                if ($director_names=='') {
                    $director_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_director_id)){
                        $director_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_director_id,$val['person_officer_id']);
            }
        }
        $data = ['date' => $date, 'company_number' => $company_number, 'company_name' => $company_name, 'company_office_address' => $company_office_address, 'registered_in' => $registered_in, 'number_of_shares' => $number_of_shares,'shareholders_names'=>$shareholders_names,'customer_name'=>$customer_name,'director_names'=>$director_names];
        // dd($data);
        $pdf = PDF::loadView('PDF.certificate_pdf',$data);
        return $pdf->download($company_name.'_certificate.pdf');


    }
    public function memoArticlesFull(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::where('id',$request->query('c_id'))->get()->first();
        $company_name = $company_details['companie_name'];
        $getCompanyNoDate =  companyXmlDetail::where('order_id',$request->query('order'))->get()->first();
        $date = '';
        try {
            $date = date('d/m/y', strtotime($getCompanyNoDate['updated_at']));
        } catch (\Throwable $th) {
        }
        $company_number = $getCompanyNoDate['company_no']??'';
        $person_officers_id = [];
        $shareholders_names = [];
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){

                    if(!in_array($val['person_officer_id'],$person_officers_id)){
                        array_push($shareholders_names,$val['person_officers']['first_name'].' '.$val['person_officers']['last_name']);
                    }

                array_push($person_officers_id,$val['person_officer_id']);
            }
        }
        $data = ['date' => $date, 'company_number' => $company_number, 'shareholders_names'=>$shareholders_names,'company_name'=>$company_name];
        $pdf = PDF::loadView('PDF.memoArticlesFull_pdf',$data);
        return $pdf->download($company_name.'_Memorandum&Articles(Full Document).pdf');
    }
    public function memoArticlesDoc(Request $request)
    {

    }
    public function incorporateCertificate(Request $request)
    {
        $filename = 'Incorporation_certificate_'.$request->query('order').Str::random(10).'.pdf';
        $getCompanyNoDate = companyXmlDetail::where('order_id',$request->query('order'))->get()->first();
        if($getCompanyNoDate )
        {
            $base64encodedstring = $getCompanyNoDate['pdf_content'];
            $filePath = storage_path('app/public/incorporateCertificate/'.$filename);
            $decodeBase64 = base64_decode($base64encodedstring,true);
            file_put_contents($filePath, $decodeBase64);
            return response()->download($filePath);
        }else{
            return back();
        }
    }
    private function construct_address($address)
    {
        $con_address = '';
        if(@$address['house_number']!='')
        {
            @$con_address .= $address['house_number'].', ';
        }
        if(@$address['street']!='')
        {
            @$con_address .= $address['street'].', ';
        }
        if(@$address['locality']!='')
        {
            @$con_address .= $address['locality'].', ';
        }
        if(@$address['town']!='')
        {
            @$con_address .= $address['town'].', ';
        }
        if(@$address['county']!='')
        {
            @$con_address .= $address['county'].', ';
        }
        if(@$address['post_code']!='')
        {
            @$con_address .= $address['post_code'];
        }
        return $con_address;
    }


}
