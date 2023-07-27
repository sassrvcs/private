<?php

namespace App\Services\Package;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Package;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class PackageService
{
    /**
     * Package listing
     */
    public function index()
    {
        $packages = Package::with('features')->whereNull('deleted_at')->get();
        return $packages;
    }

    public function store($request)
    {

        $package = new Package();
        $package->package_name = $request['name'];
        $package->package_price = $request['price'];
        $package->short_description = $request['short_desc'];
        $package->description = $request['description'];
        $package->notes = $request['notes'];
        $package->save();

        return $package->id;


    }
    public function edit($id)
    {
        $package = Package::with('features','faqs')->where("id",$id)->first();
        return $package;
    }
    public function destroy($id){
        $package = Package::FindOrFail($id)->delete();
        return $package;
    }
}
