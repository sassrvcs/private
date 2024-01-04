@extends('layouts.app')

@section('content')
<style>
    ul.ef-16-benefits-list {
        list-style: inside;
    }
    .terms-condition {
        cursor: pointer;
    }
</style>
    <section class="common-inner-page-banner"

        style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">

        <div class="custom-container">

            <div class="left-info">

                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                    <div class="icon-container">

                        <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg') }}"></span>

                    </div>

                    <figcaption>My <span>Account</span>

                    </figcaption>

                </figure>

            </div>

            <div class="center-info">

                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"

                    data-aos-once="true">

                    <li><a href="/">Home</a></li>

                    <li><a>Digital Packages</a></li>

                </ul>

            </div>

            <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">

                <div class="icon-container">

                    <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg') }}">

                </div>

                <div class="text-box">

                    <p>Free Consultations 24/7</p>

                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>

                </div>

            </div>

        </div>

    </section>

    <section class="sectiongap legal rrr fix-container-width ">

        <div class="container">

            <div class="companies-wrap">

                <div class="row woo-account">



                    @include('layouts.navbar')



                    <div class="MyAccount-content col-md-12">

                        <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">

                            <h3 class="mb-2">{{$company_details->companie_name}}</h3>


                        </div>

                        @if($cartCount > 0)

                        <div class="MyAccount-content col-md-12">
                                <!-- <p>You have some items on your cart</p> -->
                            <span>
                            You have {{ $cartCount }} items in your cart. (<strong class="text-danger text-bolt">Please make the payment to avail services in the cart in to get the same updated in the Company House file</strong>)

                                <a href="{{ route('cart-company', ['order' => $order_id]) }}" class="btn btn-primary col-md-2">View Cart</a>

                            </span>

                        </div>

                        @endif

                        <div id="apiResponse" class="mt-3"></div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="conpany-overview-sec">

                            <div class="conpany-overview-tab-wrap">
                                @include('layouts.company_details_header')

                                <div class="tab-content" id="pills-tabContent">


                                    <div class="tab-pane show active" id="getting-started-tab" role="tabpanel"

                                        aria-labelledby="getting-started-tab">

                                        <div class="col-md-12 col-ms-12">
                                            <div class="business-ess-wrap">
                                                <small>The following banks have expressed an interest to support you and your new company :</small>
                                                @foreach($businessBanks as $key => $businessBank)
                                                    <div class="business-ess-panel div-{{ $businessBank->id }}
                                                        @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) active @endif"
                                                        @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) style="border:1px solid #87CB28" @endif>
                                                        <input style="display: none"
                                                            type="radio" name="business_banking" value="{{ $businessBank->id }}" class="radio-{{ $businessBank->id }}"
                                                            @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) {{ 'checked' }}  @endif
                                                        >
                                                        <img class="active-icon checkbox-{{$businessBank->id}}"
                                                            @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) style="display:block"  @endif
                                                            src="{{ asset('frontend/assets/images/td-tick.svg') }}" alt="tick image"
                                                        >
                                                        <div class="business-ess-panel-top">
                                                            <div class="business-ess-panel-wrap">
                                                                <div class="img-text-box">
                                                                    <div class="tham-icon" style="max-width: 50px">
                                                                        @if ($businessBank->hasMedia('business_banking_images'))
                                                                            <img src="{{ $businessBank->getFirstMedia('business_banking_images')->getUrl() }}" alt="Image">
                                                                        @else
                                                                            <!-- Default image or placeholder if no media found -->
                                                                            <img src="{{ asset('frontend/assets/images/card-one-logo-img.png') }}" alt="">
                                                                        @endif
                                                                    </div>
                                                                    <div class="desc">
                                                                        <h3>{{ $businessBank->title ?? "" }}</h3>
                                                                        <p><span style="color: black;">{{ $businessBank->long_description }}</span></p>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="info">
                                                                    <p>{{ $businessBank->long_description }}</p>
                                                                </div> --}}
                                                            </div>
                                                            {{-- <div class="main-img">
                                                                <img src="{{ asset('frontend/assets/images/card-one-img.png') }}" alt="">
                                                            </div> --}}
                                                        </div>
                                                        <div class="bottom-panel">
                                                            <div class="text-box">
                                                                <p class="terms-condition" data-url="{{ route('business-bank-terms-conditions', ['id' => $businessBank->id]) }}">
                                                                    <strong>Terms and Conditions</strong>
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrap">
                                                                <button type="submit" data-step="business-banking" data-section="BusinessEssential" data-id={{ $businessBank->id }} class="btn select-services">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @foreach($businessServices as $key => $businessService)
                                                    <div class="business-ess-panel div-{{ $businessService->id }}
                                                        @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) active @endif"
                                                        @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) style="border:1px solid #87CB28" @endif >
                                                        <input style="display: none"
                                                            type="radio" name="business_service" value="{{ $businessService->id }}" class="radio-{{ $businessService->id }}"
                                                            @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) {{ 'checked' }}  @endif
                                                        >
                                                        <img class="active-icon checkbox-{{$businessService->id}}"
                                                            @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) style="display:block"  @endif
                                                            src="{{ asset('frontend/assets/images/td-tick.svg') }}" alt="tick image"
                                                        >
                                                        <div class="business-ess-panel-top">
                                                            <div class="business-ess-panel-wrap">
                                                                <div class="img-text-box">
                                                                    <div class="tham-icon" style="max-width: 50px">
                                                                        @if ($businessService->hasMedia('accounting_software_images'))
                                                                            <img src="{{ $businessService->getFirstMedia('accounting_software_images')->getUrl() }}" alt="Image">
                                                                        @else
                                                                            <img src="{{ asset('frontend/assets/images/card-one-logo-img.png') }}" alt="">
                                                                        @endif
                                                                    </div>
                                                                    <div class="desc">
                                                                        <h3>{{ $businessService->accounting_software_name ?? " " }}</h3>
                                                                        <p><span style="color: black;">{!! $businessService->long_desc  ?? '' !!}</span></p>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="info">
                                                                    {!! $businessService->long_desc !!}
                                                                </div> --}}
                                                            </div>

                                                        </div>
                                                        <div class="bottom-panel">
                                                            <div class="text-box">
                                                                <div class="text-box">
                                                                    <p class="terms-condition" data-url="{{ route('business-service-terms-conditions', ['id' => $businessService->id]) }}">
                                                                        <strong>Terms and Conditions</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-wrap">
                                                                <button type="submit" data-step="business-service" data-section="BusinessEssential" data-id={{ $businessService->id }} class="btn select-service">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </section>

    {{-- Terms condition popup --}}
    <div class="modal fade business-banking-modal" id="termsCondition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Terms Condition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body terms-condition-body">

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary btn-don-need submit-frm">I don't need a bank account</button> --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     $(document).ready(function() {
            $('.add-service-item').on('click', function() {
                var itemId = $(this).data('id');
                $.ajax({
                    url: "{!! route('save-cart-services') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemId,
                        order_id: "{{ $order_id }}",
                        c_id: "{{ $_GET['c_id'] }}",
                    },
                    success: function(data) {
                        // location.reload('true')
                        Swal.fire({
                            title: "Cart Updated!",
                            text: "Item Added into the cart!",
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);

                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: "Something Went wrong!",
                            text: "Error found!",
                            icon: "error"
                        });
                        // Handle error response
                    }
                });
            });
        });


    $(document).ready(function () {
        $('.select-services').click(function () {
            // alert($(this).data('id'));
            // $(".business-ess-panel").css("border", "1px solid #D9D9D9");
            // $('.active-icon').css("display", "none");

            // var businessBankId = $(this).data('id');
            // var divSelector = ".business-ess-panel.div-" + businessBankId;
            // // $('#business_bank_id').val(businessBankId);

            // // Add CSS styles to the selected div
            // // $(divSelector).css("border", "3px solid #01ff7e");

            // var isRadioChecked = $(`.radio-${businessBankId}`).is(":checked");
            // if (isRadioChecked) {
            //     $(`.radio-${businessBankId}`).prop("checked", false);
            //     $('#business_bank_id').val('0');
            //     // Add CSS styles to the selected div
            //     $(divSelector).css("border", "1px solid #D9D9D9");
            //     $(`.checkbox-${businessBankId}`).css("display", "none");
            // } else {
            //     $(`.radio-${businessBankId}`).prop("checked", true);
            //     $('#business_bank_id').val(businessBankId);
            //     // Add CSS styles to the selected div
            //     $(divSelector).css("border", "1px solid #87CB28");
            //     $(`.checkbox-${businessBankId}`).css("display", "block");
            // }
                var itemId = $(this).data('id');
                var step = $(this).data('step');
                var section = $(this).data('section');

                $.ajax({
                    url: "{!! route('save-get-services') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        business_bank_id: itemId,
                        order: "{{ $order_id }}",
                        c_id: "{{ $_GET['c_id'] }}",
                        section: section,
                        step: step,
                    },
                    success: function(data) {
                        // location.reload('true')
                        Swal.fire({
                            title: "Cart Updated!",
                            text: "Item Added into the cart!",
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);

                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: "Something Went wrong!",
                            text: "Error found!",
                            icon: "error"
                        });
                        // Handle error response
                    }
                });
        });

        $('.select-service').click(function () {
            // alert($(this).data('id'));
            // $(".business-ess-panel").css("border", "1px solid #D9D9D9");
            // $('.active-icon').css("display", "none");

            // var businessServiceId = $(this).data('id');
            // var divSelector = ".business-ess-panel.div-" + businessServiceId;
            // var isRadioChecked = $(`.radio-${businessServiceId}`).is(":checked");

            // if (isRadioChecked) {
            //     $(`.radio-${businessServiceId}`).prop("checked", false);
            //     $('#business_service_id').val('0');
            //     // Add CSS styles to the selected div
            //     $(divSelector).css("border", "1px solid #D9D9D9");
            //     $(`.checkbox-${businessServiceId}`).css("display", "none");
            // } else {
            //     $(`.radio-${businessServiceId}`).prop("checked", true);
            //     $('#business_service_id').val(businessServiceId);
            //     // Add CSS styles to the selected div
            //     $(divSelector).css("border", "1px solid #87CB28");
            //     $(`.checkbox-${businessServiceId}`).css("display", "block");
            // }

                var itemId = $(this).data('id');
                var step = $(this).data('step');
                var section = $(this).data('section');

                $.ajax({
                    url: "{!! route('save-get-services') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        business_service_id: itemId,
                        order: "{{ $order_id }}",
                        c_id: "{{ $_GET['c_id'] }}",
                        section: section,
                        step: step,
                    },
                    success: function(data) {
                        // location.reload('true')
                        Swal.fire({
                            title: "Cart Updated!",
                            text: "Item Added into the cart!",
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);

                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: "Something Went wrong!",
                            text: "Error found!",
                            icon: "error"
                        });
                        // Handle error response
                    }
                });
        });

        $('.terms-condition').click( function () {
            var baseUrl = $(this).data('url');
            // terms-condition-body
            // axios.get();
            axios.get(baseUrl, {
                '_token': "{{ csrf_token() }}",
            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);
                $('.terms-condition-body').html(response.data);
                $('#termsCondition').modal('show');
            })
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            });
        });
    });
</script>
@endsection

