<!-- ================ start: main-footer ================ -->
<div class="main-footer">
    <div class="scroll_up">
        <a href="#"><img src="{{ asset('frontend/assets/images/up-arrow.png')}}"></a>
    </div>
    <div class="custom-container">
        <div class="main-footer-row">
            <div class="main-footer-col packages" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="main-footer-box">
                    <h3>Packages</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{ route('package')}}">Compare Packages</a>
                        </li>
                        <li>
                            <a href="{{ route('digital_package')}}">Digital Package</a>
                        </li>
                        <li>
                            <a href="{{ route('privacy_package')}}">Privacy Package</a>
                        </li>
                        <li>
                            <a href="{{route('professional_package')}}">Professional Package</a>
                        </li>
                        {{-- <li> --}}
                            {{-- <a href="{{route('prestige_package')}}">Prestige Package</a> --}}
                        {{-- </li> --}}
                        <li>
                            <a href="{{route('all_inclusive_package')}}">All Inclusive Package</a>
                        </li>
                        <li>
                            <a href="{{route('non_residents_package')}}">Non Residents</a>
                        </li>
                        <li>
                            <a href="{{route('llp_package')}}">LLP</a>
                        </li>
                        <li>
                            <a href="{{route('guarantee_package')}}">Guarantee</a>
                        </li>
                        <li>
                            <a href="{{route('e_seller_package')}}">Eseller</a>
                        </li>
                        <li>
                            <a href="{{route('plc_package')}}">PLC Package</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-footer-col companyServices" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <div class="main-footer-box">
                    <h3>Company Services</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{route('company_services', 'confirmation-statement-service')}}">Confirmation Statement Service</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'company-dissolution')}}">Company Dissolution</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'company-name-change')}}">Company Name Change</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'director-appointment-resignation')}}">Director's Appointment or Resignation</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'full-company-secretary-service')}}">Company Secretary Service</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'issue-of-share-services')}}">Issue of Share Services</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'transfer-of-share-services')}}">Transfer of Share Services</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'apostilled-documents-service')}}">Apostilled Documents Service</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'business-telephone-services')}}">Business Telephone Service</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-footer-col addressServices" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="main-footer-box">
                    <h3>Address Services</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{route('company_services', 'directors-service-address')}}">Directors Service Address</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'registered-office-address')}}">Registered Office Address</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'business-mailing-address-service')}}">Business Mail Forwarding Address</a>
                        </li>
                        <li>
                            <a href="{{route('company_services', 'renewals')}}">Renewals</a>
                        </li>
                    </ul>
                    <h3>Help & Advice</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{route('company_services', 'our-online-company-manager')}}">Our Online Company Manager</a>
                        </li>
                        <li>
                            <a href="{{route("info-require-to-set-company")}}">Information Required To Set Up
                                A Company</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-footer-col legal" data-aos="fade-up" data-aos-delay="200" data-aos-duration="2000" data-aos-once="true">
                <div class="main-footer-box">
                    <h3>Legal</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{ route('page', ['slug' => 'refund-cancellation'] ) }}">Refund and Cancellation Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('page', ['slug' => 'terms-conditions'] ) }}">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('page', ['slug' => 'cookies-policy'] ) }}">Cookies Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('page', ['slug' => 'id-requirements'] ) }}">ID requirements</a>
                        </li>
                        <li>
                            <a href="{{ route('page', ['slug' => 'gdpr-privacy-policy'] ) }}">GDPR Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-footer-col resources" data-aos="fade-up" data-aos-delay="250" data-aos-duration="2500" data-aos-once="true">
                <div class="main-footer-box">
                    <h3>Resources</h3>
                    <ul class="nav-lists">
                        <li>
                            <a href="{{route('business_help')}}">Business Help</a>
                        </li>
                        <li>
                            <a href="{{route('share_business_idea')}}">Share Business Ideas</a>
                        </li>
                        <li>
                            <a href="{{route('helping_startups')}}">Helping Startups</a>
                        </li>
                    </ul>
                    <div class="bottom-logo">
                        <img src="{{ asset('frontend/assets/images/pci-dss-logo.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer-cpy-right">
            <div class="left-info">
                <p>Formationshunt Ltd.</p>
                <p>7, Thurlow Gardens , Wembley , Middlesex , HA0 2AH , United Kingdom</p>
                <p>Phone: <a href="tel:020 3002 0032">020 3002 0032</a></p>
                <p>Email: <a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a></p>
                <p>Company Nr: 14177067 | Vat Reg. no.</p>
                <p>ICO Reg. ref. ZB587491</p>
            </div>
            <div class="right-info">
                <div class="newsletter">
                    <form>
                        <div class="form-group">
                            <label>Subscribe to our email newsletter</label>
                            <input type="text" name="" class="form-control" placeholder="Enter your e-mail address">
                            <button type="button" class="subscribe_button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="main-footer-cpy-right">
            <div class="right-info">
                <ul class="footer-social-icons">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#custom_payment_modal" id="open_custom_payment_modal">
                            <img src="{{ asset('frontend/assets/images/social-icon1.svg')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/formationshunt" target="_blank">
                            <img src="{{ asset('frontend/assets/images/social-icon-facebook.svg')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/formationshunt/" target="_blank">
                            <img src="{{ asset('frontend/assets/images/social-icon-instragram.svg')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/FormationsHunt" target="_blank">
                            <img src="{{ asset('frontend/assets/images/social-icon-twitter.png')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/formations-hunt" target="_blank">
                            <img src="{{ asset('frontend/assets/images/social-icon-linkdin.svg')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCkwv3IapL0OGZ7sguEnOUlQ" target="_blank">
                            <img src="{{ asset('frontend/assets/images/social-icon-youtube.svg')}}">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-footer-cpy-right text-center justify-content-center">
            <div class="left-info">
                <p>Copyright © 2023 Formationshunt. |  All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>

<div class="cookie_popup d-none">
    <h4>We Value your privacy</h4>
    <p>This website uses cookies to provide the best experience when you visit our website. <a href="#">cookie policy.</a> <button type="button" id="cookie_hide">I understand</button> </p>
</div>

<x-custom_payment_modal></x-custom_payment_modal>
<!-- ================ end: main-footer ================ -->

<!-- =============== all scripts =============== -->
<script src="{{ asset('frontend/assets/js/jquery.min.3.5.1.js')}}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.1.16.0.js')}}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.4.5.2.js')}}"></script>
<script src="{{ asset('frontend/assets/slick/slick.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!-- Select 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('frontend/assets/js/aos.js')}}"></script>
<script src="{{ asset('frontend/assets/js/stickey.js')}}"></script>

<script src="{{ asset('frontend/assets/js/scripts.js')}}"></script>

<script>
$(document).ready(function(){
    if (!($.cookie('cookie_hide'))) {

        $(".cookie_popup").removeClass('d-none')
    }
  $("#cookie_hide").click(function(){
    $(".cookie_popup").hide();
    $.cookie('cookie_hide', 'cookie_hide', { expires: 365, path: '/' });
  });
});
</script>
