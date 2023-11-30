<!-- ================ start: main-header ================ -->
<div class="main-header">
    <div class="custom-container">
        <a href="{{ url('') }}" class="logo"><img src="{{ asset('frontend/assets/images/logo.svg')}}"></a>
        <div class="custom-navbar">
            <ul class="cn-menu-lists">
                <li>
                    <a href="{{ url('')}}">Home</a>
                </li>
                <li>
                    <div class="dropdown dropdown-s1">
                        <a href="javascript:;" class="dropdown-toggle" id="cn-packages-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Packages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="cn-packages-more">
                            <a class="dropdown-item" href="{{route('package')}}">Compare Packages</a>
                            <a class="dropdown-item" href="{{route('digital_package')}}">Digital Package</a>
                            <a class="dropdown-item" href="{{route('privacy_package')}}">Privacy</a>
                            <a class="dropdown-item" href="{{route('professional_package')}}">Professional</a>
                            <a class="dropdown-item" href="{{route('prestige_package')}}">Prestige</a>
                            <a class="dropdown-item" href="{{route('all_inclusive_package')}}">All Inclusive</a>
                            <a class="dropdown-item" href="{{route('non_residents_package')}}">Non Residents</a>
                            <a class="dropdown-item" href="{{route('llp_package')}}">LLP</a>
                            <a class="dropdown-item" href="{{route('guarantee_package')}}">Limited by Guarantee</a>
                            <a class="dropdown-item" href="{{route('e_seller_package')}}">Eseller</a>
                            <a class="dropdown-item" href="{{route('plc_package')}}">PLC Package</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown dropdown-s1">
                        <a href="javascript:;" class="dropdown-toggle" id="cn-services-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu mega-menu" aria-labelledby="cn-services-more">
                            <div class="custom-container">
                                <div class="custom-row">
                                    <div class="custom-col">
                                        <h5><span>Company Services</span></h5>
                                        <a class="dropdown-item" href="{{route('company_services', 'apostilled-documents-service')}}">Apostilled Documents Service</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'confirmation-statement-service')}}">Confirmation Statement Service</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'company-dissolution')}}">Company Dissolution</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'company-registration')}}">Company Registration</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'certification-of-good-standing')}}">Certification of Good Standing</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'company-name-change')}}">Company Name Change</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'dormant-company-accounts')}}">Dormant Company Accounts</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'director-appointment-resignation')}}">Director Appointment Resignation</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'full-company-secretary-service')}}">Company Secretary Service</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'issue-of-share-services')}}">Issue of Share Services</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'transfer-of-share-services')}}">Transfer of Share Services</a>
                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Business Services</span></h5>
                                        <a class="dropdown-item" href="{{route('service_business_logo')}}">Business Logo Design</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'business-email')}}">Business Email</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'vat-registration')}}">VAT Registration</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'paye-registration')}}">PAYE Registration</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'business-telephone-services')}}">Business Telephone Services</a>
                                        <a class="dropdown-item" href="{{route('buisness_web_design')}}">Business Web Design/Marketing</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'data-protection-registration')}}">Data Protection Registration</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'gdpr-compliance-package')}}">GDPR Complaince Package</a>
                                    </div>

                                    <div class="custom-col">

                                        <h5><span>Business Banking</span></h5>
                                        <a class="dropdown-item" href="{{route('company_services', 'barclays-bank-account')}}">>Barclays Bank Account</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'cashplus-business-account')}}">Cashplus Business Account</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'wise-business-account-for-non-uk-residents')}}">Wise Business Account for Non UK-Residents</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'payoneer-business-account-for-non-uk-residents')}}">Payoneer Business Account for Non UK – Residents</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'anna-money-for-small-business')}}">ANNA Money for Small Business</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'card-one-business-account')}}">Card One Business Account</a>

                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Address Services</span></h5>
                                        <a class="dropdown-item" href="{{route('company_services', 'directors-service-address')}}">Directors Service Address</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'registered-office-address')}}">Registered Office Address</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'business-mailing-address-service')}}">Business Mailing Address</a>
                                        <a class="dropdown-item" href="{{route('company_services', 'renewals')}}">Renewals</a>
                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Resources</span></h5>
                                        <a class="dropdown-item" href="{{route('share_business_idea')}}">Share Business Ideas</a>
                                        <a class="dropdown-item" href="{{route('helping_startups')}}">Helping Startups</a>
                                        <a class="dropdown-item" href="{{route('business_help')}}">Business Help</a>

                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Help &amp; Advice</span></h5>
                                        <a class="dropdown-item" href="{{route('company_services', 'our-online-company-manager')}}">Our Online Company Manager</a>
                                        <a class="dropdown-item" href="{{route("info-require-to-set-company")}}">Information Required To Set Up A Company</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('aboutUs') }}">About Us</a>
                </li>
                <li>
                    <a href="#">Blogs</a>
                </li>
                <li>
                    <a href="{{ route('contact.view')}}">Contact Us</a>
                </li>
            </ul>
            <div class="cn-menu-lists-overlay"></div>
        </div>
        <div class="cn-right-actions">
            @if(empty(Auth::user()))
                <a href="{{ url('/login') }}" class="theme-btn-primary login-btn"><img src="{{ asset('frontend/assets/images/mdi_account.svg')}}">Client Login</a>
            @else
            <a href="{{ route('my-account')}}" class="theme-btn-primary login-btn"><img src="{{ asset('frontend/assets/images/mdi_account.svg')}}">My Account</a>
            <a href="{{ route('clientlogout')}}" class="theme-btn-primary login-btn" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="{{ asset('frontend/assets/images/mdi_account.svg')}}">Logout</a>
            <form id="logout-form" action="{{ route('clientlogout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
            <button type="button" class="menu-toggle">
                <div></div>
            </button>
        </div>
    </div>
</div>
<!-- ================ end: main-header ================ -->
