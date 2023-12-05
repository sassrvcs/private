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
                        <h2>Payment For Order {{$order_id}}</h2>
                        
                        @if($cart->count() > 0)
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>VAT</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->service_name }}</td>
                                            <td>{{ $item->price ?? 'Free' }} </td>
                                            <td>{{ $item->vat ?? '-'}} </td>
                                            <td>
                                                <button class="btn btn-danger delete-cart-item" data-id="{{ $item->id }}">X</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>

                   
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-cart-item').on('click', function () {
                var itemId = $(this).data('id');
                $.ajax({
                    url: "{!! route('delete-cart') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemId
                    },
                    success: function (response) {
                        location.reload('true')
                    },
                    error: function (error) {
                        console.log(error);
                        // Handle error response
                    }
                });
            });
        });
    </script>
@endsection
