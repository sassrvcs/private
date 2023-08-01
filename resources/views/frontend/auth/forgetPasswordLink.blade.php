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
                    <li><a href="{{ url('')}}">Home</a></li>
                    <li><a>Reset Password</a></li>
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
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <div class="customer_login">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <fieldset class="border p-3">
                            <legend class="float-none w-auto p-2">Reset Password</legend>
                            <form action="{{ route('reset.password.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Email&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </form>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ end: customer_login ================ -->
@endsection
@section('script')


@endsection
