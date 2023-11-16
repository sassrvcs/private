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
                                    <h1>{{$service_name}} <span class="total_priceAmnt" style="font-size:24px;">Price: £110<small>+VAT</small></span></h1>
                                </div>
                                <hr>
                                <div class="pageContent">

                                </div>

                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Your Certificate of Good Standing includes the following information:</strong></h5>
                                    <br>
                                    <ul class="mb-3 goodStand">
                                        <li>Date of incorporation</li>
                                        <li>Director(s) name(s)</li>
                                        <li>Company secretary name (if relevant)</li>
                                        <li>Registered office address</li>
                                        <li>Company objects (if relevant)</li>
                                        <li>Verification that company is up to date with filing requirements</li>
                                    </ul>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Please choose a preferred Delivery Option:<span class="starred">*</span></strong></h5>
                                    <br>
                                    <div id="servicetype mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input hasprice" type="radio" name="serv_delivery_option" value="{{$prices['royal_mail']}}" id="dhl_delivery-3508" data-title="Royal Mail Normal Delivery(Free)" data-serid="3508" required="" checked>
                                            <label class="form-check-label" for="dhl_delivery-3508">
                                                Royal Mail Normal Delivery(Free) </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input hasprice" type="radio" name="serv_delivery_option" value="{{$prices['dhl']}}" id="dhl_delivery-3506" data-title="DHL Delivery" data-serid="3506">
                                            <label class="form-check-label" for="dhl_delivery-3506">
                                                DHL Delivery <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>{{$prices['dhl']}}</bdi></span> </label>
                                        </div>

                                        <input type="hidden" name="subProId" id="subProId" value="">

                                        <p><strong>Note:</strong></p>
                                        <p>1.Processing the international tracked &amp; signed mail service will be subject to availability as in some countries it might not be available.</p>
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
                    <input type="text" hidden id="invoice_data" name="invoice_data">

                </form>
            </div>
        </div>
    </div>
    <x-find_address_service/>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/service_yourdetails.js') }}" type="text/javascript"></script>
<script>

    $("document").ready(function() {

        function scrollToTopDynamic(val) {
            window.scrollTo(0, val);
        }



        $(".hasprice").change(function() {
            updatePrices();
        });



        function updatePrices() {

            let sum = parseFloat({{ $prices['certification_price'] }});
            let coi = parseFloat($("input[name=serv_delivery_option]:checked").val());
            let delivery_price = $("input[name=serv_delivery_option]:checked").val()
            if(coi != 0){
            if ($("input[name=serv_delivery_option]").is(":checked")) sum += coi;
            }else{
                sum = parseFloat({{ $prices['certification_price'] }});
            }
            var servTitle = $("input[name=serv_delivery_option]:checked").data('title');

            tr = "<tr><td>Certification of Good Standing</td><td>Company Dissolution Service</td><td>£" +
                parseFloat({{ $prices['certification_price'] }}).toFixed(2) + "</td></tr>";
            tr += "<tr><td>Delivery Option</td><td>"+servTitle+"</td><td>£" +
            parseFloat(delivery_price).toFixed(2) + "</td></tr>";
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





        //$('#subProTitle').val(servTitle);




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
