<?php

namespace App\Services\Package;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Faq;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class PackageService
{
    /**
     * Package listing
     */
    public function index($search = "")
    {
        $packages = Package::with('features')->whereNull('deleted_at');
        if (!empty($search)) {
            $packages = $packages->where('package_name', 'like', "%{$search}%")->paginate(2);
        }else{
            $packages = $packages->paginate(2);
        }
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
        $package->online_formation_within = $request['online_formation_within'];
        $package->facilities = (isset($request['facility'])) ? json_encode($request['facility']) : '';
        $package->save();

        if(data_get($request,'package_icon')){
            $package->addMediaFromRequest('package_icon')->toMediaCollection('package_icon');
        }

        return $package->id;
    }


    /**
     * Get single package as per package ID
     * @param string $id
     */
    public function getPackage($id)
    {
        $package = Package::findOrFail($id);
        return $package;
    }
    public function edit($id)
    {
        $package = Package::with('features','faqs')->where("id",$id)->first();
        return $package;
    }

    public function update($request, $id){
        $package = Package::findOrFail($id);
        $package->package_name = $request['name'];
        $package->package_price = $request['price'];
        $package->short_description = $request['short_desc'];
        $package->description = $request['description'];
        $package->notes = $request['notes'];
        $package->online_formation_within = $request['online_formation_within'];
        $package->facilities = (isset($request['facility'])) ? json_encode($request['facility']) : '';
        $package->save();

        if(data_get($request,'package_icon')){
            // Delete existing image
            $packageIcon  = $package->getFirstMedia('package_icon');
            if ($packageIcon) {
                $packageIcon->delete();
            }
            $package->addMediaFromRequest('package_icon')->toMediaCollection('package_icon');
        }

        $temp =[];
        $tmp =[];

        if(!empty($request['features'])){
            Feature::where('package_id',$id)->delete();
            foreach($request['features'] as $features){
                $temp['feature'] = $features;
                $temp['package_id'] = $id ;

                Feature::create($temp);
            }
        }

        if(!empty($request['faq'])){
            Faq::where('package_id',$id)->delete();
            foreach(array_values($request['faq']) as $k=> $value){
                $tmp['package_id'] = $id;
                $tmp['question'] = $value['question'];
                $tmp['answer'] = $value['answer'];
                Faq::create($tmp);
            }

        }
        return true;
    }
    public function destroy($id){
        $package = Package::FindOrFail($id)->delete();
        return $package;
    }
}
