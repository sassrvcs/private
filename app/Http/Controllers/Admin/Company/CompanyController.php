<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use App\Services\User\UserService;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Validator;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\companyXmlDetail;
use Redirect;

class CompanyController extends Controller
{

    public function __construct(

        protected UserService $userService,
        protected CompanyService $companyService,
        protected CompanyFormService $companyFormService,
        protected OrderService $orderService,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $companies = $this->companyService->index($search);

        $statuses = [
            '0' => 'Pending',
            '1' => 'In progress',
            '2' => 'Approved',
            '3' => 'Reject'
        ];

        //echo "<pre>";
        //print_r($companies);die;
        return view('admin.company.index',compact('companies','search', 'statuses'));
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {
        $review = $this->companyFormService->getCompanieName($id);
        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }
        // dd($review);
        return view('admin.company.view', compact('review', 'person_officers', 'appointmentsList'));
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function submitCompanyHouse(Request $request)
    {
        $order_id = $request->order_id;

        $xml_details = companyXmlDetail::where('order_id',$order_id)->first();
        if($xml_details){
            $xml_body = $xml_details->xml_body;
            $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://xmlgw.companieshouse.gov.uk/v1-0/xmlgw/Gateway',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>$xml_body,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/xml'
                ),
                ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;


            $data = ['status' => 'success'];
            return response()->json($data, 200);
        }else{
            $data = ['status' => 'error'];
            return response()->json($data, 200);
        }

    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function checkStatus(Request $request)
    {
        $order_id = $request->order_id;

        $xml_details = companyXmlDetail::where('order_id',$order_id)->first();

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://xmlgw.companieshouse.gov.uk/v1-0/xmlgw/Gateway',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope"
                xmlns:dsig="http://www.w3.org/2000/09/xmldsig#"
                xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <EnvelopeVersion />
                <Header>
                    <MessageDetails>
                        <Class>GetSubmissionStatus</Class>
                        <Qualifier>request</Qualifier>
                        <TransactionID>'.$xml_details->tans_no.'</TransactionID>
                        <GatewayTest>1</GatewayTest>
                    </MessageDetails>
                    <SenderDetails>
                        <IDAuthentication>
                            <SenderID>bf95afdc61d6291b3a8a18b2009c2623</SenderID>
                            <Authentication>
                                <Method>clear</Method>
                                <Value>207227c10fa5d8e737f4ff5b2201d4be</Value>
                            </Authentication>
                        </IDAuthentication>
                    </SenderDetails>
                </Header>
                <GovTalkDetails>
                    <Keys />
                </GovTalkDetails>
                <Body>

                    <GetSubmissionStatus>
                        <SubmissionNumber>'.$xml_details->submission_no.'</SubmissionNumber>
                    </GetSubmissionStatus>
                </Body>
            </GovTalkMessage>',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/xml',
                'Authorization: Basic MmU2NjJmODMtMTA4NS00NWFkLWEyMTMtNzM4YWJjMThhNGFiOg=='
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

        // $data = ['status' => 'success'];
        // return response()->json($data, 200);
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function updateStatus(Request $request)
    {
        $order_id = $request->order_id;
        $company_number = $request->company_number;
        $auth_code = $request->auth_code;
        $status = $request->status;

        $order = $this->orderService->getOrder($order_id);

        if($order){
            $order->company_number = $company_number;
            $order->auth_code = $auth_code;
            //$order->order_status = $status;

            //update
            $order->save();
        }

        $data = ['status' => 'success'];
        return response()->json($data, 200);
    }
}
