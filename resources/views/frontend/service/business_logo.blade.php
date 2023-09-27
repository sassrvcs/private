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
                    <li><a href="index.html">Home</a></li>
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

    <section class="recentProject-sec">
        <div class="custom-container">
            <h1><span>Recent <b>Projects</b></span></h1>
            <ul class="logo-lists">
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo1.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo2.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo3.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo4.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo5.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo6.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo7.png">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="assets/images/logo8.png">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ================ end: recentProject-sec ================ -->
    <!-- ================ start: digitalPackage-sec ================ -->
    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information max-w-unset" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <p>The goal of every business owner is to make a considerable profit and stand out from the crowd. It is essential that you stay one step ahead of your competitors in this competitive market if you want to attain an extraordinary milestone. The logo of a company can have a great impact on the market and capture potential customers’ attention. The logo is an integral part of the business identity and a reflection of the company. It is very interesting how every element of the design, such as color, font, and shape, expresses the personality of the business. Designing a custom logo helps people understand the brand’s value and personality.</p>
                <h3>What is Logo?</h3>
                <p>A logo is the first identification of any organization and is designed uniquely for easy recognition. It’s basically a name, mark, or symbol to identify any organization’s idea, publication as well as its products, services, etc. A logo is a sign which also represents the brand message, type, and character of your business and different entities of your organization.</p>
                <h3>Why is a logo important for your business?</h3>
                <p>A logo is something far more than it usually seems. It’s the company’s first introduction to the audience. Nowadays it’s very challenging to get the attention of consumers as they don’t have time for anything more than 2 seconds, but with a good logo, you can grab the attention of the consumers very quickly and deliver your core values in an interesting way. Also, one logo holds many entities of your brand, it helps to make a strong first impression of your brand in front of the audience, it reflects the brand identity and it serves as the foundation for the entire narrative on which the brand is built. It also makes your brand memorable to the viewers and it also separates your brand from your competitors.</p>
                <h3>Do you need a Logo?</h3>
                <p>We live in a chromatic world and people are drawn to beautiful designs and colors. That’s Why logos are important for every kind of business. A logo is the first thing people notice in your business and it leads the audience to your company. It is the symbol that people recognize and connect with your brand and even if they forget the name, they can easily recall the logo. That’s why a logo is very important for any business and if you choose the wrong logo for your business then it can affect your brand value and its reputation. Because good logos are aesthetically pleasing visual elements that trigger positive recall about your company. And that’s why you need a logo.</p>
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
            <ul class="our-banking-slider" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/barclays-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cashplus-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/wise-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/payoneer-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/anna-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cardone-Logo.png')}}">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ================ end: our-banking-sec ================ -->


@endsection
