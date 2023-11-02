@extends('layouts.master')
@section('content')
    <style>
        .error {
            color: red;
        }

        .starred {
            color: red
        }
    </style>

    <div class="service-request" id="service-request">
        <div class="container">
            <div id="service-formDetails">
                <form id="serviceForm" name="serviceForm" novalidate="novalidate" method="POST"
                    action="{{ route('submit_company_service', [$slug, $id]) }}">
                    @csrf
                    <input type="hidden" name="action" value="save_service">
                    {{-- <input type="hidden" name="serviceID" value="1462"> --}}
                    <input type="hidden" name="service_name" value="Apostilled Documents Service">
                    <input type="hidden" name="service_price" value="99.99">
                    <input type="text" id="address_lookup_mode" name="address_lookup_mode">

                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                        <div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a
                                        id="steps-uid-0-t-0" class="service_heading" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0"><span
                                            class="current-info audible">current step: </span><span
                                            class="number  steps-uid-0-p-0-tick">1.</span> 1.Your Service</a></li>
                                <li role="tab" class="disabled" aria-disabled="true"><a class="service_heading" id="steps-uid-0-t-1"
                                        href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1"><span
                                            class="number  steps-uid-0-t-1-tick">2.</span> 2.Your Details</a></li>
                                <li role="tab" class="disabled last" aria-disabled="true"><a class="service_heading" id="steps-uid-0-t-2"
                                        href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2"><span
                                            class="number  steps-uid-0-t-2-tick">3.</span> 3.Confirmation</a></li>
                            </ul>
                        </div>
                        <div class="content clearfix">
                            <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">1.Your Service</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0"
                                class="body current" aria-hidden="false">
                                <div class="page-title">
                                    <h1>Apostilled Documents <span class="total_priceAmnt" style="font-size:24px;">Online
                                            Application</span></h1>
                                </div>
                                <hr>
                                <div class="pageContent">
                                    <p>Please complete our online application form and make your payment by credit or debit
                                        card. Within 3 to 5 working hours, we will send you an email confirming we have
                                        started working on your order, with a receipted invoice attached.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are
                                            required.</strong></p>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Documents to be Apostilled<span class="starred">*</span></strong></h5>
                                    <p>Please select which documents you require to be Apostilled:</p>
                                    <em id="apostill_doc_error" class="text-danger d-none">Please select atleast one
                                        document.</em>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="certificate_of_incorporation"
                                            value=" Certificate of Incorporation" required="" checked>
                                        <label class="form-check-label" for="certificate_of_incorporation">
                                            Certificate of Incorporation<span id="coi_price" class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="memorandum_articles"
                                            value=" Memorandum &amp; Articles of Association" required="">
                                        <label class="form-check-label" for="memorandum_articles">
                                            Memorandum &amp; Articles of Association<span id="coi_price"
                                                class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="IN01_form" value=" IN01 form from Companies House"
                                            required="">
                                        <label class="form-check-label" for="IN01_form">
                                            IN01 form from Companies House<span id="coi_price"
                                                class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="Good_Standing_Cert"
                                            value=" Certificate of Good Standing (CoGS)" required="">
                                        <label class="form-check-label" for="Good_Standing_Cert">
                                            Certificate of Good Standing (CoGS)<span id="coi_price"
                                                class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="option4" value=" Other documents1"
                                            required="">
                                        <label class="form-check-label" for="option4">
                                            Other documents1<span id="coi_price" class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                        <div class="mb-3 row option4_other" style="display:none;">
                                            <label for="option4_input" class="col-sm-2 col-form-label">Please specify<span
                                                    class="starred">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control-plaintext" id="option4_input"
                                                    name="option4_input" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="option5" value=" Other documents2"
                                            required="">
                                        <label class="form-check-label" for="option5">
                                            Other documents2<span id="coi_price" class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                        <div class="mb-3 row option5_other" style="display:none;">
                                            <label for="option5_input" class="col-sm-2 col-form-label">Please specify<span
                                                    class="starred">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control-plaintext" id="option5_input"
                                                    name="option5_input" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="option6" value=" Other documents3"
                                            required="">
                                        <label class="form-check-label" for="option6">
                                            Other documents3<span id="coi_price" class="doc_chk ">£{{$prices['doc_service_price']}}</span>
                                        </label>
                                        <div class="mb-3 row option6_other" style="display:none;">
                                            <label for="option6_input" class="col-sm-2 col-form-label">Please specify<span
                                                    class="starred">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control-plaintext" id="option6_input"
                                                    name="option6_input" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Please note: </strong>Any items specified under 'Other documents' above must
                                        be provided by you. These can be sent to us by post at the address below.</p>
                                    <p>FormationsHunt <br>Apostille Department <br>7, Thurlow Gardens ,<br> Wembley ,
                                        Middlesex , <br>HA0 2AH , <br>United Kingdom</p>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">
                                    <h5><strong>Select country</strong></h5>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlInput1" class="form-label">Country<span
                                                    class="starred">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example"
                                                name="country" id="country" required="">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $country->id == 254 ? 'selected' : '' }}>{{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Delivery Options<span class="starred">*</span></strong></h5>
                                    <p>Please specify your chosen method for delivery of your service:</p>
                                    <h5><strong>UK &amp; International Deliveries</strong></h5>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="rm_uk" value="rm_uk" required="" checked>
                                        <label class="form-check-label" for="rm_uk">
                                            Royal Mail Recorded Delivery<span id="od3_price" class="doc_chk ">Free</span>
                                        </label>
                                        <input type="hidden" name="rm_uk" value="Royal Mail Recorded Delivery">
                                        <input type="hidden" name="rm_uk_price" value="{{$prices['royal_mail']}}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="courier_uk" value="courier_uk" required="">
                                        <label class="form-check-label" for="courier_uk">
                                            Courier (next business day)<span id="od3_price" class="doc_chk ">£{{$prices['courier']}}</span>
                                        </label>
                                        <input type="hidden" name="courier_uk" value="Courier (next business day)">
                                        <input type="hidden" name="courier_uk_price" value="{{$prices['courier']}}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="rm_int" value="rm_int" required="">
                                        <label class="form-check-label" for="rm_int">
                                            Royal Mail International Tracked &amp; Signed* (5 to 15 business days)<span
                                                id="od3_price" class="doc_chk ">£{{$prices['royal_mail_international']}}</span>
                                        </label>
                                        <input type="hidden" name="rm_int"
                                            value="Royal Mail International Tracked &amp; Signed* (5 to 15 business days)">
                                        <input type="hidden" name="rm_int_price" value="{{$prices['royal_mail_international']}}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="courier_int" value="courier_int" required="">
                                        <label class="form-check-label" for="courier_int">
                                            International Courier (1 to 5 business days)<span id="od3_price"
                                                class="doc_chk ">£{{$prices['international_courier']}}</span>
                                        </label>
                                        <input type="hidden" name="courier_int"
                                            value="International  Courier (1 to 5 business days)">
                                        <input type="hidden" name="courier_int_price" value="{{$prices['international_courier']}}">
                                    </div>
                                </div>
                                <p><strong>Please note:</strong></p>
                                <ol>
                                    <li>The Apostille service is only available in the countries listed, who are all party
                                        to the 1961 Hague Convention.</li>
                                    <li>The International Tracked and Signed mail service is subject to availability. In
                                        some destination countries, a Signed For service may only be available.</li>

                                </ol>
                                <hr>
                                <div class="total_priceAmnt" style="font-size:24px;margin-bottom:15px;">Online Application
                                </div>
                                <input type="hidden" name="allPriceAmnt" id="allPriceAmnt" value="">
                                <input type="hidden" name="totalVatAmount" id="totalVatAmount" value="">
                                <input type="hidden" name="totalGrandAmount" id="totalGrandAmount" value="">


                                <div class="actions clearfix">
                                    <ul role="menu" aria-label="Pagination">
                                        <li aria-hidden="false" aria-disabled="false"><button role="menuitem"
                                                type="button" id="next_step_1" class="btn btn-primary">Next</button>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <h3 id="steps-uid-0-h-1" tabindex="-1" class="title">2.Your Details</h3>
                            <section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1"
                                class="body" aria-hidden="true" style="display: none;">
                                <style type="text/css">
                                    #post_address_blk {
                                        width: 95%;
                                        height: 400px;
                                    }

                                    h5 {
                                        color: #87cb28 !important;
                                    }
                                </style>
                                <div class="page-title">

                                    <h1>Apostilled Documents Service <span class="total_priceAmnt"
                                            style="font-size:24px;">Online Application</span></h1>

                                </div>

                                <hr>

                                <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are
                                        required.</strong></p>

                                <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">

                                    <h5><strong>Your Details</strong></h5>

                                    <p>Please provide details of yourself:</p>

                                    <div class="mb-3 row">

                                        <label for="first_name" class="col-sm-3 col-form-label">First Name<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="first_name" id="first_name" value="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="last_name" class="col-sm-3 col-form-label">Last Name<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="last_name" id="last_name" value="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="phone_no" class="col-sm-3 col-form-label">Telephone Nr<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="tel" class="form-control required_yourdetails"
                                                name="phone_no" id="phone_no" value="" required=""
                                                maxlength="10" onkeyup="phone_no_validation(this)">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="email_addr" class="col-sm-3 col-form-label">Email Address<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="email_addr" id="email_addr" value="" required="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="confm_email_addr" class="col-sm-3 col-form-label">Confirm Email
                                            Address<span class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="confm_email_addr" id="confm_email_addr" value=""
                                                required="">

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">

                                    <h5><strong>Your Company Information</strong></h5>

                                    <p>Please provide details of your company:</p>

                                    <div class="mb-3 row">

                                        <label for="company_name" class="col-sm-3 col-form-label">Your Company
                                            Name</label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control " name="company_name"
                                                id="company_name" value="" required="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="company_number" class="col-sm-3 col-form-label">Your Company
                                            Number</label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control" name="company_number"
                                                id="company_number" value="" required="">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">
                                    <h5><strong>Your Address</strong></h5>
                                    <p>Please enter your correspondence address:</p>
                                    <div class="mb-3 row">

                                        <div class="col-md-3"><label for="uk_postal_code" class="col-form-label">UK
                                                Postcode Lookup:</label></div>

                                        <div class="col-sm-9 input-group w-auto">

                                            <input type="text" class="form-control" name="uk_postal_code"
                                                id="uk_postal_code" value="">

                                            <button type="button" class="input-group-text btn btn-primary"
                                                id="own_find_address_btn" onclick="find_address('own')"
                                                style="padding:8px;">Find Address</button>
                                            <div class="loader" id="loader" style="display:none;"><img
                                                    src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/loader.gif"
                                                    style="width:50px;"></div>
                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="street" class="col-sm-3 col-form-label">Name/Company <span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="name_or_company" id="name_or_company" value="">

                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label for="street" class="col-sm-3 col-form-label ">Address Line 1 <span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="address_line_1" id="address_line_1"
                                                value="">

                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label for="street" class="col-sm-3 col-form-label">Address Line 2 </label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control "
                                                name="ddress_line_2" id="address_line_2"
                                                value="">

                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label for="street" class="col-sm-3 col-form-label">House Name/Number <span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="house_no" id="house_no" value="">

                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label for="street" class="col-sm-3 col-form-label">Street <span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="street" id="street" value="">

                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label for="address2" class="col-sm-3 col-form-label">Locality <span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="locality" id="locality" value="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="town" class="col-sm-3 col-form-label">Town<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="town" id="town" value="" required="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="county" class="col-sm-3 col-form-label">County<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="county" id="county" value="" required="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="postal_code" class="col-sm-3 col-form-label">Postcode<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <input type="text" class="form-control required_yourdetails"
                                                name="postal_code" id="postal_code" value="" required="">

                                        </div>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="personal_country_addr" class="col-sm-3 col-form-label">Country<span
                                                class="starred">*</span></label>

                                        <div class="col-sm-8">

                                            <select class="form-select" aria-label="Default select example"
                                                name="personal_country_addr" id="personal_country_addr" required="">

                                                {{-- <option selected="">Select Country</option> --}}
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $country->id == 254 ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">

                                    <h5><strong>Your Invoice Address</strong></h5>

                                    <p>The name and address we will use to invoice you.</p>


                                    <p><strong>Is your invoice address the same as Your Address (above)?</strong></p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="invoice_addr"
                                            id="inlineCheckbox1" value="Yes" checked="">
                                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="invoice_addr"
                                            id="inlineCheckbox2" value="No">
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>

                                    <div id="invoice_addrblk" style="display:none;">

                                        <div class="mb-3 row">

                                            <div class="col-md-3"><label for="invoice_uk_postal_code"
                                                    class="col-form-label">UK Postcode Lookup:</label></div>

                                            <div class="col-sm-9 input-group w-auto">

                                                <input type="text" class="form-control" name="invoice_uk_postal_code"
                                                    id="invoice_uk_postal_code" value="">

                                                <button type="button" class="input-group-text btn btn-primary"
                                                    id="invoice_find_address_btn" onclick="find_address('invoice')"
                                                    id="basic-addon2" style="padding:8px;">Find Address</button>
                                                <div class="loader" id="loader1" style="display:none;"><img
                                                        src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/loader.gif"
                                                        style="width:50px;"></div>
                                            </div>

                                        </div>

                                        <div class="mb-3 row">

                                            <label for="street" class="col-sm-3 col-form-label">Name/Company <span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_name_or_company" id="invoice_name_or_company"
                                                    value="">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">

                                            <label for="street" class="col-sm-3 col-form-label">Address Line 1 <span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_address_line_1" id="invoice_address_line_1"
                                                    value="">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">

                                            <label for="street" class="col-sm-3 col-form-label">Address Line 2 </label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control "
                                                    name="invoice_address_line_2" id="invoice_address_line_2"
                                                    value="">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">

                                            <label for="street" class="col-sm-3 col-form-label">House Name/Number<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_house_no" id="invoice_house_no" value="">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">

                                            <label for="street" class="col-sm-3 col-form-label">Street<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_street" id="invoice_street" value="">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">

                                            <label for="address2" class="col-sm-3 col-form-label">Locality<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_locality" id="invoice_locality" value="">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">

                                            <label for="town" class="col-sm-3 col-form-label">Town<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_town" id="invoice_town" value="" required="">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">

                                            <label for="county" class="col-sm-3 col-form-label">County<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_county" id="invoice_county" value=""
                                                    required="">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">

                                            <label for="postal_code" class="col-sm-3 col-form-label">Postcode<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control invoice_address"
                                                    name="invoice_postal_code" id="invoice_postal_code" value=""
                                                    required="">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">

                                            <label for="personal_country_addr"
                                                class="col-sm-3 col-form-label">Country<span
                                                    class="starred">*</span></label>

                                            <div class="col-sm-8">

                                                <select class="form-select" aria-label="Default select example"
                                                    name="invoice_country" id="invoice_country" required="">

                                                    {{-- <option selected="">Select Country</option> --}}
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->id == 254 ? 'selected' : '' }}>{{ $country->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="actions clearfix">
                                    <ul role="menu" aria-label="Pagination">
                                        <li aria-hidden="false" aria-disabled="false"><button type="button"
                                                role="menuitem" id="previous_step_1"
                                                class="btn btn-primary">Previous</button></li>
                                        <li aria-hidden="false" aria-disabled="false"><button type="button"
                                                role="menuitem" id="next_step_2" class="btn btn-primary">Next</button>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <h3 id="steps-uid-0-h-2" tabindex="-1" class="title">3.Confirmation</h3>
                            <section id="steps-uid-0-p-2" role="tabpanel" aria-labelledby="steps-uid-0-h-2"
                                class="body" aria-hidden="true" style="display: none;">
                                <div class="page-title">
                                    <h1>Order Confirmation</h1>
                                </div>
                                <hr>
                                <p>Please check and confirm your order below by accepting the terms and conditions before
                                    proceeding to payment.</p>
                                <div id="order_blk">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Details</th>
                                                <th class="numeric">Price</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>

                                        <tbody id="order_blk_details">

                                        </tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr >
                                            <td class="bc-f0f0f0 br-top-left">&nbsp;</td>
                                            <td class="bc-f0f0f0" >Price excl. VAT</td>
                                            <td id="totals" class="numeric bc-f0f0f0" ></td>
                                            <td class="bc-f0f0f0 br-top-right">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="bc-f0f0f0">&nbsp;</td>
                                            <td class="bc-f0f0f0">VAT @ 20%</td>
                                            <td id="vat_totals" class="numeric bc-f0f0f0"></td>
                                            <td class="bc-f0f0f0">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="bc-f0f0f0">&nbsp;</td>
                                            <td class="bc-f0f0f0">Total for this Transaction</td>
                                            <td id="grand_totals" class="numeric bc-f0f0f0"></td>
                                            <td class="bc-f0f0f0">&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                                {{-- <div class="p-3 mb-3 mt-3">
                                    <p>Please create your account or login before proceed.</p>
                                    <ul class="login-ul d-flex">
                                        <li class="me-3">
                                            <input type="radio" class="btn-check" name="user-type" id="option1"
                                                value="register">
                                            <label class="btn btn-primary" for="option1">New Customers</label>
                                        </li>
                                        <li>
                                            <input type="radio" class="btn-check" name="user-type" id="option2"
                                                value="login">
                                            <label class="btn btn-primary" for="option2">Returning Customer</label>
                                        </li>
                                    </ul>
                                    <div class="row register-box mt-3" style="display:none;">
                                        <div class="col-md-12 mb-2">
                                            <label for="user-pass1" class="form-label">Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="user-pass1"
                                                name="user-pass" value="" disabled="disabled">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="userconpass" class="form-label">Confirm Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="userconpass"
                                                name="user-conpass" value="" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="row login-box mt-3" style="display:none;">
                                        <div class="col-md-12 mb-2">
                                            <label for="user-email" class="form-label">Email<span
                                                    class="starred">*</span></label>
                                            <input type="email" class="form-control w-50" id="user-email"
                                                name="user-email" value="" disabled="disabled">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="user-pass2" class="form-label">Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="user-pass2"
                                                name="user-pass" value="" disabled="disabled">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-8 p-3 d-block mb-3" style="margin-top:15px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" id="accept_terms"
                                            name="accept_terms" required="">
                                        <label class="form-check-label" for="accept_terms">
                                            I have read and accept the <a
                                                href="https://formationshunt.co.uk/terms-conditions/" class="link-primary"
                                                target="_blank">Terms and Conditions</a> &amp; <a
                                                href="https://formationshunt.co.uk/gdpr-privacy-policy/"
                                                class="link-primary" target="_blank">Privacy Policy</a>.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" id="provide_id"
                                            name="provide_id" required="">
                                        <label class="form-check-label" for="provide_id">
                                            I agree to provide the <a href="https://formationshunt.co.uk/id-requirements/"
                                                class="link-primary" target="_blank">Required ID</a>.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <span class="error d-none terms_error">Please accept the terms and conditions</span>
                                    </div>
                                </div>
                                <div class="actions clearfix">
                                    <ul role="menu" aria-label="Pagination">
                                        <li aria-hidden="false" aria-disabled="false"><button type="button"
                                                role="menuitem" id="previous_step_2"
                                                class="btn btn-primary">Previous</button></li>
                                        <li aria-hidden="false" aria-disabled="false"><button type="submmit"
                                                role="menuitem" id="Pay_now" class="btn btn-primary">Pay</button></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                                <li class="disabled" aria-disabled="true"><a href="#previous"
                                        role="menuitem">Previous</a></li>
                                <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a>
                                </li>
                                <li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Pay
                                        now</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // (function($) {
    //     $(function() {
    //         $(".wpcf7-countrytext").countrySelect({

    //         });
    //         $(".wpcf7-phonetext").intlTelInput({
    //             autoHideDialCode: false,
    //             autoPlaceholder: "off",
    //             nationalMode: false,
    //             separateDialCode: false,
    //             hiddenInput: "full_number",

    //         });

    //         $(".wpcf7-phonetext").each(function () {
    //             var hiddenInput = $(this).attr('name');
    //             //console.log(hiddenInput);
    //             $("input[name="+hiddenInput+"-country-code]").val($(this).val());
    //         });

    //         $(".wpcf7-phonetext").on("countrychange", function() {
    //             // do something with iti.getSelectedCountryData()
    //             //console.log(this.value);
    //             var hiddenInput = $(this).attr("name");
    //             $("input[name="+hiddenInput+"-country-code]").val(this.value);

    //         });$(".wpcf7-phonetext").on("keyup", function() {
    //                 var dial_code = $(this).siblings(".flag-container").find(".country-list li.active span.dial-code").text();
    //                 if(dial_code == "")
    //                 var dial_code = $(this).siblings(".flag-container").find(".country-list li.highlight span.dial-code").text();
    //                 var value   = $(this).val();
    //                 console.log(dial_code, value);
    //                 $(this).val(dial_code + value.substring(dial_code.length));
    //              });$(".wpcf7-countrytext").on("keyup", function() {
    //             var country_name = $(this).siblings(".flag-dropdown").find(".country-list li.active span.country-name").text();
    //             if(country_name == "")
    //             var country_name = $(this).siblings(".flag-dropdown").find(".country-list li.highlight span.country-name").text();

    //             var value   = $(this).val();
    //             //console.log(country_name, value);
    //             $(this).val(country_name + value.substring(country_name.length));
    //         });

    //     });
    // });
    function phone_no_validation(input)
        {

        var phoneNumber = $("#phone_no").val();
        phoneNumber = phoneNumber.replace(/^0\D*|\D/g, '');
        console.log(phoneNumber);
        $("#phone_no").val(phoneNumber);
        }
    $("document").ready(function() {

        function scrollToTopDynamic(val) {
            window.scrollTo(0, val);
        }

        function calc_vat_total(total) {
            var vat = (total*20)/100;
             vat = vat.toFixed(2);
            var grand_total = (parseFloat(total)) + (parseFloat(vat));
            $("#totals").html(`<strong>£${parseFloat(total).toFixed(2)}</strong>`)
            $("#vat_totals").html(`<strong>£${parseFloat(vat).toFixed(2)}</strong>`);
            $("#grand_totals").html(`<strong>£${parseFloat(grand_total).toFixed(2)}</strong>`);
            $("#totalGrandAmount").val(parseFloat(grand_total).toFixed(2));
            $("#totalVatAmount").val(parseFloat(vat).toFixed(2));

        }
        $("input[type='radio'][name='invoice_addr']").click(function() {
            if ($(this).val() == 'No') {
                $('#invoice_addrblk').show();
                $(".invoice_address").addClass('required_yourdetails')
            } else {
                $('#invoice_addrblk').hide();
                $(".invoice_address").next("span").remove();
                $(".invoice_address").css({
                    'border-color': '#ced4da'
                })
                $(".invoice_address").removeClass('required_yourdetails')
            }
        });
        $(".hasprice").change(function() {
            updatePrices();
        });
        updatePrices()

        function updatePrices() {
            var sum = 0.00;
            var coi = parseFloat({{$prices['doc_service_price']}});
            var ma = parseFloat({{$prices['doc_service_price']}});
            var in01 = parseFloat({{$prices['doc_service_price']}});
            var gs = parseFloat({{$prices['doc_service_price']}});
            var rmuk = parseFloat({{$prices['royal_mail']}});
            var courieruk = parseFloat({{$prices['courier']}});
            var rmint = parseFloat({{$prices['royal_mail_international']}});
            var courierint = parseFloat({{$prices['international_courier']}});

            if ($("#option4").is(":checked")) {
                $('.option4_other').show();
                $('#option4_input').addClass("required_m");
            } else {
                $('.option4_other').hide();
                $('#option4_input').removeClass("required_m");
                $('#option4_input').css("border", "1px solid #ced4da");
            }
            if ($("#option5").is(":checked")) {
                $('.option5_other').show();
                $('#option5_input').addClass("required_m");

            } else {
                $('#option5_input').removeClass("required_m");
                $('#option5_input').css("border", "1px solid #ced4da");
                $('.option5_other').hide();
            }
            if ($("#option6").is(":checked")) {
                $('.option6_other').show();
                $('#option6_input').addClass("required_m");

            } else {
                $('#option6_input').removeClass("required_m");
                $('#option6_input').css("border", "1px solid #ced4da");

                $('.option6_other').hide();
            }

            // tr = `<tr><td>Apostilled Documents</td><td></td><td></td></tr>`
            tr = '';
            if ($("#certificate_of_incorporation").is(":checked"))
                {sum += coi;
                tr+="<tr><td>Apostilled Documents</td><td>Certificate of incorporation</td><td>£" + parseFloat(coi).toFixed(2) + "</td></tr>";
                }
            if ($("#memorandum_articles").is(":checked"))
                {sum += ma;
                tr+="<tr><td>Apostilled Documents</td><td>Memorandum and Articles of Association</td><td>£" + parseFloat(ma).toFixed(2) + "</td></tr>";
                }
            if ($("#IN01_form").is(":checked"))
                {sum += in01;
                tr+="<tr><td>Apostilled Documents</td><td>IN01 form from Companies House</td><td>£" + parseFloat(in01).toFixed(2) + "</td></tr>";
                }
            if ($("#Good_Standing_Cert").is(":checked"))
                {sum += gs;
                tr+="<tr><td>Apostilled Documents</td><td>Certificate of Good Standing (CoGS)</td><td>£" + parseFloat(gs).toFixed(2) + "</td></tr>";
                }
            if ($("#option4").is(":checked"))
                {sum += coi;
                tr+="<tr><td>Apostilled Documents</td><td>" + $('#option4_input').val() + "</td><td>£" + parseFloat(coi).toFixed(2) + "</td></tr>";
                }
            if ($("#option5").is(":checked"))
                {sum += coi;
                tr+="<tr><td>Apostilled Documents</td><td>" + $('#option5_input').val() + "</td><td>£" + parseFloat(coi).toFixed(2) + "</td></tr>";
                }
            if ($("#option6").is(":checked"))
                {sum += coi;
                tr+="<tr><td>Apostilled Documents</td><td>" + $('#option6_input').val() + "</td><td>£" + parseFloat(coi).toFixed(2) + "</td></tr>";
                }
            if ($("#rm_uk").is(":checked"))
                {sum += rmuk;
                tr+="<tr><td>Delivery Options</td><td>Royal Mail Recorded DeliveryFree</td><td>£" + parseFloat(rmuk).toFixed(2) + "</td></tr>";
                }
            if ($("#courier_uk").is(":checked"))
                {sum += courieruk;
                tr+="<tr><td>Delivery Options</td><td>Courier (next business day)</td><td>£" + parseFloat(courieruk).toFixed(2) + "</td></tr>";
                }
            if ($("#rm_int").is(":checked"))
                {sum += rmint;
                tr+="<tr><td>Delivery Options</td><td>Royal Mail International Tracked & Signed* (5 to 15 business days)</td><td>£" + parseFloat(rmint).toFixed(2) + "</td></tr>";
                }
            if ($("#courier_int").is(":checked"))
            {
                sum += courierint;
                tr+="<tr><td>Delivery Options</td><td>International Courier (1 to 5 business days)</td><td>£" + parseFloat(courierint).toFixed(2) + "</td></tr>";
            }

            if (sum == 0)
            {
                $(".total_priceAmnt").text("Online Application");
            }
            else{
                $("#order_blk_details").html(tr);
                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
                calc_vat_total(sum);


            }

        }

        function validate_yourservice() {
            let required_check_error = true;
            $(".required_yourdetails").each(function() {
                if ($(this).val() == '') {
                    required_check_error = false;

                    $(this).css({
                        'border-color': 'red'
                    })
                    $(this).next("span").remove();
                    $(this).after(`<span class="error">This field is required </span>`);
                } else {
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': '#ced4da'
                    })
                }
            })
            if (required_check_error == false) {
                scrollToTopDynamic(200)
            }
            if($("#phone_no").val()!='')
            {
                let phone_no = $("#phone_no").val();
                if(phone_no.length!=10)
                {
                    required_check_error = false;
                    $("#phone_no").css({
                        'border-color': 'red'
                    })
                    $("#phone_no").next("span").remove();
                    $("#phone_no").after(`<span class="error">Please input valid phone number </span>`);
                scrollToTopDynamic(200)

                }else{
                    $("#phone_no").next("span").remove();
                    $("#phone_no").css({
                        'border-color': '#ced4da'
                    })
                }
            }

            return required_check_error;
        }

        function validate_yourservice_email() {
            let test_email = true;



            $(".required_yourdetails").each(function() {
                var field_name = $(this).attr('name')
                console.log(field_name)
                if (field_name == "confm_email_addr" || field_name == "email_addr") {
                    email = $(this).val();
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (emailPattern.test(email)) {
                        // Valid email address
                        $(this).next("span").remove();
                        $(this).css({
                            'border-color': '#ced4da'
                        })
                    } else {
                        test_email = false;
                        // Invalid email address
                        $(this).css({
                            'border-color': 'red'
                        })
                        $(this).after(`<span class="error">Please put a valid email</span>`);
                    }
                }
            });

            if (test_email == true) {
                let email1 = $("#email_addr").val();
                let confirm_email = $("#confm_email_addr").val();
                if (email1 != confirm_email) {
                    console.log
                    test_email = false
                    $("#confm_email_addr").css({
                        'border-color': 'red'
                    })
                    $("#confm_email_addr").next("span").remove();
                    $("#confm_email_addr").after(
                        `<span class="error">Email and confirm email does not match</span>`);
                    scrollToTopDynamic(300)

                }
            } else {
                scrollToTopDynamic(300)
            }
            return test_email;

        }
        //  apostill_section

        function validateApostilledDoc() {
            let apostilled_doc_error = true;
            $(".apostilled_one_required").each(function() {
                if ($(this).is(':checked') == true) {
                    apostilled_doc_error = false;
                }
            })
            if (apostilled_doc_error == true) {
                scrollToTopDynamic(300)
                $("#apostill_doc_error").removeClass("d-none");
            } else {
                $("#apostill_doc_error").addClass("d-none");
            }
            return apostilled_doc_error;
        }

        function apostilled_required_check() {
            let required_check_error = true;
            let id = ''
            $(".required_m").each(function() {
                console.log($(this).val())
                if ($(this).val() == '') {
                    required_check_error = false;
                    id = $(this).attr('id')
                    $("#" + id).css({
                        'border-color': 'red'
                    })
                }
            })
            if (required_check_error == false) {
                scrollToTopDynamic(300)
            }
            return required_check_error;
        }
        //end apostill_section


        $("#next_step_1").click(function() {
            if ((validateApostilledDoc() == false) && (apostilled_required_check() == true)) {
                $("#steps-uid-0-p-0").hide();
                $(".service_heading").css({ //normal
                    "background": "#4f5c70",
                    "color": "white",
                    "cursor": "default",
                    "font-size": "18px"
                });
                $(".steps-uid-0-t-0-tick").css({
                    "color": "#4f5c70!important",
                })
                $("#steps-uid-0-p-1").show();

                $("#steps-uid-0-t-1").css({ //active
                    "background": "#313C4E",
                    "color": "#79B42E",
                    "cursor": "default",
                    "font-size": "18px!important"
                });
                $("#steps-uid-0-h-0").html("2.Your Details")
                scrollToTopDynamic(200)
            }

        })
        $("#previous_step_1").click(function() {

            $(".service_heading").css({ //normal
                "background": "#4f5c70",
                    "color": "white",
                    "cursor": "default",
                    "font-size": "15px!important"
                });
                $("#steps-uid-0-t-0").css({ //active
                    "background": "#313C4E",
                    "color": "#79B42E",
                    "cursor": "default",
                    "font-size": "18px!important"
                });
            $("#steps-uid-0-p-0").show();
            $("#steps-uid-0-p-1").hide();
            $("#steps-uid-0-h-0").html("1.Your Service")


        })
        $("#next_step_2").click(function() {
            if ((validate_yourservice() == true) && (validate_yourservice_email() == true)) {
                $("#steps-uid-0-p-1").hide();
                $("#steps-uid-0-p-2").show();
                $("#steps-uid-0-h-0").html("3.Confirmation")

                $(".service_heading").css({ //normal
                "background": "#4f5c70",
                    "color": "white",
                    "cursor": "default",
                    "font-size": "15px"
                });
                $("#steps-uid-0-t-2").css({ //active
                    "background": "#313C4E",
                    "color": "#79B42E",
                    "cursor": "default",
                    "font-size": "18px!important"
                });

            }
        })
        $("#previous_step_2").click(function() {
            $(".service_heading").css({ //normal
                "background": "#4f5c70",
                    "color": "white",
                    "cursor": "default",
                    "font-size": "15px!important"
                });
                $("#steps-uid-0-t-1").css({ //active
                    "background": "#313C4E",
                    "color": "#79B42E",
                    "cursor": "default",
                    "font-size": "18px!important"
                });
            $("#steps-uid-0-p-1").show();
            $("#steps-uid-0-p-2").hide();
            $("#steps-uid-0-h-0").html("2.Your Details")
        })


        $("#serviceForm").submit(function(e){
            let check_terms = $("#accept_terms").is(":checked")
            if (($("#accept_terms").is(":checked")==true)&&($("#provide_id").is(":checked")==true)) {
                $(".terms_error").addClass('d-none')
                e.submit()
            }else{
                e.preventDefault()
                $(".terms_error").removeClass('d-none')

            }
        })

        $(".btn-close").click(function() {
            $("#exampleModalCenterAddress").hide();
        })
    })




    function find_address($val) {
        $("#address_lookup_mode").val($val);

        if ($val == 'own') {
            var error = false;
            var post_code = $("#uk_postal_code").val();

            if (post_code != "") {
                $("#postal_code").val(post_code);
                error = false;

            } else {
                alert('Please enter post code');
                error = true;
            }
            if (error == false) {
                $('#own_find_address_btn').html('Please Wait...');
                $.ajax({
                    url: "{!! route('find-address') !!}",
                    type: 'GET',
                    data: {
                        post_code: post_code
                    },
                    success: function(result) {
                        $('#own_find_address_btn').html('Find Address');
                        $("#exampleModalCenterAddress").show();
                        $("#post_address_blk").html(result);
                    },
                    error:function(result){
                        $('#own_find_address_btn').html('Find Address');
                        alert('Unable to get details from this pincode')
                    }
                });
            }
        } else {
            var invoice_error = false;
            var post_code = $("#invoice_uk_postal_code").val();

            if (post_code != "") {
                $("#invoice_postal_code").val(post_code);
                invoice_error = false;

            } else {
                alert('Please enter post code');
                invoice_error = true;
            }
            if (invoice_error == false) {
                $('#invoice_find_address_btn').html('Please Wait...');
                $.ajax({
                    url: "{!! route('find-address') !!}",
                    type: 'GET',
                    data: {
                        post_code: post_code
                    },
                    success: function(result) {
                        $('#invoice_find_address_btn').html('Find Address');
                        $("#exampleModalCenterAddress").show();
                        $("#post_address_blk").html(result);
                    },
                    error:function(result){
                        $('#invoice_find_address_btn').html('Find Address');
                        alert('Unable to get details from this pincode')
                    }
                });
            }
        }


    }

    function selectPostalAddrApp(val) {
        var value = val.split(',');
        if ($("#address_lookup_mode").val() == "own") {
            $("#house_no").val(value[0]);
            $("#street").val(value[1]);
            $("#town").val(value[2]);
            $("#county").val(value[3]);
            $("#exampleModalCenterAddress").hide();
        } else {
            $("#invoice_house_no").val(value[0]);
            $("#invoice_street").val(value[1]);
            $("#invoice_town").val(value[2]);
            $("#invoice_county").val(value[3]);
            $("#exampleModalCenterAddress").hide();
        }
    }
</script>
