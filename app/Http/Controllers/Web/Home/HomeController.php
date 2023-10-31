<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Services\Package\PackageService;
use App\Models\Package;
use App\Models\BusinessBanking;
use App\Models\Accounting;
use App\Services\Facility\FacilityService;
use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    public function __construct(protected PackageService $packageService,
    protected FacilityService $facilityService)
    { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()){

            if (auth()->user()->hasRole(User::SUPERADMIN) || auth()->user()->hasRole(User::SUBADMIN) ){
                return redirect()->route('admin.dashboard');

              }
        }
        $packages = $this->packageService->LimitedPackages();
        $facilitys = $this->facilityService->getFacilitys();
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();

        // dd($packages);
        $facilityList = [];
        foreach ($packages as $package) {
            $facilityList[$package->id] = (!empty($package->facilities)) ? json_decode($package->facilities) : [];
        };
        return view('frontend.user_index', compact('packages', 'facilitys', 'facilityList','businessdata','accounting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
