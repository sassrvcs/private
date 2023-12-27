@extends('layouts.app')

@section('content')

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

                                        <div>hiii</div>

                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </section>

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
</script>
@endsection

