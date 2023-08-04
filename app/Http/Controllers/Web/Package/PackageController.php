<?php

namespace App\Http\Controllers\Web\Package;

use App\Http\Controllers\Controller;
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

        $facilityList = [];
        foreach ($packages as $package) {
            $facilityList[$package->id] = json_decode($package->facilities);
        }

        // dd($facilityList);
        // dd($packages->facilities);
        // Get all session data as an array
        // $data = Session::get('cart');
        // dd( json_decode($packages[0]->facilities) );

        return view('frontend.package.package',compact('packages', 'facilitys', 'facilityList'));
    }
}