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
                                    <div class="pageContent mb-3">
                                        <p>Please complete our online application form and make your payment. We will send you our welcome email and your service will start immediately. </p>
                                        <p>Please send ID and address proof within 7 days of service commencement.</p>
                                        <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>

                                    </div>
                                    <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                        <br>
                                        <div class="mb-3 row">
                                            <label for="start_date" class="col-sm-4 col-form-label">Your start date <span class="starred">*</span></label>
                                            <div class="col-sm-6 datefldarea">
                                                <input type="date" class="form-control required_app hasDatepicker" name="start_date" id="start_date" value="" required=""><img class="ui-datepicker-trigger" src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/date_cal.png" alt="Select date" title="Select date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                        <h5><strong>Your date of birth</strong></h5>
                                        <p>We require your date of birth to carry out a digital ID check to fulfil our obligations under the Money Laundering Regulations 2007, the London Local Authorities Act 2007, and Know Your Customer (KYC) requirements. You must be at least sixteen years old.</p>
                                        <br>
                                        <div class="mb-3 row">
                                            <label for="date_of_birth" class="col-sm-4 col-form-label">Your date of birth<span class="starred">*</span></label>
                                            <div class="col-sm-6 datefldarea">
                                                <input type="date" max="{{ now()->subYears(16)->format('Y-m-d') }}" class="form-control required_app validateAge16" name="date_of_birth" id="date_of_birth" value="" required=""><img class="ui-datepicker-trigger" src="/images/date_cal.png" alt="Select date" title="Select date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                        <p><strong>Your email address for receiving statutory letters (Your statutory mails will be scanned and emailed to this id)</strong></p>
                                        <br>
                                        <div class="mb-3 row">
                                            <label for="stat_email" class="col-sm-4 col-form-label">Email address<span class="starred">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control required_app" name="stat_email" id="stat_email" value="" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                        <h5><strong>Popular Add-ons with director's service address</strong></h5>
                                        <br>
                                        <div class="form-check">
                                            <input class="form-check-input hasprice popupAmnt" type="checkbox" name="dir_serv_addr[]" id="directors-service-address" value="2289" data-title="Directors Service Address" data-serid="2289">
                                            <label class="form-check-label" for="directors-service-address">
                                                <strong>Directors Service Address</strong>
                                                    <select class="addonSelect hasprice" name="no_of_officer" id="no_of_officer" autocomplete="off">
                                                        <option value="1" selected="">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                <strong><span id="od3_price_2289" class="doc_chk">£24.99</span></strong>
                                            </label>
                                            <div class="col-md-10 p-1">
                                                    <p>The use of our HA4 London address for directors, shareholders, secretaries and persons with significant control (PSCs) to keep their home address private.</p>
                                                    <p>All statutory mail will be forwarded free of charge within the UK.</p>
                                            </div>
                                            <input type="hidden" name="directors-service-address-price" id="directors-service-address-price" value="24.99">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input hasprice popupAmnt" type="checkbox" name="dir_serv_addr[]" id="london-business-address" value="3710" data-title="London business address" data-serid="3710">
                                            <label class="form-check-label" for="london-business-address">
                                                <strong>London business address</strong>
                                                <strong><span id="od3_price_3710" class="doc_chk">£99.00</span></strong>
                                            </label>
                                            <div class="col-md-10 p-1">
                                                <p>The use of our SW4 London address as your business correspondence address for your company. You can hide your home address from your suppliers, contractors, customers and marketing agencies. We will receive your business mails on your behalf.</p>
                                                <p>We will open, scan and forward all your mails to the email address given during the application. If you wish to receive them by post, we will not open and scan your letters.</p>
                                                <p>Instead we will forward the mails to your postal address for additional charge of 50p+postage per item. As a FREE service, we will<br>
                                                automatically eliminate mail that we deem to be junk mail and destroy it.</p>
                                            </div>
                                            <input type="hidden" name="london-business-address-price" id="london-business-address-price" value="99.00">
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

        var sum =  parseFloat({{ $prices['registered_office_address_service_price'] }});
        var coi =  parseFloat({{ $prices['director_address'] }} * $('#no_of_officer :selected').val());
        var ma  =  parseFloat({{ $prices['business_address'] }});

        var proPrice = parseFloat({{ $prices['registered_office_address_service_price'] }});
        var shareVal = parseInt($('#no_of_officer :selected').val());

        tr = '';



        if($("#no_of_officer :selected").val() !=''){
            $('#od3_price_2289').html('£'+parseFloat(coi).toFixed(2));
            tr += "<tr><td></td><td>Directors Service Address(number of officers:"+ shareVal +")</td><td>£" +
                parseFloat(coi).toFixed(2) + "</td></tr>";
            // console.log('no_of_officer', coi, shareVal, tr);
        }

        if ($("#directors-service-address").is(":checked")) {
            actual_price = sum;
            sum += coi;
            var tr_2 = "<tr><td>Registered Office Address Service</td><td>Registered Office Address Service</td><td>£" +
                    parseFloat(actual_price).toFixed(2) + "</td></tr>";

        }

        if ($("#london-business-address").is(":checked")){
            sum += ma;
            tr += "<tr><td></td><td>London business address</td><td>£" +
                    parseFloat(ma).toFixed(2) + "</td></tr>";
        }

        if (sum == 0)
          $(".total_priceAmnt").text("Online Application");
        else

            $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
            $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
            $("#order_blk_details").html(tr_2+tr);
            $("#invoice_data").val(tr_2+tr);
            $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
            $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
            calc_vat_total(sum);

        }
        updatePrices()

        function address_app()
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

            if(address_app()==true&&validateAge16()==true){

                updatePrices();

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
