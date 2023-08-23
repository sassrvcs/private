@extends('layouts.master')
@section('content')
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
                                <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}" >
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
                                        <a href="{{ route('review.create', ['order' => $_GET['order'] ?? '', 'section' => 'Review', 'step' => 'download']) }}">Download Summary </a>
                                    </span>

                                  <a href="{{ route('delivery-partner.index', ['order' => $_GET['order'] ?? '', 'section' => 'Deliver_Part', 'step' => 'download']) }}"><button class="btn">Save & Continue</button></a>
                                </div>
                            </div>
                            <div class="review-panel">
                                <h3>Particulars</h3>
                                <ul>
                                    <li><strong>Company Name : </strong>{{$review->companie_name}}</li>
                                    <li><strong>Company Type : </strong>{{$review->companie_type}}</li>
                                    <li><strong>Jurisdiction : </strong>{{$review->jurisdiction->name}}</li>
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
                                <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}" class="btn">Edit</a>
                            </div>
                            <div class="review-panel">
                                @if(!empty($review->forwarding_registered_office_address))
                                    <h3>Registered Office</h3>
                                    <ul>
                                        <li>
                                            <strong>Address : </strong> London: 52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United Kingdom
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
                                <a href="{{ route('registered-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" class="btn">Edit</a>
                            </div>
                            <div class="review-panel">
                                <h3>Appointments</h3>
                                <ul>
                                    <li><strong>Name : </strong>John Devid</li>
                                    <li><strong>Roles :  </strong>Director, Shareholder, Secretary</li>
                                    <li><strong>Holdings : </strong>1 x ORDINARY at 1.00 GBP</li>
                                    <li><strong>DOB : </strong>15/10/1989</li>
                                    <li><strong>Occupation : </strong>Service</li>
                                    <li><strong>Nationality : </strong>English</li>
                                    <li><strong>Residential Address : </strong>132, My Street, Kingston, New York 12401.</li>
                                    <li><strong>Service Address : </strong>105 Krome Avemiami FL 33185 3700USA</li>
                                </ul>
                                <ul>
                                    <li><strong>Name : </strong>kjhhjjh klll</li>
                                    <li><strong>Roles :  </strong>Director, Shareholder, Secretary</li>
                                    <li><strong>Holdings : </strong>1 x ORDINARY at 1.00 GBP</li>
                                    <li><strong>DOB : </strong>15/10/1989</li>
                                    <li><strong>Occupation : </strong>Service</li>
                                    <li><strong>Nationality : </strong>English</li>
                                    <li><strong>Residential Address : </strong>132, My Street, Kingston, New York 12401.</li>
                                    <li><strong>Service Address : </strong>105 Krome Avemiami FL 33185 3700USA</li>
                                </ul>
                                <ul>
                                    <li><strong>Name Of Control : </strong> Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Fusce nec odio fringilla, finibus leo a, elementum neque.</li>
                                </ul>
                                <button class="btn">Edit</button>
                            </div>
                            <div class="review-panel">
                                <h3>Documents</h3>
                                <ul>
                                    {{-- Generic Limited by Shares Articles --}}
                                    <li>
                                        <strong>Memorandum and Articles : </strong> {{ ($review->legal_document == 'generic_article') ? 'Generic Limited by Share Articles' : 'Byspoke article of association' }}
                                    </li>
                                </ul>
                                <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'document']) }}" class="btn">Edit</a>
                            </div>
                            <hr class="mb-4">
                            <h6>Business Account</h6>
                            <div class="review-panel">
                                <p>{{ $review->businessBanking->businessBanking->title ?? 'No Merchant Account Selected' }}</p>
                                <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" class="btn">Edit</a>
                            </div>
                            <h6>Merchant Account</h6>
                            <div class="review-panel">
                                <p>No Merchant Account Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                            <h6>Accounting Software</h6>
                            <div class="review-panel">
                                <p>{{ $review->businessBanking->accountingSoftware->accounting_software_name ?? 'No Accounting Software Product Selected' }}</p>
                                <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}" class="btn">Edit</a>
                            </div>
                            <h6>Insurance</h6>
                            <div class="review-panel">
                                <p>No Insurance Product Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                            <h6>Finance</h6>
                            <div class="review-panel">
                                <p>No Finance Product Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                            <h6>Memberships</h6>
                            <div class="review-panel">
                                <p>No Membership Product Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                        </div>
                        <div class="step-btn-wrap mt-4">
                            <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous : Optional Extras</button>
                            <button class="btn">Save &amp; Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



