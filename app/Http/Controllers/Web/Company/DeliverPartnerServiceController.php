<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\DeliveryPartnerDetail;
use App\Models\Person_appointment;
use Illuminate\Support\Facades\Session;
use App\Services\XMLCreation\GenerateXmlService;

use DB ;

class DeliverPartnerServiceController extends Controller
{
    public function __construct(
        protected CompanyFormService $companyFormService,
        protected BusinessEssentialsService $businessEssentialsService,
        protected GenerateXmlService $xmlService


    ) { }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_id = $_GET['order'];

        // $Order_details =
        $deliveryPartner = $this->companyFormService->getCompanieName($_GET['order']);
        // dd($deliveryPartner);
        $all_order = $this->businessEssentialsService->showOrder($order_id);

        $net_total = 0;
        $total_vat =0;
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

        $partner_services_contact_name = Person_appointment::join('person_officers','person_officers.id','=','person_appointments.person_officer_id')->leftJoin('addresses','person_officers.add_id','=','addresses.id')->select('person_officers.first_name','person_officers.last_name','person_officers.id','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country','addresses.address_type','person_officers.add_id')->where('person_appointments.order',$order_id)->distinct()->get()->toArray();


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
        return view('frontend.company_form.deliver_partner.delivery_service',compact('deliveryPartner','user','primary_address','billing_address','countries','primary_address_list','billing_address_list','all_order','net_total','total_vat','partner_services_contact_name'));

    }
    // public function fetchPartnerDetails()
    // {
    //     echo "hello";

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $exist_order = DeliveryPartnerDetail::where('order_id',$request->order_id)->first();
        if($exist_order){
            $exist_order->delete();
        }
        $referrer_name= $request->referrer_name;;
        if($request->contact_referer=='myself')
        {$referrer_name='';}
        $save_order_details = new DeliveryPartnerDetail();
        $save_order_details->order_id = $request->order_id;
        $save_order_details->order_desc = $request->order_desc;
        $save_order_details->recipient_name = $request->recipient_name;
        $save_order_details->recipient_email = $request->recipient_email;
        $save_order_details->regulated_body = $request->regulated;
        $save_order_details->dob = $request->dob;
        // $save_order_details->address = $request->address;
        $save_order_details->residential_address = $request->res_address;
        $save_order_details->relation = $request->relation_area;
        $save_order_details->referring = $request->contact_referer;
        $save_order_details->referrer_name = $referrer_name;
        $save_order_details->contact_name = $request->contact_name;
        $save_order_details->contact_email = $request->contact_email;
        $save_order_details->contact_phone = $request->contact_phone;
        $save_order_details->contact_mobile = $request->contact_mobile;
        $save_order_details->contact_calltime = $request->call_time;
        $save_order_details->contact_address = $request->res_address;
        // dd($save_order_details);
        $save_order_details->save();

        if($save_order_details->save())
        {
            $company_details = $this->companyFormService->getCompanieName($request->order_id);


            if($company_details->companie_type=='Limited By Shares'){
                $this->xmlService->bySHRModel($request->order_id);

            }elseif($company_details->companie_type=='Limited By Guarantee'){
                $this->xmlService->byGURModel($request->order_id);

            }
            elseif($company_details->companie_type=='Public Limited Company'){
                $this->xmlService->byPLCModel($request->order_id);

            }


            return redirect( route('checkout', ['order' => $request->order_id,'step'=>'final_payment']) );


        }else{
            return redirect()->back()->with('error', 'Please check issue');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
