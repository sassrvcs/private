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
                <div class="digitalPackage-right-lists">
                    <div class="digitalPackage-right-list-col">
                        <div class="digitalPackage-right-list-box floatTop">
                            <div class="top-price-info">
                                <h4>{{$services->service_name}}</h4>
                                @if ($services->price!=0.00&&$services->price!=''&&$services->price!='0')
                                    <h3>£{{$services->price}}</h3>
                                    <p>Includes</p>
                                @endif
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

                    <div class="digitalPackage-right-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <div class="digitalPackage-right-list-box">
                            <h3>Financial <span>Services</span></h3>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Banking Services 01</p>
                                </li>
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Banking Services 02</p>
                                </li>
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Banking Services 03</p>
                                </li>
                                <li>
                                    <div class="icon-container icon-right-arow">
                                    </div>
                                    <p>Banking Services 04</p>
                                </li>
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
<div class="additionalServices-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Additional <span>Services</span>
            </h2>
        </div>
        <div class="additionalServices-lists">
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>Banking Services 01</h3>
                </div>
                <p>Our motto is to help customers ensure an easy company formation process. Thus, we provide professional support and advice, so that you are aware of the requirements of company formation.</p>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: additionalServices-sec ================ -->

<!-- ================ start: whatMakesDifferent-sec01 ================ -->
<div class="whatMakesDifferent-sec01">
    <div class="whatMakesDifferent-sec01-sec1 for-ourDifferent">
        <div class="custom-container">
            <div class="image-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/for-ourDifferent-pic.png') }}">
            </div>
            <div class="text-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="left-border">
                    <h1>Our different <br />
                        <span>Services</span>
                    </h1>
                </div>
                <p>After dealing with so many companies and their problems we have established ourselves as an experienced company formation agent and become an authorised E-filing agent of Companies House, a body responsible for UK limited company formation.</p>
                <div class="for-ourDifferent-text-lists">
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption>Lorem ipsum dolor sit amet</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption>Lorem ipsum dolor sit amet</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption>Lorem ipsum dolor sit amet</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption>Lorem ipsum dolor sit amet</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whatMakesDifferent-sec01-sec2 d-none">
        <div class="to-see-all-sec">
            <div class="custom-container">
                <div class="to-see-all-sec-youtube-bg" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><img src="{{ asset('frontend/assets/images/cardIcon.png') }}"></div>
                <div class="box-wrapper">
                    <div class="text-container" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <h3>Go to our </h3>
                        <h2>Next package to find what’s missing </h2>
                    </div>
                    <div class="action-container" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <a href="#" class="theme-btn-darkBlue click-btn">Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whatMakesDifferent-sec01-sec3">
        <div class="custom-container">
            <div class="text-container">
                <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Non UK <span>Resident Package</span></h1>
                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec luctus urna, sed facilisis dolor. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Nam laoreet vestibulum purus, sed suscipit odio convallis ac. In faucibus tincidunt est, </p>
                <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <a href="{{route('non_residents_package')}}" class="theme-btn-primary read-more-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================ end: whatMakesDifferent-sec01 ================ -->
<div class="position-relative">
    <div class="callUs-floating show">
        <button type="button" class="cancel-btn"><img src="{{ asset('frontend/assets/images/cancel-icon.svg') }}"></button>
        <div class="icon-container">
            <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">
        </div>
        <div class="text-container">
            <h4>Call Us: </h4>
            <h2><a href="tel:020 3002 0032">020 3002 0032</a></h2>
        </div>
    </div>
</div>
<!-- ================ start: take-look-t-our-sec01 ================ -->
<div class="take-look-t-our-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 class="text-white" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Take a look at our <br>
                <span>Full secretary services £{{$full_sec_price}}</span>
            </h2>
        </div>
        <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At Formationhunt, you can avail of the best full company secretary service that includes a company secretary and a dedicated and efficient account manager who will take care of the entire statutory registers, make changes in the company as per your instructions and prepare and file company’s confirmation statement.</p>
        <div class="action-btns" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <a href="{{route('company_services', 'full-company-secretary-service')}}" class="theme-btn-primary buy-now-btn">Buy Now</a>
        </div>
    </div>
</div>
<!-- ================ end: take-look-t-our-sec01 ================ -->
<!-- ================ start: needLittleHelp-sec ================ -->
<div class="needLittleHelp-sec">
    <div class="custom-container">
        <div class="left_div">
            <ul class="contactUl" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <li>
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">
                    </div>
                    <div class="text-container">
                        <h4>Call Us: </h4>
                        <h2><a href="tel:020 3002 0032">020 3002 0032</a></h2>
                    </div>
                </li>
                <li>
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">
                    </div>
                    <div class="text-container">
                        <h4>Mail us: </h4>
                        <h2><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h2>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right_div" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <h1>Need a <br>little help?</h1>
            <p>We love talking to you when it comes to creating something new. We want you to remember us always, let’s be good for good and for a good reason. Reach us through your voice or writing.</p>
        </div>
    </div>
</div>
<!-- ================ end: needLittleHelp-sec ================ -->
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
                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">
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
                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">
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
                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">
                            </div>
                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>
                            <figure>
                                <div class="user-img-container">
                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">
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
                <div class="clientReviews-sec01-f-Pic1"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic1.png') }}"></div>
                <div class="clientReviews-sec01-f-Pic2"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic2.png') }}"></div>
                <div class="clientReviews-sec01-f-Pic3"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic3.png') }}"></div>
                <div class="clientReviews-sec01-f-Pic4"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic4.png') }}"></div>
                <div class="clientReviews-sec01-f-Pic5"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic5.png') }}"></div>
            </div>
        </div>
    </div>
</div>
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
