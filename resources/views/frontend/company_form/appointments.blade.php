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
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Registered Address</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Business Address</p>
                            </div>
                            <div class="bottom-step-items active">
                                <img src="{{ asset('frontend/assets/images/active-tick.svg')}}" alt="">
                                <p>Appointment</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg')}}" alt="">
                                <p>Document</p>
                            </div>
                        </div>

                        <div class="form-wrap main_section">
                            <div class="form-info-block">
                                <h4>Appointments</h4>
                                <div class="desc mb-3">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h5>Appointments</h5>
                                        <p>Nulla ultricies sapien in nibh luctus finibus. Fusce semper sem in ipsum molestie fermentum. Nulla facilisi. Fusce tincidunt mauris purus, vel vulputate urna efficitur vitae. Nunc libero tortor, ornare in neque posuere, feugiat facilisis tortor. Proin ac magna mi. Donec pharetra ullamcorper lectus eu venenatis.</p>
                                        <p>Aenean sodales ac nunc non dapibus. Cras eget ante volutpat, placerat nibh non, molestie orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vitae imperdiet sapien.</p>
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
                                        <button type="submit" class="btn" onclick="showPersonSection(),currentTab('position')"><img src="{{ asset('frontend/assets/images/person-icon.svg')}}" alt=""> Person</button>
                                        <button type="submit" class="btn"><img src="{{ asset('frontend/assets/images/corporate-icon.svg')}}" alt=""> Corporate</button>
                                        <button type="submit" class="btn other-legal-btn"><img src="{{ asset('frontend/assets/images/other-legal-entity-icon.svg')}}" alt=""> Other Legal Entity</button>
                                    </div>
                                </div>
                            </div>
                            <div class="step-btn-wrap mt-4">
                                <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png')}}" alt=""> Previous: Particulars</button>
                                <button class="btn">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
                            </div>
                        </div>

                        <div class="form-wrap person_section d-none">
                            <div class="form-info-block">
                                <h4>Appointments</h4>
                            </div>
                            <div class="appointment-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" onclick="currentTab('position')" id="position-tab" onclick="currentTab('position')" data-toggle="tab" href="#position" role="tab" aria-controls="position" aria-selected="true">Position</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="currentTab('officer')" id="officer-tab" data-toggle="tab" href="#officer" role="tab" aria-controls="officer" aria-selected="false">Officer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="currentTab('details')" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="currentTab('addressing')" id="addressing-tab" data-toggle="tab" href="#addressing" role="tab" aria-controls="addressing" aria-selected="false">Addressing</a>
                                    </li>
                                    <li class="nav-item nocLinkCls d-none">
                                        <a class="nav-link" onclick="currentTab('nature-control')" id="nature-control-tab" data-toggle="tab" href="#nature-control" role="tab" aria-controls="nature-control" aria-selected="false">Nature of Control</a>
                                    </li>
                                    <li class="nav-item shareholderLinksCls d-none">
                                        <a class="nav-link" onclick="currentTab('share-holder')" id="share-holder-tab" data-toggle="tab" href="#share-holder" role="tab" aria-controls="share-holder" aria-selected="false">Share Holder</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="position" role="tabpanel" aria-labelledby="position-tab">
                                        <div class="position-area">
                                            <div class="form-info-block mb-0">
                                                <div class="desc mb-0">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h5>Directors and Shareholders</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta.</p>
                                                    </div>
                                                </div>
                                                <div class="desc">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h5>Persons with Significant Control (PSCs)</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta.</p>
                                                        <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta. Integer eleifend velit ut aliquam convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. </p>
                                                        <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet:</p>
                                                        <ul>
                                                            <li>Consectetur adipiscing elit phasellus scelerisque porta enim ut interdum.</li>
                                                            <li>Aliquam mollis enim non purus laoreet, ut pretium lorem porta. </li>
                                                            <li>Integer eleifend velit ut aliquam convallis. </li>
                                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                                            <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                        </ul>
                                                        <h5>Am I a PSC?</h5>
                                                        <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta. Integer eleifend velit ut aliquam convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choose-possition-block">
                                                <h4>Choose Position</h4>
                                                <p>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta. Integer eleifend velit ut aliquam convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum.</p>
                                                <div class="choose-possition-option">
                                                    <ul>
                                                        <li>
                                                            <input type="checkbox" class="checkBoxPos" id="director" onclick="consentSection()">
                                                            <label for="director">Director <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" class="checkBoxPos" id="shareholder" onclick="shareholderTab()">
                                                            <label for="shareholder">Shareholderss <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" class="checkBoxPos" id="secretary" onclick="consentSection()">
                                                            <label for="secretary">secretary <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" class="checkBoxPos" id="psc" onclick="pscTab()">
                                                            <label for="psc">Person with Significant Control (PSC) <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        </li>

                                                        <br class="brCls d-none">

                                                        <li class="occLinkCls d-none">
                                                            <input type="checkbox" id="occ">
                                                            <label for="occ">The officers confirm they have consented to act as a Director or Secretary <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="officer" role="tabpanel" aria-labelledby="officer-tab">
                                        <div class="particulars-form-wrap pt-0 pb-">
                                            <div class="form-wrap pb-0 pt-0">
                                                <div class="choose-own-address">
                                                    <h3>Search Officers</h3>
                                                    <div class="src-are">
                                                        <input type="text" placeholder="Search Officer name...." class="form-control">
                                                    </div>
                                                </div>
                                                <div class="recently-used-addresses mb-3">
                                                    <h4>Recent Officers</h4>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="used-addresses-panel">
                                                                <div class="text">
                                                                    <p>Prime Minister &amp; First Load Of The Treasury, 10, Downing Street...</p>
                                                                </div>
                                                                <div class="btn-wrap">
                                                                    <button type="submit" onclick="choosingOfficerToDetails()" class="btn select-btn">Choose</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                    <button type="submit" class="btn" onclick="addNewOfficer(),currentTab('details')">Add New Officer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DETAILS PAGE SECTION -->
                                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                        <div class="form-info-block">
                                            <div class="desc">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <h5>Personal Details</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta.</p>
                                                </div>
                                            </div>
                                            <h4>Officer Details</h4>
                                        </div>
                                        <div class="form-block">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Title</label>
                                                        <input type="text" class="form-control" id="person_tittle_id" name="person_tittle">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Date of Birth</label>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <select class="form-control" id="person_bday_id" name="person_bday">
                                                                    <option value="">dd</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <select class="form-control" id="person_bmon_id" name="person_bmon">
                                                                    <option value="">mm</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <select class="form-control" id="person_byear_id" name="person_byear">
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
                                                        <label for="">First Name(s)</label>
                                                        <input type="text" name="person_fname" id="person_fname_id" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nationality - <small>of accepted nationalities </small> <span><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span></label>
                                                        <input type="text" class="form-control" id="person_national_id" name="person_national">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" id="person_lname_id" name="person_lname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Occupation</label>
                                                        <input type="text" class="form-control" id="person_occupation_id" name="person_occupation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rsidential-address-info mb-4">
                                            <h3>Residential Address</h3>

                                            <input type="hidden" id="add_id" value="{{isset($add_id) ? $add_id :''}}" readonly>
                                            <p><strong>Please Note :</strong> <span>Consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium lorem porta. Integer eleifend velit ut aliquam convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum.</span></p>
                                            <p>52 Danes Court, North End Road, Wembley, HA9 0AE, UNITED KINGDOM</p>
                                            <div class="btn-block">
                                                <button class="btn">Edit</button>
                                                <button class="btn buy-now-btn">Choose Another</button>
                                            </div>
                                        </div>
                                        <div class="form-info-block d-none" id="authenticationSection">
                                            <h4 class="mb-5">Authentication Questions</h4>
                                            <div class="authe-qu-block">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="qu-block block">
                                                            <label for="">Select First 3 letters of</label>
                                                            <select class="form-control" id="person_aqone_id" name="person_aqone">
                                                                <option value="Mother’s Maiden Name">Mother’s Maiden Name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="ans-block block">
                                                            <label for="">Answer</label>
                                                            <input type="text" class="form-control" id="person_aqone_ans_id" name="person_aqone_ans">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="qu-block block">
                                                            <label for="">Select First 3 letters of</label>
                                                            <select class="form-control" id="person_aqtwo_id" name="person_aqtwo">
                                                                <option value="Father’s Maiden Name">Father’s Maiden Name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="ans-block block">
                                                            <label for="">Answer</label>
                                                            <input type="text" class="form-control" id="person_aqtwo_ans_id" name="person_aqtwo_ans">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="qu-block block">
                                                            <label for="">Select First 3 letters of</label>
                                                            <select class="form-control" id="person_aqthree_id" name="person_aqthree">
                                                                <option value="Town Of Birth">Town Of Birth</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="ans-block block">
                                                            <label for="">Answer</label>
                                                            <input type="text" class="form-control" id="person_aqthree_ans_id" name="person_aqthree_ans">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="addressing" role="tabpanel" aria-labelledby="addressing-tab"></div>
                                    <div class="tab-pane fade" id="nature-control" role="tabpanel" aria-labelledby="nature-control-tab">
                                        <div class="position-area">
                                            <div class="form-info-block mb-0">
                                                <div class="desc mb-3">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/assets/images/form-icon.png')}}" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h5>Nature of Control</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium :</p>
                                                        <ul class="mb-4">
                                                            <li>Consectetur adipiscing elit phasellus scelerisque porta enim ut interdum. </li>
                                                            <li>Aliquam mollis enim non purus laoreet, ut pretium lorem porta. </li>
                                                            <li>Integer eleifend velit ut aliquam convallis. </li>
                                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                                            <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                        </ul>
                                                        <h5>Guidance in completing this section</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque porta enim ut interdum. Aliquam mollis enim non purus laoreet, ut pretium :</p>
                                                        <ul>
                                                            <li>Consectetur adipiscing elit phasellus scelerisque porta enim ut interdum. </li>
                                                            <li>Aliquam mollis enim non purus laoreet, ut pretium lorem porta. </li>
                                                            <li>Integer eleifend velit ut aliquam convallis. </li>
                                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                                            <li>Phasellus scelerisque porta enim ut interdum. </li>
                                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4>Natural of Control</h4>
                                            </div>
                                            <div class="natural-of-control-block mb-4">
                                                <h5>Does this officer have a controlling interest in this company?</h5>
                                                <div class="authe-qu-block">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="qu-block block">
                                                                <label for="" class="d-flex"><span class="icon"><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span> <span class="text">Ownership of shares</span></label>
                                                                <select class="form-control">
                                                                    <option value="">N/A</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="qu-block block">
                                                                <label for="" class="d-flex"><span class="icon"><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span> <span class="text">Voting Rights</span></label>
                                                                <select class="form-control">
                                                                    <option value="">N/A</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="qu-block block">
                                                                <label for="" class="d-flex"><span class="icon"><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span> <span class="text">Appoint or remove the majority of the board of directors</span></label>
                                                                <select class="form-control">
                                                                    <option value="">No</option>
                                                                    <option value="">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="qu-block block">
                                                                <label for="" class="d-flex"><span class="icon"><img src="{{ asset('frontend/assets/images/in-icon.png')}}" alt=""></span> <span class="text">Other Significant influences
                                                                        or control</span></label>
                                                                <select class="form-control">
                                                                    <option value="">No</option>
                                                                    <option value="">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="qu-panel">
                                                <p>Does this officer have a controlling influence over a Firm(s) and/or the Members of that Firm(s), which also has a controlling influence in the company?</p>
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
                                                <p>Does this officer have a controlling influence over a Trust(s) and/or the Trustees of that Trust(s), which also has a controlling influence in the company?</p>
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="no" name="com-qu2">
                                                        <label for="no">No</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="yes" name="com-qu2">
                                                        <label for="yes">yes</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="share-holder" role="tabpanel" aria-labelledby="share-holder-tab"></div>
                                </div>
                            </div>
                            <div class="step-btn-wrap mt-4">
                                <button class="btn prev-btn">Cancel</button>
                                <button class="btn" onclick="checkConsentOrNot()">Next <img src="{{ asset('frontend/assets/images/btn-right-arrow.png')}}" alt=""></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="appointmentType" value="" readonly>
    <input type="text" id="shoppingCartId_id" value="{{$shoppingCartId}}" readonly>
    <input type="text" id="currentTab" value="" readonly>

    <!-- PERSON SECTION DATAS -->
    <input type="text" id="choosedPersonOfficerId" value="" readonly>
</section>
<!-- ================ end: Particulars sec ================ -->
@endsection

@section('script')

<script>
    const addNewOfficer = function() {
        $('#officer-tab').toggleClass('active');
        $('#officer').toggleClass('active show');

        $('#details-tab').toggleClass('active');
        $('#details').toggleClass('active show');
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

            $.ajax({
                url: "{!! route('save-person-officer') !!}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    shoppingCartId,
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
                    console.log(response['id']);
                    $('#choosedPersonOfficerId').val(response['id'])
                },
            });

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
            alert('Please Choose a Position.');
            return false
        }

        if ($('.occLinkCls').hasClass('d-none') === false && $('#occ').is(":checked") === false) {
            alert('Please Check the Confirmation Of consent');
        } else {
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

    function anotherForwardingAdd() {
        $(".buyNowAfterSelectingAdd").hide();
        $('.hideEdit').removeClass('d-none');
    }

    function gotoPage() {
        $.ajax({
            url: "{!! route('remove-forwarding-business-address-section') !!}",
            type: 'get',
            success: function(result) {
                setTimeout(function() {
                    $('.selc-addr').text('Select');
                }, 2000);
                window.location.href = "{{ route('choose-address-after-buy-now')}}"
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
                // window.location.href = "{{ route('choose-address-business')}}"
            },
        });

    };

    function gotoBusinessAddressChoosePage() {
        window.location.href = "{{ route('choose-address-business')}}"
    };

    function selectedForwardAdd(id) {

        $.ajax({
            url: "{!! route('update-forwarding-business-office-address') !!}",
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

    // function addAddress() {
    //     $(".hideEdit").hide();
    //     $('.addAddressForm').removeClass('d-none');
    // }

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