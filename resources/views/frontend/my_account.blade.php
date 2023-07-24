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
        <div class="woocommerce">
            <div class="row woo-account">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="menu-account-menu" class="navbar-nav me-auto mb-2 mb-md-0 ">
                                <li id="menu-item-2336" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown nav-item nav-item-2336">
                                    <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="_mi _before fa fa-user" aria-hidden="true"></i><span>My Account</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-2337" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item nav-item nav-item-2337">
                                            <a href="#" class="dropdown-item active"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Overview</span></a>
                                        </li>
                                        <li id="menu-item-2338" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2338"><a href="my-details.html" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>My Details</span></a></li>
                                        <li id="menu-item-2339" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-2339"><a href="{{ route('logout')}}" class="dropdown-item " onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Logout</span></a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                <li id="menu-item-2340" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2340">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-book" aria-hidden="true"></i><span>Orders</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-4625" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4625"><a href="#" class="dropdown-item ">View All Orders</a></li>
                                        <li id="menu-item-4636" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4636"><a href="#" class="dropdown-item ">Incomplete</a></li>
                                        <li id="menu-item-4643" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4643"><a href="#" class="dropdown-item ">In Progress</a></li>
                                        <li id="menu-item-4639" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4639"><a href="#" class="dropdown-item ">Completed</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2341" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2341">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-industry" aria-hidden="true"></i><span>Companies</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-2371" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2371"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>View All Companies</span></a></li>
                                        <li id="menu-item-4655" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-4655"><a href="#" class="dropdown-item ">Incorporate New Company</a></li>
                                        <li id="menu-item-4656" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4656"><a href="#" class="dropdown-item ">Import Company via Auth. Code</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2342" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2342">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-puzzle-piece" aria-hidden="true"></i><span>Services</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-3969" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3969"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>All Services</span></a></li>
                                        <li id="menu-item-3968" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3968"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Services Expired</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2343" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2343">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fas fa-chart-pie" aria-hidden="true"></i><span>Finances</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-5096" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5096"><a href="#" class="dropdown-item ">Invoive History</a></li>
                                        <li id="menu-item-5099" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5099"><a href="#" class="dropdown-item ">Payment History</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="woocommerce-MyAccount-content col-md-12">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="p-2">
                        <h3>My Account</h3>
                        <p>Welcome back <strong>@if(!empty($user)){{$user->forename." ".$user->surname}}@endif</strong>. From here you can keep track of your orders, check their status and manage your account details.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="#">
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
                            <a href="#">
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
                            <a href="#">
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
                            <a href="#">
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
