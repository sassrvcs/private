@extends('layouts.app')
@section('content')
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg') }}"></span>
                </div>
                <figcaption>My <span>Account</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="index.html">Home</a></li>
                <li><a>Digital Packages</a></li>
            </ul>
        </div>
        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <div class="icon-container">
                <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg') }}">
            </div>
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
            </div>
        </div>
    </div>
</section>
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="companies-wrap">
            <div class="row woo-account">

                @include('layouts.navbar')

                <div class="MyAccount-content col-md-12">
                    <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">
                        <h3 class="mb-2">FORMATIONSHUNT LTD</h3>
                    </div>
                    <div class="conpany-overview-sec">
                        <div class="conpany-overview-tab-wrap">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Documents</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Company Services</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="Shop-contact-tab" data-toggle="pill" href="#Shop-contact" role="tab" aria-controls="Shop-contact" aria-selected="false">Shop</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="getting-started-tab" data-toggle="pill" href="#getting-started" role="tab" aria-controls="getting-started" aria-selected="false">Getting Started</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="overview-wrap">
                                        <div class="ttl">
                                            <h3>Company Overview</h3>
                                        </div>
                                        <!-- Company Particulars -->
                                        <div class="table-responsivr mb-4">
                                            <table class="table overview-table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4">Company Particulars</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Name :</strong></td>
                                                        <td>{{ $review->companie_name ?? '' }}</td>
                                                        <td></td>
                                                        <td width="167">
                                                            {{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Change Name</button>--}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Number :</strong></td>
                                                        <td>{{ $order->number ?? "-" }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Auth Code :</strong></td>
                                                        <td>{{ $order->auth_code ?? "-" }}</td>
                                                        <td></td>
                                                        <td>
                                                            {{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button>--}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type :</strong></td>
                                                        <td>{{ $review->companie_type ?? '' }}</td>
                                                        <td></td>
                                                        <td>
                                                            {{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button>--}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Jurisdiction :</strong></td>
                                                        <td>{{ $review->jurisdiction->name ?? '' }}</td>
                                                        <td></td>
                                                        <td>
                                                            {{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button>--}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>SIC Codes :</strong></td>
                                                        <td>
                                                            @if ($review->sicCodes->count() > 0)
                                                                {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }}
                                                            @else
                                                                {{-- No data present --}}
                                                            @endif
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            {{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button>--}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Registered Office :</strong></td>

                                                        <td>
                                                            @if (!empty($review->forwarding_registered_office_address))
                                                                <ul>
                                                                    <li>
                                                                        <strong>Address : </strong>  52 Danes Court, North End Road, Wembley,
                                                                        Middlesex, HAQ OAE, United Kingdom
                                                                    </li>
                                                                </ul>
                                                                <span style="margin-top: 2px;"></span>

                                                                <ul>
                                                                    <li>
                                                                        <strong>Forwarding Address : </strong>
                                                                        {{ $review->officeAddressWithForwAddress->house_number ?? '' }},
                                                                        {{ $review->officeAddressWithForwAddress->street ?? '' }},
                                                                        {{ $review->officeAddressWithForwAddress->locality ?? '' }},
                                                                        {{ $review->officeAddressWithForwAddress->town ?? '' }},
                                                                        {{ $review->officeAddressWithForwAddress->post_code ?? '' }},
                                                                    </li>
                                                                </ul>
                                                            @else
                                                                <ul>
                                                                    <li>
                                                                        {{ $review->officeAddressWithoutForwAddress->house_number ?? '' }},
                                                                        {{ $review->officeAddressWithoutForwAddress->street ?? '' }},
                                                                        {{ $review->officeAddressWithoutForwAddress->locality ?? '' }},
                                                                        {{ $review->officeAddressWithoutForwAddress->town ?? '' }},
                                                                        {{ $review->officeAddressWithoutForwAddress->post_code ?? '' }}
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        </td>

                                                        <td></td>
                                                        <td>{{--<button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button>--}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="200"><strong>Confirmation Statement :</strong></td>
                                                        <td><p>15/06/2024</p>All companies are legally required to file an annual Confirmation Statement.
                                                            Avoid missing this deadline by purchasing our filing service (ind. filing fee of
                                                            $13.00).</td>
                                                        <td>$44.00</td>
                                                        <td>{{--<button class="ch-ed-btn">Order</button>--}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Company Accounts -->
                                        <div class="table-responsivr mb-4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4">Company Accounts</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Due :</strong></td>
                                                        <td>16/03/2024</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Made Up To :</strong></td>
                                                        <td>30/06/2023</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Reference Date :</strong></td>
                                                        <td>30th June</td>
                                                        <td></td>
                                                        {{-- <td><button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button></td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Appointments -->
                                        @if (!empty($appointmentsList))
                                            <div class="table-responsivr mb-4">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="6">Appointments</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Officer</strong></td>
                                                            <td><strong>Director</strong></td>
                                                            <td><strong>Shareholder</strong></td>
                                                            <td><strong>Secretary</strong></td>
                                                            <td><strong>PSC</strong></td>
                                                            <td><strong></strong></td>
                                                        </tr>

                                                        @foreach($appointmentsList as $val)
                                                            <tr>
                                                                <td>@php
                                                                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                                    $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                                    if ($officerDetails['first_name']!='' && $officerDetails['last_name']!='') {
                                                                        echo $fullName;
                                                                    }else{
                                                                        echo $officerDetails['legal_name'];
                                                                    }
                                                                @endphp</td>
                                                                @php
                                                                    $positionString = $val['position'];
                                                                    $positionArray = explode(', ', $val['position']);
                                                                @endphp
                                                                <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                        class="{{ in_array('Director', $positionArray) ? '' : 'd-none' }}"
                                                                        alt=""><img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                        class="{{ in_array('Director', $positionArray) ? 'd-none' : '' }}"
                                                                        alt=""></td>
                                                                <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                        class="{{ in_array('Shareholder', $positionArray) ? '' : 'd-none' }}"
                                                                        alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                        class="{{ in_array('Shareholder', $positionArray) ? 'd-none' : '' }}"
                                                                        alt=""></td>
                                                                <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                        class="{{ in_array('Secretary', $positionArray) ? '' : 'd-none' }}"
                                                                        alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                        class="{{ in_array('Secretary', $positionArray) ? 'd-none' : '' }}"
                                                                        alt=""></td>
                                                                <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                        class="{{ in_array('PSC', $positionArray) ? '' : 'd-none' }}"
                                                                        alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                        class="{{ in_array('PSC', $positionArray) ? 'd-none' : '' }}"
                                                                        alt=""></td>
                                                                <td>
                                                                    {{--<div class="tb-btn-wrap d-flex justify-content-end">
                                                                        <a class="edit-btn" href="{{route('person_appointment_edit').'?id='.$val['id'].'&order='.$_GET['order'].'&section=Company_formaction&step=appointments&mode=edit_person_appointment'}}">Edit</a>
                                                                    </div>--}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        {{--<tr>
                                                            <td><strong><img src="assets/images/user-black-icon.svg" alt=""> Amrutaben Patel</strong></td>
                                                            <td><img src="assets/images/green-tick-icon.svg" alt=""></td>
                                                            <td><img src="assets/images/green-tick-icon.svg" alt=""></td>
                                                            <td><img src="assets/images/green-tick-icon.svg" alt=""></td>
                                                            <td><img src="assets/images/green-tick-icon.svg" alt=""></td>
                                                            <td><button class="ch-ed-btn"><img src="assets/images/draw-icon.png" alt=""> Edit</button></td>
                                                        </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{--<div class="overviews-btn-wrap d-flex justify-content-end mb-4">
                                                <button class="btn"><img src="assets/images/new-offer-icon.svg" alt=""> Add New Officer</button>
                                            </div>--}}
                                        @endif

                                        <!-- Company Statement -->
                                        <div class="table-responsivr mb-4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Company Statement</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>No Active Statement</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Linked Statement -->
                                        <div class="table-responsivr mb-4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Linked Statement</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>No Active Statements</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="overviews-btn-wrap d-flex justify-content-end mb-4">
                                            {{-- <button class="btn"><img src="assets/images/statement-icon.svg" alt=""> Add New Statement</button> --}}
                                        </div>

                                        {{--<div class="table-responsivr mb-4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Linked Statement</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>No Active Statements</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>--}}

                                        <!-- Shareholder -->
                                        @if (!empty($appointmentsList))
                                            <div class="table-responsivr">
                                                <table class="table lt-al-table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Shareholder</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Type</strong></td>
                                                            <td><strong>Officer</strong></td>
                                                            <td><strong>Director </strong></td>
                                                        </tr>
                                                        @php
                                                            $idArry = [];
                                                            $listed_idArry = [];
                                                            $pscCheck = 0;
                                                            $directorCheck = 0;
                                                        @endphp
                                                        @foreach ($appointmentsList as $val)
                                                            @php
                                                                array_push($listed_idArry, $val['id']);

                                                                $listed_idStrng = implode(',', $listed_idArry);
                                                                $positionString = $val['position'];
                                                                $positionArray = explode(', ', $val['position']);

                                                                if (in_array('PSC', $positionArray)) {
                                                                    $pscCheck++;
                                                                }
                                                                if (in_array('Director', $positionArray)) {
                                                                    $directorCheck++;
                                                                }

                                                            @endphp
                                                            @if (in_array('Shareholder', $positionArray))
                                                                @php
                                                                    array_push($idArry, $val['id']);
                                                                @endphp
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        @php
                                                                            $officerDetails = officer_details_for_appointments_list($val['person_officer_id']);
                                                                            $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                                            echo $fullName;
                                                                        @endphp
                                                                    </td>
                                                                    <td>{{ isset($val['sh_quantity']) ? $val['sh_quantity'] : '' }}
                                                                        x ORDINARY @
                                                                        {{ isset($val['sh_pps']) ? $val['sh_pps'] : '' }}
                                                                        {{ isset($val['sh_currency']) ? $val['sh_currency'] : '' }}
                                                                        per share
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="overview-wrap">
                                        <div class="ttl">
                                            <h3>Company Overview</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec odio fringilla, finibus leo a, elementum neque. Praesent et dapibus neque, et aliquam dolor. Nulla in dolor et lectus accumsan tristique sed nec erat. Donec dignissim, neque sit amet viverra sollicitudin, enim tellus accumsan sapien.</p>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Company Summary</strong></td>
                                                        <td width="167">
                                                            <button class="ch-ed-btn" onclick="window.location.href='/review/create?order={{$_GET['order']}}&section=Review&step=download'"><img src="assets/images/download-icon.svg" alt="">Download</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Memorandum & Articles (Full Document)</strong></td>
                                                        <td width="167"><button class="ch-ed-btn"><img src="assets/images/download-icon.svg" alt=""> Download</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Memorandum & Articles (Document Only)</strong></td>
                                                        <td width="167"><button class="ch-ed-btn"><img src="assets/images/download-icon.svg" alt=""> Download</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Incorporation Certificate </strong></td>
                                                        <td width="167"><button class="ch-ed-btn"><img src="assets/images/download-icon.svg" alt=""> Download</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Share Certificate</strong></td>
                                                        <td width="167"><button onclick="window.location.href='{{route('generate_certificate',['order'=>$_GET['order'],'c_id'=>$_GET['c_id']])}}'" class="ch-ed-btn"><img src="assets/images/download-icon.svg" alt=""> Download</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>E-filing information</strong></td>
                                                        <td width="167">
                                                            <button class="ch-ed-btn" onclick="window.location.href='{{route('efilling_pdf').'?order='.$_GET['order']}}'"><img src="assets/images/download-icon.svg" alt="">Download</button>
                                                            {{-- <a target="blank" href="{{route('efilling_pdf').'?order='.$_GET['order']}}" class="ch-ed-btn"><img src="assets/images/download-icon.svg" alt="">Download</a> --}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="overview-wrap">
                                        <div class="ttl">
                                            <h3>Company Services</h3>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Active Services</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>No Active Services on File</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="ttl">
                                            <h3>Buy New Services</h3>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table thead-table">
                                                <thead>
                                                    <tr>
                                                        <th>Officer Service Address</th>
                                                        <th>Price</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="400">Service Address - London - Amrutaben Patel </td>
                                                        <td>$26.00 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Partners’ Service Address - Amrutaben Patel</td>
                                                        <td>$26.00 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table thead-table">
                                                <thead>
                                                    <tr>
                                                        <th width="400">Registered Office Services</th>
                                                        <th>Price</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Registered Office - London</td>
                                                        <td>$39.00 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table thead-table">
                                                <thead>
                                                    <tr>
                                                        <th>Mail Forwarding</th>
                                                        <th>Price</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="400">Business Address (Post)</td>
                                                        <td>$96.00 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsivr mb-4">
                                            <table class="table thead-table">
                                                <thead>
                                                    <tr>
                                                        <th>Standard Service</th>
                                                        <th>Price</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="400">Business Telephone Number (pay monthly)</td>
                                                        <td>$6.00 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Business Telephone Number (pay annually)</td>
                                                        <td>$59.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call Answering + Business Telephone Number (pay monthly)</td>
                                                        <td>$29.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Confirmation Statement Filing Service</td>
                                                        <td>$44.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dormant Company Accounts</td>
                                                        <td>$49.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call Answering + Business Telephone Number (pay annually)</td>
                                                        <td>$199.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ICO Registration Service</td>
                                                        <td>$79.99 per year</td>
                                                        <td><button class="ch-ed-btn"><img src="assets/images/add-plus-icom.svg" alt=""> Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Shop-contact" role="tabpanel" aria-labelledby="Shop-contact-tab">D</div>
                                <div class="tab-pane fade" id="getting-started" role="tabpanel" aria-labelledby="getting-started-tab">E</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
