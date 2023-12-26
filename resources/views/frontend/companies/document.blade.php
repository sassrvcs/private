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
                                
                                <div class="tab-pane show active" id="pills-profile" role="tabpanel"

                                    aria-labelledby="pills-profile-tab">

                                    <div class="overview-wrap">

                                        <div class="ttl">

                                            <h3>Company Overview</h3>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec odio

                                                fringilla, finibus leo a, elementum neque. Praesent et dapibus neque, et

                                                aliquam dolor. Nulla in dolor et lectus accumsan tristique sed nec erat.

                                                Donec dignissim, neque sit amet viverra sollicitudin, enim tellus

                                                accumsan sapien.</p>

                                        </div>

                                        <div class="table-responsivr mb-4">

                                            <table class="table">

                                                <tbody>

                                                    <tr>

                                                        <td><strong>Company Summary</strong></td>

                                                        <td width="167">

                                                            <button class="ch-ed-btn"

                                                                onclick="window.location.href='/review/create?order={{ $_GET['order'] }}&section=Review&step=download'"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt="">Download</button>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td><strong>Memorandum & Articles (Full Document)</strong></td>

                                                        <td width="167"><button class="ch-ed-btn"

                                                                onclick="window.location.href='{{ route('memoArticlesFull', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt=""> Download</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td><strong>Memorandum & Articles (Document Only)</strong></td>

                                                        <td width="167"><button class="ch-ed-btn"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt=""> Download</button></td>

                                                    </tr>

                                                    <tr>

                                                        <td><strong>Incorporation Certificate </strong></td>

                                                        <td width="167">

                                                            @if ($pdfcontent)

                                                                <button class="ch-ed-btn"

                                                                    onclick="window.location.href='{{ route('incorporate_certificate', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'">

                                                                @else

                                                                    <button class="ch-ed-btn"

                                                                        onclick="alert('Certificate isn`t prepared for this company yet, please try after some time')">

                                                            @endif



                                                            <img src="assets/images/download-icon.svg" alt="">

                                                            Download</button>

                                                        </td>



                                                    </tr>

                                                    <tr>

                                                        <td><strong>Share Certificate</strong></td>

                                                        <td width="167"><button

                                                                onclick="window.location.href='{{ route('generate_certificate', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"

                                                                class="ch-ed-btn"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt=""> Download</button></td>

                                                    </tr>

                                                    <!-- <tr>

                                                        <td><strong>E-filing information</strong></td>

                                                        <td width="167">

                                                            <button class="ch-ed-btn"

                                                                onclick="window.location.href='{{ route('efilling_pdf', ['order' => $_GET['order'], 'c_id' => $_GET['c_id']]) }}'"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt="">Download</button>

                                                            <a target="blank"

                                                                href="{{ route('efilling_pdf') . '?order=' . $_GET['order'] }}"

                                                                class="ch-ed-btn"><img

                                                                    src="assets/images/download-icon.svg"

                                                                    alt="">Download</a>

                                                        </td>

                                                    </tr> -->

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

