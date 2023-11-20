@extends('layouts.app')
@section('content')
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">
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
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
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
                    <div class="MyAccount-content col-md-12">
                        <div class="companies-topbar">
                            <h3>Service Details</h3>
                        </div>
                        <div class="companies-table-wrap">
                            <div class="table-responsive">
                                <div id="order_blk">

                                    @include('frontend.service.purchased_services.details.invoice_table.invoiceDetails')
                                    @if ($slug=="company-dissolution")
                                            @include('frontend.service.purchased_services.details.companyDissolution')
                                    @endif
                                    @if ($slug=="company-name-change")
                                            @include('frontend.service.purchased_services.details.companyNameChange')
                                    @endif
                                    @if ($slug=="dormant-company-accounts")
                                            @include('frontend.service.purchased_services.details.dormatCompanyAccounts')
                                    @endif
                                    @if ($slug=="director-appointment-resignation")
                                            @include('frontend.service.purchased_services.details.directorAppointmentResignation')
                                    @endif
                                    @if ($slug=="full-company-secretary-service")
                                             @include('frontend.service.purchased_services.details.fullSecraryService')
                                    @endif
                                    @if ($slug=="issue-of-share-services" || $slug=="transfer-of-share-services")
                                             @include('frontend.service.purchased_services.details.issueOfShareServices')
                                    @endif
                                    @if ($slug=="directors-service-address" || $slug=="registered-office-address")
                                             @include('frontend.service.purchased_services.details.directorServiceAddress')
                                    @endif
                                    @if ($slug=='vat-registration'||$slug=='business-email'||$slug=='paye-registration' || $slug=="data-protection-registration"||$slug=="business-logo")
                                    @include('frontend.service.purchased_services.details.invoice_table.userDetailsBusinessService')

                                    @else
                                    @include('frontend.service.purchased_services.details.invoice_table.userDetails')
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function deleteOrderItem() {
        if(!confirm("Are You Sure to delete?"))
        event.preventDefault();
    }
</script>
@endsection
