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
                                
                                <div class="tab-pane show active" id="pills-contact" role="tabpanel"

                                    aria-labelledby="pills-contact-tab">

                                    <div class="overview-wrap">

                                        <div class="ttl">

                                            <h3>Company Services</h3>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table">

                                                <thead>

                                                    <tr>

                                                        <th>Active Services</th>
                                                        <th>Purchased At</th>

                                                    </tr>


                                                </thead>

                                                <tbody>
                                                @if (count($edit_service_purchased) > 0 && count($service_purchased_from_inside) > 0)
                                                    @foreach ($edit_service_purchased as $key => $values) 

                                                        @foreach ($values->companyEditRequests as $key => $r_value) 
                                                            <tr>
                                                        
                                                                <td>{{$r_value->service_name}}</td>
                                                                <td>{{$values->updated_at}}</td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach
                                                        
                                                    @endforeach

                                                    @foreach ($service_purchased_from_inside as $key => $value) 
                                                        <tr>
                                                    
                                                            <td>{{$value->service_name}}</td>
                                                            <td>{{$value->updated_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">No data available</td>
                                                    </tr>
                                                @endif    

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="ttl">

                                            <h3>Buy New Services</h3>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table thead-table">

                                                <thead>

                                                    <tr>

                                                        <th>Officer Service Address</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    @foreach ($person_appointments as $value) 
                                                    <tr>
                                                        <td width="400">Director Service Address - {{ $value['person_officers']['title'] }} {{ $value['person_officers']['first_name'] }} {{ $value['person_officers']['last_name'] }}</td>

                                                        <td>${{$director_service_address->price}}  per year</td>

                                                        <td><button class="ch-ed-btn add-director-service-item" 
                                                                    data-id="{{$director_service_address->id}}"
                                                                    data-director-name="Director Service Address - {{ $value['person_officers']['title'] }} {{ $value['person_officers']['first_name'] }} {{ $value['person_officers']['last_name'] }}">
                                                                    <img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table thead-table">

                                                <thead>

                                                    <tr>

                                                        <th width="400">Registered Office Services</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td>{{$register_office_address_services->service_name}}</td>

                                                        <td>${{$register_office_address_services->price}} per year</td>

                                                        <td><button class="ch-ed-btn add-service-item" data-id="{{$register_office_address_services->id}}"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt="" > Add</button></td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table thead-table">

                                                <thead>

                                                    <tr>

                                                        <th>Mail Forwarding</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td>{{ @$business_mailing_address_service->service_name}}</td>

                                                        <td>${{ @$business_mailing_address_service->price}} per year</td>

                                                        <td><button class="ch-ed-btn add-service-item" data-id="{{@$business_mailing_address_service->id}}"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table thead-table">

                                                <thead>

                                                    <tr>

                                                        <th>Standard Service</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    @foreach($standard_services as $service)
                                                        <tr>

                                                            <td width="400">{{$service->service_name}}</td>

                                                            <td>${{$service->price}} per year</td>

                                                            <td><button class="ch-ed-btn add-service-item"  data-id="{{$service->id}}"><img

                                                                        src="assets/images/add-plus-icom.svg"

                                                                        alt=""> Add</button></td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>

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

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     $(document).ready(function() {
            $('.add-service-item').on('click', function() {
                var itemId = $(this).data('id');
                console.log(itemId, 'itemId');
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

            $('.add-director-service-item').on('click', function() {
                var itemId = $(this).data('id');
                console.log(itemId, 'itemId');
                var directorName = $(this).data('director-name');

                $.ajax({
                    url: "{!! route('save-cart-services') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemId,
                        order_id: "{{ $order_id }}",
                        c_id: "{{ $_GET['c_id'] }}",
                        director: 1,
                        service_name: directorName,
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

