@extends('layouts.master')
@section('content')

    <!-- ================ start: digital-packages-banner ================ -->
    <div class="digital-packages-banner" style="background-image: url({{ asset('frontend/assets/images/digital-packages-banner.png') }})">
        <div class="custom-container">
            <div class="inner-wrapper">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/earch-icon.svg') }}"></span>
                </div>
                <div class="text-container">
                    <h1>{{ $services->service_name}}</h1>
                    @if ($services->price!=0.00&&$services->price!=''&&$services->price!='0')
                        <div class="action-btns">
                            <a href="{{ route('load_company_service', [$services->slug,$services->id] ) }}" class="theme-btn-primary buy-btn">
                                Buy Now
                            </a>
                        </div>
                    @endif
                    @if ($package_name=="our-online-company-manager")
                    <div class="action-btns">
                        <a href="{{ route('package') }}" class="theme-btn-primary buy-btn">
                            View All packages
                        </a>
                    </div>
                    @endif
                    @if ($package_name=="company-registration")
                    <div class="action-btns">
                        <a href="{{ route('index') }}" class="theme-btn-primary buy-btn">
                            Launch Your Company
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- ================ end: digital-packages-banner ================ -->

    <!-- ================ start: digitalPackage-sec ================ -->
    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2>{{ $services->service_name}}</h2>
                {!!$services->long_desc!!}
<div class="prefer-to-order-by-telephone-sec pb-0">
            <div class="custom-container  d-blok">
            <h2><b>Prefer to order by telephone</b></h2>
            <p>If you are not confident in completing your new company order online - call our friendly team and we will complete your order by telephone</p>
                <div class="div-ul">
                    <div class="div-li">
                        <div class="call-no">
                            <div class="icon-container">
                                <img src="{{ asset('frontend/assets/images/call-green-icon.svg')}}">
                            </div>
                            <div class="text-container">
                                <h3><a href="tel:020 3002 0032">020 3002 0032</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="div-li">
                        <div class="call-no">
                            <div class="icon-container">
                                <img src="{{ asset('frontend/assets/images/email-green-icon.svg')}}">
                            </div>
                            <div class="text-container">
                                <h3><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

            </div>
            <div class="right-information">
                <div class="digitalPackage-right-lists ">
                    <div class="digitalPackage-right-list-col @if($services->slug =='barclays-bank-account') d-none @endif">
                        <div class="digitalPackage-right-list-box floatTop">
                            <div class="top-price-info">
                                <h4>{{$services->service_name}}</h4>
                                @if ($services->price!=0.00&&$services->price!=''&&$services->price!='0')
                                    <h3>£{{$services->price}}</h3>
                                    <p>Includes</p>
                                @endif
                            </div>

                            <ul class="list-info ">
                                @foreach ($features as $feature)
                                <li>
                                    @if ($feature->feature!='')
                                    <div class="icon-container">
                                    </div>
                                    <p>{{$feature->feature}}</p>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                            <div class="action-btns">
                                {{-- @if ($package_details['package_id']!='') --}}
                                @if ($services->price!=0.00&&$services->price!=''&&$services->price!='0')

                                <a href="{{ route('load_company_service', [$services->slug,$services->id] ) }}" class="theme-btn-primary buy-btn">Buy Now</a>
                                @endif
                                @if ($package_name=="our-online-company-manager")

                                    <a href="{{ route('package') }}" class="theme-btn-primary buy-btn">
                                        View All packages
                                    </a>
                                @endif
                                @if ($package_name=="company-registration")
                                    <div class="action-btns">
                                        <a href="{{ route('index') }}" class="theme-btn-primary buy-btn">
                                            Launch Your Company
                                        </a>
                                    </div>
                                @endif
                                {{-- <a href="#" class="buy-btn theme-btn-primary">Buy Now</a> --}}
                            </div>
                            {{-- <div class="floating-action-btns">
                                <a href="#" class="theme-btn-darkBlue view-btn">View All Packages</a>
                            </div> --}}
                        </div>
                    </div>

                    @if ($package_name=="our-online-company-manager")
                    <div class="our-online-company-manager-col">
                        <div class="our-online-company-manager-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                            <h3> Existing customers</h3>
                            <p>Enter your username and password to access your Customer Dashboard.
                            </p>
                            <div class="action-btns">
                                <a class="more-btn btn-primary" href="{{ route('clientlogin') }}">Click here to login</a>
                            </div>
                        </div>
                        <div class="our-online-company-manager-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                            <h3> New customers</h3>
                            <p>Fill in some basic information and you will be able to create an account and begin importing companies or forming new companies.</p>
                            <div class="action-btns">
                                <a class="more-btn btn-primary" href="{{ route('register-form') }}">Click here to create an account </a>
                            </div>
                        </div>
                    </div>
                    @else
                    @if ($services->how_it_works!=null)
                    <div class="digitalPackage-right-how_it_works-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="digitalPackage-right-how_it_works-box">
                           <div class="list-style-s1-with-left-arow ul-mb-0">
                            {!!$services->how_it_works!!}
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif

                    <div class="digitalPackage-right-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="digitalPackage-right-list-box">
                            <h3>Financial <span>Services</span></h3>
                            <ul class="list-info">
                                @if ($package_name!="barclays-bank-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>
                                        <a href="{{ route('company_services',['barclays-bank-account']) }}">Barclays Bank Account</a>
                                    </p>

                                </li>
                                @endif
                                @if ($package_name!="cashplus-business-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>
                                        <a href="{{ route('company_services',['cashplus-business-account']) }}">Cashplus Business Account</a>
                                    </p>
                                </li>

                                @endif
                               @if ($package_name!="wise-business-account-for-non-uk-residents")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>
                                        <a href="{{ route('company_services',['payoneer-business-account-for-non-uk-residents']) }}">wise-business-account-for-non-uk-residents</a>
                                    </p>
                                </li>

                               @endif
                                @if ($package_name!="payoneer-business-account-for-non-uk-residents")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>
                                        <a href="{{ route('company_services',['payoneer-business-account-for-non-uk-residents']) }}">Payoneer Business Account For Non UK Residents</a>
                                        </p>
                                </li>
                                @endif
                                @if ($package_name!="card-one-business-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p> <a href="{{ route('company_services',['card-one-business-account']) }}">Card One Business Account</a> </p>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     @if ($package_name=="our-online-company-manager")
    <div class="ready-to-set-up-your-company">
        <div class="custom-container  d-blok">
            <h2><b>Ready to set up your company?</b></h2>
            <div class="action-btns">
                <a class="more-btn btn-primary" href="{{ route('index') }}">Let's Get Started</a>
            </div>
        </div>
    </div>
    @endif
    <!-- ================ end: digitalPackage-sec ================ -->

 <!-- ================ end: digitalPackage-sec ================ -->
<x-company_name_check />
<!-- ================ start: additionalServices-sec ================ -->
@include('frontend.service.service_page_static_content.static')
<!-- ================ end: additionalServices-sec ================ -->

<!-- ================ start: whatMakesDifferent-sec01 ================ -->

<!-- ================ end: clientReviews-sec01 ================ -->
<!-- ================ start: ourBankingPartners-sec01 ================ -->
<div class="ourBankingPartners-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our Banking <span>Partners</span></h2>
        </div>
        <ul data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            @foreach ($businessdata as $index => $data)
            <li>
                <div class="logo-container">
                    <img src="{{  $data->getFirstMediaUrl('business_banking_images')}}">
                </div>
            </li>


            @endforeach

            @foreach ($accounting as $item => $data)
                <li>
                    <div class="logo-container">
                        <img src="{{  $data->getFirstMediaUrl('accounting_software_images')}}">
                    </div>
                </li>


            @endforeach

        </ul>
    </div>
</div>
<!-- ================ end: ourBankingPartners-sec01 ================ -->
<!-- ================ start: faq-002-sec ================ -->
@if (@$faqs[0]->question!=null)
<div class="faq-002-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">Frequently Asked <span>Questions</span></h2>
        </div>

        <div id="accordion" class="faq-002-accordion-sec">
            @foreach ($faqs as $faq)
                <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="card-header" id="headingOne{{ $faq->id }}">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne{{ $faq->id }}">
                            <div class="plus-minus-btn">
                                <img src="{{ asset('frontend/assets/images/plus-whtie.svg') }}" class="plus">
                                <img src="{{ asset('frontend/assets/images/plus-whtie.svg') }}" class="minus">
                            </div>
                            <div class="textp">{{ $faq->question }}</div>
                        </button>
                    </div>

                    <div id="collapseOne{{ $faq->id }}" class="collapse" aria-labelledby="headingOne{{ $faq->id }}" data-parent="#accordion">
                        <div class="card-body">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>
</div>
@endif





@endsection
