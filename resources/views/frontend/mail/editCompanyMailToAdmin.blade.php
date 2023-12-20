<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body style="background-color: #f5f5f5;">
    <table style="width: 95%;
    max-width: 991px;
    margin: 100px auto; background: #fff;">
        <thead style="background-color: #313C4E;">
            <tr style="text-align: left;">
                <th style="padding: 50px;">
                    <img src="{{$message->embed($logo)}}" alt="">
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td style="text-align: left; padding: 50px 10px 10px 50px; font-size: 24px;">Dear {{$userDetails->title}} {{@$userDetails->forename}} {{$userDetails->surname}}</td>
            </tr>

            <tr>
                <th style="text-align: left; padding: 10px 10px 10px 50px; font-size: 28px;">Service Purchase confirmation(order_id: {{$serviceDetails->order_id}})</th>
            </tr>
            <tr>
                <td style="text-align: left; padding: 20px 50px; font-size: 18px; line-height: 26px;">
                Thank you for your purchase. Please find the attached invoice.

                </td>
            </tr> --}}
            @foreach ($cart_items as $item)
            @if ($item->slug=='add-new-statement')
            @php
                $decodedStatement = json_decode($item->data);
            @endphp

           <ul>
                <li>
                    <div class="mb-2">
                        @if(isset($decodedStatement->statementNotify))
                            <strong>Statement Notify:</strong> {{ $decodedStatement->statementNotify }}
                        @endif
                    </div>

                    <div class="mb-2">
                        @if(isset($decodedStatement->psc_statement))
                            <strong>PSC Statement:</strong> {{ $decodedStatement->psc_statement }}
                        @endif
                    </div>

                    <div class="mb-2">
                        @if(isset($decodedStatement->psc_linked))
                            <strong>PSC Linked:</strong> {{ $decodedStatement->psc_linked }}
                        @endif
                    </div>
                    <div>
                        @if(isset($decodedStatement->officer_details))
                            <strong>Officer Details:</strong>
                            <ul class="list-unstyled mb-0 ml-3">
                                @if(isset($decodedStatement->officer_details->full_name))
                                    <li><strong>Full Name:</strong> {{ $decodedStatement->officer_details->full_name }}</li>
                                @endif
                                @if(isset($decodedStatement->officer_details->dob_day))
                                    <li><strong>DOB:</strong> {{ $decodedStatement->officer_details->dob_day }}</li>
                                @endif
                                <!-- Add other officer details as needed -->
                            </ul>
                        @endif
                    </div>
                    <div class="mb-2">
                        @if(isset($decodedStatement->notificationDate))
                            <strong>Notification Date:</strong> {{ $decodedStatement->notificationDate }}
                        @endif
                    </div>
                </li>
            </ul>
            @endif
            @if ($item->slug == 'edit-auth-code')
            <ul>
                {{-- <li>
                    <strong>Purchase Company Name Change</strong>

                </li> --}}
                @php
                $updated_auth_code = json_decode($item->data);
            @endphp
                <li>
                    <strong>{{ $item->service_name }} :  </strong>
                    <div>
                        {{ $updated_auth_code->auth_code }}
                    </div>


                </li>
            </ul>
            @endif
            @if ($item->slug == 'change-accounting-date')
            <ul>
                {{-- <li>
                    <strong>Purchase Company Name Change</strong>

                </li> --}}
                <li>
                    <strong>{{ $item->service_name }} :  </strong>
                    <div>
                        @php
                            $company_accountValue_data = json_decode($item->company_account_value);

                        @endphp
                        <div>

                            <span>Current Reference Date: </span> <span>{{ $company_accountValue_data->currentReferenceDate }}</span>
                        </div>
                        <div>
                            <span>Amended Reference Date:</span>
                            <span>{{ $company_accountValue_data->amendedReferenceDate }}</span>
                        </div>
                        <div>
                            <span>Changed more than once in 5 years? : </span><span>{{ $company_accountValue_data->changed }}</span>
                            @if ($company_accountValue_data->changed == 'yes')
                            <span>Reason for change:</span>
                            <span>
                                @if ($company_accountValue_data->reasonForChange=='ADMIN')
                                Subject to an administration order

                                @endif
                                @if ($company_accountValue_data->reasonForChange=='STATE')
                                Secretary of State Approval

                                @endif
                                @if ($company_accountValue_data->reasonForChange=='UKPAR    ')
                                To align with a parent/subsidiary established in the UK
                                @endif
                            </span>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            @endif
            @if ($item->slug == 'change-registered-office')
            <ul>

                <li>
                    <strong>Purchase/Change Register office address</strong>

                    {{-- <strong>{{ $item->service_name }} :  </strong> --}}
                    <div>
                        @if ($item->address_id!=null)
                            @php
                                $reg_add = \App\Models\Address::where('id',$item->address_id)->first()->toArray();
                            @endphp
                            Registered Address : {{construct_address($reg_add)}}
                        @endif
                        @if ($item->forward_address_id!=null)
                        @php
                            $forward_reg_add = \App\Models\Address::where('id',$item->forward_address_id)->first()->toArray();
                        @endphp
                        Forwarding Registered Address : {{construct_address($forward_reg_add)}}

                        @endif
                    </div>
                    <div>
                        <span>Effective Date: {{ $item->effective_date }}</span>
                    </div>
                    Price: {{ $item->price }}+ Vat: {{ $item->vat }} = {{ $item->price + $item->vat }}
                </li>
            </ul>
            @endif
            @if ($item->slug == 'company-name-change')
            <ul>
                {{-- <li>
                    <strong>Purchase Company Name Change</strong>

                </li> --}}
                <li>
                    <strong>{{ $item->service_name }} :  </strong>
                    Price: {{ $item->price }}+ Vat: {{ $item->vat }} = {{ $item->price + $item->vat }}
                </li>
            </ul>
            @endif
            @if ($item->slug == 'confirmation-statement-service')
            <ul>
                {{-- <li>
                    <strong>Purchase Confirmation Statement Service</strong>

                </li> --}}
                <li>
                    <strong>{{ $item->service_name }} :  </strong>
                    Price: {{ $item->price }}+ Vat: {{ $item->vat }} = {{ $item->price + $item->vat }}
                </li>
            </ul>
            @endif
                @if ($item->slug == 'purchase_appointment_address')
                <ul>
                    {{-- <li>
                        <strong>Purchase Service Address</strong>

                    </li> --}}
                    <li>
                        <strong>{{ $item->service_name }} :  </strong>
                        Price: {{ $item->price }}+ Vat: {{ $item->vat }} = {{ $item->price + $item->vat }}
                    </li>
                </ul>
                @endif
                @if ($item->slug == 'appointment_edit_changes')
                    @php
                        $appointment_cart_data = json_decode($item->data);
                    @endphp
                    <ul>
                        <li>
                            <strong>Appointment Edit</strong>

                        </li>
                    </ul>
                    <ul>
                        <li>
                            <strong>Activity Detected in :</strong>
                            @if ($appointment_cart_data->changesMadePosition != 0)
                                Position Section,
                            @endif

                            @if ($appointment_cart_data->personalDetailsChanges != 0)
                                Personal Details Section,
                            @endif
                            @if ($appointment_cart_data->natureOfControlChanges != 0)
                                Nature Of Controls Section,
                            @endif

                            @if ($appointment_cart_data->residentAddressChanges != 0)
                                Resident Address Section,
                            @endif

                            @if ($appointment_cart_data->forwardAddressChanges != 0)
                                Service Address Section(Forwarding Address)
                            @endif


                        </li>
                    </ul>


                    @php

                        $val = \App\Models\Person_appointment::where('id', $item->appointment_id)
                            ->first()
                            ->toArray();
                        // dd($val);
                    @endphp
                    <ul>
                        <li><strong>Name : </strong><span style="text-transform:uppercase;">
                                @php
                                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                                    $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];

                                    if ($val['appointment_type'] == 'other_legal_entity' || $val['appointment_type'] == 'corporate') {
                                        echo $officerDetails['legal_name'];
                                    } else {
                                        if ($officerDetails['first_name'] != '' && $officerDetails['last_name'] != '') {
                                            echo $fullName;
                                        }
                                    }
                                @endphp</span> </li>
                        @php
                            $positionString = $val['position'];
                            $positionArray = explode(', ', $val['position']);
                        @endphp
                        <li><strong>Roles :
                            </strong>
                            {{ in_array('Member', $positionArray) ? 'Member,' : '' }}
                            {{ in_array('Designated Member', $positionArray) ? 'Designated Member,' : '' }}
                            {{ in_array('Director', $positionArray) ? 'Director,' : '' }}
                            {{ in_array('Shareholder', $positionArray) ? 'Shareholder,' : '' }}
                            {{ in_array('Secretary', $positionArray) ? 'Secretary,' : '' }}
                            {{ in_array('Guarantor', $positionArray) ? 'Guarantor,' : '' }}
                            {{ in_array('PSC', $positionArray) ? 'PSC' : '' }}</li>
                        {{-- holdings --}}
                        @if (in_array('Shareholder', $positionArray) || in_array('Guarantor', $positionArray))
                            <li><strong>Holdings : </strong>
                                @if ($val['sh_quantity'])
                                    {{ $val['sh_quantity'] }} x ORDINARY at {{ $val['sh_pps'] }}
                                    {{ $val['sh_currency'] }}
                                @endif
                                @if ($val['amount_guarantee'] && $review->companie_type == 'Limited By Guarantee')
                                    {{ $val['amount_guarantee'] . ' GBP' }}
                                @endif
                            </li>
                        @endif
                        {{-- endholdings --}}

                        @php
                            // $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                            $dob = $officerDetails['dob_day'];

                        @endphp
                        @if ($dob && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <li><strong>DOB : </strong>
                                {{ $dob }}
                            </li>
                        @endif

                        @php
                            // $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                            $occupation = $officerDetails['occupation'];
                        @endphp
                        @if ($occupation && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <li><strong>Occupation : </strong>
                                {{ $occupation }}
                            </li>
                        @endif
                        @php
                            // $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                            $nationality = $officerDetails['nationality'];
                            $nationality_name = \App\Models\Nationality::where('id', $nationality)
                                ->pluck('nationality')
                                ->first();
                        @endphp
                        @if ($nationality_name && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <li><strong>Nationality : </strong>
                                {{ $nationality_name }}
                            </li>
                        @endif
                        @if ($val['appointment_type'] == 'other_legal_entity' || $val['appointment_type'] == 'corporate')
                            <li><strong>Registration Number : </strong>
                                {{ $officerDetails['registration_number'] ?? '-' }}
                            </li>
                            <li><strong>Place Registered : </strong>
                                {{ $officerDetails['place_registered'] ?? '-' }}
                            </li>
                            <li><strong>UK entity : </strong>
                                @if ($val['appointment_type'] == 'other_legal_entity')
                                    No
                                @else
                                    {{ $officerDetails['uk_registered'] ?? '-' }}
                                @endif
                            </li>
                            <li><strong>Law Governed : </strong>
                                {{ $officerDetails['law_governed'] ?? '-' }}
                            </li>
                            <li><strong>Legal Form : </strong>
                                {{ $officerDetails['legal_form'] ?? '-' }}
                            </li>
                        @endif
                        <li><strong>Residential Address : </strong> @php
                            // $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                            $add_id = $officerDetails['add_id'];
                            $address = \App\Models\Address::where('id', $add_id)->first();

                        @endphp
                            {{ construct_address($address) }}

                        </li>
                        @if ($val['appointment_type'] != 'corporate')
                            @if (isset($val['own_address_id']))
                                <li><strong>Service Address : </strong>
                                    @php
                                        $service_add = \App\Models\Address::where('id', $val['own_address_id'])->first();
                                        // dd($service_add);
                                    @endphp
                                    {{ construct_address($service_add) }}
                                </li>
                            @else
                                {{-- @foreach ($purchase_address as $address)
                                @if ($address->address_type == 'appointment_address')
                                {{construct_address($address->toArray())}}
                                @endif
                            @endforeach --}}
                            @endif

                            @php
                                $service_add_fwd = \App\Models\Address::where('id', $val['forwarding_address_id'])->first();
                                // dd($service_add);
                            @endphp
                            @if ($service_add_fwd)
                                <li><strong>Service Forwarding Address : </strong>
                                    {{ construct_address($service_add_fwd) }}
                                </li>
                            @endif
                        @endif

                        @if (in_array('PSC', $positionArray))
                            <li style="display: flex"><strong>Nature Of Control : </strong>

                                <span class="nature_of_control">
                                    {{-- Individual/Company --}}
                                    @if ($val['noc_os'] != null || $val['noc_vr'] != null || ($val['noc_appoint'] == 'Yes' || $val['noc_others'] == 'Yes'))
                                        <b>(Individual/Company)</b>
                                        @if ($val['noc_os'] != null)
                                            <p>
                                                <span>Ownership of shares: </span>{{ $val['noc_os'] }}
                                            </p>
                                        @endif
                                        @if ($val['noc_vr'] != null)
                                            <p>
                                                <span>Voting Rights: </span>
                                                {{ $val['noc_vr'] }}
                                            </p>
                                        @endif

                                        @if ($val['noc_appoint'] != 'No')
                                            <p>
                                                <span>Appoint or remove the majority of the board of directors:</span>
                                                {{ $val['noc_appoint'] }}
                                            </p>
                                        @endif
                                        @if ($val['noc_others'] != 'No')
                                            <p>
                                                <span>Other Significant influences or control:</span>
                                                {{ $val['noc_others'] }}
                                            </p>
                                        @endif
                                    @endif
                                    {{-- Individual/Company end --}}

                                    {{-- Firm  --}}
                                    @if (strtolower($val['fci']) == 'yes')
                                        <br>
                                        <b>(Firm)</b>
                                        @if ($val['fci_os'] != null)
                                            <p>
                                                <span>Ownership of shares: </span>{{ $val['fci_os'] }}
                                            </p>
                                        @endif
                                        @if ($val['fci_vr'] != null)
                                            <p>
                                                <span>Voting Rights: </span>
                                                {{ $val['fci_vr'] }}
                                            </p>
                                        @endif

                                        @if ($val['fci_appoint'] != 'No')
                                            <p>
                                                <span>Appoint or remove the majority of the board of directors:</span>
                                                {{ $val['fci_appoint'] }}
                                            </p>
                                        @endif
                                        @if ($val['fci_others'] != 'No')
                                            <p>
                                                <span>Other Significant influences or control:</span>
                                                {{ $val['fci_others'] }}
                                            </p>
                                        @endif
                                    @endif
                                    {{-- Firm end --}}
                                    {{-- Trust --}}
                                    @if (strtolower($val['tci']) == 'yes')
                                        <br>
                                        <b>(Trust)</b>
                                        @if ($val['tci_os'] != null)
                                            <p>
                                                <span>Ownership of shares: </span>{{ $val['fci_os'] }}
                                            </p>
                                        @endif
                                        @if ($val['tci_vr'] != null)
                                            <p>
                                                <span>Voting Rights: </span>
                                                {{ $val['tci_vr'] }}
                                            </p>
                                        @endif

                                        @if ($val['tci_appoint'] != 'No')
                                            <p>
                                                <span>Appoint or remove the majority of the board of directors:</span>
                                                {{ $val['tci_appoint'] }}
                                            </p>
                                        @endif
                                        @if ($val['tci_others'] != 'No')
                                            <p>
                                                <span>Other Significant influences or control:</span>
                                                {{ $val['tci_others'] }}
                                            </p>
                                        @endif
                                    @endif
                                    {{-- Trust end --}}

                                </span>




                            </li>
                        @endif

                        <li>
                            <strong>Notification Date: </strong>
                            {{ $appointment_cart_data->notification_date }}
                        </li>
                        <li>
                            <strong>Register Entry Date: </strong>
                            {{ $appointment_cart_data->register_entry_date }}

                        </li>
                    </ul>
                    {{-- @endforeach --}}

                @endif


            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="border-bottom: 5px solid #313C4E;"></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
