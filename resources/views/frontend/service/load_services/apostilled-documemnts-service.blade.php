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
                    <input type="hidden" name="service_name" value="{{$service_name}}">
                    {{-- <input type="hidden" name="service_price" value="99.99"> --}}
                    <input type="text" id="address_lookup_mode" name="address_lookup_mode" hidden>

                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                        @include('frontend.service.load_services.header.company_services_header')

                        <div class="content clearfix">
                            <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">1.Your Service</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0"
                                class="body current" aria-hidden="false">
                                <div class="page-title">
                                    <h1>{{$service_name}} <span class="total_priceAmnt" style="font-size:24px;">Online
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
                                            Certificate of Incorporation<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['certificate_of_incorporation'] }}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="memorandum_articles"
                                            value=" Memorandum &amp; Articles of Association" required="">
                                        <label class="form-check-label" for="memorandum_articles">
                                            Memorandum &amp; Articles of Association<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['memo_and_articals'] }}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="IN01_form" value=" IN01 form from Companies House"
                                            required="">
                                        <label class="form-check-label" for="IN01_form">
                                            IN01 form from Companies House<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['in01_form'] }}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="Good_Standing_Cert"
                                            value=" Certificate of Good Standing (CoGS)" required="">
                                        <label class="form-check-label" for="Good_Standing_Cert">
                                            Certificate of Good Standing (CoGS)<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['certificate_of_good'] }}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice apostilled_one_required" type="checkbox"
                                            name="apostill_doc[]" id="option4" value=" Other documents1"
                                            required="">
                                        <label class="form-check-label" for="option4">
                                            Other documents1<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['other_doc'] }}</span>
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
                                            Other documents2<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['other_doc'] }}</span>
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
                                            Other documents3<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['other_doc'] }}</span>
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
                                        <input type="hidden" name="rm_uk_price" value="{{ $prices['royal_mail'] }}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="courier_uk" value="courier_uk" required="">
                                        <label class="form-check-label" for="courier_uk">
                                            Courier (next business day)<span id="od3_price"
                                                class="doc_chk ">£{{ $prices['courier'] }}</span>
                                        </label>
                                        <input type="hidden" name="courier_uk" value="Courier (next business day)">
                                        <input type="hidden" name="courier_uk_price" value="{{ $prices['courier'] }}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="rm_int" value="rm_int" required="">
                                        <label class="form-check-label" for="rm_int">
                                            Royal Mail International Tracked &amp; Signed* (5 to 15 business days)<span
                                                id="od3_price"
                                                class="doc_chk ">£{{ $prices['royal_mail_international'] }}</span>
                                        </label>
                                        <input type="hidden" name="rm_int"
                                            value="Royal Mail International Tracked &amp; Signed* (5 to 15 business days)">
                                        <input type="hidden" name="rm_int_price"
                                            value="{{ $prices['royal_mail_international'] }}">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="delivery_options"
                                            id="courier_int" value="courier_int" required="">
                                        <label class="form-check-label" for="courier_int">
                                            International Courier (1 to 5 business days)<span id="od3_price"
                                                class="doc_chk ">£{{ $prices['international_courier'] }}</span>
                                        </label>
                                        <input type="hidden" name="courier_int"
                                            value="International  Courier (1 to 5 business days)">
                                        <input type="hidden" name="courier_int_price"
                                            value="{{ $prices['international_courier'] }}">
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
                                <div class="total_priceAmnt d-flex justify-content-end align-items-center float-none" style="font-size:24px;margin-bottom:15px;">Online Application
                                </div>
                                <input type="hidden" name="allPriceAmnt" id="allPriceAmnt" value="">
                                <input type="hidden" name="totalVatAmount" id="totalVatAmount" value="">
                                <input type="hidden" name="totalGrandAmount" id="totalGrandAmount" value="">


                                <div class="actions clearfix d-flex justify-content-end">
                                    <ul role="menu" aria-label="Pagination">
                                        <li aria-hidden="false" aria-disabled="false"><button role="menuitem"
                                                type="button" id="next_step_1" class="btn btn-primary">Next</button>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            @include('frontend.service.load_services.your_details_confirmation.company_services_confirmation')
                            @include('frontend.service.load_services.your_details_confirmation.company_services_your_details')
                        </div>
                        {{-- <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                                <li class="disabled" aria-disabled="true"><a href="#previous"
                                        role="menuitem">Previous</a></li>
                                <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a>
                                </li>
                                <li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Pay
                                        now</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <input type="text" hidden id="invoice_data" name="invoice_data">
                </form>
            </div>
        </div>
    </div>

    <x-find_address_service/>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('frontend/assets/js/service_yourdetails.js')}}" type="text/javascript"></script>
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

    $("document").ready(function() {

        function scrollToTopDynamic(val) {
            window.scrollTo(0, val);
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
            var coi = parseFloat({{ $prices['certificate_of_incorporation'] }});
            var ma = parseFloat({{ $prices['memo_and_articals'] }});
            var in01 = parseFloat({{ $prices['in01_form'] }});
            var gs = parseFloat({{ $prices['certificate_of_good'] }});
            var other_doc = parseFloat({{ $prices['other_doc'] }});

            var rmuk = parseFloat({{ $prices['royal_mail'] }});
            var courieruk = parseFloat({{ $prices['courier'] }});
            var rmint = parseFloat({{ $prices['royal_mail_international'] }});
            var courierint = parseFloat({{ $prices['international_courier'] }});

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
            if ($("#certificate_of_incorporation").is(":checked")) {
                sum += coi;
                tr += "<tr><td>Apostilled Documents</td><td>Certificate of incorporation</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }
            if ($("#memorandum_articles").is(":checked")) {
                sum += ma;
                tr += "<tr><td>Apostilled Documents</td><td>Memorandum and Articles of Association</td><td>£" +
                    parseFloat(ma).toFixed(2) + "</td></tr>";
            }
            if ($("#IN01_form").is(":checked")) {
                sum += in01;
                tr += "<tr><td>Apostilled Documents</td><td>IN01 form from Companies House</td><td>£" +
                    parseFloat(in01).toFixed(2) + "</td></tr>";
            }
            if ($("#Good_Standing_Cert").is(":checked")) {
                sum += gs;
                tr += "<tr><td>Apostilled Documents</td><td>Certificate of Good Standing (CoGS)</td><td>£" +
                    parseFloat(gs).toFixed(2) + "</td></tr>";
            }
            if ($("#option4").is(":checked")) {
                sum += other_doc;
                tr += "<tr><td>Apostilled Documents</td><td>" + $('#option4_input').val() + "</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }
            if ($("#option5").is(":checked")) {
                sum += other_doc;
                tr += "<tr><td>Apostilled Documents</td><td>" + $('#option5_input').val() + "</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }
            if ($("#option6").is(":checked")) {
                sum += other_doc;
                tr += "<tr><td>Apostilled Documents</td><td>" + $('#option6_input').val() + "</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }
            if ($("#rm_uk").is(":checked")) {
                sum += rmuk;
                tr += "<tr><td>Delivery Options</td><td>Royal Mail Recorded DeliveryFree</td><td>£" +
                    parseFloat(rmuk).toFixed(2) + "</td></tr>";
            }
            if ($("#courier_uk").is(":checked")) {
                sum += courieruk;
                tr += "<tr><td>Delivery Options</td><td>Courier (next business day)</td><td>£" + parseFloat(
                    courieruk).toFixed(2) + "</td></tr>";
            }
            if ($("#rm_int").is(":checked")) {
                sum += rmint;
                tr +=
                    "<tr><td>Delivery Options</td><td>Royal Mail International Tracked & Signed* (5 to 15 business days)</td><td>£" +
                    parseFloat(rmint).toFixed(2) + "</td></tr>";
            }
            if ($("#courier_int").is(":checked")) {
                sum += courierint;
                tr +=
                    "<tr><td>Delivery Options</td><td>International Courier (1 to 5 business days)</td><td>£" +
                    parseFloat(courierint).toFixed(2) + "</td></tr>";
            }
            // console.log(tr);
            if (sum == 0) {
                $(".total_priceAmnt").text("Online Application");
            } else {
                $("#order_blk_details").html(tr);
                $("#invoice_data").val(tr);

                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
                calc_vat_total(sum);


            }

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
                // console.log($(this).val())
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
                updatePrices()
                // $(".service_heading").css({ //normal
                //     "background": "#4f5c70",
                //     "color": "white",
                //     "cursor": "default",
                //     "font-size": "18px"
                // });
                // $(".first").removeClass('current');
                $("#steps-uid-0-p-1").show();

                // $("#steps-uid-0-t-1").css({ //active
                //     "background": "#313C4E",
                //     "color": "#79B42E",
                //     "cursor": "default",
                //     "font-size": "18px!important"
                // });
                $(".second").addClass('current')
                $("#steps-uid-0-h-0").html("2.Your Details")
                scrollToTopDynamic(200)
            }

        })
        $("#previous_step_1").click(function() {

            // $(".service_heading").css({ //normal
            //     "background": "#4f5c70",
            //     "color": "white",
            //     "cursor": "default",
            //     "font-size": "15px!important"
            // });
            // $("#steps-uid-0-t-0").css({ //active
            //     "background": "#313C4E",
            //     "color": "#79B42E",
            //     "cursor": "default",
            //     "font-size": "18px!important"
            // });
            $(".second").removeClass('current')
            // $(".first").addClass('current');

            $("#steps-uid-0-p-0").show();
            $("#steps-uid-0-p-1").hide();
            $("#steps-uid-0-h-0").html("1.Your Service")


        })
        $("#next_step_2").click(function() {
            if ((validate_yourservice() == true)) {
                $("#steps-uid-0-p-1").hide();
                $("#steps-uid-0-p-2").show();
                $("#steps-uid-0-h-0").html("3.Confirmation")
                // $(".second").removeClass('current')
                $(".last").addClass('current');
                // $(".service_heading").css({ //normal
                //     "background": "#4f5c70",
                //     "color": "white",
                //     "cursor": "default",
                //     "font-size": "15px"
                // });
                // $("#steps-uid-0-t-2").css({ //active
                //     "background": "#313C4E",
                //     "color": "#79B42E",
                //     "cursor": "default",
                //     "font-size": "18px!important"
                // });

            }
        })
        $("#previous_step_2").click(function() {
            // $(".service_heading").css({ //normal
            //     "background": "#4f5c70",
            //     "color": "white",
            //     "cursor": "default",
            //     "font-size": "15px!important"
            // });
            // $("#steps-uid-0-t-1").css({ //active
            //     "background": "#313C4E",
            //     "color": "#79B42E",
            //     "cursor": "default",
            //     "font-size": "18px!important"
            // });
            // $(".second").addClass('current')
            $(".last").removeClass('current');
            $("#steps-uid-0-p-1").show();
            $("#steps-uid-0-p-2").hide();
            $("#steps-uid-0-h-0").html("2.Your Details")
        })




    })

</script>
