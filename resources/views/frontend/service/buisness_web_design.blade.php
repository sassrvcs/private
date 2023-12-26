@extends('layouts.master')
@section('content')
 <!-- banner start -->

 <section class="portfolio_banner">
    <div class="bg_layer">
        <img src="{{ asset('frontend/assets/images/portfolio_bg.jpg')}}" alt="">
    </div>
    <div class="text_layer">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <span class="tag" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                        data-aos-once="true">16 homepages in 1 theme</span>
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Atiframe
                        <span class="txt_green">Wordpress Theme</span></h1>
                    <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Total
                        Drag&Drop Visual Page Builder: Header, Footer,
                        Sidebar & Content Area</h3>
                    <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">An
                        ultimate solution for SEO and Web Design services companies. A ready to use website in
                        20 minutes. All demo images included.</p>
                    <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <a href="" class="cta_btn theme-btn-primary">Request Quote</a>
                    </div>
                    <img src="{{ asset('frontend/assets/images/portfolio_banner_imgs.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="beneath_banner">
    <!-- <div class="bg_layer">
        <img src="assets/images/portfolio_green_area.svg" alt="">
    </div> -->
    <div class="text_layer">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex beneath_banner_title">
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">100+
                        </h2>
                        <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                            <span> Pages</span>
                            with Examples</h3>
                    </div>
                </div>
            </div>
            <div class="more_sec_wrap">
                <div class="more_main_wrap">
                    <div class="more_wrap">
                        <div class="more_button">
                            <a href="#">More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="plugin-icon">
                <!-- <a href="#" class="more">More</a> -->
                <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Plugins and
                    Icons</h3>
                <h4 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Save 168$
                    with our included stuff</h4>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/layer.svg')}}">
                        </div>
                        <div class="text">
                            <h5>Layer Silder</h5>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/layer.svg')}}">
                        </div>
                        <div class="text">
                            <h5>Layer Silder</h5>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/layer.svg')}}">
                        </div>
                        <div class="text">
                            <h5>Layer Silder</h5>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/layer.svg')}}">
                        </div>
                        <div class="text">
                            <h5>Layer Silder</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- ================ start: seo-webdesign-sec ================ -->

<section class="seo-webdesign-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">SEO and Web
                Design Company
                <span>Wordpress Theme</span>
            </h2>
            <p>Ready For Top SEO Factors 2018!</p>
        </div>
        <div class="top-seo-factor">
            <!-- <div class="sec-title1 text-center">
                <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Ready For
                    <span>Top SEO Factors</span> 2018!
                </h3>
            </div> -->
            <ul class="top-seo-factor-list">
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                    <div class="text">
                        <h4>Mobile First</h4>
                    </div>
                </li>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                    <div class="text">
                        <h4>HTTPS</h4>
                    </div>
                </li>
                <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                    <div class="text">
                        <h4>Video Content</h4>
                    </div>
                </li>
                <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                    <div class="text">
                        <h4>Load Read Content
                            2000+ words</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- ================ end: seo-webdesign-sec ================ -->


<!-- ================ start: Benefits-sec ================ -->

<section class="benefits-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Benefits For
                <span>You</span> !
            </h3>
        </div>
        <ul class="top-seo-factor-list">
            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                <div class="text">
                    <h4>Saving Time</h4>
                    <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide
                        professional support and advice, so that you are aware of the requirements of company
                        formation.</p>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                <div class="text">
                    <h4>Convenient Editor</h4>
                    <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide
                        professional support and advice, so that you are aware of the requirements of company
                        formation.</p>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                <div class="text">
                    <h4>Beautiful Design</h4>
                    <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide
                        professional support and advice, so that you are aware of the requirements of company
                        formation.</p>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
                <div class="icon"><img src="{{ asset('frontend/assets/images/checked.svg')}}"></div>
                <div class="text">
                    <h4>Running On Wordpress</h4>
                    <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide
                        professional support and advice, so that you are aware of the requirements of company
                        formation.</p>
                </div>
            </li>
        </ul>

    </div>
</section>

<!-- ================ end: Benefits-sec ================ -->



<!-- ================ start: whatMakesDifferent-sec01 ================ -->
<div class="whatMakesDifferent-sec01 design_page">
    <div class="whatMakesDifferent-sec01-sec2">
        <img src="{{ asset('frontend/assets/images/whatMakesDifferent-sec01-sec2.png')}}" class="img-full">
        <div class="to-see-all-sec">
            <div class="custom-container">
                <div class="to-see-all-sec-youtube-bg" data-aos="fade-up" data-aos-delay="50"
                    data-aos-duration="500" data-aos-once="true"><img
                        src="{{ asset('frontend/assets/images/vd2.png')}}"></div>
                <div class="box-wrapper">
                    <div class="text-container">
                        <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">To
                            See All </h3>
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our
                            Video Click Here</h2>
                    </div>
                    <div class="action-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                        data-aos-once="true">
                        <a href="#" class="theme-btn-gray click-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="what-you-like">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Choose
                    <span>What</span>You Like!
                </h2>
                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our motto is
                    to help customers ensure an easy company formation process. Thus, we provide professional
                    support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="row what-you-like-images">
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-3.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-2.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-1.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-3.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-2.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="image">
                        <img src="{{ asset('frontend/assets/images/like-img-1.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================ end: whatMakesDifferent-sec01 ================ -->




<!-- ================ start: demo-sec ================ -->

<section class="demo">
    <div class="one-click-demo">
        <div class="sec-title1 text-center">
            <h2 class="color-white" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <span>One</span>Click Demo Install
            </h2>
            <h6 class="color-white" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">An ultimate
                solution for SEO and Web Design services companies. A ready to use website in
                20 minutes. All demo images included.</h6>
        </div>
    </div>
    <div class="insallation">
        <div class="custom-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
            data-aos-once="true">
            <a href="#" class="theme-btn-primary">Start Installation</a>
        </div>
    </div>

    <div class="mobile-first" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
        <div class="custom-container">
            <div class="mobile-first-content">
                <div class="sec-title1">
                    <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Mobile
                        First

                        <span>and</span> SEO<small>Friendly Ready</small>
                    </h2>
                    <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide
                        professional support and advice, so that you are aware of the requirements of company
                        formation.</p>
                </div>
                <div class="image">
                    <img src="{{ asset('frontend/assets/images/demo-img.png')}}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================ end: demo-sec ================ -->




<!-- ================ start: feature-of-seo-sec ================ -->

<section class="feature-of-seo">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <small>Feature Of The</small>
                <span>SEO</span> WordPress Theme
            </h2>
        </div>
        <div class="feature-of-seo-boxes row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="feature-of-seo-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon"><img src="{{ asset('frontend/assets/images/feature-icon.svg')}}"></div>
                    <div class="text">
                        <h4>High Conversion Rate</h4>
                        <p>Our motto is to help customers ensure an easy company formation process.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-42 col-md-12 col-12">
                <div class="buy-btn" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <a href="#" class="theme-btn-primary">Buy now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================ end: feature-of-seo-sec ================ -->



<!-- ================ start: ourBankingPartners-sec01 ================ -->
<div class="ourBankingPartners-sec01 service-we-provide">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Services
                <span>We Provide</span>
            </h2>
        </div>
        <ul data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/Python.svg')}}">
                </div>
                <h4>Python</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/Laravel.png')}}">
                </div>
                <h4>Laravel</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/java.svg')}}">
                </div>
                <h4>Java</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/Node.js_logo.png')}}">
                </div>
                <h4>Node Js</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/Flutter.png')}}">
                </div>
                <h4>Flutter</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/django-icon.png')}}">
                </div>
                <h4>Django</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/Swift.svg')}}">
                </div>
                <h4>Swift</h4>
            </li>
            <li>
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/react.svg')}}">
                </div>
                <h4>React</h4>
            </li>
        </ul>
    </div>
</div>
<!-- ================ end: ourBankingPartners-sec01 ================ -->


<!-- ================ start:salesthroughWebsite-sec ================ -->

<div class="sales-through-website">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 class="color-white" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Increase sales
                through your Website</h2>
        </div>
        <div class="digitalPackage-right-lists">
            <div class="digitalPackage-right-list-col row">
                <div class=" col-lg-4 col-md-4 col-12">
                    <div class="digitalPackage-right-list-box">
                        <div class="top-price-info" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <h4>Digital <br> <span>Package</span></h4>
                            <h3>£12.99</h3>
                            <p>Includes</p>
                        </div>
                        <ul class="list-info">
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>24-72 Hour Online Formation </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Certificate of Incorporation</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Memorandum &amp; Articles of Association </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Share Certificate(s)</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Company registration</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Free Online Company Manager to Maintain your Company</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Companies House Filing Fee Paid By Us </p>
                            </li>
                        </ul>
                        <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <a href="#" class="buy-btn theme-btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-4 col-12">
                    <div class="digitalPackage-right-list-box">
                        <div class="top-price-info" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <h4>Digital <br> <span>Package</span></h4>
                            <h3>£12.99</h3>
                            <p>Includes</p>
                        </div>
                        <ul class="list-info">
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>24-72 Hour Online Formation </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Certificate of Incorporation</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Memorandum &amp; Articles of Association </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Share Certificate(s)</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Company registration</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Free Online Company Manager to Maintain your Company</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Companies House Filing Fee Paid By Us </p>
                            </li>
                        </ul>
                        <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <a href="#" class="buy-btn theme-btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-4 col-12">
                    <div class="digitalPackage-right-list-box">
                        <div class="top-price-info" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <h4 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                Digital <br> <span>Package</span></h4>
                            <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                £12.99</h3>
                            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                Includes</p>
                        </div>
                        <ul class="list-info">
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>24-72 Hour Online Formation </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Certificate of Incorporation</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Memorandum &amp; Articles of Association </p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Email Copy of Share Certificate(s)</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Company registration</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Free Online Company Manager to Maintain your Company</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                <div class="icon-container">
                                </div>
                                <p>Companies House Filing Fee Paid By Us </p>
                            </li>
                        </ul>
                        <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <a href="#" class="buy-btn theme-btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================ end:salesthroughWebsite-sec ================ -->



<!-- ================ start: needLittleHelp-sec ================ -->
<div class="needLittleHelp-sec">
    <div class="custom-container">
        <div class="left_div">
            <ul class="contactUl">
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg')}}">
                    </div>
                    <div class="text-container">
                        <h4 class="color-white">Call Us: </h4>
                        <h2><a href="tel:020 3002 0032">020 3002 0032</a></h2>
                    </div>
                </li>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/email-green-icon.svg')}}">
                    </div>
                    <div class="text-container">
                        <h4 class="color-white">Mail us: </h4>
                        <h2><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h2>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right_div">
            <h1 class="color-white" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Need a
                <br>little help?</h1>
            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">We love talking
                to you when it comes to creating something new. We want you to remember us always,
                let’s be good for good and for a good reason. Reach us through your voice or writing.</p>
        </div>
    </div>
</div>
<!-- ================ end: needLittleHelp-sec ================ -->



<!-- ================ start: clientReviews-sec01 ================ -->
<div class="clientReviews-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Client
                <span>Reviews</span>
            </h2>
        </div>
        <div class="clientReviews-sec01-wrapper">
            <div class="left_div">
                <ul class="clientReviews-sec01-slider" data-aos="fade-up" data-aos-delay="50"
                    data-aos-duration="500" data-aos-once="true">
                    <li>
                        <div class="clientReviews-sec01-slider-box">
                            <div class="qutes1">
                                <img src="{{ asset('frontend/assets/images/qutes1.svg')}}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum
                                ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png')}}">
                                </div>
                                <figcaption>
                                    <h3>David John</h3>
                                    <h4>CEO, Our Company</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="clientReviews-sec01-slider-box">
                            <div class="qutes1">
                                <img src="{{ asset('frontend/assets/images/qutes1.svg')}}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum
                                ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png')}}">
                                </div>
                                <figcaption>
                                    <h3>David John</h3>
                                    <h4>CEO, Our Company</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="clientReviews-sec01-slider-box">
                            <div class="qutes1">
                                <img src="{{ asset('frontend/assets/images/qutes1.svg')}}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum
                                ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png')}}">
                                </div>
                                <figcaption>
                                    <h3>David John</h3>
                                    <h4>CEO, Our Company</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right_div">
                <div class="clientReviews-sec01-f-Pic1"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic1.png')}}">
                </div>
                <div class="clientReviews-sec01-f-Pic2"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic2.png')}}">
                </div>
                <div class="clientReviews-sec01-f-Pic3"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic3.png')}}">
                </div>
                <div class="clientReviews-sec01-f-Pic4"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic4.png')}}">
                </div>
                <div class="clientReviews-sec01-f-Pic5"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic5.png')}}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: clientReviews-sec01 ================ -->


@endsection
