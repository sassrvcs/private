@extends('layouts.app')
@section('content')
    <section class="common-inner-page-banner"
        style="background-image: url(https://formationshunt.co.uk/wp-content/uploads/2023/02/tearms-banner_inner2.jpg)">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"
                    class="aos-init aos-animate">
                    <figcaption class="lg">&nbsp;</figcaption>

                    <figcaption>{!! $page->title !!}</figcaption>
                </figure>
            </div>

            <div class="center-info">
                <ul class="prev-nav-menu aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000" data-aos-once="true">
                    <li><a href="https://formationshunt.co.uk">Home</a></li>
                    <li><a>{!! $page->title !!}</a></li>
                </ul>
            </div>

            <div class="call-info aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                data-aos-once="true">
                <div class="icon-container"><img
                        src="https://formationshunt.co.uk/wp-content/themes/formationshunt/assets/images/ic_baseline-phone.svg">
                </div>

                <div class="text-box">
                    <p>Free Consultations 24/7</p>

                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div>
        </div>
    </section>
    <section class="fix-container-width cms-page">
        <div class="container">

            {!! $page->description !!}
        </div>
    </section>
    <section class="ourServices-sec same-padding">
        <div class="custom-container">
            <div class="need-little-help mt-0">
                <div class="left-box aos-init aos-animate" data-aos="fade-right" data-aos-delay="100"
                    data-aos-duration="1000" data-aos-once="true">
                    <h3>Need a little help?</h3>

                    <p>We love talking to you when it comes to creating something new. We want you to remember us always,
                        let’s be good for good and for a good reason. Reach us through your voice or writing.</p>
                </div>

                <div class="right-box aos-init aos-animate" data-aos="fade-right" data-aos-delay="150"
                    data-aos-duration="1500" data-aos-once="true">
                    <ul>
                        <li><img src="https://formationshunt.co.uk/wp-content/uploads/2022/10/consultations-phone-icon.svg">
                            <div class="text-box">Call Us: <a href="tel:020 3002 0032">020 3002 0032</a></div>
                        </li>
                        <li><img src="https://formationshunt.co.uk/wp-content/uploads/2022/10/ic_round-mail.svg">
                            <div class="text-box">mail to: <a
                                    href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="our-banking-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2>Our Banking <span style="color: #87cb28;"><strong>Partners</strong></span></h2>
            </div>@foreach ($businessdata as $index => $data)

            <img alt="" class="our-banking-item" decoding="async" loading="lazy"
            src="{{ $data->getFirstMediaUrl('business_banking_images') }}"> @endforeach

            <ul class="our-banking-slider
                                    aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                                    data-aos-once="true">
                    </ul>
                </div>
    </section>
@endsection
