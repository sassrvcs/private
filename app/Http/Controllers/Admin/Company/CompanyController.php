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
use App\Models\Companie;

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
        $fullDate = $request->query('dateRange');
        $dateRange = $request->query('dateRange')!=null?explode('/',$request->query('dateRange')):null;
        $companies = $this->companyService->index($request);

        $statuses = [
            '1' => 'Pending',
            '2' => 'In progress',
            '3' => 'Approved',
            '4' => 'Reject'
        ];

        //echo "<pre>";
        //print_r($companies);die;
        return view('admin.company.index',compact('companies','search', 'statuses','fullDate','request'));
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
            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);

            if(isset($array['GovTalkDetails']['GovTalkErrors'])){

                $data = ['status' => 'error_xml','data'=>$array['GovTalkDetails']];
                return response()->json($data, 200);
            }else{
                $xml_details->submitted = 1;
                $xml_details->save();
                $data = ['status' => 'success'];
                return response()->json($data, 200);
            }


        }else{
            $data = ['status' => 'error'];
            return response()->json($data, 200);
        }

    }

    public function viewXML(Request $request){
        $xml_details = companyXmlDetail::where('order_id',$request->order_id)->first();
        if($xml_details){
            $data = ['status' => 'success','xml'=>$xml_details->xml_body];
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
        if($xml_details){
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
            // echo $response;
            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);


            if(isset($array['Body']['SubmissionStatus']['Status'])){

                if($array['Body']['SubmissionStatus']['Status']['StatusCode']=='ACCEPT'){


                   $status = $array['Body']['SubmissionStatus']['Status']['StatusCode'];
                   $company_number = $array['Body']['SubmissionStatus']['Status']['CompanyNumber'];
                   $doc_req_key = $array['Body']['SubmissionStatus']['Status']['IncorporationDetails']['DocRequestKey'];
                   $comment =$array['Body']['SubmissionStatus']['Status']['Examiner']['Comment'];
                   $auth_code =$array['Body']['SubmissionStatus']['Status']['IncorporationDetails']['AuthenticationCode'];
                   $date = $array['Body']['SubmissionStatus']['Status']['IncorporationDetails']['IncorporationDate'];
                    $xml_details->doc_request_key= $doc_req_key;
                    $xml_details->form_date = $date;
                    $xml_details->save();

                    // GET PDF via DOC REQ KEY

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
                    CURLOPT_POSTFIELDS =>'<GovTalkMessage
                        xmlns="http://www.govtalk.gov.uk/CM/envelope"
                        xmlns:dsig="http://www.w3.org/2000/09/xmldsig#"
                        xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlgw.companieshouse.gov.uk/v2-1/schema/Egov_ch-v2-0.xsd">
                            <EnvelopeVersion>1.0</EnvelopeVersion>
                            <Header>
                                <MessageDetails>
                                    <Class>GetDocument</Class>
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
                                    <!-- <EmailAddress></EmailAddress> -->
                                </SenderDetails>
                            </Header>
                            <GovTalkDetails>
                                <Keys/>
                            </GovTalkDetails>
                            <Body>


                                <GetDocument>
                                    <DocRequestKey>'.$doc_req_key.'</DocRequestKey>
                                </GetDocument>

                            </Body>
                        </GovTalkMessage>',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/xml'
                    ),
                    ));

                    $response = curl_exec($curl);
                    $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
                    $json = json_encode($xml);
                    $array = json_decode($json,TRUE);
                    $document = $array['Body']['DocumentData'];
                    if($document){
                        $xml_details->pdf_content = $document;
                        $xml_details->dave();
                    }



                }else if($array['Body']['SubmissionStatus']['Status']['StatusCode']=='PENDING'){
                    $comment = $array['Body']['SubmissionStatus']['Status']['Examiner']['Comment'];
                    $status = $array['Body']['SubmissionStatus']['Status']['StatusCode'];
                    $company_number = $array['Body']['SubmissionStatus']['Status']['CompanyNumber'];
                    $doc_req_key = null;
                    $auth_code =null;
                    $date = null;
                }else{

                    $comment = $array['Body']['SubmissionStatus']['Status']['Rejections']['Reject']['Description'];
                    $status = $array['Body']['SubmissionStatus']['Status']['StatusCode'];
                    $company_number = $array['Body']['SubmissionStatus']['Status']['CompanyNumber'];
                    $doc_req_key = null;
                    $auth_code =null;
                    $date = null;

                }
                    $data = ['status' => 'success','comment'=>$comment,'xml_status'=>$status,'company_number'=>$company_number,'doc_key'=>$doc_req_key,'auth_code'=>$auth_code,'date'=>$date];
                    return response()->json($data, 200);
            }else{
                $data = ['status' => 'error'];
                return response()->json($data, 200);
            }
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
            $order->order_status = $status;

            //update
            // $order->save();
        }

            $company = Companie::where('order_id',$order_id)->first();
            if($company){
                $company->status = $status ;
                $company->save();
            }
            if($status=='3'){
                $xml_details = companyXmlDetail::where('order_id',$order_id)->first();
                $xml_details->company_no = $company_number;
                $xml_details->authentication_code =$auth_code;
                $xml_details->save();
            }
            if($status=='4'){
                $xml_details = companyXmlDetail::where('order_id',$order_id)->first();

                $xml_details->admin_comment = $request->admin_comment;
                $xml_details->save();
            }

        $data = ['status' => 'success'];
        return response()->json($data, 200);
    }
}
