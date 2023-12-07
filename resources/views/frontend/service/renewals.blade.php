@extends('layouts.master')
@section('content')
    <!-- ================ start: main-header ================ -->

    <!-- ================ end: main-header ================ -->


    <!-- ================ start: common-inner-page-banner ================ -->
    {{-- <section class="common-inner-page-banner" style="background-image: url(/frontend/assets/images/digital-package-banner.png)">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <span><img src="/frontend/assets/images/ic_round-mail.svg"></span>
                    </div>
                    <figcaption>Business Help<span></span></figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <li><a href="/">Home</a></li>
                    <li><a>Business Help</a></li>
                </ul>
            </div>
            <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="/frontend/assets/images/ic_baseline-phone.svg">
                </div>
                <div class="text-box">
                    <p>Free Consultations 24/7</p>
                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="digital-packages-banner" style="background-image: url({{ asset('frontend/assets/images/digital-packages-banner.png') }})">
        <div class="custom-container">
            <div class="inner-wrapper">
                <div class="icon-container d-none">
                    <span><img src="{{ asset('frontend/assets/images/earch-icon.svg') }}"></span>
                </div>
                <div class="text-container">
                    <h1>Renewals</h1>

                </div>
            </div>
        </div>
    </div>

    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information max-w-unset aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                {!!$services->long_desc!!}
            </div>

        </div>
    </section>

    <!-- ================ end: digitalPackage-sec ================ -->

    {{-- <x-company_name_check /> --}}
    <div class="prefer-to-order-by-telephone-sec pb-10 pt-0">
        <div class="custom-container  ">
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

<div class="how-it-works-sec-card-lists">
    <div class="custom-container">
        <div class="list-style-s1-with-left-arow box-style ">
            {!!$services->how_it_works!!}
        </div>
        @foreach ($aditional_services_section as $other_service)

        <div class="div-ul pb-2">
            <div class="div-li">
                <div class="div-box">
                    <div class="lediv">
                        <h3>{{$other_service->service_name}}</h3>
                        <p>{{$other_service->short_desc}}</p>
                    </div>
                    <div class="rgdiv">
                        <h3>£{{$other_service->price}} </h3>
                        <div class="action-btns">
                            {{-- <a href="#" class="buy-btn btn-primary">Buy Now</a> --}}
                            <a href="{{ route('load_company_service', [$other_service->slug,$other_service->id] ) }}" class="theme-btn-primary buy-btn">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>

    <!-- ================ start: additionalServices-sec ================ -->
    @include('frontend.service.service_page_static_content.renewals_static')
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
