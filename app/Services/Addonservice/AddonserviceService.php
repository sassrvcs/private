<?php

namespace App\Services\Addonservice;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Addonservice;
use App\Models\Feature;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class AddonserviceService
{
    /**
     * Addonservice listing
     */
    public function index()
    {
        $addonservices = Addonservice::with('addonservices')->get();
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
            $addonservices = new Addonservice();
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
}
