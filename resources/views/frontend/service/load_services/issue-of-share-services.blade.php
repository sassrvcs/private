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
                                    <p>Please complete our online application form and make your payment by credit or debit card. Within 3 to 5 working hours, we will send you an email confirming we have started working on your order, with a receipted invoice attached. We may also ask you for further information, if required.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>Shareholder's Shares<span class="starred">*</span></strong></h5>
                                    <p>Please select the number of shareholders receiving new shares:</p>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" checked type="radio" name="shares_doc" id="1-2-shareholders" value="{{$prices['2_shares']}}" data-serid="3533" required="">
                                        <label class="form-check-label" for="1-2-shareholders">
                                            1-2 shareholders<span id="coi_price" class="doc_chk">£{{$prices['2_shares']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="shares_doc" id="3-4-shareholders" value="{{$prices['4_shares']}}" data-serid="3534" required="">
                                        <label class="form-check-label" for="3-4-shareholders">
                                            3-4 shareholders<span id="coi_price" class="doc_chk">£{{$prices['4_shares']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="shares_doc" id="5-6-shareholders" value="{{$prices['6_shares']}}" data-serid="3535" required="">
                                        <label class="form-check-label" for="5-6-shareholders">
                                            5-6 shareholders<span id="coi_price" class="doc_chk">£{{$prices['6_shares']}}</span>
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="select_shareID" id="select_shareID" value="">

                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>Confirmation Statement<span class="starred">*</span></strong></h5>
                                    <p>Would you like Formations to prepare and file a confirmation statement to record the share issue on Companies House register?</p>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="confirm_statement" id="pre_file_statement" checked value="{{$prices['prepare_file']}}" data-title=" Prepare and file a confirmation statement" required="">
                                        <label class="form-check-label" for="pre_file_statement">
                                            Prepare and file a confirmation statement<span id="od3_price" class="doc_chk ">£{{$prices['prepare_file']}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hasprice" type="radio" name="confirm_statement" id="no_file_statement" value="{{$prices['prepare_file_myself']}}" data-title="No, I will file the confirmation statement myself" required="">
                                        <label class="form-check-label" for="no_file_statement">
                                            No, I will file the confirmation statement myself<span id="od3_price" class="doc_chk "></span>
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="select_confirmStat_title" id="select_confirmStat_title" value="">
                                <input type="hidden" name="select_confirmStat_price" id="select_confirmStat_price" value="">

                                <div class="col-md-8 p-3 d-block mb-3 shadow">
                                    <h5><strong>Date of Allotment</strong></h5>
                                    <p>The date of the issue (allotment) of shares will be assumed to be the date the order was placed, unless otherwise stated:</p>
                                    <br>
                                    <div class="mb-3 row">
                                        <label for="date_of_allotment" class="col-sm-4 col-form-label">Date of Allotment</label>
                                        <div class="col-sm-6 datefldarea">
                                            <input type="date" class="form-control hasDatepicker" name="date_of_allotment" id="date_of_allotment" value=""><img class="ui-datepicker-trigger" src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/date_cal.png" alt="Select date" title="Select date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 shadow">
                                    <h5><strong>Details of Allotment (issue of shares)</strong></h5>
                                    <p>We will contact you on receipt of your order to ascertain the details of your share allotment requests, however, if you wish to provide information now, please do so:</p>
                                    <br>
                                    <div class="mb-3 row">
                                        <label for="details_of_allotment" class="col-sm-4 col-form-label">Details of Allotment</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="details_of_allotment" id="details_of_allotment" cols="40" rows="5"></textarea>
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

        var sum = 0.00;
        var coi = parseFloat($("input[name=shares_doc]:checked").val());
        var ma = parseFloat($("input[name=confirm_statement]:checked").val());

        var servID = $("input[name=shares_doc]:checked").data('serid');
        $('#select_shareID').val(servID);

        if (servID==3533) {
           tr= "<tr><td>Shareholder's Shares</td><td>1-2 shareholders</td><td>£" +
                parseFloat(coi).toFixed(2) + "</td></tr>";
        }
        if(servID==3534){
            tr= "<tr><td>Shareholder's Shares</td><td>3-4 shareholders</td><td>£" +
                parseFloat(coi).toFixed(2) + "</td></tr>";
        }
        if(servID==3535){
            tr= "<tr><td>Shareholder's Shares</td><td>5-6 shareholders</td><td>£" +
                parseFloat(coi).toFixed(2) + "</td></tr>";
        }

        var servTitle = $("input[name=confirm_statement]:checked").data('title');
        $('#select_confirmStat_title').val(servTitle);
        $('#select_confirmStat_price').val(ma);

        tr_2="<tr><td>Confirmation Statement</td><td>"+servTitle+"</td><td>£" +
                parseFloat(ma).toFixed(2) + "</td></tr>";

        if ($("input[name=shares_doc]").is(":checked")) sum += coi;
        if ($("input[name=confirm_statement]").is(":checked")) sum += ma;

        if (sum == 0)
          $(".total_priceAmnt").text("Online Application");
        else

        $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
        $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));

        $("#order_blk_details").html(tr+tr_2);
        $("#invoice_data").val(tr+tr_2);
        $(".total_priceAmnt").html("Price: £" + parseFloat(sum).toFixed(2) + " <small>+VAT</small>");
        $("#allPriceAmnt").val(parseFloat(sum).toFixed(2));
        calc_vat_total(sum);

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
