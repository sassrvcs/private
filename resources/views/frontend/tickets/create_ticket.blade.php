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
                <figcaption>Raise <span>Ticket</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="{{ url('index')}}">Home</a></li>
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
<section class="add-ticket-sec fix-container-width">
    <div class="container">
        <div class="bck-btn-wrap">

        </div>
        <div class="add-ticket-wrap">
            <h2>Add <span>Ticket</span></h2>
            <form action="{{route('ticket.store')}}" method="post">
                @csrf
            <div class="add-ticket-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject')}}" >
                            @error('subject')
                            <div class="error" style="color:red;">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}">
                            @error('email')
                            <div class="error" style="color:red;">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')}}">
                            @error('phone')
                            <div class="error" style="color:red;">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            @error('description')
                            <div class="error" style="color:red;">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="sub-btn-block d-flex justify-content-between">
                            <button class="btn" type="submit">Submit</button>
                            <button class="bck-btn" type="button" onclick="window.location.href='{{ route('ticket.index') }}'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>
<!-- ================ end: ontact Page ================ -->
@endsection
@section('script')
<script>
    $("#email_id").blur(function() {
            if ($('#email_id').val() != "") {
                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z]+(?:\.[a-zA-Z]+)+.[a-zA-Z]*$/;
                if ($('#email_id').val().match(validRegex)) {
                    $('#submit-btn').prop('disabled', false);
                    $('.email_err').html('');
                    //$(".submit-btn").css("background-color", "#001B69");
                    return true;

                } else {
                    $('.email_err').html('Please enter a valid email address');
                    $('.serverEmailerror').html('');
                    $('#submit-btn').prop('disabled', true);
                    // $(".submit-btn").css("background-color", "gray");
                    return false;
                }
            }
        });
</script>
@endsection
