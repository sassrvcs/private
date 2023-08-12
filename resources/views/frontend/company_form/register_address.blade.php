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
                <li><a href="{{ url('') }}">Home</a></li>
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
                                <p>
                                    <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address', 'data' => 'previous']) }}" style="color: #ffffff;"> Particulars</a>
                                </p>
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
                        <div class="customer-signup-s1">
                            <div class="form-wrap edit_from d-none">
                                <div class="form-info-block">
                                    <h4>Registered Address</h4>
                                    <h5 class="edit-add-ttl">Edit Address</h5>

                                    <form class="form-register">
                                        <input type="hidden" class="user_id" name="user_id" value="{{!empty($recent_addr) && $recent_addr['user_id'] !== '' ? $recent_addr['user_id']: ''}}">
                                        <input type="hidden" class="address_type" name="address_type" value="{{!empty($recent_addr) && $recent_addr['address_type'] !== '' ? $recent_addr['address_type']: ''}}">
                                        <input type="hidden" class="recent_addr_id" value="{{!empty($recent_addr) && $recent_addr['id'] !== '' ? $recent_addr['id']: ''}}" readonly>
                                        <fieldset class="border p-3">
                                            <div class="form-row form-group ">
                                                <label>Name / Number:&nbsp;
                                                    </span>
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" id="house_no1" name="house_no" class="input-text form-control house_no" value="{{!empty($recent_addr) && $recent_addr['house_number'] !== '' ? $recent_addr['house_number']: ''}}">

                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="billing_title">Street:&nbsp;
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="street" id="street1" class="input-text form-control steet_no" value="{{!empty($recent_addr) && $recent_addr['street'] !== '' ? $recent_addr['street']: ''}}">
                                                </span>

                                            </div>
                                            <div class="form-row form-group">
                                                <label for="locality">Locality:
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="locality" id="locality1" class="input-text form-control locality" value="{{!empty($recent_addr) && $recent_addr['locality'] !== '' ? $recent_addr['locality']: ''}}">
                                                </span>

                                            </div>
                                            <div class="form-row form-group">
                                                <label for="town">Town:&nbsp;
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="town" id="town1" class="input-text form-control town" value="{{!empty($recent_addr) && $recent_addr['town'] !== '' ? $recent_addr['town']: ''}}">
                                                </span>

                                            </div>
                                            <div class="form-row form-group">
                                                <label for="county">County:&nbsp;
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" name="county" id="county1" class="input-text form-control county" value="{{!empty($recent_addr) && $recent_addr['county'] !== '' ? $recent_addr['county']: ''}}">
                                                </span>

                                            </div>
                                            <div class="form-row form-group">
                                                <label for="postcode">Post Code:&nbsp;
                                                </label>
                                                <span class="input-wrapper">
                                                    <input type="text" id="post_code" name="post_code" class="input-text form-control zip" value="{{!empty($recent_addr) && $recent_addr['post_code'] !== '' ? $recent_addr['post_code']: ''}}">
                                                </span>
                                            </div>
                                            <div class="form-row update_totals_on_change form-group">
                                                <label for="billing_country">Country&nbsp;</label>
                                                <span class="input-wrapper">
                                                    <select name="billing_country" id="billing_country" name="billing_country" class="contry country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                                        <option value="">Select a country / region…</option>

                                                        @foreach ($countries as $country)
                                                        <option value="{{$country->id}}" {{ !empty($recent_addr) && $country->id == $recent_addr->billing_country ? 'selected' : '' }}>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>

                                            </div>

                                            <div class="step-btn-wrap mt-4">
                                                <button type="button" class="btn saveAddress">Save & Continuess <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--End Edit  form div--}}
                        <div class="form-wrap hideEdit">
                            <div class="form-info-block">
                                <h4>Registered Address</h4>
                                <div class="loader" style="display:none"></div>
                                <div class="desc mb-3 ">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h5>Registered Office (required)</h5>
                                        <ul>
                                            <li>All companies require having a registered office address located in the same country as they are registered.</li>
                                            <li>It is the address to which all Companies House, HMRC and other official letters will be sent and must always be a physical address (e.g. not a PO Box or DX).</li>
                                            <li><b>The address of the registered office must appear on all company correspondence and publications.</b></li>
                                            <li><b>A company’s registered office address is available to view by the public free of charge.</b></li>
                                            <li>If you purchase our registered office address service, we will forward all official mail to an address of your choosing.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="own-address ">
                                @if(!empty($recent_addr))
                                <div class="info">

                                    <h3>Choose to use your own address</h3>
                                    <p>{{isset($recent_addr->house_number) ? $recent_addr->house_number:''}}, {{ isset($recent_addr->street) ? $recent_addr->street:''}}, @if(!empty($recent_addr->locality)){{$recent_addr->locality}}, @endif {{isset($recent_addr->town) ? $recent_addr->town:''}}, {{isset($recent_addr->county) ? $recent_addr->county : ''}}, {{isset($recent_addr->post_code) ? $recent_addr->post_code:''}} </p>

                                </div>
                                <div class="btn-box">
                                    <a href="javascript:void(0)" type="button" class="btn edit-btn edit-addr">Edit Address</a>
                                    <a href="{{ route('choose-address')}}" type="button" class="btn another-btn">Choose Another</a>
                                </div>
                                @else
                                <div class="info">
                                    <h3>Choose to use your own address</h3>

                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('choose-address')}}" type="button" class="btn another-btn">Choose One</a>
                                </div>
                                @endif
                            </div>
                            <div class="office-address ">
                                <div class="top-block">
                                    <h3>Registered Office - London</h3>
                                    <div class="price-block">
                                        <strong>$39.00</strong>
                                        <p>Reserved annually at $39.00</p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <div class="tham-img">
                                        <img src="{{ asset('frontend/assets/images/address-img.png')}}" alt="">
                                        <div class="tham-info">
                                            <strong>London:</strong>
                                            <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United Kingdom</p>
                                        </div>
                                    </div>
                                    <div class="text-block">
                                        <h3>Protect the privacy of your home address</h3>
                                        <p>Mauris placerat ac lectus et bibendum. Aliquam tincidunt tristique vulputate quisque tincidunt nisl vel risus imperdiet feugiat.</p>
                                        <div class="location-block">
                                            <div class="addr">
                                                <strong>London: </strong>
                                            </div>
                                            <div class="info">
                                                <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United Kingdom</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-block">
                                    <button class="btn">Details</button>
                                    <button class="btn buy-now-btn" onclick="gotoPage()">Buy Now</button>
                                </div>
                            </div>
                            <div class="step-btn-wrap mt-4">
                                <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png')}}" alt=""> Previous: Particulars</button>
                                <button class="btn">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
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
    function gotoPage() {
        window.location.href = "{{ route('choose-address-after-buy-now')}}"
    };
    // $(document).ready(function(){
    //     setTimeout(function () {
    //       $(".loader").show();
    //    }, 3000);
    //    $(".loader").hide();
    // })
    $('.edit-addr').click(function() {

        $(".hideEdit").hide();
        $('.edit_from').removeClass('d-none');
    });
    $('.saveAddress').click(function() {
        var recent_addr = $('.recent_addr_id').val();
        var number = $('#house_no1').val();
        var steet = $('#street1').val();
        var locality = $('#locality1').val();
        var town = $('#town1').val();
        var county = $('#county1').val();
        var postcode = $('#post_code').val();
        var contry = $('#billing_country').val();
        var address_type = $('.address_type').val();
        var user_id = $('.user_id').val();
        if (county == undefined) {
            county = "";
        }


        if (number != undefined && steet != undefined && locality != undefined && town != undefined && postcode != undefined && contry != undefined && address_type != undefined && user_id != undefined) {
            //
            $.ajax({
                url: "{!! route('primary-address-save') !!}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    recent_addr,
                    number: number,
                    steet: steet,
                    locality: locality,
                    town: town,
                    county: county,
                    postcode: postcode,
                    contry: contry,
                    address_type: address_type,
                    user_id: user_id
                },
                success: function(result) {
                    location.reload(true);
                }
            });
        }
    })
</script>
@endsection