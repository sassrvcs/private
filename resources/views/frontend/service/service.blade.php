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
                            <a href="{{ route('load_company_service', [$services->slug,$services->id] ) }}" class="theme-btn-primary buy-btn">Buy Now</a>
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

                                {{-- <a href="#" class="buy-btn theme-btn-primary">Buy Now</a> --}}
                            </div>
                            {{-- <div class="floating-action-btns">
                                <a href="#" class="theme-btn-darkBlue view-btn">View All Packages</a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($services->how_it_works!=null)
                    <div>
                        {!!$services->how_it_works!!}
                    </div>
                    @endif

                    <div class="digitalPackage-right-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="digitalPackage-right-list-box">
                            <h3>Financial <span>Services</span></h3>
                            <ul class="list-info">
                                @if ($package_name!="barclays-bank-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Barclays Bank Account</p>
                                </li>
                                @endif
                                @if ($package_name!="cashplus-business-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Cashplus Business Account</p>
                                </li>

                                @endif
                               @if ($package_name!="wise-business-account-for-non-uk-residents")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Wise Business Account</p>
                                </li>

                               @endif
                                @if ($package_name!="payoneer-business-account-for-non-uk-residents")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Payoneer Business Account For Non UK Residents</p>
                                </li>
                                @endif
                                @if ($package_name!="card-one-business-account")
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Card One Business Account</p>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
