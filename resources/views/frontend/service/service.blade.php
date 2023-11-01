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
                    <figcaption>{{ $services->service_name}} <span></span></figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu"  data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="1000" data-aos-once="true">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a>{{ $services->service_name}} Package</a></li>
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
    <!-- ================ end: common-inner-page-banner ================ -->

    <!-- ================ start: digitalPackage-sec ================ -->
    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">

                {{-- <p>{{$packages->short_description}}</p> --}}
                {!!$services->long_desc!!}
                {{-- <div class="next-package-bar-s1" data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000"
                    data-aos-once="true">
                    <h4>Go to our next package to find what’s missing ➤</h4>
                </div> --}}
            </div>
            <div class="right-information" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                {{-- <a href="{{ route('index') }}" class="view-all-btn theme-btn-primary ">View all Packages</a> --}}

                <div class="companyFormationPackages-lists" style="padding-top: 10px">
                    <div class="cfp-list-col mw-100" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                        data-aos-once="true">
                        <div class="cfp-list-box pt-4">

                            <div class="text-info1">
                                <h4>{{$services->service_name}}</h4>
                                <h3>£{{$services->price}}</h3>
                            </div>
                            <ul class="list-info">
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
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                {{-- @if ($package_details['package_id']!='') --}}
                                {{-- <a href="{{ route('add-cart', ['id' => $packages->id] ) }}" class="theme-btn-primary buy-btn">Buy Now</a> --}}
                                {{-- <a href="#" class="read-more-btn">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: digitalPackage-sec ================ -->

    <!-- ================ start: whatmakedifferent-sec ================ -->
    <div class="whatmakedifferent-sec-multiple-left-right">
        <section class="whatmakedifferent-sec">
            <div class="image-container" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/services-packages-list-pic1.png')}}">
            </div>
            <div class="text-container" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <h2>Free Royal Mail Normal Delivery (only within UK)</h2>
            </div>

        </section>
        <div class="logo-center-stamp"></div>
        <section class="whatmakedifferent-sec">
            <div class="image-container" data-aos="fade-left" data-aos-delay="150" data-aos-duration="1500"
                data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/services-packages-list-pic2.png')}}">
            </div>
            <div class="text-container" data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000"
                data-aos-once="true">
                <h2>DHL Delivery £50.00 (Subject to international tracking and mailing service avalability)</h2>
            </div>
        </section>
        <div class="logo-center-stamp"></div>
        <section class="whatmakedifferent-sec">
            <div class="text-container aos-init aos-animate" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
               <h2>Courier Charges: £35 (Takes 3-5 working days)</h2>
                           </div>
           <div class="image-container aos-init aos-animate" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
               <img src="{{ asset('frontend/assets/images/services-packages-list-pic3.png')}}">
           </div>


       </section>
    </div>
    <!-- ================ end: whatmakedifferent-sec ================ -->

    <!-- ================ start: ourServices-sec ================ -->
    <section class="ourServices-sec top-padding">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Free Toolkits
                    <span>For Your Business</span>
                </h2>
            </div>
            <ul class="toolkit-lists" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit1.svg')}}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit2.svg')}}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit3.svg')}}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit4.svg')}}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit5.svg')}}">
                    </div>
                </li>
            </ul>




            <div class="need-little-help">
                <div class="left-box" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h3>Need a little help?</h3>
                    <p>We love talking to you when it comes to creating something new. We want you to remember us
                        always, let’s be good for good and for a good reason. Reach us through your voice or writing.
                    </p>
                </div>
                <div class="right-box" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500"
                    data-aos-once="true">
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_round-phone.svg')}}">
                            <div class="text-box">Call Us: <a href="tel:020 3002 0032">020 3002 0032</a></div>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_round-mail.svg')}}">
                            <div class="text-box">
                                mail to: <a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/barclays-logo.png')}}">
                    </div>

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cashplus-logo.png')}}">
                    </div>

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/wise-logo.png')}}">
                    </div>

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/payoneer-logo.png')}}">
                    </div>

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/anna-logo.png')}}">
                    </div>

                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cardone-Logo.png')}}">
                    </div>

                </div>
        </div>
    </section>
    <!-- ================ end: our-banking-sec ================ -->


@endsection
