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
                                    <h1>{{ $service_name }} <span class="total_priceAmnt" style="font-size:24px;">Price: £<small>+VAT</small></span></h1>
                                </div>
                                <hr>
                                    <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                        <h5><strong>Select payment terms</strong></h5>
                                        <p>Lock in your saving with annual term (get 12 months for the price of 11)</p>
                                        <br>
                                        <div id="servicetype mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input hasprice" type="radio" name="phone_pay_option" id="pay_month" value="99.00" data-title="Pay monthly (12-month contract)" required="" checked="">
                                                <label class="form-check-label" for="pay_month">
                                                    Pay monthly (12-month contract)<span id="od3_price" class="doc_chk ">£99.00</span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input hasprice" type="radio" name="phone_pay_option" id="pay_year" value="131.89" data-title="Yearly subscription (get 1 month free)" required="">
                                                <label class="form-check-label" for="pay_year">
                                                    Yearly subscription (get 1 month free)<span id="od3_price" class="doc_chk ">£131.89</span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="select_confirmStat_title" id="select_confirmStat_title" value="">
                                        </div>
                                    </div>
                                <hr>
                                <div class="d-flex justify-content-end align-items-center float-none" style="font-size:24px;margin-bottom:15px;"><div class="total_priceAmnt ">Online Application <small></small></div></div>

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

        var sum =  0.00;
        var coi =  parseFloat({{ $prices['business_telephone_services_price'] }});
        var ma  =  parseFloat({{ $prices['yearly_price'] }});

        tr = '';
            if ($("#pay_month").is(":checked")) {
                sum += coi;
                tr = "<tr><td>Business Telephone Service</td><td>Pay monthly (12-month contract)</td><td>£" +
                    parseFloat(coi).toFixed(2) + "</td></tr>";
            }

            if ($("#pay_year").is(":checked")) {
                sum += ma;
                tr = "<tr><td>Business Telephone Service</td><td>Yearly subscription (get 1 month free)</td><td>£" +
                    parseFloat(ma).toFixed(2) + "</td></tr>";
            }

        if (sum == 0)
          $(".total_priceAmnt").text("Online Application");
        else

            $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
            $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
            $("#order_blk_details").html(tr);
            $("#invoice_data").val(tr);
            $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
            $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
            calc_vat_total(sum);

        }
        updatePrices()

        function telephone_app()
        {
            let input_err =true;
            $(".required_app").each(function(){
                if($(this).val() == "")
                {
                    input_err = false;
                    scrollToTopDynamic(500)
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
            let email_test = validateEmailField();
            if (email_test==false) {
                scrollToTopDynamic(500)

                input_err = false;
            }
            console.log(input_err);
            return input_err
        }


        $("#next_step_1").click(function() {

            if(telephone_app()==true){

                updatePrices()
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
