<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Package\PackageService;
use Validator;
use App\Models\Feature;


class PackageController extends Controller
{

    public function __construct(protected PackageService $packageService)
    {
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
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
                'name.required' =>'This field is required.',
                'short_desc.required' => 'This field is required.',
                'price.required' => 'This field is required.',
                'description.required' => 'This field is required.'

            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{

            $packageId = $this->packageService->store($input);
            $temp=[];
            $features=[];
            foreach(data_get($input,'features') as $features){
               $temp['feature'] = $features;
               $temp['package_id'] = $packageId ;
               $featuresArr[] = $temp;
            }
            Feature::create($featuresArr);
            return redirect()->back()->with('message', 'Package added successfully');
        }


    }
}
