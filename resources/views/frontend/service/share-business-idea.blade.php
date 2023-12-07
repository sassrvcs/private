@extends('layouts.master')
@section('content')
    <!-- ================ start: main-header ================ -->

    <!-- ================ end: main-header ================ -->


    <!-- ================ start: common-inner-page-banner ================ -->

    <div class="digital-packages-banner" style="background-image: url({{ asset('frontend/assets/images/digital-packages-banner.png') }})">
        <div class="custom-container">
            <div class="inner-wrapper">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/earch-icon.svg') }}"></span>
                </div>
                <div class="text-container">
                    <h1>Share Business Ideas</h1>

                </div>
            </div>
        </div>
    </div>

    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information max-w-unset aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                {!!$content!!}
            </div>

        </div>
    </section>

    <!-- ================ end: digitalPackage-sec ================ -->
    <x-company_name_check />

    @include('frontend.service.service_page_static_content.static')

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
