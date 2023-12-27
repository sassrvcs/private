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
                        <!-- <h2>Payment For Order {{ $order_id }}</h2> -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2>Payment For Order {{ $order_id }}</h2>
                            <a href="{{ route('accepted-company', ['order' => $order_id,'c_id'=>$order->getCompanyByOrderId->id]) }}" class="btn btn-secondary">Back</a>
                        </div>


                        @if ($cart->count() > 0)
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
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->service_name }}</td>
                                            <td>{{ $item->price ?? 'Free' }} </td>
                                            <td>{{ $item->vat ?? '-' }} </td>
                                            <td>
                                                <button class="btn btn-danger delete-cart-item"
                                                    data-id="{{ $item->id }}">X</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="efTableSubheader efCartNetTotalTr" id="efNetTotalRow">
                                        <td></td>
                                        <td></td>

                                        <td style="">Net Total:</td>
                                        <td>£{{$net_total}}</td>

                                    </tr>
                                    <tr class="efTableSubheader efCartNetTotalTr" id="efNetTotalRow">
                                        <td style="border-top: none!important"></td>
                                        <td style="border-top: none!important"></td>

                                        <td style="border-top: none!important">V.A.T:</td>
                                        <td style="border-top: none!important">£{{$vat}}</td>

                                    </tr>
                                    <tr class="efTableSubheader efCartNetTotalTr" id="efNetTotalRow">
                                        <td style="border-top: none!important"></td>
                                        <td style="border-top: none!important"></td>

                                        <td style="border-top: none!important">Total:</td>
                                        <td style="border-top: none!important">£{{$total_price}}</td>

                                    </tr>
                                </tbody>
                            </table>
                            <form method="post" action="/cart-pay" id="ef-js-new-order" name="ef-js-current-order">
                                @csrf
                                <input type="hidden" name="net_total" value="{{$net_total}}">
                                <input type="hidden" name="vat" value="{{$vat}}">
                                <input type="hidden" name="total_price" value="{{$total_price}}">
                                <input type="hidden" name="order_id" value="{{$order_id}}">
                            <div class="efPanel ui-corner-all ui-widget-content" id="efOutputOptionsContainer"
                                style="margin-top:10px">
                                <div class="efPanelHeader ui-widget-header"><img src="/assets/icons/lorry.png"
                                        alt="" style="float:left;margin-right:4px;">Delivery Details<p
                                        style="font-weight: normal; padding: 10px 0 10px;">Please check the recipient
                                        information below is correct, as these details will be used to deliver your order to
                                        you. </p>
                                </div>

                                <div class="efPanelContent efPanelContentVeryCondensed ui-corner-bottom">
                                    <table
                                        class="efTable efTableVeryCondensed efTableUnbordered ui-corner-bottom ui-widget-content"
                                        style="width:auto">

                                        <tbody>
                                            <tr>
                                                <td><span class="efInputLabel">Order Description :</span></td>
                                                <td><input type="text" placeholder="Required" class="efTextInput form-control" name="order_note" required="required"
                                                       ></td>
                                            </tr>

                                            <tr>
                                                <td><span class="efInputLabel">Recipient Name:</span></td>
                                                <td><input type="text" class="efTextInput form-control"
                                                        name="recipient_name" required="required" placeholder="Required"></td>
                                            </tr>

                                            <tr>
                                                <td><span class="efInputLabel">Recipient Email:</span></td>
                                                <td><input id="emailfield" required="required " type="email"
                                                        class="efTextInput form-control" name="recipient_email"
                                                         placeholder="Required"></td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <div class="ef-terms-and-conditions-wrapper">

                                <p id="newsletter-check" class="ef-terms-and-conditions-newsletter">
                                    <span>
                                        <input type="checkbox" name="newsletter" id="newsletter-checkbox" required>
                                        <label for="newsletter-checkbox" id="newsletter-checkbox-label">
                                            I would like to receive updates from FormationsHunt </label>
                                    </span>
                                </p>
                                <p id="remarketing-check" class="ef-terms-and-conditions-remarketing"><input
                                        id="remarketing" name="remarketing" type="checkbox" required> I would like to receive updates
                                    from our business partners</p>

                                <p id="tnc-check" class="ef-terms-and-conditions-check">
                                    <span>
                                        <input type="checkbox" id="tcagree-checkbox" value="1" required>
                                        <label for="tcagree-checkbox" id="tcagree-checkbox-label">
                                            I agree to the <a href="{{ route('page', ['slug' => 'terms-conditions'] ) }}" target="_blank" rel="noopener">Terms and
                                                Conditions</a> &amp; <a href="{{ route('page', ['slug' => 'gdpr-privacy-policy'] ) }}" target="_blank"
                                                rel="noopener">Privacy Policy</a>
                                        </label>
                                    </span>
                                </p>
                            </div>
                            <div class="efCartCheckoutButtonWrapper cart-checkoutBtn-wrapper" style="text-align:right; ">
                                    <input type="hidden" name="pt" value="bbc7ad02-933a-11ee-b7b9-42010a84003a">
                                    <input type="hidden" name="csrf-token" value="4821d05c71d45fd8ca0c91e67d437b90">

                                    <div class="efCartCheckoutButtonDiv ">
                                        <span class="efCartCheckoutButtonLoader efHide"></span>
                                        @if($total_price==0)
                                            <button class="btn btn-primary" type="submit">Submit Now</button>
                                        @else
                                            <button class="btn btn-primary" type="submit">Pay Now</button>
                                        @endif
                                    </div>
                            </div>
                        </form>

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
        $(document).ready(function() {
            $('.delete-cart-item').on('click', function() {
                var itemId = $(this).data('id');
                $.ajax({
                    url: "{!! route('delete-cart') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemId
                    },
                    success: function(response) {
                        location.reload('true')
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle error response
                    }
                });
            });
        });
    </script>
@endsection
