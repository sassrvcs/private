<?php

namespace App\Http\Controllers\Web\Package;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Mail\ServicePurchaseMail;
use App\Mail\UserRegistration;
use App\Models\Addonservice as ModelsAddonservice;
use App\Models\Cms;
use App\Models\Country;
use App\Models\Facility;
use App\Services\User\UserService;

use App\Models\Package;
use App\Services\Facility\FacilityService;
use App\Services\Package\PackageService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BusinessBanking;
use App\Models\Accounting;
use App\Models\Address;
use App\Models\Nationality;
use App\Models\orderServiceTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use PDF;
class PackageController extends Controller
{
    public function __construct(
        protected PackageService $packageService,
        protected FacilityService $facilityService,
        protected UserService $userService,
    ) { }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $packages  = $this->packageService->LimitedPackages();
        $facilitys = $this->facilityService->getFacilitys();

        // dd($packages);
        $facilityList = [];
        foreach ($packages as $package) {
            $facilityList[$package->id] = (!empty($package->facilities)) ? json_decode($package->facilities) : [];
        };

        return view('frontend.package.package',compact('packages', 'facilitys', 'facilityList'));
    }

    public function digital()
    {
        $packages  = Package::with('features')->where('package_type','shares')->where('package_name', 'like', "%Digital%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');
        // $facilitys = $this->facilityService->getFacilitys();
        // $facilityList = (!empty($packages->facilities)) ? json_decode($packages->facilities) : [];
        // if (!empty($facilityList)) {
        //     $facilityListDesc = Facility::whereIn('id',$facilityList)->get()->pluck('name');
        // }else{
        //     $facilityListDesc = [];
        // }
        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')->getUrl();
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));

    }
    public function privacy()
    {
        $packages  = Package::with('features')->where('package_type','shares')->where('package_name', 'like', "%Privacy%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function professional()
    {
        $packages  = Package::with('features')->where('package_type','shares')->where('package_name', 'like', "%Professional%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function prestige()
    {
        $packages  = Package::with('features')->where('package_type','shares')->where('package_name', 'like', "%Prestige%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        // dd($icon);
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function all_inclusive()
    {
        $packages  = Package::with('features')->where('package_type','shares')->where('package_name', 'like', "%All Inclusive%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function non_residents()
    {
        $packages  = Package::with('features')->where('package_type','Non_Residents')->where('package_name', 'like', "%Non Residents%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function llp()
    {
        $packages  = Package::with('features')->where('package_type','LLP')->where('package_name', 'like', "%LLP%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function guarantee_package()
    {
        $packages  = Package::with('features')->where('package_type','Guarantee')->where('package_name', 'like', "%Guarantee%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.guarantee_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
        // dd($packages);
        // return view('frontend.package.guarantee_package',compact('package_details'));
    }
    public function e_seller()
    {
        $packages  = Package::with('features')->where('package_type','Eseller')->where('package_name', 'like', "%Eseller%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        // dd($icon);
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function plc()
    {
        $packages  = Package::with('features')->where('package_type','PLC_Package')->where('package_name', 'like', "%PLC%")->whereNull('deleted_at')->first();
        if(!$packages)return redirect('/');

        $features = $packages->features;
        $faqs = $packages->faqs;
        $icon = @$packages->getFirstMedia('package_icon')?->getUrl();
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        // dd($icon);
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting','full_sec_price'));
    }
    public function get_services($package_name)
    {
            // $secondPath = $package_name;
            // $secondPath = str_replace('-', ' ', $secondPath);
            // $secondPath = ucfirst($secondPath);
            // dd($package_name);
            $aditional_services_section = ModelsAddonservice::with('features')->whereNot('slug',['directors-service-address','registered-office-address','business-telephone-services'])->whereNot('slug', 'like', "%{$package_name}%")->whereNot('price',['0.00','0','0.0'])->get();


            $services = ModelsAddonservice::with('features')->where('slug', 'like', "%{$package_name}%")->first();
            if (!$services) return redirect('/404');

            $features = $services->features;
            $businessdata = BusinessBanking::get();
            $accounting = Accounting::get();
            $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();


            return view('frontend.service.service',compact('services', 'features','businessdata','accounting','full_sec_price','package_name','aditional_services_section'));

    }
    public function business_logo()
    {
        $content = Cms::where('title','business-logo')->first();
        if(!$content)return redirect('/404');
        $id = $content->id;
        $title = $content->title;
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();
        return view('frontend.service.business_logo',compact('content','businessdata','accounting','id','title','full_sec_price'));
    }
    public function share_business_idea()
    {
        $package_name = "share-business-idea";
        $aditional_services_section = ModelsAddonservice::with('features')->whereNot('slug',['directors-service-address','registered-office-address','business-telephone-services'])->whereNot('price',['0.00','0','0.0'])->get();

        $content = Cms::where('title','share-ideas')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();
        return view('frontend.service.share-business-idea',compact( 'content','businessdata','accounting','full_sec_price','aditional_services_section','package_name'));
    }

    public function helping_startups()
    {
        $package_name = "share-business-idea";
        $aditional_services_section = ModelsAddonservice::with('features')->whereNot('slug',['directors-service-address','registered-office-address','business-telephone-services'])->whereNot('price',['0.00','0','0.0'])->get();

        $content = Cms::where('title','helping-startups-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();
        return view('frontend.service.helping-startups',compact( 'content','businessdata','accounting','full_sec_price','aditional_services_section','package_name'));
    }
    public function business_help()
    {
        $package_name = "share-business-idea";
        $aditional_services_section = ModelsAddonservice::with('features')->whereNot('slug',['directors-service-address','registered-office-address','business-telephone-services'])->whereNot('price',['0.00','0','0.0'])->get();

        $content = Cms::where('title','business-help-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();
        return view('frontend.service.business-help',compact( 'content','businessdata','accounting','full_sec_price','aditional_services_section','package_name'));
    }
    public function info_to_set()
    {
        $package_name = "share-business-idea";
        $aditional_services_section = ModelsAddonservice::with('features')->whereNot('slug',['directors-service-address','registered-office-address','business-telephone-services'])->whereNot('price',['0.00','0','0.0'])->get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();


        $content = Cms::where('title','info-to-set-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        return view('frontend.service.info-to-set',compact( 'content','businessdata','accounting','aditional_services_section','package_name','full_sec_price'));
    }

    public function buisness_web_design(){
        return view('frontend.service.buisness_web_design');

    }
    public function loadCompanyService(Request $request,$slug,$id)//
    {
        $countries = Country::all();
        $get_price = ModelsAddonservice::where('id',$id)->pluck('price')->first();

        if($slug=="apostilled-documents-service")
        {
            $prices = ['certificate_of_incorporation'=>99.99,'memo_and_articals'=>99.99,'in01_form'=>99.99,'certificate_of_good'=>99.99,'other_doc'=>99.99,'royal_mail'=>0,'courier'=>17.50,'royal_mail_international'=>13.00,'international_courier'=>40.00];
            $service_name = "Apostilled Documents Service";
            return view('frontend.service.load_services.apostilled-documemnts-service',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="confirmation-statement-service")
        {
            $prices = ['express_service_price'=>54.99,'standard_service_price'=>44.99,'in01_form'=>99.99];
            $service_name = "Confirmation Statement Service";
            return view('frontend.service.load_services.confirmation-statement-service',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="company-dissolution")
        {
            $service_name = "Company Dissolution";
            $prices = ['company_dissolution_price'=>$get_price];

            return view('frontend.service.load_services.company-dissolution-service',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="certification-of-good-standing")
        {
            $service_name = "Certification Of Good Standing";
            $prices = ['certification_price'=>$get_price,'royal_mail'=>0.00,'dhl'=>50.00];
            return view('frontend.service.load_services.certification-of-good-standing',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="company-name-change")
        {
            $service_name = "Company Name Change";
            $prices = ['company_name_change_price'=>$get_price];
            return view('frontend.service.load_services.company-name-change',compact('countries','slug','id','prices','service_name'));
        }
        if ($slug=="dormant-company-accounts") {
            $service_name = "Dormant Company Accounts";
            $prices = ['dormant_company_accounts_price'=>$get_price];
            return view('frontend.service.load_services.dormant-company-accounts',compact('countries','slug','id','prices','service_name'));
        }
        if ($slug=="director-appointment-resignation") {
            $nationality = Nationality::all();
            $service_name = "Director Appointment & Resignation";
            $prices = ['director_appointment_resignation_price'=>$get_price];
            return view('frontend.service.load_services.director-appointment-resignation',compact('countries','slug','id','prices','service_name','nationality'));
        }
        if($slug=="full-company-secretary-service"){
            $service_name = "Company Secretary Service";
            $prices = ['full_company_secretary_service_price'=>$get_price];
            return view('frontend.service.load_services.company-secretary-service',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="issue-of-share-services")
        {
            $service_name = "Issue Of Share Service";
            $prices = ['2_shares'=>79.99,'4_shares'=>89.99,'6_shares'=>99.99,'prepare_file'=>24.99,'prepare_file_myself'=>0.00];
            return view('frontend.service.load_services.issue-of-share-services',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="transfer-of-share-services")
        {
            $service_name = "Transfer Of Share Service";
            $prices = ['2_shares'=>79.99,'4_shares'=>89.99,'6_shares'=>99.99,'prepare_file'=>24.99,'prepare_file_myself'=>0.00];
            return view('frontend.service.load_services.transfer-of-share-services',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="directors-service-address")
        {
            $service_name = "Directors Service Address";
            $prices = ['directors_service_address_price'=>$get_price,'registered_address'=>35.00,'business_address'=>99.00,];
            return view('frontend.service.load_services.directors-service-address',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="registered-office-address")
        {
            $service_name = "Registered Office Address Service";
            $prices = ['registered_office_address_service_price'=>$get_price,'director_address'=>24.99,'business_address'=>99.00,];
            return view('frontend.service.load_services.registered-office-address',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="business-telephone-services")
        {
            $service_name = "Business Telephone Services";
            $prices = ['business_telephone_services_price'=>$get_price,'yearly_price'=>131.89,];
            return view('frontend.service.load_services.business-telephone-services',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="data-protection-registration")
        {
            $service_name = "Data Protection Registration";
            $prices = ['data_protection_registration_price'=>$get_price];
            return view('frontend.service.load_services.data-protection-registration',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="vat-registration")
        {
            $service_name = "VAT Registration";
            $prices = ['vat_registration_price'=>$get_price];
            return view('frontend.service.load_services.vat-registration',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="paye-registration")
        {
            $service_name = "PAYE Registration";
            $prices = ['paye_registration_price'=>$get_price];
            return view('frontend.service.load_services.paye-registration',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="business-email")
        {
            $service_name = "Business Email";
            $prices = ['business_email_price'=>$get_price];
            return view('frontend.service.load_services.business-email',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="business-logo")
        {
            $service_name = "Business Logo Design";
            $price = Cms::where('title','business-logo')->pluck('price')->first();
            $prices = ['business_logo_design_price'=>$price ];
            return view('frontend.service.load_services.business-logo-design',compact('countries','slug','id','prices','service_name'));
        }
        if($slug=="gdpr-compliance-package")
        {
            $service_name = "GDPR Compliance Package";
            $prices = ['gdpr_price'=>$get_price];
            return view('frontend.service.load_services.gdpr-compliance',compact('countries','slug','id','prices','service_name'));
        }
        return redirect('/404');
    }
    public function submitCompanyService(Request $request)
    {
        // dd($request->all());
        $user_id =null;
        if(auth()->user())
        {
            $user_id = auth()->user()->id;
        }
        // dd($request->all());
        $company_service = new orderServiceTransaction();
        $company_service->order_id = $this->generateServiceOrderId();
        $company_service->user_id= $user_id;
        $company_service->service_name = $request->service_name;
        $company_service->service_data = json_encode($request->all());
        $company_service->service_slug = $request->slug;
        $company_service->company_name = $request->company_name;
        $company_service->company_number = $request->company_number;
        $company_service->service_payment_status = 0;
        $company_service->base_amount = $request->allPriceAmnt;
        $company_service->vat = $request->totalVatAmount;
        $company_service->amount = $request->totalGrandAmount;
        $company_service->invoice_data = $request->invoice_data;
        $company_service->save();
        $service_id = $company_service->id;
        return redirect()->route('service-checkout',['id'=>$service_id]);

    }
    public function servicePaymentSuccess(Request $request)
    {
        $order_arr = explode('/',$request->query('orderID'));
        $order_id =$order_arr[0];

        $order_transaction = orderServiceTransaction::where('order_id',$order_id)->first();

        if ($order_transaction) {
            if($order_transaction->service_payment_status==0)
            {
           $update =  orderServiceTransaction::where('order_id',$order_id)->update([
                'uuid' =>$request->query('orderID'),
                'status'=>$request->query('STATUS'),
                'PAYID'=>$request->query('PAYID'),
                'ACCEPTANCE'=>$request->query('ACCEPTANCE'),
                'SHASIGN'=>$request->query('SHASIGN'),
                'service_payment_status'=>1

            ]);
            }
            // if ($update) {
                $userDetails = (Auth::user());
                $filename = 'Invoice'.uniqid().Str::random(10).'.pdf';

                $name = "Myname";
                $pdf = $this->purchasedServiceInvoice($id=null,$order_transaction->id);
                $filePath = storage_path('app/public/attachments/'.$filename);
                file_put_contents($filePath, $pdf );
                // dd($filePath);
                try {
                    // $status =  Mail::to('debasish.ghosh@technoexponent.co.in')->send(new ServicePurchaseMail ($order_transaction,$userDetails,$filePath));
                    $status =  Mail::to($userDetails->email)->send(new ServicePurchaseMail ($order_transaction,$userDetails,$filePath));
                 } catch (\Throwable $th) {
                    //  throw $th;
                 }
                return view('frontend.payment_getway.success');

            // }else{
            //     echo "problem occur,please contact admin";
            // }
        }




    }
    public function serviceValidateAuth(Request $request,$service_transaction_id)
    {
        $service_transaction_details = orderServiceTransaction::where('id',$service_transaction_id)->first();
        if ($service_transaction_details) {
            if($service_transaction_details->service_payment_status==0)
            {

            $service_transaction_details = ['id'=>$service_transaction_id,'service_name'=>$service_transaction_details->service_name,'service_slug'=>$service_transaction_details->service_slug,'total_amount'=>$service_transaction_details->amount,'base_amount'=>$service_transaction_details->base_amount,'vat'=>$service_transaction_details->vat,'order_id'=>$service_transaction_details->order_id];
            $service_id = $request->service_id;
            $countries = Country::all();
            $user= [];
            if(auth()->user()) {
                $user = User::with('address','orders','orders.myCompany', 'companies')->findOrFail(auth()->user()->id);

            }
            return view('frontend.service.checkout.service-checkout', compact('countries', 'user','service_id','service_transaction_details'));
        }else{
        return view('frontend.payment_getway.success');

        }

        }else{
            return redirect('/404');
        }
    }
    public function service_login_check(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|string',
        ],[
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                orderServiceTransaction::where('id',$request->service_transaction_id)->update(['user_id'=>auth()->user()->id]);
                return redirect()->back();
            } else {
                return back()->with('error', 'Invalid credentials');
            }
        }
    }
    public function serviceRegisterUser(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'required|numeric|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users',
            'confirm_email' => 'sometimes|same:email',
            'password' => 'required|min:8|string',
            'post_code' => 'required',
            'house_no' => 'required',
            'street' => 'required',
            'town' => 'required',
            'billing_country' => 'required',
            'chek1' => 'required',
            'chek2' => 'required',
            'county' => 'required'
        ],[
            'title.required'    => 'Title is required.',
            'forename.required' => 'Forename is required.',
            'surname.required'  => 'Surname is required.',
            'phone.required'    => 'Phone number is required.',
            'phone.required'    => 'Phone number is required.',
            'phone.numeric'     => 'Please enter valid phone number.',
            'email.required'    => 'Email is required',
            'email.email'       => 'Please provide valid email',
            'confirm_email.required'  => 'Confirm email is required',
            'password.required' => 'Password is required',
            'street.required'   =>'This field is required.',
            'town.required'     =>'This field is required.',
            'post_code.required'=>'This field is required.',
            'house_no.required' =>'This field is required.',
            'billing_country.required' =>'This field is required.',
            'chek1.required'    =>'This field is required.',
            'chek2.required'    =>'This field is required.',
            'county.required'   =>'This field is required.',
        ]);

        if(null !==($request->input('register_form')) && $request->input('register_form')=='registration'){
            $validate = Validator::make($request->all(), [
                'title' => 'required',
                'forename' => 'required|alpha',
                'surname' => 'required|alpha',
                'phone' => 'required|numeric|digits_between:8,13',
                'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users',
                'confirm_email' => 'sometimes|same:email',
                'password' => 'required|min:8|string',
                'post_code' => 'required',
                'house_no' => 'required',
                'street' => 'required',
                'town' => 'required',
                'billing_country' => 'required',
                'chek1' => 'required',
                'chek2' => 'required',
                'county' => 'required'

            ],[
                'title.required'    => 'Title is required.',
                'forename.required' => 'Forename is required.',
                'surname.required'  => 'Surname is required.',
                'phone.required'    => 'Phone number is required.',
                'phone.required'    => 'Phone number is required.',
                'phone.numeric'     => 'Please enter valid phone number.',
                'email.required'    => 'Email is required',
                'email.email'       => 'Please provide valid email',
                'confirm_email.required'  => 'Confirm email is required',
                'password.required' => 'Password is required',
                'street.required'   =>'This field is required.',
                'town.required'     =>'This field is required.',
                'post_code.required'=>'This field is required.',
                'house_no.required' =>'This field is required.',
                'billing_country.required' =>'This field is required.',
                'chek1.required'    =>'This field is required.',
                'chek2.required'    =>'This field is required.',
                'county.required'   =>'This field is required.',

            ]);
        }

        if($validate->fails()) {
            // dd($validate->errors());
            return back()->withErrors($validate->errors())->withInput();
        } else {

            // Mail::send('frontend.mail.user_registration', ['name' => $request->forename], function($message) use($request){
            //     $message->to($request->email);
            //     $message->subject('Registration successful');
            // });
            try {
                Mail::to($request->email)->send(new UserRegistration($request->forename));
            } catch (\Throwable $th) {
                //throw $th;
            }

            $response = $this->userService->store($request);
            if ($response) {
                // if(isset($request->checkout)) {
                //     $checkout = $this->checkoutService->doCheckoutFinalStep($request, $response);
                //     if ($checkout) {
                        Auth::login($response);
                        orderServiceTransaction::where('id',$request->service_transaction_id)->update(['user_id'=>auth()->user()->id]);
                        // return redirect()->route('my-account');
                        return redirect()->back();
                    // }
                // } else {
                //     return redirect()->route('clientlogin')->with('message', 'Registration successfull');
                // }
            }else{
                return redirect('/404');
            }
        }
    }
    public function purchasedServiceListAdmin(Request $request)
    {
        $search  = $request->query('search');
        $fullDate = $request->query('dateRange');
        $dateRange = $request->query('dateRange')!=null?explode('/',$request->query('dateRange')):null;
       $purchased_service =  orderServiceTransaction::where('service_payment_status',1)->when($request->query('search')!=null,function($query) use ($search){
        return $query->where('order_id', 'like', '%'.$search.'%')->orWhere('company_name', 'like', '%'.$search.'%');
     })->when($request->query('dateRange')!=null,function($query)  use ($dateRange){
         return $query->whereDate('updated_at', '>=', $dateRange[0])->whereDate('updated_at', '<=', $dateRange[1]);
     })->orderBy('updated_at','desc')->paginate(25);
    //    $purchased_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(25);
       return view('admin.service.purchased-service-list',compact('purchased_service','fullDate','search'));
    }
    public function expiredServiceListAdmin(Request $request)
    {
        $search  = $request->query('search');
        $fullDate = $request->query('dateRange');
        $dateRange = $request->query('dateRange')!=null?explode('/',$request->query('dateRange')):null;
       $oneYearAgo = Carbon::now()->subYear();
       $expired_service =  orderServiceTransaction::where('service_payment_status',1)->when($request->query('search')!=null,function($query) use ($search){
        return $query->where('order_id', 'like', '%'.$search.'%')->orWhere('company_name', 'like', '%'.$search.'%');
     })->when($request->query('dateRange')!=null,function($query)  use ($dateRange){
         return $query->whereDate('updated_at', '>=', $dateRange[0])->whereDate('updated_at', '<=', $dateRange[1]);
     })->where('updated_at','<=',$oneYearAgo)->orderBy('updated_at','asc')->paginate(25);
    //    dd($expired_service);
    //    $purchased_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(25);
       return view('admin.service.expired-service-list',compact('expired_service','fullDate','search'));
    }
    public function purchasedServiceList(Request $request)
    {
       $purchased_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->where('service_payment_status',1)->orderBy('updated_at','desc')->paginate(25);
    //    $purchased_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(25);
       return view('frontend.service.purchased_services.purchasedServicesList',compact('purchased_service'));
    }
    public function expiredServiceList(Request $request)
    {
       $oneYearAgo = Carbon::now()->subYear();
       $expired_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->where('service_payment_status',1)->where('updated_at','<=',$oneYearAgo)->orderBy('updated_at','asc')->paginate(25);
    //    dd($expired_service);
    //    $purchased_service =  orderServiceTransaction::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(25);
       return view('frontend.service.purchased_services.expiredServicesList',compact('expired_service'));
    }

    public function purchasedServiceDetails(Request $request)

    {
        $id = $request->id;

        $purchased_service =  orderServiceTransaction::where('id',$id)->first();
        $slug = $purchased_service->service_slug;
        $service_data = json_decode($purchased_service->service_data);
        $role = get_role();
        // dd($slug);
        // if ($slug=="apostilled-documents-service") {
            if($role=='admin')
        {
            return view('frontend.service.purchased_services.details.service_purchased_admin',compact('purchased_service','service_data','slug'));
        }else{
            return view('frontend.service.purchased_services.details.service_purchased',compact('purchased_service','service_data','slug'));
        }
        // }
        // return view('frontend.service.purchased_services.purchasedServiceDetails',compact('purchased_service'));
    }
    public function purchasedServiceInvoice($id,$pdf_id=null)
    {
        $user = auth()->user();
        if($pdf_id!=null)
        {
            $id = $pdf_id;
        }
        $purchased_service =  orderServiceTransaction::where('id',$id)->first();
        $slug = $purchased_service->service_slug;
        $address = null;
        $order_id = $purchased_service->order_id;
        $service_data = json_decode($purchased_service->service_data);
        if(isset($service_data->invoice_addr) && $service_data->invoice_addr=="Yes")
        {
            $address = construct_service_address((array)$service_data);

        }else{
            $address = construct_service_invoice_address((array)$service_data);
        }
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
            if ($billing_address!=null) {
                $address = construct_address($billing_address->toArray());
            }else{
                $address = null;

            }
            // $address = null;

            // dd($user->id);
        }



        $total = $purchased_service->amount;
        $base_amount = $purchased_service->base_amount;
        $total_vat =$purchased_service->vat;
        $invoice_data = $purchased_service->invoice_data;
        $data = [
            'order_id' => $order_id,
            'user' => $user,
            'invoice_date' => date('d/m/Y', strtotime($purchased_service->updated_at)),
            'invoice_ref' =>$purchased_service->PAYID,
            'billing_address'=>$address,
            'total_amount' => $total,
            'base_amount' => $base_amount,
            'total_vat' => $total_vat,
            'invoice_data' => $invoice_data
        ]; // Convert the model to an array

        // dd($data);
        // return view('PDF.purchasedServiceInvoice', $data);
        $pdf = PDF::loadView('PDF.purchasedServiceInvoice', $data);
        if($pdf_id!=null)
        {
            $pdf->render();
            return $pdf->output();
        }
        return $pdf->stream();
    }
    private function generateServiceOrderId()
    {
        // $orderId = date('ims')-rand(10,99);
       list($usec, $sec) = explode(" ", microtime());
        $id =  ($usec+$sec);
        $id = explode(".", $id);
        $orderId = @$id[0].@$id[1];
        $dupOrder = orderServiceTransaction::where('order_id', $orderId)->first();
        if ($dupOrder) {
            $this->generateOrderId();
        }
        return $orderId;
    }
}
