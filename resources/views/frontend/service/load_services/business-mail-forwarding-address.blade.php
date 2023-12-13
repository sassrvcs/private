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
                                    <h1>{{ $service_name }} <span class="total_priceAmnt" style="font-size:24px;">Price: £{{ $prices['business_mailing_address_price'] }}<small>+VAT</small></span></h1>
                                </div>
                                <hr>

                                <div class="pageContent">
                                    <p>Please complete our online application form and make your payment by credit or debit card. Within 3 to 5 working hours, we will send you an email confirming we have started working on your order, with a receipted invoice attached.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 d-flex">
                                        <div class="col-md-12 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px; background: rgb(204 204 204 / 30%); padding: 15px 40px !important;">
                                            <p><strong>Your new virtual office address:</strong></p>
                                            <ul>
                                                <li>Your company name</li>
                                                <li>{{construct_address($address->toArray())}}</li>
                                                {{-- <li>College House, 2nd Floor</li>
                                                <li>17, King Edwards Road</li>
                                                <li>London</li>
                                                <li>HA4 7AE</li> --}}
                                            </ul>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <div class="col-md-12 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                            <!-- <p>Please complete our online application form and make your payment. We will send you our welcome email and your service will start immediately. Please send ID and address proof within 7 days of service commencement.</p>
                                            <br> -->
                                            <div id="director_field_wrapper">
                                                <div class="form-group row mb-3 add-director-wrapper" id="firstDir">
                                                    <label class="col-md-12 form-label" for="director_1_name">Your start date<span class="starred">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control hasDatepicker required_app" id="" name="start_date" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3 add-director-wrapper" id="firstDir">
                                                    <label class="col-md-12 form-label" for="director_1_name">Your company name<span class="starred">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control required_app name_test_form" name="company_name_first" id="company_name_first" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3 add-director-wrapper" id="firstDir">
                                                    <label class="col-md-12 form-label" for="director_1_name">Your company number<span class="starred">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control required_app name_test_form" name="company_number_first" id="company_number_first" value="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <x-find_address_service />
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
            let sum = 0.00;
            let dis_price = parseFloat({{ $prices['business_mailing_address_price'] }});
            tr = '';
            sum += dis_price;
            tr = "<tr><td>Business Mail Forwarding Address</td><td>Business Mail Forwarding Address</td><td>£" +
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


        function secretary_app()
        {
            $("#company_number").val($("#company_number_first").val())
            $("#company_name").val($("#company_name_first").val())
            $("#company_number").prop('readonly',true)
            $("#company_name").prop('readonly',true)
            let input_err =true;
            $(".required_app").each(function(){
                if($(this).val() == "")
                {
                    input_err = false;
                    // scrollToTopDynamic(500)
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': 'red'
                    })
                    $(this).after(`<span class="error">This field is required</span>`);

                }else{
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': '#ced4da'
                    })
                }
            })
            let name_test = validate_test_names();
            if (name_test==false) {
                // scrollToTopDynamic(500)

                input_err = false;
            }
            console.log(input_err);
            return input_err
        }

        $("#next_step_1").click(function() {
            if(secretary_app()==true){


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
