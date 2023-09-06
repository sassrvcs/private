@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

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
                    <li><a href="{{ url('') }}">Home</a></li>
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
                    @include('layouts.navbar')
                    <div class="col-md-12">
                        <div class="particulars-form-wrap">
                            <div class="particulars-top-step">
                                <div class="top-step-items active">
                                    <strong>1.Company Formation</strong>
                                    <span>Details about your company</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>2.Business Essentials</strong>
                                    <span>Products & Services</span>
                                </div>
                                <div class="top-step-items active">
                                    <strong>3.Summary</strong>
                                    <span>Details about your order</span>
                                </div>
                                <div class="top-step-items">
                                    <strong>4.Delivery & Partner Services</strong>
                                    <span>Delivery & Partner Details</span>
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
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('registered-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}"
                                        style="color: #ffffff;"> Registered Address</a>
                                    </p>
                                    {{-- <p>Registered Address</p> --}}
                                </div>
                                <div class="bottom-step-items" onclick="gotToBusinessAddressPage()">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('choose-address-business', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'business-address']) }}"
                                        style="color: #ffffff;"> Business Address</a>
                                    </p>
                                    {{-- <p>Business Address</p> --}}
                                </div>
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>Appointment</p>
                                </div>
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'document'])  }}"
                                        style="color: #ffffff;"> Document</a>
                                    </p>
                                    {{-- <p>Document</p> --}}
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
                                            <button type="submit" class="btn" onclick="showPersonSection()"><img
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

                                <div class="own-address mt-3 d-none" style="color:red;" id="positionValidation">


                                </div>

                                @if (!empty($appointmentsList))
                                    <div class="shareholdings-table-wrap" id="appointment_officer_listing">
                                        <h4>Current Appointments</h4>
                                        <p>Below is a list of officers currently assigned to your company</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Director</th>
                                                        <th>Shareholder</th>
                                                        <th>Secretary</th>
                                                        <th>PSC</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($appointmentsList as $val)
                                                        <tr>
                                                            <td>@php
                                                                $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                                                $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                                echo $fullName;
                                                            @endphp</td>
                                                            @php
                                                                $positionString = $val['position'];
                                                                $positionArray = explode(', ', $val['position']);
                                                            @endphp
                                                            <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                    class="{{ in_array('Director', $positionArray) ? '' : 'd-none' }}"
                                                                    alt=""><img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                    class="{{ in_array('Director', $positionArray) ? 'd-none' : '' }}"
                                                                    alt=""></td>
                                                            <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                    class="{{ in_array('Shareholder', $positionArray) ? '' : 'd-none' }}"
                                                                    alt="">
                                                                    <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                    class="{{ in_array('Shareholder', $positionArray) ? 'd-none' : '' }}"
                                                                    alt=""></td>
                                                            <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                    class="{{ in_array('Secretary', $positionArray) ? '' : 'd-none' }}"
                                                                    alt="">
                                                                    <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                    class="{{ in_array('Secretary', $positionArray) ? 'd-none' : '' }}"
                                                                    alt=""></td>
                                                            <td><img src="{{ asset('frontend/assets/images/table-checkmark-icon.svg') }}"
                                                                    class="{{ in_array('PSC', $positionArray) ? '' : 'd-none' }}"
                                                                    alt="">
                                                                    <img src="{{ asset('frontend/assets/images/cross.svg') }}"
                                                                    class="{{ in_array('PSC', $positionArray) ? 'd-none' : '' }}"
                                                                    alt=""></td>
                                                            <td>
                                                                <div class="tb-btn-wrap d-flex justify-content-end">
                                                                    <button class="remove-btn"
                                                                        onclick="removeOfficerList('{{ isset($val['id']) ? $val['id'] : '' }}')">Remove</button>
                                                                    <button class="edit-btn" >Edit</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($appointmentsList))
                                    @php
                                        $idArry = [];
                                        $listed_idArry = [];
                                        $pscCheck = 0;
                                        $directorCheck = 0;
                                    @endphp
                                    @foreach ($appointmentsList as $val)
                                        @php
                                            array_push($listed_idArry, $val['id']);

                                            $listed_idStrng = implode(',', $listed_idArry);
                                            $positionString = $val['position'];
                                            $positionArray = explode(', ', $val['position']);

                                            if (in_array('PSC', $positionArray)) {
                                                $pscCheck++;
                                            }
                                            if (in_array('Director', $positionArray)) {
                                                $directorCheck++;
                                            }

                                        @endphp
                                        @if (in_array('Shareholder', $positionArray))
                                            @php
                                                array_push($idArry, $val['id']);
                                            @endphp
                                            <div class="shareholdings-table-wrap" id="share_holding_table_id">
                                                <h4>Shareholders</h4>
                                                <p>Below is a list of all shareholders and their holdings.</p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Shareholding</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    @php
                                                                        $officerDetails = officer_details_for_appointments_list($val['person_officer_id']);
                                                                        $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                                        echo $fullName;
                                                                    @endphp
                                                                </td>
                                                                <td>{{ isset($val['sh_quantity']) ? $val['sh_quantity'] : '' }}
                                                                    x ORDINARY @
                                                                    {{ isset($val['sh_pps']) ? $val['sh_pps'] : '' }}
                                                                    {{ isset($val['sh_currency']) ? $val['sh_currency'] : '' }}
                                                                    per share</td>
                                                                <td>
                                                                    <div class="tb-btn-wrap d-flex justify-content-end">
                                                                        <button class="edit-btn">Edit</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="share-holder-block mt-4">
                                                <div class="ttl">
                                                    <h5>Share Classes</h5>
                                                    <p>Below is confirmation of all share classes of the company.</p>
                                                </div>
                                                <div class="share-holder-block-wrap">
                                                    <div class="share-holder-form">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Class <span><img
                                                                                src="assets/images/in-icon.png"
                                                                                alt=""></span></label>

                                                                    <h5>ORDINARY</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Price</label>
                                                                    <input type="text" oninput='number_field(this)'
                                                                        onblur='conertToDecimal($(this))'
                                                                        value="{{ isset($val['sh_pps']) ? $val['sh_pps'] : '' }}"
                                                                        class="form-control shareHolderValidation edit_share_price_{{ $val['id'] }}">
                                                                    <div class="error d-none" style="color:red;">Price Can
                                                                        not be zero or empty.</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Currency</label>
                                                                    <select
                                                                        class="form-control edit_share_currency_{{ $val['id'] }}">
                                                                        <option value="AED"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AED' ? 'selected' : '' }}>
                                                                            AED</option>
                                                                        <option value="AFA"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AFA' ? 'selected' : '' }}>
                                                                            AFA</option>
                                                                        <option value="ALL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ALL' ? 'selected' : '' }}>
                                                                            ALL</option>
                                                                        <option value="AMD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AMD' ? 'selected' : '' }}>
                                                                            AMD</option>
                                                                        <option value="ANG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ANG' ? 'selected' : '' }}>ANG
                                                                        </option>
                                                                        <option value="ARS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ARS' ? 'selected' : '' }}>
                                                                            ARS
                                                                        </option>
                                                                        <option value="AOA"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AOA' ? 'selected' : '' }}>
                                                                            AOA</option>
                                                                        <option value="AUD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AUD' ? 'selected' : '' }}>
                                                                            AUD</option>
                                                                        <option value="AWG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AWG' ? 'selected' : '' }}>
                                                                            AWG</option>
                                                                        <option value="AZM"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'AZM' ? 'selected' : '' }}>
                                                                            AZM</option>
                                                                        <option value="BAM"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BAM' ? 'selected' : '' }}>
                                                                            BAM</option>
                                                                        <option value="BBD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BBD' ? 'selected' : '' }}>
                                                                            BBD</option>
                                                                        <option value="BDT"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BDT' ? 'selected' : '' }}>
                                                                            BDT</option>
                                                                        <option value="BGN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BGN' ? 'selected' : '' }}>
                                                                            BGN</option>
                                                                        <option value="BHD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BHD' ? 'selected' : '' }}>
                                                                            BHD</option>
                                                                        <option value="BIF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BIF' ? 'selected' : '' }}>
                                                                            BIF</option>
                                                                        <option value="BMD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BMD' ? 'selected' : '' }}>
                                                                            BMD</option>
                                                                        <option value="BND"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BND' ? 'selected' : '' }}>
                                                                            BND</option>
                                                                        <option value="BOB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BOB' ? 'selected' : '' }}>
                                                                            BOB</option>
                                                                        <option value="BRL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BRL' ? 'selected' : '' }}>
                                                                            BRL</option>
                                                                        <option value="BSD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BSD' ? 'selected' : '' }}>
                                                                            BSD</option>
                                                                        <option value="BTN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BTN' ? 'selected' : '' }}>
                                                                            BTN</option>
                                                                        <option value="BWP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BWP' ? 'selected' : '' }}>
                                                                            BWP</option>
                                                                        <option value="BYR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BYR' ? 'selected' : '' }}>
                                                                            BYR</option>
                                                                        <option value="BZD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'BZD' ? 'selected' : '' }}>
                                                                            BZD</option>
                                                                        <option value="CAD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CAD' ? 'selected' : '' }}>
                                                                            CAD</option>
                                                                        <option value="CDF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CDF' ? 'selected' : '' }}>
                                                                            CDF</option>
                                                                        <option value="CHF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CHF' ? 'selected' : '' }}>
                                                                            CHF</option>
                                                                        <option value="CLP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CLP' ? 'selected' : '' }}>
                                                                            CLP</option>
                                                                        <option value="CNY"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CNY' ? 'selected' : '' }}>
                                                                            CNY</option>
                                                                        <option value="COP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'COP' ? 'selected' : '' }}>
                                                                            COP</option>
                                                                        <option value="CRC"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CRC' ? 'selected' : '' }}>
                                                                            CRC</option>
                                                                        <option value="CUP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CUP' ? 'selected' : '' }}>
                                                                            CUP</option>
                                                                        <option value="CVE"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CVE' ? 'selected' : '' }}>
                                                                            CVE</option>
                                                                        <option value="CYP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CYP' ? 'selected' : '' }}>
                                                                            CYP</option>
                                                                        <option value="CZK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'CZK' ? 'selected' : '' }}>
                                                                            CZK</option>
                                                                        <option value="DJF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'DJF' ? 'selected' : '' }}>
                                                                            DJF</option>
                                                                        <option value="DKK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'DKK' ? 'selected' : '' }}>
                                                                            DKK</option>
                                                                        <option value="DOP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'DOP' ? 'selected' : '' }}>
                                                                            DOP</option>
                                                                        <option value="DZD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'DZD' ? 'selected' : '' }}>
                                                                            DZD</option>
                                                                        <option value="EEK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'EEK' ? 'selected' : '' }}>
                                                                            EEK</option>
                                                                        <option value="EGP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'EGP' ? 'selected' : '' }}>
                                                                            EGP</option>
                                                                        <option value="ERN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ERN' ? 'selected' : '' }}>
                                                                            ERN</option>
                                                                        <option value="ETB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ETB' ? 'selected' : '' }}>
                                                                            ETB</option>
                                                                        <option value="EUR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'EUR' ? 'selected' : '' }}>
                                                                            EUR</option>
                                                                        <option value="FJD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'FJD' ? 'selected' : '' }}>
                                                                            FJD</option>
                                                                        <option value="FKP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'FKP' ? 'selected' : '' }}>
                                                                            FKP</option>
                                                                        <option value="GBP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GBP' ? 'selected' : '' }}>
                                                                            GBP
                                                                        </option>
                                                                        <option value="GEL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GEL' ? 'selected' : '' }}>
                                                                            GEL</option>
                                                                        <option value="GGP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GGP' ? 'selected' : '' }}>
                                                                            GGP</option>
                                                                        <option value="GHC"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GHC' ? 'selected' : '' }}>
                                                                            GHC</option>
                                                                        <option value="GIP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GIP' ? 'selected' : '' }}>
                                                                            GIP</option>
                                                                        <option value="GMD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GMD' ? 'selected' : '' }}>
                                                                            GMD</option>
                                                                        <option value="GNF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GNF' ? 'selected' : '' }}>
                                                                            GNF</option>
                                                                        <option value="GTQ"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GTQ' ? 'selected' : '' }}>
                                                                            GTQ</option>
                                                                        <option value="GYD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'GYD' ? 'selected' : '' }}>
                                                                            GYD</option>
                                                                        <option value="HKD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'HKD' ? 'selected' : '' }}>
                                                                            HKD</option>
                                                                        <option value="HNL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'HNL' ? 'selected' : '' }}>
                                                                            HNL</option>
                                                                        <option value="HRK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'HRK' ? 'selected' : '' }}>
                                                                            HRK</option>
                                                                        <option value="HTG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'HTG' ? 'selected' : '' }}>
                                                                            HTG</option>
                                                                        <option value="HUF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'HUF' ? 'selected' : '' }}>
                                                                            HUF</option>
                                                                        <option value="IDR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'IDR' ? 'selected' : '' }}>
                                                                            IDR</option>
                                                                        <option value="ILS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ILS' ? 'selected' : '' }}>
                                                                            ILS</option>
                                                                        <option value="IMP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'IMP' ? 'selected' : '' }}>
                                                                            IMP</option>
                                                                        <option value="INR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'INR' ? 'selected' : '' }}>
                                                                            INR</option>
                                                                        <option value="IQD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'IQD' ? 'selected' : '' }}>
                                                                            IQD</option>
                                                                        <option value="IRR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'IRR' ? 'selected' : '' }}>
                                                                            IRR</option>
                                                                        <option value="ISK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ISK' ? 'selected' : '' }}>
                                                                            ISK</option>
                                                                        <option value="JEP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'JEP' ? 'selected' : '' }}>
                                                                            JEP</option>
                                                                        <option value="JMD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'JMD' ? 'selected' : '' }}>
                                                                            JMD</option>
                                                                        <option value="JOD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'JOD' ? 'selected' : '' }}>
                                                                            JOD</option>
                                                                        <option value="JPY"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'JPY' ? 'selected' : '' }}>
                                                                            JPY</option>
                                                                        <option value="KES"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KES' ? 'selected' : '' }}>
                                                                            KES</option>
                                                                        <option value="KGS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KGS' ? 'selected' : '' }}>
                                                                            KGS</option>
                                                                        <option value="KHR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KHR' ? 'selected' : '' }}>
                                                                            KHR</option>
                                                                        <option value="KMF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KMF' ? 'selected' : '' }}>
                                                                            KMF</option>
                                                                        <option value="KPW"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KPW' ? 'selected' : '' }}>
                                                                            KPW</option>
                                                                        <option value="KRW"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KRW' ? 'selected' : '' }}>
                                                                            KRW</option>
                                                                        <option value="KWD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KWD' ? 'selected' : '' }}>
                                                                            KWD</option>
                                                                        <option value="KYD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KYD' ? 'selected' : '' }}>
                                                                            KYD</option>
                                                                        <option value="KZT"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'KZT' ? 'selected' : '' }}>
                                                                            KZT</option>
                                                                        <option value="LAK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LAK' ? 'selected' : '' }}>
                                                                            LAK</option>
                                                                        <option value="LBP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LBP' ? 'selected' : '' }}>
                                                                            LBP</option>
                                                                        <option value="LKR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LKR' ? 'selected' : '' }}>
                                                                            LKR</option>
                                                                        <option value="LRD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LRD' ? 'selected' : '' }}>
                                                                            LRD</option>
                                                                        <option value="LSL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LSL' ? 'selected' : '' }}>
                                                                            LSL</option>
                                                                        <option value="LTL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LTL' ? 'selected' : '' }}>
                                                                            LTL</option>
                                                                        <option value="LVL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LVL' ? 'selected' : '' }}>
                                                                            LVL</option>
                                                                        <option value="LYD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'LYD' ? 'selected' : '' }}>
                                                                            LYD</option>
                                                                        <option value="MAD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MAD' ? 'selected' : '' }}>
                                                                            MAD</option>
                                                                        <option value="MDL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MDL' ? 'selected' : '' }}>
                                                                            MDL</option>
                                                                        <option value="MGA"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MGA' ? 'selected' : '' }}>
                                                                            MGA</option>
                                                                        <option value="MKD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MKD' ? 'selected' : '' }}>
                                                                            MKD</option>
                                                                        <option value="MMK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MMK' ? 'selected' : '' }}>
                                                                            MMK</option>
                                                                        <option value="MNT"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MNT' ? 'selected' : '' }}>
                                                                            MNT</option>
                                                                        <option value="MOP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MOP' ? 'selected' : '' }}>
                                                                            MOP</option>
                                                                        <option value="MRO"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MRO' ? 'selected' : '' }}>
                                                                            MRO</option>
                                                                        <option value="MTL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MTL' ? 'selected' : '' }}>
                                                                            MTL</option>
                                                                        <option value="MUR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MUR' ? 'selected' : '' }}>
                                                                            MUR</option>
                                                                        <option value="MVR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MVR' ? 'selected' : '' }}>
                                                                            MVR</option>
                                                                        <option value="MWK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MWK' ? 'selected' : '' }}>
                                                                            MWK</option>
                                                                        <option value="MXN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MXN' ? 'selected' : '' }}>
                                                                            MXN</option>
                                                                        <option value="MYR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MYR' ? 'selected' : '' }}>
                                                                            MYR</option>
                                                                        <option value="MZM"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'MZM' ? 'selected' : '' }}>
                                                                            MZM</option>
                                                                        <option value="NAD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NAD' ? 'selected' : '' }}>
                                                                            NAD</option>
                                                                        <option value="NGN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NGN' ? 'selected' : '' }}>
                                                                            NGN</option>
                                                                        <option value="NIO"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NIO' ? 'selected' : '' }}>
                                                                            NIO</option>
                                                                        <option value="NOK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NOK' ? 'selected' : '' }}>
                                                                            NOK</option>
                                                                        <option value="NPR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NPR' ? 'selected' : '' }}>
                                                                            NPR</option>
                                                                        <option value="NZD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'NZD' ? 'selected' : '' }}>
                                                                            NZD</option>
                                                                        <option value="OMR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'OMR' ? 'selected' : '' }}>
                                                                            OMR</option>
                                                                        <option value="PAB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PAB' ? 'selected' : '' }}>
                                                                            PAB</option>
                                                                        <option value="PEN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PEN' ? 'selected' : '' }}>
                                                                            PEN</option>
                                                                        <option value="PGK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PGK' ? 'selected' : '' }}>
                                                                            PGK</option>
                                                                        <option value="PHP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PHP' ? 'selected' : '' }}>
                                                                            PHP</option>
                                                                        <option value="PKR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PKR' ? 'selected' : '' }}>
                                                                            PKR</option>
                                                                        <option value="PLN"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PLN' ? 'selected' : '' }}>
                                                                            PLN</option>
                                                                        <option value="PYG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'PYG' ? 'selected' : '' }}>
                                                                            PYG</option>
                                                                        <option value="QAR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'QAR' ? 'selected' : '' }}>
                                                                            QAR</option>
                                                                        <option value="RON"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'RON' ? 'selected' : '' }}>
                                                                            RON</option>
                                                                        <option value="RUB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'RUB' ? 'selected' : '' }}>
                                                                            RUB</option>
                                                                        <option value="RWF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'RWF' ? 'selected' : '' }}>
                                                                            RWF</option>
                                                                        <option value="SAR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SAR' ? 'selected' : '' }}>
                                                                            SAR</option>
                                                                        <option value="SBD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SBD' ? 'selected' : '' }}>
                                                                            SBD</option>
                                                                        <option value="SCR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SCR' ? 'selected' : '' }}>
                                                                            SCR</option>
                                                                        <option value="SDD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SDD' ? 'selected' : '' }}>
                                                                            SDD</option>
                                                                        <option value="SEK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SEK' ? 'selected' : '' }}>
                                                                            SEK</option>
                                                                        <option value="SGD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SGD' ? 'selected' : '' }}>
                                                                            SGD</option>
                                                                        <option value="SHP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SHP' ? 'selected' : '' }}>
                                                                            SHP</option>
                                                                        <option value="SIT"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SIT' ? 'selected' : '' }}>
                                                                            SIT</option>
                                                                        <option value="SKK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SKK' ? 'selected' : '' }}>
                                                                            SKK</option>
                                                                        <option value="SLL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SLL' ? 'selected' : '' }}>
                                                                            SLL</option>
                                                                        <option value="SOS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SOS' ? 'selected' : '' }}>
                                                                            SOS</option>
                                                                        <option value="SPL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SPL' ? 'selected' : '' }}>
                                                                            SPL</option>
                                                                        <option value="SRG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SRG' ? 'selected' : '' }}>
                                                                            SRG</option>
                                                                        <option value="STD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'STD' ? 'selected' : '' }}>
                                                                            STD</option>
                                                                        <option value="SVC"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SVC' ? 'selected' : '' }}>
                                                                            SVC</option>
                                                                        <option value="SYP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SYP' ? 'selected' : '' }}>
                                                                            SYP</option>
                                                                        <option value="SZL"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'SZL' ? 'selected' : '' }}>
                                                                            SZL</option>
                                                                        <option value="THB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'THB' ? 'selected' : '' }}>
                                                                            THB</option>
                                                                        <option value="TJS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TJS' ? 'selected' : '' }}>
                                                                            TJS</option>
                                                                        <option value="TMM"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TMM' ? 'selected' : '' }}>
                                                                            TMM</option>
                                                                        <option value="TND"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TND' ? 'selected' : '' }}>
                                                                            TND</option>
                                                                        <option value="TOP"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TOP' ? 'selected' : '' }}>
                                                                            TOP</option>
                                                                        <option value="TRY"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TRY' ? 'selected' : '' }}>
                                                                            TRY</option>
                                                                        <option value="TTD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TTD' ? 'selected' : '' }}>
                                                                            TTD</option>
                                                                        <option value="TVD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TVD' ? 'selected' : '' }}>
                                                                            TVD</option>
                                                                        <option value="TWD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TWD' ? 'selected' : '' }}>
                                                                            TWD</option>
                                                                        <option value="TZS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'TZS' ? 'selected' : '' }}>
                                                                            TZS</option>
                                                                        <option value="UAH"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'UAH' ? 'selected' : '' }}>
                                                                            UAH</option>
                                                                        <option value="UGX"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'UGX' ? 'selected' : '' }}>
                                                                            UGX</option>
                                                                        <option value="USD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'USD' ? 'selected' : '' }}>
                                                                            USD</option>
                                                                        <option value="UYU"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'UYU' ? 'selected' : '' }}>
                                                                            UYU</option>
                                                                        <option value="UZS"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'UZS' ? 'selected' : '' }}>
                                                                            UZS</option>
                                                                        <option value="VEB"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'VEB' ? 'selected' : '' }}>
                                                                            VEB</option>
                                                                        <option value="VND"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'VND' ? 'selected' : '' }}>
                                                                            VND</option>
                                                                        <option value="VUV"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'VUV' ? 'selected' : '' }}>
                                                                            VUV</option>
                                                                        <option value="WST"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'WST' ? 'selected' : '' }}>
                                                                            WST</option>
                                                                        <option value="XAF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XAF' ? 'selected' : '' }}>
                                                                            XAF</option>
                                                                        <option value="XAG"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XAG' ? 'selected' : '' }}>
                                                                            XAG</option>
                                                                        <option value="XAU"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XAU' ? 'selected' : '' }}>
                                                                            XAU</option>
                                                                        <option value="XCD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XCD' ? 'selected' : '' }}>
                                                                            XCD</option>
                                                                        <option value="XDR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XDR' ? 'selected' : '' }}>
                                                                            XDR</option>
                                                                        <option value="XOF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XOF' ? 'selected' : '' }}>
                                                                            XOF</option>
                                                                        <option value="XPD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XPD' ? 'selected' : '' }}>
                                                                            XPD</option>
                                                                        <option value="XPF"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XPF' ? 'selected' : '' }}>
                                                                            XPF</option>
                                                                        <option value="XPT"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'XPT' ? 'selected' : '' }}>
                                                                            XPT</option>
                                                                        <option value="YER"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'YER' ? 'selected' : '' }}>
                                                                            YER</option>
                                                                        <option value="YUM"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'YUM' ? 'selected' : '' }}>
                                                                            YUM</option>
                                                                        <option value="ZAR"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ZAR' ? 'selected' : '' }}>
                                                                            ZAR</option>
                                                                        <option value="ZMK"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ZMK' ? 'selected' : '' }}>
                                                                            ZMK</option>
                                                                        <option value="ZWD"
                                                                            {{ isset($val['sh_currency']) && $val['sh_currency'] === 'ZWD' ? 'selected' : '' }}>
                                                                            ZWD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="desc">
                                                        <h3>Particulars</h3>
                                                        {{-- <div class="box"> --}}
                                                            <textarea class="form-control shareHolderValidation edit_share_particulars_{{ $val['id'] }}" id=""
                                                                rows="2">{{ isset($val['perticularsTextArea']) ? $val['perticularsTextArea'] : '' }}</textarea>
                                                            <div class="error d-none" style="color:red;">Particulars Can
                                                                not be empty.</div>
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @php
                                        $idStrng = implode(',', $idArry);
                                    @endphp
                                    <input type="hidden" id="listed_shareHolderContaining_ids"
                                        value="{{ $idStrng }}" readonly>
                                @endif

                                <div class="step-btn-wrap mt-4">
                                    <input type="hidden" id="listed_id"
                                        value="{{ isset($listed_idStrng) ? $listed_idStrng : '' }}" readonly>
                                    <input type="hidden" id="psc_check" value="{{ isset($pscCheck) ? $pscCheck : 0 }}"
                                        readonly>
                                    <input type="hidden" id="director_check" value="{{ isset($directorCheck) ? $directorCheck : 0 }}"
                                        readonly>
                                    <button class="btn prev-btn" onclick="gotToBusinessAddressPage()"><img
                                            src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}"
                                            alt=""> Previous: Business Address</button>
                                    <button class="btn" onclick="goToDocuments()">Save & Continue <img
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
                                            {{-- <a class="nav-link active" id="position-tab" onclick="currentTab('position')"
                                                data-toggle="tab" href="#position" role="tab"
                                                aria-controls="position" aria-selected="true">Position</a> --}}

                                                <a class="nav-link active" id="position-tab" role="tab"
                                                aria-controls="position" aria-selected="true">Position</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" onclick="currentTab('officer')" id="officer-tab"
                                                data-toggle="tab" href="#officer" role="tab" aria-controls="officer"
                                                aria-selected="false">Officer</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            {{-- <a class="nav-link" onclick="currentTab('details')" id="details-tab"
                                                data-toggle="tab" href="#details" role="tab" aria-controls="details"
                                                aria-selected="false" >Details</a> --}}

                                                <a class="nav-link" id="details-tab"  role="tab" aria-controls="details"
                                                aria-selected="false" >Details</a>
                                        </li>
                                        <li class="nav-item">
                                            {{-- <a class="nav-link" onclick="currentTab('addressing')" id="addressing-tab"
                                                data-toggle="tab" href="#addressing" role="tab"
                                                aria-controls="addressing" aria-selected="false">Addressing</a> --}}

                                                {{-- <a class="nav-link"  id="addressing-tab" role="tab" --}}
                                                {{-- aria-controls="addressing" aria-selected="false">Addressing</a> --}}
                                        </li>
                                        <li class="nav-item nocLinkCls d-none">
                                            {{-- <a class="nav-link" onclick="currentTab('nature-control')"
                                                id="nature-control-tab" data-toggle="tab" href="#nature-control"
                                                role="tab" aria-controls="nature-control"
                                                aria-selected="false">Nature of Control</a> --}}

                                                <a class="nav-link" id="nature-control-tab" role="tab" aria-controls="nature-control"
                                                aria-selected="false">Nature of Control</a>
                                        </li>
                                        <li class="nav-item shareholderLinksCls d-none">
                                            <a class="nav-link"
                                            id="share-holder-tab" data-toggle="tab" href="#share-holder"
                                            role="tab" aria-controls="share-holder" aria-selected="false">Share
                                            Holder</a>
                                            {{-- <a class="nav-link" id="share-holder-tab"
                                                role="tab" aria-controls="share-holder" onclick="currentTab('share-holder')" aria-selected="false">Share
                                                Holder</a> --}}
                                        </li>
                                    </ul>

                                    {{-- VALIDATION DIV STARTS --}}
                                    <div class="own-address mt-3 d-none" style="color:red;" id="validationErrorShow">


                                    </div>
                                    {{-- VALIDATION DIV ENDS --}}

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
                                                                @php
                                                                $positions = explode(',',$appointment_details['position']);
                                                                $positions = array_map('trim', $positions);
                                                                @endphp
                                                                <input type="checkbox"  @if (in_array("Director", $positions))checked
                                                                @endif class="checkBoxPos" id="director"
                                                                    value="Director" onclick="consentSection(),toggleCorporateDetails()"
                                                                    value="">
                                                                <label for="director">Director <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt="" id="director_i"></span></label>
                                                                <span class="director_i_tooltip">A private limited company
                                                                    must have at least one director, being a natural person
                                                                    aged 16 years or over. A director is responsible for the
                                                                    day-to-day management of the business.</span>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" @if (in_array("Shareholder", $positions))checked
                                                                @endif class="checkBoxPos"
                                                                    value="Shareholder" id="shareholder"
                                                                    onclick="shareholderTab(),toggleCorporateDetails()">
                                                                <label for="shareholder">Shareholders <span><img
                                                                            src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                            alt=""
                                                                            id="shareholder_i"></span></label>
                                                                <span class="shareholder_i_tooltip">Shareholders are the
                                                                    owners of the company and are generally entitled to a
                                                                    share of company profits. You must appoint at least one
                                                                    shareholder.</span>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" @if (in_array("Secretary", $positions))checked
                                                                @endif class="checkBoxPos" id="secretary"
                                                                    value="Secretary"  onclick="consentSection(),toggleCorporateDetails()">
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
                                                            <li>
                                                                <input type="checkbox" @if (in_array("PSC", $positions))checked
                                                                @endif class="checkBoxPos" id="psc"
                                                                    value="PSC" onclick="pscTab(),toggleCorporateDetails()">
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
                                                                <input type="checkbox" id="occ" @if ((in_array("Secretary", $positions))||(in_array("Director", $positions)))checked
                                                                @endif>
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
                                                                    {{-- <input type="hidden"
                                                                        class="offValdob_month_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['dob_month'] }}" readonly>
                                                                    <input type="hidden"
                                                                        class="offValdob_year_{{ $offVal['id'] }}"
                                                                        value="{{ $offVal['dob_year'] }}" readonly> --}}
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
                                                                    <a
                                                                        href="#
                                                                        ">
                                                                        <input type="text"
                                                                            class="form-control d-none custom-input officerSelect"
                                                                            data-search="{{ $offVal['title'] }},{{ $offVal['dob_day'] }}-{{ $offVal['dob_month'] }}-{{ $offVal['dob_year'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}"
                                                                            value="{{ $offVal['title'] }},{{ $offVal['dob_day'] }}-{{ $offVal['dob_month'] }}-{{ $offVal['dob_year'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}"
                                                                            onclick="choosedOfficer('{{ $offVal['id'] }}')"
                                                                            readonly></a>
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
                                                                                <p>{{ $offVal['title'] }},{{ $offVal['dob_day'] }},{{ $offVal['first_name'] }},{{ $offVal['last_name'] }}
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
                                                    <div class="new-address-block">
                                                        <h3>Or enter a new Address</h3>
                                                        <div class="new-address-field">
                                                            <button type="submit" class="btn"
                                                                onclick="addNewOfficer(),currentTab('details')">Add
                                                                New
                                                                Officer</button>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="recently-used-addresses">
                                                        <h4>Create a new Officer</h4>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="used-addresses-panel">

                                                                    <div class="btn-wrap">
                                                                        <!-- <button type="submit" class="btn select-btn">Select</button> -->
                                                                        <button type="submit" class="btn"
                                                                            onclick="addNewOfficer(),currentTab('details')">Add
                                                                            New Officer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
                                                            <p>It is recommended you enter your name as it appears on your
                                                                ID, eg. passport or drivers licence.</p>
                                                        </div>
                                                    </div>
                                                    <h4>Officer Details</h4>
                                                </div>
                                                <div class="form-block">
                                                    <input type="hidden" id="personOfficerEditId" readonly value="{{@$officer_details['id']}}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <div><label for="">Authoriser Details</label></div>
                                                                <label for="">Title *:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="person_tittle_id" name="person_tittle" value="{{@$officer_details['title']}}">
                                                                <div class="error d-none" style="color:red;">You should
                                                                    have a title!</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            {{-- <div class="form-group">
                                                                <label for="">Date of Birth *:</label>
                                                                <input type="date" onchange="bday_validation_onchange(this)" onclick="dob_onclick(this)"
                                                                    class="form-control" name="person_bday"
                                                                    id="person_bday_id" value="{{@$officer_details['dob_day']}}">
                                                                <div class="error d-none" style="color:red;">Age should be
                                                                    16 or above!</div>
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <div><label for="">Corporate Details</label></div>
                                                                <label for="">Legal Name</label>
                                                                {{-- <input type="date" onclick="dob_onclick(this)"
                                                                    class="form-control" name="person_bday"
                                                                    id="person_bday_id">
                                                                <div class="error d-none" style="color:red;">Age should be
                                                                    16 or above!</div> --}}
                                                                    <input type="text" class="form-control blankCheck"
                                                                    id="legal_name" name="legal_name" value="{{@$officer_details['legal_name']}}">
                                                                <div class="error d-none" style="color:red;">You should
                                                                    have a legal name!</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">First Name(s) *:</label>
                                                                <input type="text" name="person_fname"
                                                                    id="person_fname_id" class="form-control blankCheck" value="{{@$officer_details['first_name']}}">
                                                                <div class="error d-none" style="color:red;">Please enter
                                                                    your First Name!</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 reg_in_uk_container">
                                                            <div class="form-group">
                                                                {{-- <label for="">Nationality - <small>of accepted
                                                                        nationalities *: </small></label>

                                                                <select name="person_national" class="form-control"
                                                                    id="person_national_id"> --}}
                                                                  {{-- <input type="text" value="{{$officer_details['nationality'] }}"> --}}

                                                                    {{-- @if (!empty($countries))
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country['id'] }}"
                                                                                {{ $country['id'] === intval($officer_details['nationality']) ? 'selected' : '' }}>
                                                                                {{ $country['name'] }}</option>
                                                                        @endforeach
                                                                    @endif --}}
                                                                {{-- </select> --}}
                                                                <label for="">Registered in the UK ?</label>
                                                                <div>
                                                                    <span>Yes</span> <input type="radio" name="uk_registered" class="uk_registered" value="Yes" @if (@$officer_details['uk_registered'] == 'Yes') checked @endif onclick="registered_in_uk(1)">
                                                                    <span>No</span><input type="radio" @if (@$officer_details['uk_registered'] == 'No') checked
                                                                    @endif name="uk_registered" class="uk_registered" value="No" onclick="registered_in_uk(0)">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Last Name *:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="person_lname_id" name="person_lname" value="{{@$officer_details['last_name']}}">
                                                                <div class="error d-none" style="color:red;">Please enter
                                                                    your Last Name!</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 corporate_details_expect_legal_container">
                                                            {{-- <div class="form-group">
                                                                <label for="">Occupation *:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="person_occupation_id" name="person_occupation" value="{{@$officer_details['occupation']}}">
                                                                <div class="error d-none" style="color:red;">Please enter
                                                                    your Occupation!</div>
                                                            </div> --}}

                                                            <div class="form-group">
                                                                <label for="">Registration Number:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="registration_number" name="registration_number" value="{{$officer_details['registration_number']}}">
                                                                <div class="error d-none" style="color:red;">Please enter
                                                                    the Registration Number!</div>
                                                            </div>
                                                            <div class="form-group place_registered_div d-none">
                                                                <label for="">Place Registered</label>
                                                                <input type="text" class="form-control"
                                                                    id="place_registered" name="place_registered" value="{{@$officer_details['place_registered']}}"">

                                                            </div>
                                                            <div class="form-group registry_held_div d-none">
                                                                <label for="">Registry Held</label>
                                                                <input type="text" class="form-control"
                                                                    id="registry_held" name="registry_held" value="{{@$officer_details['registry_held']}}" >
                                                            </div>
                                                            <div class="form-group law_governed_div d-none">
                                                                <label for="">Law Governed</label>
                                                                <input type="text" class="form-control"
                                                                    id="law_governed" name="law_governed" value="{{@$officer_details['law_governed']}}" >
                                                                    <div class="error d-none" style="color:red;">Please fill
                                                                        the law governed field!</div>
                                                            </div>
                                                            <div class="form-group legal_form_div">
                                                                <label for="">Legal Form:</label>
                                                                <input type="text" class="form-control blankCheck"
                                                                    id="legal_form" name="legal_form" value="{{@$officer_details['legal_form']}}">
                                                                <div class="error d-none" style="color:red;">Please enter
                                                                    the legal form!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Residential Address selection starts --}}
                                                <div class="rsidential-address-info mb-4">
                                                    <h3>Residential Address</h3>

                                                    <input type="hidden" id="ChossenResAdd_id" readonly value="{{@$officer_details['add_id']}}">
                                                    <div class="error d-none" id="residentialAddrValidation"
                                                        style="color:red;">You have to select a Residential Address!</div>
                                                    <p><strong>Please Note :</strong> <span>It is a legal requirement to
                                                            provide your actual residential address. Supplying an address
                                                            which is not your actual residential address, will lead to the
                                                            rejection of your new company registration.</span></p>
                                                    <p class="" id="ChossenResAdd">{{@$officer_details['address']['house_number']}}
                                                    ,{{@$officer_details['address']['street'] }},{{ @$officer_details['address']['locality'] }},{{ $officer_details['address']['town'] }},{{ $officer_details['address']['county'] }},{{ $officer_details['address']['post_code'] }}</p>

                                                    <div class="btn-block">
                                                        <button class="btn buy-now-btn res_choose_one_cl"
                                                            onclick="chooseAddRess('residential','select')">Choose
                                                            One</button>
                                                        <button class="btn buy-now-btn res_choose_another_cl d-none"
                                                            onclick="chooseAddRess('residential','select')">Choose
                                                            Another</button>
                                                    </div>
                                                    <div class="btn-block residentialAddChosed_cl d-none">
                                                        <button class="btn">Edit</button>
                                                        <button class="btn buy-now-btn">Choose Another</button>
                                                    </div>
                                                </div>
                                                {{-- Residential Address selection ends --}}

                                                <div class="form-info-block d-none" id="authenticationSection">
                                                    <h4 class="mb-5">Authentication Questions</h4>
                                                    <div class="own-address mt-3 d-none" style="color:red;"
                                                        id="AuthValidationError">
                                                        Every question should be different!
                                                    </div>

                                                    <div class="authe-qu-block">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqone_id"
                                                                        name="person_aqone">
                                                                        <option value="Mother’s Maiden Name" @if (@$officer_details['authenticate_one'] == 'Mother’s Maiden Name')
                                                                        selected
                                                                        @endif>
                                                                            Mother’s
                                                                            Maiden
                                                                        <option value="Father's Forename" @if (@$officer_details['authenticate_one'] == 'Father’s Forename')
                                                                        selected
                                                                        @endif>Father's Forename
                                                                        <option value="Town Of Birth" @if (@$officer_details['authenticate_one'] == 'Town Of Birth')
                                                                            selected
                                                                        @endif>Town Of Birth
                                                                        <option value="Telephone Number" @if (@$officer_details['authenticate_one'] == 'Telephone Number')
                                                                            selected
                                                                        @endif>Telephone Number
                                                                        <option value="National insurance" @if (@$officer_details['authenticate_one'] == 'National insurance')
                                                                            selected
                                                                        @endif>National
                                                                            insurance
                                                                        <option value="Passport Number" @if (@$officer_details['authenticate_one'] == 'Passport Number')
                                                                            selected
                                                                        @endif>Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqone_ans_id" maxlength="3" name="person_aqone_ans" value="{{@$officer_details['authenticate_one_ans']}}">
                                                                    <div class="error d-none" style="color:red;">Please
                                                                        Answer!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqtwo_id"
                                                                        name="person_aqtwo">
                                                                        <option value="Father's Forename" @if (@$officer_details['authenticate_two'] == 'Father’s Forename')
                                                                        selected
                                                                        @endif>Father's Forename
                                                                        <option value="Mother’s Maiden Name" @if (@$officer_details['authenticate_two'] == 'Mother’s Maiden Name')
                                                                        selected
                                                                        @endif>Mother’s
                                                                            Maiden
                                                                        <option value="Town Of Birth" @if (@$officer_details['authenticate_two'] == 'Town Of Birth')
                                                                            selected
                                                                        @endif>Town Of Birth
                                                                        <option value="Telephone Number" @if (@$officer_details['authenticate_two'] == 'Telephone Number')
                                                                            selected
                                                                        @endif>Telephone Number
                                                                        <option value="National insurance" @if (@$officer_details['authenticate_two'] == 'National insurance')
                                                                            selected
                                                                        @endif>National
                                                                            insurance
                                                                        <option value="Passport Number" @if (@$officer_details['authenticate_two'] == 'Passport Number')
                                                                            selected
                                                                        @endif>Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqtwo_ans_id" maxlength="3"  name="person_aqtwo_ans" value="{{@$officer_details['authenticate_two_ans']}}">
                                                                    <div class="error d-none" style="color:red;">Please
                                                                        Answer!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="">Select First 3 letters of</label>
                                                                    <select class="form-control" id="person_aqthree_id"
                                                                        name="person_aqthree">
                                                                        <option value="Town Of Birth" @if (@$officer_details['authenticate_three'] == 'Town Of Birth')
                                                                        selected
                                                                        @endif>Town Of Birth
                                                                        <option value="Mother’s Maiden Name" @if (@$officer_details['authenticate_three'] == 'Mother’s Maiden Name')
                                                                        selected
                                                                        @endif>Mother’s Maiden
                                                                        <option value="Father's Forename" @if (@$officer_details['authenticate_three'] == 'Father’s Forename')
                                                                        selected
                                                                        @endif>Father's Forename
                                                                        <option value="Telephone Number" @if (@$officer_details['authenticate_three'] == 'Telephone Number')
                                                                        selected
                                                                        @endif>Telephone Number
                                                                        <option value="National insurance" @if (@$officer_details['authenticate_three'] == 'National insurance')
                                                                        selected
                                                                        @endif> National
                                                                            insurance
                                                                        <option value="Passport Number" @if (@$officer_details['authenticate_three'] == 'Passport Number')
                                                                        selected
                                                                        @endif>Passport Number
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="ans-block block">
                                                                    <label for="">Answer</label>
                                                                    <input type="text" class="form-control"
                                                                        id="person_aqthree_ans_id"
                                                                        name="person_aqthree_ans" maxlength="3" value="{{@$officer_details['authenticate_three_ans']}}">
                                                                    <div class="error d-none" style="color:red;">Please
                                                                        Answer!</div>
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

                                                    // dd( $appoint_construct_forwarding_address );
                                                }

                                            @endphp
                                                <div class="own-address service_add_choosed {{$appoint_own_address_id==''?'d-none':''}}">
                                                    <div class="info">

                                                        <h3>Choose to use your own address</h3>
                                                        <input type="hidden" id="ChossenServiceAdd_id"
                                                            class="totalBlankCheck" readonly @if ($appoint_own_address_id!='')
                                                            value="{{$appoint_own_address_id}}"
                                                            @endif>
                                                        <div class="error d-none" id="serviceAddrValidation"
                                                            style="color:red;">You have to select a Service Address!
                                                        </div>
                                                        <p class="{{$appoint_own_address_id==''?'d-none':''}}" id="ChossenServiceAdd">
                                                        {{@$appoint_construct_own_address}}
                                                        </p>
                                                    </div>
                                                    <div class="btn-box">
                                                        {{-- <a type="button" class="btn another-btn choose_one_cl"
                                                            onclick="chooseAdd('service')">Choose One</a> --}}
                                                        <a type="button" class="btn another-btn choose_another_cl"
                                                            onclick="chooseAdd('service')">Choose Another</a>
                                                    </div>
                                                </div>
                                                <div class="own-address forwarding_add_after_buy_now_select {{$appoint_forwarding_address_id==''?'d-none':''}}">
                                                    <div class="info">
                                                        <h3>Forwarding Address</h3>
                                                        <input type="hidden" class="hidden"
                                                            id="ChossenForwarding_Add_id" readonly @if ($appoint_forwarding_address_id!='')
                                                            value="{{$appoint_forwarding_address_id}}"
                                                            @endif>
                                                        <p class="{{$appoint_forwarding_address_id==''?'d-none':''}}" id="ChossenForwarding_Add">{{@$appoint_construct_forwarding_address}}</p>
                                                    </div>
                                                    <div class="btn-box">
                                                        <a type="button"
                                                            class="btn another-btn choose_another_forwading_add_cl"
                                                            onclick="chooseAdd('forwarding')">Choose Another</a>
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
                                                            onclick="chooseAdd('forwarding')">Choose Another</a>
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
                                                        <button class="btn" onclick="DetailsSection()">Details</button>
                                                        <button class="btn buy-now-btn buyNowBtn {{$appoint_forwarding_address_id!=''?'d-none':''}}"
                                                            onclick="buyAdd('forwarding')">Buy
                                                            Now</button>
                                                            <button class="btn buy-now-btn {{$appoint_forwarding_address_id==''?'d-none':''}}" id="removeBuy" onclick="removeBuy()">Remove</button>
                                                        {{-- @if ($appoint_forwarding_address_id=='')

                                                        <button class="btn buy-now-btn buyNowBtn"
                                                            onclick="buyAdd('forwarding');$(this).addClass('d-none')">Buy
                                                            Now</button>
                                                        @else
                                                        <button class="btn buy-now-btn" id="removeBuyCondition"  onclick="removeBuy();$(this).addClass('d-none')">Remove</button>
                                                        @endif --}}
                                                    </div>
                                                    <div class="details-desc d-none" id="DetailsSection_div">
                                                        <h3>Why would I use your WC2 London Business Address Services?</h3>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="details-text">
                                                                    <h4>Improve your corporate image</h4>
                                                                    <p>A professional business address located in the heart
                                                                        of London
                                                                        can provide a number of benefits for your business -
                                                                        boosting
                                                                        your corporate image and extending your company’s
                                                                        presence.</p>
                                                                    <p>You can use our address as your company’s primary
                                                                        correspondence
                                                                        address, and we will forward all your business mail
                                                                        to an
                                                                        alternative address of your choosing, on a daily
                                                                        basis.</p>
                                                                    <p>This service is renewable on a 12 monthly basis at
                                                                        the cost of
                                                                        £96.00+vat</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="details-text">
                                                                    <h4>Benefits of our Business Address Services</h4>
                                                                    <ul>
                                                                        <li>Creates a professional, corporate image.</li>
                                                                        <li>Gives the impression of a large, established
                                                                            business.</li>
                                                                        <li>Provides an alternate contact address from your
                                                                            registered
                                                                            office or home address that is exclusively used
                                                                            for
                                                                            corresponding with clients, suppliers, investors
                                                                            and other
                                                                            third parties.</li>
                                                                        <li>Non-statutory general business mail is delivered
                                                                            to our
                                                                            London address and forwarded to an alternate
                                                                            address of your
                                                                            choice two times per week.</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="details-text">
                                                                    <p><strong>Please note:</strong> This service does not
                                                                        include a
                                                                        registered office service, which should be purchased
                                                                        separately.
                                                                        All general business mail will be handled by us and
                                                                        forwarded to
                                                                        your UK or overseas address at the cost of Royal
                                                                        Mail postal
                                                                        rates plus 15%.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ADDRESS TAB Landing Page ends --}}


                                            {{-- ADDRESS TAB Choose Address Page starts --}}
                                            {{-- <div class="form-wrap hideEdit d-none">
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

                                            </div> --}}
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

                                                    <div class="own-address mt-3 d-none" style="color:red;"
                                                        id="NOC_validation_error">
                                                        You must answer atleast first two PSC question.
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
                                                                    <select class="form-control" id="F_ownership"
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
                                                                    <select class="form-control" id="F_voting"
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
                                                                        <span class="text">Appoint or remove the
                                                                            majority
                                                                            of the board of directors</span></label>
                                                                    <select class="form-control" id="F_appoint"
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

                                                                    <select class="form-control"
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
                                                                onclick="f_radio_check()" {{$put_fci_val=='Yes' ? 'checked' : ''}} value="Yes" name="com-qu">
                                                            <label for="yes">yes</label>
                                                        </li>
                                                    </ul>
                                                    <div class="mt-4 mb-4 {{$put_fci_val=='No' ? 'd-none' : ''}}" id="firmDD">
                                                        <h5>What influence or control does this officer have over this
                                                            company in their capacity within the Firm(s) ?
                                                        </h5>
                                                        <div class="authe-qu-block">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="qu-block block">
                                                                        <label for="" class="d-flex">
                                                                            <span class="text">Ownership of
                                                                                shares</span>
                                                                        </label>
                                                                            {{-- {{$appointment_details['fci_os']}} --}}
                                                                        <select class="form-control" id="s_ownership"
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
                                                                        <select class="form-control" id="s_voting"
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
                                                                            <span class="text">Appoint or remove the
                                                                                majority
                                                                                of the board of directors</span>
                                                                        </label>

                                                                        <select class="form-control" id="s_appoint"
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
                                                                            id="s_other_sig_select_id">
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
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qu-block block">
                                                                    <label for="" class="d-flex">
                                                                        <span class="text">Ownership of
                                                                            shares</span>
                                                                    </label>
                                                                    {{-- {{{$appointment_details['tci_os']}}} --}}
                                                                    <select class="form-control" id="t_ownership"
                                                                        onchange="show_hide_t_other_sig()">
                                                                        <option value="">N/A</option>
                                                                        <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_os'], 'More than 25%') !== false ? 'selected' : ''}}>More than 25% but not
                                                                            more than 50%</option>
                                                                        <option value="More than 50% but less than 75%" {{strpos($appointment_details['tci_os'], '75% or more') !== false ? 'selected' : ''}} >More than 50% but less
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

                                                                    <select class="form-control"
                                                                         id="t_voting"
                                                                        onchange="show_hide_t_other_sig()">
                                                                        <option value="">N/A</option>
                                                                        <option value="More than 25% but not more than 50%" {{strpos($appointment_details['tci_vr'], 'More than 25% ') !== false ? 'selected' : ''}}>More than 25% but not
                                                                            more than 50%</option>
                                                                        <option value="More than 50% but less
                                                                        than 75%" {{strpos($appointment_details['tci_vr'], 'More than 50%') !== false ? 'selected' : ''}}>More than 50% but less
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
                                                                        <span class="text">Appoint or remove the
                                                                            majority of the board of directors</span>
                                                                    </label>

                                                                    <select class="form-control"
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
                                                                        id="t_other_sig_select_id">
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
                                        </div>
                                        {{-- NATURE TAB SECTION ENDS --}}

                                        {{-- SHAREHOLDER TAB SECTION STARTS --}}
                                        <div class="tab-pane fade" id="share-holder" role="tabpanel"
                                            aria-labelledby="share-holder-tab">
                                            <div class="share-holder-block" id="shareholderLandingPage">
                                                <h4 class="form-ttl">Appointments</h4>
                                                <div class="share-holder-block-wrap">
                                                    <div class="share-holder-form">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Class <span><img
                                                                                src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                                id="class_i"></span></label>
                                                                    <span class="class_i_tooltip">This package provides a
                                                                        company with one class of shares, which is ORDINARY
                                                                        shares. All shares in this company carry equal
                                                                        rights.</span>
                                                                    <h5>ORDINARY</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Quantity</label>
                                                                    <input type="text" id="sh_quantity"
                                                                        value="{{@$appointment_details['sh_quantity']!=''?@$appointment_details['sh_quantity']:'1'}}" oninput='number_field(this)'
                                                                        class="form-control sh_validation">
                                                                    <div class="error d-none" id=""
                                                                        style="color:red;">Quantity can not be empty or
                                                                        zero</div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Currency</label>
                                                                    <select class="form-control" id="sh_currency">


                                                                        <option value="AED"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AED' ? 'selected' : '' }}>
                                                                            AED</option>
                                                                        <option value="AFA"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AFA' ? 'selected' : '' }}>
                                                                            AFA</option>
                                                                        <option value="ALL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ALL' ? 'selected' : '' }}>
                                                                            ALL</option>
                                                                        <option value="AMD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AMD' ? 'selected' : '' }}>
                                                                            AMD</option>
                                                                        <option value="ANG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ANG' ? 'selected' : '' }}>
                                                                        </option>
                                                                        <option value="ARS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ARS' ? 'selected' : '' }}>
                                                                            ARS
                                                                        </option>
                                                                        <option value="AOA"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AOA' ? 'selected' : '' }}>
                                                                            AOA</option>
                                                                        <option value="AUD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AUD' ? 'selected' : '' }}>
                                                                            AUD</option>
                                                                        <option value="AWG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AWG' ? 'selected' : '' }}>
                                                                            AWG</option>
                                                                        <option value="AZM"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'AZM' ? 'selected' : '' }}>
                                                                            AZM</option>
                                                                        <option value="BAM"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BAM' ? 'selected' : '' }}>
                                                                            BAM</option>
                                                                        <option value="BBD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BBD' ? 'selected' : '' }}>
                                                                            BBD</option>
                                                                        <option value="BDT"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BDT' ? 'selected' : '' }}>
                                                                            BDT</option>
                                                                        <option value="BGN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BGN' ? 'selected' : '' }}>
                                                                            BGN</option>
                                                                        <option value="BHD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BHD' ? 'selected' : '' }}>
                                                                            BHD</option>
                                                                        <option value="BIF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BIF' ? 'selected' : '' }}>
                                                                            BIF</option>
                                                                        <option value="BMD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BMD' ? 'selected' : '' }}>
                                                                            BMD</option>
                                                                        <option value="BND"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BND' ? 'selected' : '' }}>
                                                                            BND</option>
                                                                        <option value="BOB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BOB' ? 'selected' : '' }}>
                                                                            BOB</option>
                                                                        <option value="BRL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BRL' ? 'selected' : '' }}>
                                                                            BRL</option>
                                                                        <option value="BSD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BSD' ? 'selected' : '' }}>
                                                                            BSD</option>
                                                                        <option value="BTN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BTN' ? 'selected' : '' }}>
                                                                            BTN</option>
                                                                        <option value="BWP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BWP' ? 'selected' : '' }}>
                                                                            BWP</option>
                                                                        <option value="BYR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BYR' ? 'selected' : '' }}>
                                                                            BYR</option>
                                                                        <option value="BZD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'BZD' ? 'selected' : '' }}>
                                                                            BZD</option>
                                                                        <option value="CAD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CAD' ? 'selected' : '' }}>
                                                                            CAD</option>
                                                                        <option value="CDF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CDF' ? 'selected' : '' }}>
                                                                            CDF</option>
                                                                        <option value="CHF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CHF' ? 'selected' : '' }}>
                                                                            CHF</option>
                                                                        <option value="CLP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CLP' ? 'selected' : '' }}>
                                                                            CLP</option>
                                                                        <option value="CNY"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CNY' ? 'selected' : '' }}>
                                                                            CNY</option>
                                                                        <option value="COP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'COP' ? 'selected' : '' }}>
                                                                            COP</option>
                                                                        <option value="CRC"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CRC' ? 'selected' : '' }}>
                                                                            CRC</option>
                                                                        <option value="CUP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CUP' ? 'selected' : '' }}>
                                                                            CUP</option>
                                                                        <option value="CVE"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CVE' ? 'selected' : '' }}>
                                                                            CVE</option>
                                                                        <option value="CYP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CYP' ? 'selected' : '' }}>
                                                                            CYP</option>
                                                                        <option value="CZK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'CZK' ? 'selected' : '' }}>
                                                                            CZK</option>
                                                                        <option value="DJF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'DJF' ? 'selected' : '' }}>
                                                                            DJF</option>
                                                                        <option value="DKK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'DKK' ? 'selected' : '' }}>
                                                                            DKK</option>
                                                                        <option value="DOP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'DOP' ? 'selected' : '' }}>
                                                                            DOP</option>
                                                                        <option value="DZD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'DZD' ? 'selected' : '' }}>
                                                                            DZD</option>
                                                                        <option value="EEK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'EEK' ? 'selected' : '' }}>
                                                                            EEK</option>
                                                                        <option value="EGP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'EGP' ? 'selected' : '' }}>
                                                                            EGP</option>
                                                                        <option value="ERN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ERN' ? 'selected' : '' }}>
                                                                            ERN</option>
                                                                        <option value="ETB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ETB' ? 'selected' : '' }}>
                                                                            ETB</option>
                                                                        <option value="EUR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'EUR' ? 'selected' : '' }}>
                                                                            EUR</option>
                                                                        <option value="FJD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'FJD' ? 'selected' : '' }}>
                                                                            FJD</option>
                                                                        <option value="FKP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'FKP' ? 'selected' : '' }}>
                                                                            FKP</option>
                                                                        <option value="GBP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GBP' ? 'selected' : '' }} {{$appointment_details['sh_currency']==''?'selected':''}}>
                                                                            GBP
                                                                        </option>
                                                                        <option value="GEL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GEL' ? 'selected' : '' }}>
                                                                            GEL</option>
                                                                        <option value="GGP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GGP' ? 'selected' : '' }}>
                                                                            GGP</option>
                                                                        <option value="GHC"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GHC' ? 'selected' : '' }}>
                                                                            GHC</option>
                                                                        <option value="GIP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GIP' ? 'selected' : '' }}>
                                                                            GIP</option>
                                                                        <option value="GMD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GMD' ? 'selected' : '' }}>
                                                                            GMD</option>
                                                                        <option value="GNF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GNF' ? 'selected' : '' }}>
                                                                            GNF</option>
                                                                        <option value="GTQ"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GTQ' ? 'selected' : '' }}>
                                                                            GTQ</option>
                                                                        <option value="GYD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'GYD' ? 'selected' : '' }}>
                                                                            GYD</option>
                                                                        <option value="HKD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'HKD' ? 'selected' : '' }}>
                                                                            HKD</option>
                                                                        <option value="HNL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'HNL' ? 'selected' : '' }}>
                                                                            HNL</option>
                                                                        <option value="HRK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'HRK' ? 'selected' : '' }}>
                                                                            HRK</option>
                                                                        <option value="HTG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'HTG' ? 'selected' : '' }}>
                                                                            HTG</option>
                                                                        <option value="HUF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'HUF' ? 'selected' : '' }}>
                                                                            HUF</option>
                                                                        <option value="IDR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'IDR' ? 'selected' : '' }}>
                                                                            IDR</option>
                                                                        <option value="ILS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ILS' ? 'selected' : '' }}>
                                                                            ILS</option>
                                                                        <option value="IMP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'IMP' ? 'selected' : '' }}>
                                                                            IMP</option>
                                                                        <option value="INR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'INR' ? 'selected' : '' }}>
                                                                            INR</option>
                                                                        <option value="IQD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'IQD' ? 'selected' : '' }}>
                                                                            IQD</option>
                                                                        <option value="IRR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'IRR' ? 'selected' : '' }}>
                                                                            IRR</option>
                                                                        <option value="ISK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ISK' ? 'selected' : '' }}>
                                                                            ISK</option>
                                                                        <option value="JEP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'JEP' ? 'selected' : '' }}>
                                                                            JEP</option>
                                                                        <option value="JMD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'JMD' ? 'selected' : '' }}>
                                                                            JMD</option>
                                                                        <option value="JOD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'JOD' ? 'selected' : '' }}>
                                                                            JOD</option>
                                                                        <option value="JPY"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'JPY' ? 'selected' : '' }}>
                                                                            JPY</option>
                                                                        <option value="KES"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KES' ? 'selected' : '' }}>
                                                                            KES</option>
                                                                        <option value="KGS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KGS' ? 'selected' : '' }}>
                                                                            KGS</option>
                                                                        <option value="KHR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KHR' ? 'selected' : '' }}>
                                                                            KHR</option>
                                                                        <option value="KMF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KMF' ? 'selected' : '' }}>
                                                                            KMF</option>
                                                                        <option value="KPW"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KPW' ? 'selected' : '' }}>
                                                                            KPW</option>
                                                                        <option value="KRW"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KRW' ? 'selected' : '' }}>
                                                                            KRW</option>
                                                                        <option value="KWD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KWD' ? 'selected' : '' }}>
                                                                            KWD</option>
                                                                        <option value="KYD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KYD' ? 'selected' : '' }}>
                                                                            KYD</option>
                                                                        <option value="KZT"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'KZT' ? 'selected' : '' }}>
                                                                            KZT</option>
                                                                        <option value="LAK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LAK' ? 'selected' : '' }}>
                                                                            LAK</option>
                                                                        <option value="LBP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LBP' ? 'selected' : '' }}>
                                                                            LBP</option>
                                                                        <option value="LKR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LKR' ? 'selected' : '' }}>
                                                                            LKR</option>
                                                                        <option value="LRD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LRD' ? 'selected' : '' }}>
                                                                            LRD</option>
                                                                        <option value="LSL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LSL' ? 'selected' : '' }}>
                                                                            LSL</option>
                                                                        <option value="LTL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LTL' ? 'selected' : '' }}>
                                                                            LTL</option>
                                                                        <option value="LVL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LVL' ? 'selected' : '' }}>
                                                                            LVL</option>
                                                                        <option value="LYD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'LYD' ? 'selected' : '' }}>
                                                                            LYD</option>
                                                                        <option value="MAD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MAD' ? 'selected' : '' }}>
                                                                            MAD</option>
                                                                        <option value="MDL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MDL' ? 'selected' : '' }}>
                                                                            MDL</option>
                                                                        <option value="MGA"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MGA' ? 'selected' : '' }}>
                                                                            MGA</option>
                                                                        <option value="MKD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MKD' ? 'selected' : '' }}>
                                                                            MKD</option>
                                                                        <option value="MMK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MMK' ? 'selected' : '' }}>
                                                                            MMK</option>
                                                                        <option value="MNT"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MNT' ? 'selected' : '' }}>
                                                                            MNT</option>
                                                                        <option value="MOP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MOP' ? 'selected' : '' }}>
                                                                            MOP</option>
                                                                        <option value="MRO"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MRO' ? 'selected' : '' }}>
                                                                            MRO</option>
                                                                        <option value="MTL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MTL' ? 'selected' : '' }}>
                                                                            MTL</option>
                                                                        <option value="MUR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MUR' ? 'selected' : '' }}>
                                                                            MUR</option>
                                                                        <option value="MVR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MVR' ? 'selected' : '' }}>
                                                                            MVR</option>
                                                                        <option value="MWK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MWK' ? 'selected' : '' }}>
                                                                            MWK</option>
                                                                        <option value="MXN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MXN' ? 'selected' : '' }}>
                                                                            MXN</option>
                                                                        <option value="MYR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MYR' ? 'selected' : '' }}>
                                                                            MYR</option>
                                                                        <option value="MZM"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'MZM' ? 'selected' : '' }}>
                                                                            MZM</option>
                                                                        <option value="NAD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NAD' ? 'selected' : '' }}>
                                                                            NAD</option>
                                                                        <option value="NGN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NGN' ? 'selected' : '' }}>
                                                                            NGN</option>
                                                                        <option value="NIO"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NIO' ? 'selected' : '' }}>
                                                                            NIO</option>
                                                                        <option value="NOK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NOK' ? 'selected' : '' }}>
                                                                            NOK</option>
                                                                        <option value="NPR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NPR' ? 'selected' : '' }}>
                                                                            NPR</option>
                                                                        <option value="NZD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'NZD' ? 'selected' : '' }}>
                                                                            NZD</option>
                                                                        <option value="OMR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'OMR' ? 'selected' : '' }}>
                                                                            OMR</option>
                                                                        <option value="PAB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PAB' ? 'selected' : '' }}>
                                                                            PAB</option>
                                                                        <option value="PEN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PEN' ? 'selected' : '' }}>
                                                                            PEN</option>
                                                                        <option value="PGK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PGK' ? 'selected' : '' }}>
                                                                            PGK</option>
                                                                        <option value="PHP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PHP' ? 'selected' : '' }}>
                                                                            PHP</option>
                                                                        <option value="PKR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PKR' ? 'selected' : '' }}>
                                                                            PKR</option>
                                                                        <option value="PLN"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PLN' ? 'selected' : '' }}>
                                                                            PLN</option>
                                                                        <option value="PYG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'PYG' ? 'selected' : '' }}>
                                                                            PYG</option>
                                                                        <option value="QAR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'QAR' ? 'selected' : '' }}>
                                                                            QAR</option>
                                                                        <option value="RON"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'RON' ? 'selected' : '' }}>
                                                                            RON</option>
                                                                        <option value="RUB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'RUB' ? 'selected' : '' }}>
                                                                            RUB</option>
                                                                        <option value="RWF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'RWF' ? 'selected' : '' }}>
                                                                            RWF</option>
                                                                        <option value="SAR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SAR' ? 'selected' : '' }}>
                                                                            SAR</option>
                                                                        <option value="SBD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SBD' ? 'selected' : '' }}>
                                                                            SBD</option>
                                                                        <option value="SCR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SCR' ? 'selected' : '' }}>
                                                                            SCR</option>
                                                                        <option value="SDD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SDD' ? 'selected' : '' }}>
                                                                            SDD</option>
                                                                        <option value="SEK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SEK' ? 'selected' : '' }}>
                                                                            SEK</option>
                                                                        <option value="SGD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SGD' ? 'selected' : '' }}>
                                                                            SGD</option>
                                                                        <option value="SHP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SHP' ? 'selected' : '' }}>
                                                                            SHP</option>
                                                                        <option value="SIT"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SIT' ? 'selected' : '' }}>
                                                                            SIT</option>
                                                                        <option value="SKK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SKK' ? 'selected' : '' }}>
                                                                            SKK</option>
                                                                        <option value="SLL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SLL' ? 'selected' : '' }}>
                                                                            SLL</option>
                                                                        <option value="SOS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SOS' ? 'selected' : '' }}>
                                                                            SOS</option>
                                                                        <option value="SPL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SPL' ? 'selected' : '' }}>
                                                                            SPL</option>
                                                                        <option value="SRG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SRG' ? 'selected' : '' }}>
                                                                            SRG</option>
                                                                        <option value="STD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'STD' ? 'selected' : '' }}>
                                                                            STD</option>
                                                                        <option value="SVC"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SVC' ? 'selected' : '' }}>
                                                                            SVC</option>
                                                                        <option value="SYP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SYP' ? 'selected' : '' }}>
                                                                            SYP</option>
                                                                        <option value="SZL"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'SZL' ? 'selected' : '' }}>
                                                                            SZL</option>
                                                                        <option value="THB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'THB' ? 'selected' : '' }}>
                                                                            THB</option>
                                                                        <option value="TJS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TJS' ? 'selected' : '' }}>
                                                                            TJS</option>
                                                                        <option value="TMM"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TMM' ? 'selected' : '' }}>
                                                                            TMM</option>
                                                                        <option value="TND"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TND' ? 'selected' : '' }}>
                                                                            TND</option>
                                                                        <option value="TOP"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TOP' ? 'selected' : '' }}>
                                                                            TOP</option>
                                                                        <option value="TRY"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TRY' ? 'selected' : '' }}>
                                                                            TRY</option>
                                                                        <option value="TTD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TTD' ? 'selected' : '' }}>
                                                                            TTD</option>
                                                                        <option value="TVD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TVD' ? 'selected' : '' }}>
                                                                            TVD</option>
                                                                        <option value="TWD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TWD' ? 'selected' : '' }}>
                                                                            TWD</option>
                                                                        <option value="TZS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'TZS' ? 'selected' : '' }}>
                                                                            TZS</option>
                                                                        <option value="UAH"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'UAH' ? 'selected' : '' }}>
                                                                            UAH</option>
                                                                        <option value="UGX"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'UGX' ? 'selected' : '' }}>
                                                                            UGX</option>
                                                                        <option value="USD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'USD' ? 'selected' : '' }}>
                                                                            USD</option>
                                                                        <option value="UYU"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'UYU' ? 'selected' : '' }}>
                                                                            UYU</option>
                                                                        <option value="UZS"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'UZS' ? 'selected' : '' }}>
                                                                            UZS</option>
                                                                        <option value="VEB"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'VEB' ? 'selected' : '' }}>
                                                                            VEB</option>
                                                                        <option value="VND"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'VND' ? 'selected' : '' }}>
                                                                            VND</option>
                                                                        <option value="VUV"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'VUV' ? 'selected' : '' }}>
                                                                            VUV</option>
                                                                        <option value="WST"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'WST' ? 'selected' : '' }}>
                                                                            WST</option>
                                                                        <option value="XAF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XAF' ? 'selected' : '' }}>
                                                                            XAF</option>
                                                                        <option value="XAG"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XAG' ? 'selected' : '' }}>
                                                                            XAG</option>
                                                                        <option value="XAU"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XAU' ? 'selected' : '' }}>
                                                                            XAU</option>
                                                                        <option value="XCD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XCD' ? 'selected' : '' }}>
                                                                            XCD</option>
                                                                        <option value="XDR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XDR' ? 'selected' : '' }}>
                                                                            XDR</option>
                                                                        <option value="XOF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XOF' ? 'selected' : '' }}>
                                                                            XOF</option>
                                                                        <option value="XPD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XPD' ? 'selected' : '' }}>
                                                                            XPD</option>
                                                                        <option value="XPF"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XPF' ? 'selected' : '' }}>
                                                                            XPF</option>
                                                                        <option value="XPT"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'XPT' ? 'selected' : '' }}>
                                                                            XPT</option>
                                                                        <option value="YER"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'YER' ? 'selected' : '' }}>
                                                                            YER</option>
                                                                        <option value="YUM"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'YUM' ? 'selected' : '' }}>
                                                                            YUM</option>
                                                                        <option value="ZAR"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ZAR' ? 'selected' : '' }}>
                                                                            ZAR</option>
                                                                        <option value="ZMK"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ZMK' ? 'selected' : '' }}>
                                                                            ZMK</option>
                                                                        <option value="ZWD"
                                                                            {{ isset($appointment_details['sh_currency']) && $appointment_details['sh_currency'] === 'ZWD' ? 'selected' : '' }}>
                                                                            ZWD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Price per share</label>
                                                                    <input type="text"
                                                                        oninput='number_field(this)'
                                                                        class="form-control sh_validation"
                                                                        onblur='conertToDecimal($(this))'
                                                                        id="sh_pps" value="{{@$appointment_details['sh_pps']!=''?@$appointment_details['sh_pps']:'1.00'}}">
                                                                    <div class="error d-none" id=""
                                                                        style="color:red;">Price can not be empty or zero
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="desc">
                                                        <h5>Particulars <span><img
                                                                    src="{{ asset('frontend/assets/images/in-icon.png') }}"
                                                                    alt="" id="sh_appo_i"></span></h5>
                                                        <span class="sh_appo_i_tooltip">Shares in a company give the owner
                                                            various shareholder rights and are usually defined in the
                                                            articles of association and any shareholders' agreements. The
                                                            prescribed particulars are a summary of these rights and might
                                                            be very different between different companies.</span>
                                                        <textarea class="form-control sh_validation" id="perticularsTextArea" rows="2">{{@$appointment_details['perticularsTextArea']!=''?@$appointment_details['perticularsTextArea']:''}}</textarea>
                                                        <div class="error d-none" id="" style="color:red;">
                                                            Particulars can not be empty.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shareholdings-table-wrap d-none" id="shareholderListing">
                                                <h4>Shareholdings</h4>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <th>Quantity</th>
                                                            <th>Share Class</th>
                                                            <th>Price</th>
                                                            <th>Currency</th>
                                                            <th></th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td id="quantityVal"></td>
                                                                <td>ORDINARY</td>
                                                                <td id="pps"></td>
                                                                <td id="currencyVal"></td>
                                                                <td><button class="remove-btn"
                                                                        onclick="removeShareHolder()">Remove</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SHAREHOLDER TAB SECTION ENDS --}}
                                    </div>
                                    @php
                                        $cancel_and_success_route = route('appointments').'?order='.$_GET['order'].'&section=Company_formaction&step=appointments';
                                    @endphp
                                </div>
                                <div class="step-btn-wrap mt-4">
                                    <a href="{{ $cancel_and_success_route }}" class="btn prev-btn" id="cancelBtn">Cancel</a>
                                    {{-- <button class="btn prev-btn" id="cancelBtn"
                                        onclick="location.reload()">Cancel</button> --}}
                                    <button class="btn prev-btn d-none" id="bckButton"
                                        onclick="theCancelButtonFunction()">Back</button>
                                    <button class="btn" id="theNextBtn" onclick="checkConsentOrNot()">Next <img
                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                            alt=""></button>
                                </div>
                            </div>
                        </div>
                        {{-- APPOINTMENTS SECTION ENDS --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="orderId" value="{{ $_GET['order'] }}" readonly>
        <input type="hidden" id="positionSelected" value="{{$appointment_details['position']}}" class="totalBlankCheck" readonly>
        <input type="hidden" id="appointmentType" value="" readonly>
        <input type="hidden" id="appointment_type" value="corporate" readonly>
        <input type="hidden" id="shoppingCartId_id" value="{{ $shoppingCartId }}" readonly>
        <input type="hidden" id="currentTab" value="" readonly>

        <!-- PERSON SECTION DATAS -->
        <input type="hidden" id="choosedPersonOfficerId" class="totalBlankCheck" value="{{$officer_details['id']}}" readonly>
        <input type="hidden" id="addressTypeChoosed" value="" readonly>
        <input type="hidden" id="actionType" value="" readonly>

        {{-- Nature of Control radio btn val --}}

        <input type="hidden" id="f_radio_check_id" value="{{$put_fci_val}}" readonly>
        <input type="hidden" id="s_radio_check_id" value="{{$put_tci_val}}" readonly>
    </section>
    <!-- ================ end: Particulars sec ================ -->
@endsection

@section('script')
    <script>

        show_hide_s_other_sig();
        show_hide_t_other_sig();
        $(document).ready(function() {
            if($('#director').prop('checked'))
            {
                consentSection()
            }
            if($('#shareholder').prop('checked'))
            {
                shareholderTab()
            }
            if($('#psc').prop('checked'))
            {
                pscTab()
            }
            if($('#secretary').prop('checked'))
            {
                consentSection()
            }
        })
        // Scroll to the top of the page
        function scrollToTop() {
            window.scrollTo(0, 0);
        }

        // DOB Future not select date
        function dob_onclick(ths) {
            const today = new Date().toISOString().split('T')[0];
            ths.setAttribute("max", today);
        }

        function DetailsSection() {
            $('#DetailsSection_div').toggleClass('d-none')
        }
        function toggleCorporateDetails() {
            check = $('input[name="uk_registered"]:checked').val();
            if(check=="Yes")
            {
                mode = 1
            }else{
                mode=0
            }
            if(!$('#psc').is(":checked")){
            if (($('#director').is(":checked") || $('#secretary').is(":checked"))&& !$('#psc').is(":checked")) {
                console.log('hit director')
                if(mode==1){
                    $(".legal_form_div").addClass('d-none')
                    $("#legal_form").removeClass('blankCheck')
                    $(".registry_held_div").addClass('d-none')

                    $(".reg_in_uk_container").removeClass('d-none');
                    $(".corporate_details_expect_legal_container").removeClass('d-none');
                    $("#registration_number").addClass('blankCheck')
                    $("#law_governed").removeClass('blankCheck')
                    $("#legal_form").removeClass('blankCheck')
                    $("#legal_form").val('')

                }else{
                    $(".legal_form_div").removeClass('d-none')
                    $("#legal_form").addClass('blankCheck')
                    $(".registry_held_div").addClass('d-none')
                    $(".reg_in_uk_container").removeClass('d-none');
                    $(".corporate_details_expect_legal_container").removeClass('d-none');
                    $("#registration_number").removeClass('blankCheck')
                    $("#law_governed").addClass('blankCheck')
                    $("#legal_form").addClass('blankCheck')
                    $("#registry_held").val('')

                }
            }else if (!$('#director').is(":checked") && !$('#secretary').is(":checked")&& !$('#psc').is(":checked")&& $('#shareholder').is(":checked")) {
                console.log('hit shareholder')
                $(".reg_in_uk_container").addClass('d-none');
                $(".corporate_details_expect_legal_container").addClass('d-none');
                $(".corporate_details_expect_legal_container div input").val('');
                // console.log(elem)
                $("#legal_form").removeClass('blankCheck')
                $("#registration_number").removeClass('blankCheck')
                $("#law_governed").removeClass('blankCheck')
            }
        }else{
            console.log('psc hit');
            if (mode==1) {
                $(".reg_in_uk_container").removeClass('d-none');
                $(".corporate_details_expect_legal_container").removeClass('d-none');
                $(".legal_form_div").removeClass('d-none')
                $("#legal_form").addClass('blankCheck')
                $(".registry_held_div").addClass('d-none')
                $("#registration_number").addClass('blankCheck')
                $("#law_governed").removeClass('blankCheck')
                $("#legal_form").addClass('blankCheck')

            }else{
                $(".reg_in_uk_container").removeClass('d-none');
                $(".corporate_details_expect_legal_container").removeClass('d-none');
                $(".legal_form_div").removeClass('d-none')
                $("#registration_number").removeClass('blankCheck')
                $("#law_governed").addClass('blankCheck')
                $("#legal_form").addClass('blankCheck')
                $(".registry_held_div").removeClass('d-none')
                $(".registration_number_err").addClass('d-none')
            }
        }
            // const requiredFields = document.querySelectorAll('.blankCheck');
            // const requiredFieldsArr = [...requiredFields];

            // requiredFieldsArr.forEach(el => {
            //     el.classList.remove('validation');
            //     el.nextElementSibling.classList.add('d-none');
            // });
        }
        toggleCorporateDetails()
        function registered_in_uk(mode)
        {
            check = $('input[name="uk_registered"]:checked').val();
            if(check=="Yes")
            {
                mode = 1
            }else{
                mode=0
            }
            console.log(mode)
            if (mode === 0) {
                $(".place_registered_div").removeClass("d-none");
                $(".registry_held_div").removeClass("d-none");
                $(".law_governed_div").removeClass("d-none");
                $("#law_governed").addClass("blankCheck");
                $("#registration_number").removeClass("blankCheck");
                toggleCorporateDetails()
                // $('#place_registered').val('');
                // $('#registry_held').val('');
                // $('#law_governed').val('');
            }else{
                $(".place_registered_div").addClass("d-none");
                $(".registry_held_div").addClass("d-none");
                $(".law_governed_div").addClass("d-none");
                $("#law_governed").removeClass("blankCheck");
                $("#registration_number").addClass("blankCheck");

                $('#place_registered').val('United Kingdom');
                $('#registry_held').val('Companies House');
                $('#law_governed').val('Companies Act 2006');
                toggleCorporateDetails()
            }
        }
        registered_in_uk(1)
        const goToDocuments = function() {
            // Appointment to Document section Movement starts
            if ($("#share_holding_table_id").length === 0) {
                $("#positionValidation").removeClass('d-none')
                $("#positionValidation").html('You have to select ateast one shareholder!')
                return false
            }

            if ($("#psc_check").val() == 0) {
                $("#positionValidation").removeClass('d-none')
                $("#positionValidation").html('You have to select a PSC!')
                return false
            }

            if ($("#director_check").val() == 0) {
                $("#positionValidation").removeClass('d-none')
                $("#positionValidation").html('You have to select a Director!')

                return false
            }

            if ($("#listed_shareHolderContaining_ids").val() !== '' && $("#psc_check").val() !== 0 && $("#director_check").val() !== 0) {
                // Shareholder edit section starts
                const listed_shareHolderContaining_ids = $("#listed_shareHolderContaining_ids").val();

                let idVal = null;
                if (listed_shareHolderContaining_ids.includes(',')) {
                    idVal = listed_shareHolderContaining_ids.split(',');

                } else {
                    idVal = [listed_shareHolderContaining_ids];
                }
                let edit_share_price = [];
                let edit_share_currency = [];
                let edit_share_particulars = [];
                idVal.forEach(id => {
                    edit_share_price.push($(`.edit_share_price_${id}`).val())
                    edit_share_currency.push($(`.edit_share_currency_${id}`).val())
                    edit_share_particulars.push($(`.edit_share_particulars_${id}`).val())
                })

                const requiredFields = document.querySelectorAll('.shareHolderValidation');
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
                        url: "{!! route('update-shareholder-from-appointment-listing') !!}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            idVal,
                            edit_share_price,
                            edit_share_currency,
                            edit_share_particulars
                        },
                        success: function(response) {
                            $order_id = {{$_GET['order']}};

                            console.log('Under Save Success',$order_id);
                            $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url : "{{ url('appointment-step') }}",
                            data : {
                                'order_id': $order_id
                            },
                            type : 'POST',
                            dataType : 'json',
                            success : function(result){

                                window.location.href =
                                "{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'documents']) }}"


                                    }
                            });


                        },
                    });
                }
                // Shareholder edit section ends
            }

            // Appointment to Document section Movement Ends
        }

        const removeOfficerList = function(id) {
            $.ajax({
                url: "{!! route('remove-officer-list') !!}",
                type: 'get',
                data: {
                    id,
                },
                success: function(result) {
                    location.reload()
                }
            });
        }

        const databaseEntry = function() {
            // VALUES
            // general section values
            const order_id = {{$_GET['order']}};
            const appointment_id = {{$_GET['id']}};
            const cart_id = $("#shoppingCartId_id").val();
            const person_officer_id = $("#choosedPersonOfficerId").val();

            const ChossenResAdd_id = $("#ChossenResAdd_id").val();

            const own_address_id = $("#ChossenServiceAdd_id").val();
            const forwarding_address_id = $("#ChossenForwarding_Add_id").val();
            const company_id = '';
            const position = $("#positionSelected").val();
            // noc section value
            const noc_os = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#F_ownership")
                .val() : '';
            const noc_vr = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#F_voting").val() :
                '';
            const noc_appoint = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#F_appoint")
                .val() : '';
            const noc_others = $("#nature-control-tab").closest('li').hasClass('d-none') === false && $("#F_other_sig")
                .hasClass('d-none') === false ? $("#F_other_sig_select_id").val() : 'No';

            const fci = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#f_radio_check_id")
                .val() : '';
            const fci_os = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#s_ownership")
                .val() : '';
            const fci_vr = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#s_voting").val() :
                '';
            const fci_appoint = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#s_appoint")
                .val() : '';
            const fci_others = $("#nature-control-tab").closest('li').hasClass('d-none') === false && $("#s_other_sig")
                .hasClass('d-none') === false ? $("#s_other_sig_select_id").val() : 'No';

            const tci = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#s_radio_check_id")
                .val() : '';
            const tci_os = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#t_ownership")
                .val() : '';
            const tci_vr = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#t_voting").val() :
                '';
            const tci_appoint = $("#nature-control-tab").closest('li').hasClass('d-none') === false ? $("#t_appoint")
                .val() : '';
            const tci_others = $("#nature-control-tab").closest('li').hasClass('d-none') === false && $("#t_other_sig")
                .hasClass('d-none') === false ? $("#t_other_sig_select_id").val() : 'No';
            // shareholder section value
            const sh_quantity = $("#share-holder-tab").closest('li').hasClass('d-none') === false ? $("#sh_quantity")
                .val() : '';
            const sh_currency = $("#share-holder-tab").closest('li').hasClass('d-none') === false ? $("#sh_currency")
                .val() : '';
            const sh_pps = $("#share-holder-tab").closest('li').hasClass('d-none') === false ? $("#sh_pps").val() : '';
            const perticularsTextArea = $("#share-holder-tab").closest('li').hasClass('d-none') === false ? $(
                "#perticularsTextArea").val() : '';
                const appointment_type = $("#appointment_type").val();

            const requiredFields = document.querySelectorAll('.blankCheckFinalSubmit');
            const requiredFieldsArr = [...requiredFields];

            let validation = 0;
            if (person_officer_id === '') {
                $("#validationErrorShow").removeClass('d-none')
                $("#validationErrorShow").html('You have to choose an Officer!')
                return validation++;
            }
            if (ChossenResAdd_id === '') {
                $("#validationErrorShow").removeClass('d-none')
                $("#validationErrorShow").html('You have to choose an Address for the Officer!')
                return validation++;
            }

            if ($(".service_add_choosed").hasClass('d-none') === false && own_address_id === '') {
                $("#validationErrorShow").removeClass('d-none')
                $("#validationErrorShow").html('You have to choose an Address!')
                return validation++;
            }

            if (position === '') {
                $("#validationErrorShow").removeClass('d-none')
                $("#validationErrorShow").html('You have to choose a Position!')
                return validation++;
            }

            if ($(".forwarding_add_after_buy_now_select").hasClass('d-none') === false && forwarding_address_id ===
                '') {
                $("#validationErrorShow").removeClass('d-none')
                $("#validationErrorShow").html('You have to choose a Forwarding Address!')
                return validation++;
            }

            if (validation === 0) {
                console.log('gg');
                $.ajax({
                    url: "{!! route('person-appointment-update') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        order_id,
                        cart_id,
                        appointment_id,
                        person_officer_id,
                        own_address_id,
                        forwarding_address_id,
                        company_id,
                        position,
                        noc_os,
                        noc_vr,
                        noc_appoint,
                        noc_others,
                        fci,
                        fci_os,
                        fci_vr,
                        fci_appoint,
                        fci_others,
                        tci,
                        tci_os,
                        tci_vr,
                        tci_appoint,
                        tci_others,
                        sh_quantity,
                        sh_currency,
                        sh_pps,
                        perticularsTextArea,
                        appointment_type
                    },
                    success: function(result) {
                        if (result) {

                            window.location.href ="{{$cancel_and_success_route}}"
                        }
                    },
                    error:function(result){
                        // console.log(result);
                        alert("Some error occured. Please try again later.");
                    }
                });
            }
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

        const AddMoreAddSave = function(ths) {

            const currentTab = $("#currentTab").val();

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
                        if (currentTab === 'details') {
                            $("#details_tab_new_address_form").html('')
                        }
                        if (currentTab === 'addressing') {
                            $("#address_tab_new_address_form").html('')
                        }
                        // if (result === 'details_resi') {

                        $("#detailsTabAddList_id").removeClass('d-none');
                        addListing();

                        $("#actionType").val('select');
                        scrollToTop()
                        // }
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
                    $("#detailsTabAddList_id").addClass('d-none');
                    $("#actionType").val('add');
                    if (currentTab === 'details') {
                        $("#details_tab_new_address_form").html(data)
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

            // OFFICER BACK
            if (currentTab === 'officer') {
                $('#position-tab').addClass('active');
                $('#position').addClass('active show');

                $('#officer-tab').removeClass('active');
                $('#officer').removeClass('active show');

                $('#currentTab').val('position')

                $("#cancelBtn").removeClass('d-none');
                $("#bckButton").addClass('d-none');
            }

            // DETAILS BACK
            if (currentTab === 'details' && addressTypeChoosed === '') {
                $('#details-tab').removeClass('active');
                $('#details').removeClass('active show');

                // $('#officer-tab').addClass('active');
                // $('#officer').addClass('active show');
                $('#position-tab').addClass('active');
                $('#position').addClass('active show');
                $('#currentTab').val('position')
                $("#cancelBtn").removeClass('d-none');
                $("#bckButton").addClass('d-none')
            }

            // ADDRESSING BACK
            if (currentTab === 'addressing' && addressTypeChoosed === '') {
                $('#details-tab').addClass('active');
                $('#details').addClass('active show');

                $('#addressing-tab').removeClass('active');
                $('#addressing').removeClass('active show');

                $('#currentTab').val('details')
            }

            // NATURE OF CONTROL BACK
            if (currentTab === 'nature-control' && addressTypeChoosed === '') {
                $('#nature-control-tab').removeClass('active');
                $('#nature-control').removeClass('active show');

                // $('#addressing-tab').addClass('active');
                // $('#addressing').addClass('active show');

                // $('#currentTab').val('addressing')

                $('#details-tab').addClass('active');
                $('#details').addClass('active show');
                $('#currentTab').val('details')
            }

            // SHARE HOLDER BACK
            if (currentTab === 'share-holder' && addressTypeChoosed === '') {

                if ($("#nature-control-tab").closest('li').hasClass('d-none')) {
                    $('#share-holder-tab').removeClass('active');
                    $('#share-holder').removeClass('active show');

                    $('#details-tab').addClass('active');
                    $('#details').addClass('active show');
                    $('#currentTab').val('details')
                    // $('#addressing-tab').addClass('active');
                    // $('#addressing').addClass('active show');

                    // $('#currentTab').val('addressing')
                } else {
                    $('#share-holder-tab').removeClass('active');
                    $('#share-holder').removeClass('active show');

                    $('#nature-control-tab').addClass('active');
                    $('#nature-control').addClass('active show');

                    $('#currentTab').val('nature-control')
                }
            }

            if (currentTab === 'details' && addressTypeChoosed === 'residential' && actionType === '') {
                $("#detailsTabLandingPage_id").removeClass('d-none');
                $("#theNextBtn").removeClass('d-none');
                $("#detailsTabAddList_id").addClass('d-none');

                $('#myTab').removeClass('d-none')
                $("#addressTypeChoosed").val('');
            }

            // DETAILS SECTION
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

                // $("#detailsTabLandingPage_id").addClass('d-none');
                $('#myTab').addClass('d-none')
                // $('.hideEditmyTab').addClass('d-none')

                $("#details_tab_new_address_form").html('')

                $("#detailsTabAddList_id").removeClass('d-none');
            }

            // ADDRESS SECTION
            if (currentTab === 'addressing' && actionType === 'select') {
                $("#addressTypeChoosed").val('')
                $("#actionType").val('')

                $("#serviceAddLandingSection").removeClass('d-none');
                $('#myTab').removeClass('d-none')
                $("#theNextBtn").removeClass('d-none');

                $("#detailsTabAddList_id").addClass('d-none');
            }

            if (currentTab === 'addressing' && actionType === 'edit') {

                $("#actionType").val('select')

                $(".edit_from").addClass('d-none')
                $("#editFormAjaxLoadAddressSection").html('')

                $("#detailsTabAddList_id").removeClass('d-none');
            }

            if (currentTab === 'addressing' && actionType === 'add') {
                $("#actionType").val('select')

                $('#myTab').addClass('d-none')

                $("#address_tab_new_address_form").html('')

                $("#detailsTabAddList_id").removeClass('d-none');
            }

            scrollToTop()
        }

        function gotToBusinessAddressPage() {
            window.location.href = "{!! route('choose-address-business', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'business-address']) !!}"
        }

        function chooseAddRess(type, action) {
            $("#detailsTabAddList_id").removeClass('d-none');

            $("#myTab").addClass('d-none');
            $("#detailsTabLandingPage_id").addClass('d-none');
            $("#theNextBtn").addClass('d-none');

            $("#addressTypeChoosed").val(type);
            $("#actionType").val(action);

            scrollToTop()
        }

        function chooseAdd(type) {
            $("#detailsTabAddList_id").removeClass('d-none');
            // $('.hideEdit').addClass('d-none');

            $("#serviceAddLandingSection").addClass('d-none');
            $("#myTab").addClass('d-none');
            $("#theNextBtn").addClass('d-none');

            $("#addressTypeChoosed").val(type)
            $("#actionType").val('select')
            if(type=="forwarding")
            {
                $("#forwarding_address_text").removeClass('d-none')
            }else{
                $("#forwarding_address_text").addClass('d-none')
            }
            scrollToTop()
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

        const choosedOfficer = function(id) {
            const offValId = $(`.offValId_${id}`).val();
            const offValtitle = $(`.offValtitle_${id}`).val();
            const offValdob_day = $(`.offValdob_day_${id}`).val();
            // const offValdob_month = $(`.offValdob_month_${id}`).val();
            // const offValdob_year = $(`.offValdob_year_${id}`).val();
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
            $('#choosedPersonOfficerId').val(offValId);
            $('#person_tittle_id').val(offValtitle);
            $('#person_bday_id').val(offValdob_day);
            $('#person_fname_id').val(offValfirst_name);
            $('#person_lname_id').val(offVallast_name);
            $('#person_national_id').val(offValnationality);
            $('#person_occupation_id').val(offValoccupation);

            $('#ChossenResAdd_id').val(offValadd_id);


            $('#person_aqone_id').val(offValauthenticate_one);
            $('#person_aqone_ans_id').val(offValauthenticate_one_ans);
            $('#person_aqtwo_id').val(offValIdauthenticate_two);
            $('#person_aqtwo_ans_id').val(offValIdauthenticate_two_ans);
            $('#person_aqthree_id').val(offValIdauthenticate_three);
            $('#person_aqthree_ans_id').val(offValIdauthenticate_three_ans);

            $('#choosedPersonOfficerId').val(offValId)
            $('#currentTab').val('details')

            const requiredFields = document.querySelectorAll('.blankCheck');
            const requiredFieldsArr = [...requiredFields];

            requiredFieldsArr.forEach(el => {
                el.classList.remove('validation');
                el.nextElementSibling.classList.add('d-none');
            });

            $('#person_bday_id').removeClass('validation')
            $('#person_bday_id').next('div').addClass('d-none');
            $(".rsidential-address-info").removeClass('validation')
            $("#residentialAddrValidation").addClass('d-none')
            $('#AuthValidationError').addClass('d-none')

            // console.log(offValadd_id);

            if (offValadd_id == '') {
                $("#ChossenResAdd").html('');
            } else {
                $.ajax({
                    url: "{!! route('selected-address') !!}",
                    type: "get",
                    data: {
                        offValadd_id,
                    },
                    success: function(data) {
                        $("#ChossenResAdd").html(data);
                        $("#ChossenResAdd").removeClass('d-none');
                        $(".res_choose_another_cl").removeClass('d-none');

                        $(".res_choose_one_cl").addClass('d-none');
                    }
                });
            }

            addNewOfficer('id');
            scrollToTop()
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

            scrollToTop()

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
            $('#person_fname_id').val('');
            $('#person_lname_id').val('');
            $('#person_national_id').val('72');
            $('#person_occupation_id').val('');

            $('#ChossenResAdd_id').val('');
            $('#person_aqone_id').val("Mother’s Maiden Name");
            $('#person_aqone_ans_id').val('');
            $('#person_aqtwo_id').val("Father's Forename");
            $('#person_aqtwo_ans_id').val('');
            $('#person_aqthree_id').val('Town Of Birth');
            $('#person_aqthree_ans_id').val('');

            $('#choosedPersonOfficerId').val('')
            $('#ChossenResAdd').html('')

            $(".res_choose_another_cl").addClass('d-none');
            $(".res_choose_one_cl").removeClass('d-none');

            // Making the add section validagion marking free.
            const requiredFields = document.querySelectorAll('.blankCheck');
            const requiredFieldsArr = [...requiredFields];

            requiredFieldsArr.forEach(el => {
                el.classList.remove('validation');
                el.nextElementSibling.classList.add('d-none');
            });

            $('#person_bday_id').removeClass('validation')
            $('#person_bday_id').next('div').addClass('d-none');
            $(".rsidential-address-info").removeClass('validation')
            $("#residentialAddrValidation").addClass('d-none')
            $('#AuthValidationError').addClass('d-none')

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

        // CURRENT TAB POSITION
        const currentTab = function(tabName) {
            $('#currentTab').val(tabName)
            if (tabName === 'position') {
                $("#bckButton").addClass('d-none')
                $("#cancelBtn").removeClass('d-none')
            } else {
                $("#cancelBtn").addClass('d-none')
                $("#bckButton").removeClass('d-none')

            }
        }

        //To convert the value to decimal point
        var conertToDecimal = function(ths) {
            if (ths.val() === '') {
                ths.val('1.00');
                return false
            }
            var num = parseFloat(ths.val());
            var cleanNum = num.toFixed(2);
            ths.val(cleanNum);
        };

        // Only for number input.
        function number_field($this) {
            $this.value = $this.value
                .replace(/[^0-9.]/g, "")
                .replace(/(\..*?)\..*/g, "$1");
        }

        // THE NEXT BUTTON FUNCTIONS STARTS
        const checkConsentOrNot = function() {
            scrollToTop()

            // Details to Officer Tab Movement starts.
            if ($('#appointmentType').val() === 'person' && $('#currentTab').val() === 'details') {
                const order_id = {{$_GET['order']}};
                const ChossenResAdd_id = $('#ChossenResAdd_id').val();
                const shoppingCartId = $('#shoppingCartId_id').val();
                const personOfficerEditId = $('#personOfficerEditId').val();
                const person_tittle = $('#person_tittle_id').val();
                const person_bday = $('#person_bday_id').val();
                const person_fname = $('#person_fname_id').val();
                const person_national = $('#person_national_id').val();
                const person_lname = $('#person_lname_id').val();
                const person_occupation = $('#person_occupation_id').val();

                const person_aqone = $('#person_aqone_id').val();
                const person_aqone_ans = $('#person_aqone_ans_id').val();
                const person_aqtwo = $('#person_aqtwo_id').val();
                const person_aqtwo_ans = $('#person_aqtwo_ans_id').val();
                const person_aqthree = $('#person_aqthree_id').val();
                const person_aqthree_ans = $('#person_aqthree_ans_id').val();

                const legal_name = $('#legal_name').val();
                const uk_registered = $('input[name="uk_registered"]:checked').val();
                console.log(uk_registered)
                const registration_number = $('#registration_number').val();
                const place_registered = $('#place_registered').val();
                const registry_held = $('#registry_held').val();
                const law_governed = $('#law_governed').val();
                const legal_form = $('#legal_form').val();

                const requiredFields = document.querySelectorAll('.blankCheck');
                const requiredFieldsArr = [...requiredFields];

                let validation = 0;

                // Date validation section starts--------------------------------->
                // Get the selected date from the input field
                // var selectedDate = new Date(person_bday);

                // console.log(selectedDate)
                // // Get the current date
                // var currentDate = new Date();

                // // Calculate the difference in milliseconds
                // var timeDifference = currentDate - selectedDate;

                // var yearsDifference = timeDifference / (1000 * 60 * 60 * 24 * 365.25);

                // if (selectedDate == 'Invalid Date' || yearsDifference < 16) {
                //     $('#person_bday_id').addClass('validation')
                //     $('#person_bday_id').next('div').removeClass('d-none');

                //     validation++;
                // } else {

                //     $('#person_bday_id').removeClass('validation')
                //     $('#person_bday_id').next('div').addClass('d-none');
                // }
                // Date validation section ends-------------------------

                // Authentication Section Validation starts------------------------>
                if ($("#authenticationSection").hasClass('d-none') !== true) {
                    if (person_aqone === person_aqtwo || person_aqtwo === person_aqthree || person_aqthree ===
                        person_aqone) {
                        $('#AuthValidationError').removeClass('d-none')
                        validation++;
                    } else {
                        $('#AuthValidationError').addClass('d-none')
                    }
                }
                // Authentication Section Validation ends---------------------------

                // Residential address section validation starts-------------------->
                if (ChossenResAdd_id === '') {
                    $(".rsidential-address-info").addClass('validation')

                    $("#residentialAddrValidation").removeClass('d-none')
                    validation++;
                } else {
                    $(".rsidential-address-info").removeClass('validation')
                    $("#residentialAddrValidation").addClass('d-none')
                }
                // Residential address section validation ends--------------------

                // Validation Section for blank fields starts------------------->
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
                // Validation Section for blank fields ends------------------------

                if (validation === 0) {
                    $.ajax({
                        url: "{!! route('save-person-officer') !!}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            order_id,
                            shoppingCartId,
                            personOfficerEditId,
                            person_tittle,
                            person_bday,
                            person_fname,
                            person_national,
                            person_lname,
                            person_occupation,
                            ChossenResAdd_id,
                            person_aqone,
                            person_aqone_ans,
                            person_aqtwo,
                            person_aqtwo_ans,
                            person_aqthree,
                            person_aqthree_ans,
                            legal_name,
                            legal_form,
                            law_governed,
                            registry_held,
                            place_registered,
                            registration_number,
                            uk_registered,
                        },
                        success: function(response) {
                            // console.log(response);
                            // console.log(response['id']);
                            // $('#details-tab').removeClass('active');
                            // $('#details').removeClass('active show');

                            // $('#addressing-tab').addClass('active');
                            // $('#addressing').addClass('active show');

                            // $('#currentTab').val('addressing')
                            // $("#choosedPersonOfficerId").val(response['id'])

                            $('#currentTab').val('addressing')
                            $("#choosedPersonOfficerId").val(response['id'])
                            $("#personOfficerEditId").val(response['id'])
                            $("#theNextBtn").click()
                            $('#details-tab').removeClass('active');
                            $('#details').removeClass('active show');
                        },
                    });
                }
                return false
            }
            // Details to Officer Tab Movement ends.

            // From Addressing to Forward Tabs starts====================>
            if ($('#appointmentType').val() === 'person' && $('#currentTab').val() === 'addressing') {

                if ($(".service_add_choosed").hasClass('d-none') === false && $("#ChossenServiceAdd_id").val() === '') {
                    $(".service_add_choosed").addClass('validation')
                    $("#serviceAddrValidation").removeClass('d-none')

                    return false
                } else {
                    $(".service_add_choosed").removeClass('validation')
                    $("#serviceAddrValidation").addClass('d-none')
                }


                if ($("#nature-control-tab").closest('li').hasClass('d-none') && $("#share-holder-tab").closest('li')
                    .hasClass('d-none')) {

                    databaseEntry();
                    return false
                }
                if ($("#nature-control-tab").closest('li').hasClass('d-none') === false) {
                    $('#nature-control-tab').addClass('active');
                    $('#nature-control').addClass('active show');

                    $('#addressing-tab').removeClass('active');
                    $('#addressing').removeClass('active show');

                    $('#currentTab').val('nature-control')
                    return false
                }
                if ($("#share-holder-tab").closest('li').hasClass('d-none') === false) {
                    $('#share-holder-tab').addClass('active');
                    $('#share-holder').addClass('active show');

                    $('#addressing-tab').removeClass('active');
                    $('#addressing').removeClass('active show');

                    $('#currentTab').val('share-holder')
                    return false
                }
                return false
            }
            // From Addressing to Forward Tab or Submit ends====================


            // From NoC to Forward Tabs starts==========================>
            if ($('#appointmentType').val() === 'person' && $('#currentTab').val() === 'nature-control') {
                if ($("#F_ownership").val() === '' || $("#F_voting").val() === '')
                {
                    $("#NOC_validation_error").removeClass('d-none')
                    return false;
                }
                if ($("#F_ownership").val() === '' && $("#F_voting").val() === '' && $("#F_appoint").val() === 'No' &&$("#F_other_sig_select_id").val() === 'No' &&
                    $("#s_ownership").val() === '' && $("#s_voting").val() === '' && $("#s_appoint").val() === 'No' &&$("#s_other_sig_select_id").val() === 'No' &&
                    $("#t_ownership").val() === '' && $("#t_voting").val() === '' && $("#t_appoint").val() === 'No' &&$("#t_other_sig_select_id").val() === 'No') {
                    $("#NOC_validation_error").removeClass('d-none')
                    return false
                }
                //auto select no if the radio button value is yes but no data altered
                if($("#f_radio_check_id").val()!="no" &&
                    $("#s_ownership").val() === '' && $("#s_voting").val() === '' && $("#s_appoint").val() === 'No' &&$("#s_other_sig_select_id").val() === 'No') {
                    $("#no").click();
                }
                if($("#s_radio_check_id").val()!="no"&& $("#t_ownership").val() === '' && $("#t_voting").val() === '' && $("#t_appoint").val() === 'No' &&$("#t_other_sig_select_id").val() === 'No') {
                    $("#no2").click();
                }
                $("#NOC_validation_error").addClass('d-none')

                if ($("#share-holder-tab").closest('li').hasClass('d-none')) {
                    databaseEntry();
                    return false
                }

                if ($("#share-holder-tab").closest('li').hasClass('d-none') === false) {
                    $('#nature-control-tab').removeClass('active');
                    $('#nature-control').removeClass('active show');

                    $('#share-holder-tab').addClass('active');
                    $('#share-holder').addClass('active show');

                    $('#currentTab').val('share-holder')
                    return false
                }
                return false
            }
            // From NoC to Forward Tabs ends==========================

            if ($('#appointmentType').val() === 'person' && $('#currentTab').val() === 'share-holder') {

                // if($("#positionSelected").val() === ''){

                //     return false
                // }

                if ($("#shareholderLandingPage").hasClass('d-none')) {
                    databaseEntry();
                    return false
                }

                const sh_quantity = $("#sh_quantity").val()
                const sh_currency = $("#sh_currency").val()
                const sh_pps = $("#sh_pps").val()

                const requiredFields = document.querySelectorAll('.sh_validation');
                const requiredFieldsArr = [...requiredFields];

                let validation = 0;
                requiredFieldsArr.forEach(el => {
                    if (el.value === '' || el.value === '0') {
                        el.classList.add('validation');
                        el.nextElementSibling.classList.remove('d-none');
                        return validation++
                    } else {
                        el.classList.remove('validation');
                        el.nextElementSibling.classList.add('d-none');
                    }
                });

                if (validation > 0) {
                    return false
                }

                $("#shareholderLandingPage").addClass('d-none')
                $("#shareholderListing").removeClass('d-none')


                $("#quantityVal").html(sh_quantity)
                $("#pps").html(sh_pps)
                $("#currencyVal").html(sh_currency)

                return false;
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

                $('#details-tab').addClass('active');
                $('#details').addClass('active show');

                const checkBoxArr = [...$(".checkBoxPos")];
                let posiArr = []
                checkBoxArr.forEach((el, i) => {
                    if (el.checked === true) {
                        if (i == checkBoxArr.length - 1) {
                            posiArr.push(el.value)
                        } else {
                            posiArr.push(el.value, )
                        }
                    }
                })
                $("#positionSelected").val(posiArr.join(', '))

                $('#currentTab').val('details')

                $("#cancelBtn").addClass('d-none');
                $("#bckButton").removeClass('d-none');
            }

        }
        // THE NEXT BUTTON FUNCTIONS ENDS

        function removeShareHolder() {
            $("#shareholderLandingPage").removeClass('d-none')

            $("#shareholderListing").addClass('d-none')

            $("#quantityVal").html('')
            $("#pps").html('')
            $("#currencyVal").html('')
            $("#perticularsTextArea").val('')
            $("#sh_quantity").val(1)
            $("#sh_currency").val('GBP')
            $("#sh_pps").val('1.00')
        }

        function shareholderTab() {
            $('.shareholderLinksCls').toggleClass('d-none');
            $('#authenticationSection').toggleClass('d-none');

            $('#person_aqone_ans_id').toggleClass('blankCheck');
            $('#person_aqtwo_ans_id').toggleClass('blankCheck');
            $('#person_aqthree_ans_id').toggleClass('blankCheck');
        }

        function pscTab() {
            $('.nocLinkCls').toggleClass('d-none');
        }


        const showPersonSection = function() {
            $('#currentTab').val('position')
            $(".main_section").hide();
            $('.person_section').removeClass('d-none');

            $('#appointmentType').val('person');
        }
        showPersonSection()
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
            $('#theNextBtn').removeClass('d-none')

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
                $("#serviceAddLandingSection").removeClass('d-none')
                $('.choose_another_cl').removeClass('d-none');

                $('.choose_one_cl').addClass('d-none');
            }

            if (addressTypeChoosed === 'forwarding') {

                if (type === 'listing') {
                    const house_number = $(`.${id}_add_house_number`).val();
                    const add_street = $(`.${id}_add_street`).val();
                    const add_locality = $(`.${id}_add_locality`).val();
                    const add_town = $(`.${id}_add_town`).val();
                    const user_county = $(`.${id}_user_county`).val();
                    const address_post_code = $(`.${id}_address_post_code`).val();
                    $('#ChossenForwarding_Add').removeClass('d-none');
                    $('#ChossenForwarding_Add').html(
                        `${house_number},${add_street},${add_locality},${add_town},${user_county},${address_post_code}`)
                } else {
                    $('#ChossenForwarding_Add').html(ths.value)

                }

                $('.forwarding_add_after_buy_now_select').removeClass('d-none')
                $("#serviceAddLandingSection").removeClass('d-none')
                $("#removeBuy").removeClass('d-none')
                $("#removeBuyCondition").addClass('d-none')


                $(".buyNowBtn").addClass('d-none')
                $(".service_add_choosed").addClass('d-none')
                $("#ChossenServiceAdd_id").removeClass('totalBlankCheck')

                $('#ChossenForwarding_Add_id').val(id)
                $("#ChossenServiceAdd_id").val('')
                $('#ChossenServiceAdd').html('');



            }

            $("#actionType").val('')
            $("#detailsTabAddList_id").addClass('d-none');
            $("#addressTypeChoosed").val('')
            scrollToTop()
            $("#serviceAddrValidation").addClass('d-none');//removing the error msg if address choosed
        }

        function removeBuy() {
            $("#forwarding_address_text").addClass('d-none')
            $(".service_add_choosed").removeClass('d-none')
            $(".buyNowBtn").removeClass('d-none')

            $('.forwarding_add_after_buy_now_select').addClass('d-none')
            $("#removeBuy").addClass('d-none')

            $('#ChossenForwarding_Add_id').val('');
            $('#ChossenServiceAdd').html('');
        }

        function buyAdd(type) {
            $("#detailsTabAddList_id").removeClass('d-none');
            // $('.hideEdit').removeClass('d-none');

            $("#serviceAddLandingSection").addClass('d-none');
            $("#myTab").addClass('d-none');
            $("#theNextBtn").addClass('d-none');

            $("#addressTypeChoosed").val(type)
            $("#actionType").val('select')
            if(type=="forwarding")
            {
                $("#forwarding_address_text").removeClass('d-none')
            }else{
                $("#forwarding_address_text").addClass('d-none')
            }
            scrollToTop()
        }

        $('.edit-addr').click(function(type) {
            $(".buyNowAfterSelectingAdd").hide();
            $('.edit_from').removeClass('d-none');
        });

        function editAddress(id) {
            // $('.hideEdit').addClass('d-none');
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
                        $('#detailsTabAddList_id').addClass('d-none');
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

            $(`#ChossenResAdd_id`).val(id);
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
        function bday_validation_onchange()
        {
            var person_bday = $('#person_bday_id').val();
            var selectedDate = new Date(person_bday);
            console.log(selectedDate)
            var currentDate = new Date()
            var timeDifference = currentDate - selectedDate;
            var yearsDifference = timeDifference / (1000 * 60 * 60 * 24 * 365.25);
            if (selectedDate == 'Invalid Date' || yearsDifference < 16) {
            $('#person_bday_id').addClass('validation')
            $('#person_bday_id').next('div').removeClass('d-none');
            } else {
            $('#person_bday_id').removeClass('validation')
            $('#person_bday_id').next('div').addClass('d-none');
            }
        }
        var get_mode_val = new URLSearchParams(window.location.search); //getting the url param and if  mode is edit_shareholder then selecting the tab automatically
        var mode = get_mode_val.get('mode');
         if (mode=="edit_shareholder") {
            currentTab('share-holder')
            $("#share-holder-tab").click()
            $("#share-holder-tab").removeAttr('data-toggle','tab')
            $("#share-holder-tab").removeAttr('href','#share-holder')
            // data-toggle="tab" href="#share-holder"
        //    var attrToggle= $("#share-holder-tab").attr('data-toggle','tab')
        //    var attrHref= $("#share-holder-tab").attr('herf','#share-holder')
        //    if(attrToggle&&attrHref)
        //    {

            // }


            // $("#shareholderLandingPage").addClass('d-none');
            // const sh_quantity = $("#sh_quantity").val()
            // const sh_currency = $("#sh_currency").val()
            // const sh_pps = $("#sh_pps").val()

            // $("#quantityVal").html(sh_quantity)
            // $("#pps").html(sh_pps)
            // $("#currencyVal").html(sh_currency)

            // $("#shareholderLandingPage").addClass('d-none')
            // $("#shareholderListing").removeClass('d-none')

            console.log(true)
         }else{
            console.log('attr');
            $("#share-holder-tab").removeAttr('data-toggle','tab')
            $("#share-holder-tab").removeAttr('href')
         }
    </script>
@endsection
