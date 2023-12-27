<?php

namespace App\Services\Addon;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Addonservice as Addon;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Service_Faq;
use Illuminate\Support\Facades\Session;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class AddonService
{
    /**
     * Addonservice listing
     */
    public function index($search = "")
    {
        // $package_name = null;
        // $sessionCart = Session::get('cart');
        // $orders = Order::where('user_id', auth()->id())->where('order_id',@$_GET['order'])->first();
        // if(isset($indx))
        // {
        //     $package_name = @$sessionCart[$indx]['package_name'];
        // }else{
        // if (@$orders->cart->package != null)
        // {
        // $package_name = @$orders->cart->package->package_name;
        // }
        // }
        // $addonservices = Addon::with('features')->whereNot('price', '0')->where('add_on_type','REGEXP',$package_name)->whereNot('price', '0.00');
        $addonservices = Addon::with('features')->whereNot('price', '0')->whereNot('price', '0.00');
        if (!empty($search)) {
            $addonservices = $addonservices->where('service_name', 'like', "%{$search}%");
        }
        $addonservices = $addonservices->paginate(25);
        return $addonservices;
    }
    public function index_without_price($search = "")
    {
        $addonservices = Addon::with('features');
        if (!empty($search)) {
            $addonservices = $addonservices->where('service_name', 'like', "%{$search}%");
        }
        $addonservices = $addonservices->paginate(25);

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
            $addonservices->how_it_works = $request['howItworks'];
            $addonservices->add_on_type = (isset($request['add_on_type'])) ? json_encode($request['add_on_type']) : null;
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
            if(!empty($request['faq'])){
                foreach(array_values($request['faq']) as $k=> $value){
                    if ($value['question'] != null && $value['answer'] != null) {
                        $tmp['service_id'] = $addonservices->id ;
                        $tmp['question'] = $value['question'];
                        $tmp['answer'] = $value['answer'];
                        Service_Faq::create($tmp);
                    }
                }

            }

            return $addonservices->id;
        });
    }

    public function edit($id)
    {
        $service = Addon::with('features','service_faqs')->where("id",$id)->first();
        return $service;
    }

    public function update($request, $id)
    {
        $service = Addon::findOrFail($id);
        $service->service_name = $request['name'];
        $service->price = $request['price'];
        $service->short_desc = $request['short_desc'];
        $service->long_desc = $request['description'];
        $service->how_it_works = $request['howItworks'];
        $service->add_on_type = (isset($request['add_on_type'])) ? json_encode($request['add_on_type']) : null;

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
        // dd(($request['faq']));
        if(!empty($request['faq'])){
            Service_Faq::where('service_id',$id )->delete();
            foreach(array_values($request['faq']) as $k=> $value){
                if ($value['question'] != null && $value['answer'] != null) {
                $tmp['service_id'] = $id ;
                $tmp['question'] = $value['question'];
                $tmp['answer'] = $value['answer'];
                Service_Faq::create($tmp);
            }
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
