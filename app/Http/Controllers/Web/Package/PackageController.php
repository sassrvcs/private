<?php

namespace App\Http\Controllers\Web\Package;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Services\Facility\FacilityService;
use App\Services\Package\PackageService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        $packages  = $this->packageService->index();
        $facilitys = $this->facilityService->getFacilitys();

        // dd($packages);
        $facilityList = [];
        foreach ($packages as $package) {
            $facilityList[$package->id] = (!empty($package->facilities)) ? json_decode($package->facilities) : [];
        };

        return view('frontend.package.package',compact('packages', 'facilitys', 'facilityList'));
    }
    public function guarantee_package()
    {
        $package  = Package::where('package_type','guarantee')->first();
        if($package)
        {
            $package_details = ['price'=>$package->package_price,'package_id'=>$package->id];
        }else{
            $package_details = ['price'=>'-','package_id'=>''];

        }
        // dd($packages);
        return view('frontend.package.guarantee_package',compact('package_details'));
    }
}
