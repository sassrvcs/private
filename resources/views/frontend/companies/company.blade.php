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
                <li><a href="index.html">Home</a></li>
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
                    <div class="companies-topbar">
                        <h3>Companies List</h3>
                        <div class="rt-side">
                            <div class="field-box">
                                <label for="">Sort By :</label>
                                <select name="" id="" class="field">
                                    <option value="">Incorporation Date</option>
                                </select>
                            </div>
                            <div class="field-box">
                                <label for="">Show Only :</label>
                                <select name="" id="" class="field">
                                    <option value="">Incorporation Date</option>
                                </select>
                            </div>
                            <button type="submite" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="companies-table-wrap">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Incorporated</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Auth. Code</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($companies as $key => $company)
                                        <tr>
                                            <td>
                                                @if ($companies->pluck('companie_name')->contains($order->company_name))
                                                    Company Name Present
                                                @else
                                                    Company Name Not Present
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                    @php $companyNames = $companies->companies->pluck('companie_name')->unique(); @endphp
                                    {{-- @dump($companies->companies) --}}
                                    @php $companyNames = preg_replace('/\b(?:LTD|LIMITED)\b/i', '', strtoupper($companyNames)); @endphp
                                    {{-- @dump(json_decode($companyNames)) --}}

                                    @foreach($companies->orders as $key => $order)
                                        {{-- @dump($order) --}}
                                        <tr>

                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                            {{-- <td>{{ strtoupper($order->company_name) ?? "-" }}</td> --}}
                                            {{-- {{ strtoupper($order->company_name) ?? "-" }}
                                            @if ($companyNames->contains(strtoupper($order->company_name)))
                                                Company Name Present
                                            @else
                                                Company Name Not Present
                                            @endif --}}
                                            <td>
                                                {{ strtoupper($order->company_name) ?? "-" }}
                                                {{-- @php $orderCompanyNameWithoutSuffix = preg_replace('/\b(?:LTD|LIMITED)\b/i', '', strtoupper($order->company_name)); @endphp --}}
                                                {{-- @dump($orderCompanyNameWithoutSuffix) --}}
                                                {{-- @if (in_array(strtoupper($order->company_name), json_decode($companyNames)))
                                                    Company Name Present
                                                @else
                                                    Company Name Not Present
                                                @endif --}}
                                            </td>
                                            {{-- <td>
                                                {{ strtoupper($order->company_name) ?? "-" }}
                                                @if ($companies->companies->pluck('companie_name')->contains(strtoupper($order->company_name)))
                                                    Company Name Present
                                                @else
                                                    Company Name Not Present
                                                @endif
                                            </td> --}}
                                            <td>{{ $order->company_number ?? "-" }}</td>
                                            <td>{{ $order->auth_code ?? "-" }}</td>

                                            {{--<td><span class="status {{ ($order->order_status == 'pending') ? 'incomplete' : 'accepted' }}">{{ ($order->order_status == 'pending') ? 'INCOMPLETE' : 'ACCEPTED' }}</span></td>--}}

                                            <td><span class="status {{ ($order->order_status == 'pending') ? 'incomplete' : 'accepted' }}">
                                                {{ ($order->order_status == 'pending') ? 'INCOMPLETE' : 'ACCEPTED' }}</span>
                                            </td>
                                            @php

                                                $company_status = \App\Models\Companie::where('companie_name',$order->company_name)->pluck('status')->first();

                                            @endphp
                                            @if($company_status == '3')
                                                <td>
                                                    <a href="{{ route('accepted-company', ['order' => $order->order_id]) }}" class="view-btn">
                                                        View
                                                        <img src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="">
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->myCompany->section_name?? 'Company_formaction', 'step' => $order->myCompany->step_name?? 'particulars' ]) }}" class="view-btn">
                                                        View
                                                        <img src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="">
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

