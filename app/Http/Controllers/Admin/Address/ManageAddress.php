<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Purchase_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageAddress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address= Purchase_address::all();
        return view('admin.address.manageAddress',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address= Purchase_address::find($id);
        $countries = Country::all();
        return view('admin.address.editAddress',compact('address','countries'));
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
        $validate = Validator::make($request->all(), [
            'image'         => 'image|mimes:jpg,png,jpeg,gif',
            'title'         => 'required',
            'description'   => 'required',
            'house_number' => 'required',
            'street' => 'required',
            'town' => 'required',
            'locality'=> 'required',
            'county' => 'required',
            'billing_country' => 'required',
            'post_code'=> 'required',
        ]);

        if($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $purchase_address = Purchase_address::findOrFail($id);
            $purchase_address->title             = $request->title;
            $purchase_address->description = $request->description;
            $purchase_address->house_number  = $request->house_number;
            $purchase_address->street   = $request->street;
            $purchase_address->town  = $request->town;
            $purchase_address->locality = $request->locality;
            $purchase_address->county = $request->county;
            $purchase_address->billing_country = $request->billing_country;
            $purchase_address->post_code = $request->post_code;
            $purchase_address->price = $request->price;

            $purchase_address->save();

            if($request->hasFile('image') && $request->file('image')->isValid()){
                // Delete existing image
                $purchase_address_image  = $purchase_address->getFirstMedia('manage_address_images');
                if ($purchase_address_image) {
                    $purchase_address_image->delete();
                }
                $purchase_address->addMediaFromRequest('image')->toMediaCollection('manage_address_images');
            }
            return redirect()->route('admin.manage-address.index')->withSuccess('Address updated successfully');
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
        //
    }
}
