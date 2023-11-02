<?php

namespace App\Http\Controllers\Web\Package;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
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
            return view('frontend.service.service',compact('services', 'features',));

    }
    public function business_logo()
    {
        $content = Cms::where('title','business-logo')->first();
        if(!$content)return redirect('/404');
        $content = $content->description;
        return view('frontend.service.business_logo',compact('content',));
    }
    public function share_business_idea()
    {
        $content = Cms::where('title','share-ideas')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        return view('frontend.service.share-business-idea',compact( 'content',));
    }

    public function helping_startups()
    {
        $content = Cms::where('title','helping-startups-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        return view('frontend.service.helping-startups',compact( 'content',));
    }
    public function business_help()
    {
        $content = Cms::where('title','business-help-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        return view('frontend.service.business-help',compact( 'content',));
    }
    public function info_to_set()
    {
        $content = Cms::where('title','info-to-set-new')->first();
        if(!$content)return redirect('/');
        $content = $content->description;
        return view('frontend.service.info-to-set',compact( 'content',));
    }
    public function loadCompanyService($slug,$id)
    {
        $countries = Country::all();
        if($slug=="apostilled-documents-service")
        {
            return view('frontend.service.load_services.apostilled-docuemnts-service',compact('countries','slug','id'));
        }
    }
    public function submitCompanyService(Request $request)
    {
        dd($request->all());
    }
}
