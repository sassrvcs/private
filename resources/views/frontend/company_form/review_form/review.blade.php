@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Include Inner Header View --}}
    @include('layouts.inner_header')
    {{-- Additional CSS for now --}}
    <style>
        ul.ef-16-benefits-list {
            list-style: inside;
        }

        .terms-condition {
            cursor: pointer;
        }
    </style>
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">
                    @include('layouts.navbar')
                    <div class="col-md-12">
                        <div class="particulars-form-wrap">
                            <div class="particulars-top-step">
                                <div class="top-step-items">
                                    <a
                                        href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}">
                                        <strong>1.Company Formation</strong>
                                        <span>Details about your company</span>
                                    </a>
                                </div>
                                <div class="top-step-items">
                                    <strong>2.Business Essentials</strong>
                                    <span>Products & Services</span>
                                </div>
                                <div class="top-step-items active">
                                    <strong>3.Summary</strong>
                                    <span>Details about your order</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>4.Delivery & Partner Services</strong>
                                    <span>Delivery & Partner Details</span>
                                </div>
                            </div>
                            <div class="particulars-bottom-step justify-content-start">
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>Review</p>
                                </div>
                            </div>

                            <div class="review-sec mt-4">
                                <h4 class="form-ttl">Review</h4>
                                <div class="review-ttl-block">
                                    <h5>Company Formation</h5>
                                    <div class="rt-side">
                                        <span>
                                            <a
                                                href="{{ route('review.create', ['order' => $_GET['order'] ?? '', 'section' => 'Review', 'step' => 'download']) }}">Download
                                                Summary </a>
                                        </span>

                                        <a href="#" onclick="saveNext({{$_GET['order']}},event)"><button class="btn">Save &
                                                Continue</button></a>
                                    </div>
                                </div>
                                <div class="review-panel">
                                    <h3>Particulars</h3>
                                    <ul>
                                        <li><strong>Company Name : </strong>{{ $review->companie_name }}</li>
                                        <li><strong>Company Type : </strong>{{ $review->companie_type }}</li>
                                        <li><strong>Jurisdiction : </strong>{{ $review->jurisdiction->name }}</li>
                                        <li><strong>SIC Codes : </strong>
                                            @if ($review->sicCodes->count() > 0)
                                                {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }}
                                            @else
                                                {{-- No data present --}}
                                            @endif
                                            {{-- {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }} --}}
                                            {{-- Building Societies --}}
                                        </li>
                                    </ul>
                                    <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <div class="review-panel">
                                    @if (!empty($review->forwarding_registered_office_address))
                                        <h3>Registered Office</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>  52 Danes Court, North End Road, Wembley,
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
                                                {{ $review->officeAddressWithoutForwAddress->house_number ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->street ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->locality ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->town ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->post_code ?? '' }}
                                            </li>
                                        </ul>
                                    @endif
                                    <a href="{{ route('registered-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <div class="review-panel">

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
                                                {{ $review->businessAddressWithForwAddress->house_number ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->street ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->locality ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->town ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->post_code ?? '' }},
                                            </li>
                                        </ul>
                                    @else
                                        {{-- <h3>Registered Office</h3>
                                    <ul>
                                        <li><strong>Address : </strong>9 Raglan Court, Empire Way, WEMBLEY, HA9 0RE, SCOTLAND</li>
                                    </ul> --}}

                                        <h3>Buisness Address</h3>
                                        @if($review->business_address)
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>
                                                {{ $review->businessAddressWithoutForwAddress->house_number ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->street ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->locality ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->town ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->post_code ?? '' }}
                                            </li>
                                        </ul>
                                        @endif
                                    @endif

                                    <a href="{{ route('choose-address-business', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'business-address']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <div class="review-panel">
                                    <h3>Appointments</h3>
                                    @foreach ($appointmentsList as $val)


                                    <ul>
                                        <li><strong>Name : </strong><span style="text-transform:uppercase;">@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                            echo $fullName;
                                        @endphp</span> </li>
                                        @php
                                            $positionString = $val['position'];
                                            $positionArray = explode(', ', $val['position']);
                                        @endphp
                                        <li><strong>Roles : </strong>{{ in_array('Director', $positionArray) ? 'Director,' : '' }} {{ in_array('Shareholder', $positionArray) ? 'Shareholder,' : '' }} {{ in_array('Secretary', $positionArray) ? 'Secretary,' : '' }} {{ in_array('PSC', $positionArray) ? 'PSC' : '' }}</li>
                                        <li><strong>Holdings : </strong>@if($val['sh_quantity']) {{$val['sh_quantity']}} x ORDINARY at {{$val['sh_pps']}} {{$val['sh_currency']}} @endif</li>
                                        <li><strong>DOB : </strong>@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $dob = $officerDetails['dob_day'];
                                            echo $dob;
                                        @endphp</li>
                                        <li><strong>Occupation : </strong>@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $occupation = $officerDetails['occupation'];
                                            echo $occupation;
                                        @endphp</li>
                                        <li><strong>Nationality : </strong>
                                        @php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $nationality = $officerDetails['nationality'];
                                            $nationality_name = \App\Models\Country::where('id',$nationality)->pluck('name')->first();
                                            echo $nationality_name;
                                        @endphp</li>
                                        <li><strong>Residential Address : </strong> @php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $add_id = $officerDetails['add_id'];
                                            $address = \App\Models\Address::where('id',$add_id)->first();

                                        @endphp
                                        {{$address->house_number ?? ''}},
                                        {{$address->street ?? ''}},
                                        {{$address->locality ?? ''}},
                                        {{$address->town ?? ''}},
                                        {{$address->country ?? ''}},
                                        {{$address->post_code ?? ''}}
                                        </li>
                                        <li><strong>Service Address : </strong>
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

                                        </li>
                                        @if (in_array('PSC', $positionArray))

                                            <li><strong>Name Of Control : </strong> {{$val['noc_vr']}} </li>
                                        @endif

                                    </ul>
                                    @endforeach


                                    <a href="{{  route('appointments', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'appointments']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <div class="review-panel">
                                    <h3>Documents</h3>
                                    <ul>
                                        {{-- Generic Limited by Shares Articles --}}
                                        <li>
                                            <strong>Memorandum and Articles : </strong>
                                            {{ $review->legal_document == 'generic_article' ? 'Generic Limited by Share Articles' : 'Byspoke article of association' }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'document']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <hr class="mb-4">
                                <h6>Business Account</h6>
                                <div class="review-panel">
                                    <p>{{ $review->businessBanking->businessBanking->title ?? 'No Merchant Account Selected' }}
                                    </p>
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <h6>Merchant Account</h6>
                                <div class="review-panel">
                                    <p>No Merchant Account Selected</p>
                                    <button class="btn">Edit</button>
                                </div>
                                <h6>Accounting Software</h6>
                                <div class="review-panel">
                                    <p>{{ $review->businessBanking->accountingSoftware->accounting_software_name ?? 'No Accounting Software Product Selected' }}
                                    </p>
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}"
                                        class="btn">Edit</a>
                                </div>
                                <h6>Insurance</h6>
                                <div class="review-panel">
                                    <p>No Insurance Product Selected</p>
                                    <button class="btn">Edit</button>
                                </div>
                                <h6>Memberships</h6>
                                <div class="review-panel">
                                    <p>No Membership Product Selected</p>
                                    <button class="btn">Edit</button>
                                </div>
                            </div>
                            <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'optional-extras']) }}"
                                    class="btn prev-btn"><img
                                        src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt="">
                                    Previous : Optional Extras</a>
                                {{-- <a href="{{ route('delivery-partner.index', ['order' => $_GET['order'] ?? '', 'section' => 'Deliver_Part', 'step' => 'download']) }}"><button class="btn">Save & Continue</button></a> --}}
                                <a href="#" onclick="saveNext({{$_GET['order']}},event)"><button class="btn">Save & Continue</button></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        function saveNext(order,e){
            e.preventDefault();

            $order_id = {{$_GET['order']}};

                console.log('Under Save Success',$order_id);

                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ url('review-step') }}",
                data : {
                    'order_id': $order_id
                },
                type : 'POST',
                dataType : 'json',
                success : function(result){

                    window.location.href = "{!! route('delivery-partner.index', ['order' => $_GET['order'] ?? '', 'section' => 'Deliver_Partner', 'step' => 'deliver_partner']) !!}"


                          }
                 });
        }
    </script>

@endsection
