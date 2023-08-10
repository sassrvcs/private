<?php

namespace App\Http\Controllers\Web\Company\CompanyForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyForm\RegisterAddress\RegisterAddressService;
use App\Models\Companie;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;


class CompanyFormController extends Controller
{
    public function __construct(
        protected RegisterAddressService $regAddrService,
    ) { }
    public function registerAddress(){
        //$recent_addr  = $this->regAddrService->getRecentAddress();
        // if company table has office add id
        $office_address = Companie::where('user_id',Auth::user()->id)->pluck('office_address')->first();

        $recent_addr  = $this->regAddrService->getRecentAddress($office_address);

        $countries = Country::all();

        return view('frontend.company_form.register_address', compact('recent_addr','countries'));

    }
    public function editRegisterAddress(){
        return view('frontend.company_form.edit_address');
    }
    public function chooseAddress(){
        $countries = Country::all()->toArray();

        // dd($countries);
        $used_address = Address::where('user_id',Auth::user()->id)->get();
        return view('frontend.company_form.choose_address', compact('used_address','countries'));
    }

    public function chooseAddressAfterBuyNow(){
        $countries = Country::all()->toArray();

        $used_address = Address::where('user_id',Auth::user()->id)->get();

        $forwardingAdd = Companie::where('user_id',Auth::user()->id)->first()->toArray();
        $forwardingAddVal = $forwardingAdd['forwarding_registered_office_address'];

        if($forwardingAddVal !== null){
            $address = Address::where('id',$forwardingAddVal)->first()->toArray();
        }else {
            $address=[];
        }

        return view('frontend.company_form.choose_address_after_buy_now', compact('used_address','countries','forwardingAddVal','address'));
    }

    public function chooseBusinessAddress(){
        $countries = Country::all()->toArray();

        $used_address = Address::where('user_id',Auth::user()->id)->get();
        return view('frontend.company_form.business_address', compact('used_address','countries'));
    }
    public function updateRegisterAddress(Request $request){

        $user_id = $request->input('user_id');
        $address_id = $request->input('address_id');


        $Company = Companie::updateOrCreate(
            ['user_id' =>  $user_id],
            ['office_address' => $address_id]
        );
        return 1 ;
    }

    public function updateForwardingRegisterAddress(Request $request){

        $id = $request->id;
        $user_id = Auth::user()->id;

        Companie::where('user_id',$user_id)->update(['forwarding_registered_office_address'=>$id]);

        $addData = Address::where('id',$id)->first()->toArray();

        return $addData ;
    }


}
