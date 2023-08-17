@extends('layouts.app')
@section('content')
    <!-- ================ start: common-inner-page-banner ================ -->
    <style>
        .director_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .shareholder_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .secretary_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .psc_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .own_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .vot_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .appo_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .other_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }
    </style>
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
                                    <p>Particulars</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Registered Address</p>
                                </div>
                                <div class="bottom-step-items" onclick="gotToBusinessAddressPage()">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Business Address</p>
                                </div>
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>Appointment</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Document</p>
                                </div>
                            </div>

                            <div class="form-wrap main_section">
                                <div class="form-info-block">
                                    <h4>Appointments</h4>
                                    <div class="desc mb-3">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Appointments</h5>
                                            <p>Nulla ultricies sapien in nibh luctus finibus. Fusce semper sem in ipsum
                                                molestie fermentum. Nulla facilisi. Fusce tincidunt mauris purus, vel
                                                vulputate urna efficitur vitae. Nunc libero tortor, ornare in neque posuere,
                                                feugiat facilisis tortor. Proin ac magna mi. Donec pharetra ullamcorper
                                                lectus eu venenatis.</p>
                                            <p>Aenean sodales ac nunc non dapibus. Cras eget ante volutpat, placerat nibh
                                                non, molestie orci. Vestibulum ante ipsum primis in faucibus orci luctus et
                                                ultrices posuere cubilia curae; Etiam vitae imperdiet sapien.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="office-address">
                                    <div class="top-block">
                                        <h3>Add An Offer</h3>
                                    </div>
                                    <div class="add-an-offer">
                                        <p>Click on one of the buttons below to add an officer to your company.</p>
                                        <div class="btn-wrap">
                                            <button type="submit" class="btn"
                                                onclick="showPersonSection(),currentTab('position')"><img
                                                    src="{{ asset('frontend/assets/images/person-icon.svg') }}"
                                                    alt=""> Person</button>
                                            <button type="submit" class="btn"><img
                                                    src="{{ asset('frontend/assets/images/corporate-icon.svg') }}"
                                                    alt=""> Corporate</button>
                                            <button type="submit" class="btn other-legal-btn"><img
                                                    src="{{ asset('frontend/assets/images/other-legal-entity-icon.svg') }}"
                                                    alt=""> Other Legal Entity</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-btn-wrap mt-4">
                                    <button class="btn prev-btn" onclick="gotToBusinessAddressPage()"><img
                                            src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}"
                                            alt=""> Previous: Business Address</button>
                                    <button class="btn">Save & Continue <img
                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                            alt=""></button>
                                </div>
                            </div>

                            {{-- APPOINTMENTS SECTION STARTS --}}
                            <div class="form-wrap person_section d-none">
                                <div class="form-info-block">
                                    <h4>Appointments</h4>
                                </div>
                                <div class="appointment-tab">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" onclick="currentTab('position')" id="position-tab"
                                                onclick="currentTab('position')" data-toggle="tab" href="#position"
                                                role="tab" aria-controls="position" aria-selected="true">Position</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="currentTab('officer')" id="officer-tab"
                                                data-toggle="tab" href="#officer" role="tab" aria-controls="officer"
                                                aria-selected="false">Officer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="currentTab('details')" id="details-tab"
                                                data-toggle="tab" href="#details" role="tab" aria-controls="details"
                                                aria-selected="false">Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="currentTab('addressing')" id="addressing-tab"
                                                data-toggle="tab" href="#addressing" role="tab"
                                                aria-controls="addressing" aria-selected="false">Addressing</a>
                                        </li>
                                        <li class="nav-item nocLinkCls d-none">
                                            <a class="nav-link" onclick="currentTab('nature-control')"
                                                id="nature-control-tab" data-toggle="tab" href="#nature-control"
                                                role="tab" aria-controls="nature-control"
                                                aria-selected="false">Nature of Control</a>
                                        </li>
                                        <li class="nav-item shareholderLinksCls d-none">
                                            <a class="nav-link" onclick="currentTab('share-holder')"
                                                id="share-holder-tab" data-toggle="tab" href="#share-holder"
                                                role="tab" aria-controls="share-holder" aria-selected="false">Share
                                                Holder</a>
                                        </li>
                                    </ul>

                                    {{-- Add Listing Section Starts --}}
                                    <div class="d-none" id="detailsTabAddList_id">

                                    </div>
                                    {{-- Add Listing Section Ends --}}

                                    <div class="tab-content" id="myTabContent">
                                        {{-- POSITION TAB SECTION STARTS --}}
                                        <div class="tab-pane fade show active" id="position" role="tabpanel"
                                            aria-labelledby="position-tab">
                                            <div class="position-area">
                                                <div class="form-info-block mb-0">
                                                    <div class="desc mb-0">
                                                        <div class="icon">
                                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text">
                                                            <h5>Directors and Shareholders</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Phasellus scelerisque porta enim ut interdum. Aliquam mollis
                                                                enim non purus laoreet, ut pretium lorem porta.</p>
                                                        </div>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="icon">
                                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text">
                                                            <h5>Persons with Significant Control (PSCs)</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Phasellus scelerisque porta enim ut interdum. Aliquam mollis
                                                                enim non purus laoreet, ut pretium lorem porta.</p>
                                                            <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim
                                                                ut interdum. Aliquam mollis enim non purus laoreet, ut
                                                                pretium lorem porta. Integer eleifend velit ut aliquam
                                                                convallis. Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Phasellus scelerisque porta enim ut
                                                                interdum. </p>
                                                            <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim
                                                                ut interdum. Aliquam mollis enim non purus laoreet:</p>
                                                            <ul>
                                                                <li>Consectetur adipiscing elit phasellus scelerisque porta
                                                                    enim ut interdum.</li>
                                                                <li>Aliquam mollis enim non purus laoreet, ut pretium lorem
                                                                    porta. </li>
                                                                <li>Integer eleifend velit ut aliquam convallis. </li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                </li>
                                                                <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                            </ul>
                                                            <h5>Am I a PSC?</h5>
                                                            <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim
                                                                ut interdum. Aliquam mollis enim non purus laoreet, ut
                                                                pretium lorem porta. Integer eleifend velit ut aliquam
                                                                convallis. Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Phasellus scelerisque porta enim ut
                                                                interdum. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="choose-possition-block">
                                                    <h4>Choose Position</h4>
                                                    <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut
                                                        interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem
                                                        porta. Integer eleifend velit ut aliquam convallis. Lorem ipsum
                                                        dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque
                                                        porta enim ut interdum.</p>
                                                    <div class="choose-possition-option">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" class="checkBoxPos" id="director"
                                                                    onclick="consentSection()">
                                                                <label for="director">Director <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt="" id="director_i"></span></label>
                                                                <span class="director_i_tooltip">A private limited company
                                                                    must have at least one director, being a natural person
                                                                    aged 16 years or over. A director is responsible for the
                                                                    day-to-day management of the business.</span>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="checkBoxPos"
                                                                    id="shareholder" onclick="shareholderTab()">
                                                                <label for="shareholder">Shareholderss <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt=""
                                                                            id="shareholder_i"></span></label>
                                                                <span class="shareholder_i_tooltip">Shareholders are the
                                                                    owners of the company and are generally entitled to a
                                                                    share of company profits. You must appoint at least one
                                                                    shareholder.</span>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="checkBoxPos" id="secretary"
                                                                    onclick="consentSection()">
                                                                <label for="secretary">secretary <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt=""
                                                                            id="secretary_i"></span></label>
                                                                <span class="secretary_i_tooltip">There is no legal
                                                                    requirement to appoint a company secretary, however, you
                                                                    may choose to appoint one if you wish.

                                                                    The company secretary is responsible for advising the
                                                                    directors and shareholders on running the business in
                                                                    accordance with and in compliance with the Companies
                                                                    Act, and keeps the statutory records up to date.</span>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="checkBoxPos" id="psc"
                                                                    onclick="pscTab()">
                                                                <label for="psc">Person with Significant Control (PSC)
                                                                    <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt="" id="psc_i"></span></label>
                                                                <span class="psc_i_tooltip">A Person with Significant
                                                                    Control (PSC) is any person that ultimately controls
                                                                    more than 25% of the company. An individual, a UK
                                                                    registered company and certain other legal entities may
                                                                    be listed as PSCs.

                                                                    It is now a legal requirement to identify the PSCs of a
                                                                    company. Please tick the Person with Significant Control
                                                                    (PSC) box if you qualify as a PSC of this
                                                                    company.</span>
                                                            </li>

                                                            <br class="brCls d-none">

                                                            <li class="occLinkCls d-none">
                                                                <input type="checkbox" id="occ">
                                                                <label for="occ" id="consentText_id">The officers
                                                                    confirm they have
                                                                    consented to act as a Director or Secretary</label>
                                                            </li>
                                                            <div class="error d-none" id="consentSelectionDiv"
                                                                style="color:red;">This officer must give their consent in
                                                                order to be appointed on this company.</div>
                                                        </ul>
                                                        <div class="error d-none" id="positionSelectionDiv"
                                                            style="color:red;">You have to
                                                            select a Position.</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- POSITION TAB SECTION ENDS --}}

                                        {{-- OFFICER TAB SECTION STARTS --}}
                                        <div class="tab-pane fade" id="officer" role="tabpanel"
                                            aria-labelledby="officer-tab">
                                            <div class="particulars-form-wrap pt-0 pb-">
                                                <div class="form-wrap pb-0 pt-0">
                                                    <div class="choose-own-address">
                                                        <h3>Search Officers</h3>
                                                        <div class="src-are">
                                                            <input type="text" placeholder="Search Officer name...."
                                                                onkeyup="searchBar()" id="searchBar_id"
                                                                class="form-control">
                                                            @if (!empty($person_officers))
                                                                @foreach ($person_officers as $offVal)
                                                                    <input type="hidden"
                                                                        class="offValId_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['id'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValtitle_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['title'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValdob_day_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['dob_day'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValdob_month_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['dob_month'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValdob_year_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['dob_year'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValfirst_name_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['first_name'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offVallast_name_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['last_name'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValnationality_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['nationality'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValoccupation_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['occupation'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValadd_id_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['add_id'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValauthenticate_one_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_one'] }}"
                                                                        readonly>
                                                                    <input type="hidden"
                                                                        class="offValauthenticate_one_ans_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_one_ans'] }}"
                                                                        readonly>
                                                                    <input type="hidden"
                                                                        class="offValIdauthenticate_two_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_two'] }}"
                                                                        readonly>
                                                                    <input type="hidden"
                                                                        class="offValIdauthenticate_two_ans_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_two_ans'] }}"
                                                                        readonly>
                                                                    <input type="hidden"
                                                                        class="offValIdauthenticate_three_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_three'] }}"
                                                                        readonly>
                                                                    <input type="hidden"
                                                                        class="offValIdauthenticate_three_ans_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['authenticate_three_ans'] }}"
                                                                        readonly>
                                                                    <input type="text"
                                                                        class="form-control d-none officerSelect"
                                                                        data-search="{{ $offVal['title'] }},{{ $offVal['dob_day'] }}-{{ $offVal['dob_month'] }}-{{ $offVal['dob_year'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}"
                                                                        value="{{ $offVal['title'] }},{{ $offVal['dob_day'] }}-{{ $offVal['dob_month'] }}-{{ $offVal['dob_year'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}"
                                                                        onclick="choosedOfficer('{{ $offVal['id'] }}')"
                                                                        readonly>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="recently-used-addresses mb-3">
                                                        <h4>Recent Officers</h4>

                                                        @if (!empty($person_officers))
                                                            @foreach ($person_officers as $offVal)
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="used-addresses-panel">
                                                                            <div class="text">
                                                                                <p>{{ $offVal['title'] }},{{ $offVal['dob_day'] }}-{{ $offVal['dob_month'] }}-{{ $offVal['dob_year'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="btn-wrap">
                                                                                <button type="button"
                                                                                    onclick="choosedOfficer('{{ $offVal['id'] }}')"
                                                                                    class="btn select-btn">Choose</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                    <div class="recently-used-addresses">
                                                        <h4>Create a new Officer</h4>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="used-addresses-panel">
                                                                    <!-- <div class="text">
                                                                                                                                                                            <p>1st Formations Ltd, 71-75, Shelton Steel, LONDON, WC2H 9JQ, UNI... </p>
                                                                                                                                                                        </div> -->
                                                                    <div class="btn-wrap">
                                                                        <!-- <button type="submit" class="btn select-btn">Select</button> -->
                                                                        <button type="submit" class="btn"
                                                                            onclick="addNewOfficer(),currentTab('details')">Add
                                                                            New Officer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- OFFICER TAB SECTION ENDS --}}

                                        <!-- DETAILS TAB SECTION STARTS-->
                                        <div class="tab-pane fade" id="details" role="tabpanel"
                                            aria-labelledby="details-tab">

                                            {{-- DETAILSTAB LANDING PAGE STARTS --}}
                                            <div id="detailsTabLandingPage_id">
                                                <div class="form-info-block">
                                                    <div class="desc">
                                                        <div class="icon">
                                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text">
                                                            <h5>Personal Details</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Phasellus scelerisque porta enim ut interdum. Aliquam mollis
                                                                enim non purus laoreet, ut pretium lorem porta.</p>
                                                        </div>
                                                    </div>
                                                    <h4>Officer Details</h4>
                                                </div>
                                                <div class="form-block">
                                                    <input type="hidden" id="personOfficerEditId" readonly>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Title *:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="person_tittle_id" name="person_tittle">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Date of Birth *:</label>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <select class="form-control blankCheck"
                                                                            id="person_bday_id" name="person_bday">
                                                                            <option value="">dd</option>
                                                                            <option value="01">01</option>
                                                                            <option value="02">02</option>
                                                                            <option value="03">03</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <select class="form-control blankCheck"
                                                                            id="person_bmon_id" name="person_bmon">
                                                                            <option value="">mm</option>
                                                                            <option value="01">01</option>
                                                                            <option value="02">02</option>
                                                                            <option value="03">03</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <select class="form-control blankCheck"
                                                                            id="person_byear_id" name="person_byear">
                                                                            <option value="">yyyy</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                            <option value="2022">2022</option>
                                                                            <option value="2023">2023</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">First Name(s) *:</label>
                                                                <input type="text" name="person_fname"
                                                                    id="person_fname_id" class="form-control blankCheck">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Nationality - <small>of accepted
                                                                        nationalities *: </small></label>
                                                                <select name="person_national"
                                                                    class="form-control" id="person_national_id">
                                                                    @if (!empty($countries))
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country['id'] }}">
                                                                                {{ $country['name'] }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                    <option value=""></option>
                                                                </select>
                                                                {{-- <input type="text" class="form-control blankCheck"
                                                                    id="person_national_id" name="person_national"> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Last Name *:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="person_lname_id" name="person_lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Occupation</label>
                                                                <input type="text" class="form-control"
                                                                    id="person_occupation_id" name="person_occupation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Residential Address selection starts --}}
                                                <div class="rsidential-address-info mb-4">
                                                    <h3>Residential Address</h3>

                                                    <input type="hidden" id="ChossenResAdd_id" readonly>
                                                    <p><strong>Please Note :</strong> <span>It is a legal requirement to
                                                            provide your actual residential address. Supplying an address
                                                            which is not your actual residential address, will lead to the
                                                            rejection of your new company registration.</span></p>
                                                    <p class="d-none" id="ChossenResAdd"></p>

                                                    <div class="btn-block">
                                                        <button class="btn buy-now-btn res_choose_one_cl"
                                                            onclick="chooseAddRess('residential','select')">Choose One</button>
                                                        <button class="btn buy-now-btn res_choose_another_cl d-none"
                                                            onclick="chooseAddRess('residential','select')">Choose Another</button>
                                                    </div>
                                                    <div class="btn-block residentialAddChosed_cl d-none">
                                                        <button class="btn">Edit</button>
                                                        <button class="btn buy-now-btn">Choose Another</button>
                                                    </div>
                                                </div>
                                                {{-- Residential Address selection ends --}}

                                                <div class="form-info-block d-none" id="authenticationSection">
                                                    <h4 class="mb-5">Authentication Questions</h4>
                                                    <div class="authe-qu-block">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqone_id"
                                                                        name="person_aqone">
                                                                        <option value="Mother’s Maiden Name">Mother’s
                                                                            Maiden
                                                                        <option value="Father's Forename">Father's Forename
                                                                        <option value="Town Of Birth">Town Of Birth
                                                                        <option value="Telephone Number">Telephone Number
                                                                        <option value="National insurance">National
                                                                            insurance
                                                                        <option value="Passport Number">Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqone_ans_id" name="person_aqone_ans">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqtwo_id"
                                                                        name="person_aqtwo">
                                                                        <option value="Father's Forename">Father's Forename
                                                                        <option value="Mother’s Maiden Name">Mother’s
                                                                            Maiden
                                                                        <option value="Town Of Birth">Town Of Birth
                                                                        <option value="Telephone Number">Telephone Number
                                                                        <option value="National insurance">National
                                                                            insurance
                                                                        <option value="Passport Number">Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqtwo_ans_id" name="person_aqtwo_ans">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqthree_id"
                                                                        name="person_aqthree">
                                                                        <option value="Town Of Birth">Town Of Birth
                                                                        <option value="Mother’s Maiden Name">Mother’s
                                                                            Maiden
                                                                        <option value="Father's Forename">Father's Forename
                                                                        <option value="Telephone Number">Telephone Number
                                                                        <option value="National insurance">National
                                                                            insurance
                                                                        <option value="Passport Number">Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqthree_ans_id"
                                                                        name="person_aqthree_ans">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- DETAILSTAB LANDING PAGE ENDS --}}

                                            

                                            {{-- Details Edit form div starts --}}
                                            <div class="form-wrap edit_from_residential d-none">
                                                <div class="form-info-block">
                                                    <h4>Service Address</h4>

                                                    <div id="editFormAjaxLoadResidentialSection">

                                                    </div>

                                                </div>
                                            </div>
                                            {{-- Details Edit form div ends --}}

                                            {{-- DETAILS TAB NEW ADDRESS FORM SECTION STARTS --}}
                                            <div id="details_tab_new_address_form">

                                            </div>
                                            {{-- DETAILS TAB NEW ADDRESS FORM SECTION ENDS --}}
                                        </div>
                                        <!-- DETAILS TAB SECTION ENDS-->

                                        {{-- ADDRESS TAB SECTION STARTS --}}
                                        <div class="tab-pane fade" id="addressing" role="tabpanel"
                                            aria-labelledby="addressing-tab">

                                            {{-- ADDRESS TAB Landing Page starts --}}
                                            <div id="serviceAddLandingSection">

                                                <div class="form-info-block">
                                                    <h4>Service Address</h4>
                                                    <div class="loader" style="display:none"></div>
                                                    <div class="desc mb-3 ">
                                                        <div class="icon">
                                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text">
                                                            <h5>Service Address</h5>
                                                            <p>Directors, subscribers (shareholders at the time of company
                                                                incorporation), secretaries and PSCs (eg. shareholders who
                                                                own more than 25% of the company's shares) are obliged to
                                                                file a Service Address with the Registrar of Companies. The
                                                                Service Address is made public.

                                                                There is nothing to stop you from using your Residential
                                                                Address as your Service Address, but if you would prefer to
                                                                keep this information confidential and off the public
                                                                register, then using our London address will provide this
                                                                confidentiality. We will then forward all statutory mail
                                                                with no additional postage charges.</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="own-address">
                                                    <div class="info">
                                                        <h3>Choose to use your own address</h3>
                                                        <input type="hidden" id="ChossenServiceAdd_id" readonly>
                                                        <p class="d-none" id="ChossenServiceAdd"></p>
                                                    </div>
                                                    <div class="btn-box">
                                                        <a type="button" class="btn another-btn choose_one_cl"
                                                            onclick="chooseAdd('service')">Choose One</a>
                                                        <a type="button" class="btn another-btn choose_another_cl d-none"
                                                            onclick="chooseAdd('service')">Choose Another</a>
                                                    </div>
                                                </div>
                                                <div class="forwarding-address d-none">
                                                    <div class="info">
                                                        <h3>Forwarding Address</h3>
                                                        <p><span id="house_number_FA"></span>,<span
                                                                id="street_FA"></span>,<span
                                                                id="locality_FA"></span>,<span
                                                                id="town_FA"></span>,<span id="county_FA"></span>,<span
                                                                id="post_code_FA"></span></p>
                                                    </div>
                                                    <div class="btn-box">
                                                        <a href="javascript:void(0)" type="button"
                                                            class="btn edit-btn edit-addr">Edit Address</a>
                                                        <a type="button" class="btn another-btn"
                                                            onclick="chooseAdd('forwading')">Choose Another</a>
                                                    </div>
                                                </div>
                                                <div class="office-address ">
                                                    <div class="top-block">
                                                        <h3>Service Address - London</h3>
                                                        <div class="price-block">
                                                            <strong>$26.00</strong>
                                                            <p>Reserved annually at $26.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="tham-img">
                                                            <img src="{{ asset('frontend/assets/images/address-img.png') }}"
                                                                alt="">
                                                            <div class="tham-info">
                                                                <strong>London:</strong>
                                                                <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ
                                                                    OAE,
                                                                    United Kingdom</p>
                                                            </div>
                                                        </div>
                                                        <div class="text-block">
                                                            <h3>Protect the privacy of your home address</h3>
                                                            <p>Mauris placerat ac lectus et bibendum. Aliquam tincidunt
                                                                tristique vulputate quisque tincidunt nisl vel risus
                                                                imperdiet
                                                                feugiat.</p>
                                                            <div class="location-block">
                                                                <div class="addr">
                                                                    <strong>London: </strong>
                                                                </div>
                                                                <div class="info">
                                                                    <p>52 Danes Court, North End Road, Wembley, Middlesex,
                                                                        HAQ
                                                                        OAE, United Kingdom</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-block">
                                                        <button class="btn">Details</button>
                                                        <button class="btn buy-now-btn" onclick="gotoPage()">Buy
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ADDRESS TAB Landing Page ends --}}


                                            {{-- ADDRESS TAB Choose Address Page starts --}}
                                            <div class="form-wrap hideEdit d-none">
                                                <div class="form-info-block">
                                                    <h4>Service Address</h4>
                                                </div>

                                                <div class="choose-own-address fdAdd_cl mb-2 d-none">
                                                    <h3>Forwarding Address</h3>
                                                    <h5>Tell us where to forward your mail to you, by entering your address
                                                        below.</h5>
                                                </div>

                                                <div id="addressListingPage_id">

                                                </div>

                                            </div>
                                            {{-- ADDRESS TAB Choose Address Page ends --}}

                                            {{-- ADDRESS TAB End Edit form div starts --}}
                                            <div class="form-wrap edit_from d-none">
                                                <div class="form-info-block">
                                                    <h4>Service Address</h4>

                                                    <div id="editFormAjaxLoadAddressSection">

                                                    </div>
                                                </div>
                                            </div>
                                            {{--  ADDRESS TAB End Edit form div ends --}}

                                            {{-- ADDRESS TAB NEW ADDRESS FORM SECTION STARTS --}}
                                            <div id="address_tab_new_address_form">

                                            </div>
                                            {{-- ADDRESS TAB NEW ADDRESS FORM SECTION ENDS --}}

                                        </div>
                                        {{-- ADDRESS TAB SECTION ENDS --}}

                                        {{-- NATURE TAB SECTION STARTS --}}
                                        <div class="tab-pane fade" id="nature-control" role="tabpanel"
                                            aria-labelledby="nature-control-tab">
                                            <div class="position-area">
                                                <div class="form-info-block mb-0">
                                                    <div class="desc mb-3">
                                                        <div class="icon">
                                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text">
                                                            <h5>Nature of Control</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Phasellus scelerisque porta enim ut interdum. Aliquam
                                                                mollis
                                                                enim non purus laoreet, ut pretium :</p>
                                                            <ul class="mb-4">
                                                                <li>Consectetur adipiscing elit phasellus scelerisque
                                                                    porta
                                                                    enim ut interdum. </li>
                                                                <li>Aliquam mollis enim non purus laoreet, ut pretium
                                                                    lorem
                                                                    porta. </li>
                                                                <li>Integer eleifend velit ut aliquam convallis. </li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                </li>
                                                                <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                            </ul>
                                                            <h5>Guidance in completing this section</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Phasellus scelerisque porta enim ut interdum. Aliquam
                                                                mollis
                                                                enim non purus laoreet, ut pretium :</p>
                                                            <ul>
                                                                <li>Consectetur adipiscing elit phasellus scelerisque
                                                                    porta
                                                                    enim ut interdum. </li>
                                                                <li>Aliquam mollis enim non purus laoreet, ut pretium
                                                                    lorem
                                                                    porta. </li>
                                                                <li>Integer eleifend velit ut aliquam convallis. </li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                </li>
                                                                <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4>Natural of Control</h4>
                                                </div>
                                                <div class="natural-of-control-block mb-4">
                                                    <h5>Does this officer have a controlling interest in this company?
                                                    </h5>
                                                    <div class="authe-qu-block">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="own_i"></span>
                                                                        <span class="text">Ownership of
                                                                            shares</span></label>
                                                                    <select class="form-control">
                                                                        <option value="">N/A</option>
                                                                    </select>
                                                                    <span class="own_i_tooltip">If this person holds
                                                                        more
                                                                        than 25% of the issued shares, directly or
                                                                        indirectly, then they meet this nature of
                                                                        control
                                                                        condition. Please select their shareholding
                                                                        percentage range from the drop down menu.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="vot_i"></span>
                                                                        <span class="text">Voting
                                                                            Rights</span></label>
                                                                    <select class="form-control">
                                                                        <option value="">N/A</option>
                                                                    </select>
                                                                    <span class="vot_i_tooltip">If this person holds
                                                                        more
                                                                        than 25% of the available voting rights,
                                                                        directly or
                                                                        indirectly, then they meet this nature of
                                                                        control
                                                                        condition. Please select their voting power
                                                                        percentage range from the drop down menu.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="appo_i"></span>
                                                                        <span class="text">Appoint or remove the
                                                                            majority
                                                                            of the board of directors</span></label>
                                                                    <select class="form-control">
                                                                        <option value="">No</option>
                                                                        <option value="">Yes</option>
                                                                    </select>
                                                                    <span class="appo_i_tooltip">If this person is
                                                                        entitled, directly or indirectly, to appoint and
                                                                        remove a majority of the board of directors then
                                                                        they meet this nature of control condition. Any
                                                                        person that controls over 50% of the votes may
                                                                        appoint the directors by ordinary resolution,
                                                                        but a
                                                                        person could be given this explicit right in the
                                                                        Articles of Association or a Shareholders'
                                                                        Agreement.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="other_i"></span>
                                                                        <span class="text">Other Significant
                                                                            influences
                                                                            or control</span></label>
                                                                    <select class="form-control">
                                                                        <option value="">No</option>
                                                                        <option value="">Yes</option>
                                                                    </select>
                                                                    <span class="other_i_tooltip">If this individual
                                                                        does
                                                                        not meet any of the preceding natures of control
                                                                        conditions, but still exerts, or has the right
                                                                        to
                                                                        exert, influence or control over the Company,
                                                                        then
                                                                        they meet this nature of control
                                                                        condition.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="qu-panel">
                                                    <p>Does this officer have a controlling influence over a Firm(s)
                                                        and/or
                                                        the Members of that Firm(s), which also has a controlling
                                                        influence
                                                        in the company?</p>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" id="no" name="com-qu">
                                                            <label for="no">No</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="yes" name="com-qu">
                                                            <label for="yes">yes</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="qu-panel">
                                                    <p>Does this officer have a controlling influence over a trust(s)
                                                        and/or
                                                        the trustees of that trust(s), which has a controlling interest
                                                        in
                                                        this company?</p>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" id="no2" name="com-qu2">
                                                            <label for="no2">No</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="yes2" name="com-qu2">
                                                            <label for="yes2">yes</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- NATURE TAB SECTION ENDS --}}

                                        {{-- SHAREHOLDER TAB SECTION STARTS --}}
                                        <div class="tab-pane fade" id="share-holder" role="tabpanel"
                                            aria-labelledby="share-holder-tab">
                                        </div>
                                        {{-- SHAREHOLDER TAB SECTION ENDS --}}

                                    </div>
                                </div>
                                <div class="step-btn-wrap mt-4">
                                    <button class="btn prev-btn" onclick="theCancelButtonFunction()">Cancel</button>
                                    <button class="btn" id="theNextBtn" onclick="checkConsentOrNot()">Next <img
                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                            alt=""></button>
                                </div>
                            </div>
                            {{-- APPOINTMENTS SECTION ENDS --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="text" id="appointmentType" value="" readonly>
        <input type="text" id="shoppingCartId_id" value="{{ $shoppingCartId }}" readonly>
        <input type="text" id="currentTab" value="" readonly>

        <!-- PERSON SECTION DATAS -->
        <input type="text" id="choosedPersonOfficerId" value="" readonly>
        <input type="text" id="addressTypeChoosed" value="" readonly>
        <input type="text" id="actionType" value="" readonly>
    </section>
    <!-- ================ end: Particulars sec ================ -->
@endsection

@section('script')
    <script>
        const AddMoreAddSave = function(ths) {

            const where = $('#where').val();
            const house_noNew = $('#house_noNew').val();
            const streetNew = $('#streetNew').val();
            const localityNew = $('#localityNew').val();
            const townNew = $('#townNew').val();
            const countyNew = $('#countyNew').val();
            const zip_code = $('#zip_code').val();
            const billing_countryNew = $('#billing_countryNew').val();

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
                $.ajax({
                    url: "{!! route('enter-new-address') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        where,
                        house_noNew,
                        streetNew,
                        localityNew,
                        townNew,
                        countyNew,
                        zip_code,
                        billing_countryNew,
                    },
                    success: function(result) {
                        if(result === 'details_resi'){
                            $("#details_tab_new_address_form").html('')

                            $("#detailsTabAddList_id").removeClass('d-none');
                            addListing();

                            $("#actionType").val('select');
                        }
                    }
                });
            }
        }

        function addAddress() {
            const currentTab = $('#currentTab').val()

            $.ajax({
                url: "{!! route('new-address-form') !!}",
                type: "get",
                data: {
                    where: 'details_resi',
                },
                success: function(data) {
                    if (currentTab === 'details') {
                        $("#details_tab_new_address_form").html(data)
                        $("#detailsTabAddList_id").addClass('d-none');
                        $("#actionType").val('add');
                    }
                    if (currentTab === 'addressing') {
                        $("#address_tab_new_address_form").html(data)
                    }
                }
            });
        }

        // The cancel Button Work
        function theCancelButtonFunction() {
            const currentTab = $('#currentTab').val()
            const addressTypeChoosed = $('#addressTypeChoosed').val()
            const actionType = $('#actionType').val()

            if (currentTab === 'details' && addressTypeChoosed === 'residential' && actionType === '') {
                $("#detailsTabLandingPage_id").removeClass('d-none');
                $("#theNextBtn").removeClass('d-none');
                $("#detailsTabAddList_id").addClass('d-none');
                
                $('#myTab').removeClass('d-none')
                $("#addressTypeChoosed").val('');
            }
            
            if (currentTab === 'details' && addressTypeChoosed === 'residential' && actionType === 'select') {
                $("#detailsTabLandingPage_id").removeClass('d-none');
                $('#myTab').removeClass('d-none')
                $("#theNextBtn").removeClass('d-none');

                $("#detailsTabAddList_id").addClass('d-none');
                
                $("#addressTypeChoosed").val('')
                $("#actionType").val('')
            }

            if (currentTab === 'details' && addressTypeChoosed === 'residential' && actionType === 'edit') {
                
                $("#actionType").val('select')

                $(".edit_from_residential").addClass('d-none')
                $("#editFormAjaxLoadResidentialSection").html('')

                $("#detailsTabAddList_id").removeClass('d-none');
            }

            if (currentTab === 'details' && addressTypeChoosed === 'residential' && actionType === 'add') {
                $("#actionType").val('select')
                
                $("#detailsTabLandingPage_id").addClass('d-none');
                $('#myTab').addClass('d-none')

                $("#details_tab_new_address_form").html('')

                $("#detailsTabAddList_id").removeClass('d-none');
            }
        }

        function gotToBusinessAddressPage() {
            window.location.href = "{{ route('choose-address-business') }}"
        }

        function chooseAddRess(type,action) {
            $("#detailsTabAddList_id").removeClass('d-none');
            $("#myTab").addClass('d-none');
            $("#detailsTabLandingPage_id").addClass('d-none');
            $("#theNextBtn").addClass('d-none');
            
            $("#addressTypeChoosed").val(type);
            $("#actionType").val(action);
        }
        
        function chooseAdd(type) {
            $("#detailsTabAddList_id").removeClass('d-none');
            $("#myTab").addClass('d-none');
            $("#serviceAddLandingSection").hide();
            $('.hideEdit').removeClass('d-none');

            $("#addressTypeChoosed").val(type)
        }

        function addListing() {
            $.ajax({
                url: "{!! route('address-listing') !!}",
                type: "get",
                success: function(data) {
                    $("#detailsTabAddList_id").html(data);
                    // $("#addressListingPage_id").html(data);
                }
            });
        }

        addListing();

        const director_i = document.getElementById("director_i");
        director_i.addEventListener("mouseover", showTooltip);
        director_i.addEventListener("mouseout", hideTooltip);

        function showTooltip() {
            const tooltip = document.querySelector(".director_i_tooltip");
            tooltip.style.display = "block";
        }

        function hideTooltip() {
            const tooltip = document.querySelector(".director_i_tooltip");
            tooltip.style.display = "none";
        }


        const shareholder_i = document.getElementById("shareholder_i");
        shareholder_i.addEventListener("mouseover", ShareshowTooltip);
        shareholder_i.addEventListener("mouseout", SharehideTooltip);

        function ShareshowTooltip() {
            const tooltip = document.querySelector(".shareholder_i_tooltip");
            tooltip.style.display = "block";
        }

        function SharehideTooltip() {
            const tooltip = document.querySelector(".shareholder_i_tooltip");
            tooltip.style.display = "none";
        }


        const secretary_i = document.getElementById("secretary_i");
        secretary_i.addEventListener("mouseover", SecshowTooltip);
        secretary_i.addEventListener("mouseout", SechideTooltip);

        function SecshowTooltip() {
            const tooltip = document.querySelector(".secretary_i_tooltip");
            tooltip.style.display = "block";
        }

        function SechideTooltip() {
            const tooltip = document.querySelector(".secretary_i_tooltip");
            tooltip.style.display = "none";
        }


        const psc_i = document.getElementById("psc_i");
        psc_i.addEventListener("mouseover", PSCshowTooltip);
        psc_i.addEventListener("mouseout", PSChideTooltip);

        function PSCshowTooltip() {
            const tooltip = document.querySelector(".psc_i_tooltip");
            tooltip.style.display = "block";
        }

        function PSChideTooltip() {
            const tooltip = document.querySelector(".psc_i_tooltip");
            tooltip.style.display = "none";
        }

        const own_i = document.getElementById("own_i");
        own_i.addEventListener("mouseover", OWNshowTooltip);
        own_i.addEventListener("mouseout", OWNhideTooltip);

        function OWNshowTooltip() {
            const tooltip = document.querySelector(".own_i_tooltip");
            tooltip.style.display = "block";
        }

        function OWNhideTooltip() {
            const tooltip = document.querySelector(".own_i_tooltip");
            tooltip.style.display = "none";
        }

        const vot_i = document.getElementById("vot_i");
        vot_i.addEventListener("mouseover", VOTshowTooltip);
        vot_i.addEventListener("mouseout", VOThideTooltip);

        function VOTshowTooltip() {
            const tooltip = document.querySelector(".vot_i_tooltip");
            tooltip.style.display = "block";
        }

        function VOThideTooltip() {
            const tooltip = document.querySelector(".vot_i_tooltip");
            tooltip.style.display = "none";
        }

        const appo_i = document.getElementById("appo_i");
        appo_i.addEventListener("mouseover", APOshowTooltip);
        appo_i.addEventListener("mouseout", APOhideTooltip);

        function APOshowTooltip() {
            const tooltip = document.querySelector(".appo_i_tooltip");
            tooltip.style.display = "block";
        }

        function APOhideTooltip() {
            const tooltip = document.querySelector(".appo_i_tooltip");
            tooltip.style.display = "none";
        }

        const other_i = document.getElementById("other_i");
        other_i.addEventListener("mouseover", OTHshowTooltip);
        other_i.addEventListener("mouseout", OTHhideTooltip);

        function OTHshowTooltip() {
            const tooltip = document.querySelector(".other_i_tooltip");
            tooltip.style.display = "block";
        }

        function OTHhideTooltip() {
            const tooltip = document.querySelector(".other_i_tooltip");
            tooltip.style.display = "none";
        }

        const choosedOfficer = function(id) {
            const offValId = $(`.offValId_${id}`).val();
            const offValtitle = $(`.offValtitle_${id}`).val();
            const offValdob_day = $(`.offValdob_day_${id}`).val();
            const offValdob_month = $(`.offValdob_month_${id}`).val();
            const offValdob_year = $(`.offValdob_year_${id}`).val();
            const offValfirst_name = $(`.offValfirst_name_${id}`).val();
            const offVallast_name = $(`.offVallast_name_${id}`).val();
            const offValnationality = $(`.offValnationality_${id}`).val();
            const offValoccupation = $(`.offValoccupation_${id}`).val();
            const offValadd_id = $(`.offValadd_id_${id}`).val();
            const offValauthenticate_one = $(`.offValauthenticate_one_${id}`).val();
            const offValauthenticate_one_ans = $(`.offValauthenticate_one_ans_${id}`).val();
            const offValIdauthenticate_two = $(`.offValIdauthenticate_two_${id}`).val();
            const offValIdauthenticate_two_ans = $(`.offValIdauthenticate_two_ans_${id}`).val();
            const offValIdauthenticate_three = $(`.offValIdauthenticate_three_${id}`).val();
            const offValIdauthenticate_three_ans = $(`.offValIdauthenticate_three_ans_${id}`).val();

            $('#personOfficerEditId').val(offValId);
            $('#person_tittle_id').val(offValtitle);
            $('#person_bday_id').val(offValdob_day);
            $('#person_bmon_id').val(offValdob_month);
            $('#person_byear_id').val(offValdob_year);
            $('#person_fname_id').val(offValfirst_name);
            $('#person_lname_id').val(offVallast_name);
            $('#person_national_id').val(offValnationality);
            $('#person_occupation_id').val(offValoccupation);

            $('#add_id').val(offValadd_id);
            $('#person_aqone_id').val(offValauthenticate_one);
            $('#person_aqone_ans_id').val(offValauthenticate_one_ans);
            $('#person_aqtwo_id').val(offValIdauthenticate_two);
            $('#person_aqtwo_ans_id').val(offValIdauthenticate_two_ans);
            $('#person_aqthree_id').val(offValIdauthenticate_three);
            $('#person_aqthree_ans_id').val(offValIdauthenticate_three_ans);

            $('#choosedPersonOfficerId').val(offValId)
            $('#currentTab').val('details')

            addNewOfficer('id');
        }

        const searchBar = function() {
            const searchBarVal = $('#searchBar_id').val();

            const addVals = document.querySelectorAll('.officerSelect')
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

        const searchBarAdd = function() {
            const searchBarVal = $('#searchBarAdd_id').val();

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

        const addNewOfficer = function(id) {

            if (id) {
                $('#officer-tab').toggleClass('active');
                $('#officer').toggleClass('active show');

                $('#details-tab').toggleClass('active');
                $('#details').toggleClass('active show');
                return false
            }
            $('#officer-tab').toggleClass('active');
            $('#officer').toggleClass('active show');

            $('#details-tab').toggleClass('active');
            $('#details').toggleClass('active show');

            $('#personOfficerEditId').val('');
            $('#person_tittle_id').val('');
            $('#person_bday_id').val('');
            $('#person_bmon_id').val('');
            $('#person_byear_id').val('');
            $('#person_fname_id').val('');
            $('#person_lname_id').val('');
            $('#person_national_id').val('');
            $('#person_occupation_id').val('');

            $('#add_id').val('');
            $('#person_aqone_id').val('');
            $('#person_aqone_ans_id').val('');
            $('#person_aqtwo_id').val('');
            $('#person_aqtwo_ans_id').val('');
            $('#person_aqthree_id').val('');
            $('#person_aqthree_ans_id').val('');

            $('#choosedPersonOfficerId').val('')
        }

        const consentSection = function() {
            if ($('#director').is(":checked") || $('#secretary').is(":checked")) {
                $('.brCls').removeClass('d-none');
                $('.occLinkCls').removeClass('d-none');
            } else {
                $('.brCls').addClass('d-none');
                $('.occLinkCls').addClass('d-none');
            }
        }

        const choosingOfficerToDetails = function() {
            $('#officer-tab').removeClass('active');
            $('#officer').removeClass('active show');

            $('#details-tab').addClass('active');
            $('#details').addClass('active show');

            $('#currentTab').val('details')
        }

        const currentTab = function(tabName) {
            $('#currentTab').val(tabName)
        }

        const checkConsentOrNot = function() {

            if ($('#appointmentType').val() === 'person' && $('#currentTab').val() === 'details') {

                const shoppingCartId = $('#shoppingCartId_id').val();
                const personOfficerEditId = $('#personOfficerEditId').val();
                const person_tittle = $('#person_tittle_id').val();
                const person_bday = $('#person_bday_id').val();
                const person_bmon = $('#person_bmon_id').val();
                const person_byear = $('#person_byear_id').val();
                const person_fname = $('#person_fname_id').val();
                const person_national = $('#person_national_id').val();
                const person_lname = $('#person_lname_id').val();
                const person_occupation = $('#person_occupation_id').val();

                const add_id_val = $('#add_id').val();
                const person_aqone = $('#person_aqone_id').val();
                const person_aqone_ans = $('#person_aqone_ans_id').val();
                const person_aqtwo = $('#person_aqtwo_id').val();
                const person_aqtwo_ans = $('#person_aqtwo_ans_id').val();
                const person_aqthree = $('#person_aqthree_id').val();
                const person_aqthree_ans = $('#person_aqthree_ans_id').val();

                const requiredFields = document.querySelectorAll('.blankCheck');
                const requiredFieldsArr = [...requiredFields];

                let validation = 0;
                requiredFieldsArr.forEach(el => {
                    if (el.value === '') {
                        el.classList.add('validation');

                        return validation++;
                    } else {
                        el.classList.remove('validation');
                    }
                });

                if (validation === 0) {
                    $.ajax({
                        url: "{!! route('save-person-officer') !!}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            shoppingCartId,
                            personOfficerEditId,
                            person_tittle,
                            person_bday,
                            person_bmon,
                            person_byear,
                            person_fname,
                            person_national,
                            person_lname,
                            person_occupation,
                            add_id_val,
                            person_aqone,
                            person_aqone_ans,
                            person_aqtwo,
                            person_aqtwo_ans,
                            person_aqthree,
                            person_aqthree_ans
                        },
                        success: function(response) {
                            $('#choosedPersonOfficerId').val(response['id'])
                        },
                    });
                }

                return false
            }

            if ($('#currentTab').val() === 'officer') {
                $('#officer-tab').removeClass('active');
                $('#officer').removeClass('active show');

                $('#details-tab').addClass('active');
                $('#details').addClass('active show');

                $('#currentTab').val('details')
                return false;
            }

            if ($('.checkBoxPos').is(":checked") === false) {
                $("#positionSelectionDiv").removeClass('d-none')
                return false
            } else {
                $("#positionSelectionDiv").addClass('d-none')
            }

            if ($('.occLinkCls').hasClass('d-none') === false && $('#occ').is(":checked") === false) {
                $("#consentSelectionDiv").toggleClass('d-none')
                return false
            } else {
                $("#consentSelectionDiv").addClass('d-none')
                $('#position-tab').removeClass('active');
                $('#position').removeClass('active show');

                $('#officer-tab').addClass('active');
                $('#officer').addClass('active show');

                $('#currentTab').val('officer')
            }

        }


        function shareholderTab() {
            $('.shareholderLinksCls').toggleClass('d-none');
            $('#authenticationSection').toggleClass('d-none');
        }

        function pscTab() {
            $('.nocLinkCls').toggleClass('d-none');
        }


        const showPersonSection = function() {
            $(".main_section").hide();
            $('.person_section').removeClass('d-none');

            $('#appointmentType').val('person');
        }

        function gotoPage() {
            $.ajax({
                url: "{!! route('remove-forwarding-business-address-section') !!}",
                type: 'get',
                success: function(result) {
                    setTimeout(function() {
                        $('.selc-addr').text('Select');
                    }, 2000);
                    window.location.href = "{{ route('choose-address-after-buy-now') }}"
                }
            });
        };

        function go_to_the_next_page() {
            const price = $('#business_office_price').val();
            const shoppingCartId_id = $('#shoppingCartId_id').val();
            $.ajax({
                url: "{!! route('save_company_in_shopping_cart_business') !!}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    price,
                    shoppingCartId_id
                },
                success: function(response) {
                    // window.location.href = "{{ route('choose-address-business') }}"
                },
            });

        };

        function gotoBusinessAddressChoosePage() {
            window.location.href = "{{ route('choose-address-business') }}"
        };

        function selectedAdd(ths, id, type) {
            const addressTypeChoosed = $("#addressTypeChoosed").val();
            $('#myTab').removeClass('d-none')

            if (addressTypeChoosed === 'residential') { 
                if (type === 'listing') {
                    const house_number = $(`.${id}_add_house_number`).val();
                    const add_street = $(`.${id}_add_street`).val();
                    const add_locality = $(`.${id}_add_locality`).val();
                    const add_town = $(`.${id}_add_town`).val();
                    const user_county = $(`.${id}_user_county`).val();
                    const address_post_code = $(`.${id}_address_post_code`).val();

                    $('#ChossenResAdd').html(
                        `${house_number},${add_street},${add_locality},${add_town},${user_county},${address_post_code}`)
                } else {
                    $('#ChossenResAdd').html(ths.value)
                }

                $('#ChossenResAdd_id').val(id)
                $('#ChossenResAdd').removeClass('d-none');
                $("#detailsTabLandingPage_id").removeClass('d-none');
                $('.res_choose_another_cl').removeClass('d-none');
                
                $('.res_choose_one_cl').addClass('d-none');
                $("#detailsTabAddList_id").addClass('d-none');
                $("#actionType").val('')
            }

            if (addressTypeChoosed === 'service') {
                if (type === 'listing') {
                    const house_number = $(`.${id}_add_house_number`).val();
                    const add_street = $(`.${id}_add_street`).val();
                    const add_locality = $(`.${id}_add_locality`).val();
                    const add_town = $(`.${id}_add_town`).val();
                    const user_county = $(`.${id}_user_county`).val();
                    const address_post_code = $(`.${id}_address_post_code`).val();

                    $('#ChossenServiceAdd').html(
                        `${house_number},${add_street},${add_locality},${add_town},${user_county},${address_post_code}`)
                } else {
                    $('#ChossenServiceAdd').html(ths.value)
                }

                $('#ChossenServiceAdd_id').val(id)
                $('#ChossenServiceAdd').removeClass('d-none');
                $("#serviceAddLandingSection").show();
                $('.choose_one_cl').addClass('d-none');
                $('.choose_another_cl').removeClass('d-none');
            }

            if (addressTypeChoosed === 'forwading') {
                if (type === 'listing') {
                    const house_number = $(`.${id}_add_house_number`).val();
                    const add_street = $(`.${id}_add_street`).val();
                    const add_locality = $(`.${id}_add_locality`).val();
                    const add_town = $(`.${id}_add_town`).val();
                    const user_county = $(`.${id}_user_county`).val();
                    const address_post_code = $(`.${id}_address_post_code`).val();

                    $('#ChossenForwadingAdd').html(
                        `${house_number},${add_street},${add_locality},${add_town},${user_county},${address_post_code}`)
                } else {
                    $('#ChossenForwadingAdd').html(ths.value)
                }
            }

            $('.hideEdit').addClass('d-none');
            $("#addressTypeChoosed").val('')

            // $('#ownAddEdit_id').removeClass('d-none');
        }

        $('.edit-addr').click(function(type) {
            $(".buyNowAfterSelectingAdd").hide();
            $('.edit_from').removeClass('d-none');
        });

        function editAddress(id) {
            $('.hideEdit').addClass('d-none');
            $('.edit_from').removeClass('d-none');

            const currentTab = $("#currentTab").val();

            $("#actionType").val('edit');
            $.ajax({
                url: "{!! route('address-edit-page') !!}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    if (currentTab === 'details') {
                        $('#editFormAjaxLoadResidentialSection').html(data)

                        $('.edit_from_residential').removeClass('d-none');

                        $('#detailsTabAddList_id').addClass('d-none');
                    } else {
                        $('#editFormAjaxLoadResidentialSection').html('')
                        $('.edit_from_residential').addClass('d-none');
                        $('#detailsTabAddList_id').removeClass('d-none');
                    }
                    if (currentTab === 'addressing') {
                        $('#editFormAjaxLoadAddressSection').html(data)
                        $('.edit_from').removeClass('d-none');
                        $('#addressListingPage_id').addClass('d-none');
                    } else {
                        $('#editFormAjaxLoadAddressSection').html('')
                        $('.edit_from').addClass('d-none');
                        $('#addressListingPage_id').removeClass('d-none');
                    }

                }
            });

            return false
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

        // $('.saveAddress').click(function() {
        //     var id = $('#add_id').val();
        //     var number = $('#house_no1').val();
        //     var steet = $('#street1').val();
        //     var locality = $('#locality1').val();
        //     var town = $('#town1').val();
        //     var county = $('#county1').val();
        //     var postcode = $('#post_code').val();
        //     var contry = $('#billing_country').val();

        //     if (county == undefined) {
        //         county = "";
        //     }

        //     const requiredFields = document.querySelectorAll('.blankCheckAdd');
        //     const requiredFieldsArr = [...requiredFields];

        //     console.log(requiredFieldsArr);
        //     let validation = 0;
        //     requiredFieldsArr.forEach(el => {
        //         if (el.value === '') {
        //             el.classList.add('validation');
        //             el.nextElementSibling.classList.remove('d-none');
        //             return validation++;
        //         } else {
        //             el.classList.remove('validation');
        //             el.nextElementSibling.classList.add('d-none');
        //         }
        //     });

        //     if (validation === 0) {
        //         $.ajax({
        //             url: "{!! route('selected-address-save') !!}",
        //             type: 'POST',
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //                 id,
        //                 number,
        //                 steet,
        //                 locality,
        //                 town,
        //                 county,
        //                 postcode,
        //                 contry,
        //             },
        //             success: function(result) {
        //                 $('.hideEdit').removeClass('d-none');
        //                 $('.edit_from').addClass('d-none');
        //                 addListing();
        //             }
        //         });
        //     }
        // })

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
