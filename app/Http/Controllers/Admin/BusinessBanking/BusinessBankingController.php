<?php

namespace App\Http\Controllers\Admin\BusinessBanking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\BusinessBanking;
use Redirect;

class BusinessBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BusinessBanking::all();
        return view('admin.business-banking.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.business-banking.create');
    }

    public function store(Request $request){

        $validate = Validator::make($request->all(), [
            'image' => 'required',
            'short_desc' => 'required',


            ],[
                'image.required' =>'This field is required.',
                'short_desc.required' => 'This field is required.',


            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $temp =[];
            $temp['short_description'] = $request->short_desc;
            $temp['long_description'] = $request->terms;
            $data = BusinessBanking::create($temp);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $data->addMediaFromRequest('image')->toMediaCollection('business_banking_images');
        }

        return redirect()->route('admin.business-banking.index')->withSuccess('Data added successfully');
        }
    }

    public function edit($id)
    {
        $data = BusinessBanking::findOrFail($id);
        return view('admin.business-banking.edit', compact('data'));
    }
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required',
            'short_desc' => 'required',


            ],[
                'image.required' =>'This field is required.',
                'short_desc.required' => 'This field is required.',


            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $bankingdata = BusinessBanking::findOrFail($id);
            $bankingdata->short_description = $request->short_desc;
            $bankingdata->long_description = $request->terms;
            $bankingdata->save();


            if($request->hasFile('image') && $request->file('image')->isValid()){
                $bankingdata->addMediaFromRequest('image')->toMediaCollection('business_banking_images');
            }

            return redirect()->route('admin.business-banking.index')->withSuccess('Data updated successfully');
        }
    }

    public function destroy($id){
        $data = BusinessBanking::FindOrFail($id)->delete();
        if($data){
            return 1;
        }else{
            return 0;
        }
    }
}
