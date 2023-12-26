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

                            <h3 class="mb-2">FORMATIONSHUNT LTD</h3>

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

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td>No Active Services on File</td>

                                                    </tr>

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

                                                    <tr>

                                                        <td width="400">Service Address - London - Amrutaben Patel

                                                        </td>

                                                        <td>$26.00 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Partners’ Service Address - Amrutaben Patel</td>

                                                        <td>$26.00 per year</td>

                                                        <td><button class="ch-ed-btn"><img

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

                                                        <th width="400">Registered Office Services</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td>Registered Office - London</td>

                                                        <td>$39.00 per year</td>

                                                        <td><button class="ch-ed-btn"><img

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

                                                        <th>Mail Forwarding</th>

                                                        <th>Price</th>

                                                        <th></th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td width="400">Business Address (Post)</td>

                                                        <td>$96.00 per year</td>

                                                        <td><button class="ch-ed-btn"><img

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

                                                    <tr>

                                                        <td width="400">Business Telephone Number (pay monthly)</td>

                                                        <td>$6.00 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Business Telephone Number (pay annually)</td>

                                                        <td>$59.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Call Answering + Business Telephone Number (pay monthly)

                                                        </td>

                                                        <td>$29.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Confirmation Statement Filing Service</td>

                                                        <td>$44.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Dormant Company Accounts</td>

                                                        <td>$49.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>Call Answering + Business Telephone Number (pay annually)

                                                        </td>

                                                        <td>$199.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td>ICO Registration Service</td>

                                                        <td>$79.99 per year</td>

                                                        <td><button class="ch-ed-btn"><img

                                                                    src="assets/images/add-plus-icom.svg"

                                                                    alt=""> Add</button></td>

                                                    </tr>

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
        
        });
</script>
@endsection

