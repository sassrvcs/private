@extends('layouts.app')
@section('content')
<style>
    .main-banner #result_show {
        padding: 0px 0 !important;
        min-height: 0px !important;
    }

</style>
<!-- ================ start: main-banner ================ -->
<div class="position-relative overflow-hidden main-banner-outer pb-0">
    <div class="main-banner home-banner-src" style="background-image: url({{ asset('frontend/assets/images/main-banner-without-overlay.jpg')}});">
        <div class="custom-container">
            <div class="caption-box" style="padding-right: 0px;">
                <div class="row">
                    <div class="col-md-7">
                        <div id="response-class">
                            <h1 data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">Formations made easier starting from <span>£{{digital_package_price()}}</span></h1>
                            <p data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">Form a UK limited company in minutes</p>
                        </div>

                        {{-- <div id="available-company" style="display: none">
                                <div class=" align-items-center">
                                    <div class="col-md-6">
                                        <span class="icon"><i class="fa-regular fa-circle-check"></i></span>
                                        <h2 id="search-company-name"></h2>
                                        <h3 style="color:#87CB28;" id="is_sensitive_word_row" style="display: none">Please note: The word(s) <span id="is_sensitive_word"></span> is deemed sensitive. You may need to supply additional information to use it.</h3>
                                        <h3 style="color:#87CB28;">Congratulations! This company name is available.</h3>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <a href="#" class="btn btn-primary wow zoomIn">Choose Package<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
                                </div>
                                <div class="hhr-text">Search for another name</div>
                            </div>

                            <div id="not-available-company" style="display: none">
                                <div class="search-result-error mb-4">
                                    <span class="icon"><i class="fa-regular fa-circle-xmark"></i></span>
                                    <h2 id="search-company-name"></h2>
                                    <h3 style="color:white;">Error! This company name is Not available.</h3>
                                </div>
                                <div class="hhr-text">Search for another name</div>
                            </div> --}}

                        <div class="col-md-12" id="result_show" style="display: none">
                            {{-- Available Message --}}
                            <div class="search-result" id="available-company" style="display: none">
                                <div class="mb-4 align-items-center">
                                    <div class="col-md-12">
                                        <span class="icon"><i class="fa fa-check-circle-o"></i></span>
                                        <h2 class="search-company-name"></h2>
                                        <h3 style="color:#87CB28;">Congratulations! This company name is available.</h3>
                                        <h3 style="color:#87CB28;" id="is_sensitive_word_row" style="display: none">Please note: The word(s) <span id="is_sensitive_word"></span> is deemed sensitive. You may need to supply additional information to use it.</h3>
                                    </div>
                                    <div class="col-md-4 "><a href="{{ route('package',['step'=>'choose-package']) }}" class="btn btn-primary wow zoomIn">Choose Package<i class="fa fa-long-arrow-right ms-2"></i></a></div>
                                </div>
                                <div class="hhr-text">Search for another name</div>
                            </div>

                            {{-- Not Available Message --}}
                            <div id="not-available-company" style="display: none">
                                <div class="search-result-error mb-4">
                                    <span class="icon"><i class="fa fa-times-circle-o"></i></span>
                                    <h2 class="search-company-name"></h2>
                                    <h3 style="color:white;">Error! This company name is Not available.</h3>
                                </div>
                                <div class="hhr-text">Search for another name</div>
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                            <div class="search-box mt-3 mb-2" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true" style="max-width: 100%">
                                <input type="text" id="company-name" class="search-input" placeholder="Enter a company name to check if its available">
                                <button type="button" id="search" class="search-btn theme-btn-primary">Search</button>
                            </div>
                            <p class="text-capitalize mt-2" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" style="font-size:13px">14+years of experience in helping thousands of people to start their business in UK</p>
                            <div class="image-stamp" data-aos="fade-right" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">
                                <a><img src="{{ asset('frontend/assets/images/hmCompHouse.png.svg')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        {{-- <div class="freecall d-none d-sm-block">
                            <p>24/7 Customer Support</p>
                            <p><a href="tel:02030020032"><i class="fa fa-phone"></i> 020 3002 0032 </a></p>
                            <p>Free call consultations</p>
                        </div> --}}
                    </div>
                </div>

                <div class="banner-rating-sec">
                    <div class="rating-lists">

                        <div class="rating-list-col">
                            <div class="rating-list-box">
                                <div class="com-icon-container">
                                    <img src="{{ asset('frontend/assets/images/google-com-icon.svg')}}">
                                </div>
                                <div class="com-text-container">
                                    <div class="value-with-stars">
                                        <div class="rating-no">4.9 </div>
                                        <div class="rating-stars">
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="total-rating">4,038 Reviews</div>
                                </div>
                            </div>
                        </div>

                        <div class="rating-list-col">
                            <div class="rating-list-box">
                                <div class="com-icon-container">
                                    <img src="{{ asset('frontend/assets/images/trustpilot-com-icon.svg')}}">
                                </div>
                                <div class="com-text-container">
                                    <div class="value-with-stars">
                                        <div class="rating-no">4.8 </div>
                                        <div class="rating-stars">
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="total-rating">19,038 Reviews</div>
                                </div>
                            </div>
                        </div>

                        <div class="rating-list-col">
                            <div class="rating-list-box">
                                <div class="com-icon-container">
                                    <img src="{{ asset('frontend/assets/images/facebook-com-icon.svg')}}">
                                </div>
                                <div class="com-text-container">
                                    <div class="value-with-stars">
                                        <div class="rating-no">4.7 </div>
                                        <div class="rating-stars">
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                            <button type="button" class="star">
                                                <img src="{{ asset('frontend/assets/images/rating-star-fill.svg')}}">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="total-rating">262 Reviews</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="main-banner-left-floating">
        <div class="text-box">
            <p>Free Consultations 24/7</p>
            <p><a href="tel:020 3002 0032">020 3002 0032</a></p>
        </div>
        <div class="icon-box">
            <img src="{{ asset('frontend/assets/images/consultations-phone-icon.svg')}}">
        </div>
    </div>
    <div class="main-banner-right-floating">
        <div class="icon-box">
            <img src="{{ asset('frontend/assets/images/hand-holding-globe-svgrepo-com.svg')}}">
        </div>
        <a href="{{route('company_services', 'full-company-secretary-service')}}">
            <div class="text-box">
                <p>Full Company</p>
                <p>Secretary Services</p>
            </div>
        </a>
    </div>
</div>
<!-- ================ end: main-banner ================ -->

<!-- ================ start: main-banner-bottom-steps ================ -->
<div class="main-banner-bottom-steps">
    <div class="steps-row">

        <div class="steps-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <div class="steps-box">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/main-banner-bottom-step1.png')}}">
                </div>
                <div class="text-container">
                    <div class="left-border">
                        <h4>STEP-1</h4>
                        <h3>Name of the Company</h3>
                        <p>To see if your company name is available for registration, start by searching for it.</p>
                    </div>
                    <div class="action-btns">
                        <button type="button" class="right-arow-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                <path d="M16.5005 3.54785C10.4727 3.54785 5.09502 7.88042 3.83409 13.7802C3.20412 16.728 3.6285 19.8627 5.03397 22.5301C6.38664 25.0972 8.60424 27.1719 11.2574 28.3477C14.0172 29.571 17.1856 29.7841 20.0863 28.9499C22.8847 28.1454 25.3659 26.3795 27.0552 24.0092C30.5872 19.0535 30.115 12.0925 25.9596 7.65206C23.5242 5.04968 20.0651 3.54785 16.5005 3.54785ZM22.7141 17.1923L19.1831 20.8085C18.2891 21.7242 16.876 20.3369 17.7664 19.4255L19.548 17.6009H11.1047C10.505 17.6009 10.0048 17.1003 10.0048 16.501C10.0048 15.9017 10.5054 15.4011 11.1047 15.4011H19.5058L17.6888 13.5845C16.7859 12.6816 18.1858 11.2814 19.0887 12.1843L22.7058 15.8011C23.0893 16.1842 23.0929 16.8046 22.7141 17.1923Z" fill="#87CB28" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps-col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
            <div class="steps-box">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/main-banner-bottom-step2.png')}}">
                </div>
                <div class="text-container">
                    <div class="left-border">
                        <h4>STEP-2</h4>
                        <h3>Choose the right package</h3>
                        <p>Choose the bundle that suits best for your business needs from the variety of options available.</p>
                    </div>
                    <div class="action-btns">
                        <button type="button" class="right-arow-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                <path d="M16.5005 3.54785C10.4727 3.54785 5.09502 7.88042 3.83409 13.7802C3.20412 16.728 3.6285 19.8627 5.03397 22.5301C6.38664 25.0972 8.60424 27.1719 11.2574 28.3477C14.0172 29.571 17.1856 29.7841 20.0863 28.9499C22.8847 28.1454 25.3659 26.3795 27.0552 24.0092C30.5872 19.0535 30.115 12.0925 25.9596 7.65206C23.5242 5.04968 20.0651 3.54785 16.5005 3.54785ZM22.7141 17.1923L19.1831 20.8085C18.2891 21.7242 16.876 20.3369 17.7664 19.4255L19.548 17.6009H11.1047C10.505 17.6009 10.0048 17.1003 10.0048 16.501C10.0048 15.9017 10.5054 15.4011 11.1047 15.4011H19.5058L17.6888 13.5845C16.7859 12.6816 18.1858 11.2814 19.0887 12.1843L22.7058 15.8011C23.0893 16.1842 23.0929 16.8046 22.7141 17.1923Z" fill="#87CB28" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps-col" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
            <div class="steps-box">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/main-banner-bottom-step3.png')}}">
                </div>
                <div class="text-container">
                    <div class="left-border">
                        <h4>STEP-3</h4>
                        <h3>Checkout</h3>
                        <p>Go ahead and checkout. Additionally, you will have the choice to add other services for your business.</p>
                    </div>
                    <div class="action-btns">
                        <button type="button" class="right-arow-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                <path d="M16.5005 3.54785C10.4727 3.54785 5.09502 7.88042 3.83409 13.7802C3.20412 16.728 3.6285 19.8627 5.03397 22.5301C6.38664 25.0972 8.60424 27.1719 11.2574 28.3477C14.0172 29.571 17.1856 29.7841 20.0863 28.9499C22.8847 28.1454 25.3659 26.3795 27.0552 24.0092C30.5872 19.0535 30.115 12.0925 25.9596 7.65206C23.5242 5.04968 20.0651 3.54785 16.5005 3.54785ZM22.7141 17.1923L19.1831 20.8085C18.2891 21.7242 16.876 20.3369 17.7664 19.4255L19.548 17.6009H11.1047C10.505 17.6009 10.0048 17.1003 10.0048 16.501C10.0048 15.9017 10.5054 15.4011 11.1047 15.4011H19.5058L17.6888 13.5845C16.7859 12.6816 18.1858 11.2814 19.0887 12.1843L22.7058 15.8011C23.0893 16.1842 23.0929 16.8046 22.7141 17.1923Z" fill="#87CB28" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="steps-col" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-once="true">
            <div class="steps-box">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/main-banner-bottom-step4.png')}}">
                </div>
                <div class="text-container">
                    <div class="left-border">
                        <h4>STEP-4</h4>
                        <h3>Share Company Details</h3>
                        <p>Share all the necessary details about your firm and leave the rest to us.</p>
                    </div>
                    <div class="action-btns">
                        <button type="button" class="company-btn" onclick="moveToTop()"><u>From Your Company</u></button>
                        <button type="button" class="right-arow-btn" onclick="moveToTop()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                <path d="M16.5005 3.54785C10.4727 3.54785 5.09502 7.88042 3.83409 13.7802C3.20412 16.728 3.6285 19.8627 5.03397 22.5301C6.38664 25.0972 8.60424 27.1719 11.2574 28.3477C14.0172 29.571 17.1856 29.7841 20.0863 28.9499C22.8847 28.1454 25.3659 26.3795 27.0552 24.0092C30.5872 19.0535 30.115 12.0925 25.9596 7.65206C23.5242 5.04968 20.0651 3.54785 16.5005 3.54785ZM22.7141 17.1923L19.1831 20.8085C18.2891 21.7242 16.876 20.3369 17.7664 19.4255L19.548 17.6009H11.1047C10.505 17.6009 10.0048 17.1003 10.0048 16.501C10.0048 15.9017 10.5054 15.4011 11.1047 15.4011H19.5058L17.6888 13.5845C16.7859 12.6816 18.1858 11.2814 19.0887 12.1843L22.7058 15.8011C23.0893 16.1842 23.0929 16.8046 22.7141 17.1923Z" fill="#87CB28" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ================ end: main-banner-bottom-steps ================ -->

<!-- ================ start: companyFormationPackages-sec ================ -->
<section class="companyFormationPackages-sec" id="compare-package-section">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Company <span>Formation Packages</span></h2>
        </div>
        <div class="col-md-12 text-center all_card">
            <img src="{{ asset('frontend/assets/images/all-card.jpg')}}">
        </div>
        <div class="companyFormationPackages-content">
            <div class="tab-menus">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('index')}}" class="active">Limited Company</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('non_residents_package')}}">Non-Residents</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('llp_package')}}">LLP</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('guarantee_package')}}">Guarantee</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('e_seller_package')}}">eSeller</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('plc_package')}}">PLC</a>
                    </li>
                </ul>
            </div>
            <div class="companyFormationPackages-lists">
                @foreach($packages as $key => $package)
                @if($package->package_name!='Prestige')
                <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true">
                    <div class="cfp-list-box {{$package->package_name==" Digital"?'active':''}}">
                        @if($package->special_offer !== null)
                            <div class="home-packages__special-offer">
                                <span>{{ $package->special_offer }}</span>
                            </div>
                        @endif
                        <span class="top_round"><img src="{{ asset('frontend/assets/images/tab-menus-active-arow.svg')}}"></span>
                        <div class="text-info1">
                            <h4>{{ $package->package_name }}</h4>
                            <h3>£{{ $package->package_price }}</h3>
                        </div>
                        <ul class="list-info">
                            <li>
                                <div class="icon-container">
                                </div>
                                <p>LTD Company</p>
                            </li>
                            <li>
                                <div class="icon-container">
                                </div>
                                <p>Online formation within{{ $package->online_formation_within }}</p>
                            </li>
                            {{-- {{$package->id}} --}}
                            {{-- @dd($facilityList); --}}
                            @foreach($facilitys as $key => $facility)
                            {{-- @foreach($facilityList as $key => $assignFacilitys) --}}
                            @if(in_array($facility->id, $facilityList[$package->id]))
                            <li>
                                <div class="icon-container">
                                </div>
                                <p>{{ $facility->name }}</p>
                            </li>
                            @endif
                            {{-- @endforeach --}}

                            @endforeach

                        </ul>
                        <div class="bottom-actions">
                            @php
                            $read_more_route=explode(' ',strtolower($package->package_name));
                            $read_more_route = implode('_', $read_more_route);
                            $read_more_route.='_package';

                            @endphp

                            <a href="#" class="theme-btn-primary buy-btn buy-btn-multiple" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" data-id="{{$package->id}}" data-name="{{strtoupper($package->package_name)}}">Buy Now</a>
                            <a href="{{route($read_more_route)}}" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="compare-actions" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                <a href="{{ route('package') }}" class="theme-btn-darkBlue compare-btn">Compare All Packages</a>
            </div>
        </div>
    </div>
</section>
<section class="companyFormationPackages-sec contact_new_bg">
    <div class="custom-container">
        <div class="companyFormationPackages-content">
            <div class="prefer-to-order-by-telephone-sec pt-0">
                <div class="custom-container d-blok">
                    <div class="row">
                        <div class="col-md-6 contact_new_box">
                            <div class="col-md-10">
                                <h2><b>Payment Security</b></h2>
                                <p>Selecting FormationsHunt means choosing unparalleled security for your transactions. We proudly accept all major payment methods, ensuring flexibility for your convenience. The data we collect about you is protected with the utmost care. Unlike others, we don't store or collect your payment details. Relax with confidence, knowing that your information is securely transferred to our reliable third-party payment processors.Your trust in FormationsHunt is met with an uncompromising dedication to your privacy and security.</p>
                                <div class="payLog">
                                    <img src="{{ asset('frontend/assets/images/all-card.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 contact_new_box">
                            <div class="col-md-10 ml-auto">
                                <h2><b>Prefer To Order By Telephone</b></h2>
                                <p>If you not feeling confident completing your order online, call our experts to guide you step by step and complete your order by phone</p>
                                <div class="div-ul">
                                    <div class="div-li">
                                        <div class="call-no">
                                            <div class="icon-container">
                                                <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">
                                            </div>
                                            <div class="text-container">
                                                <h3><a href="tel:020 3002 0032">020 3002 0032</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-li">
                                        <div class="call-no">
                                            <!-- <div class="icon-container">
                                                <img src="{{ asset('frontend/assets/images/email-green-icon.svg') }}">
                                            </div> -->
                                            <div class="text-container">
                                                <h3>or Email Us:<a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: companyFormationPackages-sec ================ -->

<!-- ================ start: ourServices-sec01 ================ -->
<div class="ourServices-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our <span>Services</span></h2>
        </div>
        <div class="ourServices-sec01-wrapper">
            <div class="text-container">
                <div class="text-box-lists">
                    <div class="text-box-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="text-box" right-img-url="{{ asset('frontend/assets/images/ourServices-sec01-img1.png')}}">
                            <h3>Payee <span>Registration </span></h3>
                            <p>We help you to register Pay as you Earn (PAYE) for youself or your employees with the HMRC on your behalf.</p>
                            <div class="more-actions">
                                <a href="{{route('company_services',['paye-registration'])}}" class="circle-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                        <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-box-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="text-box" right-img-url="{{ asset('frontend/assets/images/ourServices-sec01-img2.png')}}">
                            <h3>VAT <span>Registration </span></h3>
                            <p>We povide your VAT registration number usually within 15days of application including all legal requirements with HRMC.</p>
                            <div class="more-actions">
                                <a href="{{route('company_services',['vat-registration'])}}" class="circle-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                        <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-box-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="text-box" right-img-url="{{ asset('frontend/assets/images/ourServices-sec01-img3.png')}}">
                            <h3>Confirmation Statement <span>Service</span></h3>
                            <p>We help you file your cofirmation statement to keep your company up to date and compliant with the relevant regulations.</p>
                            <div class="more-actions">
                                <a href="{{route('company_services',['confirmation-statement'])}}" class="circle-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                        <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-box-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="text-box" right-img-url="{{ asset('frontend/assets/images/ourServices-sec01-img4.png')}}">
                            <h3>Full Secretary <span>Service </span></h3>
                            <p>A dedicated account manager keeping your company register up-to-date including the appointment or resignation of company officers.</p>
                            <div class="more-actions">
                                <a href="{{route('company_services',['full-company-secretary-service'])}}" class="circle-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                        <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-container" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/ourServices-sec01-img1.png')}}" id="ourServices-sec01-right-img">
            </div>
        </div>
    </div>
</div>
<!-- ================ end: ourServices-sec01 ================ -->

<!-- ================ start: whatMakesDifferent-sec01 ================ -->
<div class="whatMakesDifferent-sec01 pb-0">
    <div class="whatMakesDifferent-sec01-sec1 for-What-Makes-Us-Different" style="background-image: url({{ asset('frontend/assets/images/for-What-Makes-Us-Different-bg.png')}});">
        <div class="custom-container">
            <ul class="text-group-content-lists w-100" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <li>
                    <div class="left-text-with-arow">
                        <div class="sec-title1 mb-0">
                            <h1>What</h1>
                        </div>
                        <div class="arow-box"><img src="{{ asset('frontend/assets/images/for-What-Makes-Us-Different-arrow-gray.svg')}}">
                        </div>
                    </div>

                    <div class="right-text">
                        <h3>Company House Authorised Agent</h3>
                        <p>After dealing with so many companies and their problems we have established ourselves as
                            an
                            experienced company formation agent and become an authorised E-filing agent of Companies
                            House,
                            a body responsible for UK limited company formation.</p>
                    </div>
                </li>

                <li>
                    <div class="left-text-with-arow">
                        <div class="sec-title1 mb-0">
                            <h1>makes</h1>
                        </div>
                        <div class="arow-box"><img src="{{ asset('frontend/assets/images/for-What-Makes-Us-Different-arrow-gray.svg')}}">
                        </div>
                    </div>

                    <div class="right-text">
                        <h3>We Get your company registered in the UK effortlessly</h3>
                        <p>Your company formation process goes smoothly with a click of a button.You give us the
                            name of
                            the
                            company and details and we do all your paperwork to get your company approved within
                            hours.
                        </p>
                    </div>

                </li>

                <li>
                    <div class="left-text-with-arow">
                        <div class="sec-title1 mb-0">
                            <h1>us</h1>
                        </div>
                        <div class="arow-box"><img src="{{ asset('frontend/assets/images/for-What-Makes-Us-Different-arrow-gray.svg')}}">
                        </div>
                    </div>

                    <div class="right-text">
                        <h3>One Stop for all your business needs</h3>
                        <p>Once you provide all the required details like your company name, the details of the
                            company
                            directors, shareholders and more.We help you further with registered office
                            address,service
                            address incase if you don’t have any. We also offer registration services for Limited
                            Liability
                            Partnerships and Limited by Guarantee Companies and Registration for Non-residents.</p>
                    </div>

                </li>

                <li>
                    <div class="left-text-with-arow">
                        <div class="sec-title1 mb-0">
                            <h1>different</h1>
                        </div>
                        <div class="arow-box"><img src="{{ asset('frontend/assets/images/for-What-Makes-Us-Different-arrow-red.svg')}}">
                        </div>
                    </div>

                    <div class="right-text">
                        <h3>We count hours not days to form a company</h3>
                        <p>The process of company formation is convenient when done by professionals. It usually
                            takes
                            about
                            5 to 10 minutes to complete the application and 3-6 working hours for the registration
                            to
                            complete after approval. The documents reach you in the meantime digitally.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="whatMakesDifferent-sec01-sec2">
        <img src="{{ asset('frontend/assets/images/whatMakesDifferent-sec01-sec2.png')}}" class="img-full">
        <button type="button" class="play-youtube-btn"><img src="{{ asset('frontend/assets/images/youtube-big-btn.svg')}}"></button>
        <div class="to-see-all-sec">
            <div class="custom-container">

                <div class="box-wrapper">
                    <div class="to-see-all-sec-youtube-bg" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><img src="{{ asset('frontend/assets/images/vd2.png')}}"></div>
                    <div class="text-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <h3>To See All </h3>
                        <h2>Our Videos Click Here</h2>
                        <p>This small video will help you understand our company formation process in simple easy steps to make you feel more confident when you register your limited company. Subscribe us for regular updates.</p>
                    </div>
                    <div class="action-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <a href="#" class="theme-btn-darkBlue click-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                <path d="M23.5989 8.23412L16.0156 0.650785C15.8113 0.453447 15.5376 0.344252 15.2536 0.346721C14.9695 0.349189 14.6978 0.463122 14.497 0.663981C14.2961 0.86484 14.1822 1.13655 14.1797 1.4206C14.1772 1.70465 14.2864 1.9783 14.4838 2.18262L20.2178 7.9167H1.16634C0.879023 7.9167 0.603473 8.03084 0.400309 8.234C0.197144 8.43717 0.0830078 8.71272 0.0830078 9.00004C0.0830078 9.28735 0.197144 9.5629 0.400309 9.76607C0.603473 9.96923 0.879023 10.0834 1.16634 10.0834H20.2178L14.4838 15.8175C14.3803 15.9174 14.2978 16.0369 14.241 16.1691C14.1842 16.3013 14.1543 16.4434 14.1531 16.5873C14.1518 16.7311 14.1792 16.8738 14.2337 17.0069C14.2882 17.14 14.3686 17.261 14.4703 17.3627C14.5721 17.4644 14.693 17.5449 14.8261 17.5993C14.9593 17.6538 15.1019 17.6812 15.2458 17.68C15.3896 17.6787 15.5318 17.6488 15.6639 17.5921C15.7961 17.5353 15.9157 17.4528 16.0156 17.3493L23.5989 9.76595C23.802 9.5628 23.9161 9.2873 23.9161 9.00004C23.9161 8.71277 23.802 8.43727 23.5989 8.23412Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whatMakesDifferent-sec01-sec3">
        <div class="custom-container">
            <div class="text-container">
                <div class="sec-title1">
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="text-white">Non UK <span>Resident <br>Package</span></h1>
                    <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our aim is to provide International customers with everything they need for their business to remain complaint with UK regulations starting from London registered office address,directors service address along with GDPR,VAT and PAYE registeration for their business.</p>
                </div>
                <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <a href="{{route('non_residents_package')}}" class="theme-btn-primary read-more-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================ end: whatMakesDifferent-sec01 ================ -->
<!-- ================ start: whyneedbankaccUk-sec01 ================ -->
<div class="whyneedbankaccUk-sec01 pb-0">
    <div class="custom-container">
        <div class="sec-title1">
            <div class="leftRight">
                <div class="left">
                    <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Why you need a bank <br> account in UK?</h2>
                </div>
                <div class="right">
                    <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Banking is an integral part of any business for trading in UK.A proper business bank account helps you to manage your finances with lot of options as per your business needs.</h3>
                </div>
            </div>
        </div>
        <div class="whyneedbankaccUk-wrapper">
            <div class="image-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/whyneedbankaccUk-sec01-pic.png')}}">
            </div>
            <div class="text-container">
                <div class="whyneedbankaccUk-lists">
                    <div class="whyneedbankaccUk-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="whyneedbankaccUk-list-box">
                            <div class="h3-with-icon">
                                <span class="icon-container"><img src="{{ asset('frontend/assets/images/briefcase.svg')}}"></span>
                                <h3>Smart App/Online banking </h3>
                            </div>
                            <p>It helps you manage all banking needs on a single page with the single tap of your finger from anywhere around the world with ease.It helps to keep your financial information one handed,safe and secure from fraudlent activities. </p>
                        </div>
                    </div>
                    <div class="whyneedbankaccUk-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="whyneedbankaccUk-list-box">
                            <div class="h3-with-icon">
                                <span class="icon-container"><img src="{{ asset('frontend/assets/images/briefcase.svg')}}"></span>
                                <h3>Foreign Currency </h3>
                            </div>
                            <p>Banks can help you in managing daytoday exchange rate fluctuations to simplify international payments, making it easier for your import export business,cross-border online selling business through payment gateways etc. </p>
                        </div>
                    </div>
                    <div class="whyneedbankaccUk-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="whyneedbankaccUk-list-box">
                            <div class="h3-with-icon">
                                <span class="icon-container"><img src="{{ asset('frontend/assets/images/briefcase.svg')}}"></span>
                                <h3>Business loans/Expansion </h3>
                            </div>
                            <p>Banks offers wide range of services inlcuding business credit cards,business loans to help you set up your business and with a good track record they can assist you further for expansion in other countries to help you reach overseases market to help your business grow worldwide. </p>
                        </div>
                    </div>

                    <div class="whyneedbankaccUk-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="whyneedbankaccUk-list-box">
                            <div class="h3-with-icon">
                                <span class="icon-container"><img src="{{ asset('frontend/assets/images/briefcase.svg')}}"></span>
                                <h3>Ease of funds </h3>
                            </div>
                            <p>Banks lets you handle your money with ease protecting you against any error or frauds.You can receive and send your money from anywhere sitting at one place and make online purchase and sell with a proper proof of payments.You get to access your funds faster even if you are in a rural or remote area.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: whyneedbankaccUk-sec01 ================ -->
<!-- ================ start: clientReviews-sec01 ================ -->
<div class="clientReviews-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Client <span>Reviews</span></h2>
        </div>
        <div class="clientReviews-sec01-wrapper">
            <div class="left_div">
                <ul class="clientReviews-sec01-slider" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <li>
                        <div class="clientReviews-sec01-slider-box">
                            <div class="qutes1">
                                <img src="{{ asset('frontend/assets/images/qutes1.svg')}}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
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
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
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
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
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
            <div class="right_div" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="clientReviews-sec01-f-Pic1"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic1.png')}}"></div>
                <div class="clientReviews-sec01-f-Pic2"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic2.png')}}"></div>
                <div class="clientReviews-sec01-f-Pic3"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic3.png')}}"></div>
                <div class="clientReviews-sec01-f-Pic4"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic4.png')}}"></div>
                <div class="clientReviews-sec01-f-Pic5"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic5.png')}}"></div>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: clientReviews-sec01 ================ -->

<!-- ================ start: whatWeOffer-sec03 ================ -->
<div class="whatWeOffer-sec02">
    <div class="custom-container">
        <div class="sec-title1">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">What We Offer to
                <br />
                <span>Set Up Your Company in the UK</span>
            </h2>
        </div>
        <div class="left-right-content-lists">
            <div class="left-right-content-wrapper" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/whatWeOffer-sec02-pic1.png')}}">
                </div>
                <div class="text-container">
                    <h3>London Registered Office Address</h3>
                    <p>By selecting a distinguished London registered office address, you not only satisfy business registration criteria but also position your business at the core of the UK's commercial hub.</p>
                    <div class="action-btns">
                        <a href="{{route('company_services',['registered-office-address'])}}" class="text-read-more-btn">Read More</a>
                    </div>
                </div>

            </div>

            <div class="left-right-content-wrapper" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/whatWeOffer-sec02-pic2.png')}}">
                </div>
                <div class="text-container">
                    <h3>Business Mail Forwarding Address</h3>
                    <p>Establish a designated business address for receiving mail and parcels, elevating the professionalism of your enterprise. Benefit from the freedom to manage your business globally, while we conscientiously forward your mail to your chosen address, saving you time and eliminating inconvenience.</p>
                    <div class="action-btns">
                        <a href="{{route('company_services',['business-mailing-address-service'])}}" class="text-read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="left-right-content-wrapper" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/whatWeOffer-sec02-pic3.png')}}">

                </div>
                <div class="text-container">
                    <h3>Company Officer (Director) Address</h3>
                    <p>For reasons of privacy or any other necessity, obtain a physical address to serve as the official registration address for your company directors and officials. </p>
                    <div class="action-btns">
                        <a href="{{route('company_services',['directors-service-address'])}}" class="text-read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="left-right-content-wrapper" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="image-container">
                    <img src="{{ asset('frontend/assets/images/whatWeOffer-sec02-pic4.png')}}">
                </div>
                <div class="text-container">
                    <h3>Business Call Answering Service</h3>
                    <p>Our solution for business call answering services offers companies a dedicated and professional team to manage phone calls on their behalf. Inbound calls are answered by our team using your company's name, and they are handled in accordance with your bespoke instructions.</p>
                    <div class="action-btns">
                        <a href="{{route('company_services',['business-telephone-services'])}}" class="text-read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================ end: whatWeOffer-sec03 ================ -->

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

<!-- ================ start: aboutUs-sec ================ -->
<section class="aboutUs-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">About Us</h2>
        </div>
        <div class="left-right-info-content">
            <div class="left-info" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <h3>Who Are <span>We?</span></h3>
                <p>With expertise and a rich legacy, we stand tall amongst the leading company formation agent the UK. We are a team of experienced individuals working dedicatedly to provideassistance to clients across the globe, helping them facilitate the process of company formation in the UK. Our bouquet of services also deals with providing expert advice on corporate governance, reporting requirements, and more. We help you find effective solutions for your business. Our agenda is to reduce your burden so that you can streamline your business operations and focus on growth.</p>
                <div class="button">
                    <a href="#" class="theme-btn-primary buy-btn buy-btn-multiple">Read more </a>
                </div>
            </div>
            <div class="right-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <h3>Our <span>Mission</span></h3>
                <p>Our mission is to serve customers and help them with company formations in the UK in the best way possible. We house a team of professionals to support our clientele throughout the company formation process.</p>
                <h3>Our <span>Vision</span></h3>
                <p>Our vision is to ensure the business improvement of our clients. We look forward to offering a holistic service that deals with addressing both legal and general procedures and helping clients with documentation and easing up the process of company formation.</p>
            </div>
        </div>

        <ul id="aboutUs-counter" class="aboutUs-counter">
            <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <span class="count" data-count="100">
                </span>
                <p>UK companies formed by Formations Hunt</p>
            </li>
            <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="2000" data-aos-once="true">
                <span class="count" data-count="10">
                </span>
                <p>Informative Blog Posts</p>
            </li>
            <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="2500" data-aos-once="true">
                <span class="count" data-count="20">
                </span>
                <p>Team Members</p>
            </li>
            <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="3000" data-aos-once="true">
                <span class="count" data-count="14">
                </span>
                <p>Years of Experience</p>
            </li>
        </ul>
    </div>
</section>
<!-- ================ end: aboutUs-sec ================ -->
<!-- ================ start: needLittleHelp-sec ================ -->
<div class="needLittleHelp-sec">
    <div class="custom-container">
        <div class="left_div">
            <ul class="contactUl" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <li>
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg')}}">
                    </div>
                    <div class="text-container">
                        <h3>Call Us: </h3>
                        <h2><a href="tel:020 3002 0032">020 3002 0032</a></h2>
                    </div>
                </li>
                <li>
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/email-green-icon.svg')}}">
                    </div>
                    <div class="text-container">
                        <h3>Mail us: </h3>
                        <h2><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h2>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right_div" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <div class="sec-title1 mb-0">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="text-white">Need a <br>little help?</h2>
                <p>We love talking to you when it comes to creating something new. We want you to remember us always, let’s be good for good and for a good reason. Reach us through your voice or writing.</p>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: needLittleHelp-sec ================ -->
<!-- ================ start: ourNewsletters-sec ================ -->
<div class="ourNewsletters-01-sec">
    <div class="ourNewsletters-01-top-banner">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="text-white">Our <span>Newsletters</span></h2>
            </div>
        </div>
    </div>
    <div class="ourNewsletters-01-lists">
        <div class="ourNewsletters-01-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <div class="ourNewsletters-01-box bg1">
                <h3>Aenean fermentum odio non vehicula mattis. Praesent nec blandit sapien.</h3>
                <div class="action-btns">
                    <a href="#" class="read-more-btn theme-btn-white">Read More</a>
                </div>
            </div>
        </div>
        <div class="ourNewsletters-01-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <div class="ourNewsletters-01-box">
                <h3>Aenean fermentum odio non vehicula mattis. Praesent nec blandit sapien.</h3>
                <div class="action-btns">
                    <a href="#" class="read-more-btn theme-btn-blue">Read More</a>
                </div>
            </div>
        </div>
        <div class="ourNewsletters-01-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <div class="ourNewsletters-01-box bg2">
                <h3>Aenean fermentum odio non vehicula mattis. Praesent nec blandit sapien.</h3>
                <div class="action-btns">
                    <a href="#" class="read-more-btn theme-btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: ourNewsletters-sec ================ -->
<!-- ================ start: blog-sec ================ -->
<section class="blog-sec pb-0">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our
                <span>Blog</span>
            </h2>
        </div>
        <ul class="blog-slider" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog1.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog2.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog3.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog1.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog2.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog3.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- ================ end: blog-sec ================ -->
<!-- ================ start: faq-002-sec ================ -->
<div class="faq-002-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">Frequently Asked <span>Questions</span></h2>
        </div>

        <div id="accordion" class="faq-002-accordion-sec">
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-235">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-235" aria-expanded="false" aria-controls="collapseOne-235">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Why doing it through us online?</div>
                    </button>
                </div>

                <div id="collapseOne-235" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Through our website, you can simply register a limited company or LLP for as little as £12.99 + VAT, saving you between £200 and £300 in attorney or accountant fees.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="heading221">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne221" aria-expanded="false" aria-controls="collapseOne">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Why you need a company?</div>
                    </button>
                </div>

                <div id="collapseOne221" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>You will need a limited company to protect yourself and your personal assets from business-related debts. There are numerous benefits of using limited companies for your trading activities, but one of the most important is debt protection..</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne221">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne227" aria-expanded="false" aria-controls="collapseOne221">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What kind of companies i can form here?</div>
                    </button>
                </div>

                <div id="collapseOne227" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>A company limited by share: This can be formed by a single individual who serves as the sole shareholder and director. Or by a large number of shareholders with a large number of directors. They are the most common company trading structure in the UK.

                            Partnerships with a limited liability(LLP) : Generally fromed by formed by Professional organisations such as accountants, engineers, and solicitors.

                            Companies Limited by Guarantee : Mostly formed by Non -profit organisations such as clubs, associations, charities, and social enterprises.Instead of shareholders, they have guarantors who guarantee a small sum. A limited by guarantee company can be formed with only one guarantor and director.

                            Public limited company(PLC) : It’s for those who wish to set up a public limited company and require atleast two directors to form PLC,the PLC package offers a range of services that helps in the easy formation of your company at an affordable rate.

                            Eseller : Its perfect for those who wants to establish an eCommerce company willing to sell products or services through their e-platform. This is ideal for those willing to establish and sell through their eCommerce websites.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne231">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne231" aria-expanded="false" aria-controls="collapseOne231">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How Formationshunt is going to help?</div>
                    </button>
                </div>

                <div id="collapseOne231" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>As a company formation agent we guide through different processess to form a company which best suits your requirements.We assist you,starting from choosing a name for your company,getting it approved through the company house once selected with full secretarial support and a free business bank account.Not only that,we get you all the necessary tools and support for your business to remain complaint so that you to walk through the ladder of success.At Formationshunt our customer support team works with a motive and mission of being good for good and for a good reason.We are available 24hrs. to provide you with email and telephone support all your lifetime.We also provide you with our free company online manager where you get full range of services and access to all your company details from one place.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="heading225">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse225" aria-expanded="false" aria-controls="collapseOne">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">When can I start trading?</div>
                    </button>
                </div>

                <div id="collapse225" class="collapse" aria-labelledby="heading225" data-parent="#accordion">
                    <div class="card-body">
                        <p>Your company can begin trading as soon as you receive an email containing your Certificate of Incorporation. It can immediately enter into contracts, make sales, hire workers, and purchase goods and services. Even though it does not yet have a bank account, it has full legal capacity.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-240">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-240" aria-expanded="false" aria-controls="collapseOne-240">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How to renew services that comes with a package?</div>
                    </button>
                </div>

                <div id="collapseOne-240" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Go to our online company manager section,check the services showing expired to renew.In this package you need to renew the services like registered office address and domain after a year.Call answering and phone number services needs renewal after a month.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ================ end: faq-002-sec ================ -->

<!-- ================ start: formationsMade-easier-sec ================ -->
<section class="formationsMade-easier-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center mb-0">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="text-white">Formations made easier starting <br />from <span>£{{digital_package_price()}}</span></h2>
            <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true" class="text-white">To check for availability and view our packages, enter the name of your organization.</p>
        </div>
        <div class="search-box" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <input type="text" class="search-input" id='searchCompanyName' placeholder="Enter a company name to check if its available">
            <button type="button" id="searchInputanother" class="search-btn theme-btn-primary">Search</button>
        </div>
    </div>
</section>
<x-company_name_check />
<!-- ================ end: formationsMade-easier-sec ================ -->
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $(".step-4-box").click(function() {
            $('html, body').animate({
                scrollTop: $(".main-banner").offset().top
            }, 'slow');
            $('#company-name').focus();
        });

        $('#search').click(function() {
            var companyName = $('#company-name').val();
            if(companyName){
            $('#search').html('Searching...');
            let searchButton = $(this);
            searchButton.prop('disabled', true).html('Searching...');

            // Make the GET request using Axios
            searchSubmit(companyName);
            // searchButton.html('Search');
            }
        });


        $('#searchInputanother').click(function() {
            var companyName = $('#searchCompanyName').val();
            var searchButton = $(this);
            searchButton.html('Searching...');
            $('#search').html('Searching...');
            // Make the GET request using Axios
            searchSubmit(companyName);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            searchButton.html('Search');

        });


    });

    function moveToTop(){
        window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        $('#company-name').focus();
    }

    function searchSubmit(companyName) {
        axios.get("{{ route('search-companie') }}", {
                params: {
                    'search': companyName,
                    'same_as': 'true',
                }
            })
            .then(function(response) {
                // Handle the response data here
                console.log(response.data);

                if (response.data.message == 'This company name is available.') {
                    $('#response-class').hide();
                    $('#result_show').hide();
                    $('#not-available-company').hide();
                    $('.search-company-name').text(companyName);

                    if (response.data.is_sensitive == 1) {
                        $('#is_sensitive_word_row').show();
                        $('#is_sensitive_word').text(response.data.is_sensitive_word);
                    } else {
                        $('#is_sensitive_word_row').hide();
                        $('#is_sensitive_word').text('');
                    }

                    $('#result_show').show();
                    $('#available-company').show();
                    $('.image-stamp').hide();
                    $('.search-input').val('');
                } else {
                    $('#result_show').hide();
                    $('#available-company').hide();
                    $('#response-class').hide();

                    // Show data
                    $('.search-company-name').text(companyName);
                    $('#result_show').show();
                    $('#not-available-company').show();
                    $('.image-stamp').hide();
                    $('.search-input').val('');
                }
            })
            .catch(function(error) {
                // Handle any errors that occurred during the request
                console.error(error);
            })
            .finally(function() {
                // Re-enable the button and change the text back to "Search"
                $('#search').prop('disabled', false).text('Search');
            });
    }

</script>
@endsection
