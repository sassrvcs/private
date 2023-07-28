<?php

namespace App\Http\Controllers\Admin\AddonService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Services\Addonservice\AddonserviceService;
// use Validator;
// use App\Models\Addonservice;
// use App\Models\AddonserviceFeature;

use Illuminate\Support\Facades\Validator;
use App\Services\Addon\AddonService;
use Redirect;

class AddOnServiceController extends Controller
{

    public function __construct(protected AddonService $addonService)
    { }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addonservicelist = $this->addonService->index();
        return view('admin.addonservice.index',compact('addonservicelist'));
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

            return redirect()->back()->with('message', 'Add-on Service added successfully');
        }

    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $service = $this->addonService->edit($id);
        return view('admin.addonservice.edit',compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required',
            'description' => 'required'

            ],[
                'name.required' =>'This name field is required.',
                'short_desc.required' => 'This short description field is required.',
                'price.required' => 'This price field is required.',
                'description.required' => 'This description field is required.'

            ]);
        if($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $user = $this->addonService->update($input,$id);
            if($user){
                return Redirect::to("admin/addonservice")->withSuccess('Service updated');
            }

        }
    }

    public function destroy(string $id)
    {
        $service = $this->addonService->destroy($id);
        if($service) {
            return 1;
        } else {
            return 0;
        }
    }
}