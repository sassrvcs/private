@extends('layouts.app')
@section('content')
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
        .guarantor_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }
        .member_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }
        .designated_i_tooltip {
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

        .s_own_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .s_vot_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .s_appo_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .s_other_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .t_own_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .t_vot_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .t_appo_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .t_other_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .class_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .sh_appo_i_tooltip {
            display: none;
            background-color: white;
            color: black;
            position: absolute;
        }

        .custom-input {
            cursor: pointer;
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
                            <h1>Editing: {{ $officer_details['first_name']}} {{ $officer_details['last_name']}}</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="customer-signup-s1">
                            <form method="POST" action="{{ route('save-companies-appointment') }} " id="edit_company_form" class="form-register register">
                                @csrf
                                <fieldset class="border px-3 py-4">
                                    <legend class="float-none w-auto p-2">Would you like to file this change at Companies House ?</legend>

                                    <div class=" px-0 col-md-12 col-12 mb-2">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="house_radio1" name="houseChange" value="1" type="radio" checked>
                                            <label for="house_radio1">Yes - I want to make this an official appointment at Companies House</label>
                                        </div>
                                    </div>
                                    <div class=" px-0 col-md-12 col-12 d-none">
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
                                    <div class="choose-possition-option">
                                        <ul>
                                            <li class= d-none {{$company_type=="Limited Liability Partnership"?'d-none':''}}>
                                                @php
                                                $positions = explode(',',$appointment_details['position']);
                                                $positions = array_map('trim', $positions);
                                                @endphp
                                                <input type="checkbox" name="position[]" @if (in_array("Director", $positions))checked
                                                @endif class="checkBoxPos" id="director"
                                                    value="Director" onclick="consentSection()"
                                                    value="">
                                                <label for="director">Director <span><img
                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                            alt="" id="director_i"></span></label>
                                                <span class="director_i_tooltip">A private limited company
                                                        must have at least one director, being a natural person
                                                        aged 16 years or over. A director is responsible for the
                                                        day-to-day management of the business.</span>

                                            </li>
                                            <li class="d-none {{ $company_type == 'Limited By Shares' || $company_type == 'Public Limited Company' ? '' : 'd-none'}} {{$company_type=="Limited Liability Partnership"?'d-none':''}}">
                                                <input type="checkbox" name="position[]" @if (in_array("Shareholder", $positions))checked
                                                @endif class="checkBoxPos"
                                                    value="Shareholder" id="shareholder"
                                                    onclick="shareholderTab()">
                                                <label for="shareholder">Shareholders <span><img
                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                            alt=""
                                                            id="shareholder_i"></span></label>
                                                <span class="shareholder_i_tooltip">Shareholders are the
                                                        owners of the company and are generally entitled to a
                                                        share of company profits. You must appoint at least one
                                                        shareholder.</span>
                                            </li>
                                            <li class="d-none {{$company_type == 'Limited By Guarantee' ? '' : 'd-none'}}">

                                                <input type="checkbox" name="position[]" class="checkBoxPos"
                                                value="Guarantor" id="guarantor_checkbox"
                                                onclick="guaranteeTab()" @if (in_array("Guarantor", $positions))checked
                                                @endif>
                                                <label for="guarantor">Guarantor<span><img
                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                alt=""
                                                id="guarantor_i"></span></label>
                                                <span class="guarantor_i_tooltip">If this officer is to guarantee an amount in this company, please check this box. You will be asked about the amount guaranteed later.</span>

                                            </li>
                                            <li class="d-none {{$company_type == 'Limited Liability Partnership' ? '' : 'd-none'}}">

                                                <input type="checkbox" name="position[]" class="checkBoxPos"
                                                value="Member" id="member_checkbox" onclick="llpConsent()" @if (in_array("Member", $positions))checked
                                                @endif>
                                                <label for="member">Member <span><img
                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                alt=""
                                                id="member_i"></span></label>
                                                <span class="member_i_tooltip">Is this officer to be a member of this LLP?  .</span>

                                        </li>
                                            <li class="d-none {{$company_type=="Limited Liability Partnership"?'d-none':''}}">
                                                <input type="checkbox" name="position[]" @if (in_array("Secretary", $positions))checked
                                                @endif class="checkBoxPos" id="secretary"
                                                    value="Secretary"  onclick="consentSection()">
                                                <label for="secretary">Secretary <span><img
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
                                            <li class="d-none {{$company_type == 'Limited Liability Partnership' ? '' : 'd-none'}}">

                                                <input type="checkbox" name="position[]" class="checkBoxPos"
                                                value="Designated Member"  id="designated_checkbox" onclick="designatedTab(),llpConsent()" @if (in_array("Designated Member", $positions))checked @endif>
                                                <label for="designated">Designated <span><img
                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                alt=""
                                                id="designated_i"></span></label>
                                                <span class="designated_i_tooltip">An LLP must have a minimum of two Designated Members. If this officer is to be a Designated Member, please check this box.

                                                A Designated Member has all the responsibilities as a non-Designated Member, along with the following additional responsibilities:

                                                If an auditor is required, they will be appointed by the designated member. Notifying the required parties of any changes to the membership, name or address of the partnership. Signing and delivering accounts on behalf of the partnership.</span>
                                        </li>
                                            <li class="d-none">
                                                <input type="checkbox" name="position[]" @if (in_array("PSC", $positions))checked
                                                @endif class="checkBoxPos" id="psc"
                                                    value="PSC" onclick="pscTab()">
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
                                            @error('position')
                                            <span class="error" style="color: red">Select Atleast One Position</span>
                                            @enderror
                                            <br class="brCls d-none">
                                            <li class="pt-2 member_consent_checkbox_li d-none">

                                                <input type="checkbox" class=""
                                                value="1" id="member_consent_checkbox">
                                                <label for="member_consent_checkbox">The LLP confirms that the named officer has consented to act as a member of the LLP. </label>
                                            </li>
                                            <li class="occLinkCls d-none" style="display: none;">
                                                <input type="checkbox" id="occ" @if ((in_array("Secretary", $positions))||(in_array("Director", $positions)))checked
                                                @endif>
                                                <label for="occ" id="consentText_id">
                                                    @if ($company_type == 'Limited By Shares' || $company_type == 'Public Limited Company')
                                                    The officers
                                                    confirm they have
                                                    consented to act as a Director or Secretary
                                                    @endif
                                                    @if ($company_type == 'Limited By Guarantee')
                                                    The guarantors confirm that the named officer has consented to act as a Director or Secretary
                                                    @endif
                                                </label>
                                            </li>
                                            <div class="error d-none" id="consentSelectionDiv"
                                                style="color:red;">This officer must give their consent in
                                                order to be appointed on this company.</div>
                                        </ul>
                                        <div class="error d-none" id="positionSelectionDiv"
                                            style="color:red;">You have to
                                            select a Position.</div>
                                    </div>
                                    <div class="px-0 form-check">
                                            <input class="mr-2" id="house_radio2" name="demo_psc" type="radio" value="PSC" checked>
                                            <label for="house_radio2">
                                                    Person with Significant Control (PSC)
                                            </label>
                                        </div>
                                </fieldset>
                                <fieldset class="border p-3 d-none">
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
                                <fieldset class="border p-3 personal-details-fieldset">
                                    <legend class="float-none w-auto p-2">Personal Details
                                    </legend>
                                    <div class="form-row form-group d-none">
                                        <label for="username">Title:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="officer_title" class=" form-control" value="{{ $officer_details['title']}}">
                                        </span>
                                    </div>
                                    <div class="form-row form-group d-none">
                                        <label for="username">First Name(s):</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="officer_fName" class=" form-control {{ $errors->has('officer_fName') ? 'is-invalid' : ''}}" value="{{ $officer_details['first_name']}}">
                                            @error('officer_fName')
                                            <span class="error" style="color: red">First Name is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group d-none">
                                        <label for="username">Last Name:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="officer_lName" class=" form-control {{ $errors->has('officer_lName') ? 'is-invalid' : ''}}" value="{{ $officer_details['last_name']}}">
                                            @error('officer_lName')
                                            <span class="error" style="color: red">Last Name is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group d-none">
                                        <label for="">Date of Birth:</label>
                                        <span class="input-wrapper">
                                            <input type="date" max="{{ now()->subYears(16)->format('Y-m-d') }}" id="officer_dob" name="officer_dob" class=" form-control {{ $errors->has('officer_dob') ? 'is-invalid' : ''}}" value="{{ $officer_details['dob_day']}}">
                                            @error('officer_dob')
                                            <span class="error" style="color: red">DOB is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group d-none">
                                        <label for="">Occupation:</label>
                                        <span class="input-wrapper">
                                            <input type="text" name="officer_occupation" class=" form-control {{ $errors->has('officer_occupation') ? 'is-invalid' : ''}}" value="{{ $officer_details['occupation']}}">
                                            @error('officer_occupation')
                                            <span class="error" style="color: red">Occupation is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group d-none">
                                        <label for="">Nationality:
                                            <button type="button" class="helpBtn ml-1"><img src="assets/images/help.png" alt=""></button></label>
                                        <span class="input-wrapper">
                                           {{-- <input type="text" class=" form-control" value="{{ $officer_details['nationality'] }}"> --}}

                                           <select name="person_national" name="officer_nationality" class="form-control"
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
                                    <div class="form-row form-group">
                                        <label for="">Legal Name</label>
                                        <span class="input-wrapper">
                                            <input type="text" class="form-control {{ $errors->has('legal_name') ? 'is-invalid' : ''}}"
                                            id="legal_name" name="legal_name" value="{{@$officer_details['legal_name']}}">
                                            @error('legal_name')
                                            <span class="error" style="color: red">Legal Name is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group law_governed_div">
                                        <label for="">Law Governed</label>
                                        <span class="input-wrapper">
                                        <input type="text" class="form-control  {{ $errors->has('law_governed') ? 'is-invalid' : ''}}"
                                            id="law_governed" name="law_governed" value="{{@$officer_details['law_governed']}}" >
                                            @error('law_governed')
                                            <span class="error" style="color: red">Law Governed is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group legal_form_div">
                                        <label for="">Legal Form:</label>
                                        <span class="input-wrapper">
                                        <input type="text" class="form-control {{ $errors->has('legal_form') ? 'is-invalid' : ''}}"
                                            id="legal_form" name="legal_form" value="{{@$officer_details['legal_form']}}">
                                            @error('legal_form')
                                            <span class="error" style="color: red">Legal Form is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3 nature-of-control d-none">
                                    <legend class="float-none w-auto p-2">Nature of Control</legend>
                                                @php
                                                    $share_text = "Ownership of shares";
                                                    $appoint_or_remove_text = "Appoint or remove the majority of the board of directors";
                                                    if ($company_type=='Limited Liability Partnership') {
                                                        $share_text = "Right to share surplus assets";
                                                        $appoint_or_remove_text = "Appoint and remove members";
                                                    }
                                                @endphp
                                                <div class="natural-of-control-block mb-4">
                                                    <h5>Does this officer have a controlling interest in this company?
                                                    </h5>
                                                    <div class="authe-qu-block">
                                                        <div class="row {{$company_type=='Limited By Guarantee'?'d-none':''}}">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block ">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="own_i"></span>
                                                                        <span class="text">
                                                                            {{$share_text}}
                                                                        </span></label>
                                                                    <select class="form-control" id="F_ownership" name="noc_os"
                                                                        onchange="show_hide_F_other_sig()">
                                                                        <option value="">N/A</option>
                                                                        <option value="More than 25% but not more than 50%" {{strpos($appointment_details['noc_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not more
                                                                            than 50%</option>
                                                                        <option value="More than 50% but less than 75%" {{strpos($appointment_details['noc_os'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less than
                                                                            75%</option>
                                                                        <option value="75% or more" {{strpos($appointment_details['noc_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
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
                                                                            {{-- {{dd($appointment_details['noc_os'])}} --}}
                                                                    <select class="form-control" id="F_voting" name="noc_vr"
                                                                        onchange="show_hide_F_other_sig()">
                                                                        <option value="">N/A</option>
                                                                        <option value="More than 25% but not more than 50%" {{strpos($appointment_details['noc_vr'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not more than 50%</option>
                                                                        <option value="More than 50% but less than 75%" {{strpos($appointment_details['noc_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less than 75%</option>
                                                                        <option value="75% or more" {{strpos($appointment_details['noc_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
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
                                                                        <span class="text">
                                                                            {{$appoint_or_remove_text}}
                                                                        </span></label>
                                                                    <select class="form-control" id="F_appoint" name="noc_appoint"
                                                                        onchange="show_hide_F_other_sig()">
                                                                        <option value="No" {{stripos($appointment_details['noc_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                                        <option value="Yes" {{stripos($appointment_details['noc_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
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
                                                        @php
                                                            if($appointment_details['noc_appoint']!='' || $appointment_details['noc_vr']!='' || (stripos($appointment_details['noc_appoint'], 'No') !== false))
                                                            { $hide_f_other_sig = "d-none"; }
                                                            else
                                                            {$hide_f_other_sig="";}
                                                            if(!(in_array("PSC", $positions)))
                                                            {
                                                                $hide_f_other_sig="";
                                                            };
                                                            if((stripos($appointment_details['noc_others'], 'Yes') !== false))
                                                            {
                                                                $hide_f_other_sig="";
                                                            }


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
                                                        <div class="row {{$hide_f_other_sig}}" id="F_other_sig" >
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex"><span
                                                                            class="icon"><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                alt="" id="other_i"></span>
                                                                        <span class="text">Other Significant
                                                                            influences
                                                                            or control</span></label>

                                                                    <select class="form-control" name="noc_others"
                                                                        id="F_other_sig_select_id">
                                                                        <option value="No" {{stripos($appointment_details['noc_others'], 'no') !== false ? 'selected' : ''}}>No</option>
                                                                        <option value="Yes" {{stripos($appointment_details['noc_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
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
                                                            <input type="radio" id="no"
                                                                onclick="f_radio_check()" value="No" {{$put_fci_val=='No' ? 'checked' : ''}}
                                                                name="com-qu">
                                                            <label for="no">No</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="yes"
                                                                onclick="f_radio_check()"  {{$put_fci_val=='Yes' ? 'checked' : ''}} value="Yes" name="com-qu">
                                                            <label for="yes">yes</label>
                                                        </li>
                                                    </ul>
                                                    <div class="mt-4 mb-4 {{$put_fci_val=='No' ? 'd-none' : ''}}" id="firmDD">
                                                        <h5>What influence or control does this officer have over this
                                                            company in their capacity within the Firm(s) ?
                                                        </h5>
                                                        <div class="authe-qu-block">
                                                            <div class="row {{$company_type=='Limited By Guarantee'?'d-none':''}}">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block ">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">
                                                                                {{$share_text}}
                                                                            </span>
                                                                        </label>
                                                                            {{-- {{$appointment_details['fci_os']}} --}}
                                                                        <select class="form-control" id="s_ownership" name="fci_os"
                                                                            onchange="show_hide_s_other_sig()">
                                                                            <option value="">N/A</option>
                                                                            <option value="More than 25% but not more than 50%" {{strpos($appointment_details['fci_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                                                more than 50%</option>
                                                                            <option value="More than 50% but less than 75%" {{strpos($appointment_details['fci_os'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                                                than 75%</option>
                                                                            <option value="75% or more" {{strpos($appointment_details['fci_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="s_own_i"></span>
                                                                <span class="s_own_i_tooltip">If this person holds
                                                                    more
                                                                    than 25% of the issued shares, directly or
                                                                    indirectly, then they meet this nature of
                                                                    control
                                                                    condition. Please select their shareholding
                                                                    percentage range from the drop down menu.</span>

                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">Voting
                                                                                Rights</span>
                                                                        </label>
                                                                        <select class="form-control" id="s_voting" name="fci_vr"
                                                                            onchange="show_hide_s_other_sig()">
                                                                            <option value="">N/A</option>
                                                                            <option value="More than 25% but not more than 50%" {{strpos($appointment_details['fci_vr'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                                                more than 50%</option>
                                                                            <option value="More than 50% but less than 75%" {{strpos($appointment_details['fci_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                                                than 75%</option>
                                                                            <option value="75% or more" {{strpos($appointment_details['fci_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="s_vot_i"></span>
                                                                <span class="s_vot_i_tooltip">If this person holds
                                                                    more
                                                                    than 25% of the available voting rights,
                                                                    directly or
                                                                    indirectly, then they meet this nature of
                                                                    control
                                                                    condition. Please select their voting power
                                                                    percentage range from the drop down menu.</span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">
                                                                                {{$appoint_or_remove_text}}
                                                                            </span>
                                                                        </label>

                                                                        <select class="form-control" id="s_appoint" name="fci_appoint"
                                                                            onchange="show_hide_s_other_sig()">
                                                                            <option value="No" {{stripos($appointment_details['fci_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                                            <option value="Yes" {{stripos($appointment_details['fci_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="s_appo_i"></span>
                                                                <span class="s_appo_i_tooltip">If this person is
                                                                    entitled, directly or indirectly, to appoint and
                                                                    remove a majority of the board of directors then
                                                                    they meet this nature of control condition. Any
                                                                    person that controls over 50% of the votes may
                                                                    appoint the directors by ordinary resolution,
                                                                    but a
                                                                    person could be given this explicit right in the
                                                                    Articles of Association or a Shareholders'
                                                                    Agreement.</span>
                                                                {{-- <div class="col-md-6 col-sm-12">
                                                                </div> --}}
                                                            </div>
                                                            <div class="row" id="s_other_sig">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">Other Significant
                                                                                influences or control</span></label>
                                                                        <select class="form-control"
                                                                            id="s_other_sig_select_id" name="fci_others">
                                                                            <option value="No" {{stripos($appointment_details['fci_others'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                                            <option value="Yes" {{stripos($appointment_details['fci_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="s_other_i"></span>
                                                                <span class="s_other_i_tooltip">If this individual
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
                                                    </div>
                                                </div>

                                                <div class="qu-panel">
                                                    <p>Does this officer have a controlling influence over a trust(s)
                                                        and/or
                                                        the trustees of that trust(s), which has a controlling interest
                                                        in
                                                        this company?</p>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" id="no2" onclick="s_radio_check()"
                                                                value="No" checked name="com-qu2" {{$put_fci_val=='No' ? 'checked' : ''}}>
                                                            <label for="no2">No</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="yes2" onclick="s_radio_check()"
                                                                value="Yes" name="com-qu2" {{$put_tci_val=='Yes' ? 'checked' : ''}}>
                                                            <label for="yes2">yes</label>
                                                        </li>
                                                    </ul>
                                                    <div class="mt-4 mb-4 {{$put_tci_val=='No' ? 'd-none' : ''}} " id="trustDD">
                                                        <h5>What control or influence does this officer have over this
                                                            company in their capacity within the Trust(s) ?
                                                        </h5>
                                                        <div class="authe-qu-block">
                                                            <div class="row {{$company_type=='Limited By Guarantee'?'d-none':''}}">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block ">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">
                                                                                {{$share_text}}
                                                                            </span>
                                                                        </label>
                                                                        <select class="form-control" id="t_ownership" name="tci_os"
                                                                            onchange="show_hide_t_other_sig()">
                                                                            <option value="">N/A</option>
                                                                            <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                                                more than 50%</option>
                                                                            <option value="More than 50% but less than 75%" {{strpos($appointment_details['tci_os'], 'More than 50%') !== false ? 'selected' : ''}} >More than 50% but less
                                                                                than 75%</option>
                                                                            <option value="75% or more" {{strpos($appointment_details['tci_os'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="t_own_i"></span>
                                                                <span class="t_own_i_tooltip">If this person holds
                                                                more
                                                                than 25% of the issued shares, directly or
                                                                indirectly, then they meet this nature of
                                                                control
                                                                condition. Please select their shareholding
                                                                percentage range from the drop down menu.</span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">Voting
                                                                                Rights</span>
                                                                        </label>

                                                                        <select class="form-control" name="tci_vr"
                                                                            id="t_voting"
                                                                            onchange="show_hide_t_other_sig()">
                                                                            <option value="">N/A</option>
                                                                            <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_vr'], 'More than 25% ') !== false ? 'selected' : ''}}>More than 25% but not
                                                                                more than 50%</option>
                                                                            <option value="More than 50% but less than 75%" {{strpos($appointment_details['tci_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
                                                                                than 75%</option>
                                                                            <option value="75% or more" {{strpos($appointment_details['tci_vr'], '75% or more') !== false ? 'selected' : ''}}>75% or more</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="t_vot_i"></span>

                                                                <span class="t_vot_i_tooltip">If this person holds
                                                                more
                                                                than 25% of the available voting rights,
                                                                directly or
                                                                indirectly, then they meet this nature of
                                                                control
                                                                condition. Please select their voting power
                                                                percentage range from the drop down menu.</span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">
                                                                                {{$appoint_or_remove_text}}
                                                                        </label>

                                                                        <select class="form-control" name="tci_appoint"
                                                                            id="t_appoint"
                                                                            onchange="show_hide_t_other_sig()">
                                                                            <option value="No" {{strpos($appointment_details['tci_appoint'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                                            <option value="Yes" {{strpos($appointment_details['tci_appoint'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="t_appo_i"></span>
                                                                        <span class="t_appo_i_tooltip">If this person is
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
                                                            <div class="row" id="t_other_sig">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">Other Significant
                                                                                influences
                                                                                or control</span></label>
                                                                        <select class="form-control"
                                                                            id="t_other_sig_select_id" name="tci_others">
                                                                            <option value="No" {{strpos($appointment_details['tci_others'], 'No') !== false ? 'selected' : ''}}>No</option>
                                                                            <option value="Yes" {{strpos($appointment_details['tci_others'], 'Yes') !== false ? 'selected' : ''}}>Yes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span class="icon"><img
                                                                        src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                        alt="" id="t_other_i"></span>
                                                                        <span class="t_other_i_tooltip">If this individual
                                                                does
                                                                not meet any of the preceding natures of control
                                                                conditions, but still exerts, or has the right
                                                                to
                                                                exert, influence or control over the Company,
                                                                then
                                                                they meet this nature of control
                                                                condition.</span>
                                                                {{-- <div class="col-md-6 col-sm-12">
                                                                </div> --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="error d-none" id="psc_error_message" style="color: red">Please answer atleast one PSC question</span>
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
                                <fieldset class="border p-3 resident-address">
                                    <legend class="float-none w-auto p-2">Residential Address</legend>
                                    <p>All officers are required under the Companies Act to declare their residential address. This address is held by Companies House but is not made public.<strong id="selectedAddressDisplay">{{@$officer_address}}</strong></p>
                                        <input type="hidden" name="residential_add" class="103_add_id" value="{{$officer_details['add_id']}}">
                                        <input type="hidden" class="103_forward_add_id" value="">
                                        <input type="hidden" class="103_add_house_number" value="40 new add">
                                        <input type="hidden" class="103_add_street" value="North">
                                        <input type="hidden" class="103_add_locality" value="">
                                        <input type="hidden" class="103_add_town" value="Wembley">
                                        <input type="hidden" class="103_user_county" value="Greater London">
                                        <input type="hidden" class="103_address_post_code" value="ha90ae">
                                        <input type="hidden" class="103_address_billing_country" value="72">
                                    <div class="mt-2 d-flex">
                                        <button type="button" id="editResidentialAddress" class="theme-btn-primary px-2 py-1 mr-2">Edit</button>
                                        <button type="button" id="openResidentModalButton" class="theme-btn-primary px-2 py-1">Choose Address</button>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Service Address</legend>
                                    <p>A service address is defined under s1141 as ‘an address at which documents maybe effectively served upon that person’. This is the address that is filed on the public register, it may for example, be your residential address or your registered office address.</p>

                                    <div class="form-row py-1 chose-service-address">
                                        <div class="col-sm-6">
                                            <label for="">{{$purchase_address->title}}</label>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                            <p class="m-0">£{{$purchase_address->price}}</p>
                                            <input type="hidden" name="service_add_price" class="price" value="{{$purchase_address->price}}">
                                            <button type="button" id="purchaseAddressModal" class="theme-btn-primary px-4 py-2">Select</button>
                                        </div>
                                    </div>
                                    <div class="form-row py-1 chose-service-address">
                                        <div class="col-sm-6">
                                            <label for="">Choose Service Address</label>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                            <p class="m-0" id="selectFreeAddress">
                                            @if ($appointment_details['own_address']!=null)
                                                {{@$appoint_construct_own_address}}
                                            @endif
                                            @if ($appointment_details['forwarding_address']!=null)
                                                {{@$appoint_construct_forwarding_address}}
                                            @endif</p>
                                            <button type="button" id="freeAddressModal" class="theme-btn-primary px-4 py-2" data-id ="1">Select</button>
                                        </div>
                                    </div>
                                    <div class="form-row py-1">
                                        <div class="col-sm-6">
                                            <label for="">Same as Registered Office Address</label>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                                            <button type="button" class="theme-btn-primary px-4 py-2 mr-2 yes-button">YES</button>
                                            <button type="button" class="theme-btn-primary px-4 py-2 no-button">NO</button>
                                            <input type="hidden" name="same_reg_add" class="" value="0">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-3 forward-address">
                                    <legend class="float-none w-auto p-2">Forwarding Address</legend>
                                    <p><strong id="selectedForwardAddressDisplay">
                                            @if ($appointment_details['own_address']!=null)
                                                {{@$appoint_construct_own_address}}
                                            @endif
                                            @if ($appointment_details['forwarding_address']!=null)
                                                {{@$appoint_construct_forwarding_address}}
                                            @endif</strong></p>
                                        <input type="hidden" name="service_own_add" class="104_add_id" value="{{ $appoint_own_address_id }}">
                                        <input type="hidden" name="service_fwd_add" class="104_forward_add_id" value="{{ $appoint_forwarding_address_id }}">
                                        <input type="hidden" class="104_add_house_number" value="40 new add">
                                        <input type="hidden" class="104_add_street" value="North">
                                        <input type="hidden" class="104_add_locality" value="">
                                        <input type="hidden" class="104_add_town" value="Wembley">
                                        <input type="hidden" class="104_user_county" value="Greater London">
                                        <input type="hidden" class="104_address_post_code" value="ha90ae">
                                        <input type="hidden" class="104_address_billing_country" value="72">
                                    <div class="mt-2 d-flex">
                                        <button type="button" id="openBIllingModalButton" class="theme-btn-primary px-2 py-1">Choose Address</button>
                                    </div>
                                </fieldset>

                                <fieldset class="border p-3 notification-date">
                                    <legend class="float-none w-auto p-2">Notification/Register Entry Date
                                    </legend>
                                    <div class="form-row form-group">
                                        <label for="">Notification Date:</label>
                                        <span class="input-wrapper">
                                            <input type="date" name="notificationDate" id="notificationDate" class=" form-control {{ $errors->has('notificationDate') ? 'is-invalid' : ''}}">
                                            @error('notificationDate')
                                            <span class="error" style="color: red">Notification date is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-row form-group">
                                        <label for="">Register Entry Date:</label>
                                        <span class="input-wrapper">
                                            <input type="date" name="registerEntryDate" id="registerEntryDate" class=" form-control {{ $errors->has('registerEntryDate') ? 'is-invalid' : ''}}">
                                            @error('registerEntryDate')
                                            <span class="error" style="color: red">Register entry date is required</span>
                                            @enderror
                                        </span>
                                    </div>
                                </fieldset>


                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <button type="button" onclick="window.location.href='{{route('accepted-company',['order'=>request()->order,'c_id'=>request()->c_id])}}'" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-primary update-apt-btn ">Update Details</button>
                                </div>
                                <input type="hidden" name="f_radio_check_id" id="f_radio_check_id" value="{{$put_fci_val}}" readonly>
                                <input type="hidden" name="s_radio_check_id" id="s_radio_check_id" value="{{$put_tci_val}}" readonly>
                                <input type="hidden" name="company_order_id" id="company_order_id" value="{{$order_id}}" >
                                <input type="hidden" name="appointment_id" id="appointment_id" value="{{$_GET['id']}}" >
                                <input type="hidden" name="officer_id" id="officer_id" value="{{$officer_details['id']}}">
                                <input type="hidden" name="appointment_type" id="appointment_type" value="{{$appointment_details['appointment_type']}}">
                                <input type="hidden" name="address_house_price" class="address-house-price" value="">
                                <input type="hidden" name="c_id" id="c_id" value="{{$_GET['c_id']}}">
                                <input type="hidden" name="address_house_price" class="address-house-price" value="">



                                <input type="hidden" name="changesMadePosition" id="changesMade" value="0">
                                <input type="hidden" name="personalDetailsChanges" id="personalDetailsChanges" value="0">
                                <input type="hidden" name="natureOfControlChanges" id="natureOfControlChanges" value="0">
                                <input type="hidden" name="residentAddressChanges" id="residentAddressChanges" value="0">
                                <input type="hidden" name="forwardAddressChanges" id="forwardAddressChanges" value="0">
                                <input type="hidden" name="notificationDateChanges" id="notificationDateChanges" value="0">

                                <input type="hidden" id="uk_registered" name="uk_registered" value="{{$officer_details['uk_registered']}}" readonly>
                                <input type="hidden" id="registry_held" name="registry_held" value="{{$officer_details['registry_held']}}" readonly>
                                <input type="hidden" id="place_registered" name="place_registered" value="{{$officer_details['place_registered']}}" readonly>
                                <input type="hidden" id="registration_number" name="registration_number" value="{{$officer_details['registration_number']}}" readonly>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal-s1" id="chooseBIllingAddressResidentialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h3>Recently Used Addresses</h3>
                            <div>
                                @foreach($primary_address_list as $key => $value)
                                <div>
                                    <p>{{$value['house_number'] }}, {{$value['street']}},{{$value['locality']}},{{ $value['town']}}, {{ $value['county']}}</p>
                                    <p>{{ $value['country_name']}},{{ $value['post_code']}}</p>
                                    <input type="hidden" class="address-house-id" value="{{ $value['id']}}">
                                    <input type="hidden" class="address-house-number" value="{{ $value['house_number']}}">
                                    <input type="hidden" class="address-street" value="{{ $value['street']}}">
                                    <input type="hidden" class="address-locality" value="{{ $value['locality']}}">
                                    <input type="hidden" class="address-town" value="{{ $value['town']}}">
                                    <input type="hidden" class="address-county" value="{{ $value['county']}}">
                                    <input type="hidden" class="address-post-code" value="{{ $value['post_code']}}">
                                    <input type="hidden" class="address-country-name" value="{{ $value['country_name']}}">
                                    <button class="btn btn-primary select-address" data-dismiss="modal" type="button">Select</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary addNewAddress" data-dismiss="modal">Add new address</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal-s1" id="BIllingAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="choose_addr">
                            <h3>Recently Used Addresses</h3>
                            <div class="current_address_grp">
                                @foreach($billing_address_list as $key => $value)
                                <div class="addr_wrap">
                                    <p>@if($value['house_number']) {{ $value['house_number']}}, @endif @if($value['street']) {{$value['street']}}, @endif @if($value['locality']) {{$value['locality']}}, @endif @if($value['town']) {{ $value['town']}}, @endif {{ $value['county']}}</p>
                                    <p>{{ $value['country_name']}},{{ $value['post_code']}}</p>
                                </div>
                                <div class="button_select">
                                    <input type="hidden" class="address-house-id" value="{{ $value['id']}}">
                                    <input type="hidden" class="address-house-price" value="">
                                    <input type="hidden" class="address-house-number" value="{{ $value['house_number']}}">
                                    <input type="hidden" class="address-street" value="{{ $value['street']}}">
                                    <input type="hidden" class="address-locality" value="{{ $value['locality']}}">
                                    <input type="hidden" class="address-town" value="{{ $value['town']}}">
                                    <input type="hidden" class="address-county" value="{{ $value['county']}}">
                                    <input type="hidden" class="address-post-code" value="{{ $value['post_code']}}">
                                    <input type="hidden" class="address-country-name" value="{{ $value['country_name']}}">

                                    <button class="btn btn-primary select-forward-address" data-dismiss="modal" type="button">Select</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary addBillAddress" data-dismiss="modal">Add new address</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Residential Address modal pop up -->
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





        <div class="modal custom-modal-s1" id="addNewAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3" style="padding-top: 0 !important;">
                            <div class="form-row form-group">
                                <label>Post Code:</label>
                                <div class="input-wrapper with-rg-btn">
                                    <input type="text" class="form-control" name="post_code" id="post_code">
                                    <button type="button" class="btn btn-primary" id="findAddress">Find
                                        Address</button>
                                </div>
                                <p class="adderr text-danger"></p>
                            </div>
                        <form class="billingAddrUpdateForm formInputModal" >
                            <div class="form-row form-group ">
                                <label>House Name / Number: &nbsp;<span class="optional">
                                    </span>
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" id="house_no" name="house_no" class="input-text form-control house_no" value={{old('house_no')}}>
                                </span>
                            </div>
                            <div class="form-row form-group ">
                                <label for="billing_title">Street:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="street" id="street" class="input-text form-control steet_no @error('street') is-invalid @enderror" value={{old('street')}}>
                                </span>
                                @error('street')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="locality">Locality:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="locality" id="locality" class="input-text form-control locality @error('locality') is-invalid @enderror" value={{old('locality')}}>
                                </span>
                                @error('locality')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="town">Town:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="town" id="town" class="input-text form-control town @error('town') is-invalid @enderror" value={{old('town')}}>
                                </span>
                                @error('town')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="county">County:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="county" id="county" class="input-text form-control county @error('county') is-invalid @enderror" value="{{ old('county')}}">
                                </span>
                                @error('country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="billing_first_name">Post Code:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="post_code" id="zip" class="input-text form-control zip @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                                </span>
                                @error('post_code')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row update_totals_on_change form-group">
                                <label for="billing_country">Country&nbsp;</label>
                                <span class="input-wrapper">
                                    <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                        <option value="">Select a country / region…</option>
                                        <option value="236" selected>United Kingdom</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                @error('billing_country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" class="address_type" name="address_type" value="primary_address">
                            <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="saveAddr">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- <div class="modal custom-modal-s1" id="addNewBillAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3" style="padding-top: 0 !important;">
                            <div class="form-row form-group">
                                <label>Post Code:</label>
                                <div class="input-wrapper with-rg-btn">
                                    <input type="text" class="form-control" name="post_code" id="post_code">
                                    <button type="button" class="btn btn-primary" id="findAddress">Find
                                        Address</button>
                                </div>
                                <p class="adderr text-danger"></p>
                            </div>
                        <form class="billingAddrUpdateForm formInputModal" >
                            <div class="form-row form-group ">
                                <label>House Name / Number: &nbsp;<span class="optional">
                                    </span>
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" id="house_no" name="house_no" class="input-text form-control house_no" value={{old('house_no')}}>
                                </span>
                            </div>
                            <div class="form-row form-group ">
                                <label for="billing_title">Street:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="street" id="street" class="input-text form-control steet_no @error('street') is-invalid @enderror" value={{old('street')}}>
                                </span>
                                @error('street')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="locality">Locality:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="locality" id="locality" class="input-text form-control locality @error('locality') is-invalid @enderror" value={{old('locality')}}>
                                </span>
                                @error('locality')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="town">Town:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="town" id="town" class="input-text form-control town @error('town') is-invalid @enderror" value={{old('town')}}>
                                </span>
                                @error('town')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="county">County:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="county" id="county" class="input-text form-control county @error('county') is-invalid @enderror" value="{{ old('county')}}">
                                </span>
                                @error('country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="billing_first_name">Post Code:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="post_code" id="zip" class="input-text form-control zip @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                                </span>
                                @error('post_code')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row update_totals_on_change form-group">
                                <label for="billing_country">Country&nbsp;</label>
                                <span class="input-wrapper">
                                    <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                        <option value="">Select a country / region…</option>
                                        <option value="236" selected>United Kingdom</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                @error('billing_country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" class="address_type" name="address_type" value="billing_address">
                            <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="billingAddressSave">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> -->

        <!-- <div class="modal custom-modal-s1" id="AddNewBillAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3" style="padding-top: 0 !important;">
                            <div class="form-row form-group">
                                <label>Post Code:</label>
                                <div class="input-wrapper with-rg-btn">
                                    <input type="text" class="form-control" name="post_code" id="post_code">
                                    <button type="button" class="btn btn-primary" id="findAddress">Find
                                        Address</button>
                                </div>
                                <p class="adderr text-danger"></p>
                            </div>
                        <form class="billingAddrUpdateForm formInputModal" >
                            <div class="form-row form-group ">
                                <label>House Name / Number: &nbsp;<span class="optional">
                                    </span>
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" id="house_no" name="house_no" class="input-text form-control house_no" value={{old('house_no')}}>
                                </span>
                            </div>
                            <div class="form-row form-group ">
                                <label for="billing_title">Street:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="street" id="street" class="input-text form-control steet_no @error('street') is-invalid @enderror" value={{old('street')}}>
                                </span>
                                @error('street')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="locality">Locality:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="locality" id="locality" class="input-text form-control locality @error('locality') is-invalid @enderror" value={{old('locality')}}>
                                </span>
                                @error('locality')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="town">Town:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="town" id="town" class="input-text form-control town @error('town') is-invalid @enderror" value={{old('town')}}>
                                </span>
                                @error('town')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="county">County:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="county" id="county" class="input-text form-control county @error('county') is-invalid @enderror" value="{{ old('county')}}">
                                </span>
                                @error('country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row form-group">
                                <label for="billing_first_name">Post Code:&nbsp;
                                </label>
                                <span class="input-wrapper">
                                    <input type="text" name="post_code" id="zip" class="input-text form-control zip @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                                </span>
                                @error('post_code')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row update_totals_on_change form-group">
                                <label for="billing_country">Country&nbsp;</label>
                                <span class="input-wrapper">
                                    <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                        <option value="">Select a country / region…</option>
                                        <option value="236" selected>United Kingdom</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                @error('billing_country')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" class="address_type" name="address_type" value="billing_address">
                            <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="saveBillAddr">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> -->



    </section>
    <div class="modal custom-modal-s1" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable" role="document">

            <div class="modal-content border-0">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>

                    <button type="button" class="btn-close btn-address"  data-dismiss="modal" aria-label="Close">X</button>

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
        const guarantor_i = document.getElementById("guarantor_i");
        guarantor_i.addEventListener("mouseover", guarantorshowTooltip);
        guarantor_i.addEventListener("mouseout", guarantorhideTooltip);

        const member_i = document.getElementById("member_i");
        member_i.addEventListener("mouseover", membershowTooltip);
        member_i.addEventListener("mouseout", memberhideTooltip);

        const designated_i = document.getElementById("designated_i");
        designated_i.addEventListener("mouseover", designatedshowTooltip);
        designated_i.addEventListener("mouseout", designatedhideTooltip);

        function guarantorshowTooltip() {
            const tooltip = document.querySelector(".guarantor_i_tooltip");
            tooltip.style.display = "block";
        }
        function guarantorhideTooltip() {
            const tooltip = document.querySelector(".guarantor_i_tooltip");
            tooltip.style.display = "none";
        }

        function SharehideTooltip() {
            const tooltip = document.querySelector(".shareholder_i_tooltip");
            tooltip.style.display = "none";
        }

        function membershowTooltip() {
            const tooltip = document.querySelector(".member_i_tooltip");
            tooltip.style.display = "block";
        }
        function memberhideTooltip() {
            const tooltip = document.querySelector(".member_i_tooltip");
            tooltip.style.display = "none";
        }
        function designatedshowTooltip() {
            const tooltip = document.querySelector(".designated_i_tooltip");
            tooltip.style.display = "block";
        }
        function designatedhideTooltip() {
            const tooltip = document.querySelector(".designated_i_tooltip");
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
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        const s_own_i = document.getElementById("s_own_i");
        s_own_i.addEventListener("mouseover", S_OWNshowTooltip);
        s_own_i.addEventListener("mouseout", S_OWNhideTooltip);

        function S_OWNshowTooltip() {
            const tooltip = document.querySelector(".s_own_i_tooltip");
            tooltip.style.display = "block";
        }

        function S_OWNhideTooltip() {
            const tooltip = document.querySelector(".s_own_i_tooltip");
            tooltip.style.display = "none";
        }

        const s_vot_i = document.getElementById("s_vot_i");
        s_vot_i.addEventListener("mouseover", S_VOTshowTooltip);
        s_vot_i.addEventListener("mouseout", S_VOThideTooltip);

        function S_VOTshowTooltip() {
            const tooltip = document.querySelector(".s_vot_i_tooltip");
            tooltip.style.display = "block";
        }

        function S_VOThideTooltip() {
            const tooltip = document.querySelector(".s_vot_i_tooltip");
            tooltip.style.display = "none";
        }

        const s_appo_i = document.getElementById("s_appo_i");
        s_appo_i.addEventListener("mouseover", S_APOshowTooltip);
        s_appo_i.addEventListener("mouseout", S_APOhideTooltip);

        function S_APOshowTooltip() {
            const tooltip = document.querySelector(".s_appo_i_tooltip");
            tooltip.style.display = "block";
        }

        function S_APOhideTooltip() {
            const tooltip = document.querySelector(".s_appo_i_tooltip");
            tooltip.style.display = "none";
        }

        const s_other_i = document.getElementById("s_other_i");
        s_other_i.addEventListener("mouseover", S_OTHshowTooltip);
        s_other_i.addEventListener("mouseout", S_OTHhideTooltip);

        function S_OTHshowTooltip() {
            const tooltip = document.querySelector(".s_other_i_tooltip");
            tooltip.style.display = "block";
        }

        function S_OTHhideTooltip() {
            const tooltip = document.querySelector(".s_other_i_tooltip");
            tooltip.style.display = "none";
        }
        // ////////////////////////////////////////////////////
        const t_own_i = document.getElementById("t_own_i");
        t_own_i.addEventListener("mouseover", T_OWNshowTooltip);
        t_own_i.addEventListener("mouseout", T_OWNhideTooltip);

        function T_OWNshowTooltip() {
            const tooltip = document.querySelector(".t_own_i_tooltip");
            tooltip.style.display = "block";
        }

        function T_OWNhideTooltip() {
            const tooltip = document.querySelector(".t_own_i_tooltip");
            tooltip.style.display = "none";
        }

        const t_vot_i = document.getElementById("t_vot_i");
        t_vot_i.addEventListener("mouseover", T_VOTshowTooltip);
        t_vot_i.addEventListener("mouseout", T_VOThideTooltip);

        function T_VOTshowTooltip() {
            const tooltip = document.querySelector(".t_vot_i_tooltip");
            tooltip.style.display = "block";
        }

        function T_VOThideTooltip() {
            const tooltip = document.querySelector(".t_vot_i_tooltip");
            tooltip.style.display = "none";
        }

        const t_appo_i = document.getElementById("t_appo_i");
        t_appo_i.addEventListener("mouseover", T_APOshowTooltip);
        t_appo_i.addEventListener("mouseout", T_APOhideTooltip);

        function T_APOshowTooltip() {
            const tooltip = document.querySelector(".t_appo_i_tooltip");
            tooltip.style.display = "block";
        }

        function T_APOhideTooltip() {
            const tooltip = document.querySelector(".t_appo_i_tooltip");
            tooltip.style.display = "none";
        }

        const t_other_i = document.getElementById("t_other_i");
        t_other_i.addEventListener("mouseover", T_OTHshowTooltip);
        t_other_i.addEventListener("mouseout", T_OTHhideTooltip);

        function T_OTHshowTooltip() {
            const tooltip = document.querySelector(".t_other_i_tooltip");
            tooltip.style.display = "block";
        }

        function T_OTHhideTooltip() {
            const tooltip = document.querySelector(".t_other_i_tooltip");
            tooltip.style.display = "none";
        }

        // ////////////////////////////////////////////////////
        const class_i = document.getElementById("class_i");
        class_i.addEventListener("mouseover", class_showTooltip);
        class_i.addEventListener("mouseout", class_hideTooltip);

        function class_showTooltip() {
            const tooltip = document.querySelector(".class_i_tooltip");
            tooltip.style.display = "block";
        }

        function class_hideTooltip() {
            const tooltip = document.querySelector(".class_i_tooltip");
            tooltip.style.display = "none";
        }

        const sh_appo_i = document.getElementById("sh_appo_i");
        sh_appo_i.addEventListener("mouseover", sh_appo_showTooltip);
        sh_appo_i.addEventListener("mouseout", sh_appo_hideTooltip);

        function sh_appo_showTooltip() {
            const tooltip = document.querySelector(".sh_appo_i_tooltip");
            tooltip.style.display = "block";
        }

        function sh_appo_hideTooltip() {
            const tooltip = document.querySelector(".sh_appo_i_tooltip");
            tooltip.style.display = "none";
        }
</script>
<script>
     function scrollToTopDynamic(val) {
            window.scrollTo(0, val);
        }
    // Get today's date in the format YYYY-MM-DD
    $(document).ready(function() {
        if($('#director').prop('checked'))
        {
            consentSection()
        }
        if($('#shareholder').prop('checked'))
        {
            shareholderTab()
        }
        if($('#guarantor_checkbox').prop('checked'))
        {
            guaranteeTab()
        }
        if($('#psc').prop('checked'))
        {
            pscTab()
        }
        if($('#secretary').prop('checked'))
        {
            consentSection()
        }
        if($("#designated_checkbox").is(':checked'))
        {
            designatedTab();
        }

    });

    const consentSection = function() {
        if ($('#director').is(":checked") || $('#secretary').is(":checked")) {
            $('.brCls').removeClass('d-none');
            $('.occLinkCls').removeClass('d-none');
        } else {
            $('.brCls').addClass('d-none');
            $('.occLinkCls').addClass('d-none');
        }
    }
    function shareholderTab() {
        $('.shareholderLinksCls').toggleClass('d-none');
        $('#authenticationSection').toggleClass('d-none');

        $('#person_aqone_ans_id').toggleClass('blankCheck');
        $('#person_aqtwo_ans_id').toggleClass('blankCheck');
        $('#person_aqthree_ans_id').toggleClass('blankCheck');
    }
    function designatedTab()
    {
            $('#authenticationSection').toggleClass('d-none');

            $('#person_aqone_ans_id').toggleClass('blankCheck');
            $('#person_aqtwo_ans_id').toggleClass('blankCheck');
            $('#person_aqthree_ans_id').toggleClass('blankCheck');
    }
    function guaranteeTab() {
        // $('.shareholderLinksCls').toggleClass('d-none');
        if($("#guarantor_checkbox").is(":checked")){
            $("#amount_guarantee").val('1.0')
            $("#gurantee-amount-div").removeClass('d-none');
        }else{
            $("#gurantee-amount-div").addClass('d-none');
            $("#amount_guarantee").val('0')

        }
        $('#authenticationSection').toggleClass('d-none');

        $('#person_aqone_ans_id').toggleClass('blankCheck');
        $('#person_aqtwo_ans_id').toggleClass('blankCheck');
        $('#person_aqthree_ans_id').toggleClass('blankCheck');
    }
    function pscTab() {
        $('.nocLinkCls').toggleClass('d-none');
        $('.nature-of-control').toggleClass('d-none');
        if(!($('#psc').prop('checked')))
        {
            $('#F_ownership').val('');
            $('#F_voting').val('');
            $('#F_appoint').val('No');
            $('#F_other_sig_select_id').val('No');
            $('#f_radio_check_id').val('');

            $('#s_ownership').val('');
            $('#s_voting').val('');
            $('#s_appoint').val('No');
            $('#s_other_sig_select_id').val('No');
            $('#s_radio_check_id').val('');

            $('#t_ownership').val('');
            $('#t_voting').val('');
            $('#t_appoint').val('No');
            $('#t_other_sig_select_id').val('No');
            $("#no").click();
            $("#no2").click();
        }
        // const noc_os = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#F_ownership")
        //         .val() : '';
        //     const noc_vr = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#F_voting").val() :
        //         '';
        //     const noc_appoint = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#F_appoint")
        //         .val() : '';
        //     const noc_others = $(".nature-of-control").closest('li').hasClass('d-none') === false && $("#F_other_sig")
        //         .hasClass('d-none') === false ? $("#F_other_sig_select_id").val() : 'No';

        //     const fci = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#f_radio_check_id")
        //         .val() : '';
        //     const fci_os = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#s_ownership")
        //         .val() : '';
        //     const fci_vr = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#s_voting").val() :
        //         '';
        //     const fci_appoint = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#s_appoint")
        //         .val() : '';
        //     const fci_others = $(".nature-of-control").closest('li').hasClass('d-none') === false && $("#s_other_sig")
        //         .hasClass('d-none') === false ? $("#s_other_sig_select_id").val() : 'No';

        //     const tci = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#s_radio_check_id")
        //         .val() : '';
        //     const tci_os = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#t_ownership")
        //         .val() : '';
        //     const tci_vr = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#t_voting").val() :
        //         '';
        //     const tci_appoint = $(".nature-of-control").closest('li').hasClass('d-none') === false ? $("#t_appoint")
        //         .val() : '';
        //     const tci_others = $(".nature-of-control").closest('li').hasClass('d-none') === false && $("#t_other_sig")
        //         .hasClass('d-none') === false ? $("#t_other_sig_select_id").val() : 'No';


    }
    function f_radio_check() {
        const radio_ele = document.querySelector('input[name="com-qu"]:checked');

        if (radio_ele.getAttribute("id") === 'yes') {
            $("#firmDD").removeClass('d-none')
            $("#f_radio_check_id").val('yes')
        } else {
            $("#s_ownership").first().val('')
            $("#s_voting").first().val('')
            $("#s_appoint").first().val('No')
            $("#s_other_sig").removeClass('d-none')


            $("#firmDD").addClass('d-none')
            $("#f_radio_check_id").val('no')
        }
    }

    function s_radio_check() {
        const radio_ele = document.querySelector('input[name="com-qu2"]:checked');

        if (radio_ele.getAttribute("id") === 'yes2') {
            $("#trustDD").removeClass('d-none')
            $("#s_radio_check_id").val('yes')
        } else {

            $("#t_ownership").first().val('')
            $("#t_voting").first().val('')
            $("#t_appoint").first().val('No')
            $("#t_other_sig").removeClass('d-none')

            $("#trustDD").addClass('d-none')
            $("#s_radio_check_id").val('no')
        }
    }

    function show_hide_F_other_sig() {
        const F_ownership = $('#F_ownership').find(":selected").val();
        const F_Voting = $('#F_voting').find(":selected").val();
        const F_appoint = $('#F_appoint').find(":selected").val();

        if (F_ownership != '' || F_ownership != '' || F_ownership != '' || F_Voting != '' || F_Voting !=
            '' || F_Voting != '' || F_appoint === 'Yes') {
            $("#F_other_sig").addClass('d-none')
            $("#F_other_sig_select_id option[value='No']").attr('selected', true);

        } else {
            $("#F_other_sig").removeClass('d-none')
        }
    }

    function show_hide_s_other_sig() {
        const s_ownership = $('#s_ownership').find(":selected").val();
        const s_voting = $('#s_voting').find(":selected").val();
        const s_appoint = $('#s_appoint').find(":selected").val();

        if (s_ownership != '' || s_ownership != '' || s_ownership != '' || s_voting != '' || s_voting !=
            '' || s_voting != '' || s_appoint === 'Yes') {
            $("#s_other_sig").addClass('d-none')
            $("#s_other_sig_select_id option[value='No']").attr('selected', true);

        } else {
            $("#s_other_sig").removeClass('d-none')
        }
    }

    function show_hide_t_other_sig() {
        const t_ownership = $('#t_ownership').find(":selected").val();
        const t_voting = $('#t_voting').find(":selected").val();
        const t_appoint = $('#t_appoint').find(":selected").val();
        console.log("s_other_sig")
        if (t_ownership != '' || t_ownership != '' || t_ownership != '' || t_voting != '' || t_voting !=
            '' || t_voting != '' || t_appoint === 'Yes') {
            $("#t_other_sig").addClass('d-none')
            $("#t_other_sig_select_id option[value='No']").attr('selected', true);
        } else {
            $("#t_other_sig").removeClass('d-none')
        }
    }
    function getTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0');
        const day = today.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set today's date as the default value for the date inputs using jQuery
    $(document).ready(function () {
        $("#officer_dob").keydown(function (event) { event.preventDefault(); });
        $("#notificationDate").keydown(function (event) { event.preventDefault(); });
        $("#registerEntryDate").keydown(function (event) { event.preventDefault(); });
        $('#notificationDate').val(getTodayDate());
        $('#registerEntryDate').val(getTodayDate());

        $('#editResidentialAddress').click(function(){
            $('#primaryAddressConfirmModal').modal('show');
        });

        $("#openResidentModalButton").click(function(){
            console.log('hi');
            $('#chooseBIllingAddressResidentialModal').modal('show');
        });

        $(".addNewAddress").click(function(){
            $('.address_type').val('primary_address');
            $('#addNewAddressModal').modal('show');
        });
        // $(".addBillAddress").click(function(){
        //     console.log('demoo');
        //     $('#addNewBillAddressModal').modal('show');
        // });
        $("#openBIllingModalButton").click(function(){
            $('.price').val('');
            $('.address-house-price').val('');
            $(".104_forward_add_id").val(null);
            $(".104_add_id").val('');
            $('#BIllingAddressModal').modal('show');

        });
        // $("#purchaseAddressModal").click(function(){
        //     var price = @json($purchase_address->price);
        //     $('.address-house-price').val(price);
        //     $('#BIllingAddressModal').modal('show');
        // });
        // $("#freeAddressModal").click(function(){
        //     $('.price').val('');

        //     $('#BIllingAddressModal').modal('show');
        //     $('.address-house-price').val('');

        // });

        $("#purchaseAddressModal").click(function(){
            var price = @json($purchase_address->price);
            $('.address-house-price').val(price);

            // Set 104_forward_add_id to null and open the modal
            $(".104_forward_add_id").val(null);
            $(".104_add_id").val('');
            $('#BIllingAddressModal').modal('show');
        });

        // Handler for opening BIllingAddressModal from #freeAddressModal
        $("#freeAddressModal").click(function(){
            $('.price').val('');

            // Set 104_add_id to null and open the modal
            $(".104_add_id").val(null);
            $(".104_forward_add_id").val('');
            $('#BIllingAddressModal').modal('show');
        });


        $("#purchaseAddressModal").click(function(){
            $("#purchaseAddressModal").addClass("active-modal");
            $("#freeAddressModal").removeClass("active-modal");
            $("#openBIllingModalButton").removeClass("active-modal");
            $(".forward-address").removeClass("d-none");

        });

        $("#freeAddressModal").click(function(){
            $("#freeAddressModal").addClass("active-modal");
            $(".forward-address").addClass("d-none");
            $("#purchaseAddressModal").removeClass("active-modal");
            $("#openBIllingModalButton").removeClass("active-modal");

        });

        $("#openBIllingModalButton").click(function(){
            $("#openBIllingModalButton").addClass("active-modal");
            $("#freeAddressModal").removeClass("active-modal");
            $("#purchaseAddressModal").removeClass("active-modal");
            $(".forward-address").removeClass("d-none");

        });
    });

    $('#findAddress').click(function(){
        var post_code = $("#post_code").val();
        if(post_code==""){
            $('.adderr').html('Please enter zipcode');
            return false ;
        }else{
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
                console.log('result',result);
                if(result!=''){
                    $("#exampleModalCenterAddress").show();
                    $("#post_address_blk").html(result);
                    $('#findAddress').html('Find Address');

                }else{
                    alert('No Record Found! Choose another.');
                    $('#findAddress').html('Find Address');

                }

            },
            error: function(){
                alert('No Record Found! Choose another.');
                    $('#findAddress').html('Find Address');
            }
        });
    });

    $('.select-address').click(function() {
        var selectedAddressDetails = {
            id: $(this).siblings('.address-house-id').val(),
            houseNumber: $(this).siblings('.address-house-number').val(),
            street: $(this).siblings('.address-street').val(),
            locality: $(this).siblings('.address-locality').val(),
            town: $(this).siblings('.address-town').val(),
            county: $(this).siblings('.address-county').val(),
            postCode: $(this).siblings('.address-post-code').val(),
            countryName: $(this).siblings('.address-country-name').val()
        };

        var addressText = `${selectedAddressDetails.houseNumber ? selectedAddressDetails.houseNumber + ',' : ''}
                        ${selectedAddressDetails.street ? selectedAddressDetails.street + ',' : ''}
                        ${selectedAddressDetails.locality ? selectedAddressDetails.locality + ',' : ''}
                        ${selectedAddressDetails.town ? selectedAddressDetails.town + ',' : ''}
                        ${selectedAddressDetails.county}
                        ${selectedAddressDetails.countryName ? ',' + selectedAddressDetails.countryName : ''}
                        ${selectedAddressDetails.postCode}`;

        $(".103_add_id").val(selectedAddressDetails.id);
        $(".price").val('');

        $('#selectedAddressDisplay').text(addressText);
    });

    $('.select-forward-address').click(function() {
        var selectedAddressDetails = {
            id: $(this).siblings('.address-house-id').val(),
            houseNumber: $(this).siblings('.address-house-number').val(),
            street: $(this).siblings('.address-street').val(),
            locality: $(this).siblings('.address-locality').val(),
            town: $(this).siblings('.address-town').val(),
            county: $(this).siblings('.address-county').val(),
            postCode: $(this).siblings('.address-post-code').val(),
            countryName: $(this).siblings('.address-country-name').val(),
            price: $(this).siblings('.price').val()
        };

        var addressText = `${selectedAddressDetails.houseNumber ? selectedAddressDetails.houseNumber + ',' : ''}
                        ${selectedAddressDetails.street ? selectedAddressDetails.street + ',' : ''}
                        ${selectedAddressDetails.locality ? selectedAddressDetails.locality + ',' : ''}
                        ${selectedAddressDetails.town ? selectedAddressDetails.town + ',' : ''}
                        ${selectedAddressDetails.county}
                        ${selectedAddressDetails.countryName ? ',' + selectedAddressDetails.countryName : ''}
                        ${selectedAddressDetails.postCode}`;
        console.log('price', selectedAddressDetails.price);
        // $(".104_add_id").val(selectedAddressDetails.id);
        $(".price").val(selectedAddressDetails.price);

        if ($("#purchaseAddressModal").hasClass("active-modal")) {
            $(".104_forward_add_id").val(selectedAddressDetails.id);
            $(".104_add_id").val(null);
        } else if ($("#freeAddressModal").hasClass("active-modal")) {
            $(".104_add_id").val(selectedAddressDetails.id);
            $(".104_forward_add_id").val(null);
            $('#selectFreeAddress').text(addressText);
        } else if ($("#openBIllingModalButton").hasClass("active-modal")) {
            $(".104_forward_add_id").val(selectedAddressDetails.id);
            $(".104_add_id").val(null);
        }

        $('#selectedForwardAddressDisplay').text(addressText);
    });


    $("#saveAddr").click(function() {
        $(".loader").show();
        // Validation
        $(".formInputModal").each(function() {
            var number   = $(this).find(".house_no").val();
            var steet    = $(this).find(".steet_no").val();
            var locality = $(this).find(".locality").val();
            var town     = $(this).find(".town").val();
            var county   = $(this).find(".county").val();
            if(county==undefined){
                county ="";
            }

            var postcode = $(this).find(".zip").val();
            var contry   = $(this).find(".contry").val();
            var address_type = $(this).find(".address_type").val();
            var user_id   = $(this).find(".user_id").val();
            //alert(number+steet+locality+town+postcode+contry+address_type+user_id);
            if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
                //alert(number+"---"+address_type);
                $.ajax({
                    url: "{!! route('new-address-save-company') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        number: number,
                        steet:steet,
                        locality:locality,
                        town:town,
                        county:county,
                        postcode:postcode,
                        contry:contry,
                        address_type:address_type,
                        user_id:user_id
                    },
                    success: function(result) {
                        // console.log(result);
                        // Access the saved address data
                        var savedAddress = result.address;

                        var addressText = `${savedAddress.house_number ? savedAddress.house_number + ',' : ''}
                                        ${savedAddress.street ? savedAddress.street + ',' : ''}
                                        ${savedAddress.locality ? savedAddress.locality + ',' : ''}
                                        ${savedAddress.town ? savedAddress.town + ',' : ''}
                                        ${savedAddress.county}
                                        ${savedAddress.billing_country ? ',' + savedAddress.billing_country : ''}
                                        ${savedAddress.post_code}`;


                        $('#selectedAddressDisplay').text(addressText);
                        // console.log(addressText);
                        // You can also update other hidden input fields if needed
                        $(".103_add_id").val(savedAddress.id);
                        $(".103_add_house_number").val(savedAddress.house_number);
                        $(".103_add_street").val(savedAddress.street);
                        $(".103_add_locality").val(savedAddress.locality);
                        $(".103_add_town").val(savedAddress.town);
                        $(".103_user_county").val(savedAddress.county);
                        $(".103_address_post_code").val(savedAddress.post_code);
                        $(".103_address_billing_country").val(savedAddress.billing_country);
                        $(".price").val('');
                        $("#addNewAddressModal").modal('hide');
                    // setTimeout(function () {
                    //     $(".loader").hide();
                    //     location.reload(true);
                    // }, 2500);
                    }
                });
            }

        });
    });

    // $("#saveBillAddr").click(function() {
    //     $(".loader").show();
    //     // Validation
    //     $(".formInputModal").each(function() {
    //         var number   = $(this).find(".house_no").val();
    //         var steet    = $(this).find(".steet_no").val();
    //         var locality = $(this).find(".locality").val();
    //         var town     = $(this).find(".town").val();
    //         var county   = $(this).find(".county").val();
    //         if(county==undefined){
    //             county ="";
    //         }

    //         var postcode = $(this).find(".zip").val();
    //         var contry   = $(this).find(".contry").val();
    //         var address_type = $(this).find(".address_type").val();
    //         var user_id   = $(this).find(".user_id").val();
    //         //alert(number+steet+locality+town+postcode+contry+address_type+user_id);
    //         if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
    //             //alert(number+"---"+address_type);
    //             $.ajax({
    //                 url: "{!! route('new-address-save-company') !!}",
    //                 type: 'POST',
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     number: number,
    //                     steet:steet,
    //                     locality:locality,
    //                     town:town,
    //                     county:county,
    //                     postcode:postcode,
    //                     contry:contry,
    //                     address_type:address_type,
    //                     user_id:user_id
    //                 },
    //                 success: function(result) {
    //                     console.log('demo-result',result);
    //                     // Access the saved address data
    //                     var savedAddress = result.address;
    //                     // Update the HTML elements in the new-address-section with the received data
    //                     var addressText = `${savedAddress.house_number ? savedAddress.house_number + ',' : ''}
    //                                     ${savedAddress.street ? savedAddress.street + ',' : ''}
    //                                     ${savedAddress.locality ? savedAddress.locality + ',' : ''}
    //                                     ${savedAddress.town ? savedAddress.town + ',' : ''}
    //                                     ${savedAddress.county}
    //                                     ${savedAddress.billing_country ? ',' + savedAddress.billing_country : ''}
    //                                     ${savedAddress.post_code}`;

    //                     $('#selectedForwardAddressDisplay').text(addressText);

    //                     // You can also update other hidden input fields if needed
    //                     $(".104_add_id").val(savedAddress.id);
    //                     $(".104_add_house_number").val(savedAddress.house_number);
    //                     $(".104_add_street").val(savedAddress.street);
    //                     $(".104_add_locality").val(savedAddress.locality);
    //                     $(".104_add_town").val(savedAddress.town);
    //                     $(".104_user_county").val(savedAddress.county);
    //                     $(".104_address_post_code").val(savedAddress.post_code);
    //                     $(".104_address_billing_country").val(savedAddress.billing_country);
    //                     $(".price").val('');
    //                     $("#AddNewBillAddressModal").modal('hide');
    //                 // setTimeout(function () {
    //                 //     $(".loader").hide();
    //                 //     location.reload(true);
    //                 // }, 2500);
    //                 }
    //             });
    //         }

    //     });
    // });

    function selectPostalAddrApp(val){
        var value = val.split(',');
        $("#house_no").val(value[0]);
        $("#street").val(value[1]);
        $("#locality").val(value[2]);
        $("#town").val(value[3]);
        $("#exampleModalCenterAddress").hide();
    }

    function editPrimaryAddressfn(address_id){
            $(".loader").show();
            // Validation
            $("#primeinputs").each(function() {
                var number   = $(this).find(".house_no").val();
                var steet    = $(this).find(".steet_no").val();
                var locality = $(this).find(".locality").val();
                var town     = $(this).find(".town").val();
                var county   = $(this).find(".county").val();
                if(county==undefined){
                    county = "";
                }
                var postcode = $(this).find(".zip").val();
                var contry   = $(this).find(".contry").val();
                var address_type = $(this).find(".address_type").val();
                var user_id   = $(this).find(".user_id").val();


                if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
                    //alert(number+"---"+address_type);
                    $.ajax({
                        url: "{!! route('primary-address-save') !!}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number,
                            steet:steet,
                            locality:locality,
                            town:town,
                            county:county,
                            postcode:postcode,
                            contry:contry,
                            address_type:address_type,
                            user_id:user_id,
                            address_id:address_id
                        },
                        success: function(result) {
                        var savedAddress = result.address;
                        // Update the HTML elements in the new-address-section with the received data
                        var addressText = `${savedAddress.house_number ? savedAddress.house_number + ',' : ''}
                                        ${savedAddress.street ? savedAddress.street + ',' : ''}
                                        ${savedAddress.locality ? savedAddress.locality + ',' : ''}
                                        ${savedAddress.town ? savedAddress.town + ',' : ''}
                                        ${savedAddress.county}
                                        ${savedAddress.billing_country ? ',' + savedAddress.billing_country : ''}
                                        ${savedAddress.post_code}`;

                        $(".103_add_id").val(savedAddress.id);
                        $(".103_add_house_number").val(savedAddress.house_number);
                        $(".103_add_street").val(savedAddress.street);
                        $(".103_add_locality").val(savedAddress.locality);
                        $(".103_add_town").val(savedAddress.town);
                        $(".103_user_county").val(savedAddress.county);
                        $(".103_address_post_code").val(savedAddress.post_code);
                        $(".103_address_billing_country").val(savedAddress.billing_country);

                        $('#selectedAddressDisplay').text(addressText);
                        $("#primaryAddressConfirmModal").modal('hide');
                        }
                    });
                }

            });
    };

</script>
<script>
    $(document).ready(function() {

        // position value change
        $('.checkBoxPos').on('click', function() {
            // Update the hidden input value to 1
            $('#changesMade').val(1);
        });

        // personal value change

        $('.personal-details-fieldset input, .personal-details-fieldset select').on('input change', function() {
            // Update the hidden input value to 1
            $('#personalDetailsChanges').val(1);
        });

        // Nature of control value change

        $('.nature-of-control input, .nature-of-control select', ).on('input change', function() {
            // Update the hidden input value to 1
            $('#natureOfControlChanges').val(1);
        });

        // residential address value change

        var initialSelectedAddress = $('#selectedAddressDisplay').text().trim();

        $('#selectedAddressDisplay').on('DOMSubtreeModified', function() {
            var currentSelectedAddress = $(this).text().trim();
            if (currentSelectedAddress !== initialSelectedAddress) {
                $('#residentAddressChanges').val(1);
                initialSelectedAddress = currentSelectedAddress;
            }
        });


        // forward address value change

        var initialSelectedAddress = $('#selectedForwardAddressDisplay').text().trim();

        $('#selectedForwardAddressDisplay').on('DOMSubtreeModified', function() {
            var currentSelectedAddress = $(this).text().trim();
            if (currentSelectedAddress !== initialSelectedAddress) {
                $('#forwardAddressChanges').val(1);
                initialSelectedAddress = currentSelectedAddress;
            }
        });

        // notification value change

        $('.notification-date input', ).on('input change', function() {
            // Update the hidden input value to 1
            $('#notificationDateChanges').val(1);
        });


    });

    $(document).ready(function() {
        $('.theme-btn-primary.yes-button').on('click', function() {
            $('input[name="same_reg_add"]').val(1);
            $('fieldset.forward-address').addClass('d-none');
            $('.chose-service-address').addClass('d-none');

        });

        $('.theme-btn-primary.no-button').on('click', function() {
            $('input[name="same_reg_add"]').val(0);
            $('fieldset.forward-address').removeClass('d-none');
            $('.chose-service-address').removeClass('d-none');
        });

        $("#edit_company_form").submit(function(e) {
            if(($('#psc').prop('checked')))
            {
                if ($("#F_ownership").val() === '' && $("#F_voting").val() === '' && $("#F_appoint").val() === 'No'  &&
                    $("#s_ownership").val() === '' && $("#s_voting").val() === '' && $("#s_appoint").val() === 'No'  &&
                    $("#t_ownership").val() === '' && $("#t_voting").val() === '' && $("#t_appoint").val() === 'No' ) {
                    // $("#NOC_validation_error").removeClass('d-none')
                    $("#psc_error_message").removeClass('d-none')
                    window.scrollTo(0, 1600);
                    e.preventDefault();
                }else{
                    $("#psc_error_message").addClass('d-none')
                }
            }
        })
    });
</script>

@endsection
