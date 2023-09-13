<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;
use App\Models\Address;
use App\Models\Companie;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use PDF;
class CompaniesListController extends Controller
{
    public  function __construct(
        protected UserService $userService,
        protected CompanyFormService $companyFormService,
        protected OrderService $orderService,
    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authID = auth()->user()->id;
        $companies = $this->userService->show($authID);

        // dump($companies);
        return view('frontend.companies.company', compact('companies'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function acceptedCompanyDetails(Request $request)
    {
        $order_id = $request->order;

        $order = $this->orderService->getOrder($order_id);

        $cartInfo = ShoppingCart::where(['user_id' => auth()->user()->id])->get()->first();

        $shoppingCartId = '';
        if (!empty($cartInfo)) {
            if (!empty($cartInfo['id'])) {
                $shoppingCartId = $cartInfo['id'];
            } else {
                $shoppingCartId = '';
            }
        }

        $used_address = Address::where('user_id', auth()->user()->id)->get();
        $countries = Country::all()->toArray();

        $person_officers = PersonOfficer::where('order_id', $order_id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $order_id)->get()->toArray();

        $review = $this->companyFormService->getCompanieName($order_id);

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        return view('frontend.companies.overview', compact('used_address', 'countries', 'shoppingCartId', 'person_officers',
            'appointmentsList','review','order'));
    }
    public function efillingPdf(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::where('id',$request->query('c_id'))->get()->first();

        $order_id = $request->query('order');
        $order_details = Order::where('order_id',$order_id)->get()->first();
        $person_officers_director_id=[];
        $director_names ='';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Director', $positionArray)){
                if ($director_names=='') {
                    $director_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_director_id)){
                        $director_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_director_id,$val['person_officer_id']);
            }
        }

        $data = ['customer_name'=>$director_names,'company_name'=>$company_details['companie_name'],'order_ref'=>$order_id,'auth_code'=>$order_details['auth_code']];
        $pdf = PDF::loadView('PDF.efilling_pdf',$data);

        return $pdf->download($order_details['company_name'].'_efilling.pdf');
    }
    public function generateCertificate(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::with('officeAddressWithoutForwAddress')->with('forwAddress')->where('id',$request->query('c_id'))->get()->first();
        $date = '11/09/2023';
        $company_number = '123456789';
        $address_details = $company_details['office_address']!=null?$company_details['officeAddressWithoutForwAddress']:$company_details['forwAddress'];
        $company_name = $company_details['companie_name'];
        $company_office_address = $this->construct_address($address_details);
        $registered_in = $address_details['county'];
        $shareholders_names ='';
        $director_names ='';
        $customer_name = auth()->user()->title.' '.auth()->user()->forename.' '.auth()->user()->surname;
        $number_of_shares=null;
        $person_officers_id = [];
        $person_officers_director_id=[];
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){
                $number_of_shares+= $val['sh_quantity'];
                if ($shareholders_names=='') {
                    $shareholders_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_id)){
                        $shareholders_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_id,$val['person_officer_id']);
            }
            if(in_array('Director', $positionArray)){
                if ($director_names=='') {
                    $director_names .= $val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                }else{
                    if(!in_array($val['person_officer_id'],$person_officers_director_id)){
                        $director_names .= ','.$val['person_officers']['first_name'].' '.$val['person_officers']['last_name'];
                    }
                }
                array_push($person_officers_director_id,$val['person_officer_id']);
            }
        }
        $data = ['date' => $date, 'company_number' => $company_number, 'company_name' => $company_name, 'company_office_address' => $company_office_address, 'registered_in' => $registered_in, 'number_of_shares' => $number_of_shares,'shareholders_names'=>$shareholders_names,'customer_name'=>$customer_name,'director_names'=>$director_names];
        // dd($data);
        $pdf = PDF::loadView('PDF.certificate_pdf',$data);
        return $pdf->download($company_name.'_certificate.pdf');


    }
    public function memoArticlesFull(Request $request)
    {
        $appointmentsList = Person_appointment::with('person_officers')->where('order', $request->query('order'))->get();
        $company_details = Companie::where('id',$request->query('c_id'))->get()->first();
        $company_name = $company_details['companie_name'];
        $date = '11/09/2023';
        $company_number = '123456789';
        $person_officers_id = [];
        $shareholders_names = [];
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){

                    if(!in_array($val['person_officer_id'],$person_officers_id)){
                        array_push($shareholders_names,$val['person_officers']['first_name'].' '.$val['person_officers']['last_name']);
                    }

                array_push($person_officers_id,$val['person_officer_id']);
            }
        }
        $data = ['date' => $date, 'company_number' => $company_number, 'shareholders_names'=>$shareholders_names,'company_name'=>$company_name];
        $pdf = PDF::loadView('PDF.memoArticlesFull_pdf',$data);
        return $pdf->download($company_name.'_Memorandum&Articles(Full Document).pdf');
    }
    public function memoArticlesDoc(Request $request)
    {

    }
    public function incorporateCertificate(Request $request)
    {
        $base64encodedstring = "996";
        $filePath = storage_path('app/public/incorporateCertificate/file.pdf');
        $decodeBase64 = base64_decode($base64encodedstring,true);
        file_put_contents($filePath, $decodeBase64);
        return response()->download($filePath);
    }
    private function construct_address($address)
    {
        $con_address = '';
        if($address['house_number']!='')
        {
            $con_address .= $address['house_number'].', ';
        }
        if($address['street']!='')
        {
            $con_address .= $address['street'].', ';
        }
        if($address['locality']!='')
        {
            $con_address .= $address['locality'].', ';
        }
        if($address['town']!='')
        {
            $con_address .= $address['town'].', ';
        }
        if($address['county']!='')
        {
            $con_address .= $address['county'].', ';
        }
        if($address['post_code']!='')
        {
            $con_address .= $address['post_code'];
        }
        return $con_address;
    }
}
