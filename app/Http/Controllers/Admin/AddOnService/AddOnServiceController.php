<?php

namespace App\Http\Controllers\Admin\AddonService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Addonservice\AddonserviceService;
use Validator;
use App\Models\Addonservice;
use App\Models\AddonserviceFeature;

class AddOnServiceController extends Controller
{

    public function __construct(protected AddonserviceService $AddonserviceService)
    {
        $this->addonService = $AddonserviceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addonservicelist = $this->addonService->addonservicelisting();
        return view('admin.addonservice.index',['addonservicelist' => $addonservicelist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addonservice.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required',
            'description' => 'required'

            ],[
                'name.required' =>'This name field is required.',
                'short_desc.required' => 'This short description field is required.',
                'price.required' => 'This price field is required.',
                'description.required' => 'This long description field is required.'

            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{

            $addonserviceId = $this->addonService->store($input);
            $features=[];
            foreach(data_get($input,'features') as $features){
               $temp['feature'] = $features;
               $temp['add_on_service_id'] = $addonserviceId ;
               $temp['created_at'] = now();
               $temp['updated_at'] = now() ;
               $featuresArr[] = $temp;

            }

            AddonserviceFeature::insert($featuresArr);
            

            return redirect()->back()->with('message', 'Add-on Service added successfully');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $addonservices = $this->addonservicesService->getAddOnServices($id);
        
        return view('admin.category.edit', compact('category','categories','image','parent_category'));
    }
}
