<?php

namespace App\Http\Controllers\Admin\Addons;

use App\Http\Controllers\Controller;
use App\Models\Service_Faq;
use Illuminate\Http\Request;

// use App\Services\Addonservice\AddonserviceService;
// use Validator;
// use App\Models\Addonservice;
// use App\Models\AddonserviceFeature;
// use Redirect;

use Illuminate\Support\Facades\Validator;
use App\Services\Addon\AddonService;
use Illuminate\Support\Facades\Redirect;

class AddonController extends Controller
{
    public function __construct(protected AddonService $addonService)
    { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $addonservicelist = $this->addonService->index_without_price($search);
        return view('admin.addonservice.index',compact('addonservicelist','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addonservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ],[
            'name.required' =>'This name field is required.',
            'short_desc.required' => 'This short description field is required.',
            'price.required' => 'This price field is required.',
            'description.required' => 'This description field is required.'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $addonserviceId = $this->addonService->store($input);
            //return redirect()->back()->with('message', 'Add-on Service added successfully');
            return Redirect::to("admin/addonservice")->withSuccess('Service Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->addonService->edit($id);
        return view('admin.addonservice.edit',compact('service'));
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
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required|numeric',
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
            if($user) {
                return Redirect::to("admin/addonservice")->withSuccess('Service updated');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->addonService->destroy($id);
        if($service) {
            sleep(2);
            return 1;
        } else {
            return 0;
        }
    }
    public function removeServiceFaq($id)
    {

        $status = Service_Faq::where('id',$id)->delete();
        if($status){
            return back()->withSuccess('Faq deleted successfully');
        }
        return back()->withError('Unable to delete faq');

    }
}
