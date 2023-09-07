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
    public function index($id)
    {

        $review = $this->companyFormService->getCompanieName($id);
        // dd($review);

        $transaction_id = random_int(100000, 999999);
        $six_digit_random_number = random_int(100000, 999999);
        $order_details = Order::where('order_id',$id)->first();
        $order_trans_details = orderTransaction::where('order_id',$id)->first();
        $delivery_partner_details = DeliveryPartnerDetail::where('order_id',$id)->first();
        // dd($delivery_partner_details);
        if($review->office_address){

            $registered_office_address = Address::where('id',$review->office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>'.$registered_office_address->house_number.'</Premise>
                                            <Street>'.$registered_office_address->street.'</Street>
                                            <Thoroughfare>'.$registered_office_address->locality.'</Thoroughfare>
                                            <PostTown>'.$registered_office_address->town.'</PostTown>
                                            <Country>'.$registered_office_address->county.'</Country>
                                            <Postcode>'.$registered_office_address->post_code.'</Postcode>
                                        </RegisteredOfficeAddress>';
        }else{
            $registered_office_address = Address::where('id',$review->forwarding_registered_office_address)->first();
            $office_register_address = '<RegisteredOfficeAddress>
                                            <Premise>52 Danes Court</Premise>
                                            <Street>North End Road</Street>
                                            <Thoroughfare>Wembley</Thoroughfare>
                                            <PostTown>Middlesex</PostTown>
                                            <Country>United Kingdom</Country>
                                            <Postcode>HAQ OAE</Postcode>
                                        </RegisteredOfficeAddress>';
        }
        if($review->legal_document){
            $articles = 'BYSHRMODEL';
        }else{
            $articles = 'BESPOKE';
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
                    $same_add = 'false';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Country::where('id',$nationality)->pluck('name')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();

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
                                                    <Country>'.$address->county.'</Country>
                                                    <Postcode>'.$address->post_code.'</Postcode>
                                                </Address>
                                            </ResidentialAddress>
                                        </Person>
                                    </Director>
                                </Appointment>';
            }
        }
        // For PSC
        $all_psc = '';
        foreach ($appointmentsList as $val){
            $positionArray = explode(', ', $val['position']);
            if(in_array('Director', $positionArray)){
                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                // dd($officerDetails);
                if($registered_office_address->id==$officerDetails['add_id']){
                    $same_add = 'true';
                }else{
                    $same_add = 'false';
                }
                $nationality = $officerDetails['nationality'];
                $nationality_name = Country::where('id',$nationality)->pluck('name')->first();
                $address= Address::where('id',$officerDetails['add_id'])->first();
                // dd($address);
                $all_psc.='<PSCs>
                <PSC>
                    <PSCNotification>
                        <Individual>
                            <Title></Title>
                            <Forename>Divyaba</Forename>
                            <Surname>Harishchandrasinh</Surname>
                            <ServiceAddress>
                                <SameAsRegisteredOffice>true</SameAsRegisteredOffice>
                            </ServiceAddress>
                            <DOB>1970-05-23</DOB>
                            <Nationality>British</Nationality>
                            <CountryOfResidence>United Kingdom</CountryOfResidence>
                            <ResidentialAddress>
                                <Address>
                                    <Premise>112</Premise>
                                    <Street>Watford Road</Street>
                                    <Thoroughfare>Wembley</Thoroughfare>
                                    <PostTown>Greater London</PostTown>
                                    <Country>GBR</Country>
                                    <Postcode>HA0 3HF</Postcode>
                                </Address>
                            </ResidentialAddress>
                            <ConsentStatement>true</ConsentStatement>
                        </Individual>
                        <NatureOfControls>
                            <NatureOfControl>SIGINFLUENCECONTROL</NatureOfControl>
                        </NatureOfControls>
                    </PSCNotification>
                </PSC>
            </PSCs>';
            }
        }

        dd($all_psc);
        $xml = '<GovTalkMessage xsi:schemaLocation="http://www.govtalk.gov.uk/CM/envelope http://xmlbeta.companieshouse.gov.uk:80/v1-0/schema/Egov_ch-v2-0.xsd" xmlns ="http://www.govtalk.gov.uk/CM/envelope"
        xmlns:dsig="http://www.w3.org/2000/09/xmldsig#"
        xmlns:gt="http://www.govtalk.gov.uk/schemas/govtalk/core"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <EnvelopeVersion />
        <Header>
            <MessageDetails>
                <Class>CompanyIncorporation</Class>
                <Qualifier>request</Qualifier>
                <TransactionID>'.$transaction_id.'</TransactionID>
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
                <!-- <EmailAddress>contact@formationshunt.co.uk</EmailAddress> -->
            </SenderDetails>
        </Header>
        <GovTalkDetails>
            <Keys />
        </GovTalkDetails>
        <Body>
            <FormSubmission
                xmlns="http://xmlgw.companieshouse.gov.uk/Header"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk/Header http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/FormSubmission-v2-11.xsd">
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
                    <CompanyIncorporation
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:schemaLocation="http://xmlgw.companieshouse.gov.uk http://xmlgw.companieshouse.gov.uk/v2-1/schema/forms/CompanyIncorporation-v3-6.xsd"
                        xmlns="http://xmlgw.companieshouse.gov.uk">
                        <CompanyType>BYSHR</CompanyType>
                        <CountryOfIncorporation>'.$review->jurisdiction->value.'</CountryOfIncorporation>
                        '.$office_register_address.'
                        <DataMemorandum>true</DataMemorandum>
                        <Articles>'.$articles.'</Articles>
                        <RestrictedArticles>false</RestrictedArticles>
                        '.$all_director.'
                        <PSCs>
                            <PSC>
                                <PSCNotification>
                                    <Individual>
                                        <Title></Title>
                                        <Forename>Divyaba</Forename>
                                        <Surname>Harishchandrasinh</Surname>
                                        <ServiceAddress>
                                            <SameAsRegisteredOffice>true</SameAsRegisteredOffice>
                                        </ServiceAddress>
                                        <DOB>1970-05-23</DOB>
                                        <Nationality>British</Nationality>
                                        <CountryOfResidence>United Kingdom</CountryOfResidence>
                                        <ResidentialAddress>
                                            <Address>
                                                <Premise>112</Premise>
                                                <Street>Watford Road</Street>
                                                <Thoroughfare>Wembley</Thoroughfare>
                                                <PostTown>Greater London</PostTown>
                                                <Country>GBR</Country>
                                                <Postcode>HA0 3HF</Postcode>
                                            </Address>
                                        </ResidentialAddress>
                                        <ConsentStatement>true</ConsentStatement>
                                    </Individual>
                                    <NatureOfControls>
                                        <NatureOfControl>SIGINFLUENCECONTROL</NatureOfControl>
                                    </NatureOfControls>
                                </PSCNotification>
                            </PSC>
                        </PSCs>
                        <StatementOfCapital>
                            <Capital>
                                <TotalAmountUnpaid>0</TotalAmountUnpaid>
                                <TotalNumberOfIssuedShares>1</TotalNumberOfIssuedShares>
                                <ShareCurrency>GBP</ShareCurrency>
                                <TotalAggregateNominalValue>1.00</TotalAggregateNominalValue>
                                <Shares>
                                    <ShareClass>Ordinary</ShareClass>
                                    <PrescribedParticulars>Each share is entitled to one vote in any circumstances. Each share has equal rights to dividends. Each share is entitled to participate in a distribution arising from a winding up of the company</PrescribedParticulars>
                                    <NumShares>1</NumShares>
                                    <AggregateNominalValue>1.00</AggregateNominalValue>
                                </Shares>
                            </Capital>
                        </StatementOfCapital>
                        <Subscribers>
                            <Person>
                                <Forename>Divyaba</Forename>
                                <Surname>Harishchandrasinh</Surname>
                            </Person>
                            <Address>
                                <Premise>112</Premise>
                                <Street>Watford Road</Street>
                                <Thoroughfare>Wembley</Thoroughfare>
                                <PostTown>Greater London</PostTown>
                                <Country>GBR</Country>
                                <Postcode>HA0 3HF</Postcode>
                            </Address>
                            <Authentication>
                                <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                <PersonalData>BUR</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>TEL</PersonalAttribute>
                                <PersonalData>111</PersonalData>
                            </Authentication>
                            <Authentication>
                                <PersonalAttribute>MUM</PersonalAttribute>
                                <PersonalData>SUH</PersonalData>
                            </Authentication>
                            <Shares>
                                <ShareClass>Ordinary</ShareClass>
                                <NumShares>1</NumShares>
                                <AmountPaidDuePerShare>1</AmountPaidDuePerShare>
                                <AmountUnpaidPerShare>0</AmountUnpaidPerShare>
                                <ShareCurrency>GBP</ShareCurrency>
                                <ShareValue>1</ShareValue>
                            </Shares>
                            <MemorandumStatement>Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a member of the company and to take at least one share.</MemorandumStatement>
                        </Subscribers>
                        <Authoriser>
                            <Subscribers>
                                <Subscriber>
                                    <Person>
                                        <Forename>Divyaba</Forename>
                                        <Surname>Harishchandrasinh</Surname>
                                    </Person>
                                    <Authentication>
                                        <PersonalAttribute>BIRTOWN</PersonalAttribute>
                                        <PersonalData>BUR</PersonalData>
                                    </Authentication>
                                    <Authentication>
                                        <PersonalAttribute>TEL</PersonalAttribute>
                                        <PersonalData>111</PersonalData>
                                    </Authentication>
                                    <Authentication>
                                        <PersonalAttribute>MUM</PersonalAttribute>
                                        <PersonalData>SUH</PersonalData>
                                    </Authentication>
                                </Subscriber>
                            </Subscribers>
                        </Authoriser>
                        <SameDay>false</SameDay>
                        <SameName>false</SameName>
                        <NameAuthorisation>false</NameAuthorisation>
                        <SICCodes>
                            <SICCode>96090</SICCode>
                        </SICCodes>
                    </CompanyIncorporation>
                </Form>
            </FormSubmission>
        </Body>
    </GovTalkMessage>';


        dd($xml);
    }


}
