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
                                    <h1>{{ $service_name }} <span class="total_priceAmnt" style="font-size:24px;">Price: £{{ $prices['full_company_secretary_service_price'] }}<small>+VAT</small></span></h1>
                                </div>
                                <hr>

                                <div class="pageContent">
                                    <p>Please complete our online application form and make your payment by credit or debit card. You will receive a receipt of payment confirmation email. Your service will typically take between 3 and 5 working days to set up, which will include: appointing the new company secretary, preparing and maintaining the first set of statutory registers.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>

                                </div>

                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow" style="margin-top:15px;">
                                    <h5><strong>Company Information</strong></h5>
                                    <p>Please provide the name and number of the limited company you wish to register for this service:</p>
                                    <br>
                                    <div id="servicetype mb-3">
                                        <div class="mb-3 row">
                                            <label for="company_name" class="col-sm-3 col-form-label">Your Company Name<span class="starred">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control required_app name_test_form" name="company_name_first" id="company_name_first" value="" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="company_number" class="col-sm-3 col-form-label">Your Company Number<span class="starred">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control required_app name_test_form" name="company_number_first" id="company_number_first" value="" required="">
                                            </div>
                                        </div>
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
            let dis_price = parseFloat({{ $prices['full_company_secretary_service_price'] }});
            tr = '';
            sum += dis_price;
            tr = "<tr><td>Full Company Secretary</td><td>Full Company Secretary Service</td><td>£" +
                parseFloat(dis_price).toFixed(2) + "</td></tr>";

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
