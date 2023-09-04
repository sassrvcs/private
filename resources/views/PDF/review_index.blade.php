<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Download Review</title>
</head>



    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; padding: 30px; background-color: #fff;"
        leftmargin="0">
        <!--100% body table-->
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#fff"
            style="font-family: 'Open Sans', sans-serif; @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');">
            <tr>
                <td>
                    <table style="background-color: #fff; margin:0 auto;" width="100%" border="0" cellpadding="0"
                        cellspacing="0">
                        <tr>
                            <td style="padding:0 0 10px; border-bottom:3px solid #000;">
                                <a href="#" title="logo" target="_blank">

                                    <img src="{{ storage_path('app/public/logo.png') }}" title="logo" alt="logo"
                                        style="width:300px;height:50px">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                    style="background:#fff; font-family: 'Poppins', sans-serif;">
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
                                        <td style="padding:0">
                                            <h2
                                                style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                                                Registered Office</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                                <tr>
                                                    @if (!empty($review->forwarding_registered_office_address))
                                                        <h3>Registered Office</h3>
                                                        <ul>
                                                            <li>
                                                                <strong>Address : </strong> London: 52 Danes Court,
                                                                North End Road, Wembley,
                                                                Middlesex, HAQ OAE, United Kingdom
                                                            </li>
                                                        </ul>
                                                        <h3>Forwarding Address</h3>
                                                        <ul>
                                                            <li>
                                                                <strong>Address : </strong>
                                                                {{ $review->officeAddressWithForwAddress->house_number ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->street ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->locality ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->town ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->post_code ?? '' }},
                                                            </li>
                                                        </ul>
                                                    @else
                                                        {{-- <h3>Registered Office</h3>
                                            <ul>
                                                <li><strong>Address : </strong>9 Raglan Court, Empire Way, WEMBLEY, HA9 0RE, SCOTLAND</li>
                                            </ul> --}}
                                                        <h3>Registered Office</h3>
                                                        <ul>
                                                            <li>
                                                                <strong>Address : </strong>
                                                                {{ $review->officeAddressWithForwAddress->house_number ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->street ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->locality ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->town ?? '' }},
                                                                {{ $review->officeAddressWithForwAddress->post_code ?? '' }}
                                                            </li>
                                                        </ul>
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
                                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                            $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                            echo $fullName;
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
                                                            {{ in_array('Director', $positionArray) ? 'Director,' : '' }} {{ in_array('Shareholder', $positionArray) ? 'Shareholder,' : '' }} {{ in_array('Secretary', $positionArray) ? 'Secretary,' : '' }} {{ in_array('PSC', $positionArray) ? 'PSC' : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            Holdings</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                        @if($val['sh_quantity']) {{$val['sh_quantity']}} x ORDINARY at {{$val['sh_pps']}} {{$val['sh_currency']}} @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            DOB</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                            @php
                                                                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                                $dob = $officerDetails['dob_day'];
                                                                echo $dob;
                                                            @endphp</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            Occupation</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                            @php
                                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                            $occupation = $officerDetails['occupation'];
                                                            echo $occupation;
                                                        @endphp</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            Nationality</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                            @php
                                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                            $nationality = $officerDetails['nationality'];
                                                            $nationality_name = \App\Models\Country::where('id',$nationality)->pluck('name')->first();
                                                            echo $nationality_name;
                                                        @endphp</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            Residential Address</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                            @php
                                                                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                                $add_id = $officerDetails['add_id'];
                                                                $address = \App\Models\Address::where('id',$add_id)->first();

                                                            @endphp
                                                            {{$address->house_number ?? ''}},
                                                            {{$address->street ?? ''}},
                                                            {{$address->locality ?? ''}},
                                                            {{$address->town ?? ''}},
                                                            {{$address->country ?? ''}},
                                                            {{$address->post_code ?? ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">
                                                            Service Address</td>
                                                        <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">
                                                            @if (isset($val['own_address_id']))
                                                            @php
                                                                $service_add = \App\Models\Address::where('id',$val['own_address_id'])->first();
                                                                // dd($service_add);

                                                            @endphp
                                                             {{$service_add->house_number ?? ''}},
                                                             {{$service_add->street ?? ''}},
                                                             {{$service_add->locality ?? ''}},
                                                             {{$service_add->town ?? ''}},
                                                             {{$service_add->country ?? ''}},
                                                             {{$service_add->post_code ?? ''}}

                                                        @else
                                                            @php
                                                                $service_add = \App\Models\Address::where('id',$val['forwarding_address_id'])->first();
                                                                // dd($service_add);

                                                             @endphp
                                                            {{$service_add->house_number ?? ''}},
                                                            {{$service_add->street ?? ''}},
                                                            {{$service_add->locality ?? ''}},
                                                            {{$service_add->town ?? ''}},
                                                            {{$service_add->country ?? ''}},
                                                            {{$service_add->post_code ?? ''}}

                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @if (in_array('PSC', $positionArray))

                                                        <tr>
                                                            <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                                                Nature Of Control</td>
                                                            <td style="padding:10px;width: 50%;">
                                                                <p style="padding:0;margin: 0;">{{$val['noc_vr']}} </p>

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
                                                        {{ $review->legal_document == 'generic_article' ? 'Generic Limited by Share Articles' : 'Byspoke article of association' }}
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
                                                Merchant Account</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                                <tr>
                                                    <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                                        Merchant Account</td>
                                                    <td style="padding:10px;width: 50%;">No Merchant Account selected
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

                                    <tr>
                                        <td style="height:30px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0">
                                            <h2
                                                style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                                                Insurance</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                                <tr>
                                                    <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                                        Insurance</td>
                                                    <td style="padding:10px;width: 50%;">No Insurance Product
                                                        selectedts</td>
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
                                                Finance</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                                <tr>
                                                    <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                                        Finance</td>
                                                    <td style="padding:10px;width: 50%;">No Finance Product selected
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
                                                Memberships</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                                <tr>
                                                    <td style="padding:10px; border-right: 1px solid #000;width: 50%;">
                                                        Memberships</td>
                                                    <td style="padding:10px;width: 50%;">No Membership Product selected
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--/100% body table-->
    </body>


<style>
    table {
	page-break-inside: avoid !important;
}
</style>
</html>
