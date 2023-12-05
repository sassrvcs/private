@extends('layouts.app')
@section('content')
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
                    <li><a href="/">Home</a></li>
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
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">

                    @include('layouts.navbar')

                    <div class="MyAccount-content col-md-12">
                        <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">
                            <h3 class="mb-2">FORMATIONSHUNT LTD</h3>
                        </div>
                        @if($cartCount > 0)
                        <div class="MyAccount-content col-md-6">
                            <span>You have {{ $cartCount }} items in your cart.
                                <a href="{{ route('cart-company', ['order' => $order_id]) }}" class="btn btn-primary col-md-3">View Cart</a>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="sec-common-title-s2 mt-4">
                            <h1>Editing: Amrutaben Patel</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="customer-signup-s1">
                            <form method="post" action="" class="form-register register">
                                <input type="hidden" name="_token" value="">
                                <fieldset class="border px-3 py-4">
                                    <legend class="float-none w-auto p-2">Would you like to file this change at Companies House ?</legend>

                                    <div class=" px-0 col-md-12 col-12 mb-2">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="house_radio1" name="houseChange" value="1" type="radio">
                                            <label for="house_radio1">Yes - I want to make this an official appointment at Companies House</label>
                                        </div>
                                    </div>
                                    <div class=" px-0 col-md-12 col-12">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="house_radio2" name="houseChange" type="radio" value="2">
                                            <label for="house_radio2">
                                                No - I just want to update 1st Formations records of a previous change
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="border px-3 py-4">
                                    <legend class="float-none w-auto p-2">Position</legend>
                                    @foreach ( $positionArray as $position)
                                    <div class=" px-0 col-md-12 col-12 mb-2"> 
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="positionChk1" name="direction" value="{{ $position }}"  checked type="checkbox">
                                            <label for="{{ $position }}">{{$position}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Holdings</legend>
                                    <div class="holdingGroup">
                                        <div class="form-row form-group ">
                                            <label for="username">Class
                                            </label>
                                            <span class="input-wrapper">
                                                <input type="text" class="input-text form-control " name="organisation" value="ORDINARY" readonly>
                                            </span>
                                        </div>

                                        <div class="form-row form-group ">
                                            <label>Quantity:</label>
                                            <span class="input-wrapper ">
                                                <input class="form-control " type="text" name="forename" value="{{$appointment_details['sh_quantity']}}">
                                            </span>
                                        </div>


                                        <div class="form-row form-group ">
                                            <label>Price:</label>
                                            <span class="input-wrapper ">
                                                <input class="form-control " type="text" name="surname" value="{{$appointment_details['sh_pps']}}">
                                            </span>
                                        </div>

                                        <div class="form-row form-group ">
                                            <label>Currency:</label>
                                            <span class="input-wrapper ">
                                                <input class="form-control " type="text" name="surname" value="{{$appointment_details['sh_currency']}}">
                                            </span>
                                        </div>


                                        <div class="form-row form-group ">
                                            <label>Particulars:</label>
                                            <span class="input-wrapper ">
                                                <textarea rows="4" cols="30" class="form-control ">{{ isset($appointment_details['perticularsTextArea']) ? $appointment_details['perticularsTextArea'] : '' }}</textarea>
                                            </span>
                                        </div>
                                        <div class="mt-3">
                                            <button type="button" class="theme-btn-primary px-2 py-1">Remove Holding</button>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="button" class="theme-btn-primary px-2 py-1">Add Holding</button>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Personal Details
                                    </legend>
                                    <div class="form-row form-group ">
                                        <label for="username">Title:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="" class=" form-control" value="{{ $officer_details['title']}}">
                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="username">First Name(s):</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="" class=" form-control" value="{{ $officer_details['first_name']}}">
                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="username">Last Name:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="" class=" form-control" value="{{ $officer_details['last_name']}}">
                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="">Date of Birth:</label>
                                        <span class="input-wrapper">
                                            <input type="date" max="{{ now()->subYears(16)->format('Y-m-d') }}" name="" class=" form-control" value="{{ $officer_details['dob_day']}}">   
                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="">Occupation:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="" class=" form-control" value="{{ $officer_details['occupation']}}">
                                        </span>
                                    </div>
                                    <div class="form-row form-group ">
                                        <label for="">Nationality:
                                            <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button></label>
                                        <span class="input-wrapper">
                                           {{-- <input type="text" name="" class=" form-control" value="{{ $officer_details['nationality'] }}"> --}}

                                           <select name="person_national" class="form-control"
                                                                    id="person_national_id">

                                            @if (!empty($nationalities))
                                                @foreach ($nationalities as $nationals)
                                                    <option value="{{ $nationals['id'] }}"
                                                        {{ $nationals['id'] === intval($officer_details['nationality']) ? 'selected' : '' }}>
                                                        {{ $nationals['nationality'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Nature of Control</legend>
                                    <div class="box-wrap mb-3">
                                        <strong class="d-block">Does this officer have a controlling interest in this company?</strong>
                                        <div class="d-block">
                                            <div class="form-row form-group ">
                                                <label for="username">Ownership of shares&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="F_ownership">
                                                    <option value="">N/A</option>
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['noc_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not more
                                                        than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['noc_os'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less than
                                                        75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['noc_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Voting rights&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="F_voting">
                                                    <option value="">N/A</option>
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['noc_vr'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not more than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['noc_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less than 75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['noc_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Appoint or remove the majority of the board of directors&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="F_appoint">
                                                    <option value="">N/A</option>
                                                    <option value="No" {{stripos($appointment_details['noc_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{stripos($appointment_details['noc_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Other significant influence or control&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control"
                                                    id="F_other_sig_select_id">
                                                    <option value="">N/A</option>
                                                    <option value="No" {{stripos($appointment_details['noc_others'], 'no') !== false ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{stripos($appointment_details['noc_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                       
                                        if($appointment_details['fci']==null||stripos($appointment_details['fci'],'no')!==false){
                                            $put_fci_val="No";
                                        }else{
                                            $put_fci_val="Yes";
                                        }
                                        if($appointment_details['tci']==null||stripos($appointment_details['tci'],'no')!==false){
                                            $put_tci_val="No";
                                        }else{
                                            $put_tci_val="Yes";
                                        }

                                    @endphp
                                    <div class="box-wrap mb-3">
                                        <strong class="d-block"> 
                                            <input class="mr-2" name="natureControl" {{$put_fci_val=='Yes' ? 'checked' : ''}} value="Yes" type="checkbox">
                                            Does this officer have a controlling influence over a Firm(s) and/or the Members of that Firm(s), which also has a controlling influence in this company?
                                        </strong>
                                        <div class="d-block">
                                            <div class="form-row form-group ">
                                                <label for="username">Ownership of shares&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="s_ownership">
                                                    <option value="">N/A</option> 
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['fci_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                        more than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['fci_os'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                        than 75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['fci_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Voting rights&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="s_voting">
                                                    <option value="">N/A</option>
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['fci_vr'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                        more than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['fci_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                        than 75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['fci_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Appoint or remove the majority of the board of directors&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="s_appoint">
                                                    <option value="">N/A</option>
                                                    <option value="No" {{stripos($appointment_details['fci_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{stripos($appointment_details['fci_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Other significant influence or control&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control"
                                                    id="s_other_sig_select_id">
                                                    <option value="">N/A</option>
                                                    <option value="No" {{stripos($appointment_details['fci_others'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{stripos($appointment_details['fci_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-wrap mb-3">
                                        <strong class="d-block">
                                            <input class="mr-2" name="natureControl" {{$put_tci_val=='Yes' ? 'checked' : ''}} value="Yes" type="checkbox">
                                            Does this officer have a controlling influence over a trust(s) and/or the trustees of that trust(s), which has a controlling interest in this company?
                                        </strong>
                                        <div class="d-block">
                                            <div class="form-row form-group ">
                                                <label for="username">Ownership of shares&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="t_ownership">
                                                    <option value="">N/A</option>
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                        more than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['tci_os'], 'More than 50%') !== false ? 'selected' : ''}} >More than 50% but less
                                                        than 75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['tci_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Voting rights&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                <select class="form-control" id="t_voting">
                                                    <option value="">N/A</option>
                                                    <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_vr'], 'More than 25% ') !== false ? 'selected' : ''}}>More than 25% but not
                                                        more than 50%</option>
                                                    <option value="More than 50% but less than 75%" {{strpos($appointment_details['tci_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                        than 75%</option>
                                                    <option value="75% or more" {{strpos($appointment_details['tci_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Appoint or remove the majority of the board of directors&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                    <select class="form-control" name="" id="t_appoint">
                                                        <option value="0">N/A</option>
                                                        <option value="No" {{strpos($appointment_details['tci_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                        <option value="Yes" {{strpos($appointment_details['tci_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                    </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                            <div class="form-row form-group ">
                                                <label for="username">Other significant influence or control&nbsp;</label>
                                                <span class="input-wrapper d-flex">
                                                    <select class="form-control" name="" id="t_other_sig_select_id">
                                                        <option value="0">N/A</option>
                                                        <option value="No" {{strpos($appointment_details['tci_others'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                        <option value="Yes" {{strpos($appointment_details['tci_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>                                                                  
                                                    </select>
                                                    <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                @php
                                    $appoint_own_address_id = '';
                                    $appoint_construct_own_address = '';
                                    $appoint_forwarding_address_id = '';
                                    $appoint_construct_forwarding_address = '';

                                    if($appointment_details['own_address']!=null)
                                    {
                                        $appoint_own_address_id = $appointment_details['own_address']['id'];
                                        $appoint_construct_own_address = $appointment_details['own_address']['house_number'].','.@$appointment_details['own_address']['street'].','.$appointment_details['own_address']['locality'] .','.$appointment_details['own_address']['town'].','.$appointment_details['own_address']['county'].','.$appointment_details['own_address']['post_code'];
                                    }
                                    if ($appointment_details['forwarding_address']!=null) {

                                        $appoint_forwarding_address_id = $appointment_details['forwarding_address']['id'];

                                        $appoint_construct_forwarding_address = $appointment_details['forwarding_address']['house_number'].','.@$appointment_details['forwarding_address']['street'].','.$appointment_details['forwarding_address']['locality'] .','.$appointment_details['forwarding_address']['town'].','.$appointment_details['forwarding_address']['county'].','.$appointment_details['forwarding_address']['post_code'];

                                    }

                                @endphp
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Residential Address</legend>
                                    <p>All officers are required under the Companies Act to declare their residential address. This address is held by Companies House but is not made public.<strong>{{@$officer_address}}</strong></p>

                                    <div class="mt-2 d-flex">
                                        <button type="button" id="editResidentialAddress" class="theme-btn-primary px-2 py-1 mr-2">Edit</button>
                                        <button type="button" class="theme-btn-primary px-2 py-1">Choose Address</button>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Service Address</legend>
                                    <p>A service address is defined under s1141 as ‘an address at which documents maybe effectively served upon that person’. This is the address that is filed on the public register, it may for example, be your residential address or your registered office address.</p>

                                    <div class="form-row py-1">
                                        <div class="col-sm-6">
                                            <label for="">{{$purchase_address->title}}</label>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                            <p class="m-0">£{{$purchase_address->price}}</p>
                                            <button type="button" class="theme-btn-primary px-4 py-2">Select</button>
                                        </div>
                                    </div>
                                    <div class="form-row py-1">
                                        <div class="col-sm-6">
                                            <label for="">Choose Service Address</label>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                            <p class="m-0">{{@$officer_address}}</p>
                                            <button type="button" class="theme-btn-primary px-4 py-2">Select</button>
                                        </div>
                                    </div>
                                    <div class="form-row py-1">
                                        <div class="col-sm-6">
                                            <label for="">Same as Registered Office Address</label>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                                            <button type="button" class="theme-btn-primary px-4 py-2 mr-2">YES</button>
                                            <button type="button" class="theme-btn-primary px-4 py-2">NO</button>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Forwarding Address</legend>
                                    <p><strong>{{@$appoint_construct_forwarding_address}}</strong></p>

                                    <div class="mt-2 d-flex">
                                        <button type="button" class="theme-btn-primary px-2 py-1 mr-2">Edit</button>
                                        <button type="button" class="theme-btn-primary px-2 py-1">Choose Address</button>
                                    </div>
                                </fieldset>

                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Notification/Register Entry Date
                                    </legend>
                                    <div class="form-row form-group">
                                        <label for="">Notification Date:</label>
                                        <span class="input-wrapper">
                                            <input type="date" name="notificationDate" id="notificationDate" class=" form-control">
                                        </span>
                                    </div>
                                    <div class="form-row form-group">
                                        <label for="">Register Entry Date:</label>
                                        <span class="input-wrapper">
                                            <input type="date" name="registerEntryDate" id="registerEntryDate" class=" form-control">
                                        </span>
                                    </div>
                                </fieldset>


                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-primary update-btn">Update Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal-s1" id="primaryAddressConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form class="primaryAddrUpdateForm formInput" id="primeinputs">
                            <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">


                            


                                <div class="form-row form-group ">
                                    <label>Name / Number:&nbsp;
                                        </span>
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" id="house_no1" name="house_no" class="input-text form-control house_no" value="{{$officer_details['address']['house_number']}}">
                                    </span>
                                </div>
                                <div class="form-row form-group ">
                                    <label for="billing_title">Street:&nbsp;
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" name="street" id="street1" class="input-text form-control steet_no" value="{{$officer_details['address']['street']}}">
                                    </span>

                                </div>
                                <div class="form-row form-group">
                                    <label for="locality">Locality:
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" name="locality" id="locality1" class="input-text form-control locality" value="{{$officer_details['address']['locality']}}">
                                    </span>

                                </div>
                                <div class="form-row form-group">
                                    <label for="town">Town:&nbsp;
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" name="town" id="town1" class="input-text form-control town" value="{{$officer_details['address']['town']}}">
                                    </span>

                                </div>
                                <div class="form-row form-group">
                                    <label for="county">County:&nbsp;
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" name="county" id="county1" class="input-text form-control county" value="{{$officer_details['address']['county']}}">
                                    </span>

                                </div>
                                <div class="form-row form-group">
                                    <label for="postcode">Post Code:&nbsp;
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" name="post_code" class="input-text form-control zip" value="{{$officer_details['address']['post_code']}}">
                                    </span>
                                </div>
                                <div class="form-row update_totals_on_change form-group">
                                    <label for="billing_country">Country&nbsp;</label>
                                    <span class="input-wrapper">
                                        <select name="billing_country" id="billing_country" name="billing_country" class="contry country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                            <option value="">Select a country / region…</option>

                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" {{ ( $country->id == $officer_details['address']['billing_country']) ? 'selected' : '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </span>

                                </div>
                                <input type="hidden" class="address_type" name="address_type" value="primary_address">
                                <div class="modal-footer">
                                    <button type="button" id="primary_submit" class="btn btn-primary billingAddrSubmit" data-dismiss="modal" onclick="editPrimaryAddressfn({{$officer_details['address']['id']}})">Submit Changes</button>
                                </div>
                      
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
<script>
    // Get today's date in the format YYYY-MM-DD
    function getTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0');
        const day = today.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set today's date as the default value for the date inputs using jQuery
    $(document).ready(function () {
        $('#notificationDate').val(getTodayDate());
        $('#registerEntryDate').val(getTodayDate());

        $('#editResidentialAddress').click(function(){
            $('#primaryAddressConfirmModal').modal('show');
        });

    });
</script>
@endsection
