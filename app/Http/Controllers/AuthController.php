<?php

namespace App\Http\Controllers;

// use Validator;
// use Session;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Services\Checkout\CheckoutService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected CheckoutService $checkoutService
    ) { }

    public function viewRegisterForm()
    {
        $countries = Country::all();
        return view('frontend.register', compact('countries'));
    }

    public function myAccount()
    {
        $user = Auth::user();
        return view('frontend.my_account',compact('user'));
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|string',
        ],[
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        } else {
            [$user, $token] = $this->userService->checkAuth($request->email, $request->password);

            if ($user == UserService::USER_NOT_FOUND) {
                return redirect()->back()->with('error','Your username and password are not correct. Please try again.');
            } elseif ($user == UserService::WRONG_PASSWORD) {
                return redirect()->back()->with('error','Your username and password are not correct. Please try again.');
            } else {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    if( isset($request->checkout) && !empty($request->checkout) ) {
                        $checkout = $this->checkoutService->doCheckoutFinalStep($request, auth()->user());
                        // dd($checkout);
                        if ($checkout) {
                            return redirect()->route('checkout');
                        }
                    } else {
                        return redirect()->route('my-account');
                    }
                }
            }
        }
    }

    public function findAddress(Request $request)
    {
        $postcode = str_replace(' ', '',$request->input('post_code'));
        $url = "https://api.getaddress.io/find/";
        $url.= $postcode;
        $url.= "?api-key=nJ0KdlfvJ0-JNu6L2rME-A37907";
        $html='';
        $type = "personal";
        $res = "";

        $p = $request->input('post_code');
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);
        $response = $request->getBody();
        $status = $request->getStatusCode();
        $refineFullAddrArr = [] ;
        if($status == 200) {
            $address = json_decode((string) $response)->addresses;
            $refineFullAddrArr = [] ;

            foreach($address as $addr) {
                $addrArr = explode(',',$addr);
                $refineArr = array();
                $string ='';
                foreach($addrArr as $k=>$val) {
                    if(!empty(trim($val))) {
                        array_push($refineArr, $val);
                    }
                }
                $string = implode(",",$refineArr);
                array_push($refineFullAddrArr, $string);;
            }

            $html .='<p>Select your address from the options below:</p>';
            foreach($refineFullAddrArr as $key=>$value) {
                $html .='<div class="postcode_option mb-3 row">';
                $html .= '<div class="col-md-10">'.$value.'&nbsp;</div>';
                $html .='<div class="col-md-2"><span class="postcode_select_btn btn btn-dark btn-sm select-postal" onclick="selectPostalAddrApp(\''.$value.'\',\''.$type.'\',\''.$res.'\')">Select</span></div>';
                $html .='</div>';
            }
        } else {
            $html='<div class="mb-3 errorRes"><h5>'.$response['Message'].' , Please try again later.</h5></div>';
        }

        return  $html;
    }

    /**
     * Save a new user to the database
     * @param object $request
     * @return view with message (success | failure)
     */
    public function saveRegisterForm(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'nullable|numeric|digits_between:8,13',
            // 'phone' => 'nullable',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users',
            'confirm_email' => 'sometimes|same:email',
            'password' => 'required|min:8|string',
            'post_code' => 'required',
            'house_no' => 'required',
            'street' => 'required',
            'town' => 'required',
            'billing_country' => 'required',
            'chek1' => 'required',
            'chek2' => 'required'
        ],[
            'title.required'    => 'Title is required.',
            'forename.required' => 'Forename is required.',
            'surname.required'  => 'Surname is required.',
            'phone.required'    => 'Phone number is required.',
            'phone.required'    => 'Phone number is required.',
            'phone.numeric'     => 'Please enter valid phone number.',
            'email.required'    => 'Email is required',
            'email.email'       => 'Please provide valid email',
            'confirm_email.required'  => 'Confirm email is required',
            'password.required' => 'Password is required',
            'street.required'   =>'This field is required.',
            'town.required'     =>'This field is required.',
            'post_code.required'=>'This field is required.',
            'house_no.required' =>'This field is required.',
            'billing_country.required' =>'This field is required.',
            'chek1.required'    =>'This field is required.',
            'chek2.required'    =>'This field is required.',
        ]);

        if($validate->fails()) {
            // dd($validate->errors());
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $response = $this->userService->store($request);
            if ($response) {
                if(isset($request->checkout)) {
                    $checkout = $this->checkoutService->doCheckoutFinalStep($request, $response);
                    if ($checkout) {
                        Auth::login($response);
                        return redirect()->route('my-account');
                    }
                } else {
                    return redirect()->route('clientlogin')->with('message', 'Registration successfull');
                }
            }
        }
    }

    public function registerNewAddess(Request $request) {

        $validate = Validator::make($request->all(), [
            'house_noNew' => 'required',
            'post_codeNew' => 'required',
            'streetNew' => 'required',
            'townNew' => 'required',
            'billing_countryNew' => 'required',
        ],[
            'house_noNew.required' =>'This field is required.',
            'streetNew.required'   =>'This field is required.',
            'townNew.required'     =>'This field is required.',
            'post_codeNew.required'=>'This field is required.',
            'billing_countryNew.required' =>'This field is required.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $address = new Address();
            $address->user_id  = Auth::user()->id;
            $address->address_type  = 'office_address';
            $address->house_number = $request->house_noNew;
            $address->street = $request->streetNew;
            $address->locality = $request->localityNew;
            $address->town = $request->townNew;
            $address->county = $request->countyNew;
            $address->post_code = $request->post_codeNew;
            $address->billing_country = $request->billing_countryNew;
            $address->save();

            return redirect()->route('choose-address')->withSuccess('Address added successfully');
        }

    }

    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with(Auth::logout());
    }
}
