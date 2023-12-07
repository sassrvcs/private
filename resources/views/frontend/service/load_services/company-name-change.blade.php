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
                                    <h1>{{$service_name}}<span class="total_priceAmnt" style="font-size:24px;">Price: £49.99<small>+VAT</small></span></h1>
                                </div>
                                <hr>
                                <div class="pageContent mb-3">
                                    <p>Kindly fill the following form with your details and make your payment online. Our team will then send an email confirmation for your payment and begin the process to complete your request.</p>
                                    <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>

                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>Company Information</strong></h5>
                                    <p>Please provide details of your company:</p>
                                    <br>
                                    <div class="mb-3 row">
                                        <label for="company_name" class="col-sm-4 col-form-label">Existing Company Name<span class="starred">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control required_input name_test_form" name="company_name" id="company_name_first" value="" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="company_number" class="col-sm-4 col-form-label">Your Company Number<span class="starred">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control required_input name_test_form" name="company_number" id="company_number_first" value="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>New Company Name</strong></h5>
                                    <br>
                                    <div class="mb-3 row">
                                        <label for="new_company_name" class="col-sm-4 col-form-label">New Company Name<span class="starred">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control required_input name_test_form" name="new_company_name" id="new_company_name" value="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>Date of Resolution<span class="starred">*</span></strong></h5>
                                    <p>Please enter the date of resolution to change the company name:</p>
                                    <br>
                                    <div class="mb-3 row">
                                        <label for="date_of_resolution" class="col-sm-4 col-form-label">Date of Resolution</label>
                                        <div class="col-sm-6 datefldarea">
                                            <input type="date" max="{{ date('Y-m-d')}}" class="form-control required_input" name="date_of_resolution" id="date_of_resolution" value="" required=""><img class="ui-datepicker-trigger " src="/images/date_cal.png" alt="Select date" title="Select date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                                    <h5><strong>Shareholder Information</strong></h5>
                                    <p>Please add the shareholder’s full names if there are multiple shareholders, you can add more:</p>
                                    <br>
                                    <div id="director_field_wrapper">
                                        <div class="form-group row mb-3 add-director-wrapper" id="firstDir">
                                            <label class="col-md-4 form-label" for="shareholder_1_name">Shareholder’s Full Name<span class="starred">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control required_input" id="shareholder_1_name" name="shareholder_1_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 form-label" for="btn"></label>
                                            <div class="col-md-6"><br>
                                                <span class="add_director_button addDirectorbtn btn btn-primary">Add Shareholder</span>
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

        $(".add_director_button").on('click', function(e) {
            var cnt = $('.add-director-wrapper').length;
        //console.log(cnt+'=***=');
        if(cnt == 0){cnt= (cnt+2);}else{cnt = (cnt+1);}
        //console.log(cnt+'==');
        $('.add-director-wrapper').last().after('<div class="form-group row mb-3 add-director-wrapper"><label class="col-md-4 form-label" for="shareholder_'+cnt+'_name">Shareholder Full Name</label><div class="col-md-6"><div class="input-group"><input type="text" class="form-control" id="shareholder_'+cnt+'_name" name="shareholder_'+cnt+'_name" value=""/><span class="input-group-text removeDir" onclick="removeDir('+cnt+')" id="removeBtn_'+cnt+'" style="cursor:pointer;">x</span></div></div></div>');
        $('#cntDir').val(cnt);
        });


        function updatePrices() {
            let sum = 0.00;
            let dis_price = parseFloat({{ $prices['company_name_change_price'] }});
            tr = '';
            sum += dis_price;
            tr = "<tr><td>Company Name Change</td><td>Company Name Change Service</td><td>£" +
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
        function validate_required_input(){
            let required_input = true;
            let input_val='';
            let validate_name_test = true;
            $("#company_number").val($("#company_number_first").val())
            $("#company_name").val($("#company_name_first").val())
            $("#company_number").prop('readonly',true)
            $("#company_name").prop('readonly',true)
            $(".required_input").each(function(){
               input_val =  $(this).val();
               console.log(input_val)
               if(input_val=='')
               {
                   $(this).css({
                       'border-color': 'red'
                   })
                   scrollToTopDynamic(300)
                   $(this).next('span').remove();
                   $(this).after(`<span class="error">This field is required </span>`);
                   required_input=false;
               }else{
                $(this).next("span").remove();
                $(this).css({
                    'border-color': '#ced4da'
                })
               }
            })
            validate_name_test = validate_test_names()
            if (validate_name_test==false) {
                required_input = false;
                scrollToTopDynamic(300)

            }
            return required_input
        }
        // function shareholder_validati() {
        //     let diss_error = true;
        //     if ($("#shareholder_1_name").val() == '') {
        //         $("#shareholder_1_name").css({
        //             'border-color': 'red'
        //         })
        //         // scrollToTopDynamic(300)

        //          diss_error = false;

        //         $("#shareholder_1_name").next("span").remove();
        //         $("#shareholder_1_name").after(`<span class="error">This field is required </span>`);

        //     } else {
        //         $("#shareholder_1_name").next("span").remove();
        //         $("#shareholder_1_name").css({
        //             'border-color': '#ced4da'
        //         })
        //     }
        //     if
        //     return diss_error

        // }
        $(".addDirectorbtn").click(function() {
            validate_dissolution()
        })
        $("#next_step_1").click(function() {
            if(validate_required_input()==true){


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


    function removeDir(cnt) {
        $("#removeBtn_" + cnt).prev('input').val("");
        $("#removeBtn_" + cnt).prev('input').removeClass("required_diss");
        $("#removeBtn_" + cnt).prev('input').parent().parent().parent().hide();
    }
</script>
