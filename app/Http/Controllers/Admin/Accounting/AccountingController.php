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
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $accountinglist = $this->accountingService->index($search);
        return view('admin.accounting.index',compact('accountinglist','search'));
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
                'image.required' => 'This image field is required and only allows image files.',
                'image.image' => 'This image field is required and only allows image files.'
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{

            //$accountserviceId = $this->accountingService->store($input);
            $temp =[];
            $temp['accounting_software_name'] = $request->name;
            $temp['short_desc'] = $request->short_desc;
            $temp['long_desc'] = $request->description;
            $temp['terms'] = $request->terms;

            $data = Accounting::create($temp);

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $data->addMediaFromRequest('image')->toMediaCollection('accounting_software_images');
            }

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
            //$user = $this->accountingService->update($input,$id);
            $accounting = Accounting::findOrFail($id);
            $accounting->accounting_software_name = $request['name'];
            $accounting->short_desc = $request['short_desc'];
            $accounting->long_desc = $request['description'];
            $accounting->terms = $request['terms'];
            $accounting->save();

            if($request->hasFile('image') && $request->file('image')->isValid()){
                // Delete existing image
                $accountingImage  = $accounting->getFirstMedia('accounting_software_images');
                if ($accountingImage) {
                    $accountingImage->delete();
                }
                $accounting->addMediaFromRequest('image')->toMediaCollection('accounting_software_images');
            }

            return redirect()->route('admin.accounting.index')->withSuccess('Accounting updated successfully');

        }
    }

    public function destroy(string $id)
    {
        $accounting = $this->accountingService->destroy($id);
        if($accounting) {
            return 1;
        } else {
            return 0;
        }
    }



}
