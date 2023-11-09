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
                                    <h1>{{$service_name}} <span class="total_priceAmnt"
                                            style="font-size:24px;">Online Application</span></h1>
                                </div>
                                <hr>
                                <div class="pageContent">
                                    <p>Please complete our online application form and make your payment by credit or debit
                                        card. Within 3 to 5 working hours, we will send you an email confirming we have
                                        started working on your order, with a receipted invoice.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are
                                            required.</strong></p>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Service Type<span class="starred">*</span></strong></h5>
                                    <p>Please confirm below if you wish to order the Standard or Express service.</p>
                                    <div class="form-check">
                                        <input type="hidden" name="express_service_price" id="service_price0"
                                            value="{{ $prices['express_service_price'] }}">
                                        <input type="hidden" name="express" id="express"
                                            value="Express (Confirmation statement filed within 24 hours)">
                                        <input class="form-check-input hasprice" checked type="radio"
                                            name="related_service" id="rel0" value="express" required="">
                                        <label class="form-check-label" for="rel0">
                                            Express (Confirmation statement filed within 24 hours)<span id="coi_price"
                                                class="doc_chk ">£{{ $prices['express_service_price'] }}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="hidden" name="standard_service_price" id="service_price1"
                                            value="{{ $prices['standard_service_price'] }}">
                                        <input type="hidden" name="standard" id="express"
                                            value="Standard (Confirmation statement filed in accordance with due date)">
                                        <input class="form-check-input hasprice" type="radio" name="related_service"
                                            id="rel1" value="standard" required="">
                                        <label class="form-check-label" for="rel1">
                                            Standard (Confirmation statement filed in accordance with due date)<span
                                                id="coi_price"
                                                class="doc_chk ">£{{ $prices['standard_service_price'] }}</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="total_priceAmnt d-flex justify-content-end align-items-center float-none"
                                    style="font-size:24px;margin-bottom:15px;">Online Application
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
                </form>
            </div>
        </div>
    </div>

    <x-find_address_service />
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/service_yourdetails.js') }}" type="text/javascript"></script>
<script>
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


        function updatePrices() {
            let sum = 0.00;
            let coi = parseFloat($('#service_price0').val());
            let ma = parseFloat($('#service_price1').val());
            tr = '';
            if ($("#rel0").is(":checked")) {
                sum += coi;
                tr = "<tr><td>Confirmation Service Statement</td><td>Express (Confirmation statement filed within 24 hours)</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }

            if ($("#rel1").is(":checked")) {
                sum += ma;
                tr = "<tr><td>Confirmation Service Statement</td><td>Standard (Confirmation statement filed in accordance with due date)</td><td>£" +
                    parseFloat(ma).toFixed(2) + "</td></tr>";
            }

            if (sum == 0) {
                $(".total_priceAmnt").text("Online Application");
            } else {
                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));

                $("#order_blk_details").html(tr);
                $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
                $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
                calc_vat_total(sum);
            }

        }

        updatePrices()
        $("#next_step_1").click(function() {
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
            $(".second").addClass('current')
            $("#steps-uid-0-h-0").html("2.Your Details")
            scrollToTopDynamic(200)


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
