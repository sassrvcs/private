<?php

namespace App\Http\Controllers\Web\Company\CompanyForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyForm\RegisterAddress\RegisterAddressService;
use App\Models\Companie;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;
use App\Models\companyFormStep;
use App\Http\Requests\Company\CompanieFormAccessRequest;
use App\Http\Requests\Company\CompanieStoreRequest;
use App\Models\Jurisdiction;
use App\Models\Order;
use App\Services\CompanieSearchService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;

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
        $order = Order::where('order_id', $_GET['order'])->first();

        $office_address = Companie::where('companie_name', 'LIKE', '%' . $order->company_name . '%')->pluck('office_address')->first();

        $recent_addr  = $this->regAddrService->getRecentAddress($office_address);

        $countries = Country::all();

        return view('frontend.company_form.register_address', compact('recent_addr', 'countries'));
    }

    public function registerAddressStoreStep(Request $request)
    {
        // First check if under Step List

        $order = $request->order_id;
        $exist_order = companyFormStep::where('order', $order)->where('section', 'company_formation')->where('step', 'register-address')->first();
        if ($exist_order) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        } else {
            $order_details = Order::where('order_id', $order)->first();

            $company_id = Companie::where('companie_name', 'LIKE', '%' . $order_details->company_name . '%')->pluck('id')->first();

            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request->order_id;
            $companyFormStep->order_id = $order_details->id;
            $companyFormStep->company_id  = $company_id;
            $companyFormStep->section  = 'company_formation';
            $companyFormStep->step  = 'register-address';

            $companyFormStep->save();

            $orders = Order::with('user')->where('order_id', $request->order_id)->first();
            $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();
            $companyFormationStep->section_name = 'company_formation';
            $companyFormationStep->step_name = 'register-address';
            $companyFormationStep->save();


            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        }
    }

    public function buisnessAddressStoreStep(Request $request)
    {
        $order = $request->order_id;
        $exist_order = companyFormStep::where('order', $order)->where('section', 'company_formation')->where('step', 'business-address')->first();
        if ($exist_order) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        } else {
            $order_details = Order::where('order_id', $order)->first();

            $company_id = Companie::where('companie_name', 'LIKE', '%' . $order_details->company_name . '%')->pluck('id')->first();

            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request->order_id;
            $companyFormStep->order_id = $order_details->id;
            $companyFormStep->company_id  = $company_id;
            $companyFormStep->section  = 'company_formation';
            $companyFormStep->step  = 'business-address';

            $companyFormStep->save();

            $orders = Order::with('user')->where('order_id', $request->order_id)->first();
            $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();
            $companyFormationStep->section_name = 'company_formation';
            $companyFormationStep->step_name = 'business-address';
            $companyFormationStep->save();
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        }
    }

    public function appointmentStoreStep(Request $request)
    {
        $order = $request->order_id;
        $exist_order = companyFormStep::where('order', $order)->where('section', 'company_formation')->where('step', 'appointments')->first();
        if ($exist_order) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        } else {
            $order_details = Order::where('order_id', $order)->first();

            $company_id = Companie::where('companie_name', 'LIKE', '%' . $order_details->company_name . '%')->pluck('id')->first();

            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request->order_id;
            $companyFormStep->order_id = $order_details->id;
            $companyFormStep->company_id  = $company_id;
            $companyFormStep->section  = 'company_formation';
            $companyFormStep->step  = 'appointments';

            $companyFormStep->save();

            $orders = Order::with('user')->where('order_id', $request->order_id)->first();
            $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();
            $companyFormationStep->section_name = 'company_formation';
            $companyFormationStep->step_name = 'appointments';
            $companyFormationStep->save();
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        }
    }

    public function reviewStoreStep(Request $request){
        $order = $request->order_id;
        $exist_order = companyFormStep::where('order', $order)->where('section', 'Review')->where('step', 'review')->first();
        if ($exist_order) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        } else {
            $order_details = Order::where('order_id', $order)->first();

            $company_id = Companie::where('companie_name', 'LIKE', '%' . $order_details->company_name . '%')->pluck('id')->first();

            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request->order_id;
            $companyFormStep->order_id = $order_details->id;
            $companyFormStep->company_id  = $company_id;
            $companyFormStep->section  = 'Review';
            $companyFormStep->step  = 'review';

            $companyFormStep->save();

            $orders = Order::with('user')->where('order_id', $request->order_id)->first();
            $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();
            $companyFormationStep->section_name = 'Review';
            $companyFormationStep->step_name = 'review';
            $companyFormationStep->save();
            return response()->json(['success' => 'true', 'message' => 'Successfully Done.'], 200);
        }

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
        $order = Order::where('order_id',$_GET['order'])->first();

        $used_address = Address::where('user_id', Auth::user()->id)->get();

        $forwardingAdd = Companie::where('companie_name', 'LIKE', '%' . $order->company_name . '%')->first()->toArray();
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
        $order = Order::where('order_id',$_GET['order'])->first();

        $countries = Country::all()->toArray();

        $used_address = Address::where('user_id', Auth::user()->id)->get();

        $forwardingAdd = Companie::where('companie_name', 'LIKE', '%' . $order->company_name . '%')->first()->toArray();
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

        $order = Order::where('order_id', $request->order_id)->first();
        // dd($order);
        $company_name = $order->company_name;
        $address_id = $request->input('address_id');


        $Company = Companie::updateOrCreate(
            ['companie_name' =>  $company_name],
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

        $person_officers = PersonOfficer::where('order_id', $_GET['order'])->get()->toArray();

        $personAppointments = Person_appointment::where('order', $_GET['order'])->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        return view('frontend.company_form.appointments', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList'));
    }

    public function appointments_open_corporate()
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

        $person_officers = PersonOfficer::where('order_id', $_GET['order'])->get()->toArray();

        $personAppointments = Person_appointment::where('order', $_GET['order'])->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        return view('frontend.company_form.appointments_corporate', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList'));
    }



    public function remove_officer_list(Request $request)
    {

        $id = $request->id;

        $result = Person_appointment::where('id', $id)->delete();

        if ($result) {
            return 1;
        }
    }

    public function update_shareholder_from_appointment_listing(Request $request)
    {
        $idVal = $request->idVal;

        $edit_share_price = $request->edit_share_price;
        $edit_share_currency = $request->edit_share_currency;
        $edit_share_particulars = $request->edit_share_particulars;

        $updated = 1;
        // foreach ($idVal as $key => $value) {
        //     # code...
        //     $updated = Person_appointment::where('id', $value)->update([
        //         'sh_pps' => $edit_share_price["$key"],
        //         'sh_currency' => $edit_share_currency["$key"],
        //         'perticularsTextArea' => $edit_share_particulars["$key"],
        //     ]);
        // }
        //push
        $fetch_share_sh_pps = Person_appointment::where(['order'=>$request->order_id])->whereIn('position',['Shareholder'])->whereNotNull('sh_pps')->latest('updated_at')->get()->first()->toArray();
        if($fetch_share_sh_pps)
        {
            $sh_pps = $fetch_share_sh_pps['sh_pps'];
            $sh_currency = $fetch_share_sh_pps['sh_currency'];
            $particulars = $fetch_share_sh_pps['perticularsTextArea'];
            Person_appointment::where(['order'=>$request->order_id])->whereIn('position',['Shareholder'])->whereNotNull('sh_pps')->update([
                'sh_pps' => $sh_pps,
                'sh_currency' => $sh_currency,
                'perticularsTextArea' =>$particulars
            ]);
        }
        if ($updated) {
            return 1;
        }
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
        $inserted = '';
        $updated = '';
        $legal_form = $request->has('legal_form')?$request->legal_form:null;
        $law_governed = $request->has('law_governed')?$request->law_governed:null;
        $registry_held = $request->has('registry_held')?$request->registry_held:null;
        $place_registered = $request->has('place_registered')?$request->place_registered:null;
        $registration_number = $request->has('registration_number')?$request->registration_number:null;
        $uk_registered = $request->has('uk_registered')?$request->uk_registered:'Yes';
        $legal_name = $request->has('legal_name')?$request->legal_name:null;
        $uk_registered = $uk_registered==null?'Yes':$uk_registered;

        if ($request->personOfficerEditId === null) {

            $inserted = PersonOfficer::create([
                'user_id' => Auth::user()->id,
                'order_id' => $request->order_id,
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

                'legal_form' => $legal_form,
                'law_governed' => $law_governed,
                'registry_held' => $registry_held,
                'place_registered' => $place_registered,
                'registration_number' => $registration_number,
                'uk_registered' => $uk_registered,
                'legal_name' => $legal_name

            ]);

            if ($inserted) {
                return $inserted;
            }
        } else {


            $updated = PersonOfficer::where('id', $request->personOfficerEditId)->update([
                'order_id' => $request->order_id,
                'user_id' => Auth::user()->id,
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

                'legal_form' => $legal_form,
                'law_governed' => $law_governed,
                'registry_held' => $registry_held,
                'place_registered' => $place_registered,
                'registration_number' => $registration_number,
                'uk_registered' => $uk_registered,
                'legal_name' => $legal_name
            ]);

            if ($updated) {
                $updatedRow = PersonOfficer::orderBy('updated_at', 'DESC')->first();
                return $updatedRow;
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

    public function selected_address(Request $request)
    {
        $id = $request->get('offValadd_id');

        $add = Address::where('id', $id)->get();

        $house_number = $add[0]['house_number'];
        $street = $add[0]['street'];
        $locality = $add[0]['locality'];
        $town = $add[0]['town'];
        $county = $add[0]['county'];
        $post_code = $add[0]['post_code'];

        $data = $house_number . "," . $street . "," . $locality . "," . $town . "," . $county . "," . $post_code;

        return $data;
    }

    public function person_appointment_save(Request $request)
    {
        $inserted = Person_appointment::create([
            'order' => $request->order_id,
            'user_id' => Auth::user()->id,
            'cart_id' => $request->cart_id,
            'person_officer_id' => $request->person_officer_id,
            'own_address_id' => $request->own_address_id,
            'forwarding_address_id' => $request->forwarding_address_id,
            'company_id' => $request->company_id,
            'position' => $request->position,
            'noc_os' => $request->noc_os,
            'noc_vr' => $request->noc_vr,
            'noc_appoint' => $request->noc_appoint,
            'noc_others' => $request->noc_others,
            'fci' => $request->fci,
            'fci_os' => $request->fci_os,
            'fci_vr' => $request->fci_vr,
            'fci_appoint' => $request->fci_appoint,
            'fci_others' => $request->fci_others,
            'tci' => $request->tci,
            'tci_os' => $request->tci_os,
            'tci_vr' => $request->tci_vr,
            'tci_appoint' => $request->tci_appoint,
            'tci_others' => $request->tci_others,
            'sh_quantity' => $request->sh_quantity,
            'sh_currency' => $request->sh_currency,
            'sh_pps' => $request->sh_pps,
            'perticularsTextArea' => $request->perticularsTextArea,
            'appointment_type' => $request->appointment_type
        ]);

        if ($inserted) {
            return 1;
        }
    }
    public function person_appointment_update(Request $request)
    {
        $appointment_id = $request->appointment_id;
        // return($appointment_id);
        $appointment_exists = Person_appointment::find($appointment_id);
        if($appointment_exists){
            if(stripos($request->fci,'no')!==false){
                $fci_appoint = null;
                $fci_others = null;
                $fci_vr = null;
                $fci_os = null;
            }else{
                $fci_appoint = $request->fci_appoint;
                $fci_others = $request->fci_others;
                $fci_vr = $request->fci_vr;
                $fci_os = $request->fci_os;
            }
            if(stripos($request->tci,'no')!==false){
                $tci_appoint = null;
                $tci_others = null;
                $tci_vr = null;
                $tci_os = null;
            }else{
                $tci_appoint = $request->tci_appoint;
                $tci_others = $request->tci_others;
                $tci_vr = $request->tci_vr;
                $tci_os = $request->tci_os;
            }
            $updated = Person_appointment::where('id', $appointment_id)->update([
                'order' => $request->order_id,
                'user_id' => Auth::user()->id,
                'cart_id' => $request->cart_id,
                'person_officer_id' => $request->person_officer_id,
                'own_address_id' => $request->own_address_id,
                'forwarding_address_id' => $request->forwarding_address_id,
                'company_id' => $request->company_id,
                'position' => $request->position,
                'noc_appoint' => $request->noc_appoint,
                'noc_os' => $request->noc_os,
                'noc_vr' => $request->noc_vr,
                'noc_others' => $request->noc_others,
                'fci_appoint' => $fci_appoint,
                'fci' => $request->fci,
                'fci_os' => $fci_os,
                'fci_vr' => $fci_vr,
                'fci_others' => $fci_others,
                'tci' => $request->tci,
                'tci_os' => $tci_os,
                'tci_vr' => $tci_vr,
                'tci_appoint' =>$tci_appoint,
                'tci_others' => $tci_others,
                'sh_quantity' => $request->sh_quantity,
                'sh_currency' => $request->sh_currency,
                'sh_pps' => $request->sh_pps,
                'perticularsTextArea' => $request->perticularsTextArea,
                'appointment_type' => $request->appointment_type
            ]);
        }else{
            return "User not found";
        }

        if ($updated) {
            return 1;
        }else{
            return 0;
        }
    }
    public function appointments_open_otherLegalEntity()
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

        $person_officers = PersonOfficer::where('order_id', $_GET['order'])->get()->toArray();

        $personAppointments = Person_appointment::where('order', $_GET['order'])->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        return view('frontend.company_form.appointments_OtherLegalEntity', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList'));
    }

    public function person_appointment_edit(Request $request)
    {
        $appointment_id = $request->query('id');
        $appointment_details = Person_appointment::with('forwarding_address')->with('own_address')->where('id', $appointment_id)->get()->first()->toArray();
        // dd($appointment_details);
        $officer_details = PersonOfficer::with('address')->where('id', $appointment_details['person_officer_id'])->get()->first()->toArray();
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

        $person_officers = PersonOfficer::where('order_id', $_GET['order'])->get()->toArray();

        $personAppointments = Person_appointment::where('order', $_GET['order'])->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }
        // dd($appointment_details);
        if($appointment_details['appointment_type']=='corporate')
        {
            return view('frontend.company_form.edit_appointments_corporate', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList','appointment_details','officer_details'));
        }
        if($appointment_details['appointment_type']=='other_legal_entity')
        {
        return view('frontend.company_form.edit_appointments_otherLegalEntity', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList','appointment_details','officer_details'));

        }

        return view('frontend.company_form.edit_appointments', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 'appointmentsList','appointment_details','officer_details'));
    }

}
