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
                    <div class="companies-topbar">
                        <h3>Companies List</h3>
                        <form action="{{route('companies-list')}}" method="get">
                            <div class="rt-side">
                                <div class="field-box">
                                    <label for="">Sort By :</label>
                                    <select name="sort_by" id="sort_by" class="field">
                                        <option value="Incorporation_Date" {{ (isset($_GET['sort_by']) && $_GET['sort_by'] == "Incorporation_Date") ? 'selected' : '' }}>Incorporation Date</option>
                                        <option value="status" {{ (isset($_GET['sort_by']) && $_GET['sort_by'] == "status") ? 'selected' : '' }}>Status</option>

                                    </select>
                                </div>
                                <div class="field-box">
                                    <label for="">Show Only :</label>
                                    <select name="status_value" id="status_value" class="field">
                                        <option value="All">All</option>
                                        <option value="0" {{ (isset($_GET['status_value']) && $_GET['status_value'] == "0") ? 'selected' : '' }}>Incomplete</option>
                                        <option value="1" {{ (isset($_GET['status_value']) && $_GET['status_value'] == "1") ? 'selected' : '' }}>Pending</option>
                                        <option value="2" {{ (isset($_GET['status_value']) && $_GET['status_value'] == "2") ? 'selected' : '' }}>Processing</option>
                                        <option value="3" {{ (isset($_GET['status_value']) && $_GET['status_value'] == "3") ? 'selected' : '' }}>Approved</option>
                                        <option value="4" {{ (isset($_GET['status_value']) && $_GET['status_value'] == "4") ? 'selected' : '' }}>Rejected</option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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


                                        @if (!isset($_GET['status_value']) || $_GET['status_value']=='All' || (@$order->getCompanyByOrderId->status == $_GET['status_value']) )
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
                                                <td><a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->getCompanyByOrderId->section_name?? 'Company_formaction', 'step' => $order->getCompanyByOrderId->step_name?? 'particulars' ]) }}" >
                                                    {{ strtoupper($order->company_name) ?? "-" }}
                                                    {{-- @php $orderCompanyNameWithoutSuffix = preg_replace('/\b(?:LTD|LIMITED)\b/i', '', strtoupper($order->company_name)); @endphp --}}
                                                    {{-- @dump($orderCompanyNameWithoutSuffix) --}}
                                                    {{-- @if (in_array(strtoupper($order->company_name), json_decode($companyNames)))
                                                        Company Name Present
                                                    @else
                                                        Company Name Not Present
                                                    @endif --}}
                                                    </a>
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


                                                @php

                                                    $company_status = \App\Models\Companie::where('order_id',$order->order_id)->pluck('status')->first();

                                                @endphp

                                                <td><span class="status @if($company_status == '0' || $company_status == '1' || $company_status == '2') incomplete @elseif ($company_status == '3')accepted @elseif ($company_status == '4') rejected @else incomplete @endif ">

                                                    @if ($company_status == '0' )
                                                        INCOMPLETE
                                                    @elseif ($company_status == '1')
                                                        PENDING
                                                    @elseif ($company_status == '2')
                                                        PROCESSING
                                                    @elseif ($company_status == '3')
                                                        APPROVED
                                                    @elseif ($company_status == '4')
                                                        REJECTED

                                                    @else
                                                        INCOMPLETE
                                                    @endif</span>

                                                    @if ($company_status == '4')
                                                        <button data-toggle="modal" data-target="#adminComment-{{ $order->order_id }}" style="cursor: pointer; color:white">

                                                            <img src="{{ asset('frontend/assets/images/alert-triangle.svg') }}" alt="">

                                                        </button>
                                                    @endif
                                                </td>
                                                @if($company_status == '3')
                                                    <td>
                                                        <a href="{{ route('accepted-company', ['order' => $order->order_id,'c_id'=>$order->getCompanyByOrderId->id]) }}" class="view-btn">
                                                            View
                                                            <img src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="">
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->getCompanyByOrderId->section_name?? 'Company_formaction', 'step' => $order->getCompanyByOrderId->step_name?? 'particulars' ]) }}" class="view-btn">
                                                            View
                                                            <img src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="">
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>

                                        @endif

                                        <div class="modal" id="adminComment-{{ $order->order_id }}" tabindex="-1" role="dialog" aria-labelledby="adminCommentTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                                <div class="modal-content border-0 ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="adminCommentTitle">Admin Comment</h5>
                                                        <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="post_address_blk">
                                                            @php

                                                                $admin_status = \App\Models\companyXmlDetail::where('order_id',$order->order_id)->pluck('admin_comment')->first();

                                                            @endphp
                                                            {{$admin_status}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

