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
                        {{-- <div class="particulars-top-step">
                            <div class="top-step-items">
                                <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}" >
                                    <strong>1.Company Formation</strong>
                                    <span>Details about your company</span>
                                </a>
                            </div>
                            <div class="top-step-items active">
                                <strong>2.Business Essentials</strong>
                                <span>Products & services</span>
                            </div>
                            <div class="top-step-items">
                                <strong>3.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>4.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                        </div> --}}
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
                                    <span>Download Summary</span>
                                    <button class="btn">Save & Continue</button>
                                </div>
                            </div>
                            <div class="review-panel">
                                <h3>Particulars</h3>
                                <ul>
                                    <li><strong>Company Name : </strong>FDFFDCF LTD</li>
                                    <li><strong>Company Type : </strong>Limited By Shares</li>
                                    <li><strong>Jurisdiction : </strong>Scotland</li>
                                    <li><strong>SIC Codes : </strong>Building Societies</li>
                                </ul>
                                <button class="btn">Edit</button>
                            </div>
                            <div class="review-panel">
                                <h3>Registered Office</h3>
                                <ul>
                                    <li><strong>Address : </strong>9 Raglan Court, Empire Way, WEMBLEY, HA9 0RE, SCOTLAND</li>
                                </ul>
                                <button class="btn">Edit</button>
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
                                    <li><strong>Memorandum and Articles : </strong>Generic Limited by Shares Articles</li>
                                </ul>
                                <button class="btn">Edit</button>
                            </div>
                            <hr class="mb-4">
                            <h6>Business Account</h6>
                            <div class="review-panel">
                                <p>No Merchant Account Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                            <h6>Merchant Account</h6>
                            <div class="review-panel">
                                <p>No Merchant Account Selected</p>
                                <button class="btn">Edit</button>
                            </div>
                            <h6>Accounting Software</h6>
                            <div class="review-panel">
                                <p>No Accounting Software Product Selected</p>
                                <button class="btn">Edit</button>
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

@section('script')
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const dontNeedButton = document.querySelector('.btn-don-need');
    //     if (dontNeedButton) {
    //         dontNeedButton.addEventListener('click', function() {
    //             // alert("You have indicated that you don't need a bank account.");
    //             $('#business-essential-store').submit();
    //         });
    //     }
    // });

    // $(document).ready(function () {
        
    // });
</script>
@endsection