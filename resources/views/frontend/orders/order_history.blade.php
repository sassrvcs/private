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
                            <h3>
                                @if($status == '')
                                    @php $report_type = 'All'; @endphp
                                @else
                                    @php
                                        $report_type = ($status == 'pending') ? 'Incomplete' : (($status == 'progress') ? 'Inprogress' : 'Completed');
                                    @endphp
                                @endif
                                Order History
                            </h3>
                        </div>
                        <div class="companies-table-wrap">
                            <div class="table-responsive">
                                @if($orders && $orders->count() > 0 )
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Invoiced</th>
                                                <th>Package / Type</th>
                                                <th>Company Name</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)

                                            <tr>
                                                <td><a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->myCompany->section_name?? 'Company_formaction', 'step' => $order->myCompany->step_name?? 'particulars' ]) }}"> {{ $order->order_id }}</a></td>
                                                <td>-</td>
                                                <td>{{ $order->cart->package->package_name }}</td>
                                                <td>{{ $order->company_name }}</td>
                                                <td>
                                                    <span class="status accepted">
                                                        {{ ($order->order_status == 'pending') ? 'Incomplete' : (($order->order_status == 'progress') ? 'Inprogress' : 'Complete') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($order->order_status != 'success')
                                                        <div class="d-flex justify-content-end">
                                                            <a class="view-btn delet-btn" onclick="return deleteOrderItem();" href="{{route('delete-order-item', ['order_id' => $order->order_id] )}}">
                                                                <img src="{{ asset('frontend/assets/images/close-icon.png')}}" alt="">
                                                                <strong>Delete</strong>
                                                            </a>
                                                            <button class="view-btn ml-2">
                                                                <a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->myCompany->section_name?? 'Company_formaction', 'step' => $order->myCompany->step_name?? 'particulars' ]) }}" >
                                                                    <img src="{{ asset('frontend/assets/images/right-arrow-icon.png')}}" alt="">
                                                                    <strong>Continue Order</strong>
                                                                </a>
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-end">
                                                            <a class="view-btn delet-btn" href="{{ route('order-details', ['order' => $order->order_id]) }}">
                                                                <strong>Details</strong>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    {{ 'No data found' }}
                                @endif
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
