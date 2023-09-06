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
                    <div class="MyAccount-content col-md-12">
                        <div class="companies-topbar">
                            <h3>Payment History</h3>
                        </div>
                        <div class="companies-table-wrap">
                            <div class="table-responsive">
                                @if($order_payments)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Notes</th>
                                                <th>Payment Ref.</th>
                                                <th>Order</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order_payments as $order_payment)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($order_payment->created_at)->format('d/m/Y') }}</td>
                                                <td>{{ $order_payment->amount }}</td>
                                                <td></td>
                                                <td>{{ $order_payment->invoice_id }}</td>                                                
                                                <td> 
                                                    <a href="{{ route('order-details', ['order' => $order_payment->order_id]) }}">
                                                        {{ $order_payment->order_id }}
                                                    </a>                                 
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