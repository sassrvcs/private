<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Mail\CompanyEditAdmin;
use App\Mail\CompanyEditCustomer;
use App\Services\User\UserService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;
use App\Models\Address;
use App\Models\Addonservice;
use App\Models\Companie;
use App\Models\companyXmlDetail;
use App\Models\Country;
use App\Models\Purchase_address;
use App\Models\Order;
use App\Models\Package;
use App\Models\Jurisdiction;
use App\Models\Nationality;
use App\Models\Cart;
use App\Models\User;
use App\Models\SicCode;
use App\Models\SicDetails;
use App\Models\companyEditRequest;
use App\Models\companyEditTransaction;



use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Str;
use App\Services\XMLCreation\GenerateXmlService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
        // dd($fetch_result);
        if($fetch_result){
            //--------------- Create Order----------------
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

                //-------------Cart add----------------------------

                $sopping_cart = new ShoppingCart;
                $sopping_cart->user_id = auth()->user()->id;
                $sopping_cart->package_id = $package->id;
                $sopping_cart->quantity = '1';
                $sopping_cart->price = $package->package_price;
                $sopping_cart->save();



                $order =  new Order;
                $order->order_id = $this->generateOrderId();
                $order->user_id  = auth()->user()->id;
                $order->cart_id = $sopping_cart->id;
                $order->company_number = $request->company_number;
                $order->company_name = $fetch_result['Body']['CompanyData']['CompanyName'];
                $order->auth_code =$request->company_authcode;
                $order->save();

                //----------------- Add Office Address----------------------

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
                $Office_address->save();

                if($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYSHR'){
                    $company_type = 'Limited By Shares';
                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'BYGUAR'){
                    $company_type = 'Limited By Guarantee';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'LLP'){
                    $company_type = 'Limited Liability Partnership';

                }elseif($fetch_result['Body']['CompanyData']['CompanyCategory']== 'PLC'){
                    $company_type = 'Public Limited Company';

                }

                //----------------- Add Company--------------------

                $company = new Companie;
                $company->user_id = auth()->user()->id;
                $company->jurisdiction_id = $juridiction_id;
                $company->order_id = $order->order_id;
                $company->office_address = $Office_address->id;
                $company->companie_name = $fetch_result['Body']['CompanyData']['CompanyName'];
                $company->companie_type = $company_type;
                $company->status= '3';
                $company->made_upto= $fetch_result['Body']['CompanyData']['MadeUpDate'];
                $company->due_date= $fetch_result['Body']['CompanyData']['NextDueDate'];
                $company->save();

                //---------------Add Sic Code ---------------------
                $sic_code = SicDetails::where('code_id',$fetch_result['Body']['CompanyData']['SICCodes']['SICCode'])->first();
                $sic_codes = new SicCode;
                $sic_codes->companie_id = $company->id;
                $sic_codes->name = $sic_code->code_name;
                $sic_codes->code =$fetch_result['Body']['CompanyData']['SICCodes']['SICCode'];
                $sic_codes->save();




                // Appointment Details

                if(isset($fetch_result['Body']['CompanyData']['Officers']['Director']['0'])){

                    foreach ($fetch_result['Body']['CompanyData']['Officers']['Director'] as  $data) {

                        if(isset($data['Person'])){


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
                            $residential_address->save();

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

                            $person->first_name = strtoupper($forname);
                            $person->last_name = strtoupper(@$data['Person']['Surname']);
                            $person->nationality = $nationlity_id;
                            $person->occupation = @$data['Person']['Occupation'];
                            $person->add_id = $residential_address->id;
                            $person->save();

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
                            $service_address->save();

                            $appointment = new Person_appointment;
                            $appointment->user_id = auth()->user()->id;
                            $appointment->person_officer_id = $person->id;
                            $appointment->own_address_id = $service_address->id;
                            $appointment->position = 'Director';
                            $appointment->order = $order->order_id;
                            $appointment->appointment_type = 'person';
                            $appointment->save();

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
                            $residential_address->save();

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
                            $person->save();

                            $appointment = new Person_appointment;
                            $appointment->user_id = auth()->user()->id;
                            $appointment->person_officer_id = $person->id;
                            $appointment->position = 'Director';
                            $appointment->order = $order->order_id;
                            $appointment->appointment_type = 'corporate';
                            $appointment->save();
                        }
                    }
                }else{
                    $data = $fetch_result['Body']['CompanyData']['Officers']['Director'];

                    if(isset($data['Person'])){


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
                        $residential_address->save();

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

                        $person->first_name = strtoupper($forname);
                        $person->last_name = strtoupper(@$data['Person']['Surname']);
                        $person->nationality = $nationlity_id;
                        $person->occupation = @$data['Person']['Occupation'];
                        $person->add_id = $residential_address->id;
                        $person->save();

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
                        $service_address->save();

                        $appointment = new Person_appointment;
                        $appointment->user_id = auth()->user()->id;
                        $appointment->person_officer_id = $person->id;
                        $appointment->own_address_id = $service_address->id;
                        $appointment->position = 'Director';
                        $appointment->order = $order->order_id;
                        $appointment->appointment_type = 'person';
                        $appointment->save();
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
                        $residential_address->save();

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
                        $person->save();

                        $appointment = new Person_appointment;
                        $appointment->user_id = auth()->user()->id;
                        $appointment->person_officer_id = $person->id;
                        $appointment->position = 'Director';
                        $appointment->order = $order->order_id;
                        $appointment->appointment_type = 'corporate';
                        $appointment->save();
                    }
                }

                if(isset($fetch_result['Body']['CompanyData']['PSCs']['0'])){
                }else{

                    if(isset($fetch_result['Body']['CompanyData']['PSCs']['PSC']['PSCNotification']['Individual'])){
                        $data= $fetch_result['Body']['CompanyData']['PSCs']['PSC']['PSCNotification']['Individual'];
                        // dd($data);
                        if(isset($data['Person'])){

                            $name_exist = PersonOfficer::where('first_name', 'like', '%' .strtoupper($data['Forename']). '%')->where('last_name','like', '%' .strtoupper($data['Surname']). '%')->where('order_id', $order->order_id)->first();
                            if($name_exist){
                                $exist_appointment = Person_appointment::where('person_officer_id',$name_exist->id)->where('order',$order->order_id)->first();
                                $exist_appointment->position = "Director, PSC";
                                $exist_appointment->save();
                            }else{

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
                                    $residential_address->save();

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

                                    $person->first_name = strtoupper($forname);
                                    $person->last_name = strtoupper(@$data['Person']['Surname']);
                                    $person->nationality = $nationlity_id;
                                    $person->occupation = @$data['Person']['Occupation'];
                                    $person->add_id = $residential_address->id;
                                    $person->save();

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
                                    $service_address->save();

                                    $appointment = new Person_appointment;
                                    $appointment->user_id = auth()->user()->id;
                                    $appointment->person_officer_id = $person->id;
                                    $appointment->own_address_id = $service_address->id;
                                    $appointment->position = 'PSC';
                                    $appointment->order = $order->order_id;
                                    $appointment->appointment_type = 'person';
                                    $appointment->save();
                            }
                        }else{


                            $name_exist = PersonOfficer::where('first_name', 'like', '%' .strtoupper($data['Forename']). '%')->where('last_name','like', '%' .strtoupper($data['Surname']). '%')->where('order_id', $order->order_id)->first();
                            if($name_exist){
                                $exist_appointment = Person_appointment::where('person_officer_id',$name_exist->id)->where('order',$order->order_id)->first();
                                $exist_appointment->position = "Director, PSC";
                                foreach($fetch_result['Body']['CompanyData']['PSCs']['PSC']['PSCNotification']['NatureOfControls']['NatureOfControl'] as $psc_nature){

                                    if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT'){
                                        $exist_appointment->noc_os = 'More than 25% but not more than 50%';
                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT'){
                                        $exist_appointment->noc_os = 'More than 50% but less than 75%';
                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT'){
                                        $exist_appointment->noc_os = '75% or more';
                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_os = 'More than 25% but not more than 50%';

                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_os = 'More than 50% but less than 75%';

                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_os = '75% or more';

                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_os = 'More than 25% but not more than 50%';

                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_os = 'More than 50% but less than 75%';

                                    }
                                    if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_os = '75% or more';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT'){
                                        $exist_appointment->noc_vr = 'More than 25% but not more than 50%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT'){
                                        $exist_appointment->noc_vr = 'More than 50% but less than 75%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT'){
                                        $exist_appointment->noc_vr = '75% or more';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_vr = 'More than 25% but not more than 50%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_vr = 'More than 50% but less than 75%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT_AS_TRUST'){
                                        $exist_appointment->tci_vr = '75% or more';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_vr = 'More than 25% but not more than 50%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_vr = 'More than 50% but less than 75%';

                                    }
                                    if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT_AS_FIRM'){
                                        $exist_appointment->fci_vr = '75% or more';

                                    }
                                    if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS'){
                                        $exist_appointment->noc_appoint = 'Yes';

                                    }
                                    if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_TRUST'){
                                        $exist_appointment->tci_appoint = 'Yes';

                                    }
                                    if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM'){
                                        $exist_appointment->fci_appoint = 'Yes';

                                    }
                                    if($psc_nature == 'SIGINFLUENCECONTROL'){
                                        $exist_appointment->noc_others = 'Yes';

                                    }
                                    if($psc_nature == 'SIGINFLUENCECONTROL_AS_TRUST'){
                                        $exist_appointment->tci_others = 'Yes';

                                    }
                                    if($psc_nature == 'SIGINFLUENCECONTROL_AS_FIRM'){
                                        $exist_appointment->fci_others = 'Yes';

                                    }

                                }
                                $exist_appointment->save();
                            }else{

                                    $nationlity_id = Nationality::where('nationality',$data['Nationality'])->pluck('id')->first();
                                    // Resident Add for Person
                                    $residential_address = new Address;
                                    $residential_address->user_id = auth()->user()->id;
                                    $residential_address->address_type = 'primary_address';
                                    $residential_address->house_number = @$data['ResidentialAddress']['Address']['Premise'];
                                    $residential_address->street = @$data['ResidentialAddress']['Address']['Street'];
                                    $residential_address->locality = @$data['ResidentialAddress']['Address']['Thoroughfare'];
                                    $residential_address->town = @$data['ResidentialAddress']['Address']['PostTown'];
                                    $residential_address->county = @$data['ResidentialAddress']['Address']['Country'];
                                    $residential_address->post_code = @$data['ResidentialAddress']['Address']['Postcode'];
                                    $residential_address->save();

                                    // create Person


                                    $person = new PersonOfficer;
                                    $person->order_id = $order->order_id;
                                    $person->user_id = auth()->user()->id;
                                    $person->dob_day = @$data['DOB'];

                                    if(is_array(@$data['Forename'])){
                                        $forname = implode(' ',@$data['Forename']);
                                    }else{
                                        $forname =@$data['Forename'];

                                    }

                                    $person->first_name = strtoupper($forname);
                                    $person->last_name = strtoupper(@$data['Surname']);
                                    $person->nationality = $nationlity_id;
                                    $person->occupation = @$data['Occupation'];
                                    $person->add_id = $residential_address->id;
                                    $person->save();

                                    // Create Appointment


                                    $service_address = new Address;
                                    $service_address->user_id = auth()->user()->id;
                                    $service_address->address_type = 'primary_address';
                                    $service_address->house_number = @$data['ServiceAddress']['Address']['Premise'];
                                    $service_address->street =@$data['ServiceAddress']['Address']['Street'];
                                    $service_address->locality =@$data['ServiceAddress']['Address']['Thoroughfare'];
                                    $service_address->town =@$data['ServiceAddress']['Address']['PostTown'];
                                    $service_address->county =@$data['ServiceAddress']['Address']['Country'];
                                    $service_address->post_code =@$data['ServiceAddress']['Address']['Postcode'];
                                    $service_address->save();

                                    $appointment = new Person_appointment;
                                    $appointment->user_id = auth()->user()->id;
                                    $appointment->person_officer_id = $person->id;
                                    $appointment->own_address_id = $service_address->id;
                                    $appointment->position = 'PSC';
                                    $appointment->order = $order->order_id;
                                    $appointment->appointment_type = 'person';
                                    foreach($fetch_result['Body']['CompanyData']['PSCs']['PSC']['PSCNotification']['NatureOfControls']['NatureOfControl'] as $psc_nature){

                                        if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT'){
                                            $appointment->noc_os = 'More than 25% but not more than 50%';
                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT'){
                                            $appointment->noc_os = 'More than 50% but less than 75%';
                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT'){
                                            $appointment->noc_os = '75% or more';
                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT_AS_TRUST'){
                                            $appointment->tci_os = 'More than 25% but not more than 50%';

                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT_AS_TRUST'){
                                            $appointment->tci_os = 'More than 50% but less than 75%';

                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT_AS_TRUST'){
                                            $appointment->tci_os = '75% or more';

                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_25TO50PERCENT_AS_FIRM'){
                                            $appointment->fci_os = 'More than 25% but not more than 50%';

                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_50TO75PERCENT_AS_FIRM'){
                                            $appointment->fci_os = 'More than 50% but less than 75%';

                                        }
                                        if($psc_nature == 'OWNERSHIPOFSHARES_75TO100PERCENT_AS_FIRM'){
                                            $appointment->fci_os = '75% or more';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT'){
                                            $appointment->noc_vr = 'More than 25% but not more than 50%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT'){
                                            $appointment->noc_vr = 'More than 50% but less than 75%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT'){
                                            $appointment->noc_vr = '75% or more';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT_AS_TRUST'){
                                            $appointment->tci_vr = 'More than 25% but not more than 50%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT_AS_TRUST'){
                                            $appointment->tci_vr = 'More than 50% but less than 75%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT_AS_TRUST'){
                                            $appointment->tci_vr = '75% or more';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_25TO50PERCENT_AS_FIRM'){
                                            $appointment->fci_vr = 'More than 25% but not more than 50%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_50TO75PERCENT_AS_FIRM'){
                                            $appointment->fci_vr = 'More than 50% but less than 75%';

                                        }
                                        if($psc_nature == 'VOTINGRIGHTS_75TO100PERCENT_AS_FIRM'){
                                            $appointment->fci_vr = '75% or more';

                                        }
                                        if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS'){
                                            $appointment->noc_appoint = 'Yes';

                                        }
                                        if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_TRUST'){
                                            $appointment->tci_appoint = 'Yes';

                                        }
                                        if($psc_nature == 'RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM'){
                                            $appointment->fci_appoint = 'Yes';

                                        }
                                        if($psc_nature == 'SIGINFLUENCECONTROL'){
                                            $appointment->noc_others = 'Yes';

                                        }
                                        if($psc_nature == 'SIGINFLUENCECONTROL_AS_TRUST'){
                                            $appointment->tci_others = 'Yes';

                                        }
                                        if($psc_nature == 'SIGINFLUENCECONTROL_AS_FIRM'){
                                            $appointment->fci_others = 'Yes';

                                        }

                                    }
                                    $appointment->save();
                            }
                        }

                    }


                }

                if(isset($fetch_result['Body']['CompanyData']['Shareholdings'])){
                    $data = $fetch_result['Body']['CompanyData']['Shareholdings']['Shareholders'];

                    $name_exist = PersonOfficer::where('first_name', 'like', '%' .strtoupper($data['Name']['Forename']). '%')->where('last_name','like', '%' .strtoupper($data['Name']['Surname']). '%')->where('order_id', $order->order_id)->first();
                    if($name_exist){
                        $exist_appointment = Person_appointment::where('person_officer_id',$name_exist->id)->where('order',$order->order_id)->first();
                        $exist_appointment->position = "Director, PSC , Shareholder";
                        $exist_appointment->sh_quantity = $fetch_result['Body']['CompanyData']['Shareholdings']['NumberHeld'];
                        $exist_appointment->sh_currency =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['ShareCurrency'];
                        $exist_appointment->sh_pps =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['Shares']['AggregateNominalValue'];
                        $exist_appointment->perticularsTextArea =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['Shares']['PrescribedParticulars'];
                        $exist_appointment->save();
                    }else{

                            // $nationlity_id = Nationality::where('nationality',$data['Person']['Nationality'])->pluck('id')->first();
                            // Resident Add for Person
                            $residential_address = new Address;
                            $residential_address->user_id = auth()->user()->id;
                            $residential_address->address_type = 'primary_address';
                            $residential_address->house_number = @$data['Address']['Premise'];
                            $residential_address->street = @$data['Address']['Street'];
                            $residential_address->locality = @$data['Address']['Thoroughfare'];
                            $residential_address->town = @$data['Address']['PostTown'];
                            $residential_address->county = @$data['Address']['Country'];
                            $residential_address->post_code = @$data['Address']['Postcode'];
                            $residential_address->save();

                            // create Person


                            $person = new PersonOfficer;
                            $person->order_id = $order->order_id;
                            $person->user_id = auth()->user()->id;
                            // $person->dob_day = @$data['DOB'];

                            if(is_array(@$data['Forename'])){
                                $forname = implode(' ',@$data['Name']['Forename']);
                            }else{
                                $forname =@$data['Name']['Forename'];

                            }

                            $person->first_name = strtoupper($forname);
                            $person->last_name = strtoupper(@$data['Name']['Surname']);
                            // $person->nationality = $nationlity_id;
                            // $person->occupation = @$data['Occupation'];
                            $person->add_id = $residential_address->id;
                            $person->save();

                            // Create Appointment




                            $appointment = new Person_appointment;
                            $appointment->user_id = auth()->user()->id;
                            $appointment->person_officer_id = $person->id;
                            $appointment->position = 'Shareholder';
                            $appointment->order = $order->order_id;
                            $appointment->appointment_type = 'person';
                            $appointment->sh_quantity = $fetch_result['Body']['CompanyData']['Shareholdings']['NumberHeld'];
                            $appointment->sh_currency =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['ShareCurrency'];
                            $appointment->sh_pps =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['Shares']['AggregateNominalValue'];
                            $appointment->perticularsTextArea =$fetch_result['Body']['CompanyData']['StatementOfCapital']['Capital']['Shares']['PrescribedParticulars'];
                            $appointment->save();
                    }
                }





        }
        $authID = auth()->user()->id;
        $companies = $this->userService->show($authID, $request);
            // dd($companies->orders->toArray());
        return view('frontend.companies.company', compact('companies'));
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
        $change_name_service = Addonservice::where('slug', 'company-name-change')->first();
        $confirmation_statement_service = Addonservice::where('slug', 'confirmation-statement-service')->first();
        $change_accounting_date = Cart::where('slug', 'change-accounting-date')->where('order_id', $order_id)->Where('user_id', $user->id)->first();
        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();
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
            'appointmentsList','review','order','primary_address_list','countryList','user','purchase_address', 'order_id', 'cartCount', 'change_name_service', 'confirmation_statement_service','change_accounting_date'));
    }


    public function editCompanyServiceInCart(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'order_id' => 'required',
            'service_name' => 'required|string',
            'slug' => 'required|string',
            'address_id' => 'nullable',
            'forward_address_id' => 'nullable',
            'price' => 'nullable|numeric',
            'effective_date' => 'nullable|date',
        ]);

        // Create or update the cart record
        if($request->forward_address_id){
            $request->address_id = null;
            $forwarding_registered_office_address = $request->forward_address_id;
            $office_address = null;

        } else {

            $request->forward_address_id = null;
            $office_address = $request->address_id;
            $forwarding_registered_office_address = null;
        }

        $vat = 0.00;
        if ($request->has('price') && $request->price !== null) {
            $vat = $request->price * 0.20; // Assuming 20% VAT rate
        }

        $cart = Cart::updateOrCreate(
            ['user_id' => $user->id, 'slug' => $request->slug],
            [
                'service_name' => $request->service_name,
                'order_id' => $request->order_id,
                'address_id' => $request->address_id,
                'forward_address_id' => $request->forward_address_id,
                'price' => $request->price ?? 0.00,
                'effective_date' => $request->effective_date,
                'vat' => $vat,
            ]
        );

        $company = Companie::where(['user_id' => $user->id, 'order_id' => $request->order_id, 'id' => $request->c_id ])->update([
            'office_address' => $office_address,
            'forwarding_registered_office_address' => $forwarding_registered_office_address,
        ]);

        return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
    }

    public function editCompanyNameChangeServiceInCart(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'order_id' => 'required',
            'service_name' => 'required|string',
            'slug' => 'required|string',
            'price' => 'nullable|numeric',
        ]);

        $vat = null;
        if ($request->has('price') && $request->price !== null) {
            $vat = $request->price * 0.20; // Assuming 20% VAT rate
        }

        $cart = Cart::updateOrCreate(
            ['user_id' => $user->id, 'slug' => $request->slug],
            [
                'service_name' => $request->service_name,
                'order_id' => $request->order_id,
                'price' => $request->price,
                'vat' => $vat,
            ]
        );

        return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
    }

    public function changeAccountingReferenceDateInCart(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'order_id' => 'required',
            'service_name' => 'required|string',
            'slug' => 'required|string',
        ]);


        $cart = Cart::updateOrCreate(
            ['user_id' => $user->id, 'slug' => $request->slug],
            [
                'service_name' => $request->service_name,
                'order_id' => $request->order_id,
                'company_account_value' => json_encode($request->all()),
            ]
        );

        if($request->currentReferenceDate) {

            $company = Companie::where(['user_id' => $user->id, 'order_id' => $request->order_id, 'id' => $request->c_id ])->update([
                'due_date' => $request->amendedReferenceDate,
            ]);

        }

        return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
    }

    public function editCompanyAppointment(Request $request)
    {
        // return $request->all();

        $appointment_id = $request->query('id');
        $appointment_details = Person_appointment::with('forwarding_address')->with('own_address')->where('id', $appointment_id)->get()->first()->toArray();
        // return $appointment_details['position'];
        $countries = Country::all();
        $company_type  = Companie::where('order_id', $_GET['order'])->pluck('companie_type')->first();
        $positionArray = explode(', ', $appointment_details['position']);
        $nationalities = Nationality::all()->sortBy('name')->toArray();
        $officer_details = PersonOfficer::with('address')->where('id', $appointment_details['person_officer_id'])->get()->first()->toArray();
        $purchase_address = Purchase_address::where('address_type', 'appointment_address')->first();
        $service_address = construct_address($purchase_address->toArray());
        $officer_address = construct_address($officer_details['address']);
        $billing_address_list = $primary_address_list = Address::join('countries','countries.id','=','addresses.billing_country')
                            ->select('addresses.house_number','countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
                            ->where('addresses.user_id',Auth::user()->id)
                            ->orderBy('addresses.id','DESC')
                            ->distinct()
                            ->get()
                            ->toArray();


        $order_id = $request->order;

        $user = Auth::user();

        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();
        // $person_appointment = Person_appointment::where('order', $order_id)->where('position', 'LIKE', "%PSC%")->get();

        return view('frontend.companies.edit_company_appointment', compact('company_type','billing_address_list','primary_address_list','countries','nationalities','order_id', 'appointment_details', 'positionArray', 'officer_details', 'purchase_address','service_address', 'cartCount', 'officer_address','user'));
    }

    public function saveCompanyAppointment(Request $request)
    {
        $request->validate([
            'officer_fName' => 'required',
            'officer_lName' => 'required',
            'officer_occupation' => 'required',
            'position'=>'required',
            'officer_dob' => 'required',
            'notificationDate' => 'required',
            'registerEntryDate'=>'required'
        ]);
        // dd(  $request->all());
        $user = Auth::user();
        $same_as_reg_add = $request->same_reg_add;
        if($same_as_reg_add!='0'){ // if service address(also known as appointmentaddress/director address) is same as office registration address then pull the data from companie table
            // dd('yes');
            $request->address_house_price=null;
            $service_add = Companie::where('id',$request->c_id)->first();
            $service_add_without_forwarding = $service_add->officeAddressWithoutForwAddress;
            $service_add_with_forwarding = $service_add->officeAddressWithForwAddress;
            if($service_add_without_forwarding!=null)
            {
                $service_add_without_forwarding_id = $service_add_without_forwarding->id;
            }else{
                $service_add_without_forwarding_id = null;
            }
            if($service_add_with_forwarding!=null)
            {
                $service_add_with_forwarding_id = $service_add_with_forwarding->id;
            }else{
                $service_add_with_forwarding_id = null;
            }
        }else{
            $service_add_without_forwarding_id = $request->service_own_add;
            $service_add_with_forwarding_id = $request->service_fwd_add;
        }
        try{
        $person_update = PersonOfficer::where('id', $request->officer_id)->update([
            'title' => $request->officer_title,
            'dob_day' => $request->officer_dob,
            'first_name' => $request->officer_fName,
            'nationality' => $request->person_national,
            'last_name' => $request->officer_lName,
            'occupation' => $request->officer_occupation,
            'add_id' => $request->residential_add,
        ]);

        $officer_name =  $request->officer_title.' '.$request->officer_fName.' '.$request->officer_lName;
        if(stripos($request->fci,'no')!==false){
            $fci_appoint = null;
            $fci_others = null;
            $fci_vr = null;
            $fci_os = null;
        }else{
            $fci_appoint = $request->fci_appoint;
            $fci_others = $request->fci_others;
            $fci_vr = $request->fci_vr;
            $fci_os = $request->fci_os;
        }
        if(stripos($request->tci,'no')!==false){
            $tci_appoint = null;
            $tci_others = null;
            $tci_vr = null;
            $tci_os = null;
        }else{
            $tci_appoint = $request->tci_appoint;
            $tci_others = $request->tci_others;
            $tci_vr = $request->tci_vr;
            $tci_os = $request->tci_os;
        }
        $postionString = implode(', ', $request->position);
        // dd($postionString);
        $appointment_updated = Person_appointment::where('id', $request->appointment_id)->update([
            'own_address_id' => $service_add_without_forwarding_id,
            'forwarding_address_id' => $service_add_with_forwarding_id,
            'position' => $postionString,
            'noc_appoint' => $request->noc_appoint,
            'noc_os' => $request->noc_os,
            'noc_vr' => $request->noc_vr,
            'noc_others' => $request->noc_others,
            'fci_appoint' => $fci_appoint,
            'fci' => $request->f_radio_check_id,
            'fci_os' => $fci_os,
            'fci_vr' => $fci_vr,
            'fci_others' => $fci_others,
            'tci' => $request->s_radio_check_id,
            'tci_os' => $tci_os,
            'tci_vr' => $tci_vr,
            'tci_appoint' =>$tci_appoint,
            'tci_others' => $tci_others,
            'appointment_type' => $request->appointment_type
        ]);

        $service_address_purchased = $request->address_house_price;
        if ($request->address_house_price != null ) {
            //add to cart the service address with price
            $cart = Cart::updateOrCreate(
                ['user_id' => $user->id, 'slug' => 'purchase_appointment_address','appointment_id' => $request->appointment_id],
                [
                    'service_name' => 'Purchase Service Address('. $officer_name .')',
                    'order_id' => $request->company_order_id,
                    'price' => $request->address_house_price,
                    'vat' => $request->address_house_price * 0.20,
                ]
            );
        }
        $section_change_string = '';
        $section_change_string = $this->appointmentEditChangesString($request);

        // if($notification_date_entry!=0)
        // {
        //     $section_change_string = $section_change_string.'notification date entry, ';
        //     //add to cart that something changed in notification date entry section
        // }
        if($section_change_string!='')
        {
            $edit_exists = Cart::where('user_id', $user->id)->where('user_id' , $user->id)->where('slug', 'appointment_edit_changes')->where('appointment_id', $request->appointment_id)->first();
            $changesMadePosition=$request->changesMadePosition;
            $personalDetailsChanges=$request->personalDetailsChanges;
            $natureOfControlChanges=$request->natureOfControlChanges;
            $residentAddressChanges=$request->residentAddressChanges;
            $forwardAddressChanges=$request->forwardAddressChanges;
            $notificationDateChanges=$request->notificationDateChanges;
            if($edit_exists)
            {
                $exists_data = json_decode($edit_exists->data);
                $changesMadePosition = $exists_data->changesMadePosition!=0?$exists_data->changesMadePosition:$request->changesMadePosition;
                $personalDetailsChanges = $exists_data->personalDetailsChanges!=0?$exists_data->personalDetailsChanges:$request->personalDetailsChanges;
                $natureOfControlChanges = $exists_data->natureOfControlChanges!=0?$exists_data->natureOfControlChanges:$request->natureOfControlChanges;
                $residentAddressChanges = $exists_data->residentAddressChanges!=0?$exists_data->residentAddressChanges:$request->residentAddressChanges;
                $forwardAddressChanges = $exists_data->forwardAddressChanges!=0?$exists_data->forwardAddressChanges:$request->forwardAddressChanges;
                $notificationDateChanges = $exists_data->notificationDateChanges!=0?$exists_data->notificationDateChanges:$request->notificationDateChanges;
            }
            $cart = Cart::UpdateOrCreate(
                ['user_id' => $user->id, 'slug' => 'appointment_edit_changes','appointment_id'=>$request->appointment_id],
                [
                    'user_id' => $user->id,
                    'service_name' => 'Officer Appointment Change('. $officer_name .')',
                    'slug'=>'appointment_edit_changes',
                    'order_id' => $request->company_order_id,
                    'price' => 0,
                    'vat' => 0,
                    'appointment_id'=>$request->appointment_id,
                    'data'=>json_encode([
                        'section_change_string' => $section_change_string,
                        'officer_id' => $request->officer_id,
                        'appointment_id'=>$request->appointment_id,
                        'appointment_type'=>$request->appointment_type,
                        'changesMadePosition'=>$changesMadePosition,
                        'personalDetailsChanges'=>$personalDetailsChanges,
                        'natureOfControlChanges'=>$natureOfControlChanges,
                        'residentAddressChanges'=>$residentAddressChanges,
                        'forwardAddressChanges'=>$forwardAddressChanges,
                        'notificationDateChanges'=>$notificationDateChanges,
                        'notification_date'=> $request->notificationDate,
                        'register_entry_date'=>$request->registerEntryDate
                    ])
                ]
            );
            return redirect()->route('accepted-company',['order'=>$request->company_order_id,'c_id'=>$request->c_id])->with('message', 'Appointment Updated Successfully And Added To Cart');
        }

        return redirect()->route('accepted-company',['order'=>$request->company_order_id,'c_id'=>$request->c_id])->with('message', 'Appointment Updated Successfully');

    }catch (\Exception $e) {
        // dd($e);
        return back()->with('error', 'Something went wrong!');

    }
        //    return $request->all();

    }
    public function editCompanyMailNotification($payment_order_id,$d_pay)
    {
        $purchase_address = Purchase_address::all();
        $cart_items = companyEditRequest::where('user_id', auth()->user()->id)->where('payment_order_id', $payment_order_id)->get();
        $order_particulars = companyEditTransaction::where('user_id', auth()->user()->id)->where('order_id', $payment_order_id)->first();
        // $base_amount = $order_particulars->base_amount;
        // $vat = $order_particulars->vat;
        // $total_amount = $order_particulars->amount;
        // $amount_details = [
        //     'vat'=>$vat,
        //     'base_amount'=>$base_amount,
        //     'total_amount'=>$total_amount
        // ];
        $user = Auth::user();
        $address=null;
        if($address==null){
            $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
            ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
            ->where('addresses.user_id', $user->id)
            ->where('addresses.address_type','billing_address')
            ->first();
        if ($billing_address==null) {
                $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
            ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
            ->where('addresses.user_id', $user->id)
            ->where('addresses.address_type','office_address')
            ->first();
            }
        if ($billing_address==null) {
                $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
            ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
            ->where('addresses.user_id', $user->id)
            ->where('addresses.address_type','primary_address')
            ->first();
            }
        }
            if ($billing_address!=null) {
                $address = construct_address($billing_address->toArray());
            }else{
                $address = null;

            }

            $pdf = PDF::loadView('PDF.editCompanyPdf', compact('cart_items','user','address','order_particulars'));
            $pdf->render();
            $pdf_mail_data = $pdf->output();
            $filename = 'Company_Edit_Invoice'.uniqid().Str::random(10).'.pdf';
            $filePath = storage_path('app/public/attachments/'.$filename);
            file_put_contents($filePath, $pdf_mail_data );
            // return $filePath;
            $direct_submit = $d_pay;
            try {
                Mail::to('debasish.ghosh@technoexponent.co.in')->send(new CompanyEditAdmin($cart_items,$purchase_address,$filePath,$direct_submit,$order_particulars));
                Mail::to($order_particulars->recipient_email)->send(new CompanyEditCustomer($cart_items,$purchase_address,$filePath,$user,$direct_submit,$order_particulars->recipient_name));
            }catch (\Exception $e) {
                // dd($e);
            }
        // return view('PDF.editCompanyPdf',compact('cart_items','user','address'));
    }
    public function appointmentEditChangesString($request)
    {
        $position_section = $request->changesMadePosition;
        $personal_details_section = $request->personalDetailsChanges;
        $nature_of_control_section = $request->natureOfControlChanges;
        $residential_address_section = $request->residentAddressChanges;
        $service_address_section = $request->forwardAddressChanges;
        $notification_date_entry = $request->notificationDateChanges;
        $section_change_string = '';
        if($position_section!=0)
        {
            $section_change_string = 'position, ';
            //add to cart that something changed in position section,
        }
        if($personal_details_section!=0)
        {
            $section_change_string = $section_change_string.'personal details, ';
            //add to cart that something changed in personal details section
        }
        if($nature_of_control_section!=0)
        {
            $section_change_string = $section_change_string.'nature of control, ';
            //add to cart that something changed in nature of control section
        }
        if($residential_address_section!=0)
        {
            $section_change_string = $section_change_string.'residential address, ';
            //add to cart that something changed in residential address section
        }
        if($service_address_section!=0)
        {

            $same_as_reg_add = $request->same_reg_add;
            if ($same_as_reg_add !=0) {
                //add to cart that address is same as reg address
                $section_change_string= $section_change_string.'service address (Make service address same as registration address), ';
            }else{
                $section_change_string = $section_change_string.'service address, ';
            }
            //add to cart that something changed in service address section
        }
        if($notification_date_entry!=0)
        {
            $section_change_string = 'Notification Date Update, ';
            //add to cart that something changed in position section,
        }
        return $section_change_string;
    }
    public function viewCompanyStatement(Request $request)
    {
        $order_id = $request->order;

        $user = Auth::user();

        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();
        // $person_appointment = Person_appointment::where('order', $order_id)->where('position', 'LIKE', "%PSC%")->get();
         $personAppointments = Person_appointment::with('person_officers')->where('order', $order_id)->get()->toArray();
         $appointmentsList = [];
         if (!empty($personAppointments)) {
             $appointmentsList = $personAppointments;
         }


        return view('frontend.companies.company_statement', compact('order_id', 'appointmentsList', 'cartCount'));
    }


    public function saveCompanyStatement(Request $request)
    {

        // return $request->all();
        $officerId = $request->officer_id ?? null;
        $officerDetails = null;

        $order_id = $request->order_id;

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'statementNotify' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $statementNotifyText = [
            'ef_no_psc' => 'The company does not have a PSC.',
            'ef_possible_psc' => 'The company believes it has a PSC but doesn\'t yet have the details.',
            'ef_unknown_psc' => 'The company does not yet know if it has a PSC.',
            'ef_notice_psc' => 'The company has issued a notice.',
        ];

        $pscStatementText = [
            'ef_none_psc' => 'The company believes it has a PSC but has not identified them.',
            'ef_identified_psc' => 'The company has identified a PSC but the details have not yet been confirmed.',
        ];

        $pscLinkedText = [
            'ef_confirm_psc' => 'The company has given notice to confirm PSC details.',
            'ef_restriction_psc' => 'The company has issued a restriction notice.',
            'ef_failed_psc' => 'The PSC has failed to provide an update of their changed details.',
        ];

        if($officerId != null) {
            $officerDetails = PersonOfficer::find($officerId);
        }


        $cart = Cart::UpdateOrCreate(
            ['user_id' => $user->id, 'slug' => 'add-new-statement'],
            [
                'user_id' => $user->id,
                'service_name' => 'Add New Company Statement',
                'slug'=>'add-new-statement',
                'order_id' => $order_id,
                'price' => 0,
                'vat' => 0,
                'data' => json_encode([
                    'c_id' => $request->c_id,
                    'statementNotify' => $statementNotifyText[$request->statementNotify] ?? null,
                    'psc_statement' => $pscStatementText[$request->psc_statement] ?? null,
                    'psc_linked' => $pscLinkedText[$request->psc_linked] ?? null,
                    'officer_details' => $officerDetails ? [
                        'officer_id' => $officerDetails->id,
                        'full_name' => $officerDetails->first_name . ' ' . $officerDetails->last_name,
                        'dob_day' => $officerDetails->dob_day,
                    ] : null,
                    'notificationDate' => $request->notificationDate ?? null,

                    // Add other fields as needed
                ])
            ]
        );

        $company = Companie::where(['user_id' => $user->id, 'order_id' => $order_id, 'id' => $request->c_id ])->update([
            'statement' => json_encode([
                'c_id' => $request->c_id,
                'statementNotify' => $statementNotifyText[$request->statementNotify] ?? null,
                'psc_statement' => $pscStatementText[$request->psc_statement] ?? null,
                'psc_linked' => $pscLinkedText[$request->psc_linked] ?? null,
                'notificationDate' => $request->notificationDate ?? null,
                'officer_details' => $officerDetails ? [
                    'officer_id' => $officerDetails->id,
                    'full_name' => $officerDetails->first_name . ' ' . $officerDetails->last_name,
                    'dob_day' => $officerDetails->dob_day,

                ] : null,
            ])
        ]);

        return redirect()->route('accepted-company',['order'=>$order_id,'c_id'=>$request->c_id])->with('message', 'Statement Updated Successfully And Added To Cart');



        // return view('frontend.companies.company_statement', compact('order_id', 'appointmentsList', 'cartCount'));
    }
    public function viewCart(Request $request)
    {
        $order_id = $request->order;

        $user = Auth::user();
        $cart = Cart::where('order_id', $order_id)->where('user_id', $user->id)->get();
        $order = $this->orderService->getOrder($order_id);

        $net_total = $cart->sum('price');
        $vat = $cart->sum('vat');
        $total_price = $net_total + $vat;



        return view('frontend.companies.cart', compact('order_id', 'order', 'cart','net_total','vat','total_price'));
    }

    public function cartPay(Request $request){

        if($request->total_price == '0'){
            try{
                $order = $request->order_id.'/'.uniqid().Str::random(10);
                $company_details = Companie::where('order_id',$request->order_id)->first();

                $edit_cart_payemnt = new companyEditTransaction ;
                $edit_cart_payemnt->order_id = $order;
                $edit_cart_payemnt->company_order_id = $request->order_id;
                $edit_cart_payemnt->user_id = auth()->user()->id;
                $edit_cart_payemnt->service_data = null;
                $edit_cart_payemnt->company_name = $company_details->companie_name;
                $edit_cart_payemnt->company_number =$company_details->id;
                $edit_cart_payemnt->payment_status = 1;
                $edit_cart_payemnt->base_amount = $request->net_total;
                $edit_cart_payemnt->vat = $request->vat;
                $edit_cart_payemnt->amount = $request->total_price;
                $edit_cart_payemnt->order_note = $request->order_note;
                $edit_cart_payemnt->recipient_name = $request->recipient_name;
                $edit_cart_payemnt->recipient_email = $request->recipient_email;
                $edit_cart_payemnt->uuid =Str::uuid()->toString();
                $edit_cart_payemnt->save();

                $carts = Cart::where('order_id', $request->order_id)->where('user_id', auth()->user()->id)->get();
                // dd($carts);
                foreach ($carts as $key => $cart) {
                   $move_cart_data = companyEditRequest::create([
                        'user_id'=>$cart->user_id,
                        'order_id'=>$cart->order_id,
                        'payment_order_id'=>$order,
                        'service_name'=>$cart->service_name,
                        'slug'=>$cart->slug,
                        'address_id'=>$cart->address_id,
                        'forward_address_id'=>$cart->forward_address_id,
                        'price'=>$cart->price,
                        'vat'=>$cart->vat,
                        'effective_date'=>$cart->effective_date,
                        'appointment_id'=>$cart->appointment_id,
                        'company_account_value'=>$cart->company_account_value,
                        'add_on_service'=>$cart->add_on_service,
                        'data'=>$cart->data,
                    ]);
                    if($move_cart_data){
                        $cart->delete();
                    };
                };
                $company_id = $company_details->id;
                $company_order_id = $request->order_id;
                $this->editCompanyMailNotification($order,1);
            return view('frontend.payment_getway.Thankyou',compact(['company_order_id','company_id']));

            }catch(\Exception $e){
                $error = $e->getMessage();
            // dd($error);

            }
            // $is_record_exist = companyEditTransaction::where('company_order_id',$request->order_id)->first();
            // if($is_record_exist){
            //     $is_record_exist->delete();
            // }




        }else{
            // $is_record_exist = companyEditTransaction::where('company_order_id',$request->order_id)->first();
            // if($is_record_exist){
            //     $is_record_exist->delete();
            // }

            $order = $request->order_id.'/'.uniqid().Str::random(10);
            $company_details = Companie::where('order_id',$request->order_id)->first();

            $edit_cart_payemnt = new companyEditTransaction ;
            $edit_cart_payemnt->order_id = $order;
            $edit_cart_payemnt->company_order_id = $request->order_id;
            $edit_cart_payemnt->user_id = auth()->user()->id;
            $edit_cart_payemnt->service_data = null;
            $edit_cart_payemnt->company_name = $company_details->companie_name;
            $edit_cart_payemnt->company_number =$company_details->id;
            $edit_cart_payemnt->base_amount = $request->net_total;
            $edit_cart_payemnt->vat = $request->vat;
            $edit_cart_payemnt->amount = $request->total_price;
            $edit_cart_payemnt->order_note = $request->order_note;
            $edit_cart_payemnt->recipient_name = $request->recipient_name;
            $edit_cart_payemnt->recipient_email = $request->recipient_email;
            $edit_cart_payemnt->uuid =Str::uuid()->toString();
            $edit_cart_payemnt->save();

            $details = [
                'order_id' => $order,
                'total_amount' => $request->total_price,
                'accept_url' => route('cart-payment-success'),
                'declined_url' => route('cart-payment-declined'),
                'exception_url' => route('cart-payment-exception'),
                'cancelled_url' => route('cart-payment-cancelled'),
            ];
            return $this->ProcessPayment($request,$details);
        }

    }
    public function ProcessPayment(Request $request,$details){

        // dd($request);
        $payment_mode = env('PAYMENT_ENV','LIVE');
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
            "DECLINEURL" =>$details['declined_url'],
            "EXCEPTIONURL" =>$details['exception_url'],
            "CANCELURL" => $details['cancelled_url'],
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
        try{
            companyEditTransaction::where('order_id',$request->orderID)->update([
                'PAYID'=>$request->PAYID,
                'SHASIGN'=>$request->SHASIGN,
                'payment_status'=>1,
                'ACCEPTANCE' => $request->ACCEPTANCE,
            ]);
            $company_order_id = companyEditTransaction::where('order_id',$request->orderID)->pluck('company_order_id')->first();
            $company_details = Companie::where('order_id',$company_order_id)->first();
            // dd($company_order_id);
            $user_id = auth()->user()->id;
            $carts = Cart::where('order_id',  $company_order_id)->where('user_id', $user_id)->get();
                foreach ($carts as $key => $cart) {
                    $move_cart_data =  companyEditRequest::create([
                        'user_id'=>$cart->user_id,
                        'order_id'=>$cart->order_id,
                        'payment_order_id'=>$request->orderID,
                        'service_name'=>$cart->service_name,
                        'slug'=>$cart->slug,
                        'address_id'=>$cart->address_id,
                        'forward_address_id'=>$cart->forward_address_id,
                        'price'=>$cart->price,
                        'vat'=>$cart->vat,
                        'effective_date'=>$cart->effective_date,
                        'appointment_id'=>$cart->appointment_id,
                        'company_account_value'=>$cart->company_account_value,
                        'add_on_service'=>$cart->add_on_service,
                        'data'=>$cart->data,
                    ]);

                    if($move_cart_data){
                        $cart->delete();
                    };
                };
                $this->editCompanyMailNotification($request->orderID,0);
            $company_id = $company_details->id;
            return view('frontend.payment_getway.success',compact('company_order_id',"company_id"));
        }catch(\Exception $e){
            $error = $e->getMessage();
            // dd($error);
        }

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
    public function editAuthCode(Request $request)
    {
        $request->validate([
            'auth_code' => 'required|string',
        ]);

        $order_id = $request->order;
        $auth_code = $request->auth_code;

        $user = Auth::user();

        $order = Order::where('order_id', $order_id)->where('user_id', $user->id)->first();

        if ($order) {

            $order->auth_code = $auth_code;
            $order->save();

            $vat = 0.00;
            if ($request->has('price') && $request->price !== null) {
                $vat = $request->price * 0.20; // Assuming 20% VAT rate
            }

            $cart = Cart::updateOrCreate(
                ['user_id' => $user->id, 'slug' => "edit-auth-code"],
                [
                    'service_name' => "Update Auth Code",
                    'order_id' => $order_id,
                    'price' => $request->price ?? 0.00,
                    'vat' => $vat,
                    'data'=>json_encode([
                        'auth_code' => $order->auth_code,
                    ])
                ]
            );

            return response()->json(['message' => 'Auth code updated successfully and added to the cart']);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }


    public function deleteCart(Request $request)
    {
        try {

            $cart = Cart::findOrFail($request->id);

            // if($cart->slug == "add-new-statement") {
            //     $order_id = $cart->order_id;
            //     $user_id = $cart->user_id;
            //     $cart_data = json_decode($cart->data);
            //     $c_id = $cart_data->c_id;

            //     $company = Companie::where(['user_id' => $user_id, 'order_id' => $order_id, 'id' => $c_id ])->update([
            //         'statement' => null,
            //     ]);
            // }

            $cart->delete();

            return response()->json(['message' => 'Cart deleted successfully']);

        } catch (\Exception $e) {

            return response()->json(['error' => 'Error deleting cart item'], 500);
        }
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

    public function viewShop(Request $request)
    {
        // return $request->all();

        $order_id = $request->order;

        $user = Auth::user();

        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();

        $services = Addonservice::with('features')->whereNotIn('price',['0.00','0','0.0'])->whereNotNull('slug')->get();

        return view('frontend.companies.shop', compact('cartCount','user', 'order_id', 'services'));
    }

    public function saveShopServicesInCart(Request $request)
    {
        // return $request->all();
        $user = Auth::user();
        $service_id = $request->id;
        $order_id = $request->order_id;
        $service = Addonservice::FindOrFail($service_id);
        $company_details = Companie::FindOrFail($request->c_id);
        $order = $this->orderService->getOrder($order_id);


        $request->validate([
            'id' => 'required',
            'order_id' => 'required',
        ]);

        $vat = null;
        if ($service->price !== null) {
            $vat = $service->price * 0.20;
        }

        $cart = Cart::updateOrCreate(
            ['user_id' => $user->id, 'slug' => $service->slug],
            [
                'service_name' => $service->service_name,
                'order_id' => $order_id,
                'price' => $service->price,
                'vat' => $vat,
                'add_on_service' => 1,
                'data' => json_encode([
                    'company_id' => $request->c_id,
                    'order_id'  => $order_id,
                    'company_number' => $order->company_number,
                    'company_name' => $company_details->companie_name,
                ])
            ]
        );

        return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
    }

    public function viewDocument(Request $request)
    {
        // return $request->all();

        $order_id = $request->order;

        $user = Auth::user();

        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();
        $getCompanyNoDate =  companyXmlDetail::where('order_id',$order_id)->get()->first();
        if($getCompanyNoDate&&@($getCompanyNoDate['pdf_content']!=''))
        {
            $pdfcontent = true;
        }else{
            $pdfcontent = false;
        }

        return view('frontend.companies.document', compact('cartCount','user', 'order_id', 'pdfcontent'));
    }


    public function viewCompanyServices(Request $request)
    {
        // return $request->all();

        $order_id = $request->order;

        $user = Auth::user();

        $cartCount = Cart::where('order_id', $order_id)->Where('user_id', $user->id)->count();


        return view('frontend.companies.company_services', compact('cartCount','user', 'order_id', ));
    }


}
