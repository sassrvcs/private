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
                            <a class="dropdown-item" href="#">Compare Packages</a>
                            <a class="dropdown-item" href="#">Digital Package</a>
                            <a class="dropdown-item" href="#">Privacy</a>
                            <a class="dropdown-item" href="#">Professional</a>
                            <a class="dropdown-item" href="#">Prestige</a>
                            <a class="dropdown-item" href="#">All Inclusive</a>
                            <a class="dropdown-item" href="#">Non Residents</a>
                            <a class="dropdown-item" href="#">LLP</a>
                            <a class="dropdown-item" href="#">Limited by Guarantee</a>
                            <a class="dropdown-item" href="#">Eseller</a>
                            <a class="dropdown-item" href="#">PLC Package</a>
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
                                        <a class="dropdown-item" href="#">Apostilled Documents Service</a>
                                        <a class="dropdown-item" href="#">Confirmation Statement Service</a>
                                        <a class="dropdown-item" href="#">Company Dissolution</a>
                                        <a class="dropdown-item" href="#">Company Registration</a>
                                        <a class="dropdown-item" href="#">Certification of Good Standing</a>
                                        <a class="dropdown-item" href="#">Company Name Change</a>
                                        <a class="dropdown-item" href="#">Dormant Company Accounts</a>
                                        <a class="dropdown-item" href="#">Director Appointment &amp; Resignation</a>
                                        <a class="dropdown-item" href="#">Full Company Secretary Service</a>
                                        <a class="dropdown-item" href="#">Issue of Share Services</a>
                                        <a class="dropdown-item" href="#">Transfer of Share Services</a>
                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Business Services</span></h5>
                                        <a class="dropdown-item" href="#">Business Logo Design</a>
                                        <a class="dropdown-item" href="#">Business Email</a>
                                        <a class="dropdown-item" href="#">VAT Registration</a>
                                        <a class="dropdown-item" href="#">PAYE Registration</a>
                                        <a class="dropdown-item" href="#">Business Telephone Services</a>
                                        <a class="dropdown-item" href="#">Business Web Design/Marketing</a>
                                        <a class="dropdown-item" href="#">Data Protection Registration</a>
                                        <a class="dropdown-item" href="#">GDPR Complaince Package</a>
                                    </div>

                                    <div class="custom-col">

                                        <h5><span>Business Banking</span></h5>
                                        <a class="dropdown-item" href="#">>Barclays Bank Account</a>
                                        <a class="dropdown-item" href="#">Cashplus Business Account</a>
                                        <a class="dropdown-item" href="#">Wise Business Account for Non UK-Residents</a>
                                        <a class="dropdown-item" href="#">Payoneer Business Account for Non UK – Residents</a>
                                        <a class="dropdown-item" href="#">ANNA Money for Small Business</a>
                                        <a class="dropdown-item" href="#">Card One Business Account</a>

                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Address Services</span></h5>
                                        <a class="dropdown-item" href="#">Directors Service Address</a>
                                        <a class="dropdown-item" href="#">Registered Office Address</a>
                                        <a class="dropdown-item" href="#">Renewals</a>
                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Resources</span></h5>
                                        <a class="dropdown-item" href="#">Share Business Ideas</a>
                                        <a class="dropdown-item" href="#">Helping Startups</a>
                                        <a class="dropdown-item" href="#">Business Help</a>

                                    </div>

                                    <div class="custom-col">
                                        <h5><span>Help &amp; Advice</span></h5>
                                        <a class="dropdown-item" href="#">Our Online Company Manager</a>
                                        <a class="dropdown-item" href="#">Information Required To Set Up A Company</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">About Us</a>
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
            <a href="{{ route('clientlogout')}}" class="theme-btn-primary login-btn" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
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
