@extends('layouts.app')
@section('content')
    <!-- ================ start: main-banner ================ -->
    <div class="position-relative overflow-hidden main-banner-outer">
        <div class="main-banner" style="background-image: url({{ asset('frontend/assets/images/main-banner.png')}});">
            <div class="custom-container">
                <div class="caption-box">
                    <div id="response-class">
                        <h1 data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">Formations made easier starting from <span>£12.99</span></h1>
                        <p data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">Form a UK limited company in minutes</p>
                    </div>

                    {{-- <div id="available-company" style="display: none">
                        <div class=" align-items-center">
                            <div class="col-md-6">
                                <span class="icon"><i class="fa-regular fa-circle-check"></i></span>
                                <h2 id="search-company-name"></h2>
                                <h3 style="color:#87CB28;" id="is_sensitive_word_row" style="display: none">Please note: The word(s) <span id="is_sensitive_word"></span> is deemed sensitive. You may need to supply additional information to use it.</h3>
                                <h3 style="color:#87CB28;">Congratulations! This company name is available.</h3>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary wow zoomIn">Choose Package<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
                        </div>
                        <div class="hhr-text">Search for another name</div>
                    </div>

                    <div id="not-available-company" style="display: none">
                        <div class="search-result-error mb-4">
                            <span class="icon"><i class="fa-regular fa-circle-xmark"></i></span>
                            <h2 id="search-company-name"></h2>
                            <h3 style="color:white;">Error! This company name is Not available.</h3>
                        </div>
                        <div class="hhr-text">Search for another name</div>
                    </div> --}}

                    <div class="col-md-7 mb-3 " id="result_show" style="display: none">
                        <div class="search-result mb-4">
                            <div class=" align-items-center">
                               <div class="col-md-12">
                                  <span class="icon"><i class="fa fa-check-circle-o"></i></span>
                                  <h2 id="search-company-name"></h2>
                                  <h3 style="color:#87CB28;">Congratulations! This company name is available.</h3>
                                  <h3 style="color:#87CB28;" id="is_sensitive_word_row" style="display: none">Please note: The word(s) <span id="is_sensitive_word"></span> is deemed sensitive. You may need to supply additional information to use it.</h3>
                               </div>
                               <div class="col-md-4 "><a href="https://formationshunt.co.uk/packages/compare-packages/" class="btn btn-primary wow zoomIn">Choose Package<i class="fa fa-long-arrow-right ms-2"></i></a></div>
                            </div>
                         </div>
                         <div class="hhr-text">Search for another name</div>

                         <div class="search-box" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
                            <input type="text" id="company-name" class="search-input" placeholder="Enter a company name to check if its available">
                            <button type="button" id="search" class="search-btn theme-btn-primary">Search</button>
                        </div>
                        <p class="text-capitalize" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">14+years of experience in helping thousands of people to start their business in UK</p>
                        <div class="image-stamp" data-aos="fade-right" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">
                            <a><img src="{{ asset('frontend/assets/images/hmCompHouse.png.svg')}}"></a>
                        </div>
                    </div>

                    <div id="not-available-company" style="display: none">
                        <div class="search-result-error mb-4">
                            <span class="icon"><i class="fa-regular fa-circle-xmark"></i></span>
                            <h2 id="search-company-name"></h2>
                            <h3 style="color:white;">Error! This company name is Not available.</h3>
                        </div>
                        <div class="hhr-text">Search for another name</div>
                    </div>

                    <div id="search-box-val">
                        <div class="search-box" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
                            <input type="text" id="company-name" class="search-input" placeholder="Enter a company name to check if its available">
                            <button type="button" id="search" class="search-btn theme-btn-primary">Search</button>
                        </div>
                        <p class="text-capitalize" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">14+years of experience in helping thousands of people to start their business in UK</p>
                        <div class="image-stamp" data-aos="fade-right" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">
                            <a><img src="{{ asset('frontend/assets/images/hmCompHouse.png.svg')}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-banner-left-floating">
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <p><a href="tel:020 3002 0032">020 3002 0032</a></p>
            </div>
            <div class="icon-box" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/consultations-phone-icon.svg')}}">
            </div>
        </div>
        <div class="main-banner-right-floating">
            <div class="icon-box" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/hand-holding-globe-svgrepo-com.svg')}}">
            </div>
            <div class="text-box">
                <p>Full Company</p>
                <p>Secretary Services</p>
            </div>
        </div>
    </div>
    <!-- ================ end: main-banner ================ -->

    <!-- ================ start: companyFormationPackages-sec ================ -->
    <section class="companyFormationPackages-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Company <span>Formation Packages</span></h2>
            </div>
            <div class="companyFormationPackages-content">
                <div class="tab-menus">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                            <a href="#" class="active">Limited Company</a>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-once="true">
                            <a href="#">Non-Residents</a>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-once="true">
                            <a href="#">LLP</a>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="500" data-aos-once="true">
                            <a href="#">Guarantee</a>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
                            <a href="#">eSeller</a>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-once="true">
                            <a href="#">PLC</a>
                        </li>
                    </ul>
                </div>
                <div class="companyFormationPackages-lists">
                    <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true">
                        <div class="cfp-list-box active">
                            <div class="top-icon-box">
                                <div class="inner-box">
                                    <img src="{{ asset('frontend/assets/images/companyFormationPackages2.svg')}}">
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>Digital</h4>
                                <h3>£12.99</h3>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                            </ul>
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                <a href="#" class="read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="450" data-aos-duration="1200" data-aos-once="true">
                        <div class="cfp-list-box">
                            <div class="top-icon-box">
                                <div class="inner-box">
                                    <img src="{{ asset('frontend/assets/images/companyFormationPackages3.svg')}}">
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>Digital</h4>
                                <h3>£12.99</h3>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                            </ul>
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                <a href="#" class="read-more-btn">Read More</a>
                            </div>
                        </div>

                    </div>
                    <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1400" data-aos-once="true">
                        <div class="cfp-list-box">
                            <div class="top-icon-box">
                                <div class="inner-box">
                                    <img src="{{ asset('frontend/assets/images/companyFormationPackages4.svg')}}">
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>Digital</h4>
                                <h3>£12.99</h3>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                            </ul>
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                <a href="#" class="read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="550" data-aos-duration="1600" data-aos-once="true">
                        <div class="cfp-list-box">
                            <div class="top-icon-box">
                                <div class="inner-box">
                                    <img src="{{ asset('frontend/assets/images/companyFormationPackages5.svg')}}">
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>Digital</h4>
                                <h3>£12.99</h3>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                            </ul>
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                <a href="#" class="read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="cfp-list-col" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1800" data-aos-once="true">
                        <div class="cfp-list-box">
                            <div class="top-icon-box">
                                <div class="inner-box">
                                    <img src="{{ asset('frontend/assets/images/companyFormationPackages1.svg')}}">
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>Digital</h4>
                                <h3>£12.99</h3>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>LTD Company</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>24-72 Hour Online Formation</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Digital Certificate(s)</p>
                                </li>
                                <li>
                                    <div class="icon-container">
                                    </div>
                                    <p>Free Business Bank Account</p>
                                </li>
                            </ul>
                            <div class="bottom-actions">
                                <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>
                                <a href="#" class="read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="compare-actions" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                    <a href="#" class="theme-btn-primary compare-btn">Compare All Packages</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: companyFormationPackages-sec ================ -->

    <!-- ================ start: makeCompanyFE-sec ================ -->
    <section class="makeCompanyFE-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">We Make Company <span>Formation Easy</span></h2>
            </div>
            <div class="makeCompanyFE-steps">
                <div class="makeCompanyFE-step-col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                    <div class="makeCompanyFE-step-box">
                        <div class="inner-border">
                            <div class="icon-box">
                                <img src="{{ asset('frontend/assets/images/zoom-white-icon.png')}}">
                            </div>
                            <h3>STEP-1</h3>
                            <h4>Name of the Company</h4>
                            <p>To see if your company name is available for registration, start by searching for it.</p>
                        </div>
                    </div>
                </div>
                <div class="makeCompanyFE-step-col" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000" data-aos-once="true">
                    <div class="makeCompanyFE-step-box">
                        <div class="inner-border">
                            <div class="icon-box">
                                <img src="{{ asset('frontend/assets/images/select-white-icon.png')}}">
                            </div>
                            <h3>STEP-2</h3>
                            <h4>Choose the right package</h4>
                            <p>Choose the bundle that suits best for your business needs from the variety of options available.</p>
                        </div>
                    </div>
                </div>
                <div class="makeCompanyFE-step-col" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-once="true">
                    <div class="makeCompanyFE-step-box">
                        <div class="inner-border">
                            <div class="icon-box">
                                <img src="{{ asset('frontend/assets/images/cart-white-icon.png')}}">
                            </div>
                            <h3>STEP-3</h3>
                            <h4>Checkout</h4>
                            <p>Go ahead and checkout. Additionally, you will have the choice to add other services for your business.</p>
                        </div>
                    </div>
                </div>
                <div class="makeCompanyFE-step-col" data-aos="fade-up" data-aos-delay="250" data-aos-duration="2000" data-aos-once="true">
                    <div class="makeCompanyFE-step-box">
                        <div class="inner-border">
                            <div class="icon-box">
                                <img src="{{ asset('frontend/assets/images/document-white-icon.png')}}">
                            </div>
                            <h3>STEP-4</h3>
                            <h4>Share Company Details</h4>
                            <p>Share all the necessary details about your firm and leave the rest to us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: makeCompanyFE-sec ================ -->

    <!-- ================ start: ourServices-sec ================ -->
    <section class="ourServices-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our <span>Services</span></h2>
            </div>
            <div class="ourServices-steps">
                <div class="ourServices-step-col">
                    <div class="ourServices-step-box">
                        <div class="image-container" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                            <img src="{{ asset('frontend/assets/images/ourServices1.png')}}">
                            <div class="overlay-text">
                                <h3>Empower <span>your buisness</span></h3>
                            </div>
                        </div>
                        <div class="text-container" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                            <h3>Add <span>more value</span></h3>
                            <p>Our company services include Confirmation Statement Service, Company
                                Dissolution, Company Name Change, Director Appointment & Resignation, Full
                                Company Secretary Service, Issue Of Share Services,Business Telephone Services
                                and more.</p>
                            <h3>Simplify <span>service renewals</span></h3>
                            <p>If you wish to extend or renew any service, you can do so on our website. Log in to your account  online company manager to extend the required services.</p>
                            <a href="#" class="read-more-btn theme-btn-primary">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="ourServices-step-col">
                    <div class="ourServices-step-box">
                        <div class="image-container" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                            <img src="{{ asset('frontend/assets/images/ourServices2.png')}}">
                            <div class="overlay-text">
                                <h3>Let’s keep <span>it personal</span></h3>
                            </div>
                        </div>
                        <div class="text-container" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                            <h3>When you dont want your personal <span>address to go public</span></h3>
                            <p>Address services helps you with streamlined location registration process. Get a registered office address ,directors service address.</p>
                            <h3>Achieve <span>your mission</span></h3>
                            <p>Our mission to make you feel complete and comfortable after you register your company with us. Your company needs to be compliant and fully functional. We offer you with our range of services like business email, logo design, VAT registration, Data protections registration, GDPR registration which covers you up.</p>
                            <a href="#" class="read-more-btn theme-btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="need-little-help">
                <div class="left-box" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <h3>Need a little help?</h3>
                    <p>We love talking to you when it comes to creating something new. We want you to remember us always, let’s be good for good and for a good reason. Reach us through your voice or writing.</p>
                </div>
                <div class="right-box" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg')}}">
                            <div class="text-box"><span>Call Us:</span> <a href="tel:020 3002 0032">020 3002 0032</a></div>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_round-mail.svg')}}">
                            <div class="text-box">
                                <span>mail to:</span> <a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: ourServices-sec ================ -->
    <!-- ================ start: whatmakedifferent-sec ================ -->
    <section class="whatmakedifferent-sec">
        <div class="image-container" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <img src="{{ asset('frontend/assets/images/whatmakedifferent-pic.png')}}">
        </div>
        <div class="text-container" data-aos="fade-left" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <h2>What makes us different?</h2>
            <h4>Company House Authorised Agent</h4>
            <p>After dealing with so many companies and their problems we have established ourselves as an experienced company formation agent and become an authorised E-filing agent of Companies House, a body responsible for UK limited company formation.</p>
            <h4>We Get your company registered in the UK effortlessly</h4>
            <p>Your company formation process goes smoothly with a click of a button.You give us the name of the company and details and we do all your paperwork to get your company approved within hours.</p>
            <h4>One Stop for all your business needs</h4>
            <p>Once you provide all the required details like your company name, the details of the company directors, shareholders and more.We help you further with registered office address,service address incase if you don’t have any. We also offer registration services for Limited Liability Partnerships and Limited by Guarantee Companies and Registration for Non-residents.</p>
            <h4>We count hours not days to form a company</h4>
            <p>The process of company formation is convenient when done by professionals. It usually takes about 5 to 10 minutes to complete the application and 3-6 working hours for the registration to complete after approval. The documents reach you in the meantime digitally.</p>
        </div>
    </section>
    <!-- ================ end: whatmakedifferent-sec ================ -->

    <!-- ================ start: aboutUs-sec ================ -->
    <section class="aboutUs-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">About Us</h2>
            </div>
            <div class="left-right-info-content">
                <div class="left-info" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <h3>Who Are <span>We?</span></h3>
                    <p>With expertise and a rich legacy, we stand tall amongst the leading company formation agent the UK. We are a team of experienced individuals working dedicatedly to provideassistance to clients across the globe, helping them facilitate the process of company formation in the UK. Our bouquet of services also deals with providing expert advice on corporate governance, reporting requirements, and more. We help you find effective solutions for your business. Our agenda is to reduce your burden so that you can streamline your business operations and focus on growth.</p>
                </div>
                <div class="right-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                    <h3>Our <span>Mission</span></h3>
                    <p>Our mission is to serve customers and help them with company formations in the UK in the best way possible. We house a team of professionals to support our clientele throughout the company formation process.</p>
                    <h3>Our <span>Vision</span></h3>
                    <p>Our vision is to ensure the business improvement of our clients. We look forward to offering a holistic service that deals with addressing both legal and general procedures and helping clients with documentation and easing up the process of company formation.</p>
                </div>
            </div>

            <ul id="aboutUs-counter" class="aboutUs-counter">
                <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                    <span class="count" data-count="100">
                    </span>
                    <p>UK companies formed by Formations Hunt</p>
                </li>
                <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="2000" data-aos-once="true">
                    <span class="count" data-count="10">
                    </span>
                    <p>Informative Blog Posts</p>
                </li>
                <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="2500" data-aos-once="true">
                    <span class="count" data-count="20">
                    </span>
                    <p>Team Members</p>
                </li>
                <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="3000" data-aos-once="true">
                    <span class="count" data-count="14">
                    </span>
                    <p>Years of Experience</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- ================ end: aboutUs-sec ================ -->

    <!-- ================ start: blog-sec ================ -->
    <section class="blog-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><span>BLOG</span></h2>
            </div>
            <ul class="blog-slider" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <li>

                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog1.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog2.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog3.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog1.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog2.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="blog-slider-box">
                        <img src="{{ asset('frontend/assets/images/blog3.png')}}">
                        <div class="overlay-texts">
                            <h4>How to Register for PAYE as an Employer?</h4>
                            <p>8 May 2023</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ================ end: blog-sec ================ -->

    <!-- ================ start: our-banking-sec ================ -->
    <section class="our-banking-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our Banking <span>Partners</span></h2>
            </div>
            <ul class="our-banking-slider" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/barclays-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cashplus-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/wise-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/payoneer-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/anna-logo.png')}}">
                    </div>
                </li>
                <li>
                    <div class="our-banking-item">
                        <img src="{{ asset('frontend/assets/images/cardone-Logo.png')}}">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- ================ end: our-banking-sec ================ -->

    <!-- ================ start: formationsMade-easier-sec ================ -->
    <section class="formationsMade-easier-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Formations made easier starting from <span>£12.99</span></h2>
                <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">To check for availability and view our packages, enter the name of your organization.</p>
            </div>
            <div class="search-box" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <input type="text" class="search-input" placeholder="Enter a company name to check if its available">
                <button type="button" class="search-btn theme-btn-primary">Search</button>
            </div>
        </div>
    </section>
    <!-- ================ end: formationsMade-easier-sec ================ -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                var companyName = $('#company-name').val();

                var searchButton = $(this);
                searchButton.prop('disabled', true).text('Searching...');

                // Make the GET request using Axios
                axios.get('/search-companie', {
                    params: {
                        'search': companyName
                    }
                })
                .then(function (response) {
                    // Handle the response data here
                    console.log(response.data);

                    if(response.data.message == 'This company name is available.') {
                        $('#response-class').hide();
                        $('#search-company-name').text(companyName);

                        if(response.data.is_sensitive === 1) {
                            $('#is_sensitive_word_row').show(110);
                            $('#is_sensitive_word').text(response.data.is_sensitive_word);
                        }
                        
                        $('#result_show').show(100);
                        $('#search-box-val').show(100);
                    } else {
                        // not-available-company
                        $('#response-class').hide();
                        $('#search-company-name').text(companyName);
                        $('#not-available-company').show(100);
                    }
                })
                .catch(function (error) {
                    // Handle any errors that occurred during the request
                    console.error(error);
                })
                .finally(function () {
                    // Re-enable the button and change the text back to "Search"
                    searchButton.prop('disabled', false).text('Search');
                });
            });
        });
    </script>
@endsection