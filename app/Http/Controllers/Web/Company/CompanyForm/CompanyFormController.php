<?php

namespace App\Http\Controllers\Web\Company\CompanyForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyForm\RegisterAddress\RegisterAddressService;
use App\Models\Companie;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\ShoppingCart;

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

        $forwardingAdd = Companie::where('user_id',Auth::user()->id)->first()->toArray();
        $forwardingAddVal = $forwardingAdd['forwarding_business_office_address'];

        if($forwardingAddVal !== null){
            $address = Address::where('id',$forwardingAddVal)->first()->toArray();
        }else {
            $address=[];
        }

        $cartInfo = ShoppingCart::where(['user_id' => Auth::user()->id])->get()->first();

        if(!empty($cartInfo)){
            $cartInfoId = $cartInfo['id'];
        }else {
            $cartInfoId = '';
        }

        return view('frontend.company_form.business_address', compact('used_address','countries','forwardingAddVal','address','cartInfoId'));
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

    public function updateForwardingBusinessAddress(Request $request){

        $id = $request->id;
        $user_id = Auth::user()->id;

        Companie::where('user_id',$user_id)->update(['forwarding_business_office_address'=>$id]);

        $addData = Address::where('id',$id)->first()->toArray();

        return $addData ;
    }

    public function removeForwardingAddressSection(Request $request){
        $user_id = Auth::user()->id;

        Companie::where('user_id',$user_id)->update(['forwarding_registered_office_address'=> NULL]);

        return 1 ;
    }
    public function removeForwardingBusinessAddressSection(Request $request){
        $user_id = Auth::user()->id;

        Companie::where('user_id',$user_id)->update(['forwarding_business_office_address'=> NULL]);

        return 1 ;
    }

    public function saveCompanyInShoppingCart(Request $request){
        $price = $request->price;

        $inserted = ShoppingCart::create(['user_id' => Auth::user()->id,'quantity'=>1,'price'=>$price]);

        if($inserted){
            return $inserted['id'];
        }
    }

    public function saveCompanyInShoppingCart_Business(Request $request){
        $price = $request->price;
        $shoppingCartId = $request->shoppingCartId_id;

        $cartInfo = ShoppingCart::where(['id' => $shoppingCartId])->get()->first();

        $lastPrice = $cartInfo['price'];

        $finalPrice = $lastPrice + $price;

        $inserted = ShoppingCart::where('id',$shoppingCartId)->update(['price'=>$finalPrice]);
    }

    public function appointments_open() {

        return view('frontend.company_form.appointments');
    }

}
