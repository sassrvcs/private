<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cms\CmsService;
use Validator;
use App\Models\Cms;
use Redirect;

class CmsController extends Controller
{

    public function __construct(protected CmsService $CmsService)
    {
        $this->cmsService = $CmsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $cmslist = $this->cmsService->index($search);
        //print_r($customerlist['address']);exit;
        return view('admin.cms.index',compact('cmslist','search'));
    }
    

    /**
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $cmsDetails = $this->cmsService->edit($id);
        return view('admin.cms.edit',compact('cmsDetails'));
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'description' => 'required'
            ],[
                'description.required' =>'This description field is required.',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = $this->cmsService->update($input,$id);
            if($user){
                return Redirect::to("admin/cms")->withSuccess('Cms Description updated');
            }

        }
    }




}
