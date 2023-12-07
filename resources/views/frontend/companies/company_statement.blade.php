@extends('layouts.app')
@section('content')
    <section class="common-inner-page-banner"
        style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg') }}"></span>
                    </div>
                    <figcaption>My <span>Account</span>
                    </figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <li><a href="/">Home</a></li>
                    <li><a>Digital Packages</a></li>
                </ul>
            </div>
            <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg') }}">
                </div>
                <div class="text-box">
                    <p>Free Consultations 24/7</p>
                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div>
        </div>
    </section>
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">

                    @include('layouts.navbar')

                    <div class="MyAccount-content col-md-12">
                        <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">
                            <h3 class="mb-2">FORMATIONSHUNT LTD</h3>
                        </div>
                        @if($cartCount > 0)
                        <div class="MyAccount-content col-md-6">
                            <span>You have {{ $cartCount }} items in your cart.
                                <a href="{{ route('cart-company', ['order' => $order_id]) }}" class="btn btn-primary col-md-3">View Cart</a>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="overview-wrap">
                        <div class="ttl">
                            <h3>Company Overview</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    
@endsection
