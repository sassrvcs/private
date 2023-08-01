<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Accounting\AccountingService;
use Validator;
use App\Models\Accounting;
use Redirect;

class AccountingController extends Controller
{

    public function __construct(protected AccountingService $AccountingService)
    {
        $this->accountingService = $AccountingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountinglist = $this->accountingService->index();
        return view('admin.accounting.index',compact('accountinglist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accounting.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif'
            ],[
                'name.required' =>'This name field is required.',
                'short_desc.required' => 'This short description field is required.',
                'description.required' => 'This description field is required.',
                'image.required' => 'This image field is required and only allows image files.'
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{

            $accountserviceId = $this->accountingService->store($input);

            //return redirect()->back()->with('message', 'Accounting software added successfully');
            return Redirect::to("admin/accounting")->withSuccess('Accounting Software Added Successfully');
        }

    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $accounting = $this->accountingService->edit($id);
        return view('admin.accounting.edit',compact('accounting'));
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'description' => 'required'
            ],[
                'name.required' =>'This name field is required.',
                'short_desc.required' => 'This short description field is required.',
                'description.required' => 'This description field is required.'
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = $this->accountingService->update($input,$id);
            if($user){
                return Redirect::to("admin/accounting")->withSuccess('Accounting Software updated');
            }

        }
    }

    public function destroy(string $id)
    {
        $accounting = $this->accountingService->destroy($id);
        if($accounting) {
            sleep(2);
            return 1;
        } else {
            return 0;
        }
    }



}
