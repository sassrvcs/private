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
                        <h3>Import Company</h3>
                        <p>Enter the identification details for the company you wish to import below.</p>
                        <div class="companies-topbar" style="border: 1px solid #87cb28; border-radius:6px;">
                            <form action="{{ url('import-companies') }}" method="post">
                                @csrf
                                <div class="rt-side" style="padding: 10px;">
                                    <div class="field-box">
                                        <label for="">Company Number:</label>
                                        <input type="text" name="company_number" id="company-number"
                                            value="{{ $company_number }}" class="field" required>
                                    </div>
                                    <div class="field-box">
                                        <label for="">Auth. Code:</label>
                                        <input type="text" name="company_authcode" id="company-authcode"
                                            value="{{ $company_authcode }}" class="field" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($fetch_result != null)


            <div class="service-request">
                <form action="/import-companies/add" method="post" class="companyAdd">
                    @csrf
                    <input type="hidden" name="company_number" value="{{ $company_number }}">
                    <input type="hidden" name="company_authcode" value="{{ $company_authcode }}">
                    <div class="container">
                        <div class="company-add-form-box">
                            <div class="company-add-form-box-header">
                                <div class="left-div">
                                    <h3>{{ $fetch_result['Body']['CompanyData']['CompanyName'] }} -
                                        {{ $fetch_result['Body']['CompanyData']['CompanyNumber'] }}- {{ $company_authcode }}
                                    </h3>
                                </div>
                                <div class="right-div">
                                    <button type="button" class="close-btn">x</button>
                                </div>
                            </div>
                            <div class="company-add-form-box-body">
                                <div class="inner-box-row">
                                    <div class="inner-box-col">
                                        <h4>Company Particulars</h4>
                                        <ul class="label-with-right-input-lists">
                                            <li>
                                                <p>Name:</p>
                                                <span>{{ $fetch_result['Body']['CompanyData']['CompanyName'] }}</span>
                                            </li>
                                            <li>
                                                <p>Number:</p>
                                                <span>{{ $fetch_result['Body']['CompanyData']['CompanyNumber'] }}</span>
                                            </li>
                                            <li>
                                                <p>Auth. Code: </p>
                                                <span>{{ $company_authcode }}</span>
                                            </li>
                                            <li>
                                                <p>Next Due: </p>
                                                <span>
                                                    <input type="text" class="form-control" required
                                                        value="{{ $fetch_result['Body']['CompanyData']['NextDueDate'] }}">
                                                </span>
                                            </li>
                                            <li>
                                                <p>Type: </p>
                                                <span>
                                                    <select class="form-control">
                                                        @if ($fetch_result['Body']['CompanyData']['CompanyCategory'] == 'BYSHR')
                                                            <option value="2">Limited By Shares</option>
                                                        @elseif ($fetch_result['Body']['CompanyData']['CompanyCategory'] == 'BYGUAR')
                                                            <option value="3">Limited By Guarantee</option>
                                                        @elseif ($fetch_result['Body']['CompanyData']['CompanyCategory'] == 'LLP')
                                                            <option value="4">Limited Liability Partnership</option>
                                                        @elseif ($fetch_result['Body']['CompanyData']['CompanyCategory'] == 'PLC')
                                                            <option value="1">Public Limited Company</option>
                                                        @endif
                                                    </select>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="inner-box-col">
                                        <h4>Registered Office</h4>
                                        <ul class="label-with-right-input-lists">
                                            <li>
                                                <p>Line 1:</p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                        @if ($fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Premise'] != null) value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Premise'] }}" @endif>
                                                </span>
                                            </li>
                                            <li>
                                                <p>Line 2:</p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                        value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Street'] }}">
                                                </span>
                                            </li>
                                            <li>
                                                <p>Line 3:</p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                    @if (isset($fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Thoroughfare']))   value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Thoroughfare'] }}" @endif>
                                                </span>
                                            </li>
                                            <li>
                                                <p>Town: </p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                        value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['PostTown'] }}">
                                                </span>
                                            </li>
                                            <li>
                                                <p>Postcode:</p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                        value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Postcode'] }}">
                                                </span>
                                            </li>
                                            <li>
                                                <p>Country:</p>
                                                <span>
                                                    <input type="text" class="form-control" 
                                                        value="{{ $fetch_result['Body']['CompanyData']['RegisteredOfficeAddress']['Country'] }}">
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="import-actions">
                            <button type="submit" class="import-btn">Import</button>
                        </div>
                </form>
            </div>
            </div>
        @endif

    </section>

@endsection

<style>
    /* start: company-add-form-box*/
    .company-add-form-box {}

    .company-add-form-box .company-add-form-box-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        column-gap: 16px;
        border: 1px solid #dddddd;
        background: #dddddd;
        padding: 4px 10px;
    }

    .company-add-form-box .company-add-form-box-header h3 {
        font-size: 15px;
        font-weight: 700;
        color: #444444;

    }

    .company-add-form-box .company-add-form-box-header .close-btn {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        background-color: red;
    }

    .company-add-form-box .company-add-form-box-body {
        border: 1px solid #dddddd;
        padding: 12px 10px;
    }

    .company-add-form-box-body .inner-box-row {
        display: flex;
        column-gap: 24px;
        row-gap: 24px;
        flex-wrap: wrap;
    }

    .company-add-form-box-body .inner-box-col {
        width: 100%;
        max-width: calc(33.33% - 12px);
    }

    .company-add-form-box-body .inner-box-col h4 {
        font-size: 14px;
        font-weight: 600;
        color: #444444;
        margin-bottom: 10px;
    }

    .company-add-form-box-body .inner-box-col .label-with-right-input-lists {
        border: 1px solid #dddddd;
        padding: 10px;
        display: flex;
        flex-direction: column;
        row-gap: 4px;
    }

    .company-add-form-box-body .inner-box-col .label-with-right-input-lists li {
        display: flex;
        align-items: center;
    }

    .company-add-form-box-body .inner-box-col .label-with-right-input-lists li p {
        font-weight: 700;
        margin: 0;
        color: #444444;
        width: 100px;
        flex: 0 0 auto;
    }

    .company-add-form-box-body .inner-box-col .label-with-right-input-lists li span {
        font-weight: 500;
        margin: 0;
        color: #666;
        flex: 1 1 auto;
    }

    .company-add-form-box-body .inner-box-col .label-with-right-input-lists li .form-control {
        border: solid 1px #ccc;
        padding: 4px;
        height: 27px;
        border-radius: 3px;
        font-size: 14px;
    }

    .import-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        column-gap: 16px;
        margin-top: 12px;
    }

    .import-actions .import-btn {
        border: 1px solid #dddddd;
        background: #f6f6f6;
        padding: 8px 16px;
        font-weight: bold;
        color: #0073ea;
        font-weight: 18px;
    }

    @media (max-width: 1024px) {
        .company-add-form-box-body .inner-box-col {
            width: 100%;
            max-width: unset;
        }
    }

    /* end: company-add-form-box*/
</style>
