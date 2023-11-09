<?php

namespace App\Http\Controllers\Web\Package;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Mail\ServicePurchaseMail;
use App\Models\Addonservice as ModelsAddonservice;
use App\Models\Cms;
use App\Models\Country;
use App\Models\Facility;
use App\Models\Package;
use App\Services\Facility\FacilityService;
use App\Services\Package\PackageService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BusinessBanking;
use App\Models\Accounting;
use App\Models\Nationality;
use App\Models\orderServiceTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    public function __construct(
        protected PackageService $packageService,
        protected FacilityService $facilityService
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
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));

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
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        // dd($icon);
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.shares_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.guarantee_package',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
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
        return view('frontend.package.other_packages',compact('packages', 'features', 'faqs','icon','businessdata','accounting'));
    }
    public function get_services($package_name)
    {
            // $secondPath = $package_name;
            // $secondPath = str_replace('-', ' ', $secondPath);
            // $secondPath = ucfirst($secondPath);
            // dd($secondPath);
            $services = ModelsAddonservice::with('features')->where('slug', 'like', "%{$package_name}%")->first();
            if (!$services) return redirect('/404');

            $features = $services->features;
            $businessdata = BusinessBanking::get();
            $accounting = Accounting::get();
            return view('frontend.service.service',compact('services', 'features','businessdata','accounting'));

    }
    public function business_logo()
    {
        $content = Cms::where('title','business-logo')->first();
        if(!$content)return redirect('/404');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        return view('frontend.service.business_logo',compact('content','businessdata','accounting'));
    }
    public function share_business_idea()
    {
        $content = Cms::where('title','share-ideas')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();

        return view('frontend.service.share-business-idea',compact( 'content','businessdata','accounting'));
    }

    public function helping_startups()
    {
        $content = Cms::where('title','helping-startups-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        return view('frontend.service.helping-startups',compact( 'content','businessdata','accounting'));
    }
    public function business_help()
    {
        $content = Cms::where('title','business-help-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        return view('frontend.service.business-help',compact( 'content','businessdata','accounting'));
    }
    public function info_to_set()
    {
        $content = Cms::where('title','info-to-set-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        return view('frontend.service.info-to-set',compact( 'content','businessdata','accounting'));
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
            $service_name = "Full Company Secretary Service";
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
        return redirect('/404');
    }
    public function submitCompanyService(Request $request)
    {
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
           $update =  orderServiceTransaction::where('order_id',$order_id)->update([
                'uuid' =>$request->query('orderID'),
                'status'=>$request->query('STATUS'),
                'PAYID'=>$request->query('PAYID'),
                'ACCEPTANCE'=>$request->query('ACCEPTANCE'),
                'SHASIGN'=>$request->query('SHASIGN'),
                'service_payment_status'=>1
            ]);
            // if ($update) {
                try {
                    $status =  Mail::to('debasish.ghosh@technoexponent.co.in')->send(new ServicePurchaseMail ($order_transaction,auth()->user()));
                 } catch (\Throwable $th) {
                     // throw $th;
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
                return view('frontend.service.checkout.service-checkout', compact('countries', 'user','service_id','service_transaction_details'));
            }else
            {
                return view('frontend.service.checkout.service-checkout', compact('countries', 'user','service_id','service_transaction_details'));
            }
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
