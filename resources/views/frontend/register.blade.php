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
                <li><a>Register</a></li>
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
<div class="sectiongap customer-signup-s1">
    <div class="container">
        <div class="sec-common-title-s2">
            <h1>Account Registration with Formations Hunt
            </h1>
            <p>Please complete the details below to register with us. All fields marked with * are mandatory.</p>
        </div>
        <form action="{{ route('save-register-form')}}" method="POST" class="form-register register">
            @csrf
            <fieldset class="border p-3">
                <legend class="float-none w-auto p-2">Account Holder</legend>
                <div class="form-row form-group ">
                    <label for="username">Organisation (if applicable):
                    </label>
                    <span class="input-wrapper">
                        <input type="text" name="organisation" class="input-text form-control @error('organisation') is-invalid @enderror" value={{old('organisation')}}>
                    </span>
                    @error('organisation')
                        <div class="error" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row form-group ">
                    <label>Title:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <select class="select form-control @error('title') is-invalid @enderror" name="title" value={{old('title')}} data-placeholder="Please select...">
                            <option value="">Please select...</option>
                            <option value="Mr" @if(old('title') == "Mr") selected @endif>Mr</option>
                            <option value="Mrs" @if(old('title') == "Mrs") selected @endif>Mrs</option>
                            <option value="Miss" @if(old('title') == "Miss") selected @endif>Miss</option>
                            <option value="Sir" @if(old('title') == "Sir") selected @endif>Sir</option>
                            <option value="Ms" @if(old('title') == "Ms") selected @endif>Ms</option>
                            <option value="Dr" @if(old('title') == "Dr") selected @endif>Dr</option>
                            <option value="Madam" @if(old('title') == "Madam") selected @endif>Madam</option>
                            <option value="Ma'am" @if(old('title') == "Ma'am") selected @endif>Ma'am</option>
                            <option value="Lord" @if(old('title') == "Lord") selected @endif>Lord</option>
                            <option value="Lady" @if(old('title') == "Lady") selected @endif>Lady</option>
                        </select>
                        @error('title')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>


                <div class="form-row form-group ">
                    <label>Forename:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <input class="form-control @error('forename') is-invalid @enderror" type="text" name="forename" value={{old('forename')}}>
                    @error('forename')
                        <div class="error" style="color:red;">{{ $message }}</div>
                    @enderror
                    </span>
                </div>

                <div class="form-row form-group ">
                    <label>Surname:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value={{old('surname')}}>
                        @error('surname')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>

                <div class="form-row form-group ">
                    <label>Phone Number:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value={{old('phone')}}>
                        @error('phone')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>

                <div class="form-row form-group ">
                    <label>Email:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value={{old('email')}}>
                        @error('email')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>


                <div class="form-row form-group ">
                    <label>Confirm Email:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <input class="form-control @error('confirm_email') is-invalid @enderror" type="email" name="confirm_email" value={{ old('confirm_email')}}>
                        @error('confirm_email')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>


                <div class="form-row form-group ">
                    <label>Password:&nbsp;<abbr class="required" title="required">*</abbr></label>
                    <span class="input-wrapper ">
                        <div class="custom-input-with-right-icon">
                            <div class="input-box">
                                <input id="password-field" class="form-control @error('password') is-invalid @enderror" type="password" name="password" value={{ old('password')}}>
                            </div>
                            <div class="right-icon">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </span>
                </div>

            </fieldset>
            <fieldset class="border p-3">
                <legend class="float-none w-auto p-2">Primary Address
                </legend>
                <div class="row p-3" style="padding-top: 0 !important;">
                    <div class="form-row form-group">
                        <label>Post Code: </label>
                        <div class="input-wrapper with-rg-btn">
                                <input type="text" class="form-control" name="post_code" id="post_code">
                                <button type="button" class="btn btn-primary" id="findAddress">Find
                                Address</button>
                        </div>

                    </div>

                    <div class="form-row form-group ">
                        <label>House Name / Number: &nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" id="house_no" name="house_no" class="input-text form-control @error('house_no') is-invalid @enderror" value={{old('house_no')}}>
                            @error('house_no')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>
                    <div class="form-row form-group ">
                        <label for="billing_title">Street:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="street" id="street" class="input-text form-control @error('street') is-invalid @enderror" value={{old('street')}}>
                            @error('street')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>

                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Locality:
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="locality" id="locality" class="input-text form-control" value={{old('locality')}}>

                        </span>

                    </div>

                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Town:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="town" id="town" class="input-text form-control @error('town') is-invalid @enderror" value={{old('town')}}>
                            @error('town')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">County:&nbsp;
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="county" id="county" class="input-text form-control @error('county') is-invalid @enderror" value="{{ old('county')}}">
                            @error('country')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Post Code:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>

                        <span class="input-wrapper">
                            <input type="text" name="post_code" id="zip_code" class="input-text form-control @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                            @error('post_code')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>
                    <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                        <label for="billing_country">Country&nbsp;<abbr class="required" title="required">*</abbr></label>
                        <span class="input-wrapper">

                            <select name="billing_country" id="billing_country" name="billing_country" class="  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                <option value="">Select a country / region…</option>
                                <option value="72" selected>England</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('billing_country')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>

                    <div class=" px-0 col-md-12 col-12 mb-2">
                        <hr>
                    </div>
                    <div class=" px-0 col-md-12 col-12 mb-2">
                        <div class="px-0 form-check">
                            <input class="" id="chek1" type="checkbox" name="chek1">
                            <label for="chek1">I would like to receive updates from Formations Hunt</label>
                        </div>
                        @error('chek1')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" px-0 col-md-12 col-12">
                        <div class="px-0 form-check">
                            <input class="" id="chek2" type="checkbox" name="chek2">
                            <label for="chek2"> I agree to the <a href="#">Terms and Conditions</a>  & <a href="#">Privacy Policy</a></label>
                        </div>
                        @error('chek2')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<!--For Find Postal Code Address Api Modal Popup-->
<div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="post_address_blk">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".toggle-password").click(function() {

        $(this).toggleClass(" fa-eye-slash fa-eye");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });

        $('#findAddress').click(function(){
            var error = false;
            var post_code = $("#post_code").val();

            if(post_code!=""){
                $("#zip_code").val(post_code);
                error = false;

            }else{
                alert('Please enter post code');
                error = true;
            }
            if(error==false){
                $('#findAddress').html('Please Wait...');
                    $.ajax({
                    url: "{!! route('find-address') !!}",
                    type: 'GET',
                    data: {
                        post_code: post_code
                    },
                    success: function(result) {
                    $('#findAddress').html('Find Address');
                    $("#exampleModalCenterAddress").show();
                    $("#post_address_blk").html(result);
                    }
                });
            }
        });

        // $("#billing_country").change(function(){
        //     $("#country").val($("#billing_country option:selected").text());
        // });
        $(".btn-close").click(function(){
            $("#exampleModalCenterAddress").hide();
        })
    });



    function selectPostalAddrApp(val){
        var value = val.split(',');
        $("#house_no").val(value[0]);
        $("#street").val(value[1]);
        $("#town").val(value[2]);
        $("#county").val(value[3]);
        $("#exampleModalCenterAddress").hide();
    }

</script>
@endsection
