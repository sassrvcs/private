@extends('layouts.app')
@section('content')
<!-- ================ start: common-inner-page-banner ================ -->
<section class="common-inner-page-banner about_adjust_banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png')}})">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg')}}"></span>
                </div>
                <figcaption>My <span>Account</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="{{ url('')}}">Home</a></li>
                <li><a>My Account</a></li>
            </ul>
        </div>
        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <div class="icon-container">
                <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg')}}">
            </div>
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: common-inner-page-banner ================ -->
<!-- ================ start: customer_login ================ -->
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="woocommerce">
            <div class="row woo-account">
                @include('layouts.navbar')
                <div class="woocommerce-MyAccount-content col-md-12">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="p-2">
                        <h3>My Account</h3>
                        <p>Welcome back <strong>@if(!empty($user)){{$user->forename." ".$user->surname}}@endif</strong>. From here you can keep track of your orders, check their status and manage your account details.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('my_details')}}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2 my-auto">
                                        <h3>My Details<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Update your details including account username, password, contact addresses, phone numbers, and notification preferences.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('companies-list') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Companies<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View, update, file changes at Companies House, and purchase services from the Shop area, for your companies.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('order-history') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Order History<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View your orders - complete, incomplete and in progress.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('invoice-history') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>My Invoice History<span class="float-end link-primary" style="font-size:13px;">view all<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>View your invoice and payment history. Download or print your invoices.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('import-companies') }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>Import a company<span class="float-end link-primary" style="font-size:13px;">Go<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Click on the go button and enter the identification details for the company you wish to import.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('company_services', ['service_name' => 'renewals']) }}">
                                <div class="card equalheight border">
                                    <div class="card-header p-2">
                                        <h3>Service Renewals<span class="float-end link-primary" style="font-size:13px;">View All<i class="fa-solid fa-arrow-right-long ms-2"></i></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Click on the view all button and view/purchase all the services as per your needs.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="needLittleHelp-sec">

    <div class="custom-container">

        <div class="left_div">

            <ul class="contactUl" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                <li>

                    <div class="icon-container">

                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">

                    </div>

                    <div class="text-container">

                        <h3>Call Us: </h3>

                        <h2><a href="tel:020 3002 0032">020 3002 0032</a></h2>

                    </div>

                </li>

                <li>

                    <div class="icon-container">

                        <img src="{{ asset('frontend/assets/images/call-green-icon.svg') }}">

                    </div>

                    <div class="text-container">

                        <h3>Mail us: </h3>

                        <h2><a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></h2>

                    </div>

                </li>

            </ul>

        </div>

       <div class="right_div" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                <div class="sec-title1 mb-0">

                    <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="text-white">Need a <br>little help?</h2>

                    <p>We love talking to you when it comes to creating something new. We want you to remember us

                        always,

                        let’s be good for good and for a good reason. Reach us through your voice or writing.</p>

                </div>



            </div>

    </div>

</div>

<!-- ================ end: needLittleHelp-sec ================ -->

<!-- ================ start: clientReviews-sec01 ================ -->

<div class="clientReviews-sec01">

    <div class="custom-container">

        <div class="sec-title1 text-center">

            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Client <span>Reviews</span></h2>

        </div>

        <div class="clientReviews-sec01-wrapper">

            <div class="left_div">

                <ul class="clientReviews-sec01-slider" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                    <li>

                        <div class="clientReviews-sec01-slider-box">

                            <div class="qutes1">

                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">

                            </div>

                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>

                            <figure>

                                <div class="user-img-container">

                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">

                                </div>

                                <figcaption>

                                    <h3>David John</h3>

                                    <h4>CEO, Our Company</h4>

                                </figcaption>

                            </figure>

                        </div>

                    </li>

                    <li>

                        <div class="clientReviews-sec01-slider-box">

                            <div class="qutes1">

                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">

                            </div>

                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>

                            <figure>

                                <div class="user-img-container">

                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">

                                </div>

                                <figcaption>

                                    <h3>David John</h3>

                                    <h4>CEO, Our Company</h4>

                                </figcaption>

                            </figure>

                        </div>

                    </li>

                    <li>

                        <div class="clientReviews-sec01-slider-box">

                            <div class="qutes1">

                                <img src="{{ asset('frontend/assets/images/qutes1.svg') }}">

                            </div>

                            <p>Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit. Vestibulum ligula augue, dignissim eu sem ac, convallis maximus elit.Vestibulum ligula.</p>

                            <figure>

                                <div class="user-img-container">

                                    <img src="{{ asset('frontend/assets/images/user-img-container1.png') }}">

                                </div>

                                <figcaption>

                                    <h3>David John</h3>

                                    <h4>CEO, Our Company</h4>

                                </figcaption>

                            </figure>

                        </div>

                    </li>

                </ul>

            </div>

            <div class="right_div" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">

                <div class="clientReviews-sec01-f-Pic1"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic1.png') }}"></div>

                <div class="clientReviews-sec01-f-Pic2"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic2.png') }}"></div>

                <div class="clientReviews-sec01-f-Pic3"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic3.png') }}"></div>

                <div class="clientReviews-sec01-f-Pic4"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic4.png') }}"></div>

                <div class="clientReviews-sec01-f-Pic5"><img src="{{ asset('frontend/assets/images/clientReviews-sec01-fPic5.png') }}"></div>

            </div>

        </div>

    </div>

</div>
<div class="ourBankingPartners-sec01">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our Banking
                <span>Partners</span></h2>
        </div>
        <ul data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            @foreach ($businessdata as $index => $data)
                <li>
                    <div class="logo-container">
                        <img src="{{ $data->getFirstMediaUrl('business_banking_images') }}">
                    </div>
                </li>
            @endforeach

            @foreach ($accounting as $item => $data)
                <li>
                    <div class="logo-container">
                        <img src="{{ $data->getFirstMediaUrl('accounting_software_images') }}">
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
<!-- ================ end: ourBankingPartners-sec01 ================ -->
<!-- ================ start: faq-002-sec ================ -->


<!-- ================ end: comparePackages-sec ================ -->



<!-- ================ start: faq-002-sec ================ -->

<div class="faq-002-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">Frequently Asked <span>Questions</span></h2>
        </div>

        <div id="accordion" class="faq-002-accordion-sec">
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="heading221">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne221" aria-expanded="false" aria-controls="collapseOne">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Why you need a company?</div>
                    </button>
                </div>

                <div id="collapseOne221" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>You will need a limited company to protect yourself and your personal assets from business-related debts. There are numerous benefits of using limited companies for your trading activities, but one of the most important is debt protection..</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="heading225">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse225" aria-expanded="false" aria-controls="collapseOne">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">When can I start trading?</div>
                    </button>
                </div>

                <div id="collapse225" class="collapse" aria-labelledby="heading225" data-parent="#accordion">
                    <div class="card-body">
                        <p>Your company can begin trading as soon as you receive an email containing your Certificate of Incorporation. It can immediately enter into contracts, make sales, hire workers, and purchase goods and services. Even though it does not yet have a bank account, it has full legal capacity.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne221">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne227" aria-expanded="false" aria-controls="collapseOne221">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What kind of companies i can form here?</div>
                    </button>
                </div>

                <div id="collapseOne227" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>A company limited by share: This can be formed by a single individual who serves as the sole shareholder and director. Or by a large number of shareholders with a large number of directors. They are the most common company trading structure in the UK.

                            Partnerships with a limited liability(LLP) : Generally fromed by formed by Professional organisations such as accountants, engineers, and solicitors.

                            Companies Limited by Guarantee : Mostly formed by Non -profit organisations such as clubs, associations, charities, and social enterprises.Instead of shareholders, they have guarantors who guarantee a small sum. A limited by guarantee company can be formed with only one guarantor and director.

                            Public limited company(PLC) : It’s for those who wish to set up a public limited company and require atleast two directors to form PLC,the PLC package offers a range of services that helps in the easy formation of your company at an affordable rate.

                            Eseller : Its perfect for those who wants to establish an eCommerce company willing to sell products or services through their e-platform. This is ideal for those willing to establish and sell through their eCommerce websites.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne228">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne228" aria-expanded="false" aria-controls="collapseOne228">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Can I form a Company being a Non-UK resident?</div>
                    </button>
                </div>

                <div id="collapseOne228" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Yes you can,please choose our Non-resident package to form your company in the UK without hesitation.You dont have be a resident of the UK to form your company.However you do need to have a UK registered office,please check our Registered Office Service under Address Services.

                            What information is required to set up a company?

                            Your limited company formation can be processed in minutes in few simple steps with little information.You need to choose a name for your company through our company name checker,a registered company address,director details,shareholders details,secretary details and person with the significant control(PSC)details.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne229">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne229" aria-expanded="false" aria-controls="collapseOne228">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Do i need to provide any proof of ID?</div>
                    </button>
                </div>

                <div id="collapseOne229" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>It is a legal requirement for all the company formation agents,including us,to verify your proof of identification and address.Over 90% of our customers automatically pass our digital ID checks and those who don’t,can go to SmartSearch or Credas app and check for more information.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne230">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne230" aria-expanded="false" aria-controls="collapseOne228">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Do you need a buisess bank account?</div>
                    </button>
                </div>

                <div id="collapseOne230" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>There is no legal obligation to have a business bank account but its quite tough to trade without a bank account,if you want to run your daily buisness transactions you must have a buisness bank account to be in shape.We get you a free buisness bank account with every limited company you form as per your business needs.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne231">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne231" aria-expanded="false" aria-controls="collapseOne231">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How Formationshunt is going to help?</div>
                    </button>
                </div>

                <div id="collapseOne231" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>As a company formation agent we guide through different processess to form a company which best suits your requirements.We assist you,starting from choosing a name for your company,getting it approved through the company house once selected with full secretarial support and a free business bank account.Not only that,we get you all the necessary tools and support for your business to remain complaint so that you to walk through the ladder of success.At Formationshunt our customer support team works with a motive and mission of being good for good and for a good reason.We are available 24hrs. to provide you with email and telephone support all your lifetime.We also provide you with our free company online manager where you get full range of services and access to all your company details from one place.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne232">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne232" aria-expanded="false" aria-controls="collapseOne232">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Where can i go wrong?</div>
                    </button>
                </div>

                <div id="collapseOne232" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Most people get confused while forming a new company and dont know what choices to make,where to fill what and make mistakes.It further leads to companies getting declined or rejected from the company house.

                            But you dont need to worry.Once your company is formed, all the errors you made can be corrected, and in most cases, doing so won’t cost you much. We advise you to purchase our pre-submission review service for £4.99 and save yourself from the risk of making mistakes while ordering or facing rejections. By doing this, you remain confident that before your company application is sent to Companies House, one of our professionals will evaluate all the details and gets all verified before submission.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne233">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne233" aria-expanded="false" aria-controls="collapseOne233">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Can i upgrade after buying a package?</div>
                    </button>
                </div>

                <div id="collapseOne233" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Yes,you can upgrade by adding each of the services you need seperately from your company manager portal at an extra.However,you miss the discounted rates for expensive items listed under a package.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne234">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne234" aria-expanded="false" aria-controls="collapseOne234">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Do you need sign any paper work?</div>
                    </button>
                </div>

                <div id="collapseOne234" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Follow our 4 simple steps under the Homepage section ‘We make company formation easy.’ Its completely online,requires no paperwork or signatures, and you can have your company papers in your possession in next 24 hours.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-235">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-235" aria-expanded="false" aria-controls="collapseOne-235">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Why doing it through us online?</div>
                    </button>
                </div>

                <div id="collapseOne-235" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Through our website, you can simply register a limited company or LLP for as little as £12.99 + VAT, saving you between £200 and £300 in attorney or accountant fees.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-236">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-236" aria-expanded="false" aria-controls="collapseOne-236">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How can i save my house address from being public?</div>
                    </button>
                </div>

                <div id="collapseOne-236" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>It’s mandatory for a company to provide with atleast two official addresses during company registeration process for public record: a registered office address and a director’s service address.Most people prefer not to use their home address in order to maintain their privacy. In that case we suggest you to check our privacy,professional,prestige or all inclusive packages.You can also add address services seperately from your company manager portal at a little extra cost.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-237">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-237" aria-expanded="false" aria-controls="collapseOne-237">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What comes with a basic package?</div>
                    </button>
                </div>

                <div id="collapseOne-237" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>This is the most common and popular type of company formation which is designed to share and generate profits.But at the same time provides protection to those who owns them(shareholders) and to those as well who runs them(directors).Limited Companies are the most common among investors, banks, suppliers, and customers,used to protect a company name.You can start a limited company with only £1 as capital investment.This package covers online company formation at a minimal rate with your company documents sent over digitally.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-238">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-238" aria-expanded="false" aria-controls="collapseOne-238">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How many directors and shareholders needed?</div>
                    </button>
                </div>

                <div id="collapseOne-238" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>A limited company requires one shareholder and atleast one director or both can be the same person. One can form a limited company with only £1 capital and atlast 1 share of £1 needs to be issued.The best part is you just need only £1 as capital investment to start a business with a limited company. When a group of companies is formed, other firms can also serve as shareholders and directors of limited organization.It needs atleast one natural person to serve as a director of a limited company.

                            A company’s shareholders are its co-owners.The number of shares owned by each shareholder represents his or her stake in a company. A company can have an unlimited number of shareholders. Directors manage a company’s operations and are accountable to its shareholders. Small businesses, in particular, have shareholders who are also directors.</p>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-239">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-239" aria-expanded="false" aria-controls="collapseOne-239">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What is registered office address?</div>
                    </button>
                </div>

                <div id="collapseOne-239" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Every company that registers with the companies house is required to have a physical address in the country where they do business.The registered office is the company’s official address and all official communications will be sent to that address.Official communications means the communications released by HMRC (the UK Tax Authority),Companies House,and UK Courts of Law.The Registered Office must be a physical address where documents can be served on the directors. In the event of court proceedings, the documents will be received and brought to the attention of the intended recipient. As a result, it cannot be a PO Box unless it is part of a complete address, which includes a street address and a postcode.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-240">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-240" aria-expanded="false" aria-controls="collapseOne-240">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How to renew services that comes with a package?</div>
                    </button>
                </div>

                <div id="collapseOne-240" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Go to our online company manager section,check the services showing expired to renew.In this package you need to renew the services like registered office address and domain after a year.Call answering and phone number services needs renewal after a month.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-241">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-241" aria-expanded="false" aria-controls="collapseOne-241">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How to register VAT with any package?</div>
                    </button>
                </div>

                <div id="collapseOne-241" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>You can simply add VAT registration from our services menu while buying this package.If your company’s taxable turnver exceeds £85,000 in a year you must register for VAT.You need to report the amount of output and input taxes to HRMC with VAT return filing software online,usually completed every quarter.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-242">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-242" aria-expanded="false" aria-controls="collapseOne-242">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">Is it necessary for me register VAT?</div>
                    </button>
                </div>

                <div id="collapseOne-242" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>No not unless your company turnover is expected to exceed £85000 in a year.There is a standard rate of 20% for most of the products and services.With registeration you get a VAT number with certificate from HMRC and first VAT return due date.</p>
                    </div>
                </div>
            </div>


            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-243">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-243" aria-expanded="false" aria-controls="collapseOne-243">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">How buisness telephone services work?</div>
                    </button>
                </div>

                <div id="collapseOne-243" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>This package offers you with a free UK phone number for 1month where we provide you with a regional phone number for your buisness to divert all the calls at your desired phone number for you to attend with ease.

                            We also offer you 1 month of free call answering services with this package where you a professional receptionist assigned for your organisation to handle business calls from Mon-Fri between 8.30am-5.30pm.All the calls will be asnwered by the receptionist in your company name as per your instructions.Your receptionist will transfer the incoming calls and let you know about them or she can take a message and send it to you through email within 10minutes of the call.After a month you can renew the services further if you like.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-244">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-244" aria-expanded="false" aria-controls="collapseOne-244">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What is first confirmation statement filing?</div>
                    </button>
                </div>

                <div id="collapseOne-244" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>The confirmation provides accurate and up-to-date information about the company such as company’s registered address,directors,shares,and persons who posses significant control.With this package we collect few information from you and file the CS01 form with the company house free of cost for the 1st year.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-245">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-245" aria-expanded="false" aria-controls="collapseOne-245">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What is GDPR?</div>
                    </button>
                </div>

                <div id="collapseOne-245" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>We have compiled a set of legal compliance documents to make things easier for you and to save you money on legal fees.We created this legal document template to assist you in complying with English and EU laws, including the GDPR. It will also assist you in managing the legal risks of publishing a website, negotiating and entering into contracts, dealing with intellectual property rights, and so on.You must comply with government regulations, legal policies, and the GDPR. If you violate GDPR, you could face a fine of up to £15 million.</p>
                    </div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="card-header" id="headingOne-246">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-246" aria-expanded="false" aria-controls="collapseOne-246">
                        <div class="plus-minus-btn">
                            <img src="{{ asset('frontend/assets/images/plus-whtie.svg')}}" class="plus">
                            <img src="{{ asset('frontend/assets/images/minus-white.svg')}}" class="minus">
                        </div>
                        <div class="textp">What is PAYE registration?</div>
                    </button>
                </div>

                <div id="collapseOne-246" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>If you are planning to take a salary yourself, or want to pay an employee whose salary is more than £675/month and in the next 4 weeks, you’ll have to register as an employer with HMRC. Once you register as an employer, you can set up a payroll system to make tax and National Insurance payments to HMRC yourself.We submit your application securely, after which HMRC sends the entire information pack with PAYE reference and accounts office reference within 5-7 working days.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ================ end: customer_login ================ -->
@endsection
