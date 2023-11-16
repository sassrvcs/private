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
                        @include('frontend.service.load_services.header.company_services_header2')

                        <div class="content clearfix">
                            <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">1.Your Service</h3>
                            @include('frontend.service.load_services.your_details_confirmation.business_service_common')
                            @include('frontend.service.load_services.your_details_confirmation.company_services_confirmation')
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
        var sum =  parseFloat({{ $prices['data_protection_registration_price'] }});

        tr = "<tr><td></td><td>Data Protection Registration</td><td>£" +
                    parseFloat(sum).toFixed(2) + "</td></tr>";

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

        function service_app()
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
            let phone_test = validatePhoneField();
            if (phone_test==false) {
                scrollToTopDynamic(300)

                input_err = false;
            }
            console.log(input_err);
            return input_err
        }



        $("#next_step_1").click(function() {
            if ((service_app() == true)) {

                updatePrices();
                $("#steps-uid-0-p-0").hide();
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
            $("#steps-uid-0-p-0").show();
            $("#steps-uid-0-p-2").hide();
            $("#steps-uid-0-h-0").html("1.Your Service")
        })



    })

</script>
