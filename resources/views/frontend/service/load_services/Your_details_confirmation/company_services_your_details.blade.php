<h3 id="steps-uid-0-h-1" tabindex="-1" class="title">2.Your Details</h3>
<section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1" class="body" aria-hidden="true"
    style="display: none;">
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

        <h1>{{$service_name}} <span class="total_priceAmnt" style="font-size:24px;">Online
                Application</span></h1>

    </div>

    <hr>

    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are
            required.</strong></p>

    <div class="col-md-8 p-3 d-block mb-3 shadow" style="margin-top:15px;">

        <h5><strong>Your Details</strong></h5>

        <p>Please provide details of yourself:</p>

        <div class="mb-3 row">

            <label for="first_name" class="col-sm-3 col-form-label">First Name<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails name_test" name="first_name"
                    id="first_name" value="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="last_name" class="col-sm-3 col-form-label">Last Name<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails name_test" name="last_name"
                    id="last_name" value="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="phone_no" class="col-sm-3 col-form-label">Telephone Number<span class="starred">*</span></label>
            <div class="col-sm-2">
                @php
                    $codes = \App\Models\Phone_code::orderBy('phonecode','asc')->get()->pluck('phonecode')->toArray();
                    $codes = array_unique($codes)
                @endphp
                <select name="country_code" id="country_code" class="form-control">
                    @foreach ($codes as $code)
                    @if ($code!=0)
                    <option value="{{ $code }}" @if ($code==44)selected @endif >+{{ $code }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">

                <input type="tel" class="form-control required_yourdetails" name="phone_no" id="phone_no"
                    value="" required="" maxlength="10" onkeyup="phone_no_validation(this)">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="email_addr" class="col-sm-3 col-form-label">Email Address<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="email_addr" id="email_addr"
                    value="" required="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="confm_email_addr" class="col-sm-3 col-form-label">Confirm Email
                Address<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="confm_email_addr"
                    id="confm_email_addr" value="" required="">

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

                <input type="text" class="form-control name_test" name="company_name" id="company_name"
                    value="" required="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="company_number" class="col-sm-3 col-form-label">Your Company
                Number</label>

            <div class="col-sm-8">

                <input type="number" class="form-control name_test" name="company_number" id="company_number"
                    value="" required="">

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

                <input type="text" class="form-control" name="uk_postal_code" id="uk_postal_code"
                    value="">

                <button type="button" class="input-group-text btn btn-primary" id="own_find_address_btn"
                    onclick="find_address('own')" style="padding:8px;">Find Address</button>
                <div class="loader" id="loader" style="display:none;"><img
                        src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/loader.gif"
                        style="width:50px;"></div>
            </div>

        </div>

        <div class="mb-3 row">

            <label for="street" class="col-sm-3 col-form-label">Name/Company <span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails name_test" name="name_or_company"
                    id="name_or_company" value="">

            </div>

        </div>
        <div class="mb-3 row">

            <label for="street" class="col-sm-3 col-form-label ">Address Line 1 <span
                    class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="address_line_1"
                    id="address_line_1" value="">

            </div>

        </div>
        <div class="mb-3 row">

            <label for="street" class="col-sm-3 col-form-label">Address Line 2 </label>

            <div class="col-sm-8">

                <input type="text" class="form-control " name="address_line_2" id="address_line_2"
                    value="">

            </div>

        </div>
        <div class="mb-3 row">

            <label for="street" class="col-sm-3 col-form-label">House Name/Number <span
                    class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="house_no" id="house_no"
                    value="">

            </div>

        </div>
        <div class="mb-3 row">

            <label for="street" class="col-sm-3 col-form-label">Street <span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="street" id="street"
                    value="">

            </div>

        </div>
        <div class="mb-3 row">

            <label for="address2" class="col-sm-3 col-form-label">Locality <span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control " name="locality" id="locality"
                    value="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="town" class="col-sm-3 col-form-label">Town<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="town" id="town"
                    value="" required="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="county" class="col-sm-3 col-form-label">County<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="county" id="county"
                    value="" required="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="postal_code" class="col-sm-3 col-form-label">Postcode<span class="starred">*</span></label>

            <div class="col-sm-8">

                <input type="text" class="form-control required_yourdetails" name="postal_code" id="postal_code"
                    value="" required="">

            </div>

        </div>

        <div class="mb-3 row">

            <label for="personal_country_addr" class="col-sm-3 col-form-label">Country<span
                    class="starred">*</span></label>

            <div class="col-sm-8">

                <select class="form-select" aria-label="Default select example" name="personal_country_addr"
                    id="personal_country_addr" required="">

                    {{-- <option selected="">Select Country</option> --}}
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == 254 ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
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
            <input class="form-check-input" type="radio" name="invoice_addr" id="inlineCheckbox1" value="Yes"
                checked="">
            <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="invoice_addr" id="inlineCheckbox2" value="No">
            <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>

        <div id="invoice_addrblk" style="display:none;">

            <div class="mb-3 row">

                <div class="col-md-3"><label for="invoice_uk_postal_code" class="col-form-label">UK Postcode
                        Lookup:</label></div>

                <div class="col-sm-9 input-group w-auto">

                    <input type="text" class="form-control" name="invoice_uk_postal_code"
                        id="invoice_uk_postal_code" value="">

                    <button type="button" class="input-group-text btn btn-primary" id="invoice_find_address_btn"
                        onclick="find_address('invoice')" id="basic-addon2" style="padding:8px;">Find
                        Address</button>
                    <div class="loader" id="loader1" style="display:none;"><img
                            src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/loader.gif"
                            style="width:50px;"></div>
                </div>

            </div>

            <div class="mb-3 row">

                <label for="street" class="col-sm-3 col-form-label">Name/Company <span
                        class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address name_test"
                        name="invoice_name_or_company" id="invoice_name_or_company" value="">

                </div>

            </div>
            <div class="mb-3 row">

                <label for="street" class="col-sm-3 col-form-label">Address Line 1 <span
                        class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_address_line_1"
                        id="invoice_address_line_1" value="">

                </div>

            </div>
            <div class="mb-3 row">

                <label for="street" class="col-sm-3 col-form-label">Address Line 2 </label>

                <div class="col-sm-8">

                    <input type="text" class="form-control " name="invoice_address_line_2"
                        id="invoice_address_line_2" value="">

                </div>

            </div>
            <div class="mb-3 row">

                <label for="street" class="col-sm-3 col-form-label">House Name/Number<span
                        class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_house_no"
                        id="invoice_house_no" value="">

                </div>

            </div>
            <div class="mb-3 row">

                <label for="street" class="col-sm-3 col-form-label">Street<span class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_street"
                        id="invoice_street" value="">

                </div>

            </div>
            <div class="mb-3 row">

                <label for="address2" class="col-sm-3 col-form-label">Locality<span class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control " name="invoice_locality"
                        id="invoice_locality" value="">

                </div>

            </div>

            <div class="mb-3 row">

                <label for="town" class="col-sm-3 col-form-label">Town<span class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_town" id="invoice_town"
                        value="" required="">

                </div>

            </div>

            <div class="mb-3 row">

                <label for="county" class="col-sm-3 col-form-label">County<span class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_county"
                        id="invoice_county" value="" required="">

                </div>

            </div>

            <div class="mb-3 row">

                <label for="postal_code" class="col-sm-3 col-form-label">Postcode<span
                        class="starred">*</span></label>

                <div class="col-sm-8">

                    <input type="text" class="form-control invoice_address" name="invoice_postal_code"
                        id="invoice_postal_code" value="" required="">

                </div>

            </div>

            <div class="mb-3 row">

                <label for="personal_country_addr" class="col-sm-3 col-form-label">Country<span
                        class="starred">*</span></label>

                <div class="col-sm-8">

                    <select class="form-select" aria-label="Default select example" name="invoice_country"
                        id="invoice_country" required="">

                        {{-- <option selected="">Select Country</option> --}}
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $country->id == 254 ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

        </div>
    </div>

    <div class="actions clearfix d-flex justify-content-end">
        <ul role="menu" aria-label="Pagination" class="d-flex ">
            <li aria-hidden="false" aria-disabled="false"><button type="button" role="menuitem"
                    id="previous_step_1" class="btn btn-primary mr-2">Previous</button></li>
            <li aria-hidden="false" aria-disabled="false"><button type="button" role="menuitem" id="next_step_2"
                    class="btn btn-primary">Next</button>
            </li>
        </ul>
    </div>
</section>

<script>
    $(document).ready(function() {
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
    })
</script>
