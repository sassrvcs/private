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
                    <input type="hidden" name="service_name" value="{{ $service_name }}">
                    {{-- <input type="hidden" name="service_price" value="99.99"> --}}
                    <input type="text" id="address_lookup_mode" name="address_lookup_mode">

                    <div role="application" class="wizard clearfix" id="steps-uid-0">
                        @include('frontend.service.load_services.header.company_services_header')

                        <div class="content clearfix">
                            <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">1.Your Service</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0"
                                class="body current" aria-hidden="false">


                                <div class="page-title">
                                    <h1>{{ $service_name }} <span class="total_priceAmnt" style="font-size:24px;">Price:
                                            £{{ $prices['company_dissolution_price'] }}<small>+VAT</small></span></h1>
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
                                    <h5><strong>Director Information</strong></h5>
                                    <p>Please list below the names of the directors who will be signatory to the DSO1 Strike
                                        Off form.</p>
                                    <p><strong>Please note the following must sign the form:</strong></p>
                                    <ul>
                                        <li>The sole director, if there is only one</li>
                                        <li>Both directors, if there are two</li>
                                        <li>By all directors, or the majority of directors, if there are more than two</li>
                                    </ul>
                                    <br>
                                    <div id="director_field_wrapper">
                                        <div class="form-group row mb-3 add-director-wrapper" id="firstDir">
                                            <label class="col-md-4 form-label" for="director_1_name">Director's Full
                                                Name<span class="starred">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="director_1_name"
                                                    name="director_1_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 form-label" for="btn"></label>
                                            <div class="col-md-6"><br>
                                                <span class="add_director_button addDirectorbtn btn btn-primary">Add
                                                    Director</span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cntDir" id="cntDir" value="">
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-end align-items-center float-none" style="font-size:24px;margin-bottom:15px;"><div class="total_priceAmnt ">Price: £149.99 <small>+VAT</small></div></div>

                                <input type="hidden" name="allPriceAmnt" id="allPriceAmnt" value="">
                                <input type="hidden" name="totalVatAmount" id="totalVatAmount" value="">
                                <input type="hidden" name="totalGrandAmount" id="totalGrandAmount" value="">


                                <div class="actions clearfix d-flex justify-content-end">
                                    <ul role="menu" aria-label="Pagination">
                                        <li aria-hidden="false" aria-disabled="false"><button role="menuitem" type="button"
                                                id="next_step_1" class="btn btn-primary">Next</button>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            @includeIf(
                                resource_path('views/frontend/service/load_services/your_details_confirmation/company_services_confirmation.blade.php')
                            )
                            @includeIf('frontend.service.load_services.your_details_confirmation.company_services_your_details')
                            {{-- @include('frontend.service.load_services.your_details_confirmation.company_services_confirmation')
                            @include('frontend.service.load_services.your_details_confirmation.company_services_your_details') --}}
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
    <x-find_address_service />
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/service_yourdetails.js') }}" type="text/javascript"></script>
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



        $(".hasprice").change(function() {
            updatePrices();
        });

        $(".add_director_button").on('click', function(e) {
            var cnt = $('.add-director-wrapper').length;
            //console.log(cnt+'=***=');
            if (cnt == 0) {
                cnt = (cnt + 2);
            } else {
                cnt = (cnt + 1);
            }
            //console.log(cnt+'==');
            $('.add-director-wrapper').last().after(
                '<div class="form-group row mb-3 add-director-wrapper"><label class="col-md-4 form-label" for="director_' +
                cnt +
                '_name">Directors Full Name</label><div class="col-md-6"><div class="input-group"><input type="text" class="form-control required_diss" id="director_' +
                cnt + '_name" name="director_' + cnt +
                '_name" value=""/><span class="input-group-text removeDir" onclick="removeDir(' +
                cnt + ')" id="removeBtn_' + cnt +
                '" style="cursor:pointer;">x</span></div></div></div>');
            $('#cntDir').val(cnt);
        });


        function updatePrices() {
            let sum = 0.00;
            let dis_price = parseFloat({{ $prices['company_dissolution_price'] }});
            tr = '';
            sum += dis_price;
            tr = "<tr><td>Company Dissolution</td><td>Company Dissolution Service</td><td>£" +
                parseFloat(dis_price).toFixed(2) + "</td></tr>";

            if (sum == 0) {
                $(".total_priceAmnt").text("Online Application");
            } else {
                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));

                $("#order_blk_details").html(tr);
                $("#invoice_data").val(tr);

                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
                calc_vat_total(sum);
            }

        }
        updatePrices()

        function validate_dissolution() {
            let diss_error = true;
            if ($("#director_1_name").val() == '') {
                $("#director_1_name").css({
                    'border-color': 'red'
                })
                // scrollToTopDynamic(300)

                 diss_error = false;

                $("#director_1_name").next("span").remove();
                $("#director_1_name").after(`<span class="error">This field is required </span>`);

            } else {
                $("#director_1_name").next("span").remove();
                $("#director_1_name").css({
                    'border-color': '#ced4da'
                })
            }
            console.log(diss_error);
            return diss_error;

        }
        // $(".addDirectorbtn").click(function() {
        //     validate_dissolution()
        // })
        $("#next_step_1").click(function() {
            if(validate_dissolution()==true){


            $("#steps-uid-0-p-0").hide();
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
            $(".second").addClass('current');
            $("#steps-uid-0-h-0").html("2.Your Details");
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


    function removeDir(cnt) {
        $("#removeBtn_" + cnt).prev('input').val("");
        $("#removeBtn_" + cnt).prev('input').removeClass("required_diss");
        $("#removeBtn_" + cnt).prev('input').parent().parent().parent().hide();
    }
</script>
