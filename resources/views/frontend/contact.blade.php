@extends('layouts.app')
@section('content')
<!-- ================ start: common-inner-page-banner ================ -->
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/contact-us-innerbanner.jpg')}})">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <!-- <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg')}}"></span>
                </div> -->
                <figcaption>Contact <span>Us</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="index.html">Home</a></li>
                <li><a>Contact Us</a></li>
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
<!-- ================ start: Contact Page ================ -->
<div class="cms-wrap">
    <div class="sectiongap contactUs-sec">
        <div class="container">
            <div class="contactUs-container">
                <div class="left-div">
                    <div class="section-title wow bounceInDown">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session()->get('error') }}</div>
                        @endif
                        <h3>Get in<span style="color: #87cb28;"><strong> Touch</strong></span></h3>
                        <p>Having queries? Our executives are working 24X7 to address your requirements.</p>
                    </div>
                    <div class="whitebox contact_field mb-3">
                        <form class="" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row align-items-center">
                                <div class="group form-group col-md-4">
                                    <input type="text" placeholder="First Name *" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}">
                                    @error('first_name')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group form-group col-md-4">
                                    <input type="text" placeholder="Middle Name" name="middle_name" class="form-control">
                                </div>
                                <div class="group form-group col-md-4">
                                    <input type="text" placeholder="Last Name *" name="last_name" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group form-group col-md-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email *" value={{old('email')}}>
                                    @error('email')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group form-group col-md-6">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone *" value={{old('phone')}}>
                                    @error('phone')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group form-group col-md-12">
                                    <input type="text" name="address_line1" placeholder="Address Line1 *" class="form-control @error('address_line1') is-invalid @enderror">
                                    @error('address_line1')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group form-group col-md-12">
                                    <input type="text" name="address_line2" placeholder="Address Line2 " class="form-control">
                                </div>
                                <div class="group form-group col-md-6">
                                    <input type="text" placeholder="City" name="city" class="form-control">
                                </div>
                                <div class="group form-group col-md-6">
                                    <input type="text" name="state" placeholder="State / Province / Region" class="form-control">
                                </div>
                                <div class="group form-group col-md-6">
                                    <select class="form-control" name="country">
                                        <option value="">Select a country / region…</option>
                                        <option value="72" selected>England</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="group form-group col-md-6">
                                    <input type="text" name="zip" placeholder="ZIP/Postal Code" class="form-control">
                                </div>
                                <div class="text-group mb-3">
                                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="How can we help you? *"></textarea>
                                    @error('comment')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                    @enderror
                                    <div class="txt_sm">
                                        <p>0 of 150 max characters
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="wpcf7-submit custom-btn btn-primary wow zoomIn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-div">
                    <div class="section-title wow bounceInDown">
                       <h3>Reach <span style="color: #87cb28;"><strong>Us</strong></span></h3>
                       <p>Contact us and make company formation easy.</p>
                    </div>
                    <div class="box_border sticky_div">
                       <ul class="contact_info_lists">
                          <li>
                             <div class="icon-container icon_circle2 wow zoomIn">
                                <img src="{{ asset('frontend/assets/images/location_icon.png')}}" class="" alt="" decoding="async" loading="lazy">
                             </div>
                             <div class="text-container">
                                <div class="sub_heading_white">Address :</div>
                                <p>7, Thurlow Gardens , Wembley , Middlesex , HA0 2AH , United Kingdom</p>
                             </div>
                          </li>
                          <li>
                             <div class="icon-container icon_circle2 wow zoomIn">
                                <img src="{{ asset('frontend/assets/images/clock_icon.png')}}" class="" alt="" decoding="async" loading="lazy">
                             </div>
                             <div class="text-container">
                                <div class="sub_heading_white">Office Hours :</div>
                                <p>Monday to Sunday Open 24 hours</p>
                             </div>
                          </li>
                          <li>
                             <div class="icon-container icon_circle2 wow zoomIn">
                                <img src="{{ asset('frontend/assets/images/phone_icon.png')}}" class="" alt="" decoding="async" loading="lazy">
                             </div>
                             <div class="text-container">
                                <div class="sub_heading_white">Call Us :</div>
                                <p><span><a href="tel:0203 002 0032">0203 002 0032</a></span></p>
                             </div>
                          </li>
                          <li>
                             <div class="icon-container icon_circle2 wow zoomIn">
                                <img src="{{ asset('frontend/assets/images/envelop_icon.png')}}" class="" alt="" decoding="async" loading="lazy">
                             </div>
                             <div class="text-container">
                                <div class="sub_heading_white">Email Us :</div>
                                <p><span><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></span></p>
                             </div>
                          </li>
                       </ul>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<!-- ================ end: ontact Page ================ -->
@endsection
