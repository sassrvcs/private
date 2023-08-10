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

<!-- ================ start: Particulars sec ================ -->
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="companies-wrap">
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
                                        <li id="menu-item-2339" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-2339"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Logout</span></a></li>
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
                <div class="col-md-12">
                    <div class="particulars-form-wrap">
                        <div class="particulars-top-step">
                            <div class="top-step-items active">
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>2.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>3.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>4.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                        </div>
                        <div class="particulars-bottom-step">
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Particulars</p>
                            </div>
                            <div class="bottom-step-items active">
                                <img src="{{ asset('frontend/assets/images/active-tick.svg')}}" alt="">
                                <p>Registered Address</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Business Address</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Appointment</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Document</p>
                            </div>
                        </div>

                        {{-- Edit  form div--}}
                        <div class="form-wrap edit_from d-none">
                            <div class="form-info-block">
                                <h4>Registered Address</h4>
                                <h3>Edit Address</h3>

                                <form>
                                    <input type="hidden" id="add_id" class="add_id" name="add_id">

                                    <div class="form-row form-group ">
                                        <label>Name / Number:&nbsp;
                                            </span>
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" id="house_no1" name="house_no" class="input-text form-control house_no">

                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="billing_title">Street:&nbsp;
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" name="street" id="street1" class="input-text form-control steet_no">
                                        </span>

                                    </div>
                                    <div class="form-row form-group">
                                        <label for="locality">Locality:
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" name="locality" id="locality1" class="input-text form-control locality">
                                        </span>

                                    </div>
                                    <div class="form-row form-group">
                                        <label for="town">Town:&nbsp;
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" name="town" id="town1" class="input-text form-control town">
                                        </span>

                                    </div>
                                    <div class="form-row form-group">
                                        <label for="county">County:&nbsp;
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" name="county" id="county1" class="input-text form-control county">
                                        </span>

                                    </div>
                                    <div class="form-row form-group">
                                        <label for="postcode">Post Code:&nbsp;
                                        </label>
                                        <span class="input-wrapper">
                                            <input type="text" id="post_code" name="post_code" class="input-text form-control zip">
                                        </span>
                                    </div>
                                    <div class="form-row update_totals_on_change form-group">
                                        <label for="billing_country">Country&nbsp;</label>
                                        <span class="input-wrapper">
                                            <select name="billing_country" id="billing_country" name="billing_country" class="contry country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                                <option value="">Select a country / region…</option>
                                                @foreach ($countries as $country)
                                                <option value="{{$country['id']}}">{{$country['name']}}</option>
                                                @endforeach

                                            </select>
                                        </span>

                                    </div>

                                    <div class="step-btn-wrap mt-4">
                                        <button type="button" class="btn saveAddress">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                        {{--End Edit  form div--}}

                        <div class="form-wrap hideEdit">
                            <div class="form-info-block">
                                <h4>Registered Address</h4>
                            </div>
                            <div class="choose-own-address">
                                <h3>Choose to use your own address</h3>
                                <div class="src-are">
                                    <input type="text" placeholder="Address Search...." class="form-control">
                                </div>
                            </div>
                            <div class="recently-used-addresses">
                                <h4>Recently used Addresses</h4>
                                <div class="row">
                                    @if(!empty($used_address))
                                    @foreach($used_address as $key => $value)
                                    <div class="col-md-6 col-sm-12">
                                        <div class="used-addresses-panel">
                                            <div class="text">
                                                <p>{{$value->house_number}},{{$value->street}},{{$value->locality}},{{$value->town}},{{$value->county}},{{$value->post_code}},{{$value->billing_country}}</p>
                                            </div>
                                            <div class="btn-wrap">
                                                <button type="submit" class="btn" onclick="editAddress('{{$value->id}}')">Edit</button>
                                                <input type="hidden" class="{{$value->id}}_add_id" value="{{ $value->id}}">
                                                <input type="hidden" class="{{$value->id}}_add_house_number" value="{{ $value->house_number}}">
                                                <input type="hidden" class="{{$value->id}}_add_street" value="{{ $value->street}}">
                                                <input type="hidden" class="{{$value->id}}_add_locality" value="{{ $value->locality}}">
                                                <input type="hidden" class="{{$value->id}}_add_town" value="{{ $value->town}}">
                                                <input type="hidden" class="{{$value->id}}_user_county" value="{{ $value->county}}">
                                                <input type="hidden" class="{{$value->id}}_address_post_code" value="{{ $value->post_code}}">
                                                <input type="hidden" class="{{$value->id}}_address_billing_country" value="{{ $value->billing_country}}">

                                                <button type="button" class="btn select-btn selc-addr" onclick="setAddress({{$value->user_id}},{{$value->id}})">Select</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="new-address-block">
                                <h3>Or enter a new Address</h3>
                                <div class="new-address-field">
                                    <!-- <input type="text" placeholder="Address Search...." class="form-control"> -->
                                    <button type="submit" class="btn" onclick="addAddress()">Add New Address</button>
                                </div>
                            </div>
                            <div class="step-btn-wrap mt-4">
                                <button class="btn prev-btn">Cancel</button>
                            </div>
                        </div>

                        <div class="sectiongap customer-signup-s1 addAddressForm d-none">
                            <div class="container">
                                <div class="sec-common-title-s2">
                                    <h1>Add New Address
                                    </h1>

                                </div>
                                <form action="{{ route('register-new-address')}}" method="POST" class="form-register register">
                                    @csrf

                                    <fieldset class="border p-3">
                                        <div class="row p-3" style="padding-top: 0 !important;">

                                            <div class="form-row form-group ">
                                                <label>House Name / Number: &nbsp;<abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" id="house_noNew" name="house_noNew" class="input-text form-control @error('house_noNew') is-invalid @enderror">
                                                    @error('house_noNew')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="billing_title">Street:&nbsp;<abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="streetNew" id="streetNew" class="input-text form-control @error('streetNew') is-invalid @enderror">
                                                    @error('streetNew')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                            </div>

                                            <div class="form-row col-md-12 form-group">
                                                <label for="billing_first_name">Locality:
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="localityNew" id="localityNew" class="input-text form-control">

                                                </span>

                                            </div>

                                            <div class="form-row col-md-12 form-group">
                                                <label for="billing_first_name">Town:&nbsp;<abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="townNew" id="townNew" class="input-text form-control @error('townNew') is-invalid @enderror">
                                                    @error('townNew')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="form-row col-md-12 form-group">
                                                <label for="billing_first_name">County:&nbsp;
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="countyNew" id="countyNew" class="input-text form-control @error('countyNew') is-invalid @enderror">
                                                </span>

                                            </div>
                                            <div class="form-row col-md-12 form-group">
                                                <label for="billing_first_name">Post Code:&nbsp;<abbr class="required" title="required">*</abbr>
                                                </label>

                                                <span class="input-wrapper">
                                                    <input type="text" name="post_codeNew" id="zip_code" class="input-text form-control @error('post_codeNew') is-invalid @enderror">
                                                    @error('post_codeNew')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                                                <label for="billing_country">Country&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <span class="input-wrapper">

                                                    <select id="billing_countryNew" name="billing_countryNew" class="  @error('billing_countryNew') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                                        <option value="">Select a country / region…</option>
                                                        <option value="72" selected>England</option>
                                                        @foreach ($countries as $country)
                                                        <option value="{{$country['id']}}">{{$country['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('billing_countryNew')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                            </div>


                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <button type="submit" onClick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: Particulars sec ================ -->
@endsection

@section('script')

<script>
    function editAddress(id) {
        console.log(id);
        $(".hideEdit").hide();
        $('.edit_from').removeClass('d-none');

        const house_number = $(`.${id}_add_house_number`).val();
        const add_street = $(`.${id}_add_street`).val();
        const add_locality = $(`.${id}_add_locality`).val();
        const add_town = $(`.${id}_add_town`).val();
        const user_county = $(`.${id}_user_county`).val();
        const address_post_code = $(`.${id}_address_post_code`).val();
        const address_billing_country = $(`.${id}_address_billing_country`).val();

        $(`#add_id`).val(id);
        $(`#house_no1`).val(house_number);
        $(`#street1`).val(add_street);
        $(`#locality1`).val(add_locality);
        $(`#town1`).val(add_town);
        $(`#county1`).val(user_county);
        $(`#post_code`).val(address_post_code);

        document.getElementById("billing_country").value = `${address_billing_country}`;
    }

    function addAddress() {
        $(".hideEdit").hide();
        $('.addAddressForm').removeClass('d-none');
    }

    function setAddress(a, b) {
        alert(a + '' + b);
    }

    function setAddress(userId, addressId) {
        var url = "{{ route('registered-address') }}";



        $(this).text('please wait..');
        $.ajax({
            url: "{!! route('update-address') !!}",
            type: 'GET',
            data: {
                user_id: userId,
                address_id: addressId
            },
            success: function(result) {
                setTimeout(function() {
                    $('.selc-addr').text('Select');
                }, 2000);

                location.href = url;
            }
        });

    }

    $('.saveAddress').click(function() {
        var id = $('#add_id').val();
        var number = $('#house_no1').val();
        var steet = $('#street1').val();
        var locality = $('#locality1').val();
        var town = $('#town1').val();
        var county = $('#county1').val();
        var postcode = $('#post_code').val();
        var contry = $('#billing_country').val();

        if (county == undefined) {
            county = "";
        }

        if (number != undefined && steet != undefined && locality != undefined && town != undefined && postcode != undefined && contry != undefined) {
            //
            $.ajax({
                url: "{!! route('selected-address-save') !!}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id,
                    number,
                    steet,
                    locality,
                    town,
                    county,
                    postcode,
                    contry,
                },
                success: function(result) {
                    location.reload(true);
                }
            });
        }
    })

    $('#findAddress').click(function() {
        var post_code = $("#post_code").val();
        if (post_code == "") {
            $('.adderr').html('Please enter zipcode');
            return false;
        } else {
            $('#zip').val(post_code);
            $('.adderr').html('');
        }
        $('#findAddress').html('Please Wait...');
        $.ajax({
            url: "{!! route('find-address') !!}",
            type: 'GET',
            data: {
                post_code: post_code
            },
            success: function(result) {

                $("#exampleModalCenterAddress").show();
                $("#post_address_blk").html(result);
                $('#findAddress').html('Find Address');
            }
        });
    });
</script>
@endsection
