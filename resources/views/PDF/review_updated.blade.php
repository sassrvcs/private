<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .nature_of_control p span {
        font-weight: 500;
        color: #3f63ed;
    }
</style>

<body>
    <table>
        <tr>
            <td style="padding:0 0 10px; border-bottom:3px solid #000;">
                <a href="#" title="logo" target="_blank">

                    <img src="{{ storage_path('app/public/logo.png') }}" title="logo" alt="logo"
                        style="width:300px;height:50px">
                </a>
            </td>
        </tr>
        <tr>
            <td style="height:40px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="padding:0">
                <h2
                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                    Particulars</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                    <tr>
                        <td
                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                            Company Name</td>
                        <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">
                            {{ $review->companie_name }}</td>
                    </tr>
                    <tr>
                        <td
                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                            Company Type</td>
                        <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">
                            {{ $review->companie_type }}</td>
                    </tr>
                    <tr>
                        <td
                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                            Jurisdiction</td>
                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                            {{ $review->jurisdiction->name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                            SIC Codes</td>
                        <td style="padding:10px;width: 50%;">
                            @if ($review->sicCodes->count() > 0)
                                {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }}
                            @else
                                {{-- No data present --}}
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="height:30px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                    <tr>
                        @php
                            // dd($review);
                        @endphp
                        @if (!empty($review->forwarding_registered_office_address))
                            <h3>Registered Office</h3>
                            <ul>
                                <li>
                                    <strong>Address : </strong> 52 Danes Court, North End Road, Wembley,
                                    Middlesex, HAQ OAE, United Kingdom
                                </li>
                            </ul>
                            <h3>Forwarding Address</h3>
                            <ul>
                                <li>
                                    <strong>Address : </strong>
                                    {{ construct_address($review->officeAddressWithForwAddress) }}
                                </li>
                            </ul>
                        @else
                            <h3>Registered Office</h3>
                            <ul>
                                <li>
                                    <strong>Address : </strong>
                                    {{ construct_address($review->officeAddressWithoutForwAddress) }}
                                </li>
                            </ul>
                        @endif
                    </tr>

                    <tr>
                        @if (!empty($review->forwarding_business_office_address))
                            <h3>Buisness Address</h3>
                            <ul>
                                <li>
                                    <strong>Address : </strong>52 Danes Court, North End Road, Wembley,
                                    Middlesex, HAQ OAE, United Kingdom
                                </li>
                            </ul>
                            <h3>Forwarding Address</h3>
                            <ul>
                                <li>
                                    <strong>Address : </strong>
                                    {{ construct_address($review->businessAddressWithForwAddress) }}
                                </li>
                            </ul>
                        @else
                            @if ($review->business_address)
                                <h3>Buisness Address</h3>
                                <ul>
                                    <li>
                                        <strong>Address : </strong>
                                        {{ construct_address($review->businessAddressWithoutForwAddress) }}
                                    </li>
                                </ul>
                            @endif
                        @endif
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="height:30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="padding:0">
                <h2
                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                    Appointments</h2>
            </td>
        </tr>
        @foreach ($appointmentsList as $val)
            <tr>
                <td style="padding: 0;">
                    <table width="100%" cellpadding="0" cellspacing="0"
                        style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                        <tr>
                            <td
                                style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                Name</td>
                            <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">
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
                                @endphp</td>
                        </tr>
                        @php
                            $positionString = $val['position'];
                            $positionArray = explode(', ', $val['position']);
                        @endphp
                        <tr>
                            <td
                                style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                Roles</td>
                            <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">
                                {{ in_array('Member', $positionArray) ? 'Member,' : '' }}
                                {{ in_array('Designated Member', $positionArray) ? 'Designated Member,' : '' }}
                                {{ in_array('Director', $positionArray) ? 'Director,' : '' }}
                                {{ in_array('Shareholder', $positionArray) ? 'Shareholder,' : '' }}
                                {{ in_array('Secretary', $positionArray) ? 'Secretary,' : '' }}
                                {{ in_array('Guarantor', $positionArray) ? 'Guarantor,' : '' }}
                                {{ in_array('PSC', $positionArray) ? 'PSC' : '' }}</td>
                        </tr>
                        @if (in_array('Shareholder', $positionArray) || in_array('Guarantor', $positionArray))
                            <tr>

                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Holdings</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">

                                    @if ($val['sh_quantity'])
                                        {{ $val['sh_quantity'] }} x ORDINARY at {{ $val['sh_pps'] }}
                                        {{ $val['sh_currency'] }}
                                    @endif
                                    @if ($val['amount_guarantee'] && $review->companie_type == 'Limited By Guarantee')
                                        {{ $val['amount_guarantee'] . ' GBP' }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @php
                            $dob = $officerDetails['dob_day'];
                        @endphp
                        @if ($dob && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    DOB</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $dob }}
                                </td>
                            </tr>
                        @endif
                        @php
                            $occupation = $officerDetails['occupation'];
                        @endphp
                        @if ($occupation && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Occupation</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $occupation }}
                                </td>
                            </tr>
                        @endif
                        @php
                            // $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                            $nationality = $officerDetails['nationality'];
                            $nationality_name = \App\Models\Nationality::where('id', $nationality)
                                ->pluck('nationality')
                                ->first();
                        @endphp
                        @if ($nationality_name && ($val['appointment_type'] != 'other_legal_entity' && $val['appointment_type'] != 'corporate'))
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Nationality</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $nationality_name }}
                                </td>
                            </tr>
                        @endif

                        @if ($val['appointment_type'] == 'other_legal_entity' || $val['appointment_type'] == 'corporate')
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Registration Number </td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $officerDetails['registration_number'] ?? '-' }}

                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Place Registered </td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $officerDetails['place_registered'] ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    UK entity </td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    @if ($val['appointment_type'] == 'other_legal_entity')
                                        No
                                    @else
                                        {{ $officerDetails['uk_registered'] ?? '-' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Law Governed </td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $officerDetails['law_governed'] ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Legal Form </td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ $officerDetails['legal_form'] ?? '-' }}
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td
                                style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                Residential Address</td>
                            <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                @php
                                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                                    $add_id = $officerDetails['add_id'];
                                    $address = \App\Models\Address::where('id', $add_id)->first();

                                @endphp
                                {{ construct_address($address) }}
                            </td>
                        </tr>
                        @if ($val['appointment_type'] != 'corporate')
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Service Address</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    @if (isset($val['own_address_id']))
                                        @php
                                            $service_add = \App\Models\Address::where('id', $val['own_address_id'])->first();
                                            // dd($service_add);
                                        @endphp
                                        {{ construct_address($service_add) }}
                                    @else
                                        52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United Kingdom
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @php
                            $service_add_fwd = \App\Models\Address::where('id', $val['forwarding_address_id'])->first();
                        @endphp
                        @if ($service_add_fwd)
                            <tr>
                                <td
                                    style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                    Forwarding Address</td>
                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                    {{ construct_address($service_add_fwd) }}

                                </td>
                            </tr>
                        @endif
                        @if (in_array('PSC', $positionArray))
                            <tr>
                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                    Nature Of Control</td>
                                <td style="padding:10px;width: 50%;">
                                    {{-- <p style="padding:0;margin: 0;">{{$val['noc_vr']}} </p> --}}

                                    <span class="nature_of_control">
                                        {{-- Individual/Company --}}
                                        @if ($val['noc_os'] != null || $val['noc_vr'] != null || ($val['noc_appoint'] == 'Yes' || $val['noc_others'] == 'Yes'))
                                            <b>(Individual/Company)</b>
                                            @if ($val['noc_os'] != null)
                                                <p>
                                                    <span>Ownership of shares: </span>{{ $val['noc_os'] }}
                                                </p>
                                                <p>
                                            @endif
                                            @if ($val['noc_vr'] != null)
                                                <span>Voting Rights: </span>
                                                {{ $val['noc_vr'] }}
                                                </p>
                                            @endif

                                            @if ($val['noc_appoint'] != 'No')
                                                <p>
                                                    <span>Appoint or remove the majority of the board of
                                                        directors:</span>
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
                                                <p>
                                            @endif
                                            @if ($val['fci_vr'] != null)
                                                <span>Voting Rights: </span>
                                                {{ $val['fci_vr'] }}
                                                </p>
                                            @endif

                                            @if ($val['fci_appoint'] != 'No')
                                                <p>
                                                    <span>Appoint or remove the majority of the board of
                                                        directors:</span>
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
                                                <p>
                                            @endif
                                            @if ($val['tci_vr'] != null)
                                                <span>Voting Rights: </span>
                                                {{ $val['tci_vr'] }}
                                                </p>
                                            @endif

                                            @if ($val['tci_appoint'] != 'No')
                                                <p>
                                                    <span>Appoint or remove the majority of the board of
                                                        directors:</span>
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

                                </td>
                            </tr>
                        @endif

                    </table>
                </td>
            </tr>
            <tr>
                <td style="height:30px;">&nbsp;</td>
            </tr>
        @endforeach
        <div class="page-break"></div>
        <tr>
            <td style="padding:0">
                <h2
                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                    Documents</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                    <tr>
                        <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                            Memorandum and Articles:</td>
                        <td style="padding:10px;width: 50%;">
                            @if ($review->legal_document == 'generic_article' && $review->companie_type == 'Limited By Shares')
                                {{ 'Generic Limited by Share Articles' }}
                            @endif
                            @if ($review->legal_document == 'generic_article' && $review->companie_type == 'Limited Liability Partnership')
                                {{ 'Generic Limited by LLP Articles' }}
                            @endif
                            @if ($review->legal_document == 'byspoke_article')
                                {{ 'Byspoke article of association' }}
                            @endif
                            @if ($review->companie_type == 'Limited By Guarantee' && $review->legal_document == 'generic_article')
                                {{ 'Limited by Guarantee Articles' }}
                            @endif
                            @if ($review->companie_type == 'Public Limited Company' && $review->legal_document == 'generic_article')
                                {{ 'Generic PLC Articles' }}
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="height:30px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="padding:0">
                <h2
                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                    Business Account</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                    <tr>
                        <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                            Business Account</td>
                        <td style="padding:10px;width: 50%;">
                            {{ $review->businessBanking->businessBanking->title ?? 'No Merchant Account Selected' }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="height:30px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="padding:0">
                <h2
                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                    Accounting Software</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                    <tr>
                        <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                            Accounting Software </td>
                        <td style="padding:10px;width: 50%;">
                            {{ $review->businessBanking->accountingSoftware->accounting_software_name ?? 'No Accounting Software Product Selected' }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
