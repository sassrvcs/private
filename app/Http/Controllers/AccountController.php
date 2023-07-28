<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Arr;
use Validator;

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
        $temp['county'] =  $request->input('county')??null;
        $temp['post_code'] = $request->input('postcode');
        $temp['billing_country'] = $request->input('contry');

        //Address::where('address_type',$request->input('address_type'))->where('user_id',$request->input('user_id'))->update($temp);
        Address::updateOrCreate(
            [
                'user_id'       => $request->input('user_id'),
                'address_type'  => $request->input('address_type'),
            ],
            [
                'house_number'     => $request->input('number'),
                'street'            => $request->input('steet'),
                'locality'          => $request->input('locality'),
                'town'              => $request->input('town'),
                'county'            => $request->input('county')??null,
                'post_code'         => $request->input('postcode'),
                'billing_country'   => $request->input('contry'),
            ],
        );
        return 1;
    }

    public function saveMyDetails(Request $request){
        $user = Auth::user()->id;
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'required|numeric|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email',
            'confirm_password' =>'same:password',
            'chek1' => 'required',
            'chek2' => 'required',
            'chek3' => 'required'

            ],[

                'title.required' => 'Title is required.',
                'forename.required' => 'Forename is required.',
                'surname.required' => 'Surname is required.',
                'phone.required' => 'Phone number is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'chek1.required' =>'This field is required.',
                'chek2.required' =>'This field is required.',
                'chek3.required' =>'This field is required.',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            if(!empty($request->input('password'))){

            }
            $temp = [];
            $temp['organisation'] =$request->input('organisation');
            $temp['title'] = $request->input('title');
            $temp['forename'] =  $request->input('forename');
            $temp['surname'] = $request->input('surname');
            $temp['email'] =  $request->input('email');
            $temp['password'] = bcrypt($request->input('password'));
            $temp['business_email'] = $request->input('billing_email');
            $temp['phone_no'] =  $request->input('phone');
            $temp['business_phone'] = $request->input('billing_phone');


            User::where('id',$user)->update($temp);
            return redirect()->route('my_details')->with('message', 'Updated successfully');
        }
    }
}
