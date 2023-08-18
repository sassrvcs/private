<?php

namespace App\Http\Controllers\Admin\BusinessBanking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BusinessBanking;

class BusinessBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if(!empty($search)){
            $businessdata = BusinessBanking::where('short_description', 'like', "%{$search}%")
                            ->paginate(10);
        }else{
            $businessdata = BusinessBanking::paginate(10);
        }

        return view('admin.business-banking.index',compact('businessdata','search'));
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
            'image'         => 'required|image|mimes:jpg,png,jpeg,gif',
            'title'         => 'required',
            'short_desc'    => 'required',
            'description'   => 'required',
        ],[
            'image.required' =>'Image is required.',
            'title.required' => 'Title is required.',
            'short_desc.required' => 'Short description is required.',
            'description.required' => 'Description is required.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $temp =[];
            $temp['title']              = $request->title;
            $temp['short_description']  = $request->short_desc;
            $temp['long_description']   = $request->description;
            $temp['terms_condition']    = $request->terms;
            
            // Insert data into temp array to database
            $data = BusinessBanking::create($temp);

            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $data->addMediaFromRequest('image')->toMediaCollection('business_banking_images');
            }

            return redirect()->route('admin.business-banking.index')->withSuccess('Business banking added successfully');
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
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'title'         => 'required',
            'short_desc'    => 'required',
            'description'   => 'required',
        ],[
            'image.required' =>'Image is required.',
            'title.required' => 'Title is required.',
            'short_desc.required' => 'Short description is required.',
            'description.required' => 'Description is required.',
        ]);

        if($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $bankingdata = BusinessBanking::findOrFail($id);
            $bankingdata->title             = $request->title;
            $bankingdata->short_description = $request->short_desc;
            $bankingdata->long_description  = $request->description;
            $bankingdata->terms_condition   = $request->terms;
            $bankingdata->save();

            if($request->hasFile('image') && $request->file('image')->isValid()){
                // Delete existing image
                $bankingImage  = $bankingdata->getFirstMedia('business_banking_images');
                if ($bankingImage) {
                    $bankingImage->delete();
                }
                $bankingdata->addMediaFromRequest('image')->toMediaCollection('business_banking_images');
            }

            return redirect()->route('admin.business-banking.index')->withSuccess('Business banking updated successfully');
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
