@extends('layouts.master')
@section('content')
<!-- ================ start: comparePackages-sec ================ -->
<section class="sectiongap legal rrr fix-container-width woocommerce-checkout">
    <div class="container">
        <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-notices-wrapper"></div>
            <div class="package-steps text-center mb-4">
                <ol class="list-inline">
                    <li class="list-inline-item active">1. Name Check</li>
                    <li class="list-inline-item active">2. Select Package</li>
                    <li class="list-inline-item active">3. Additional Services</li>
                    <li class="list-inline-item">4. Checkout</li>
                    <li class="list-inline-item">5. Company Details</li>
                </ol>
            </div>
            <div class="row checkout checkout-bill">
                <div class="col-md-5 order-md-2">
                    <div class="position-sticky top-0">
                        <div class="card">
                            <div class="card-header">
                                <h3>Your Order</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert-info p-3">
                                    <p>Your new company name:</p>
                                    <p class="h6">{{ end($sessionCart)['company_name'] ?? '' }}</p>
                                </div>
                                <hr>
                                <p class="h6">{{ end($sessionCart)['package_name'] ?? '' }}</p>
                                <ul class="list-group list-group-flush fa-ul ms-3">
                                    @foreach($package->features as $feature)
                                        <li class="list-group-item px-0 py-2"><span class="fa-li"><i class="fa fa-caret-right"></i></span>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                                <hr>
                                <div class="border border-success p-2" style="border-color:#87CB28 !important;">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Price</th>
                                                <td class="text-end">
                                                    <span class="woocommerce-Price-amount amount package-price"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">£</span> {{ end($sessionCart)['price'] ?? '0' }} </bdi></span>
                                                </td>
                                            </tr>
                                            <tr class="tax-rate tax-rate-vat-1">
                                                <th>Net</th>
                                                <td class="text-end"><span class="woocommerce-Price-amount amount net">
                                                    <span class="woocommerce-Price-currencySymbol">£</span>17.98</span>
                                                </td>
                                            </tr>
                                            <tr class="tax-rate tax-rate-vat-1">
                                                <th>VAT</th>
                                                <td class="text-end"><span class="woocommerce-Price-amount amount vat">
                                                    <span class="woocommerce-Price-currencySymbol">£</span>3.60</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th style="color:#40A800;">Total</th>
                                                <td class="text-end" style="color:#40A800;">
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi><span class="woocommerce-Price-currencySymbol total-amount">£</span> </bdi>
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <table class="table table-light" style="border:1px solid #87CB28;color:#40A800;">
                                        <tbody>
                                            <tr class="order-total">
                                                <th>Amount Due</th>
                                                <td class="text-end"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>21.58</bdi></span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 order-md-1">
                    @guest
                        <div class="px-2">
                            <div class="checkouttab nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                    href="#reistration" role="tab" aria-controls="nav-home" aria-selected="true">New Customers</a>
                                <a class="nav-item nav-link" id="login-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Returning Customer</a>
                            </div>
                        </div>
                    @endguest
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="reistration" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="{{ route('save-register-form')}}" method="POST">
                                @csrf
                                <div id="customer_details">
                                    @guest
                                        <fieldset class="border p-3">
                                            <legend class="float-none w-auto p-2">Account Details</legend>
                                            <div class="woocommerce-account-fields">
                                                <div class="create-account">
                                                    <div class="orm-row form-group">
                                                        <label class="">Email&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control @error('email') is-invalid @enderror" type="email" name="email" value={{old('email')}}>
                                                        @error('email')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="orm-row form-group">
                                                        <label for="password" class="form-label">Password&nbsp;<span class="required">*</span></label>
                                                        <div class="custom-input-with-right-icon">
                                                            <div class="input-box">
                                                                <input id="password-field" class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{old('password')}}">
                                                            </div>
                                                            <div class="right-icon">
                                                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                                            </div>
                                                        </div>
                                                        @error('password')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @endguest
                                    <div class="form-row col-md-12 form-group">
                                        <label for="post_code" class="col-form-label">UK Postcode Lookup:</label>
                                        <div class="woocommerce-input-wrapper with-rg-btn">
                                            <input type="text" class="form-control" name="post_code" id="post_code" value="">
                                            <button type="button" class="btn btn-primary" id="findAddress" style="padding:8px;">Find Address</button>
                                        </div>
                                    </div>
                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto p-2">Billing Details</legend>
                                        <div class="woocommerce-billing-fields">
                                            <div class="woocommerce-billing-fields__field-wrapper row p-3">
                                                <div class="form-row form-group" id="billing_organization_field">
                                                    <label for="billing_organization" class="">Organisation (if applicable) </label>
                                                    <input type="text" class="input-text form-control @error('organisation') is-invalid @enderror" value="{{old('organisation')}}" name="organisation" id="billing_organization" placeholder="" >
                                                    @error('organisation')
                                                        <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-row form-group" id="billing_title_field"
                                                    data-priority="20">
                                                    <label for="billing_title" class="">Title&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                    <select id="billing_title" name="title" value="{{old('title')}}" class="select form-control @error('title') is-invalid @enderror">
                                                        <option value="" selected="selected">Please select...
                                                        </option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Sir">Sir</option>
                                                        <option value="Ms">Ms</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Madam">Madam</option>
                                                        <option value="Ma'am">Ma'am</option>
                                                        <option value="Lord">Lord</option>
                                                        <option value="Lady">Lady</option>
                                                    </select>
                                                </div>
                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">First Name&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('forename') is-invalid @enderror" name="forename" value="{{old('forename')}}">
                                                    </span>
                                                </div>
                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Last Name&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{old('surname')}}">
                                                    </span>
                                                </div>
                                                
                                                <input type="hidden" name="address_type" value="billing_address">
                                                <input type="hidden" name="checkout" value='checkout'>
                                                <input type="hidden" name="chek1" value='true'>
                                                <input type="hidden" name="chek2" value='true'>
                                                <input type="hidden" name="total_amount" id="all_total_amount" value="">

                                                {{-- <div class="form-row col-md-12 form-group">
                                                    <label class="">Email Name&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control" name="email">
                                                    </span>
                                                </div> --}}

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Phone&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone')}}">
                                                        @error('phone')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row address-field update_totals_on_change col-md-12 col-12 form-group">
                                                    <label class="">Country &nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <select name="billing_country" id="billing_country" name="billing_country" class="  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                                            <option value="">Select a country / region…</option>
                                                            <option value="72" selected>England</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">House Name / Number &nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" name="house_no" class="input-text form-control @error('house_no') is-invalid @enderror" value="{{old('house_no')}} "id="house_no">
                                                        @error('house_no')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">County </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('county') is-invalid @enderror" value="{{ old('county')}}" name="county" id="county">
                                                        @error('county')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Street </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('street') is-invalid @enderror" value="{{old('street')}}" name="street" id="street">
                                                        @error('street')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>
                                                
                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Locality</label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control" name="locality" id="locality" value="{{old('locality')}}">
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Town&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('town') is-invalid @enderror" value="{{old('town')}}" name="town" id="town">
                                                        @error('town')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Postcode&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('post_code') is-invalid @enderror" value="{{old('post_code')}}" name="post_code" id="postalcode">
                                                        @error('post_code')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <fieldset class="border p-3">
                                            <legend class="float-none w-auto p-2">Payment Details</legend>
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_cod">
                                                    <input id="payment_method_cod" type="radio" class="input-radio"
                                                        name="payment_method" value="cod" checked="checked"
                                                        data-order_button_text="">
                                                    <label for="payment_method_cod">
                                                        Cash on delivery<br>
                                                    </label>
                                                    <div class="payment_box payment_method_cod">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </li>
                                                <li class="wc_payment_method payment_method_epdq_checkout">
                                                    <input id="payment_method_epdq_checkout" type="radio"
                                                        class="input-radio" name="payment_method"
                                                        value="epdq_checkout" data-order_button_text="">
                                                    <label for="payment_method_epdq_checkout">
                                                        AG ePDQ Checkout<br>
                                                        <img class="ePDQ-card-icons" src="assets/images/mastercard.png" alt="mastercard">
                                                        <img class="ePDQ-card-icons" src="assets/images/amex.png" alt="amex">
                                                        <img class="ePDQ-card-icons" src="assets/images/maestro.png" alt="maestro">
                                                        <img class="ePDQ-card-icons" src="assets/images/visa.png" alt="visa">
                                                        <img class="ePDQ-card-icons" src="assets/images/jcb.png" alt="jcb">
                                                        <img class="ePDQ-card-icons" src="assets/images/diners.png" alt="diners">
                                                        <img class="ePDQ-card-icons" src="assets/images/discover.png" alt="discover">
                                                    </label>

                                                    <div class="payment_box payment_method_epdq_checkout" style="display:none;">
                                                        <p>Use the secure payment processor of Barclaycard and checkout with your debit/credit card.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <noscript>
                                                    Since your browser does not support JavaScript, or it is disabled,
                                                    please ensure you click the <em>Update Totals</em> button before
                                                    placing your order. You may be charged more than the amount stated
                                                    above if you fail to do so. <br /><button type="submit"
                                                        class="button alt" name="woocommerce_checkout_update_totals"
                                                        value="Update totals">Update totals</button>
                                                </noscript>
                                                <div class="woocommerce-terms-and-conditions-wrapper">
                                                    <div class="woocommerce-privacy-policy-text"></div>
                                                </div>
                                                <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                                                <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="800f687a3e">
                                                <input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @guest
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="login-tab">
                                <form action="{{ route('clientlogin') }}" method="POST" novalidate="novalidate">
                                    @csrf
                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto p-2">Account Login</legend>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email *</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="email" value="{{old('email')}}">
                                            </div>

                                            <input type="hidden" name="checkout" value='checkout'>
                                            <input type="hidden" name="total_amount" id="total_final_amount" value="">

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password&nbsp;<span class="required">*</span></label>
                                                <div class="custom-input-with-right-icon">
                                                    <div class="input-box">
                                                        <input id="password-field" class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{old('password')}}">
                                                    </div>
                                                    <div class="right-icon">
                                                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="mb-3 px-0 form-check">
                                                <input class="" name="rememberme" type="checkbox">
                                                <label>Remember me</label>
                                            </div> --}}

                                            <div class="row align-items-center">
                                                <div class="col-md-6 mb-3">
                                                    <input type="hidden" value=""> <button type="submit"
                                                        class="btn btn-primary">Log in</button>
                                                </div>
                                                <div class="col-md-6 mb-3 text-md-end lost_password text-md-right">
                                                    <a href="#" class="link-primary">Lost your password?</a>
                                                </div>
                                            </div>
                                    </fieldset>
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--For Find Postal Code Address Api Modal Popup-->
<div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="post_address_blk">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function calculateTotal() {
                var total = 0;

                var netPrice = parseFloat($('.net').text().replace('£', ''));
                var vatPrice = parseFloat($('.vat').text().replace('£', ''));
                var packagePrice = parseFloat($('.package-price').text().replace('£', ''));

                total = packagePrice + netPrice + vatPrice;

                // console.log(netPrice, vatPrice, packagePrice, total);

                // Update the total amount in the HTML
                $('.order-total .amount bdi').text('£' + total.toFixed(2));
                $("#all_total_amount").val(total.toFixed(2));
                $("#total_final_amount").val(total.toFixed(2));
            }

            calculateTotal();
        });

        $(document).ready(function () {

            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye-slash fa-eye");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $("#lostPassword").click(function() {
                $('#lostPasswordModal').show();
            });

            $(".forgotPasswordBtn").click(function() {
                var email = $('#lostpwd_email').val();
                if(email=='') {
                    $('.emailerror').html('Please enter email');
                    $('#lostpwd_email').css('border','1px solid red');
                } else {

                }
            });

            $('#findAddress').click(function() {
                var error = false;
                var post_code = $("#post_code").val();

                if(post_code!="") {
                    $("#zip_code").val(post_code);
                    error = false;
                } else {
                    alert('Please enter post code');
                    error = true;
                }

                if(error == false) {
                    $('#findAddress').html('Please Wait...');
                        $.ajax({
                        url: "{!! route('find-address') !!}",
                        type: 'GET',
                        data: {
                            post_code: post_code
                        },
                        success: function(result) {
                            $('#findAddress').html('Find Address');
                            $("#exampleModalCenterAddress").show();
                            $("#post_address_blk").html(result);
                        }
                    });
                }
            });

            $(".btn-close").click(function(){
                $("#exampleModalCenterAddress").hide();
            });

            // $(".select-postal").click(function(){
            //     alert("Please select");
            // });
        });

        // Set address in input field
        function selectPostalAddrApp(val) {

            console.log(val);
            var value = val.split(',');

            console.log(value);

            $("#house_no").val(value[0]);
            $("#street").val(value[1]);
            $("#town").val(value[2]);
            $("#county").val(value[3]);
            $("#postalcode").val($("#post_code").val());

            // Hide model
            $("#exampleModalCenterAddress").hide();
        }
    </script>
@endsection
