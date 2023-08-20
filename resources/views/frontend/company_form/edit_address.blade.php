@extends('layouts.app')
@section('content')
    <!-- ================ start: common-inner-page-banner ================ -->
    <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png')}})">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg')}}"></span>
                    </div>
                    <figcaption>My <span>Account</span>
                    </figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a>Digital Packages</a></li>
                </ul>
            </div>
            <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
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
    <!-- ================ end: common-inner-page-banner ================ -->

    <!-- ================ start: Particulars sec ================ -->
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">
                    @include('layouts.navbar')
                    <div class="col-md-12">
                        <div class="particulars-form-wrap">
                            <div class="particulars-top-step">
                                <div class="top-step-items active">
                                    <strong>1.Company Formation</strong>
                                    <span>Details about your company</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>2.Company Formation</strong>
                                    <span>Details about your company</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>3.Company Formation</strong>
                                    <span>Details about your company</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>4.Company Formation</strong>
                                    <span>Details about your company</span>
                                </div>
                            </div>
                            <div class="particulars-bottom-step">
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                    <p>Particulars</p>
                                </div>
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg')}}" alt="">
                                    <p>Registered Address</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                    <p>Business Address</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                    <p>Appointment</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                    <p>Document</p>
                                </div>
                            </div>
                            <div class="form-wrap">
                                <div class="form-info-block">
                                    <h4>Edit Address</h4>

                                    </div>
                                </div>


                                <div class="step-btn-wrap mt-4">
                                    <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png')}}" alt=""> Previous: Particulars</button>
                                    <button class="btn">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: Particulars sec ================ -->
@endsection
