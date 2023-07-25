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
        return view('frontend.account.details', compact('user','primary_address'));
    }
    public function savePrimaryAddress(Request $request){

       // dd($request->all());

        $formatterArr = explode("&",data_get($request->all(),'formdata')) ;

        $user_id = Arr::exists($formatterArr, 0)? str_replace("user_id=","",$formatterArr)[0]:"";
        $houseNo =Arr::exists($formatterArr, 1)? str_replace("house_no=","",$formatterArr)[1]:"";
        $street =Arr::exists($formatterArr, 2)? str_replace("street=","",$formatterArr)[2]:"";
        $locality =Arr::exists($formatterArr, 3)? str_replace("locality=","",$formatterArr)[3]:"";
        $town = Arr::exists($formatterArr, 4)? str_replace("town=","",$formatterArr)[4]:"";
        $county = Arr::exists($formatterArr, 5)? str_replace("county=","",$formatterArr)[5]:"";
        $post_code = Arr::exists($formatterArr, 6)? str_replace("post_code=","",$formatterArr)[6]:"";
        $billing_country = Arr::exists($formatterArr, 7)? str_replace("billing_country=","",$formatterArr)[7]:"";



        $temp = [];
        $temp['address_type'] = 'primary_address';
        $temp['house_number'] = $houseNo;
        $temp['street'] = $street;
        $temp['locality'] =  $locality;
        $temp['town'] =  $town;
        $temp['county'] =  $county;
        $temp['post_code'] = $post_code ;
        $temp['billing_country'] = $billing_country;
        Address::where('user_id',$user_id)->update($temp);

        // $address = Address::findOrFail($user_id);
        // $address->address_type = 'primary_address';
        // $address->house_number = $houseNo;
        // $address->street = $street;
        // $address->locality = $locality;
        // $address->town = $town;
        // $address->county = $county;
        // $address->post_code = $post_code;
        // $address->billing_country = $billing_country;
        // dd($address);
        //$address->save();

        return true;
    }
}
