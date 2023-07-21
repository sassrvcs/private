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
                    <li><a href="index.html">Home</a></li>
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
    <!-- ================ start: customer_login ================ -->
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="customer_login">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="border p-3">
                            <legend class="float-none w-auto p-2">Account Login</legend>
                            <form class="" method="post" novalidate="novalidate">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email *</label>
                                    <input type="text" class="form-control" name="username" id="username" autocomplete="username" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password&nbsp;<span class="required">*</span></label>
                                    <div class="custom-input-with-right-icon">
                                        <div class="input-box">
                                            <input class="form-control" type="password" name="password" id="password">
                                        </div>
                                        <div class="right-icon">
                                            <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-0 form-check">
                                    <input class="" name="rememberme" type="checkbox">
                                    <label>Remember me</label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-3">
                                        <input type="hidden" value=""> <button type="submit" class="btn btn-primary">Log in</button>
                                    </div>
                                    <div class="col-md-6 mb-3 text-md-end lost_password text-md-right">
                                        <a href="#" class="link-primary">Lost your password?</a>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="border p-3">
                            <legend class="float-none w-auto p-2">New Customer</legend>
                            <div class="equalheight">
                                <p>If you would like to register with Formations Hunt and import an existing company to manage using our Online Company Manager then please click 'Create Account' below.</p>
                                <a href="#" class="btn btn-primary">Create Account</a>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: customer_login ================ -->
@endsection
