<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Arr;

class AccountController extends Controller
{
    public function details(){
        $user = Auth::user();
        $primary_address = Address::where('user_id',Auth::user()->id)->where('address_type','primary_address')->get()->toArray();
        $billing_address = Address::where('user_id',Auth::user()->id)->where('address_type','billing_address')->get()->toArray();
        return view('frontend.account.details', compact('user','primary_address','billing_address'));
    }
    public function savePrimaryAddress(Request $request){
        $temp = [];
        $temp['house_number'] =$request->input('number');
        $temp['street'] = $request->input('steet');
        $temp['locality'] =  $request->input('locality');
        $temp['town'] = $request->input('town');
        $temp['county'] =  $request->input('county');
        $temp['post_code'] = $request->input('postcode');
        $temp['billing_country'] = $request->input('contry');
        //dd($temp);
        Address::where('address_type',$request->input('address_type'))->where('user_id',$request->input('user_id'))
                    ->update($temp);
        return 1;
    }
}
