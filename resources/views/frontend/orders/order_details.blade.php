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
                    <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">
                        <h3 class="mb-2">Order Details : {{ $order ? $order->order_id : '' }}</h3>
                        <h4>{{ $deliveryPartner->companie_name ?? '' }}</h4>
                    </div>
                    <div class="companies-table-wrap order-details-block">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="order-sidebar">
                                    <div class="ttl">
                                        <h3>Overview</h3>
                                    </div>
                                    <div class="order-sidebar-info">
                                        <div class="panel">
                                            <p><strong>Order ID: </strong></p>
                                            <p>{{ $order? $order->order_id : '' }}</p>
                                        </div>
                                        <div class="panel">
                                            <p><strong>Company: </strong></p>
                                            <p><a href="{{ route('companie-formation', ['order' => $order->order_id, 'section' => $order->myCompany->section_name?? 'Company_formaction', 'step' => $order->myCompany->step_name?? 'particulars' ]) }}" >{{ $deliveryPartner->companie_name ?? '' }}</a></p>
                                        </div>
                                        <div class="panel">
                                            <p><strong>Package: </strong></p>
                                            <p>Digital Package</p>
                                        </div>
                                        <div class="panel">
                                            <p><strong>Status: </strong></p>
                                            <p>{{ ($order->order_status == 'pending') ? 'Incomplete' : (($order->order_status == 'progress') ? 'Inprogress' : 'Complete') }}   </p>
                                        </div>
                                        @if($order->order_status == 'success')
                                            <div class="panel d-flex justify-content-between">
                                                <p><strong>Invoice: </strong></p>
                                                <p><a href="{{ route('order-invoice', ['order' => $order->order_id]) }}" target="_blank">View</a></p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <!-- <th>Status</th> -->
                                                <th>Net</th>
                                                <th>VAT</th>
                                                <th>Gross</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $all_order->cart->package->package_name }} </td>
                                                <td>1</td>
                                                <td>£{{ $all_order->cart->package->package_price }}</td>
                                                <td>
                                                    £{{ ($all_order->cart->package->package_price * 20) / 100 }}
                                                </td>
                                                <td>
                                                    £{{ ($all_order->cart->package->package_price) + (($all_order->cart->package->package_price * 20) / 100) }}
                                                </td>
                                            </tr>
                                            @foreach ($all_order->cart->addonCartServices as $item)
                                                @php
                                                    $net_total = $net_total + $item->service->price;
                                                    $vat = ($item->service->price * 20) / 100;
                                                    $total_vat = $total_vat + $vat;
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->service->service_name }}</td>
                                                    <td>1</td>
                                                    <!-- <td><span class="status accepted">Accepted</span></td> -->
                                                    <td>£{{ $item->service->price }}</td>
                                                    <td>£{{ $vat }}</td>
                                                    <td>£{{ ($item->service->price) + $vat }}</td>
                                                </tr>
                                            @endforeach

                                            @if ($purchased_company_addresses!=null)
                                            @foreach ($purchased_company_addresses as $item)
                                               {{-- @php
                                                   $net_total = $net_total + $item->service->price;
                                                   $vat = ($item->service->price * 20) / 100;
                                                   $total_vat = $total_vat + $vat;
                                               @endphp --}}
                                               <tr>
                                                   <td>{{$item->address_type=='registered_address'?'Registered Address':'Business Address'}}</td>
                                                   <td>1</td>
                                                   <td>{{$item->price}}</td>

                                                   <td>{{(($item->price*20)/100)}}</td>
                                                   <td>{{($item->price)+(($item->price*20)/100)}}</td>
                                               </tr>
                                             @endforeach
                                           @endif
                                       @if ($purchased_appointment_addresses!=null)
                                       @foreach ($purchased_appointment_addresses as $item)
                                               @if ($item->total_sum!=0)

                                           <tr>
                                               <td>Service Address</td>
                                               <td>{{$item->qnt}}</td>
                                               <td>{{$item->total_sum}}</td>

                                               <td>{{(($item->total_sum*20)/100)}}</td>
                                               <td>{{($item->total_sum)+(($item->total_sum*20)/100)}}</td>

                                           </tr>
                                           @endif

                                       @endforeach

                                       @endif

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td>Totals :</td>
                                                <td>£{{ $net_total + $total_purchased_address_amount+ $all_order->cart->package->package_price }}</td>
                                                <td>£{{ $total_vat + (($all_order->cart->package->package_price+ $total_purchased_address_amount) * 20) / 100 }}</td>
                                                <td>
                                                    @php
                                                        $total_price = $net_total + $total_purchased_address_amount+ $all_order->cart->package->package_price + ($total_vat + (($all_order->cart->package->package_price + $total_purchased_address_amount) * 20) / 100);
                                                    @endphp
                                                    £{{ $total_price }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                @if($transactions->count() > 0)
                                    <h3 class="mt-5 mb-4 orde-pyment-ttl">Payments</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $trans )
                                                    <tr>
                                                        <td>{{ $trans->created_at }}</td>
                                                        <td>{{ $trans->amount }}</td>
                                                        <td>{{ 'DEBIT' }}</td>
                                                        <td>{{ ($trans->step == 0) ? 'Initial' : 'Fulfillment' }} of Order {{ $order->order_id }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
