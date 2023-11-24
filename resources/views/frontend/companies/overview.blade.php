@extends('layouts.app')
@section('content')
    <section class="common-inner-page-banner"
        style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">
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
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <li><a href="/">Home</a></li>
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
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                            role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                            role="tab" aria-controls="pills-profile" aria-selected="false">Documents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                            role="tab" aria-controls="pills-contact" aria-selected="false">Company
                                            Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Shop-contact-tab" data-toggle="pill" href="#Shop-contact"
                                            role="tab" aria-controls="Shop-contact" aria-selected="false">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="getting-started-tab" data-toggle="pill"
                                            href="#getting-started" role="tab" aria-controls="getting-started"
                                            aria-selected="false">Getting Started</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
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
                                                                <button class="ch-ed-btn"><img
                                                                        src="assets/images/draw-icon.png" alt="">
                                                                    Change Name</button>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td><strong>Number :</strong></td>
                                                            <td>{{ $order->company_number ?? '-' }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Auth Code :</strong></td>
                                                            <td>{{ $order->auth_code ?? '-' }}</td>
                                                            <td></td>
                                                            <td>
                                                                <button class="ch-ed-btn" data-toggle="modal"
                                                                    data-target="#openAuthCode"><img
                                                                        src="assets/images/draw-icon.png" alt="">
                                                                    Edit</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Type :</strong></td>
                                                            <td>{{ $review->companie_type ?? '' }}</td>
                                                            <td></td>

                                                        </tr>
                                                        <tr>
                                                            <td><strong>Jurisdiction :</strong></td>
                                                            <td>{{ $review->jurisdiction->name ?? '' }}</td>
                                                            <td></td>

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

                                                        </tr>
                                                        <tr>
                                                            <td><strong>Registered Office :</strong></td>

                                                            <td>
                                                                @if (!empty($review->forwarding_registered_office_address))
                                                                    <ul>
                                                                        <li>
                                                                            <strong>Address : </strong> 52 Danes Court,
                                                                            North End Road, Wembley,
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
                                                            <td><button class="ch-ed-btn" data-toggle="modal"
                                                                    data-target="#openRegisterOfficeAddress"><img
                                                                        src="assets/images/draw-icon.png" alt="">
                                                                    Edit</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="200"><strong>Confirmation Statement :</strong>
                                                            </td>
                                                            <td>
                                                                <p>{{$review->due_date}}</p>All companies are legally required to file
                                                                an annual Confirmation Statement.
                                                                Avoid missing this deadline by purchasing our filing service
                                                                (ind. filing fee of
                                                                $13.00).
                                                            </td>
                                                            <td>$44.00</td>
                                                            <td><button class="ch-ed-btn">Order</button></td>
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
                                                            <td>{{$review->due_date}}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Made Up To :</strong></td>
                                                            <td>{{$review->made_upto}}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Reference Date :</strong></td>
                                                            <td>30th June</td>
                                                            <td></td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/draw-icon.png" alt="">
                                                                    Edit</button></td>
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

                                                            @foreach ($appointmentsList as $val)
                                                                <tr>
                                                                    <td>@php
                                                                        $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                                                                        $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                                        if ($officerDetails['first_name'] != '' && $officerDetails['last_name'] != '') {
                                                                            echo $fullName;
                                                                        } else {
                                                                            echo $officerDetails['legal_name'];
                                                                        }
                                                                    @endphp</td>
                                                                    @php
                                                                        $positionString = $val['position'];
                                                                        $positionArray = explode(', ', $val['position']);
                                                                    @endphp
                                                                    <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                            class="{{ in_array('Director', $positionArray) ? '' : 'd-none' }}"
                                                                            alt=""><img
                                                                            src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                            class="{{ in_array('Director', $positionArray) ? 'd-none' : '' }}"
                                                                            alt=""></td>
                                                                    <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                            class="{{ in_array('Shareholder', $positionArray) ? '' : 'd-none' }}"
                                                                            alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                            class="{{ in_array('Shareholder', $positionArray) ? 'd-none' : '' }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                            class="{{ in_array('Secretary', $positionArray) ? '' : 'd-none' }}"
                                                                            alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                            class="{{ in_array('Secretary', $positionArray) ? 'd-none' : '' }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                            class="{{ in_array('PSC', $positionArray) ? '' : 'd-none' }}"
                                                                            alt="">
                                                                        <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                            class="{{ in_array('PSC', $positionArray) ? 'd-none' : '' }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="tb-btn-wrap d-flex justify-content-end">
                                                                            <a class="edit-btn"
                                                                                href="{{ route('person_appointment_edit') . '?id=' . $val['id'] . '&order=' . $_GET['order'] . '&section=Company_formaction&step=appointments&mode=edit_person_appointment' }}">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="overviews-btn-wrap d-flex justify-content-end mb-4">
                                                    <button class="btn"><img src="assets/images/new-offer-icon.svg"
                                                            alt=""> Add New Officer</button>
                                                </div>
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
                                                <button class="btn"><img src="assets/images/statement-icon.svg"
                                                        alt=""> Add New Statement</button>
                                            </div>



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
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="overview-wrap">
                                            <div class="ttl">
                                                <h3>Company Overview</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec odio
                                                    fringilla, finibus leo a, elementum neque. Praesent et dapibus neque, et
                                                    aliquam dolor. Nulla in dolor et lectus accumsan tristique sed nec erat.
                                                    Donec dignissim, neque sit amet viverra sollicitudin, enim tellus
                                                    accumsan sapien.</p>
                                            </div>
                                            <div class="table-responsivr mb-4">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Company Summary</strong></td>
                                                            <td width="167">
                                                                <button class="ch-ed-btn"
                                                                    onclick="window.location.href='/review/create?order={{ $_GET['order'] }}&section=Review&step=download'"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt="">Download</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Memorandum & Articles (Full Document)</strong></td>
                                                            <td width="167"><button class="ch-ed-btn"
                                                                    onclick="window.location.href='{{ route('memoArticlesFull', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt=""> Download</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Memorandum & Articles (Document Only)</strong></td>
                                                            <td width="167"><button class="ch-ed-btn"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt=""> Download</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Incorporation Certificate </strong></td>
                                                            <td width="167">
                                                                @if ($pdfcontent)
                                                                    <button class="ch-ed-btn"
                                                                        onclick="window.location.href='{{ route('incorporate_certificate', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'">
                                                                    @else
                                                                        <button class="ch-ed-btn"
                                                                            onclick="alert('Certificate isn`t prepared for this company yet, please try after some time')">
                                                                @endif

                                                                <img src="assets/images/download-icon.svg" alt="">
                                                                Download</button>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td><strong>Share Certificate</strong></td>
                                                            <td width="167"><button
                                                                    onclick="window.location.href='{{ route('generate_certificate', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"
                                                                    class="ch-ed-btn"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt=""> Download</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>E-filing information</strong></td>
                                                            <td width="167">
                                                                <button class="ch-ed-btn"
                                                                    onclick="window.location.href='{{ route('efilling_pdf', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt="">Download</button>
                                                                <a target="blank"
                                                                    href="{{ route('efilling_pdf') . '?order=' . $_GET['order'] }}"
                                                                    class="ch-ed-btn"><img
                                                                        src="assets/images/download-icon.svg"
                                                                        alt="">Download</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
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
                                                            <td width="400">Service Address - London - Amrutaben Patel
                                                            </td>
                                                            <td>$26.00 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Partners’ Service Address - Amrutaben Patel</td>
                                                            <td>$26.00 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
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
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
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
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
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
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Business Telephone Number (pay annually)</td>
                                                            <td>$59.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Call Answering + Business Telephone Number (pay monthly)
                                                            </td>
                                                            <td>$29.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Confirmation Statement Filing Service</td>
                                                            <td>$44.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dormant Company Accounts</td>
                                                            <td>$49.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Call Answering + Business Telephone Number (pay annually)
                                                            </td>
                                                            <td>$199.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ICO Registration Service</td>
                                                            <td>$79.99 per year</td>
                                                            <td><button class="ch-ed-btn"><img
                                                                        src="assets/images/add-plus-icom.svg"
                                                                        alt=""> Add</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Shop-contact" role="tabpanel"
                                        aria-labelledby="Shop-contact-tab">D</div>
                                    <div class="tab-pane fade" id="getting-started" role="tabpanel"
                                        aria-labelledby="getting-started-tab">E</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Open Modal For Auth code Edit -->
        <div class="modal fade modal-particular" id="openAuthCode" tabindex="-1" role="dialog"
            aria-labelledby="openAuthCodeTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Edit Authentication Code</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="ef-auth-modal-input">
                            <p>
                                <input type="text" class="efTextInput js-updated-auth-code form-control"
                                    data-inc-id="2291111" value="{{ $order->auth_code ?? '' }}" required>
                            </p>
                            <p>
                                <button
                                    class="efButton ui-button ui-widget js-save-auth-code ui-state-default ui-corner-all ui-button-text-only"
                                    role="button" aria-disabled="false"><span
                                        class="ui-button-text">Save</span></button>
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Open Modal for -->

        <!-- <div class="modal fade modal-particular" id="openRegisterOfficeAddress" tabindex="-1" role="dialog"
            aria-labelledby="openRegisterOfficeAddressTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Change Registered Office</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-10 col-sm-12">
                            <div class="used-addresses-panel">
                                <div class="text">
                                    <p>40 new add,North,,Wembley,Greater London,ha90ae
                                    </p>
                                </div>
                                <div class="btn-wrap">
                                    <button type="submit" class="btn" onclick="editAddress('103')"
                                        fdprocessedid="2vnv9j">Edit</button>
                                    <input type="hidden" class="103_add_id" value="103">
                                    <input type="hidden" class="103_add_house_number" value="40 new add">
                                    <input type="hidden" class="103_add_street" value="North">
                                    <input type="hidden" class="103_add_locality" value="">
                                    <input type="hidden" class="103_add_town" value="Wembley">
                                    <input type="hidden" class="103_user_county" value="Greater London">
                                    <input type="hidden" class="103_address_post_code" value="ha90ae">
                                    <input type="hidden" class="103_address_billing_country" value="72">

                                    <button type="button" class="btn select-btn selc-addr"
                                        onclick="setAddress(270859,103)" fdprocessedid="rj9ii">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="used-addresses-panel">
                                <div class="text">
                                    <p>40 new add,North,,Wembley,Greater London,ha90ae
                                    </p>
                                </div>
                                <div class="btn-wrap">
                                    <button type="submit" class="btn" onclick="editAddress('103')"
                                        fdprocessedid="2vnv9j">Edit</button>
                                    <input type="hidden" class="103_add_id" value="103">
                                    <input type="hidden" class="103_add_house_number" value="40 new add">
                                    <input type="hidden" class="103_add_street" value="North">
                                    <input type="hidden" class="103_add_locality" value="">
                                    <input type="hidden" class="103_add_town" value="Wembley">
                                    <input type="hidden" class="103_user_county" value="Greater London">
                                    <input type="hidden" class="103_address_post_code" value="ha90ae">
                                    <input type="hidden" class="103_address_billing_country" value="72">

                                    <button type="button" class="btn select-btn selc-addr"
                                        onclick="setAddress(270859,103)" fdprocessedid="rj9ii">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="used-addresses-panel">
                                <div class="text">
                                    <p>40 new add,North,,Wembley,Greater London,ha90ae
                                    </p>
                                </div>
                                <div class="btn-wrap">
                                    <button type="submit" class="btn" onclick="editAddress('103')"
                                        fdprocessedid="2vnv9j">Edit</button>
                                    <input type="hidden" class="103_add_id" value="103">
                                    <input type="hidden" class="103_add_house_number" value="40 new add">
                                    <input type="hidden" class="103_add_street" value="North">
                                    <input type="hidden" class="103_add_locality" value="">
                                    <input type="hidden" class="103_add_town" value="Wembley">
                                    <input type="hidden" class="103_user_county" value="Greater London">
                                    <input type="hidden" class="103_address_post_code" value="ha90ae">
                                    <input type="hidden" class="103_address_billing_country" value="72">

                                    <button type="button" class="btn select-btn selc-addr"
                                        onclick="setAddress(270859,103)" fdprocessedid="rj9ii">Select</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            New Address
                            <div class="col-md-10 col-sm-12">
                                <div class="used-addresses-panel">
                                    <div class="text">
                                        <p>40 new add,North,,Wembley,Greater London,ha90ae
                                        </p>
                                    </div>
                                    <div class="btn-wrap">
                                        <button type="submit" class="btn" onclick="editAddress('103')"
                                            fdprocessedid="2vnv9j">Edit</button>
                                        <input type="hidden" class="103_add_id" value="103">
                                        <input type="hidden" class="103_add_house_number" value="40 new add">
                                        <input type="hidden" class="103_add_street" value="North">
                                        <input type="hidden" class="103_add_locality" value="">
                                        <input type="hidden" class="103_add_town" value="Wembley">
                                        <input type="hidden" class="103_user_county" value="Greater London">
                                        <input type="hidden" class="103_address_post_code" value="ha90ae">
                                        <input type="hidden" class="103_address_billing_country" value="72">

                                        <button type="button" class="btn select-btn selc-addr"
                                            onclick="setAddress(270859,103)" fdprocessedid="rj9ii">Choose Another</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="modal fade modal-particular" id="openRegisterOfficeAddress" tabindex="-1" role="dialog"
            aria-labelledby="openRegisterOfficeAddressTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Change Registered Office</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-10 col-sm-12">
                            @foreach($purchase_address as $address)
                                <div class="used-addresses-panel addr_{{ $address->id }}">
                                    <div class="text">
                                        <p>{{ $address->title }}</p>
                                        <p>Price: {{ $address->price }}</p>
                                    </div>
                                    <div class="btn-wrap">
                                        <input type="radio" id="address{{ $address->id }}" name="selectedAddress" value="{{ $address->id }}">
                                        <input type="hidden" class="103_add_id" value="103">
                                        <input type="hidden" class="103_add_house_number" value="40 new add">
                                        <input type="hidden" class="103_add_street" value="North">
                                        <input type="hidden" class="103_add_locality" value="">
                                        <input type="hidden" class="103_add_town" value="Wembley">
                                        <input type="hidden" class="103_user_county" value="Greater London">
                                        <input type="hidden" class="103_address_post_code" value="ha90ae">
                                        <input type="hidden" class="103_address_billing_country" value="72">
                                        <label for="address{{ $address->id }}" class="btn select-btn selc-addr" fdprocessedid="rj9i{{ $address->id }}">Select</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="used-addresses-panel">
                                <div class="text">
                                    <p>Choose Another</p>
                                </div>
                                <div class="btn-wrap">
                                    <input type="radio" id="address105" name="selectedAddress" value="0">
                                    <label for="address105" class="btn select-btn selc-addr"
                                         fdprocessedid="rj9ik">Select</label>
                                </div>
                            </div>
                        </div>

                        <div class="new-address-section" style="display: none;">
                            New Address
                            <div class="col-md-10 col-sm-12">
                                <div class="used-addresses-panel">
                                    <div class="text">
                                        <p id="selectedAddressDisplay"></p>
                                    </div>
                                    <div class="btn-wrap">
                                        <input type="hidden" class="103_add_id" value="103">
                                        <input type="hidden" class="103_add_house_number" value="40 new add">
                                        <input type="hidden" class="103_add_street" value="North">
                                        <input type="hidden" class="103_add_locality" value="">
                                        <input type="hidden" class="103_add_town" value="Wembley">
                                        <input type="hidden" class="103_user_county" value="Greater London">
                                        <input type="hidden" class="103_address_post_code" value="ha90ae">
                                        <input type="hidden" class="103_address_billing_country" value="72">

                                        <button type="button" class="btn select-btn selc-addr"
                                        id="chooseAddressButton" fdprocessedid="rj9ii">Choose Another</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal-s1" id="choosePrimaryAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="choose_addr">
                            <h3>Recently Used Addresses</h3>
                            <div class="current_address_grp">
                            @foreach($primary_address_list as $key => $value)
                                <div class="addr_wrap">
                                    <p>
                                        @if($value['house_number']) {{ $value['house_number']}},@endif
                                        @if($value['street']) {{$value['street']}}, @endif
                                        @if($value['locality']) {{$value['locality']}}, @endif
                                        @if($value['town']) {{ $value['town']}}, @endif
                                        {{ $value['county']}}
                                    </p>
                                    <p>{{ $value['country_name']}},{{ $value['post_code']}}</p>
                                </div>
                                <div class="button_select">
                                    <input type="hidden" class="address-house-number" value="{{ $value['house_number']}}">
                                    <input type="hidden" class="address-street" value="{{ $value['street']}}">
                                    <input type="hidden" class="address-locality" value="{{ $value['locality']}}">
                                    <input type="hidden" class="address-town" value="{{ $value['town']}}">
                                    <input type="hidden" class="address-county" value="{{ $value['county']}}">
                                    <input type="hidden" class="address-post-code" value="{{ $value['post_code']}}">
                                    <input type="hidden" class="address-country-name" value="{{ $value['country_name']}}">
                                    <button class="btn btn-primary select-address" data-dismiss="modal" type="button">Select</button>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary addNewAddress" data-dismiss="modal">Add new address</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal-s1" id="addNewAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3" style="padding-top: 0 !important;">
                            <div class="form-row form-group">
                                <label>Post Code:</label>
                                <div class="input-wrapper with-rg-btn">
                                    <input type="text" class="form-control" name="post_code" id="post_code">
                                    <button type="button" class="btn btn-primary" id="findAddress">Find
                                        Address</button>
                                </div>
                                <p class="adderr text-danger"></p>
                            </div>
                        <form class="billingAddrUpdateForm formInputModal" >
                            <div class="form-row form-group ">
                                <label>House Name / Number: &nbsp;<span class="optional">
                                    </span>
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" id="house_no" name="house_no" class="input-text form-control house_no" value={{old('house_no')}}>
                                </span>
                            </div>
                            <div class="form-row form-group ">
                                <label for="billing_title">Street:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="street" id="street" class="input-text form-control steet_no @error('street') is-invalid @enderror" value={{old('street')}}>
                                </span>
                                @error('street')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="locality">Locality:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="locality" id="locality" class="input-text form-control locality @error('locality') is-invalid @enderror" value={{old('locality')}}>
                                </span>
                                @error('locality')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="town">Town:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="town" id="town" class="input-text form-control town @error('town') is-invalid @enderror" value={{old('town')}}>
                                </span>
                                @error('town')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="county">County:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="county" id="county" class="input-text form-control county @error('county') is-invalid @enderror" value="{{ old('county')}}">
                                </span>
                                @error('country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="billing_first_name">Post Code:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="post_code" id="zip" class="input-text form-control zip @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                                </span>
                                @error('post_code')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row update_totals_on_change form-group">
                                <label for="billing_country">Country&nbsp;</label>
                                <span class="input-wrapper">
                                    <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                        <option value="">Select a country / region…</option>
                                        <option value="236" selected>United Kingdom</option>
                                        @foreach ($countryList as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                @error('billing_country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" class="address_type" name="address_type" value="primary_address">
                            <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="saveAddr">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal custom-modal-s1" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                        <button type="button" class="btn-close btn-address"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div id="post_address_blk">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var demoRadios = $('[name="selectedAddress"]');
            var newAddressSection = $('.new-address-section');
            var selectedAddressDisplay = $('#selectedAddressDisplay');

            function toggleNewAddressSection() {
                if (demoRadios.is(':checked')) {

                    var selectedRadio = demoRadios.filter(':checked');
                    newAddressSection.show();

                    if (selectedRadio.val() === '0') {
                        selectedAddressDisplay.text('');
                    } else {
                        var selectedAddressDetails = {
                            house_number: '{{ @$address->house_number }}',
                            street: '{{ @$address->street }}',
                            locality: '{{ @$address->locality }}',
                            town: '{{ @$address->town }}',
                            county: '{{ @$address->county }}',
                            billing_country: '{{ @$address->billing_country }}',
                            post_code: '{{ @$address->post_code }}',
                        };

                        // Construct the address text
                        var addressText = `${selectedAddressDetails.house_number ? selectedAddressDetails.house_number + ',' : ''}
                                            ${selectedAddressDetails.street ? selectedAddressDetails.street + ',' : ''}
                                            ${selectedAddressDetails.locality ? selectedAddressDetails.locality + ',' : ''}
                                            ${selectedAddressDetails.town ? selectedAddressDetails.town + ',' : ''}
                                            ${selectedAddressDetails.county}
                                            ${selectedAddressDetails.billing_country ? ',' + selectedAddressDetails.billing_country : ''}
                                            ${selectedAddressDetails.post_code}`;

                        // Set the text in the selectedAddressDisplay paragraph
                        selectedAddressDisplay.text(addressText);
                    }
                } else {
                    newAddressSection.hide();
                    selectedAddressDisplay.text('');
                }
            }

            // Attach the change event to all radio buttons with the name "selectedAddress"
            demoRadios.on('change', toggleNewAddressSection);

            // Trigger the change event on page load
            toggleNewAddressSection();

            // Show the choosePrimaryAddressModal on button click using Bootstrap's modal method
            $('#chooseAddressButton').on('click', function () {
                $('#choosePrimaryAddressModal').modal('show');
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var chooseAddressButton = document.getElementById("chooseAddressButton");
            var choosePrimaryAddressModal = new bootstrap.Modal(document.getElementById('choosePrimaryAddressModal'));

            chooseAddressButton.addEventListener("click", function () {
                choosePrimaryAddressModal.show();
            });
        });

        $(document).ready(function () {
            $(".addNewAddress").click(function(){
                    // $('.address_type').val('primary_address');
                    $('#addNewAddressModal').modal('show');
            });
        });

        $('.select-address').click(function() {
            var selectedAddressDetails = {
                houseNumber: $(this).siblings('.address-house-number').val(),
                street: $(this).siblings('.address-street').val(),
                locality: $(this).siblings('.address-locality').val(),
                town: $(this).siblings('.address-town').val(),
                county: $(this).siblings('.address-county').val(),
                postCode: $(this).siblings('.address-post-code').val(),
                countryName: $(this).siblings('.address-country-name').val()
            };

            var addressText = `${selectedAddressDetails.houseNumber ? selectedAddressDetails.houseNumber + ',' : ''}
                            ${selectedAddressDetails.street ? selectedAddressDetails.street + ',' : ''}
                            ${selectedAddressDetails.locality ? selectedAddressDetails.locality + ',' : ''}
                            ${selectedAddressDetails.town ? selectedAddressDetails.town + ',' : ''}
                            ${selectedAddressDetails.county}
                            ${selectedAddressDetails.countryName ? ',' + selectedAddressDetails.countryName : ''}
                            ${selectedAddressDetails.postCode}`;

            $('#selectedAddressDisplay').text(addressText);
            $('.new-address-section').show();
        });

        $('#findAddress').click(function(){
            var post_code = $("#post_code").val();
            console.log(post_code);
            if(post_code==""){
                $('.adderr').html('Please enter zipcode');
                return false ;
            }else{
                $('#zip').val(post_code);
                $('.adderr').html('');
            }
            $('#findAddress').html('Please Wait...');
            $.ajax({
                url: "{!! route('find-address') !!}",
                type: 'GET',
                data: {
                    post_code: post_code
                },
                success: function(result) {
                    console.log('result',result);
                    if(result!=''){
                        $("#exampleModalCenterAddress").show();
                        $("#post_address_blk").html(result);
                        $('#findAddress').html('Find Address');

                    }else{
                        alert('No Record Found! Choose another.');
                        $('#findAddress').html('Find Address');

                    }

                },
                error: function(){
                    alert('No Record Found! Choose another.');
                        $('#findAddress').html('Find Address');
                }
            });
        });

        $("#saveAddr").click(function() {
            $(".loader").show();
            // Validation
            $(".formInputModal").each(function() {
                var number   = $(this).find(".house_no").val();
                var steet    = $(this).find(".steet_no").val();
                var locality = $(this).find(".locality").val();
                var town     = $(this).find(".town").val();
                var county   = $(this).find(".county").val();
                if(county==undefined){
                    county ="";
                }

                var postcode = $(this).find(".zip").val();
                var contry   = $(this).find(".contry").val();
                var address_type = $(this).find(".address_type").val();
                var user_id   = $(this).find(".user_id").val();
                //alert(number+steet+locality+town+postcode+contry+address_type+user_id);
                if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
                    //alert(number+"---"+address_type);
                    $.ajax({
                        url: "{!! route('new-address-save') !!}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number,
                            steet:steet,
                            locality:locality,
                            town:town,
                            county:county,
                            postcode:postcode,
                            contry:contry,
                            address_type:address_type,
                            user_id:user_id
                        },
                        success: function(result) {
                        $("#addNewAddressModal").modal('hide');
                        setTimeout(function () {
                            $(".loader").hide();
                            location.reload(true);
                        }, 2500);
                        }
                    });
                }

            });
        });
    </script>
@endsection
