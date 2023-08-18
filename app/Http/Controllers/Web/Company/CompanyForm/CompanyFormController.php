<?php

namespace App\Http\Controllers\Web\Company\CompanyForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyForm\RegisterAddress\RegisterAddressService;
use App\Models\Companie;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;

class CompanyFormController extends Controller
{
    public function __construct(
        protected RegisterAddressService $regAddrService,
    ) {
    }
    public function registerAddress()
    {
        //$recent_addr  = $this->regAddrService->getRecentAddress();
        // if company table has office add id
        $office_address = Companie::where('user_id', Auth::user()->id)->pluck('office_address')->first();

        $recent_addr  = $this->regAddrService->getRecentAddress($office_address);
        // dd($recent_addr);
        $countries = Country::all();

        return view('frontend.company_form.register_address', compact('recent_addr', 'countries'));
    }
    public function editRegisterAddress()
    {
        return view('frontend.company_form.edit_address');
    }
    public function chooseAddress()
    {
        $countries = Country::all()->toArray();

        // dd($countries);
        $used_address = Address::where('user_id', Auth::user()->id)->get();
        return view('frontend.company_form.choose_address', compact('used_address', 'countries'));
    }

    public function chooseAddressAfterBuyNow()
    {
        $countries = Country::all()->toArray();

        $used_address = Address::where('user_id', Auth::user()->id)->get();

        $forwardingAdd = Companie::where('user_id', Auth::user()->id)->first()->toArray();
        $forwardingAddVal = $forwardingAdd['forwarding_registered_office_address'];

        if ($forwardingAddVal !== null) {
            $address = Address::where('id', $forwardingAddVal)->first()->toArray();
        } else {
            $address = [];
        }

        return view('frontend.company_form.choose_address_after_buy_now', compact('used_address', 'countries', 'forwardingAddVal', 'address'));
    }

    public function chooseBusinessAddress()
    {
        $countries = Country::all()->toArray();

        $used_address = Address::where('user_id', Auth::user()->id)->get();

        $forwardingAdd = Companie::where('user_id', Auth::user()->id)->first()->toArray();
        $forwardingAddVal = $forwardingAdd['forwarding_business_office_address'];

        if ($forwardingAddVal !== null) {
            $address = Address::where('id', $forwardingAddVal)->first()->toArray();
        } else {
            $address = [];
        }

        $cartInfo = ShoppingCart::where(['user_id' => Auth::user()->id])->get()->first();

        if (!empty($cartInfo)) {
            $cartInfoId = $cartInfo['id'];
        } else {
            $cartInfoId = '';
        }

        return view('frontend.company_form.business_address', compact('used_address', 'countries', 'forwardingAddVal', 'address', 'cartInfoId'));
    }
    public function updateRegisterAddress(Request $request)
    {

        $user_id = $request->input('user_id');
        $address_id = $request->input('address_id');


        $Company = Companie::updateOrCreate(
            ['user_id' =>  $user_id],
            ['office_address' => $address_id]
        );
        return 1;
    }

    public function updateForwardingRegisterAddress(Request $request)
    {

        $id = $request->id;
        $user_id = Auth::user()->id;

        Companie::where('user_id', $user_id)->update(['forwarding_registered_office_address' => $id]);

        $addData = Address::where('id', $id)->first()->toArray();

        return $addData;
    }

    public function updateForwardingBusinessAddress(Request $request)
    {

        $id = $request->id;
        $user_id = Auth::user()->id;

        Companie::where('user_id', $user_id)->update(['forwarding_business_office_address' => $id]);

        $addData = Address::where('id', $id)->first()->toArray();

        return $addData;
    }

    public function removeForwardingAddressSection(Request $request)
    {
        $user_id = Auth::user()->id;

        Companie::where('user_id', $user_id)->update(['forwarding_registered_office_address' => NULL]);

        return 1;
    }
    public function removeForwardingBusinessAddressSection(Request $request)
    {
        $user_id = Auth::user()->id;

        Companie::where('user_id', $user_id)->update(['forwarding_business_office_address' => NULL]);

        return 1;
    }

    public function saveCompanyInShoppingCart(Request $request)
    {
        $price = $request->price;

        $inserted = ShoppingCart::create(['user_id' => Auth::user()->id, 'quantity' => 1, 'price' => $price]);

        if ($inserted) {
            return $inserted['id'];
        }
    }

    public function saveCompanyInShoppingCart_Business(Request $request)
    {
        $price = $request->price;
        $shoppingCartId = $request->shoppingCartId_id;


        $cartInfo = ShoppingCart::where(['id' => $shoppingCartId])->get()->first();

        $lastPrice = $cartInfo['price'];

        $finalPrice = $lastPrice + $price;

        $inserted = ShoppingCart::where('id', $shoppingCartId)->update(['price' => $finalPrice]);

        if ($inserted) {
            return 1;
        }
    }

    // Appointment Section

    public function appointments_open()
    {
        $cartInfo = ShoppingCart::where(['user_id' => Auth::user()->id])->get()->first();

        $shoppingCartId = '';
        if (!empty($cartInfo)) {
            if (!empty($cartInfo['id'])) {
                $shoppingCartId = $cartInfo['id'];
            } else {
                $shoppingCartId = '';
            }
        }

        $used_address = Address::where('user_id', Auth::user()->id)->get();
        $countries = Country::all()->toArray();

        $person_officers = PersonOfficer::get()->toArray();


        return view('frontend.company_form.appointments', compact('used_address', 'countries', 'shoppingCartId', 'person_officers'));
    }

    public function address_listing(Request $request)
    {
        $used_address = Address::where('user_id', Auth::user()->id)->get();

        return view('frontend.company_form.addressListingPage', compact('used_address'));
    }

    public function address_edit_page(Request $request)
    {
        $addressFetched = Address::where('id', $request->id)->get()->toArray();

        if (!empty($addressFetched)) {
            $address = $addressFetched[0];
        } else {
            $address = [];
        }

        $countries = Country::all()->toArray();
        return view('frontend.company_form.addEditForm', compact('address', 'countries'));
    }

    public function savePersonOfficer(Request $request)
    {
        // dd($request->personOfficerEditId);
        // dd($request->ChossenResAdd_id);
        $inserted = '';
        $updated = '';

        if ($request->personOfficerEditId === null) {
            $inserted = PersonOfficer::create([
                'shopping_cart_id' => $request->shoppingCartId,
                'title' => $request->person_tittle,
                'dob_day' => $request->person_bday,
                'first_name' => $request->person_fname,
                'nationality' => $request->person_national,
                'last_name' => $request->person_lname,
                'occupation' => $request->person_occupation,
                'add_id' => $request->ChossenResAdd_id,
                'authenticate_one' => $request->person_aqone,
                'authenticate_one_ans' => $request->person_aqone_ans,
                'authenticate_two' => $request->person_aqtwo,
                'authenticate_two_ans' => $request->person_aqtwo_ans,
                'authenticate_three' => $request->person_aqthree,
                'authenticate_three_ans' => $request->person_aqthree_ans,
            ]);

            if ($inserted) {
                return $inserted;
            }
        } else {
            $updated = PersonOfficer::where('id', $request->personOfficerEditId)->update([
                'shopping_cart_id' => $request->shoppingCartId,
                'title' => $request->person_tittle,
                'dob_day' => $request->person_bday,
                'first_name' => $request->person_fname,
                'nationality' => $request->person_national,
                'last_name' => $request->person_lname,
                'occupation' => $request->person_occupation,
                'add_id' => $request->ChossenResAdd_id,
                'authenticate_one' => $request->person_aqone,
                'authenticate_one_ans' => $request->person_aqone_ans,
                'authenticate_two' => $request->person_aqtwo,
                'authenticate_two_ans' => $request->person_aqtwo_ans,
                'authenticate_three' => $request->person_aqthree,
                'authenticate_three_ans' => $request->person_aqthree_ans,
            ]);

            if ($updated) {
                return $updated;
            }
        }
    }

    public function new_address_form(Request $request)
    {
        $where = $request->get('where') !== '' ? $request->get('where') : '';

        $countries = Country::all()->toArray();

        return view('frontend.company_form.addAddressForm', compact('countries', 'where'));
    }

    public function enter_new_address(Request $request)
    {

        $inserted = Address::create([
            'user_id' => Auth::user()->id,
            'address_type' => 'office_address',
            'house_number' => $request->house_noNew,
            'street' => $request->streetNew,
            'locality' => $request->localityNew,
            'town' => $request->townNew,
            'county' => $request->countyNew,
            'post_code' => $request->zip_code,
            'billing_country' => $request->billing_countryNew,
        ]);

        if ($inserted) {
            return $request->where;
        }
    }

    public function selected_address(Request $request) {
        $id = $request->get('offValadd_id');

        $add = Address::where('id',$id)->get();

        $house_number = $add[0]['house_number'];
        $street = $add[0]['street'];
        $locality = $add[0]['locality'];
        $town = $add[0]['town']; 
        $county = $add[0]['county']; 
        $post_code = $add[0]['post_code']; 

        $data = $house_number.",".$street.",".$locality.",".$town.",".$county.",".$post_code;

        return $data;
    }

    public function person_appointment_save() {
        
    }
}
