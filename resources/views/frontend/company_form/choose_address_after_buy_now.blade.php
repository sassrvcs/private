@extends('layouts.app')
@section('content')
    <!-- ================ start: common-inner-page-banner ================ -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
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
                    <li><a href="index.html">Home</a></li>
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
                                    <li id="menu-item-2336"
                                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown nav-item nav-item-2336">
                                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="_mi _before fa fa-user" aria-hidden="true"></i><span>My
                                                Account</span></a>
                                        <ul class="dropdown-menu depth_0">
                                            <li id="menu-item-2337"
                                                class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item nav-item nav-item-2337">
                                                <a href="#" class="dropdown-item active"><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>Overview</span></a>
                                            </li>
                                            <li id="menu-item-2338"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2338">
                                                <a href="my-details.html" class="dropdown-item "><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>My Details</span></a>
                                            </li>
                                            <li id="menu-item-2339"
                                                class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-2339">
                                                <a href="#" class="dropdown-item "><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-2340"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2340">
                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="_mi _before fa fa-book"
                                                aria-hidden="true"></i><span>Orders</span></a>
                                        <ul class="dropdown-menu depth_0">
                                            <li id="menu-item-4625"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4625">
                                                <a href="#" class="dropdown-item ">View All Orders</a>
                                            </li>
                                            <li id="menu-item-4636"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4636">
                                                <a href="#" class="dropdown-item ">Incomplete</a>
                                            </li>
                                            <li id="menu-item-4643"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4643">
                                                <a href="#" class="dropdown-item ">In Progress</a>
                                            </li>
                                            <li id="menu-item-4639"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4639">
                                                <a href="#" class="dropdown-item ">Completed</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-2341"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2341">
                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="_mi _before fa fa-industry"
                                                aria-hidden="true"></i><span>Companies</span></a>
                                        <ul class="dropdown-menu depth_0">
                                            <li id="menu-item-2371"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2371">
                                                <a href="#" class="dropdown-item "><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>View All Companies</span></a>
                                            </li>
                                            <li id="menu-item-4655"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-4655">
                                                <a href="#" class="dropdown-item ">Incorporate New Company</a>
                                            </li>
                                            <li id="menu-item-4656"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4656">
                                                <a href="#" class="dropdown-item ">Import Company via Auth. Code</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-2342"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2342">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="_mi _before fa fa-puzzle-piece"
                                                aria-hidden="true"></i><span>Services</span></a>
                                        <ul class="dropdown-menu depth_0">
                                            <li id="menu-item-3969"
                                                class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3969">
                                                <a href="#" class="dropdown-item "><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>All Services</span></a>
                                            </li>
                                            <li id="menu-item-3968"
                                                class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3968">
                                                <a href="#" class="dropdown-item "><i
                                                        class="_mi _before fa fa-angle-right"
                                                        aria-hidden="true"></i><span>Services Expired</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-2343"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2343">
                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="_mi _before fas fa-chart-pie"
                                                aria-hidden="true"></i><span>Finances</span></a>
                                        <ul class="dropdown-menu depth_0">
                                            <li id="menu-item-5096"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5096">
                                                <a href="#" class="dropdown-item ">Invoive History</a>
                                            </li>
                                            <li id="menu-item-5099"
                                                class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5099">
                                                <a href="#" class="dropdown-item ">Payment History</a>
                                            </li>
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
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'particulars', 'data' => 'previous']) }}"
                                            style="color: #ffffff;"> Particulars</a>
                                    </p>
                                </div>
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>Registered Address</p>
                                </div>
                                <div class="bottom-step-items" onclick="gotToBusinessAddressPage()">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Business Address</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Appointment</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Document</p>
                                </div>
                            </div>

                            {{-- Edit  form div --}}
                            <div class="customer-signup-s1">
                                <div class="form-wrap edit_from d-none">
                                    <div class="form-info-block">
                                        <h4>Registered Address</h4>
                                        <h5 class="edit-add-ttl">Edit Address</h5>
                                        <form class="form-register">
                                            <fieldset class="border p-3">
                                                <input type="hidden" id="add_id" class="add_id" name="add_id"
                                                    value="{{ !empty($address) && $address['id'] !== '' ? $address['id'] : '' }}"
                                                    readonly>

                                                <div class="form-row form-group ">
                                                    <label>Name / Number *:&nbsp;
                                                        </span>
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" id="house_no1" name="house_no"
                                                            value="{{ !empty($address) && $address['house_number'] !== '' ? $address['house_number'] : '' }}"
                                                            class="input-text form-control house_no blankCheck">
                                                        <div class="error d-none" style="color:red;">House number is
                                                            required.</div>

                                                    </span>
                                                </div>
                                                <div class="form-row form-group ">
                                                    <label for="billing_title">Street *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text"
                                                            value="{{ !empty($address) && $address['street'] !== '' ? $address['street'] : '' }}"
                                                            name="street" id="street1"
                                                            class="input-text form-control steet_no blankCheck">
                                                        <div class="error d-none" style="color:red;">Street is required.
                                                        </div>
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="locality">Locality:
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text"
                                                            value="{{ !empty($address) && $address['locality'] !== '' ? $address['locality'] : '' }}"
                                                            name="street" name="locality" id="locality1"
                                                            class="input-text form-control locality">
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="town">Town *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="town"
                                                            value="{{ !empty($address) && $address['town'] !== '' ? $address['town'] : '' }}"
                                                            id="town1"
                                                            class="input-text form-control town blankCheck">
                                                        <div class="error d-none" style="color:red;">Town is required.
                                                        </div>
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="county">County:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="county"
                                                            value="{{ !empty($address) && $address['county'] !== '' ? $address['county'] : '' }}"
                                                            id="county1" class="input-text form-control county">
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="postcode">Post Code *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" id="post_code"
                                                            value="{{ !empty($address) && $address['post_code'] !== '' ? $address['post_code'] : '' }}"
                                                            name="post_code"
                                                            class="input-text form-control zip blankCheck">
                                                        <div class="error d-none" style="color:red;">Post Code is
                                                            required.</div>
                                                    </span>
                                                </div>
                                                <div class="form-row update_totals_on_change form-group">
                                                    <label for="billing_country">Country&nbsp;</label>
                                                    <span class="input-wrapper">
                                                        <select name="billing_country" id="billing_country"
                                                            name="billing_country"
                                                            class="contry country_to_state country_select form-control"
                                                            data-label="Country" autocomplete="country"
                                                            data-placeholder="Select a country / region…">
                                                            <option value="">Select a country / region…</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country['id'] }}"
                                                                    {{ !empty($address) && $country['id'] == $address['billing_country'] ? 'selected' : '' }}>
                                                                    {{ $country['name'] }}</option>
                                                            @endforeach

                                                        </select>
                                                    </span>

                                                </div>

                                                <div class="step-btn-wrap mt-4">
                                                    <button type="button" class="btn saveAddress">Save & Continue <img
                                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                {{-- End Edit  form div --}}

                                <div class="form-wrap hideEdit {{ $forwardingAddVal !== null ? 'd-none' : '' }}">
                                    <div class="form-info-block">
                                        <h4>Registered Address</h4>
                                    </div>
                                    <div class="choose-own-address mb-2">
                                        <h3>Forwarding Address</h3>
                                        <h5>Tell us where to forward your mail to you, by entering your address below.</h5>
                                    </div>

                                    <div class="choose-own-address">
                                        <h3>Choose to use your own address</h3>
                                        <div class="src-are">
                                            <input type="text" placeholder="Address Search...." onkeyup="searchBar()"
                                                id="searchBar_id" class="form-control">
                                            @if (!empty($used_address))
                                                @foreach ($used_address as $key => $value)
                                                    <input type="text" class="form-control d-none addressSelect"
                                                        data-search="{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }},{{ $value->billing_country }}"
                                                        data-id="{{ $value->id }}"
                                                        value="{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }},{{ $value->billing_country }}"
                                                        onclick="selectedForwardAdd({{ $value->id }})" readonly>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="recently-used-addresses">
                                        <h4>Recently used Addresses</h4>
                                        <div class="row">
                                            @if (!empty($used_address))
                                                @foreach ($used_address as $key => $value)
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="used-addresses-panel">
                                                            <div class="text">
                                                                <p>{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }},{{ $value->billing_country }}
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrap">
                                                                <button type="submit" class="btn"
                                                                    onclick="editAddress('{{ $value->id }}')">Edit</button>
                                                                <input type="hidden" class="{{ $value->id }}_add_id"
                                                                    value="{{ $value->id }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_add_house_number"
                                                                    value="{{ $value->house_number }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_add_street"
                                                                    value="{{ $value->street }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_add_locality"
                                                                    value="{{ $value->locality }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_add_town"
                                                                    value="{{ $value->town }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_user_county"
                                                                    value="{{ $value->county }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_address_post_code"
                                                                    value="{{ $value->post_code }}">
                                                                <input type="hidden"
                                                                    class="{{ $value->id }}_address_billing_country"
                                                                    value="{{ $value->billing_country }}">

                                                                <button type="button" class="btn select-btn selc-addr"
                                                                    onclick="selectedForwardAdd('{{ $value->id }}')">Select</button>
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
                                            <!-- <button type="submit" class="btn" onclick="addAddress()">Select</button> -->
                                            <button type="submit" class="btn" onclick="addAddress()">Add New
                                                Address</button>
                                        </div>
                                    </div>
                                    <div class="step-btn-wrap mt-4">
                                        @if ($forwardingAddVal !== null)
                                            <button class="btn prev-btn" onclick="cancelPage()">Cancel</button>
                                        @else
                                            <button class="btn prev-btn" onclick="cancelPageTwo()">Cancel</button>
                                        @endif
                                    </div>
                                </div>

                                <!-- ///////////////////////////////////////////////////d-none/////////////////////////////////////////////////////////// -->
                                <div class="sectiongap customer-signup-s1 addAddressForm d-none">
                                    <div class="container">
                                        <div class="sec-common-title-s2">
                                            <h1>Add New Address
                                            </h1>

                                        </div>
                                        <form action="{{ route('register-new-address') }}" method="POST"
                                            class="form-register register">
                                            @csrf

                                            <fieldset class="border p-3">
                                                <div class="row p-3" style="padding-top: 0 !important;">
                                                    <div class="form-row form-group">
                                                        <label>Post Code: </label>
                                                        <div class="input-wrapper with-rg-btn">
                                                            <input type="text" class="form-control"
                                                                id="post_code_for_search">
                                                            <button type="button" class="btn btn-primary"
                                                                id="findAddress">Find
                                                                Address</button>
                                                        </div>

                                                    </div>

                                                    <div class="form-row form-group ">
                                                        <label>House Name / Number: &nbsp;<abbr class="required"
                                                                title="required">*</abbr>
                                                        </label>
                                                        <span class="input-wrapper">
                                                            <input type="hidden" id="cdabn" name="cdabn"
                                                                value="cdabn">

                                                            <input type="text" id="house_noNew" name="house_noNew"
                                                                class="input-text form-control @error('house_noNew') is-invalid @enderror blankCheckForNewEntry">
                                                            <div class="error d-none" style="color:red;">House number is
                                                                required.</div>
                                                        </span>

                                                    </div>
                                                    <div class="form-row form-group ">
                                                        <label for="billing_title">Street:&nbsp;<abbr class="required"
                                                                title="required">*</abbr>
                                                        </label>
                                                        <span class="input-wrapper">
                                                            <input type="text" name="streetNew" id="streetNew"
                                                                class="input-text form-control @error('streetNew') is-invalid @enderror blankCheckForNewEntry">
                                                            <div class="error d-none" style="color:red;">Street is
                                                                required.</div>
                                                        </span>

                                                    </div>

                                                    <div class="form-row col-md-12 form-group">
                                                        <label for="billing_first_name">Locality:
                                                        </label>
                                                        <span class="input-wrapper">
                                                            <input type="text" name="localityNew" id="localityNew"
                                                                class="input-text form-control">

                                                        </span>

                                                    </div>

                                                    <div class="form-row col-md-12 form-group">
                                                        <label for="billing_first_name">Town:&nbsp;<abbr class="required"
                                                                title="required">*</abbr>
                                                        </label>
                                                        <span class="input-wrapper">
                                                            <input type="text" name="townNew" id="townNew"
                                                                class="input-text form-control @error('townNew') is-invalid @enderror blankCheckForNewEntry">
                                                            <div class="error d-none" style="color:red;">Town is required.
                                                            </div>
                                                        </span>

                                                    </div>
                                                    <div class="form-row col-md-12 form-group">
                                                        <label for="billing_first_name">County:&nbsp;
                                                        </label>
                                                        <span class="input-wrapper">
                                                            <input type="text" name="countyNew" id="countyNew"
                                                                class="input-text form-control @error('countyNew') is-invalid @enderror">
                                                        </span>

                                                    </div>
                                                    <div class="form-row col-md-12 form-group">
                                                        <label for="billing_first_name">Post Code:&nbsp;<abbr
                                                                class="required" title="required">*</abbr>
                                                        </label>

                                                        <span class="input-wrapper">
                                                            <input type="text" name="post_codeNew" id="zip_code"
                                                                class="input-text form-control @error('post_codeNew') is-invalid @enderror blankCheckForNewEntry">
                                                            <div class="error d-none" style="color:red;">Post Code is
                                                                required.</div>
                                                        </span>

                                                    </div>
                                                    <div
                                                        class="form-row update_totals_on_change col-md-12 col-12 form-group">
                                                        <label for="billing_country">Country&nbsp;<abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <span class="input-wrapper">

                                                            <select id="billing_countryNew" name="billing_countryNew"
                                                                class="  @error('billing_countryNew') is-invalid @enderror country_to_state country_select form-control"
                                                                data-label="Country" autocomplete="country"
                                                                data-placeholder="Select a country / region…">
                                                                <option value="">Select a country / region…</option>
                                                                <option value="72" selected>England</option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country['id'] }}">
                                                                        {{ $country['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('billing_countryNew')
                                                                <div class="error" style="color:red;">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </span>

                                                    </div>


                                                </div>
                                            </fieldset>
                                            <div class="mb-3">
                                                <button type="button" onClick="AddMoreAddSave(this)"
                                                    class="btn btn-primary">Submit</button>
                                                <!-- <button type="submit" onClick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';" class="btn btn-primary">Submit</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- ////////////////////////////////////////////d-none////////////////////////////////////////////////////////////////////// -->
                                {{-- End Edit  form div --}}
                                <div
                                    class="form-wrap buyNowAfterSelectingAdd {{ $forwardingAddVal !== null ? '' : 'd-none' }}">
                                    <div class="form-info-block">
                                        <h4>Registered Address</h4>
                                        <div class="loader" style="display:none"></div>
                                        <div class="desc mb-3 ">
                                            <div class="icon">
                                                <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="text">
                                                <h5>Registered Office (required)</h5>
                                                <ul>
                                                    <li>All companies require having a registered office address located in
                                                        the same country as they are registered.</li>
                                                    <li>It is the address to which all Companies House, HMRC and other
                                                        official letters will be sent and must always be a physical address
                                                        (e.g. not a PO Box or DX).</li>
                                                    <li><b>The address of the registered office must appear on all company
                                                            correspondence and publications.</b></li>
                                                    <li><b>A company’s registered office address is available to view by the
                                                            public free of charge.</b></li>
                                                    <li>If you purchase our registered office address service, we will
                                                        forward all official mail to an address of your choosing.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="own-address ">
                                        <div class="info">
                                            <h3>Forwarding Address</h3>

                                            <?php
                                        if ($forwardingAddVal !== null) {
                                        ?>
                                            <p>{{ $address['house_number'] }},{{ $address['street'] }},{{ $address['locality'] }},{{ $address['town'] }},{{ $address['county'] }},{{ $address['post_code'] }}
                                            </p>
                                            <?php
                                        }
                                        ?>

                                            <!-- <p><span id="forwarding_house_number"></span>, <span id="forwading_street"></span>, <span id="forwading_locality"></span>, <span id="forwading_town"></span>, <span id="forwading_county"></span>, <span id="forwading_post_code"></span></p> -->

                                            <input type="hidden" id="forwading_add_id">
                                            <input type="hidden" id="forwading_house_no1">
                                            <input type="hidden" id="forwading_street1">
                                            <input type="hidden" id="forwading_locality1">
                                            <input type="hidden" id="forwading_town1">
                                            <input type="hidden" id="forwading_county1">
                                            <input type="hidden" id="forwading_post_code">
                                            <input type="hidden" id="forwading_billing_country">
                                        </div>
                                        <div class="btn-box">
                                            <a href="javascript:void(0)" type="button"
                                                class="btn edit-btn edit-addr">Edit Address</a>
                                            <!-- <a href="{{ route('choose-address-after-buy-now') }}" type="button" class="btn another-btn">Choose Another</a> -->
                                            <a type="button" class="btn another-btn"
                                                onclick="anotherForwardingAdd()">Choose Another</a>
                                        </div>
                                    </div>
                                    <div class="office-address ">
                                        <div class="top-block">
                                            <h3>Registered Office - London</h3>
                                            <div class="price-block">
                                                <strong>$39.00</strong>
                                                <p>Reserved annually at $39.00</p>
                                                <input type="hidden" value="39" id="registered_office_price">
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div class="tham-img">
                                                <img src="{{ asset('frontend/assets/images/address-img.png') }}"
                                                    alt="">
                                                <div class="tham-info">
                                                    <strong>London:</strong>
                                                    <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United
                                                        Kingdom</p>
                                                </div>
                                            </div>
                                            <div class="text-block">
                                                <h3>Protect the privacy of your home address</h3>
                                                <p>Mauris placerat ac lectus et bibendum. Aliquam tincidunt tristique
                                                    vulputate quisque tincidunt nisl vel risus imperdiet feugiat.</p>
                                                <div class="location-block">
                                                    <div class="addr">
                                                        <strong>London: </strong>
                                                    </div>
                                                    <div class="info">
                                                        <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE,
                                                            United Kingdom</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-block">
                                            <button class="btn" onclick="DetailsSection()">Details</button>
                                            <button class="btn buy-now-btn" onclick="gotoPage()">Remove</button>
                                        </div>
                                        <div class="details-desc d-none" id="DetailsSection_div">
                                            <h3>Why would I use your WC2 London Business Address Services?</h3>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="details-text">
                                                        <h4>Improve your corporate image</h4>
                                                        <p>A professional business address located in the heart of London
                                                            can provide a number of benefits for your business - boosting
                                                            your corporate image and extending your company’s presence.</p>
                                                        <p>You can use our address as your company’s primary correspondence
                                                            address, and we will forward all your business mail to an
                                                            alternative address of your choosing, on a daily basis.</p>
                                                        <p>This service is renewable on a 12 monthly basis at the cost of
                                                            £96.00+vat</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="details-text">
                                                        <h4>Benefits of our Business Address Services</h4>
                                                        <ul>
                                                            <li>Creates a professional, corporate image.</li>
                                                            <li>Gives the impression of a large, established business.</li>
                                                            <li>Provides an alternate contact address from your registered
                                                                office or home address that is exclusively used for
                                                                corresponding with clients, suppliers, investors and other
                                                                third parties.</li>
                                                            <li>Non-statutory general business mail is delivered to our
                                                                London address and forwarded to an alternate address of your
                                                                choice two times per week.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="details-text">
                                                        <p><strong>Please note:</strong> This service does not include a
                                                            registered office service, which should be purchased separately.
                                                            All general business mail will be handled by us and forwarded to
                                                            your UK or overseas address at the cost of Royal Mail postal
                                                            rates plus 15%.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-btn-wrap mt-4">
                                        <button class="btn prev-btn"><img
                                                src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}"
                                                alt="" onclick="previousParticulars()"> Previous:
                                            Particulars</button>
                                        <button class="btn" onclick="gotoBusinessAddressChoosePage()">Save & Continue
                                            <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ================ end: Particulars sec ================ -->

    <!--For Find Postal Code Address Api Modal Popup-->
    <div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
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
    <script>
        function gotToBusinessAddressPage() {
            window.location.href = "{{ route('choose-address-business') }}"
        }

        function DetailsSection() {
            $('#DetailsSection_div').toggleClass('d-none')
        }

        function previousParticulars() {
            window.location.href =
                "{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'particulars', 'data' => 'previous']) }}"
        }

        const searchBar = function() {
            const searchBarVal = $('#searchBar_id').val();

            const addVals = document.querySelectorAll('.addressSelect')
            const addValsArr = [...addVals];

            addValsArr.forEach(el => {
                addData = el.dataset.search;

                if (addData.startsWith(searchBarVal)) {
                    el.classList.remove('d-none');
                } else {
                    el.classList.add('d-none');
                }
            })

            if (searchBarVal === '') {
                addValsArr.forEach(el => {
                    el.classList.add('d-none');
                })
            }
        }

        const cancelPage = function() {
            window.location.href = "{{ route('choose-address-after-buy-now') }}"
        }
        const cancelPageTwo = function() {
            window.location.href = "{{ route('registered-address') }}"
        }

        const AddMoreAddSave = function(ths) {
            const requiredFields = document.querySelectorAll('.blankCheckForNewEntry');
            const requiredFieldsArr = [...requiredFields];

            let validation = 0;
            requiredFieldsArr.forEach(el => {
                if (el.value === '') {
                    el.classList.add('validation');
                    el.nextElementSibling.classList.remove('d-none');
                    return validation++;
                } else {
                    el.classList.remove('validation');
                    el.nextElementSibling.classList.add('d-none');
                }
            });


            if (validation === 0) {
                ths.form.submit();
                ths.disabled = true;
                ths.innerText = 'Hold on...';
            }
        }

        function anotherForwardingAdd() {
            $(".buyNowAfterSelectingAdd").hide();
            $('.hideEdit').removeClass('d-none');
        }

        function gotoPage() {
            $.ajax({
                url: "{!! route('remove-forwarding-address-section') !!}",
                type: 'get',
                success: function(result) {
                    setTimeout(function() {
                        $('.selc-addr').text('Select');
                    }, 2000);
                    window.location.href = "{{ route('registered-address') }}"
                }
            });
        };

        function gotoBusinessAddressChoosePage() {
            const price = $('#registered_office_price').val();

            $.ajax({
                url: "{!! route('save_company_in_shopping_cart') !!}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    price
                },
                success: function(response) {
                    window.location.href = "{{ route('choose-address-business') }}"
                },
            });

        };

        function selectedForwardAdd(id) {

            $.ajax({
                url: "{!! route('update-forwarding-registered-office-address') !!}",
                type: 'get',
                data: {
                    id
                },
                success: function(result) {
                    console.log(result);
                    setTimeout(function() {
                        $('.selc-addr').text('Select');
                    }, 2000);
                    window.location.reload()
                }
            });

            // $(".hideEdit").hide();
            // $('.buyNowAfterSelectingAdd').removeClass('d-none');

            // const house_number = $(`.${id}_add_house_number`).val();
            // const add_street = $(`.${id}_add_street`).val();
            // const add_locality = $(`.${id}_add_locality`).val();
            // const add_town = $(`.${id}_add_town`).val();
            // const user_county = $(`.${id}_user_county`).val();
            // const address_post_code = $(`.${id}_address_post_code`).val();
            // const address_billing_country = $(`.${id}_address_billing_country`).val();

            // document.getElementById("forwarding_house_number").textContent = `${house_number}`;
            // document.getElementById("forwading_street").textContent = `${add_street}`;
            // document.getElementById("forwading_locality").textContent = `${add_locality}`;
            // document.getElementById("forwading_town").textContent = `${add_town}`;
            // document.getElementById("forwading_county").textContent = `${user_county}`;
            // document.getElementById("forwading_post_code").textContent = `${address_post_code}`;
            // // document.getElementById("forwading_billing_country").textContent = `${address_billing_country}`;

            // $(`#forwading_add_id`).val(id);
            // $(`#forwading_house_no1`).val(house_number);
            // $(`#forwading_street1`).val(add_street);
            // $(`#forwading_locality1`).val(add_locality);
            // $(`#forwading_town1`).val(add_town);
            // $(`#forwading_county1`).val(user_county);
            // $(`#forwading_post_code`).val(address_post_code);
            // $(`#forwading_billing_country`).val(address_billing_country);

            // $(`#add_id`).val(id);
            // $(`#house_no1`).val(house_number);
            // $(`#street1`).val(add_street);
            // $(`#locality1`).val(add_locality);
            // $(`#town1`).val(add_town);
            // $(`#county1`).val(user_county);
            // $(`#post_code`).val(address_post_code);

            // document.getElementById("billing_country").value = `${address_billing_country}`;
        }

        $('.edit-addr').click(function() {
            $(".buyNowAfterSelectingAdd").hide();
            $('.edit_from').removeClass('d-none');
        });

        function editAddress(id) {
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

            const requiredFields = document.querySelectorAll('.blankCheck');
            const requiredFieldsArr = [...requiredFields];

            let validation = 0;
            requiredFieldsArr.forEach(el => {
                if (el.value === '') {
                    el.classList.add('validation');
                    el.nextElementSibling.classList.remove('d-none');
                    return validation++;
                } else {
                    el.classList.remove('validation');
                    el.nextElementSibling.classList.add('d-none');
                }
            });

            if (validation === 0) {
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
            var error = false;
            var post_code = $("#post_code_for_search").val();

            if (post_code != "") {
                $("#zip_code").val(post_code);
                error = false;

            } else {
                alert('Please enter post code');
                error = true;
            }
            if (error == false) {
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

        $(".btn-close").click(function() {
            $("#exampleModalCenterAddress").hide();
        })

        function selectPostalAddrApp(val) {
            var value = val.split(',');
            $("#house_noNew").val(value[0]);
            $("#streetNew").val(value[1]);
            $("#townNew").val(value[2]);
            $("#countyNew").val(value[3]);
            $("#exampleModalCenterAddress").hide();
        }
    </script>
@endsection
