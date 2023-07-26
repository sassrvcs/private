<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\User\UserService;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService)
    { }

    public function viewRegisterForm(){
        return view('frontend.register');
    }
    public function myAccount(){
        $user = Auth::user();
        return view('frontend.my_account',compact('user'));
    }
    public function login(Request $request){

        $validate = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|string',

            ],[
                'email.required' => 'Email is required',
                'password.required' => 'Password is required'
            ]);
            if($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }else{
                    [$user, $token] = $this->userService->Checkauth($request->email, $request->password);

                    if ($user == UserService::USER_NOT_FOUND) {
                        return redirect()->back()->with('error','Your username and password are not correct. Please try again.');
                    } elseif ($user == UserService::WRONG_PASSWORD) {
                        return redirect()->back()->with('error','Your username and password are not correct. Please try again.');
                    } else {

                        $credentials = $request->only('email', 'password');

                        if (Auth::attempt($credentials)) {
                            // Authentication passed...
                            return redirect()->route('my-account');
                        }
                    }
                }
    }

    public function findAddress(Request $request){

        $postcode = str_replace(' ', '',$request->input('post_code'));
        $url = "https://api.getaddress.io/find/";
        $url.= $postcode;
        $url.= "?api-key=nJ0KdlfvJ0-JNu6L2rME-A37907";
        $html='';
        $type = "personal";
        $res = "";

        $p = $request->input('post_code');
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);// Url of your choosing
        $response = $request->getBody();
        $status = $request->getStatusCode();
        $refineFullAddrArr = [] ;
        if($status == 200){
           $address = json_decode((string) $response)->addresses;
           $refineFullAddrArr = [] ;

           foreach($address as $addr){
                $addrArr = explode(',',$addr);
                $refineArr = array();
                $string ='';
                foreach($addrArr as $k=>$val){
                    if(!empty(trim($val))){
                        array_push($refineArr, $val);
                    }
                }
                $string = implode(",",$refineArr);
                array_push($refineFullAddrArr, $string);;
            }
            $html .='<p>Select your address from the options below:</p>';
            foreach($refineFullAddrArr as $key=>$value){
                $html .='<div class="postcode_option mb-3 row">';
                $html .= '<div class="col-md-10">'.$value.'&nbsp;</div>';
                $html .='<div class="col-md-2"><span class="postcode_select_btn btn btn-dark btn-sm" onclick="selectPostalAddrApp(\''.$value.'\',\''.$type.'\',\''.$res.'\')">Select</span></div>';
                $html .='</div>';
            }
        }else{
            $html='<div class="mb-3 errorRes"><h5>'.$response['Message'].' , Please try again later.</h5></div>';
        }


        return  $html;

    }
    public function saveRegisterForm(Request $request){

        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'required|numeric|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users|same:confirm_email',
            'confirm_email' => 'required',
            'password' => 'required|min:8|string',
            'post_code' => 'required',
            'house_no' => 'required',
            'street' => 'required',
            'town' => 'required',
            'billing_country' => 'required',
            'chek1' => 'required',
            'chek2' => 'required'

            ],[

                'title.required' => 'Title is required.',
                'forename.required' => 'Forename is required.',
                'surname.required' => 'Surname is required.',
                'phone.required' => 'Phone number is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'confirm_email.required' => 'Confirm email is required',
                'password.required' => 'Password is required',
                'street.required' =>'This field is required.',
                'town.required' =>'This field is required.',
                'post_code.required' =>'This field is required.',
                'house_no.required' =>'This field is required.',
                'billing_country.required' =>'This field is required.',
                'chek1.required' =>'This field is required.',
                'chek2.required' =>'This field is required.',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = new User();
            $user->organisation = $request->organisation;
            $user->title = $request->title;
            $user->forename = $request->forename;
            $user->surname = $request->surname;
            $user->phone_no = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $address = new Address();
            $address->user_id = $user->id;
            $address->address_type = 'primary_address';
            $address->street = $request->street;
            $address->locality = $request->locality;
            $address->town = $request->town;
            $address->county = $request->county;
            $address->post_code = $request->post_code;
            $address->billing_country = $request->billing_country;
            $address->save();

            return redirect()->route('clientlogin')->with('message', 'Registration successfull');

        }
    }
    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with(Auth::logout());

    }
}
