@extends('includes.layouts.admin')
@section('page-title')
    Service Details
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Service Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ticket List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
    @if (Session::has('success'))
        <div class="toast" data-type="success" data-title=" Added Successfully "> {{ Session::get('success') }}</div>
    @endif
</section>
@endsection

@section('scripts')
<script>
    {{-- $(document).ready(function(){

    }); --}}

</script>
@include('admin.commonScript.script')
@endsection
