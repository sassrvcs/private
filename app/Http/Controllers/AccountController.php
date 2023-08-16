<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use DB ;
use Illuminate\Support\Collection;

class AccountController extends Controller
{

    public function details(){
        $user = Auth::user();
        $countries = Country::all();

        $primary_address = Address::join('countries','countries.id','=','addresses.billing_country')
                                    ->select('countries.name as country_name','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country','addresses.id as addrees_id')
                                    ->where('addresses.user_id',Auth::user()->id)
                                    ->where('addresses.address_type','primary_address')
                                    ->where('addresses.is_selected',1)
                                    ->get()
                                    ->toArray();
        $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
                                    ->select('countries.name as country_name','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
                                    ->where('addresses.user_id',Auth::user()->id)
                                    ->where('addresses.address_type','billing_address')
                                    ->where('addresses.is_selected',1)
                                    ->get()
                                    ->toArray();
         if(empty($billing_address)){

            $edit = false ;
            if(Session::has('billing_session')){
               $edit=true ;
            }

            if($edit==false){
                Session::forget('billing_session');
                Session::push('billing_session',$primary_address);

            }
            $billing_address = Session::get('billing_session')[0] ;
         }
         $billing_address_list = $primary_address_list = Address::join('countries','countries.id','=','addresses.billing_country')
                                    ->select('addresses.house_number','countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
                                    ->where('addresses.user_id',Auth::user()->id)
                                    ->orderBy('addresses.id','DESC')
                                    ->distinct()
                                    ->get()
                                    ->toArray();







                                    // ->groupBy(function($data) {
                                    //     return $data->house_number;
                                    // })->toArray();

                // $billing_address_list = Address::join('countries','countries.id','=','addresses.billing_country')
                //     ->select('addresses.house_number','countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
                //     ->where('addresses.address_type','billing_address')
                //     ->where('addresses.user_id',Auth::user()->id)
                //     ->orderBy('addresses.id','DESC')
                //     ->distinct()
                //     ->get()
                //     ->toArray();

           // dd($billing_address_list);
        //    foreach($billing_address_list as $billing_address_list){
        //       dump(in_array($billing_address_list['house_number'],$primary_address_list));

        //    }


      //   $primary_address_list = array_values($primary_address_list);



        // $billing_address_list = Address::join('countries','countries.id','=','addresses.billing_country')
        //                             ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
        //                             ->where('addresses.user_id',Auth::user()->id)
        //                             ->where('addresses.address_type','billing_address')
        //                             ->get()
        //                             ->toArray();


        if(empty($billing_address_list)){
            $billing_address_list = $primary_address_list ;
        }
        return view('frontend.account.details', compact('user','primary_address','billing_address','countries','primary_address_list','billing_address_list'));
    }

    public function saveNewAddress(Request $request){
       // dd($request->all());
        Address::where('user_id',$request->input('user_id'))->where('address_type',$request->input('address_type'))->update(['is_selected'=>0]);
        Address::Create(
            [
                'house_number'     =>  $request->input('number'),
                'street'            => $request->input('steet'),
                'locality'          => $request->input('locality'),
                'town'              => $request->input('town'),
                'county'            => $request->input('county')??null,
                'post_code'         => $request->input('postcode'),
                'billing_country'   => $request->input('contry'),
                'is_selected'       =>1 ,
                'user_id'       => $request->input('user_id'),
                'address_type'  => $request->input('address_type'),
            ],
        );
    }

    public function saveSelectedAddress(Request $request){

        $temp = [];
        $id=$request->input('id');

        $temp['house_number'] =$request->input('number');
        $temp['street'] = $request->input('steet');
        $temp['locality'] =  $request->input('locality');
        $temp['town'] = $request->input('town');
        $temp['county'] =  $request->input('county')??null;
        $temp['post_code'] = $request->input('postcode');
        $temp['billing_country'] = $request->input('contry');

        $updated = Address::where('id',$id)->update([
            'house_number'     => $request->input('number'),
            'street'            => $request->input('steet'),
            'locality'          => $request->input('locality'),
            'town'              => $request->input('town'),
            'county'            => $request->input('county')??null,
            'post_code'         => $request->input('postcode'),
            'billing_country'   => $request->input('contry'),
        ]);

        return $updated;
    }

    public function savePrimaryAddress(Request $request){

       $id = $request->input('address_id');

        Address::where('id',$id)
                ->update(
                    [
                        'house_number'     =>  $request->input('number'),
                        'street'            => $request->input('steet'),
                        'locality'          => $request->input('locality'),
                        'town'              => $request->input('town'),
                        'county'            => $request->input('county')??null,
                        'post_code'         => $request->input('postcode'),
                        'billing_country'   => $request->input('contry'),
                        'is_selected'       =>1 ,
                    ]
                );
            return 1 ;

    }
    public function saveBillingAddress(Request $request){

        Address::where('user_id',$request->input('user_id'))->where('address_type',$request->input('address_type'))->update(['is_selected'=>0]);
        Address::updateOrCreate(
            [
                'user_id'       => $request->input('user_id'),
                'address_type'  => $request->input('address_type'),
            ],
            [
                'house_number'     =>  $request->input('number'),
                'street'            => $request->input('steet'),
                'locality'          => $request->input('locality'),
                'town'              => $request->input('town'),
                'county'            => $request->input('county')??null,
                'post_code'         => $request->input('postcode'),
                'billing_country'   => $request->input('contry'),
                'is_selected'       =>1 ,
            ],
        );


        // Address::where('user_id',$request->input('user_id'))->where('address_type',$request->input('address_type'))->update(['is_selected'=>0]);


        // if(Address::where('user_id',$request->input('user_id'))->where('address_type',$request->input('address_type'))->count()==0){
        //     $address            = new Address();
        //     $address->user_id   = $request->input('user_id');
        //     $address->address_type = $request->input('address_type');
        //     $address->house_number = $request->input('number');
        //     $address->street    = $request->input('steet');
        //     $address->locality  = $request->input('locality');
        //     $address->town      = $request->input('town');
        //     $address->county    = $request->input('county')??null;
        //     $address->post_code = $request->input('postcode');
        //     $address->billing_country = $request->input('contry');
        //     $address->is_selected = 1 ;
        //     $address->save();
        // }
        return 1;
    }

    public function saveMyDetails(Request $request){
        $user = Auth::user()->id;
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required',
            'surname' => 'required',
            'phone' => 'required|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email',
            'confirm_password' =>'same:password',
            'billing_email' => 'required|email',
            'primary_email' => 'required|email',


            ],[

                'title.required' => 'Title is required.',
                'forename.required' => 'Forename is required.',
                'surname.required' => 'Surname is required.',
                'phone.required' => 'Phone number is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'billing_email.required' => 'Billing email is required',
                'primary_email.required' => 'Primary email is required'
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
            $temp['primary_email'] = $request->input('primary_email');
            $temp['business_email'] = $request->input('billing_email');
            $temp['phone_no'] =  $request->input('phone');
            $temp['business_phone'] = $request->input('billing_phone');
            $temp['newsletter'] = $request->input('newsletter')??0;
            $temp['confirmation_statements'] = $request->input('confirmation_statements')??0;
            $temp['accounts'] = $request->input('accounts')??0;


            User::where('id',$user)->update($temp);
            return redirect()->route('my_details')->with('message', 'Updated successfully');
        }
    }

    public function updateSelectedAddress(Request $request){

        $userId = $request->input('user_id');
        $addressId = $request->input('address_id');
        $addressType = $request->input('address_type');

        $billing_contry_id=Country::where('name',$request->input('contry'))->first()->id ;
        Address::where('user_id',$userId)->where('address_type',$addressType)->update(['is_selected'=>0]);

        if(Address::where('user_id',$userId)->where('address_type',$addressType)->count()==0){


            $address            = new Address();
            $address->user_id   = $request->input('user_id');
            $address->address_type = $request->input('address_type');
            $address->house_number = $request->input('number');
            $address->street    = $request->input('steet');
            $address->locality  = $request->input('locality');
            $address->town      = $request->input('town');
            $address->county    = $request->input('county')??null;
            $address->post_code = $request->input('postcode');
            $address->billing_country =  $billing_contry_id;
            $address->is_selected = 1 ;
            $address->save();
        }elseif( Address::where('id',$addressId)->first()->address_type !=$addressType){

            $addressData = Address::where('id',$addressId)->first() ;

            $address            = new Address();
            $address->user_id   = $addressData->user_id;
            $address->address_type =  $addressType;
            $address->house_number =$addressData->house_number;
            $address->street    = $addressData->street;
            $address->locality  =$addressData->locality;
            $address->town      = $addressData->town;
            $address->county    = $addressData->county??null;
            $address->post_code = $addressData->post_code;
            $address->billing_country =  $addressData->billing_country;
            $address->is_selected = 1 ;
            $address->save();

        }else{

            Address::where('id',$addressId)->update(['is_selected'=>1]);
        }


        return 1;

    }
}
