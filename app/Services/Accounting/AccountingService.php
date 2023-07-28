<?php

namespace App\Services\Accounting;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Accounting;
use App\Models\Feature;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class AccountingService
{
    /**
     * AccountingService listing
     */
    public function index()
    {
        $accounts = AccountingService::get();
        return $accounts;
    }

    /**
     * Store addon service
     * @param array $request
     * @return string $service_id
     */
    public function store($request)
    {
        return DB::transaction(function () use ($request) {
            $accounting = new Accounting();
            $accounting->accounting_software_name = $request['name'];
            $accounting->image = $request['image'];
            $accounting->short_desc = $request['short_desc'];
            $accounting->long_desc = $request['description'];
            $accounting->save();
            return $accounting->id;
        });
    }

    public function edit($id)
    {
        $service = Addonservice::with('features')->where("id",$id)->first();
        return $service;
    }

    public function update($request, $id){
        $service = Addonservice::findOrFail($id);
        $service->service_name = $request['name'];
        $service->price = $request['price'];
        $service->short_desc = $request['short_desc'];
        $service->long_desc = $request['description'];
        $service->save();

        $temp =[];

        if(!empty($request['features'])){
            Feature::where('service_id',$id)->delete();
            foreach($request['features'] as $features){
                $temp['feature'] = $features;
                $temp['service_id'] = $id ;

                Feature::create($temp);
            }
        }

        return true;
    }
    public function destroy($id){
        $service = Addonservice::FindOrFail($id)->delete();
        return $service;
    }
}
