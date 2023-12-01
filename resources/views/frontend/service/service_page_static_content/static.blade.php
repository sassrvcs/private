@if ($package_name=="company-registration")
@php

    $non_share_company = \App\Models\Package::whereNot('package_type','shares')->get();

@endphp
<div class="additionalServices-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Additional <span>Packages</span>
            </h2>
        </div>
        <div class="additionalServices-lists">
            @foreach ($non_share_company as $nsc)
            @php
            $link = "";
                if ( stripos($nsc->package_name, 'Non Residents')!== false) {
                    $link = route("non_residents_package");
                    $package_name = $nsc->package_name." Package";
                }

                if ( stripos($nsc->package_name, 'Guarantee') !== false) {
                    $link = route("guarantee_package");
                    $package_name = $nsc->package_name." Package";
                }

                if ( stripos($nsc->package_name, 'LLP') !== false) {
                    $link = route("llp_package");
                    $package_name = $nsc->package_name." Package";
                }
                if ( stripos($nsc->package_name, 'Eseller') !== false) {
                    $link = route("e_seller_package");
                    $package_name = $nsc->package_name." Package";
                }
                if ( stripos($nsc->package_name, 'PLC') !== false) {
                    $link = route("plc_package");
                    $package_name = $nsc->package_name;
                }

            @endphp
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>  <a href="{{ $link }}">{{$package_name}}</a></h3>
                </div>
                <p>{{$nsc->short_description}} .. <a href="{{ $link}}">Read More </a></p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="additionalServices-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Additional <span>Services</span>
            </h2>
        </div>
        <div class="additionalServices-lists">
            @foreach ($aditional_services_section as $package)
            <div class="additionalServices-list-col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                <div class="h3-with-text">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/icon-right-arow.svg') }}">
                    </div>
                    <h3>  <a href="{{ route('company_services',[$package->slug]) }}">{{$package->service_name}} </a></h3>
                </div>
                <p>{{$package->short_desc}} .. <a href="{{ route('company_services',[$package->slug]) }}">Read More </a></p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif


<div class="whatMakesDifferent-sec01">
    <div class="whatMakesDifferent-sec01-sec1 for-ourDifferent">
        <div class="custom-container">
            <div class="image-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/for-ourDifferent-pic.png') }}">
            </div>
            <div class="text-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="left-border">
                    <h1>Useful Business Services   <br />
                        <span>you might need</span>
                    </h1>
                </div>
                <p>A little guidance to help you reach your business goals.</p>
                <div class="for-ourDifferent-text-lists">
                    @if ($package_name!="registered-office-address")

                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption><a href="{{ route('company_services',['registered-office-address']) }}">Registered Office Address </a></figcaption>
                            </figure>
                        </div>
                    </div>
                    @endif
                    @if ($package_name!="directors-service-address")
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption><a href="{{ route('company_services',['directors-service-address']) }}">Directors Service Address </a></figcaption>
                            </figure>
                        </div>
                    </div>
                    @endif
                    @if ($package_name!="business-telephone-services")
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption><a href="{{ route('company_services',['business-telephone-services']) }}">Business Call Handling Services</a></figcaption>
                            </figure>
                        </div>
                    </div>
                    @endif
                    @if ($package_name!="business-mailing-address-service")
                    <div class="for-ourDifferent-list-col">
                        <div class="for-ourDifferent-list-box">
                            <figure>
                                <div class="icon-container">
                                    <img src="{{ asset('frontend/assets/images/diagram.svg') }}">
                                </div>
                                <figcaption><a href="{{ route('company_services',['business-mailing-address-service']) }}">Business Mail Forwarding Address </a></figcaption>
                            </figure>
                        </div>
                    </div>
                    @endif
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
