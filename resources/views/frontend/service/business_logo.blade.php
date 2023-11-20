@extends('layouts.master')
@section('content')
    <!-- ================ start: main-header ================ -->

    <!-- ================ end: main-header ================ -->


    <!-- ================ start: common-inner-page-banner ================ -->

    <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }}">
        <div class="custom-container">
            <div class="left-info">
                <figure  data-aos="fade-up" data-aos-delay="50"
                data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <span><img src="{{ asset('frontend/assets/images/ic_round-mail.svg')}}"></span>
                    </div>
                    <figcaption>Business Logo Design <span></span></figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu"  data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="1000" data-aos-once="true">
                    <li><a href="/">Home</a></li>
                    <li><a>Business Logo Design</a></li>
                </ul>
            </div>
            <div class="call-info"  data-aos="fade-up" data-aos-delay="150"
            data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg')}}">
                </div>
                <div class="text-box">
                    <p>Free Consultations 24/7</p>
                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div>
        </div>
    </section>

    <div class="pckg_bar border-0">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-left">
                    <div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
                        <h2>Business Logo Design</h2>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
                        <div class="d-flex float-right">
                            <div> <a class="btn btn-primary me-2" href="{{route('load_company_service',[$title,$id])}}">Buy Now</a></div>
                            <div><span class="price btn">  <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>49.99</bdi></span></span></div>


                        </div>

                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>


    <!-- ================ end: recentProject-sec ================ -->
    <!-- ================ start: digitalPackage-sec ================ -->
    <section class="digitalPackage-sec">
        <div class="custom-container">
            {{-- <h1><span>Recent <b>Projects</b></span></h1> --}}
            <div class="left-information max-w-unset" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                {!!$content!!}
            </div>
        </div>
    </section>
    <!-- ================ end: common-inner-page-banner ================ -->

    <!-- ================ start: digitalPackage-sec ================ -->

    <!-- ================ end: digitalPackage-sec ================ -->

    <!-- ================ start: whatmakedifferent-sec ================ -->

    <!-- ================ end: whatmakedifferent-sec ================ -->

    <!-- ================ start: ourServices-sec ================ -->

    <!-- ================ end: ourServices-sec ================ -->

    <!-- ================ start: our-banking-sec ================ -->
    <section class="our-banking-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our Banking
                    <span>Partners</span>
                </h2>
            </div>
            <div class="our-banking-slider" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">

                @foreach ($businessdata as $index => $data)

                <div class="our-banking-item">
                    <img src="{{  $data->getFirstMediaUrl('business_banking_images')}}">
                </div>

        @endforeach

        @foreach ($accounting as $item => $data)

                <div class="our-banking-item">
                    <img src="{{  $data->getFirstMediaUrl('accounting_software_images')}}">
                </div>

        @endforeach
                </div>
        </div>
    </section>
    <!-- ================ end: our-banking-sec ================ -->


@endsection
