<?php

namespace App\Services\Addon;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Addonservice as Addon;
use App\Models\Feature;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class AddonService
{
    /**
     * Addonservice listing
     */
    public function index()
    {
        $addonservices = Addon::with('features')->get();
        return $addonservices;
    }

    /**
     * Store addon service
     * @param array $request
     * @return string $service_id
     */
    public function store($request)
    {
        return DB::transaction(function () use ($request) {
            $addonservices = new Addon();
            $addonservices->service_name = $request['name'];
            $addonservices->price = $request['price'];
            $addonservices->short_desc = $request['short_desc'];
            $addonservices->long_desc = $request['description'];
            $addonservices->save();

            $features=[];
            if($addonservices) {

                foreach(data_get($request,'features') as $features){
                    $temp['feature'] = $features;
                    $temp['service_id'] = $addonservices->id ;
                    $temp['created_at'] = now();
                    $temp['updated_at'] = now() ;
                    $featuresArr[] = $temp;
                }

                Feature::insert($featuresArr);
            }

            return $addonservices->id;
        });
    }

    public function edit($id)
    {
        $service = Addon::with('features')->where("id",$id)->first();
        return $service;
    }

    public function update($request, $id)
    {
        $service = Addon::findOrFail($id);
        $service->service_name = $request['name'];
        $service->price = $request['price'];
        $service->short_desc = $request['short_desc'];
        $service->long_desc = $request['description'];
        $service->save();

        $temp =[];

        if(!empty($request['features'])) {
            Feature::where('service_id',$id)->delete();
            foreach($request['features'] as $features){
                $temp['feature'] = $features;
                $temp['service_id'] = $id ;

                Feature::create($temp);
            }
        }

        return true;
    }

    public function destroy($id)
    {
        $service = Addon::FindOrFail($id)->delete();
        return $service;
    }
}
