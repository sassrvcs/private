@extends('layouts.app')
@section('content')
<!-- ================ start: common-inner-page-banner ================ -->
<section class="common-inner-page-banner about_adjust_banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png')}})">
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
                <li><a href="{{ url('')}}">Home</a></li>
                <li><a>My Account</a></li>
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
<!-- ================ start: customer_login ================ -->
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="woocommerce">
            <div class="row woo-account">
                @include('layouts.navbar')
                <div class="woocommerce-MyAccount-content col-md-12">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="p-2">
                        <h3>My Account</h3>
                        <p>Welcome back <strong>@if(!empty($user)){{$user->forename." ".$user->surname}}@endif</strong>. From here you can keep track of your orders, check their status and manage your account details.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('my_details')}}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2 my-auto">
                                        <h3>My Details<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Update your details including account username, password, contact addresses, phone numbers, and notification preferences.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('companies-list') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Companies<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View, update, file changes at Companies House, and purchase services from the Shop area, for your companies.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('order-history') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Order History<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View your orders - complete, incomplete and in progress.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('invoice-history') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Invoice History<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View your invoice and payment history. Download or print your invoices.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: customer_login ================ -->
@endsection
