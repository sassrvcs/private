@extends('layouts.master')
@section('content')

<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/compare-packages-banner.png') }}">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <figcaption class="lg">Compare Company <span>Formation Packages</span></figcaption>
            </figure>
            <div class="d-flex">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a>Compare Package</a></li>
                </ul>
           </div>
        </div>

        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
            data-aos-once="true">
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
<section class="companyFormationPackages-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Compare Packages Starting at <span>£12.99</span></h2>
        </div>
        <div class="companyFormationPackages-content">
            <div class="tab-menus">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('package')}}">Limited Company</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-once="true">
                        <a href="#">Non-Residents</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-once="true">
                        <a href="#">LLP</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="500" data-aos-once="true" >
                        <a href="{{route('guarantee_package')}}" class="active">Guarantee</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
                        <a href="#">eSeller</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-once="true">
                        <a href="#">PLC</a>
                    </li>
                </ul>
            </div>
        </div>
<section class="digitalPackage-sec">
    <div class="custom-container">
        <div class="left-information aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
            <h2>Guarantee <span>Package</span></h2>
            <p>Best for those companies who wish to establish a limited company on a non-profit basis, the Guarantee package offers a range of services to make company formations easy.</p>
            <h3>Get free bank account creation</h3>
            <p>Having a bank account in the UK helps to spend, send and receive currencies along with real exchange rates. We, at Formations Hunt, will provide your own UK account number and routing number no matter where you live in the world</p>
            <h3>Be a limited company</h3>
            <p>Set up your not-for-profit limited company in 3 to 6 working hours. Discuss your requirements with us and we shall help you throughout the process. We will also provide the free domain name to companies under this package for a period of one year so that you can boost your business visibility.</p>
            <h3>Avail of a range of services at an affordable price</h3>
            <p>Our Guarantee Package is offered at £39.99 + VAT and includes digital and printed company documents, free business account creation, and a free online company manager who will be responsible for updating your company details and report to Company House if there any changes take place.</p>
            <div class="next-package-bar-s1 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000" data-aos-once="true">
                <h4>Go to our next package to find what’s missing ➤</h4>
            </div>
        </div>
        <div class="right-information aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
            {{-- <a href="#" class="view-all-btn theme-btn-primary ">View all Packages</a> --}}

            <div class="companyFormationPackages-lists">
                <div class="cfp-list-col mw-100 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                    <div class="cfp-list-box">
                        <div class="top-icon-box">
                            <div class="inner-box">
                                <img src="{{ asset('frontend/assets/images/companyFormationPackages1.svg')}}">

                            </div>
                        </div>
                        <div class="text-info1">
                            <h4>Guarantee</h4>
                            {{-- {{dd($package_details)}} --}}
                            <h3>£{{$package_details['price']}}</h3>
                        </div>
                        <ul class="list-info">
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Free document delivery within the UK</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Company house fees paid by us</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Email Copy of Certificate of Incorporation</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Printed Certificate of Incorporation</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Printed &amp; Bound Memorandum &amp; Articles of Association</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Printed &amp; Bound Memorandum &amp; Articles of Association</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Guarantor Certificate(s)</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Free Online Company Manager to Maintain your Companies</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Free domain name .co.uk or .com for 1 year</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Free pre-submission review</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Apply for ‘limited’ name exemption</p>
                           </li>
                           <li>
                              <div class="icon-container">
                              </div>
                              <p>Bespoke Articles</p>
                           </li>
                        </ul>
                        <div class="bottom-actions">
                            @if ($package_details['package_id']!='')
                            <a href="{{ route('add-cart', ['id' => $package_details['package_id']] ) }}" class="theme-btn-primary buy-btn">Buy Now</a>

                            @else
                            <a href="#" class="theme-btn-primary buy-btn">Buy Now</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

@endsection
