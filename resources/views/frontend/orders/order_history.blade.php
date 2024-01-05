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
                                            @php
                                               $row_count = 0;
                                            @endphp
                                            @if (!(isset($order->getCompanyByOrderId->status)&&$order->getCompanyByOrderId->status == '8'))
                                            @php
                                                $row_count++;
                                            @endphp
                                            <tr>
                                                <td><a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->getCompanyByOrderId->section_name?? 'Company_formaction', 'step' => $order->getCompanyByOrderId->step_name?? 'particulars' ]) }}"> {{ $order->order_id }}</a></td>
                                                <td> @if (isset($order->transactions[0]->invoice_id))
                                                    {{$order->transactions[0]->invoice_id}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                                @php
                                                if (@$order->cart->package!=null) {
                                                    $package_type = @$order->cart->package->package_type;
                                                }else{
                                                    $package_type = @$order->getCompanyByOrderId->companie_type;
                                                    // $package_type = '-';
                                                }
                                                $full_pkg_type = '-';
                                                if (stripos($package_type, 'shares') !== false) {
                                                    $full_pkg_type = 'Limited By Shares';
                                                }
                                                if (stripos($package_type, 'Guarantee') !== false) {
                                                    $full_pkg_type = 'Limited By Guarantee';
                                                }
                                                if (stripos($package_type, 'Residents') !== false) {
                                                    $full_pkg_type = 'Non Residents Package';
                                                }
                                                if (stripos($package_type, 'PLC') !== false) {
                                                    $full_pkg_type = 'Public Limited Company';
                                                }
                                                if (stripos($package_type, 'Eseller') !== false) {
                                                    $full_pkg_type = 'Eseller Package';
                                                }
                                                if (stripos($package_type, 'LLP') !== false) {
                                                    $full_pkg_type = 'LLP Package';
                                                }
                                                @endphp
                                                <td>{{$full_pkg_type}}</td>
                                                <td><a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->getCompanyByOrderId->section_name?? 'Company_formaction', 'step' => $order->getCompanyByOrderId->step_name?? 'particulars' ]) }}" >{{ $order->company_name }}</a></td>
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
                                                                <a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->getCompanyByOrderId->section_name?? 'Company_formaction', 'step' => $order->getCompanyByOrderId->step_name?? 'particulars' ]) }}" >
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

                                            @endif
                                            @if ($row_count==0)
                                                {{ 'No data found' }}

                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                @else
                                    {{ 'No data found' }}
                                @endif
                            </div>
                            <div class="card-footer">
                                <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                                   {{-- {{ $users->appends([
                                        'form' => $filter['form'],
                                    ])->links('pagination::bootstrap-5') }} --}}
                                    @if($orders)
                                        {!! $orders->withQueryString()->links('pagination::bootstrap-4') !!}
                                    @endif
                                </nav>
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
