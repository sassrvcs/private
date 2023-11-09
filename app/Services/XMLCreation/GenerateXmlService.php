<?php

namespace App\Services\XMLCreation;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Country;
use App\Models\Address;
use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\orderTransaction;
use App\Models\DeliveryPartnerDetail;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Spatie\PdfToText\Pdf;
use App\Models\companyXmlDetail;
use App\Models\Nationality;
use Carbon\Carbon;


/**
 * @todo work in progress
 * @note extends BaseService
 */
class GenerateXmlService
{
    /**
     * Order listing
     *
     */

     public function __construct(
        protected CompanyFormService $companyFormService,
    ) { }

    // XML generate for BYSHR model / Non-Residential Model
    public function bySHRModel($id)
    {

        ini_set('max_execution_time', 0);
        $review = $this->companyFormService->getCompanieName($id);


        $ArticleDocument='';
        $SensitiveDocument='';
        $SamenameDocument='';
        $sameName='false';
        $NameAuthorisation='false';


        //For Articles of Association
        $document = $review->getMedia('documents')->sortByDesc('updated_at')->first();

        if ($document) {

            $documentName = $document->file_name;
            $documentUrl = $document->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $ArticleDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>ARTS</Category>
                                </Document>';

        }
        // For Same Name

        $document_same_name = $review->getMedia('company-same-as-name-document')->sortByDesc('updated_at')->first();
        if ($document_same_name) {
            $sameName='true';
            $documentName = $document_same_name->file_name;
            $documentUrl = $document_same_name->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $SensitiveDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPEXISTNAME</Category>
                                </Document>';

        }
        // For Sensitive Name
        $document_sensetive = $review->getMedia('company-sensetive-document')->sortByDesc('updated_at')->first();
        if ($document_sensetive) {
            $NameAuthorisation='true';
            $documentName = $document_sensetive->file_name;
            $documentUrl = $document_sensetive->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));
            $SamenameDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPNAMEAUTH</Category>
                                </Document>';

        }



        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);
        $order_details = Order::where('order_id',$id)->first();
        $order_trans_details = orderTransaction::where('order_id',$id)->first();
        $delivery_partner_details = DeliveryPartnerDetail::where('order_id',$id)->first();
        // dd($delivery_partner_details);
        if($review->office_address){
            $registered_office_address = Address::where('id',$review->office_address)->first();
            if($registered_office_address->county=='England'){
                $country = 'GB-ENG';
            }else if($registered_office_address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                $country = 'GBR';
            }else if($registered_office_address->county=='Scotland'){
                $country = 'GB-SCT';
            }else if($registered_office_address->county=='Northern Ireland'){
                $country = 'GB-NIR';
            }else if($registered_office_address->county=='Wales'){
                $country = 'GB-WLS';
            }else{
                $country = 'UNDEF';
            }
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>'.$registered_office_address->house_number.'</Premise>
                                            <Street>'.$registered_office_address->street.'</Street>
                                            <Thoroughfare>'.$registered_office_address->locality.'</Thoroughfare>
                                            <PostTown>'.$registered_office_address->town.'</PostTown>
                                            <Country>'.$country.'</Country>
                                            <Postcode>'.$registered_office_address->post_code.'</Postcode>
                                        </RegisteredOfficeAddress>';
        }else{
            $registered_office_address = Address::where('id',$review->forwarding_registered_office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>52 Danes Court</Premise>
                                            <Street>North End Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Middlesex</PostTown>
                                            <Country>GBR</Country>
                                            <Postcode>HAQ OAE</Postcode>
                                        </RegisteredOfficeAddress>';
        }
        if($review->legal_document=="byspoke_article"){
            $articles = 'BESPOKE';
            $dataMemodrandum = 'true';
        }else{
            $articles = 'BYSHRMODEL';
            $dataMemodrandum = 'true';
        }

        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        // For Director
        $all_director = '';
        foreach ($appointmentsList as $val){

            if($val['appointment_type']=='corporate'){
                $positionArray = explode(', ', $val['position']);
                    if(in_array('Director', $positionArray)){

                        $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                        // dd($officerDetails);
                        if($registered_office_address->id==$officerDetails['add_id']){
                            $same_add = 'true';
                        }else{
                            $same_add = 'true';
                        }
                        $nationality = $officerDetails['nationality'];

                        $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();

                        $address= Address::where('id',$officerDetails['add_id'])->first();
                        if($address->county=='England'){
                            $country = 'GB-ENG';
                        }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                            $country = 'GBR';
                        }else if($address->county=='Scotland'){
                            $country = 'GB-SCT';
                        }else if($address->county=='Northern Ireland'){
                            $country = 'GB-NIR';
                        }else if($address->county=='Wales'){
                            $country = 'GB-WLS';
                        }else{
                            $country = 'UNDEF';
                        }

                        if($officerDetails['uk_registered']=='Yes'){
                            $compantIdnty = '
                                                <UK>
                                                    <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                                </UK>';
                        }else{
                            $compantIdnty = '
                                                <NonUK>
                                                    <PlaceRegistered>'.$officerDetails['place_registered'].'</PlaceRegistered>
                                                    <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                                    <LawGoverned>'.$officerDetails['law_governed'].'</LawGoverned>
                                                    <LegalForm>'.$officerDetails['legal_form'].'</LegalForm>
                                                </NonUK>';
                        }

                         // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }

                        $all_director.='<Appointment>
                                            <ConsentToAct>true</ConsentToAct>
                                            <Authentication>
                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                </Authentication>
                                            <Corporate>
                                            <CorporateName>'.$officerDetails['legal_name'].'</CorporateName>
                                            <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            <CompanyIdentification>
                                            '.$compantIdnty.'
                                            </CompanyIdentification>
                                        </Corporate>
                                        </Appointment>';
                    }
            }else{
                $positionArray = explode(', ', $val['position']);
                if(in_array('Director', $positionArray)){

                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();

                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }

                     // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }
                    $all_director.='<Appointment>
                                        <ConsentToAct>true</ConsentToAct>
                                        <Authentication>
                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                </Authentication>
                                        <Director>
                                            <Person>
                                                <Title>'.$officerDetails['title'].'</Title>
                                                <Forename>'.$officerDetails['first_name'].'</Forename>
                                                <Surname>'.$officerDetails['last_name'].'</Surname>
                                                <ServiceAddress>
                                                    <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                                </ServiceAddress>
                                                <DOB>'.$officerDetails['dob_day'].'</DOB>
                                                <Nationality>'.$nationality_name.'</Nationality>
                                                <Occupation>'.$officerDetails['occupation'].'</Occupation>
                                                <CountryOfResidence>United Kingdom</CountryOfResidence>
                                                <ResidentialAddress>
                                                    <Address>
                                                        <Premise>'.$address->house_number.'</Premise>
                                                        <Street>'.$address->street.'</Street>
                                                        <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                        <PostTown>'.$address->town.'</PostTown>
                                                        <Country>'.$country.'</Country>
                                                        <Postcode>'.$address->post_code.'</Postcode>
                                                    </Address>
                                                </ResidentialAddress>
                                            </Person>
                                        </Director>
                                    </Appointment>';
                }
            }

        }

        echo($all_director);
        die();
        // For Secretary
        // For Director
        $all_secretary = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Secretary', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }

                $all_secretary.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Secretary>
                                        <Person>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                </Address>
                                            </ServiceAddress>
                                        </Person>
                                    </Secretary>
                                </Appointment>';
            }
        }

        // For PSC
        $all_psc = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('PSC', $positionArray)){
                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                $noc_value='';
                if($val['noc_os']!=''){
                    if($val['noc_os']=='More than 25% but not more than 50%'){
                        $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT';
                    }else if($val['noc_os']=='More than 50% but less than 75%'){
                        $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT';
                    }else{
                        $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT';
                    }
                }else if($val['noc_vr']!=''){
                    if($val['noc_vr']=='More than 25% but not more than 50%'){
                        $noc_value='VOTINGRIGHTS_25TO50PERCENT';
                    }else if($val['noc_vr']=='More than 50% but less than 75%'){
                        $noc_value='VOTINGRIGHTS_50TO75PERCENT';
                    }else{
                        $noc_value='VOTINGRIGHTS_75TO100PERCENT';
                    }

                }else if($val['noc_appoint']=='Yes'){
                    $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS';

                }
                else if($val['fci']=='yes'){
                    if($val['fci_os']!=''){
                        if($val['fci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_vr']!=''){
                        if($val['fci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_TRUST';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_TRUST';

                    }
                }else if($val['tci']=='yes'){
                    if($val['tci_os']!=''){
                        if($val['tci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_vr']!=''){
                        if($val['tci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_FIRM';

                    }
                }
                // dd($address);
                $all_psc.=' <PSC>
                                    <PSCNotification>
                                        <Individual>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <Nationality>'.$nationality_name.'</Nationality>
                                            <CountryOfResidence>'.$country_resident.'</CountryOfResidence>
                                            <ResidentialAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                            <ConsentStatement>true</ConsentStatement>
                                        </Individual>
                                        <NatureOfControls>
                                            <NatureOfControl>'.$noc_value.'</NatureOfControl>
                                        </NatureOfControls>
                                    </PSCNotification>
                                </PSC>';
            }
        }

        // For Subscriber
        $total_share=null;
        $total_share_price=null;
        $total_share_currency='';

        $subscriber = '';
        $authoriser = '';

        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){
                $total_share+= $val['sh_quantity'];
                $total_share_price=$val['sh_pps'];
                $total_share_currency=$val['sh_currency'];

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }

                // dd($address);
                $subscriber.='<Subscribers>
                                <Person>
                                    <Forename>'.$officerDetails['first_name'].'</Forename>
                                    <Surname>'.$officerDetails['last_name'].'</Surname>
                                </Person>
                                <Address>
                                    <Premise>'.$address->house_number.'</Premise>
                                    <Street>'.$address->street.'</Street>
                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                    <PostTown>'.$address->town.'</PostTown>
                                    <Country>'.$country.'</Country>
                                    <Postcode>'.$address->post_code.'</Postcode>
                                </Address>
                                <Authentication>
                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                </Authentication>
                                <Shares>
                                    <ShareClass>Ordinary</ShareClass>
                                    <NumShares>'.$val['sh_quantity'].'</NumShares>
                                    <AmountPaidDuePerShare>1</AmountPaidDuePerShare>
                                    <AmountUnpaidPerShare>0</AmountUnpaidPerShare>
                                    <ShareCurrency>'.$val['sh_currency'].'</ShareCurrency>
                                    <ShareValue>'.$val['sh_pps'].'</ShareValue>
                                </Shares>
                                <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company and to take at least one share.</MemorandumStatement>
                            </Subscribers>';

                        $authoriser.='

                                        <Subscriber>
                                                <Person>
                                                    <Forename>'.$officerDetails['first_name'].'</Forename>
                                                    <Surname>'.$officerDetails['last_name'].'</Surname>
                                                </Person>

                                                <Authentication>
                                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                                </Authentication>
                                                <Authentication>
                                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                                </Authentication>
                                                <Authentication>
                                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                                </Authentication>
                                        </Subscriber>';
            }
        }
        // dd($total_share);
        // For Sic Codes
        $SICCode= '';

        foreach($review->sicCodes as  $index=>$SCode){

            $SICCode .='<SICCode>'.$SCode->code.'</SICCode>';

        }


        $xml ='<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope" xmlns:dsig="http://www.w3.org/2000/09/xmldsig#" xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
             <EnvelopeVersion />
                    <Header>
                        <MessageDetails>
                            <Class>CompanyIncorporation</Class>
                            <Qualifier>request</Qualifier>
                            <TransactionID>'.$transaction_id.'</TransactionID>
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
                        <FormSubmission xmlns="http://xmlgw.companieshouse.gov.uk/Header" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
                            <FormHeader>
                                <CompanyName>'.$review->companie_name.'</CompanyName>
                                <PackageReference>4076</PackageReference>
                                <FormIdentifier>CompanyIncorporation</FormIdentifier>
                                <SubmissionNumber>'.$six_digit_random_number.'</SubmissionNumber>
                                <ContactName>'.$delivery_partner_details->recipient_name.'</ContactName>
                                <ContactNumber>'.$delivery_partner_details->recipient_email.'</ContactNumber>
                            </FormHeader>
                            <DateSigned>'.date('Y-m-d').'</DateSigned>
                            <Form>
                                <CompanyIncorporation xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd" xmlns="http://xmlgw.companieshouse.gov.uk">
                                    <CompanyType>BYSHR</CompanyType>
                                    <CountryOfIncorporation>'.$review->jurisdiction->value.'</CountryOfIncorporation>
                                    '.$office_register_address.'
                                    <DataMemorandum>'.$dataMemodrandum.'</DataMemorandum>
                                    <Articles>'.$articles.'</Articles>
                                    <RestrictedArticles>false</RestrictedArticles>
                                    '.$all_director.'
                                    '.$all_secretary.'
                                    <PSCs>
                                    '.$all_psc.'
                                    </PSCs>
                                    <StatementOfCapital>
                                        <Capital>
                                            <TotalAmountUnpaid>0</TotalAmountUnpaid>
                                            <TotalNumberOfIssuedShares>'.$total_share.'</TotalNumberOfIssuedShares>
                                            <ShareCurrency>'.$total_share_currency.'</ShareCurrency>
                                            <TotalAggregateNominalValue>'.$total_share.'</TotalAggregateNominalValue>
                                            <Shares>
                                                <ShareClass>Ordinary</ShareClass>
                                                <PrescribedParticulars>Each share is entitled to one vote in any circumstances. Each share has equal rights to dividends. Each share is entitled to participate in a distribution arising from a winding up of the company</PrescribedParticulars>
                                                <NumShares>'.$total_share.'</NumShares>
                                                <AggregateNominalValue>'.$total_share.'</AggregateNominalValue>
                                            </Shares>
                                        </Capital>
                                    </StatementOfCapital>
                                    '.$subscriber.'
                                    <Authoriser>
                                        <Subscribers>
                                            '.$authoriser.'
                                        </Subscribers>
                                    </Authoriser>
                                    <SameDay>false</SameDay>
                                    <SameName>'.$sameName.'</SameName>
                                    <NameAuthorisation>'.$NameAuthorisation.'</NameAuthorisation>
                                    <SICCodes>
                                    '.$SICCode.'
                                    </SICCodes>
                                </CompanyIncorporation>
                            </Form>
                            '.$ArticleDocument.'
                            '.$SensitiveDocument.'
                            '.$SamenameDocument.'
                        </FormSubmission>
                    </Body>
                </GovTalkMessage>';

                $xml_details = companyXmlDetail::where('order_id',$id)->first();
                if($xml_details){
                    $xml_details->xml_body=$xml;
                    $xml_details->submission_no=$six_digit_random_number;
                    $xml_details->tans_no=$transaction_id;
                    $xml_details->save();

                }else{
                    $xml_data = new companyXmlDetail;
                    $xml_data->order_id = $id;
                    $xml_data->submission_no = $six_digit_random_number;
                    $xml_data->company_name = $review->companie_name;
                    $xml_data->tans_no = $transaction_id;
                    $xml_data->status = null;
                    $xml_data->comment = null;
                    $xml_data->xml_body = $xml;
                    $xml_data->authentication_code = null;
                    $xml_data->company_no = null;
                    $xml_data->approval = null;
                    $xml_data->doc_request_key = null;
                    $xml_data->pdf_content = null;
                    $xml_data->save();


                }
    }

    // XML generate for GURANTEE Model

    public function byGURModel($id) {
        ini_set('max_execution_time', 0);
        $review = $this->companyFormService->getCompanieName($id);
        $ArticleDocument='';
        $SensitiveDocument='';
        $SamenameDocument='';
        $sameName='false';
        $NameAuthorisation='false';



        $document_same_name = $review->getMedia('company-same-as-name-document')->sortByDesc('updated_at')->first();
        if ($document_same_name) {
            $sameName='true';
            $documentName = $document_same_name->file_name;
            $documentUrl = $document_same_name->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $SensitiveDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPEXISTNAME</Category>
                                </Document>';

        }
        // For Sensitive Name
        $document_sensetive = $review->getMedia('company-sensetive-document')->sortByDesc('updated_at')->first();
        if ($document_sensetive) {
            $NameAuthorisation='true';
            $documentName = $document_sensetive->file_name;
            $documentUrl = $document_sensetive->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));
            $SamenameDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPNAMEAUTH</Category>
                                </Document>';

        }



        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);
        $order_details = Order::where('order_id',$id)->first();
        $order_trans_details = orderTransaction::where('order_id',$id)->first();
        $delivery_partner_details = DeliveryPartnerDetail::where('order_id',$id)->first();
        // dd($delivery_partner_details);
        if($review->office_address){
            $registered_office_address = Address::where('id',$review->office_address)->first();
            if($registered_office_address->county=='England'){
                $country = 'GB-ENG';
            }else if($registered_office_address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                $country = 'GBR';
            }else if($registered_office_address->county=='Scotland'){
                $country = 'GB-SCT';
            }else if($registered_office_address->county=='Northern Ireland'){
                $country = 'GB-NIR';
            }else if($registered_office_address->county=='Wales'){
                $country = 'GB-WLS';
            }else{
                $country = 'UNDEF';
            }
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>'.$registered_office_address->house_number.'</Premise>
                                            <Street>'.$registered_office_address->street.'</Street>
                                            <Thoroughfare>'.$registered_office_address->locality.'</Thoroughfare>
                                            <PostTown>'.$registered_office_address->town.'</PostTown>
                                            <Country>'.$country.'</Country>
                                            <Postcode>'.$registered_office_address->post_code.'</Postcode>
                                        </RegisteredOfficeAddress>';
        }else{
            $registered_office_address = Address::where('id',$review->forwarding_registered_office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>52 Danes Court</Premise>
                                            <Street>North End Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Middlesex</PostTown>
                                            <Country>GBR</Country>
                                            <Postcode>HAQ OAE</Postcode>
                                        </RegisteredOfficeAddress>';
        }
        if($review->legal_document=="byspoke_article"){
            $articles = 'BESPOKE';
            $dataMemodrandum = 'true';
        }else{
            $articles = 'BYSHRMODEL';
            $dataMemodrandum = 'true';
        }

        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        // For Director
        $all_director = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Director', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();

                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }

                $all_director.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Director>
                                        <Person>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <Nationality>'.$nationality_name.'</Nationality>
                                            <Occupation>'.$officerDetails['occupation'].'</Occupation>
                                            <CountryOfResidence>United Kingdom</CountryOfResidence>
                                            <ResidentialAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                        </Person>
                                    </Director>
                                </Appointment>';
            }
        }

        // For Secretary
        // For Director
        $all_secretary = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Secretary', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }

                $all_secretary.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Secretary>
                                        <Person>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                </Address>
                                            </ServiceAddress>
                                        </Person>
                                    </Secretary>
                                </Appointment>';
            }
        }

        // For PSC
        $all_psc = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('PSC', $positionArray)){
                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                $noc_value='';
                if($val['noc_os']!=''){
                    if($val['noc_os']=='More than 25% but not more than 50%'){
                        $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT';
                    }else if($val['noc_os']=='More than 50% but less than 75%'){
                        $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT';
                    }else{
                        $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT';
                    }
                }else if($val['noc_vr']!=''){
                    if($val['noc_vr']=='More than 25% but not more than 50%'){
                        $noc_value='VOTINGRIGHTS_25TO50PERCENT';
                    }else if($val['noc_vr']=='More than 50% but less than 75%'){
                        $noc_value='VOTINGRIGHTS_50TO75PERCENT';
                    }else{
                        $noc_value='VOTINGRIGHTS_75TO100PERCENT';
                    }

                }else if($val['noc_appoint']=='Yes'){
                    $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS';

                }
                else if($val['fci']=='yes'){
                    if($val['fci_os']!=''){
                        if($val['fci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_vr']!=''){
                        if($val['fci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_TRUST';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_TRUST';

                    }
                }else if($val['tci']=='yes'){
                    if($val['tci_os']!=''){
                        if($val['tci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_vr']!=''){
                        if($val['tci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_FIRM';

                    }
                }

                // dd($address);
                $all_psc.=' <PSC>
                                    <PSCNotification>
                                        <Individual>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <Nationality>'.$nationality_name.'</Nationality>
                                            <CountryOfResidence>'.$country_resident.'</CountryOfResidence>
                                            <ResidentialAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                            <ConsentStatement>true</ConsentStatement>
                                        </Individual>
                                        <NatureOfControls>
                                            <NatureOfControl>'.$noc_value.'</NatureOfControl>
                                        </NatureOfControls>
                                    </PSCNotification>
                                </PSC>';
            }
        }

        // For Gurantor
        $all_gurantor = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Guarantor', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }


                $all_gurantor.='<Guarantors>
                            <Person>
                                <Forename>'.$officerDetails['first_name'].'</Forename>
                                <Surname>'.$officerDetails['last_name'].'</Surname>
                            </Person>
                            <Address>
                                <Premise>'.$address->house_number.'</Premise>
                                <Street>'.$address->street.'</Street>
                                <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                <PostTown>'.$address->town.'</PostTown>
                                <Country>'.$country.'</Country>
                                <Postcode>'.$address->post_code.'</Postcode>
                            </Address>
                            <Authentication>
                            <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                            <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                            </Authentication>
                            <AmountGuaranteed>'.$val['amount_guarantee'].'</AmountGuaranteed>
                            <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company.</MemorandumStatement>
                      </Guarantors>';
            }
        }
        // For Subscriber
        $total_share=null;
        $total_share_price=null;
        $total_share_currency='';

        $subscriber = '';
        $authoriser = '';

        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){
                $total_share+= $val['sh_quantity'];
                $total_share_price=$val['sh_pps'];
                $total_share_currency=$val['sh_currency'];

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }

                // dd($address);
                $subscriber.='<Subscribers>
                                <Person>
                                    <Forename>'.$officerDetails['first_name'].'</Forename>
                                    <Surname>'.$officerDetails['last_name'].'</Surname>
                                </Person>
                                <Address>
                                    <Premise>'.$address->house_number.'</Premise>
                                    <Street>'.$address->street.'</Street>
                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                    <PostTown>'.$address->town.'</PostTown>
                                    <Country>'.$country.'</Country>
                                    <Postcode>'.$address->post_code.'</Postcode>
                                </Address>
                                <Authentication>
                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                </Authentication>
                                <Shares>
                                    <ShareClass>Ordinary</ShareClass>
                                    <NumShares>'.$val['sh_quantity'].'</NumShares>
                                    <AmountPaidDuePerShare>1</AmountPaidDuePerShare>
                                    <AmountUnpaidPerShare>0</AmountUnpaidPerShare>
                                    <ShareCurrency>'.$val['sh_currency'].'</ShareCurrency>
                                    <ShareValue>'.$val['sh_pps'].'</ShareValue>
                                </Shares>
                                <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company and to take at least one share.</MemorandumStatement>
                            </Subscribers>';


            }
        }


        // dd($total_share);
        // For Sic Codes
        $SICCode= '';

        foreach($review->sicCodes as  $index=>$SCode){

            $SICCode .='<SICCode>'.$SCode->code.'</SICCode>';

        }


        $xml ='<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope" xmlns:dsig="http://www.w3.org/2000/09/xmldsig#" xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
             <EnvelopeVersion/>
                    <Header>
                        <MessageDetails>
                            <Class>CompanyIncorporation</Class>
                            <Qualifier>request</Qualifier>
                            <TransactionID>'.$transaction_id.'</TransactionID>
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
                        <FormSubmission xmlns="http://xmlgw.companieshouse.gov.uk/Header" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
                            <FormHeader>
                                <CompanyName>'.$review->companie_name.'</CompanyName>
                                <PackageReference>4076</PackageReference>
                                <FormIdentifier>CompanyIncorporation</FormIdentifier>
                                <SubmissionNumber>'.$six_digit_random_number.'</SubmissionNumber>
                                <ContactName>'.$delivery_partner_details->recipient_name.'</ContactName>
                                <ContactNumber>'.$delivery_partner_details->recipient_email.'</ContactNumber>
                            </FormHeader>
                            <DateSigned>'.date('Y-m-d').'</DateSigned>
                            <Form>
                                <CompanyIncorporation xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd" xmlns="http://xmlgw.companieshouse.gov.uk">
                                    <CompanyType>BYGUAR</CompanyType>
                                    <CountryOfIncorporation>'.$review->jurisdiction->value.'</CountryOfIncorporation>
                                    '.$office_register_address.'
                                    <DataMemorandum>true</DataMemorandum>
                                    <Articles>BYGUARMODEL</Articles>
                                    <RestrictedArticles>false</RestrictedArticles>
                                    '.$all_director.'
                                    '.$all_secretary.'
                                    <PSCs>
                                    '.$all_psc.'
                                    </PSCs>
                                    '.$all_gurantor.'
                                    <Authoriser>
                                        <Agent>
                                            <Person>
                                                <Forename>FormationsHunt</Forename>
                                                <Surname>LTD</Surname>
                                            </Person>
                                            <Authentication>
                                                <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                                <PersonalData>Car</PersonalData>
                                            </Authentication>
                                            <Authentication>
                                                <PersonalAttribute>TEL</PersonalAttribute>
                                                <PersonalData>012</PersonalData>
                                            </Authentication>
                                            <Authentication>
                                                <PersonalAttribute>PASSNO</PersonalAttribute>
                                                <PersonalData>321</PersonalData>
                                            </Authentication>
                                            <Address>
                                                <Premise>7</Premise>
                                                <Street>Thurlow Gardens</Street>
                                                <PostTown>Wembley</PostTown>
                                                <Country>GBR</Country>
                                                <Postcode>HA0 2AH</Postcode>
                                            </Address>
                                        </Agent>
			                        </Authoriser>
                                    <SameDay>false</SameDay>
                                    <SameName>'.$sameName.'</SameName>
                                    <NameAuthorisation>'.$NameAuthorisation.'</NameAuthorisation>
                                    <SICCodes>
                                    '.$SICCode.'
                                    </SICCodes>
                                </CompanyIncorporation>
                            </Form>
                            '.$SensitiveDocument.'
                            '.$SamenameDocument.'
                        </FormSubmission>
                    </Body>
                </GovTalkMessage>';


                $xml_details = companyXmlDetail::where('order_id',$id)->first();
                if($xml_details){
                    $xml_details->xml_body=$xml;
                    $xml_details->submission_no=$six_digit_random_number;
                    $xml_details->tans_no=$transaction_id;
                    $xml_details->save();

                }else{
                    $xml_data = new companyXmlDetail;
                    $xml_data->order_id = $id;
                    $xml_data->submission_no = $six_digit_random_number;
                    $xml_data->company_name = $review->companie_name;
                    $xml_data->tans_no = $transaction_id;
                    $xml_data->status = null;
                    $xml_data->comment = null;
                    $xml_data->xml_body = $xml;
                    $xml_data->authentication_code = null;
                    $xml_data->company_no = null;
                    $xml_data->approval = null;
                    $xml_data->doc_request_key = null;
                    $xml_data->pdf_content = null;
                    $xml_data->save();


                }
    }

    // XML generate for PLC model

    public function byPLCModel($id){

        ini_set('max_execution_time', 0);
        $review = $this->companyFormService->getCompanieName($id);


        $ArticleDocument='';
        $SensitiveDocument='';
        $SamenameDocument='';
        $sameName='false';
        $NameAuthorisation='false';


        //For Articles of Association
        $document = $review->getMedia('documents')->sortByDesc('updated_at')->first();

        if ($document) {

            $documentName = $document->file_name;
            $documentUrl = $document->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $ArticleDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>ARTS</Category>
                                </Document>';

        }
        // For Same Name

        $document_same_name = $review->getMedia('company-same-as-name-document')->sortByDesc('updated_at')->first();
        if ($document_same_name) {
            $sameName='true';
            $documentName = $document_same_name->file_name;
            $documentUrl = $document_same_name->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $SensitiveDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPEXISTNAME</Category>
                                </Document>';

        }
        // For Sensitive Name
        $document_sensetive = $review->getMedia('company-sensetive-document')->sortByDesc('updated_at')->first();
        if ($document_sensetive) {
            $NameAuthorisation='true';
            $documentName = $document_sensetive->file_name;
            $documentUrl = $document_sensetive->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));
            $SamenameDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPNAMEAUTH</Category>
                                </Document>';

        }



        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);
        $order_details = Order::where('order_id',$id)->first();
        $order_trans_details = orderTransaction::where('order_id',$id)->first();
        $delivery_partner_details = DeliveryPartnerDetail::where('order_id',$id)->first();
        // dd($delivery_partner_details);
        if($review->office_address){
            $registered_office_address = Address::where('id',$review->office_address)->first();
            if($registered_office_address->county=='England'){
                $country = 'GB-ENG';
            }else if($registered_office_address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                $country = 'GBR';
            }else if($registered_office_address->county=='Scotland'){
                $country = 'GB-SCT';
            }else if($registered_office_address->county=='Northern Ireland'){
                $country = 'GB-NIR';
            }else if($registered_office_address->county=='Wales'){
                $country = 'GB-WLS';
            }else{
                $country = 'UNDEF';
            }
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>'.$registered_office_address->house_number.'</Premise>
                                            <Street>'.$registered_office_address->street.'</Street>
                                            <Thoroughfare>'.$registered_office_address->locality.'</Thoroughfare>
                                            <PostTown>'.$registered_office_address->town.'</PostTown>
                                            <Country>'.$country.'</Country>
                                            <Postcode>'.$registered_office_address->post_code.'</Postcode>
                                        </RegisteredOfficeAddress>';
        }else{
            $registered_office_address = Address::where('id',$review->forwarding_registered_office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>52 Danes Court</Premise>
                                            <Street>North End Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Middlesex</PostTown>
                                            <Country>GBR</Country>
                                            <Postcode>HAQ OAE</Postcode>
                                        </RegisteredOfficeAddress>';
        }
        if($review->legal_document=="byspoke_article"){
            $articles = 'BESPOKE';
            $dataMemodrandum = 'true';
        }else{
            $articles = 'BYSHRMODEL';
            $dataMemodrandum = 'true';
        }

        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        // For Director
        $all_director = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Director', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();

                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }

                $all_director.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Director>
                                        <Person>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <Nationality>'.$nationality_name.'</Nationality>
                                            <Occupation>'.$officerDetails['occupation'].'</Occupation>
                                            <CountryOfResidence>United Kingdom</CountryOfResidence>
                                            <ResidentialAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                        </Person>
                                    </Director>
                                </Appointment>';
            }
        }

        // For Secretary
        // For Director
        $all_secretary = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Secretary', $positionArray)){

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }

                $all_secretary.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Secretary>
                                        <Person>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                </Address>
                                            </ServiceAddress>
                                        </Person>
                                    </Secretary>
                                </Appointment>';
            }
        }

        // For PSC
        $all_psc = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('PSC', $positionArray)){
                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                $noc_value='';
                if($val['noc_os']!=''){
                    if($val['noc_os']=='More than 25% but not more than 50%'){
                        $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT';
                    }else if($val['noc_os']=='More than 50% but less than 75%'){
                        $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT';
                    }else{
                        $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT';
                    }
                }else if($val['noc_vr']!=''){
                    if($val['noc_vr']=='More than 25% but not more than 50%'){
                        $noc_value='VOTINGRIGHTS_25TO50PERCENT';
                    }else if($val['noc_vr']=='More than 50% but less than 75%'){
                        $noc_value='VOTINGRIGHTS_50TO75PERCENT';
                    }else{
                        $noc_value='VOTINGRIGHTS_75TO100PERCENT';
                    }

                }else if($val['noc_appoint']=='Yes'){
                    $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS';

                }
                else if($val['fci']=='yes'){
                    if($val['fci_os']!=''){
                        if($val['fci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_vr']!=''){
                        if($val['fci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_TRUST';
                        }else if($val['fci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_TRUST';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_TRUST';
                        }
                    }else if($val['fci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_TRUST';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_TRUST';

                    }
                }else if($val['tci']=='yes'){
                    if($val['tci_os']!=''){
                        if($val['tci_os']=='More than 25% but not more than 50%'){
                            $noc_value='OWNERSHIPOFSHARES_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_os']=='More than 50% but less than 75%'){
                            $noc_value='OWNERSHIPOFSHARES_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='OWNERSHIPOFSHARES_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_vr']!=''){
                        if($val['tci_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_FIRM';
                        }else if($val['tci_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_FIRM';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_FIRM';
                        }
                    }else if($val['tci_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM';

                    }else{
                        $noc_value='SIGINFLUENCECONTROL_AS_FIRM';

                    }
                }
                // dd($address);
                $all_psc.=' <PSC>
                                    <PSCNotification>
                                        <Individual>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <SameAsRegisteredOffice>'.$same_add.'</SameAsRegisteredOffice>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <Nationality>'.$nationality_name.'</Nationality>
                                            <CountryOfResidence>'.$country_resident.'</CountryOfResidence>
                                            <ResidentialAddress>
                                                <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                            <ConsentStatement>true</ConsentStatement>
                                        </Individual>
                                        <NatureOfControls>
                                            <NatureOfControl>'.$noc_value.'</NatureOfControl>
                                        </NatureOfControls>
                                    </PSCNotification>
                                </PSC>';
            }
        }

        // For Subscriber
        $total_share=null;
        $total_share_price=null;
        $total_share_currency='';

        $subscriber = '';
        $authoriser = '';

        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Shareholder', $positionArray)){
                $total_share+= $val['sh_quantity'];
                $total_share_price=$val['sh_pps'];
                $total_share_currency=$val['sh_currency'];

                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'true';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                if($address->county=='England'){
                    $country = 'GB-ENG';
                }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                    $country = 'GBR';
                }else if($address->county=='Scotland'){
                    $country = 'GB-SCT';
                }else if($address->county=='Northern Ireland'){
                    $country = 'GB-NIR';
                }else if($address->county=='Wales'){
                    $country = 'GB-WLS';
                }else{
                    $country = 'UNDEF';
                }
                // Question Three
                $question_three='';
                $question_two='';
                $question_one='';

                if($officerDetails['authenticate_three']=="Mother’s Maiden Name"){
                    $question_three='MUM';

                }else if($officerDetails['authenticate_three']=="Father's Forename"){
                    $question_three='DAD';

                }else if($officerDetails['authenticate_three']=='Town Of Birth'){
                    $question_three='BIRTOWN';

                }else if($officerDetails['authenticate_three']=='Telephone Number'){
                    $question_three='TEL';

                }else if($officerDetails['authenticate_three']=='National insurance'){
                    $question_three='NATINS';

                }else if($officerDetails['authenticate_three']=='Passport Number'){
                    $question_three='PASSNO';
                }
                if($officerDetails['authenticate_two']=="Mother’s Maiden Name"){
                    $question_two='MUM';
                }else if($officerDetails['authenticate_two']=="Father's Forename"){
                    $question_two='DAD';

                }else if($officerDetails['authenticate_two']=='Town Of Birth'){
                    $question_two='BIRTOWN';

                }else if($officerDetails['authenticate_two']=='Telephone Number'){
                    $question_two='TEL';

                }else if($officerDetails['authenticate_two']=='National insurance'){
                    $question_two='NATINS';

                }else if($officerDetails['authenticate_two']=='Passport Number'){
                    $question_two='PASSNO';
                }
                if($officerDetails['authenticate_one']=="Mother’s Maiden Name"){
                    $question_one='MUM';
                }else if($officerDetails['authenticate_one']=="Father's Forename"){
                    $question_one='DAD';

                }else if($officerDetails['authenticate_one']=='Town Of Birth'){
                    $question_one='BIRTOWN';

                }else if($officerDetails['authenticate_one']=='Telephone Number'){
                    $question_one='TEL';

                }else if($officerDetails['authenticate_one']=='National insurance'){
                    $question_one='NATINS';

                }else if($officerDetails['authenticate_one']=='Passport Number'){
                    $question_one='PASSNO';
                }

                // dd($address);
                $subscriber.='<Subscribers>
                                <Person>
                                    <Forename>'.$officerDetails['first_name'].'</Forename>
                                    <Surname>'.$officerDetails['last_name'].'</Surname>
                                </Person>
                                <Address>
                                    <Premise>'.$address->house_number.'</Premise>
                                    <Street>'.$address->street.'</Street>
                                    <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                    <PostTown>'.$address->town.'</PostTown>
                                    <Country>'.$country.'</Country>
                                    <Postcode>'.$address->post_code.'</Postcode>
                                </Address>
                                <Authentication>
                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                </Authentication>
                                <Authentication>
                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                </Authentication>
                                <Shares>
                                    <ShareClass>Ordinary</ShareClass>
                                    <NumShares>'.$val['sh_quantity'].'</NumShares>
                                    <AmountPaidDuePerShare>1</AmountPaidDuePerShare>
                                    <AmountUnpaidPerShare>0</AmountUnpaidPerShare>
                                    <ShareCurrency>'.$val['sh_currency'].'</ShareCurrency>
                                    <ShareValue>'.$val['sh_pps'].'</ShareValue>
                                </Shares>
                                <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company and to take at least one share.</MemorandumStatement>
                            </Subscribers>';

                        $authoriser.='

                                        <Subscriber>
                                                <Person>
                                                    <Forename>'.$officerDetails['first_name'].'</Forename>
                                                    <Surname>'.$officerDetails['last_name'].'</Surname>
                                                </Person>

                                                <Authentication>
                                                    <PersonalAttribute>'.$question_three.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_three_ans'].'</PersonalData>
                                                </Authentication>
                                                <Authentication>
                                                    <PersonalAttribute>'.$question_two.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_two_ans'].'</PersonalData>
                                                </Authentication>
                                                <Authentication>
                                                    <PersonalAttribute>'.$question_one.'</PersonalAttribute>
                                                    <PersonalData>'.$officerDetails['authenticate_one_ans'].'</PersonalData>
                                                </Authentication>
                                        </Subscriber>';
            }
        }
        // dd($total_share);
        // For Sic Codes
        $SICCode= '';

        foreach($review->sicCodes as  $index=>$SCode){

            $SICCode .='<SICCode>'.$SCode->code.'</SICCode>';

        }


        $xml ='<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope" xmlns:dsig="http://www.w3.org/2000/09/xmldsig#" xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
             <EnvelopeVersion />
                    <Header>
                        <MessageDetails>
                            <Class>CompanyIncorporation</Class>
                            <Qualifier>request</Qualifier>
                            <TransactionID>'.$transaction_id.'</TransactionID>
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
                        <FormSubmission xmlns="http://xmlgw.companieshouse.gov.uk/Header" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
                            <FormHeader>
                                <CompanyName>'.$review->companie_name.'</CompanyName>
                                <PackageReference>4076</PackageReference>
                                <FormIdentifier>CompanyIncorporation</FormIdentifier>
                                <SubmissionNumber>'.$six_digit_random_number.'</SubmissionNumber>
                                <ContactName>'.$delivery_partner_details->recipient_name.'</ContactName>
                                <ContactNumber>'.$delivery_partner_details->recipient_email.'</ContactNumber>
                            </FormHeader>
                            <DateSigned>'.date('Y-m-d').'</DateSigned>
                            <Form>
                                <CompanyIncorporation xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd" xmlns="http://xmlgw.companieshouse.gov.uk">
                                    <CompanyType>PLC</CompanyType>
                                    <CountryOfIncorporation>'.$review->jurisdiction->value.'</CountryOfIncorporation>
                                    '.$office_register_address.'
                                    <DataMemorandum>'.$dataMemodrandum.'</DataMemorandum>
                                    <Articles>PLCMODEL</Articles>
                                    <RestrictedArticles>false</RestrictedArticles>
                                    '.$all_director.'
                                    '.$all_secretary.'
                                    <PSCs>
                                    '.$all_psc.'
                                    </PSCs>
                                    <StatementOfCapital>
                                        <Capital>
                                            <TotalAmountUnpaid>0</TotalAmountUnpaid>
                                            <TotalNumberOfIssuedShares>'.$total_share.'</TotalNumberOfIssuedShares>
                                            <ShareCurrency>'.$total_share_currency.'</ShareCurrency>
                                            <TotalAggregateNominalValue>'.$total_share.'</TotalAggregateNominalValue>
                                            <Shares>
                                                <ShareClass>Ordinary</ShareClass>
                                                <PrescribedParticulars>Each share is entitled to one vote in any circumstances. Each share has equal rights to dividends. Each share is entitled to participate in a distribution arising from a winding up of the company</PrescribedParticulars>
                                                <NumShares>'.$total_share.'</NumShares>
                                                <AggregateNominalValue>'.$total_share.'</AggregateNominalValue>
                                            </Shares>
                                        </Capital>
                                    </StatementOfCapital>
                                    '.$subscriber.'
                                    <Authoriser>
                                        <Subscribers>
                                            '.$authoriser.'
                                        </Subscribers>
                                    </Authoriser>
                                    <SameDay>false</SameDay>
                                    <SameName>'.$sameName.'</SameName>
                                    <NameAuthorisation>'.$NameAuthorisation.'</NameAuthorisation>
                                    <SICCodes>
                                    '.$SICCode.'
                                    </SICCodes>
                                </CompanyIncorporation>
                            </Form>
                            '.$ArticleDocument.'
                            '.$SensitiveDocument.'
                            '.$SamenameDocument.'
                        </FormSubmission>
                    </Body>
                </GovTalkMessage>';

                $xml_details = companyXmlDetail::where('order_id',$id)->first();
                if($xml_details){
                    $xml_details->xml_body=$xml;
                    $xml_details->submission_no=$six_digit_random_number;
                    $xml_details->tans_no=$transaction_id;
                    $xml_details->save();

                }else{
                    $xml_data = new companyXmlDetail;
                    $xml_data->order_id = $id;
                    $xml_data->submission_no = $six_digit_random_number;
                    $xml_data->company_name = $review->companie_name;
                    $xml_data->tans_no = $transaction_id;
                    $xml_data->status = null;
                    $xml_data->comment = null;
                    $xml_data->xml_body = $xml;
                    $xml_data->authentication_code = null;
                    $xml_data->company_no = null;
                    $xml_data->approval = null;
                    $xml_data->doc_request_key = null;
                    $xml_data->pdf_content = null;
                    $xml_data->save();


                }
    }

    public function byLLPModel($id){
        ini_set('max_execution_time', 0);
        $review = $this->companyFormService->getCompanieName($id);



        $ArticleDocument='';
        $SensitiveDocument='';
        $SamenameDocument='';
        $sameName='false';
        $NameAuthorisation='false';


        //For Articles of Association
        $document = $review->getMedia('documents')->sortByDesc('updated_at')->first();

        if ($document) {

            $documentName = $document->file_name;
            $documentUrl = $document->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $ArticleDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>ARTS</Category>
                                </Document>';

        }
        // For Same Name

        $document_same_name = $review->getMedia('company-same-as-name-document')->sortByDesc('updated_at')->first();
        if ($document_same_name) {
            $sameName='true';
            $documentName = $document_same_name->file_name;
            $documentUrl = $document_same_name->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));

            $SensitiveDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPEXISTNAME</Category>
                                </Document>';

        }
        // For Sensitive Name
        $document_sensetive = $review->getMedia('company-sensetive-document')->sortByDesc('updated_at')->first();
        if ($document_sensetive) {
            $NameAuthorisation='true';
            $documentName = $document_sensetive->file_name;
            $documentUrl = $document_sensetive->getPath();
            $base64EncodedPDF = chunk_split(base64_encode(file_get_contents($documentUrl)));
            $SamenameDocument = '<Document>
                                <Data >'.$base64EncodedPDF.'</Data>
                                <Date>'.date("Y-m-d").'</Date>
                                <Filename>'.basename($documentName).'</Filename>
                                <ContentType>application/pdf</ContentType>
                                <Category>SUPPNAMEAUTH</Category>
                                </Document>';

        }



        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);
        $order_details = Order::where('order_id',$id)->first();
        $order_trans_details = orderTransaction::where('order_id',$id)->first();
        $delivery_partner_details = DeliveryPartnerDetail::where('order_id',$id)->first();
        // dd($delivery_partner_details);
        if($review->office_address){
            $registered_office_address = Address::where('id',$review->office_address)->first();
            if($registered_office_address->county=='England'){
                $country = 'GB-ENG';
            }else if($registered_office_address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                $country = 'GBR';
            }else if($registered_office_address->county=='Scotland'){
                $country = 'GB-SCT';
            }else if($registered_office_address->county=='Northern Ireland'){
                $country = 'GB-NIR';
            }else if($registered_office_address->county=='Wales'){
                $country = 'GB-WLS';
            }else{
                $country = 'UNDEF';
            }
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>'.$registered_office_address->house_number.'</Premise>
                                            <Street>'.$registered_office_address->street.'</Street>
                                            <Thoroughfare>'.$registered_office_address->locality.'</Thoroughfare>
                                            <PostTown>'.$registered_office_address->town.'</PostTown>
                                            <Country>'.$country.'</Country>
                                            <Postcode>'.$registered_office_address->post_code.'</Postcode>
                                        </RegisteredOfficeAddress>';
        }else{
            $registered_office_address = Address::where('id',$review->forwarding_registered_office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>52 Danes Court</Premise>
                                            <Street>North End Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Middlesex</PostTown>
                                            <Country>GBR</Country>
                                            <Postcode>HAQ OAE</Postcode>
                                        </RegisteredOfficeAddress>';
        }
        if($review->legal_document=="byspoke_article"){
            $articles = 'BESPOKE';
            $dataMemodrandum = 'true';
        }else{
            $articles = 'BYSHRMODEL';
            $dataMemodrandum = 'true';
        }
        // dd($office_register_address);
        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }

        // For Director
        $all_member = '';
        foreach ($appointmentsList as $val){
            // Corporate

            if($val['appointment_type']=='corporate'){
                $positionArray = explode(', ', $val['position']);

                $isDesignatedMember = false;

                if(in_array('Designated Member', $positionArray)){
                    $isDesignatedMember = true;
                }

                if(in_array('Designated Member', $positionArray) && in_array('Member', $positionArray) == true){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }
                    if($officerDetails['uk_registered']=='Yes'){
                        $compantIdnty = '
                                            <UK>
                                                <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                            </UK>';
                    }else{
                        $compantIdnty = '
                                            <NonUK>
                                                <PlaceRegistered>'.$officerDetails['place_registered'].'</PlaceRegistered>
                                                <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                                <LawGoverned>'.$officerDetails['law_governed'].'</LawGoverned>
                                                <LegalForm>'.$officerDetails['legal_form'].'</LegalForm>
                                            </NonUK>';
                    }

                    $all_member.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Member>
                                        <DesignatedInd>true</DesignatedInd>
                                        <Corporate>
                                            <CorporateName>'.$officerDetails['legal_name'].'</CorporateName>
                                            <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            <CompanyIdentification>
                                            '.$compantIdnty.'
                                            </CompanyIdentification>
                                        </Corporate>
                                    </Member>
                                </Appointment>';
                }


                if(in_array('Member', $positionArray) && in_array('Designated Member', $positionArray) == false){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }

                    if($officerDetails['uk_registered']=='Yes'){
                        $compantIdnty = '
                                            <UK>
                                                <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                            </UK>';
                    }else{
                        $compantIdnty = '
                                            <NonUK>
                                                <PlaceRegistered>'.$officerDetails['place_registered'].'</PlaceRegistered>
                                                <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                                <LawGoverned>'.$officerDetails['law_governed'].'</LawGoverned>
                                                <LegalForm>'.$officerDetails['legal_form'].'</LegalForm>
                                            </NonUK>';
                    }



                    $all_member.='<Appointment>
                                        <ConsentToAct>true</ConsentToAct>
                                        <Member>
                                        <DesignatedInd>false</DesignatedInd>
                                        <Corporate>
                                            <CorporateName>'.$officerDetails['legal_name'].'</CorporateName>
                                            <Address>
                                                    <Premise>'.$address->house_number.'</Premise>
                                                    <Street>'.$address->street.'</Street>
                                                    <PostTown>'.$address->town.'</PostTown>
                                                    <Country>'.$country.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            <CompanyIdentification>
                                            '.$compantIdnty.'
                                            </CompanyIdentification>
                                        </Corporate>
                                        </Member>
                                    </Appointment>';
                }

            }else{
                // Person
                $positionArray = explode(', ', $val['position']);

                $isDesignatedMember = false;

                if(in_array('Designated Member', $positionArray)){
                    $isDesignatedMember = true;
                }

                if(in_array('Designated Member', $positionArray) && in_array('Member', $positionArray) == true){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }

                    if($val['own_address_id']!=null){

                        $service_add= Address::where('id',$val['own_address_id'])->first();
                    }else{
                        $service_add= Address::where('id',$val['forwarding_address_id'])->first();

                    }

                    if($service_add->county=='England'){
                        $service_country = 'GB-ENG';
                    }else if($service_add->county=='United Kingdom' || $service_add->county=='Greater London'){
                        $service_country = 'GBR';
                    }else if($service_add->county=='Scotland'){
                        $service_country = 'GB-SCT';
                    }else if($service_add->county=='Northern Ireland'){
                        $service_country = 'GB-NIR';
                    }else if($service_add->county=='Wales'){
                        $service_country = 'GB-WLS';
                    }else{
                        $service_country = 'UNDEF';
                    }

                    $all_member.='<Appointment>
                                    <ConsentToAct>true</ConsentToAct>
                                    <Member>
                                        <DesignatedInd>true</DesignatedInd>
                                        <Person>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <Address>
                                                    <Premise>'.$service_add->house_number.'</Premise>
                                                    <Street>'.$service_add->street.'</Street>
                                                    <Thoroughfare>'.$service_add->locality.'</Thoroughfare>
                                                    <PostTown>'.$service_add->town.'</PostTown>
                                                    <Country>'.$service_country.'</Country>
                                                    <Postcode>'.$service_add->post_code.'</Postcode>
                                                </Address>
                                            </ServiceAddress>
                                            <DOB>'.$officerDetails['dob_day'].'</DOB>
                                            <CountryOfResidence>'.$country_resident.'</CountryOfResidence>
                                            <ResidentialAddress>
                                            <Address>
                                                <Premise>'.$address->house_number.'</Premise>
                                                <Street>'.$address->street.'</Street>
                                                <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                <PostTown>'.$address->town.'</PostTown>
                                                <Country>'.$country.'</Country>
                                                <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            </ResidentialAddress>
                                        </Person>
                                    </Member>
                                </Appointment>';
                }


                if(in_array('Member', $positionArray) && in_array('Designated Member', $positionArray) == false){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $registered_office_address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }

                    if($val['own_address_id']!=null){

                        $service_add= Address::where('id',$val['own_address_id'])->first();
                    }else{
                        $service_add= Address::where('id',$val['forwarding_address_id '])->first();

                    }
                    if($service_add->county=='England'){
                        $service_country = 'GB-ENG';
                    }else if($service_add->county=='United Kingdom' || $service_add->county=='Greater London'){
                        $service_country = 'GBR';
                    }else if($service_add->county=='Scotland'){
                        $service_country = 'GB-SCT';
                    }else if($service_add->county=='Northern Ireland'){
                        $service_country = 'GB-NIR';
                    }else if($service_add->county=='Wales'){
                        $service_country = 'GB-WLS';
                    }else{
                        $service_country = 'UNDEF';
                    }

                    $all_member.='<Appointment>
                                        <ConsentToAct>true</ConsentToAct>
                                        <Member>
                                        <DesignatedInd>false</DesignatedInd>
                                        <Person>
                                            <Title>'.$officerDetails['title'].'</Title>
                                            <Forename>'.$officerDetails['first_name'].'</Forename>
                                            <Surname>'.$officerDetails['last_name'].'</Surname>
                                            <ServiceAddress>
                                                <Address>
                                                    <Premise>'.$service_add->house_number.'</Premise>
                                                    <Street>'.$service_add->street.'</Street>
                                                    <Thoroughfare>'.$service_add->locality.'</Thoroughfare>
                                                    <PostTown>'.$service_add->town.'</PostTown>
                                                    <Country>'.$service_country.'</Country>
                                                    <Postcode>'.$service_add->post_code.'</Postcode>
                                                </Address>
                                            </ServiceAddress>
                                            <DOB>1990-12-13</DOB>
                                            <CountryOfResidence>UNITED KINGDOM</CountryOfResidence>
                                            <ResidentialAddress>
                                            <Address>
                                                <Premise>'.$address->house_number.'</Premise>
                                                <Street>'.$address->street.'</Street>
                                                <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                <PostTown>'.$address->town.'</PostTown>
                                                <Country>'.$country.'</Country>
                                                <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            </ResidentialAddress>
                                        </Person>
                                        </Member>
                                    </Appointment>';
                }



            }

        }


        // For PSC
        $all_psc = '';
        foreach ($appointmentsList as $val){
            if($val['appointment_type']=='corporate'){
                $positionArray = explode(', ', $val['position']);
                if(in_array('PSC', $positionArray)){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }
                    $noc_value='';

                    if($val['noc_os']!=''){
                        if($val['noc_os']=='More than 25% but not more than 50%'){
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT';
                        }else if($val['noc_os']=='More than 50% but less than 75%'){
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT';
                        }else{
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT';
                        }
                    }else if($val['noc_vr']!=''){
                        if($val['noc_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT';
                        }else if($val['noc_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT';
                        }

                    }else if($val['noc_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEMEMBERS';

                    }
                    else if($val['fci']=='yes'){
                        if($val['fci_os']!=''){
                            if($val['fci_os']=='More than 25% but not more than 50%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT_AS_TRUST';
                            }else if($val['fci_os']=='More than 50% but less than 75%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT_AS_TRUST';
                            }else{
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT_AS_TRUST';
                            }
                        }else if($val['fci_vr']!=''){
                            if($val['fci_vr']=='More than 25% but not more than 50%'){
                                $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_TRUST';
                            }else if($val['fci_vr']=='More than 50% but less than 75%'){
                                $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_TRUST';
                            }else{
                                $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_TRUST';
                            }
                        }else if($val['fci_appoint']=='Yes'){
                            $noc_value='RIGHTTOAPPOINTANDREMOVEMEMBERS_AS_TRUST';

                        }else{
                            $noc_value='SIGINFLUENCECONTROL_AS_TRUST';

                        }
                    }else if($val['tci']=='yes'){
                        if($val['tci_os']!=''){
                            if($val['tci_os']=='More than 25% but not more than 50%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT_AS_FIRM';
                            }else if($val['tci_os']=='More than 50% but less than 75%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT_AS_FIRM';
                            }else{
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT_AS_FIRM';
                            }
                        }else if($val['tci_vr']!=''){
                            if($val['tci_vr']=='More than 25% but not more than 50%'){
                                $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_FIRM';
                            }else if($val['tci_vr']=='More than 50% but less than 75%'){
                                $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_FIRM';
                            }else{
                                $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_FIRM';
                            }
                        }else if($val['tci_appoint']=='Yes'){
                            $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM';

                        }else{
                            $noc_value='SIGINFLUENCECONTROL_AS_FIRM';

                        }
                    }


                    $all_psc.='<PSC>
                                    <PSCNotification>
                                        <Corporate>
                                            <CorporateName>'.$officerDetails['legal_name'].'</CorporateName>
                                            <Address>
                                                <Premise>'.$address->house_number.'</Premise>
                                                <Street>'.$address->street.'</Street>
                                                <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                <PostTown>'.$address->town.'</PostTown>
                                                <Country>'.$country.'</Country>
                                                <Postcode>'.$address->post_code.'</Postcode>
                                            </Address>
                                            <PSCCompanyIdentification>
                                                <PlaceRegistered>'.$officerDetails['place_registered'].'</PlaceRegistered>
                                                <RegistrationNumber>'.$officerDetails['registration_number'].'</RegistrationNumber>
                                                <LawGoverned>'.$officerDetails['law_governed'].'</LawGoverned>
                                                <LegalForm>'.$officerDetails['legal_form'].'</LegalForm>
                                            </PSCCompanyIdentification>
                                        </Corporate>
                                        <LLPNatureOfControls>
                                            <NatureOfControl>'.$noc_value.'</NatureOfControl>
                                        </LLPNatureOfControls>
                                    </PSCNotification>
                                </PSC>';
                }
            }else{
                $positionArray = explode(', ', $val['position']);
                if(in_array('PSC', $positionArray)){
                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                    // dd($officerDetails);
                    if($registered_office_address->id==$officerDetails['add_id']){
                        $same_add = 'true';
                    }else{
                        $same_add = 'true';
                    }
                    $nationality = $officerDetails['nationality'];

                    $nationality_name = Nationality::where('id',$nationality)->pluck('nationality')->first();
                    $country_resident = Nationality::where('id',$nationality)->pluck('name')->first();
                    $address= Address::where('id',$officerDetails['add_id'])->first();
                    if($address->county=='England'){
                        $country = 'GB-ENG';
                    }else if($address->county=='United Kingdom' || $address->county=='Greater London'){
                        $country = 'GBR';
                    }else if($address->county=='Scotland'){
                        $country = 'GB-SCT';
                    }else if($address->county=='Northern Ireland'){
                        $country = 'GB-NIR';
                    }else if($address->county=='Wales'){
                        $country = 'GB-WLS';
                    }else{
                        $country = 'UNDEF';
                    }

                    if($val['own_address_id']!=null){

                        $service_add= Address::where('id',$val['own_address_id'])->first();
                    }else{
                        $service_add= Address::where('id',$val['forwarding_address_id'])->first();

                    }

                    if($service_add->county=='England'){
                        $service_country = 'GB-ENG';
                    }else if($service_add->county=='United Kingdom' || $service_add->county=='Greater London'){
                        $service_country = 'GBR';
                    }else if($service_add->county=='Scotland'){
                        $service_country = 'GB-SCT';
                    }else if($service_add->county=='Northern Ireland'){
                        $service_country = 'GB-NIR';
                    }else if($service_add->county=='Wales'){
                        $service_country = 'GB-WLS';
                    }else{
                        $service_country = 'UNDEF';
                    }

                    $noc_value='';

                    if($val['noc_os']!=''){
                        if($val['noc_os']=='More than 25% but not more than 50%'){
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT';
                        }else if($val['noc_os']=='More than 50% but less than 75%'){
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT';
                        }else{
                            $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT';
                        }
                    }else if($val['noc_vr']!=''){
                        if($val['noc_vr']=='More than 25% but not more than 50%'){
                            $noc_value='VOTINGRIGHTS_25TO50PERCENT';
                        }else if($val['noc_vr']=='More than 50% but less than 75%'){
                            $noc_value='VOTINGRIGHTS_50TO75PERCENT';
                        }else{
                            $noc_value='VOTINGRIGHTS_75TO100PERCENT';
                        }

                    }else if($val['noc_appoint']=='Yes'){
                        $noc_value='RIGHTTOAPPOINTANDREMOVEMEMBERS';

                    }
                    else if($val['fci']=='yes'){
                        if($val['fci_os']!=''){
                            if($val['fci_os']=='More than 25% but not more than 50%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT_AS_TRUST';
                            }else if($val['fci_os']=='More than 50% but less than 75%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT_AS_TRUST';
                            }else{
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT_AS_TRUST';
                            }
                        }else if($val['fci_vr']!=''){
                            if($val['fci_vr']=='More than 25% but not more than 50%'){
                                $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_TRUST';
                            }else if($val['fci_vr']=='More than 50% but less than 75%'){
                                $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_TRUST';
                            }else{
                                $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_TRUST';
                            }
                        }else if($val['fci_appoint']=='Yes'){
                            $noc_value='RIGHTTOAPPOINTANDREMOVEMEMBERS_AS_TRUST';

                        }else{
                            $noc_value='SIGINFLUENCECONTROL_AS_TRUST';

                        }
                    }else if($val['tci']=='yes'){
                        if($val['tci_os']!=''){
                            if($val['tci_os']=='More than 25% but not more than 50%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_25TO50PERCENT_AS_FIRM';
                            }else if($val['tci_os']=='More than 50% but less than 75%'){
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_50TO75PERCENT_AS_FIRM';
                            }else{
                                $noc_value='RIGHTTOSHARESURPLUSASSETS_75TO100PERCENT_AS_FIRM';
                            }
                        }else if($val['tci_vr']!=''){
                            if($val['tci_vr']=='More than 25% but not more than 50%'){
                                $noc_value='VOTINGRIGHTS_25TO50PERCENT_AS_FIRM';
                            }else if($val['tci_vr']=='More than 50% but less than 75%'){
                                $noc_value='VOTINGRIGHTS_50TO75PERCENT_AS_FIRM';
                            }else{
                                $noc_value='VOTINGRIGHTS_75TO100PERCENT_AS_FIRM';
                            }
                        }else if($val['tci_appoint']=='Yes'){
                            $noc_value='RIGHTTOAPPOINTANDREMOVEDIRECTORS_AS_FIRM';

                        }else{
                            $noc_value='SIGINFLUENCECONTROL_AS_FIRM';

                        }
                    }

                    $all_psc.='<PSC>
                                        <PSCNotification>
                                            <Individual>
                                                <Forename>'.$officerDetails['first_name'].'</Forename>
                                                <Surname>'.$officerDetails['last_name'].'</Surname>
                                                <ServiceAddress>
                                                    <Address>
                                                        <Premise>'.$service_add->house_number.'</Premise>
                                                        <Street>'.$service_add->street.'</Street>
                                                        <Thoroughfare>'.$service_add->locality.'</Thoroughfare>
                                                        <PostTown>'.$service_add->town.'</PostTown>
                                                        <Country>'.$service_country.'</Country>
                                                        <Postcode>'.$service_add->post_code.'</Postcode>
                                                    </Address>
                                                </ServiceAddress>
                                                <DOB>'.$officerDetails['dob_day'].'</DOB>
                                                <Nationality>'.$nationality_name.'</Nationality>
                                                <CountryOfResidence>'.$country_resident.'</CountryOfResidence>
                                                <ResidentialAddress>
                                                    <Address>
                                                        <Premise>'.$address->house_number.'</Premise>
                                                        <Street>'.$address->street.'</Street>
                                                        <Thoroughfare>'.$address->locality.'</Thoroughfare>
                                                        <PostTown>'.$address->town.'</PostTown>
                                                        <Country>'.$country.'</Country>
                                                        <Postcode>'.$address->post_code.'</Postcode>
                                                    </Address>
                                                </ResidentialAddress>
                                                <ConsentStatement>true</ConsentStatement>
                                            </Individual>
                                            <LLPNatureOfControls>
                                                <NatureOfControl>'.$noc_value.'</NatureOfControl>
                                            </LLPNatureOfControls>
                                        </PSCNotification>
                                    </PSC>';
                }
            }

        }







        $xml ='<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope" xmlns:dsig="http://www.w3.org/2000/09/xmldsig#" xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
             <EnvelopeVersion />
                    <Header>
                        <MessageDetails>
                            <Class>CompanyIncorporation</Class>
                            <Qualifier>request</Qualifier>
                            <TransactionID>'.$transaction_id.'</TransactionID>
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
                        <FormSubmission xmlns="http://xmlgw.companieshouse.gov.uk/Header" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
                            <FormHeader>
                                <CompanyName>'.$review->companie_name.'</CompanyName>
                                <PackageReference>4076</PackageReference>
                                <FormIdentifier>CompanyIncorporation</FormIdentifier>
                                <SubmissionNumber>'.$six_digit_random_number.'</SubmissionNumber>
                                <ContactName>'.$delivery_partner_details->recipient_name.'</ContactName>
                                <ContactNumber>'.$delivery_partner_details->recipient_email.'</ContactNumber>
                            </FormHeader>
                            <DateSigned>'.date('Y-m-d').'</DateSigned>
                            <Form>
                                <CompanyIncorporation xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd" xmlns="http://xmlgw.companieshouse.gov.uk">
                                    <CompanyType>LLP</CompanyType>
                                    <CountryOfIncorporation>'.$review->jurisdiction->value.'</CountryOfIncorporation>
                                    '.$office_register_address.'
                                    <DataMemorandum>false</DataMemorandum>
                                    <Articles>'.$articles.'</Articles>
                                    <RestrictedArticles>false</RestrictedArticles>
                                    '.$all_member.'
                                    <PSCs>
                                    '.$all_psc.'
                                    </PSCs>

                                    <Authoriser>
                                        <Member>
                                            <Corporate>
                                                <CorporateName>FormationsHunt LTD</CorporateName>
                                            </Corporate>
                                            <Authentication>
                                                <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                                <PersonalData>LON</PersonalData>
                                            </Authentication>
                                            <Authentication>
                                                <PersonalAttribute>DAD</PersonalAttribute>
                                                <PersonalData>JOH</PersonalData>
                                            </Authentication>
                                            <Authentication>
                                                <PersonalAttribute>TEL</PersonalAttribute>
                                                <PersonalData>123</PersonalData>
                                            </Authentication>
                                        </Member>
                                    </Authoriser>
                                    <SameDay>false</SameDay>
                                    <SameName>'.$sameName.'</SameName>

                                </CompanyIncorporation>
                            </Form>
                            '.$ArticleDocument.'
                            '.$SensitiveDocument.'
                            '.$SamenameDocument.'
                        </FormSubmission>
                    </Body>
                </GovTalkMessage>';


                $xml_details = companyXmlDetail::where('order_id',$id)->first();
                if($xml_details){
                    $xml_details->xml_body=$xml;
                    $xml_details->submission_no=$six_digit_random_number;
                    $xml_details->tans_no=$transaction_id;
                    $xml_details->save();

                }else{
                    $xml_data = new companyXmlDetail;
                    $xml_data->order_id = $id;
                    $xml_data->submission_no = $six_digit_random_number;
                    $xml_data->company_name = $review->companie_name;
                    $xml_data->tans_no = $transaction_id;
                    $xml_data->status = null;
                    $xml_data->comment = null;
                    $xml_data->xml_body = $xml;
                    $xml_data->authentication_code = null;
                    $xml_data->company_no = null;
                    $xml_data->approval = null;
                    $xml_data->doc_request_key = null;
                    $xml_data->pdf_content = null;
                    $xml_data->save();


                }
    }

    public function importCompany($request){
        $curl = curl_init();
        $date = Carbon::now();
        $today= $date->format('Y-m-d');

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
                    <Class>CompanyDataRequest</Class>
                    <Qualifier>request</Qualifier>
                    <TransactionID>1</TransactionID>
                    <GatewayTest>0</GatewayTest>
                </MessageDetails>
                <SenderDetails>
                    <IDAuthentication>
                        <SenderID>7db721e60d22d2b868d5c975cb19a74b</SenderID>
                        <Authentication>
                            <Method>clear</Method>
                            <Value>658fd00434fdfb12569537cbc7205b4f</Value>
                        </Authentication>
                    </IDAuthentication>
                </SenderDetails>
            </Header>
            <GovTalkDetails>
                <Keys/>
            </GovTalkDetails>
            <Body>
                <CompanyDataRequest
                    xmlns="http://xmlgw.companieshouse.gov.uk"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/CompanyData-v3-3.xsd">
                    <CompanyNumber>'.$request->company_number.'</CompanyNumber>
                    <CompanyAuthenticationCode>'.$request->company_authcode.'</CompanyAuthenticationCode>
                    <MadeUpDate>'.$today.'</MadeUpDate>
                </CompanyDataRequest>
            </Body>
        </GovTalkMessage>',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/xml'
          ),
        ));

        // $response = curl_exec($curl);

        // curl_close($curl);

        $response = curl_exec($curl);
                    $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
                    $json = json_encode($xml);
                    $array = json_decode($json, TRUE);

        return $array;

    }

}
