@extends('layouts.master')
@section('content')
    <!-- ================ start: main-banner ================ -->
    <input type="hidden" name="indx" id="indx" value="{{ $indx ?? '' }}">
    <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-packages-banner.png') }})">
        <div class="custom-container">
            <!-- <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">
                    <figcaption class="lg"><figcaption>Checkout</figcaption>
                </figcaption></figure>
                </div>
            <div class="center-info">
                <ul class="prev-nav-menu aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                   <li><a href="{{route('index')}}">Home</a></li>
                   <li><a>Checkout</a></li>
               </ul>
            </div>

            <div class="call-info aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="https://formationshunt.co.uk/wp-content/themes/formationshunt/assets/images/ic_baseline-phone.svg">
                </div>
                <div class="text-box">
                    <p>Free Consultations 24/7</p>
                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div> -->
            <div class="package_top_wrap checkout_package_wrap">
               <div class="namecheck-steps top">
                   <div class="w-layout-grid image-link-box-grid steps">
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/checklist.svg') }}" loading="lazy" width="54" alt="" class="step-icon">
                       <div class="step-title">Name Check</div>
                     </div>
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/select-pack.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Select Pack</div>
                     </div>
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/add.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Additional Services</div>
                     </div>
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/check-out.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Checkout</div>
                     </div>
                     <div class="container-small step">
                       <img src="{{ asset('frontend/assets/images/file-details.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">File Details</div>
                     </div>
                   </div>
                   <!-- <div class="steps-line">
                       <img src="{{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 945px) 98vw, 927px" srcset="{{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }} 500w, {{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }} 927w" alt="">
                   </div> -->
                    <div class="stepper-wrapper">
                        <div class="stepper-item completed">
                            <div class="step-counter">01</div>
                        </div>
                        <div class="stepper-item completed">
                            <div class="step-counter">02</div>
                        </div>
                        <div class="stepper-item completed">
                            <div class="step-counter">03</div>
                        </div>
                        <div class="stepper-item active">
                            <div class="step-counter">04</div>
                        </div>
                        <div class="stepper-item">
                            <div class="step-counter">05</div>
                        </div>
                    </div>
               </div>
           </div>
        </div>
    </section>
<!-- ================ start: comparePackages-sec ================ -->
<section class="sectiongap legal rrr fix-container-width woocommerce-checkout">
    <div class="container">
        <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-notices-wrapper"></div>
            <!-- <div class="package-steps text-center mb-4">
                <ol class="list-inline">
                    <li class="list-inline-item active">1. Name Check</li>
                    <li class="list-inline-item active">2. Select Package</li>
                    <li class="list-inline-item active">3. Additional Services</li>
                    <li class="list-inline-item">4. Checkout</li>
                    <li class="list-inline-item">5. Company Details</li>
                </ol>
            </div> -->
            <div class="row checkout checkout-bill">
                <div class="col-md-5 order-md-2">
                    <div class="position-sticky top-0">
                        <div class="card">
                            <div class="card-header">
                                <h3>Your Order</h3>
                                <div class="alert-info p-3 ">
                                    {{-- <p>Your new company name:</p> --}}
                                    {{-- <p class="h6">{{ isset($checkout) ? $checkout->company_name : (isset($indx) ? $sessionCart[$indx]['company_name'] ?? '' : '') }}</p> --}}
                                    <p class="h6"><b> {{ isset($checkout) ? $checkout->cart->package->package_name : (isset($indx) ? $sessionCart[$indx]['package_name'] ?? '' :  '') }}  Package</b></p>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body border shadow-none">
                                {{-- <p class="h6"><b> {{ isset($checkout) ? $checkout->cart->package->package_name : (isset($indx) ? $sessionCart[$indx]['package_name'] ?? '' :  '') }} </b> Package</p> --}}

                                {{-- <p>{!!isset($checkout) ? $checkout->cart->package->package_features : (isset($indx) ? $sessionCart[$indx]['package_features'] ?? '' :  '') !!}</p> --}}
                                <p style="margin-top: 10px; margin-bottom:10px ">

                                    <span style="font-weight: 800">Features:</span>
                                </p>
                                    @if($package)
                                    <div class="list-style-s1-with-left-arow ul-mb-0">
                                        <ul>
                                    @foreach($package->features as $feature)
                                        <li>{{ $feature->feature }}</li>
                                    @endforeach

                                        </ul>
                                    </div>
                                    @endif



                                <hr>
                                <div class="border border-success p-2 shadow-none" style="border-color:#87CB28 !important;">
                                    <table class="table table-striped mb-0">
                                        <tbody>

                                            @if (auth()->check())
                                                        @php
                                                            $total_addon_price =0 ;
                                                            if(isset($checkout->cart->addonCartServices)){

                                                                foreach ($checkout->cart->addonCartServices as $key => $value) {
                                                                   $total_addon_price+=$value->service->price;
                                                                }

                                                            }
                                                            $total_net =  ($checkout->cart->package->package_price) -  $checkout->paid_amount;


                                                        @endphp
                                            @endif
                                            <tr class="cart-subtotal ">
                                                <th colspan="4">Price</th>
                                                <td class="text-end">
                                                    <span class="woocommerce-Price-amount amount package-price"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">£</span>{{ isset($checkout) ? $total_net  : (isset($indx) ? $sessionCart[$indx]['price'] ?? '0' :  '0') }}</bdi></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody id="item-tbody" >
                                            @if(auth()->check())

                                                @if($checkout->cart)

                                                            @if(isset($checkout->cart->addonCartServices))
                                                                @foreach( $checkout->cart->addonCartServices as $key => $value)
                                                                    <tr class="fee" >
                                                                        <td colspan="4">{{ $value->service->service_name }}

                                                                        </td>
                                                                        <td class="text-end" style="display:none;"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $key] ) }}" dara-row="{{ $key }}" data-service_id="{{ $value['service_id'] }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                                        <td class="text-end" ><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $value->service->price }}</bdi></span></td>
                                                                    </tr>
                                                                @endforeach
                                                        @endif
                                                        @php
                                                        $total_purchased_address_amount = \App\Models\purchaseAddressCart::where('order_id',$checkout->order_id)->sum('price');
                                                           if ($total_purchased_address_amount==null) {
                                                               $total_purchased_address_amount=0;
                                                           }

                                                        @endphp
                                                        @if ($total_purchased_address_amount!=0)
                                                            <tr class="fee" >
                                                                <td colspan="3">Total Address services <span style="float: right">£{{ $total_purchased_address_amount }}</span></td>
                                                                <td class="text-end" style="display:none;"><a href="javascript:void(0);" data-route="" dara-row="" data-service_id="" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                                <td class="text-end" style="display:none;"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $total_purchased_address_amount }}</bdi></span></td>
                                                            </tr>
                                                        @endif
                                                @else

                                                    @if( isset($indx) && isset($sessionCart[$indx]['addon_service']) )
                                                        @foreach( $sessionCart[$indx]['addon_service'] as $key => $value)
                                                            <tr class="fee" >
                                                                <td colspan="3">{{ $value['service_name'] }}</td>
                                                                <td class="text-end" style="display:none;"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $key] ) }}" dara-row="{{ $key }}" data-service_id="{{ $value['service_id'] }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                                <td class="text-end" style="display:none;"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $value['price'] }}</bdi></span></td>
                                                            </tr>
                                                        @endforeach

                                                    @endif
                                                @endif
                                            @else
                                                @if( isset($indx) && isset($sessionCart[$indx]['addon_service']) )
                                                    @foreach( $sessionCart[$indx]['addon_service'] as $key => $value)
                                                        <tr class="fee" >
                                                            <td colspan="4">{{ $value['service_name'] }}</td>
                                                            <td class="text-end" style="display:none;"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $key] ) }}" dara-row="{{ $key }}" data-service_id="{{ $value['service_id'] }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                            <td class="text-end" ><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $value['price'] }}</bdi></span></td>
                                                        </tr>
                                                    @endforeach

                                                @endif
                                            @endif

                                        </tbody>

                                        <tbody>


                                            <tr class="tax-rate tax-rate-vat-1">
                                                <td colspan="3"></td>
                                                <th class="text-end">Net</th>
                                                <td class="text-end"><span class="woocommerce-Price-amount amount net">
                                                    <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">£</span>
                                                    </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="tax-rate tax-rate-vat-1">
                                                <td colspan="3"></td>
                                                <th class="text-end">VAT</th>
                                                <td class="text-end"><span class="woocommerce-Price-amount amount vat">
                                                    <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">£</span>
                                                    </bdi></span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <td colspan="3"></td>
                                                <th class="text-end">Total</th>
                                                <td class="text-end">
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
                                @if(auth()->check())
                                    @php
                                        $total_paid = \App\Models\orderTransaction::where('order_id', $checkout->order_id)->sum('amount');

                                    @endphp

                                    <div class="mt-3 @if ($total_paid==0) d-none @endif">
                                        <table class="table table-light">
                                            <tbody>
                                                <tr class="order-total">
                                                    <td colspan="3"></td>
                                                    <th class="text-end">Paid Amount </th>
                                                    <td class="text-end"><strong><span class="woocommerce-Price-amount paid_amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>{{$total_paid}}</bdi></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-0">
                                        <table class="table table-light shadow-none mb-0">
                                            <tbody>
                                                <tr class="order-total">
                                                    <td colspan="3"></td>
                                                    <th class="text-end">Amount Due</th>
                                                    <td class="text-end"><strong><span class="woocommerce-Price-amount amount_due"><bdi><span class="woocommerce-Price-currencySymbol">£</span></bdi></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="mt-3 d-none">
                                        <table class="table table-light shadow-none mb-0">
                                            <tbody>
                                                <tr class="order-total">
                                                    <td colspan="3"></td>
                                                    <th class="text-end">Paid Amount </th>
                                                    <td class="text-end"><strong><span class="woocommerce-Price-amount paid_amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>0</bdi></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-3" style="margin-top: 0 !important;">
                                        <table class="table table-light shadow-none mb-0">
                                            <tbody>
                                                <tr class="order-total">
                                                    <td colspan="3"></td>
                                                    <th class="text-end">Amount Due</th>
                                                    <td class="text-end"><strong><span class="woocommerce-Price-amount amount_due"><bdi><span class="woocommerce-Price-currencySymbol">£</span></bdi></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
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
                            @if (auth()->check())
                                <form action="{{ route('checkout-final')}}" method="POST">
                                <!-- <form action="{{ route('checkout-final')}}" method="POST"> -->

                            @else
                                <form action="{{ route('save-register-form')}}" method="POST">
                                    <input type="hidden" name="indx" id="indx" value="{{$indx}}">
                            @endif
                                @csrf
                                <div id="customer_details">
                                     <input type="hidden" name="order" value=" @if (auth()->check()){{$checkout->order_id}} @endif">

                                    @guest
                                        <fieldset class="border p-3 shadow-none">
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

                                    <fieldset class="border p-3 shadow-none @if(Auth::check()) d-none @endif">
                                        <legend class="float-none w-auto p-2 ">Billing Details</legend>
                                        <div class="woocommerce-billing-fields">
                                            <div class="woocommerce-billing-fields__field-wrapper row p-3">

                                                <div class="form-row form-group" id="billing_organization_field">
                                                    <label for="billing_organization" class="">Organisation (if applicable) </label>
                                                    <input type="text" class="input-text form-control @error('organisation') is-invalid @enderror" value="{{ $user->organisation ?? old('organisation')}}" name="organisation" id="billing_organization" placeholder="" >
                                                    @error('organisation')
                                                        <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 form-row form-group" id="billing_title_field"
                                                    data-priority="20">
                                                    <label for="billing_title" class="">Title&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                    <select  name="title" value="{{old('title')}}" class="select form-control @error('title') is-invalid @enderror">
                                                        <option value="" selected="selected">Please select...</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Mr') ? 'selected' : '' }} @if(old('title') == "Mr") selected @endif value="Mr">Mr</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Mrs') ? 'selected' : '' }} @if(old('title') == "Mrs") selected @endif value="Mrs">Mrs</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Miss') ? 'selected' : '' }} @if(old('title') == "Miss") selected @endif value="Miss">Miss</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Sir') ? 'selected' : '' }} @if(old('title') == "Sir") selected @endif value="Sir">Sir</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Ms') ? 'selected' : '' }} @if(old('title') == "Ms") selected @endif value="Ms">Ms</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Dr') ? 'selected' : '' }} @if(old('title') == "Dr") selected @endif value="Dr">Dr</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Madam') ? 'selected' : '' }} @if(old('title') == "Madam") selected @endif value="Madam">Madam</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Ma\'am') ? 'selected' : '' }} @if(old('title') == "Ma\'am") selected @endif value="Ma'am">Ma'am</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Lord') ? 'selected' : '' }} @if(old('title') == "Lord") selected @endif value="Lord">Lord</option>
                                                        <option {{ (isset($user->title) && $user->title == 'Lady') ? 'selected' : '' }} @if(old('title') == "Lady") selected @endif value="Lady">Lady</option>
                                                    </select>
                                                </div>
                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">First Name&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('forename') is-invalid @enderror" name="forename" value="{{ ($user->forename) ?? old('forename')}}">
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Last Name&nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{ ($user->surname) ?? old('surname')}}">
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
                                                        <input type="text" class="input-text form-control @error('phone') is-invalid @enderror" name="phone" value="{{ ($user->phone_no) ?? old('phone_no')}}" >
                                                        @error('phone')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-row col-md-12 form-group">
                                                    <label for="post_code" class="col-form-label">UK Postcode Lookup:</label>
                                                    <div class="woocommerce-input-wrapper with-rg-btn">
                                                        <input type="text" class="form-control" name="post_code" id="post_code" value="">
                                                        <button type="button" class="btn btn-primary" id="findAddress" style="padding:8px;">Find Address</button>
                                                    </div>
                                                </div>

                                                <div class="form-row address-field update_totals_on_change col-md-12 col-12 form-group">
                                                    <label class="">Country &nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <select name="billing_country" id="billing_country" name="billing_country" class="  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                                            <option value="">Select a country / region…</option>
                                                            <option value="236" selected>United Kingdom</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">House Name / Number &nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" name="house_no" class="input-text form-control @error('house_no') is-invalid @enderror" value="{{ old('house_no') }} "id="house_no">
                                                        @error('house_no')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">County &nbsp;<abbr class="required">*</abbr></label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text form-control @error('county') is-invalid @enderror" value="{{ old('county')}}" name="county" id="county">
                                                        @error('county')
                                                            <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-row col-md-12 form-group">
                                                    <label class="">Street &nbsp;<abbr class="required">*</abbr></label>
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
                                                {{-- <li class="wc_payment_method payment_method_cod">
                                                    <input id="payment_method_cod" type="radio" class="input-radio"
                                                        name="payment_method" value="cod" checked="checked"
                                                        data-order_button_text="">
                                                    <label for="payment_method_cod">
                                                        Cash on delivery<br>
                                                    </label>
                                                    <div class="payment_box payment_method_cod">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </li> --}}
                                                <!-- <li class="wc_payment_method payment_method_epdq_checkout">
                                                    <input id="payment_method_epdq_checkout" type="radio"
                                                        class="input-radio" name="payment_method"
                                                        value="epdq_checkout" checked="checked" data-order_button_text="">
                                                    <label for="payment_method_epdq_checkout">
                                                        Barclays Checkout<br>
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/mastercard.png') }}" alt="mastercard">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/amex.png') }}" alt="amex">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/maestro.png') }}" alt="maestro">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/visa.png') }}" alt="visa">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/jcb.png') }}" alt="jcb">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/diners.png') }}" alt="diners">
                                                        <img class="ePDQ-card-icons" src="{{ asset('frontend/assets/images/discover.png') }}" alt="discover">
                                                    </label>

                                                    <div class="payment_box payment_method_epdq_checkout" style="display:none;">
                                                        <p>Use the secure payment processor of Barclaycard and checkout with your debit/credit card.</p>
                                                    </div>
                                                </li> -->
                                                <li class="wc_payment_method payment_method_stripe_checkout">
                                                    <label for="payment_method_stripe_checkout">
                                                        Credit/Debit Card (Stripe)
                                                        <img src="{{ asset('frontend/assets/images/visa.png') }}" width="40">
                                                        <img src="{{ asset('frontend/assets/images/mastercard.png') }}" width="40">
                                                        <img src="{{ asset('frontend/assets/images/amex.png') }}" width="40">
                                                    </label>

                                                    <div class="payment_box payment_method_stripe_checkout" style="display:none;">
                                                        <p>Pay securely using your debit/credit card via Stripe.</p>

                                                        <div id="payment-element"></div>
                                                        <button id="place_order" class="button alt">Pay Now</button>
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                            <!-- <div class="form-row place-order">
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
                                                <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Pay Now</button>
                                                <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="800f687a3e">
                                                <input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">
                                            </div> -->
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @guest
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="login-tab">
                                <form action="{{ route('clientlogin') }}" method="POST" novalidate="novalidate">
                                    <input type="hidden" name="indx" id="indx" value="{{$indx}}">

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
                                                    <a href="{{route('forget.password.get')}}" target="_blank" class="link-primary">Lost your password?</a>
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

                $('#item-tbody tr').each(function() {
                    // Extract the price from the row
                    var price = parseFloat($(this).find('.amount bdi').text().substring(1));

                    // Add the price to the total
                    total += price;
                });

                total_net = parseFloat(total+packagePrice);
                total_vat = (parseFloat(total+packagePrice)*20)/100;

                // Update the total amount in the HTML
                $('.tax-rate .net bdi').text('£' + total_net.toFixed(2));
                $('.tax-rate .vat bdi').text('£' + total_vat.toFixed(2));

                var paid_amount = parseFloat($('.paid_amount').text().replace('£', ''));

                console.log('paid_amount',paid_amount);

                total = parseFloat(total_net) + parseFloat(total_vat);
                var final_amount = total-paid_amount;
                console.log('final_amount', final_amount);

                $('.order-total .amount bdi').text('£' + total.toFixed(2));

                $('.order-total .amount_due bdi').text('£' + final_amount.toFixed(2));


                $("#all_total_amount").val(final_amount.toFixed(2));
                $("#total_final_amount").val(final_amount.toFixed(2));

                if(final_amount.toFixed(2)==0){
                    $('#place_order').addClass('d-none');
                }else{
                    $('#place_order').removeClass('d-none');

                }
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

        // $('#place_order').on('click',function(event){
        //     event.preventDefault();

        //     console.log('under payment');


        // })
        window.scrollTo(0, 600);        
    </script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
    document.addEventListener("DOMContentLoaded", async function () {

        const stripeRadio = document.getElementById("payment_method_stripe_checkout");
        const paymentBox = document.querySelector(".payment_method_stripe_checkout .payment_box");
        const submitButton = document.getElementById("submit");

        let stripe, elements;

        async function loadStripeForm() {

            // 🔥 Call backend – no cart data sent from JS
            const res = await fetch("{{ route('payment.create') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                }
            });

            const json = await res.json();

            if (!json.clientSecret) {
                alert('Unable to initialize payment');
                return;
            }

            stripe = Stripe("{{ config('services.stripe.key') }}");

            elements = stripe.elements({
                clientSecret: json.clientSecret
            });

            const paymentElement = elements.create("payment");
            paymentElement.mount("#payment-element");

            submitButton.onclick = async function (e) {
                e.preventDefault();

                submitButton.disabled = true;

                const { error } = await stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        return_url: "{{ route('payment-success') }}"
                    }
                });

                if (error) {
                    alert(error.message);
                    submitButton.disabled = false;
                }
            };
        }

        paymentBox.style.display = "block";
                loadStripeForm();

    });
    </script>


@endsection
