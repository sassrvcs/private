@extends('layouts.master')
@section('style')
    <style>
        ul.ef-16-benefits-list {
            list-style: inside;
        }

        .terms-condition {
            cursor: pointer;
        }

        .my-error-class {
            color: #FF0000 !important;
            margin-left: 6px!important;
            /* red */
        }

        input.my-error-class,
        textarea.my-error-class,
        select.my-error-class {
            border: 1px solid #FF0000 !important;
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
@endsection
@section('content')
    {{-- Include Inner Header View --}}
    @include('layouts.inner_header')
    {{-- Additional CSS for now --}}

    <section class="sectiongap legal rrr fix-container-width ">
        <form action="{{ route('delivery-partner.create') }}" id="delivery_form" method="post">
            @csrf
            <div class="container">
                <div class="companies-wrap">
                    <div class="row woo-account">
                        @include('layouts.navbar')
                        <div class="col-md-12">
                            <div class="particulars-form-wrap">
                                <div class="particulars-top-step">
                                    <div class="top-step-items">
                                        <a
                                            href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}">
                                            <strong>1.Company Formation</strong>
                                            <span>Details about your company</span>
                                        </a>
                                    </div>
                                    <div class="top-step-items">
                                        <strong>2.Business Essentials</strong>
                                        <span>Products & Services</span>
                                    </div>
                                    <div class="top-step-items">
                                        <strong>3.Summary</strong>
                                        <span>Details about your order</span>
                                    </div>
                                    <div class="top-step-items active">
                                        <strong>4.Delivery & Partner Services</strong>
                                        <span>Delivery & Partner Details</span>
                                    </div>
                                </div>
                                <div class="particulars-bottom-step justify-content-start">
                                    <div class="bottom-step-items active">
                                        <img src="assets/images/active-tick.svg" alt="">
                                        <p>Delivery & Partner Services </p>
                                    </div>
                                </div>
                                <div class="delivery-partner-sec pt-4">
                                    <h4 class="form-ttl">Payment For {{ $deliveryPartner->companie_name }}</h4>
                                    <div class="delivery-partner-wrap">
                                        <div class="payment-pro-table-wrap">
                                            <div class="table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Net</th>
                                                            <th>VAT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5">{{ $deliveryPartner->companie_name }}</td>
                                                        </tr>

                                                        <tr>


                                                            <td>{{ $all_order->cart->package->package_name }} </td>
                                                            <td>1</td>
                                                            <td>£{{ $all_order->cart->package->package_price }}</td>
                                                            <td>£{{ $all_order->cart->package->package_price }}</td>
                                                            <td>£{{ ($all_order->cart->package->package_price * 20) / 100 }}
                                                            </td>
                                                        </tr>
                                                        @foreach ($all_order->cart->addonCartServices as $item)
                                                            @php

                                                                $net_total = $net_total + $item->service->price;
                                                                $vat = ($item->service->price * 20) / 100;
                                                                $total_vat = $total_vat + $vat;
                                                            @endphp

                                                            <tr>

                                                                <td>{{ $item->service->service_name }} </td>
                                                                <td>1</td>
                                                                <td>£{{ $item->service->price }}</td>
                                                                <td>£{{ $item->service->price }}</td>
                                                                <td>£{{ $vat }}</td>
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
                                                                <td>{{$item->price}}</td>
                                                                <td>{{($item->price*20)/100}}</td>
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
                                                            <td>{{$item->total_sum}}</td>
                                                            <td>{{($item->total_sum*20)/100}}</td>
                                                        </tr>
                                                        @endif

                                                    @endforeach

                                                    @endif
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td>
                                                                <p>Net Total :</p>
                                                                <p>VAT :</p>
                                                                <strong>Total :</strong>

                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <p>£{{ $net_total + $total_purchased_address_amount+$all_order->cart->package->package_price }}
                                                                </p>
                                                                <p>£{{ $total_vat + (($all_order->cart->package->package_price+$total_purchased_address_amount) * 20) / 100 }}
                                                                </p>
                                                                @php
                                                                    $total_price = $net_total + $total_purchased_address_amount+$all_order->cart->package->package_price + ($total_vat + (($all_order->cart->package->package_price+$total_purchased_address_amount) * 20) / 100);
                                                                    $total_paid = \App\Models\orderTransaction::where('order_id', $_GET['order'])->sum('amount');
                                                                    $due_amount = $total_price - $total_paid;
                                                                @endphp
                                                                <strong>£{{ $total_price }}</strong>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <p>Amount Paid</p>


                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>


                                                                <p>- £{{ $total_paid }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Due Amount</strong>


                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>


                                                                <strong>£{{ $due_amount }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>


                                                </table>
                                            </div>
                                            <div class="delivery-details-info">
                                                <input type="hidden" name="order_id" value="{{ $_GET['order'] }}">
                                                <h4 class="form-ttl">Delivery Details</h4>
                                                <p>Please check the recipient information below is correct, as these details
                                                    will be used to deliver your order to you.</p>
                                                <div class="delivery-feild-panel">
                                                    <label for="">Order Description (optional) : </label>
                                                    <div class="feild-block">
                                                        <input type="text" class="form-control" name="order_desc"
                                                            value="{{ $deliveryPartner->companie_name }}">
                                                    </div>
                                                </div>
                                                <div class="delivery-feild-panel">
                                                    <label for="">Recipient Name : </label>
                                                    <div class="feild-block">
                                                        <input type="text" class="form-control" name="recipient_name"
                                                            value="{{ $user->forename }} {{ $user->surname }}">
                                                    </div>
                                                </div>
                                                <div class="delivery-feild-panel">
                                                    <label for="">Recipient Email : </label>
                                                    <div class="feild-block">
                                                        <input type="email" class="form-control" name="recipient_email"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="your-details-wrap">
                                            <div class="your-details-ttl">
                                                <img src="assets/images/user-icon.png" alt="">
                                                <p>Your Details</p>
                                            </div>
                                            <div class="your-details-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum
                                                    diam quam, ut malesuada magna sollicitudin eu. Donec ut magna malesuada,
                                                    scelerisque elit ut, convallis urna. Etiam non elit sed tortor sodales
                                                    finibus eget ut leo :</p>
                                                <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                        interdum diam quam, ut malesuada magna sollicitudin eu. Donec ut
                                                        magna malesuada, scelerisque elit ut, convallis urna. Etiam non elit
                                                        sed tortor sodales finibus eget ut leo</strong></p>
                                                <div class="regulated-radio-block">
                                                    <p>Are you part of a regulated body?</p>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" value="no" id="no"
                                                                name="regulated" checked>
                                                            <label for="no">NO</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" value="yes" id="yes"
                                                                name="regulated">
                                                            <label for="yes">yes</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="feild-list">

                                                    <li>
                                                        <label for="">Residential Address : </label>
                                                        <span>
                                                            @foreach ($primary_address as $key => $value)
                                                                <p>
                                                                    @if ($value['house_number'])
                                                                        {{ $value['house_number'] }},
                                                                        @endif @if ($value['street'])
                                                                            {{ $value['street'] }},
                                                                            @endif @if ($value['locality'])
                                                                                {{ $value['locality'] }},
                                                                                @endif @if ($value['town'])
                                                                                    {{ $value['town'] }},
                                                                                    @endif @if ($value['county'])
                                                                                        {{ $value['county'] }}
                                                                                    @endif
                                                                </p>
                                                                <p>{{ $value['country_name'] }},{{ $value['post_code'] }}
                                                                </p>
                                                            @endforeach
                                                        </span>
                                                        <button type="button" id="choosePrimaryAddress"
                                                            class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force"
                                                            id="openModalButton" role="button" aria-disabled="false"
                                                            fdprocessedid="4xigk"><span class="ui-button-text" onclick="openModal()" style="margin-left:10px"> Choose
                                                                Another</span></button>
                                                        {{-- <button class="btn" id="choosePrimaryAddress" role="button"
                                                            aria-disabled="false">Choose Address</button> --}}
                                                    </li>
                                                    <li>
                                                        <label>Your Date of Birth :</label>
                                                        <input type="date" id="dob" name="dob"
                                                            class="form-control" onclick="dob_onclick(this)">
                                                    </li>
                                                    <li class="align-items-start">
                                                        <label for="">What is your relation to this company? :
                                                        </label>
                                                        <textarea class="form-control" id="relation_area" name="relation_area"></textarea>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="your-details-ttl">
                                                <img src="assets/images/partner-services-icon.png" alt="">
                                                <p>Partner Services</p>
                                            </div>
                                            <div class="your-details-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum
                                                    diam quam, ut malesuada magna sollicitudin eu. Donec ut magna malesuada,
                                                    scelerisque elit ut, convallis urna. Etiam non elit sed tortor sodales
                                                    finibus eget ut leo. Pellentesque euismod elementum rutrum. Lorem ipsum
                                                    dolor sit amet, consectetur adipiscing elit. Quisque interdum diam quam,
                                                    ut malesuada magna sollicitudin eu. Donec ut magna malesuada,
                                                    scelerisque elit ut, convallis urna.</p>
                                                <p><strong>Tide</strong></p>
                                                <ul class="feild-list">
                                                    <li>
                                                        <label>Referring </label>
                                                        <select class="form-control" name="contact_referer"
                                                            id="fetchParterDetails">
                                                            <option value="" selected="selected">Please Select
                                                            </option>
                                                            <option value="myself">Myself</option>
                                                            <option value="somebodyelse">Somebody Else</option>
                                                        </select>
                                                    </li>
                                                    <li id="populate_referrer_name" hidden>
                                                        <label>Referrer's Name: </label>
                                                        <input type="text" class="form-control" name="referrer_name"
                                                            value="{{ $user->forename }} {{ $user->surname }}">
                                                    </li>
                                                    <li>
                                                        <label>Contact Name : </label>
                                                        <select class="form-control" id="contact_name"
                                                            name="contact_name">
                                                            <option value="">Please Select</option>
                                                            @forelse ($partner_services_contact_name as $partner_name)
                                                                <option
                                                                    value="{{ $partner_name['first_name'] }} {{ $partner_name['last_name'] }}"
                                                                    data-address=" @if ($partner_name['house_number']) {{ $partner_name['house_number'] }}, @endif @if ($partner_name['street']) {{ $partner_name['street'] }}, @endif @if ($partner_name['locality']) {{ $partner_name['locality'] }}, @endif @if ($partner_name['town']) {{ $partner_name['town'] }}, @endif @if ($partner_name['county']) {{ $partner_name['county'] }}, @endif @if ($partner_name['post_code']) {{ $partner_name['post_code'] }} @endif"
                                                                    data-add-id="{{ $partner_name['add_id'] }}">
                                                                    {{ $partner_name['first_name'] }}
                                                                    {{ $partner_name['last_name'] }}</option>
                                                            @empty
                                                                <option value="">No data found</option>
                                                            @endforelse
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <label>Contact Email : </label>
                                                        <input type="email" class="form-control" name="contact_email">
                                                    </li>
                                                    <li class="uk_phone">
                                                        <label>Contact Phone : </label>
                                                        <span>+44</span>
                                                        <input type="number" class="form-control" name="contact_phone"
                                                            id="contact_phone" minlength="10" maxlength="10">
                                                    </li>
                                                    <li class="uk_phone">
                                                        <label>Contact Mobile : </label>
                                                        <span>+44</span>
                                                        <input type="number" class="form-control" name="contact_mobile"
                                                            id="contact_mobile" minlength="10" maxlength="10">
                                                    </li>
                                                    <li>
                                                        <label>Preferred Call Time : </label>
                                                        <select class="form-control" name="call_time">
                                                            <option value="Morning">Morning</option>
                                                            <option value="Afternoon">Afternoon</option>
                                                            <option value="Evening">Evening</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <label for="">Residential Address : </label>
                                                        <input type="text" class="form-control" name="res_address"
                                                            id="res_address">
                                                        <input type="text" class="form-control" name="res_address_id"
                                                            id="res_address_id" hidden>
                                                        {{-- <span>@foreach ($primary_address as $key => $value)


                                                    <p>@if ($value['house_number']){{ $value['house_number']}},@endif @if ($value['street']){{$value['street']}},@endif  @if ($value['locality']){{$value['locality']}}, @endif @if ($value['town']){{ $value['town']}}, @endif  @if ($value['county']){{ $value['county']}} @endif</p>
                                                    <p>{{ $value['country_name']}},{{ $value['post_code']}}</p>

                                                    @endforeach</span>
                                                    {{-- <button type="button" id="choosePrimaryAddress"  class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="openModalButton" role="button" aria-disabled="false" fdprocessedid="4xigk"><span class="ui-button-text"> Choose Another</span></button>
                                                <button class="btn" id="choosePrimaryAddress" role="button" aria-disabled="false">Choose Address</button> --}}
                                                    </li>
                                                </ul>
                                                <div class="checkbox-panel">
                                                    <input type="checkbox" id="lorem" name="i_confirm">
                                                    <label for="lorem">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. Quisque interdum diam quam, ut malesuada magna
                                                        sollicitudin eu. Donec ut magna malesuada, scelerisque elit ut,
                                                        convallis urna. Etiam non elit sed tortor sodales finibus eget ut
                                                        leo. Pellentesque euismod elementum rutrum.</label>
                                                </div>
                                                <div class="refer-free">
                                                    <i>*A referral fee may have been paid for an introduction.</i>
                                                </div>
                                                <div class="checkbox-panel">
                                                    <input type="checkbox" id="updates" name="receive_updates">
                                                    <label for="updates"><strong>I would like to receive updates from 1st
                                                            Formations</strong></label>
                                                </div>
                                                <div class="checkbox-panel">
                                                    <input type="checkbox" id="lorem" name="terms">
                                                    <label for="lorem"><strong>I agree to the <a
                                                                href="{{ route('page', ['slug' => 'terms-conditions']) }}">Terms
                                                                and Conditions</a> & <a
                                                                href="{{ route('page', ['slug' => 'gdpr-privacy-policy']) }}">Privacy
                                                                Policy</a></strong></label>
                                                </div>
                                                <div class="step-btn-wrap mt-4">
                                                    <button class="btn" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    {{-- Open modal for choose address --}}
    <div class="modal custom-modal-s1" id="choosePrimaryAddressModalData" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="choose_addr">
                        <h3>Recently Used Addresses</h3>
                        <div class="current_address_grp">
                            @foreach ($primary_address_list as $key => $value)
                                <div class="addr_wrap">
                                    <p>
                                        @if ($value['house_number'])
                                            {{ $value['house_number'] }},
                                            @endif @if ($value['street'])
                                                {{ $value['street'] }},
                                                @endif @if ($value['locality'])
                                                    {{ $value['locality'] }},
                                                    @endif @if ($value['town'])
                                                        {{ $value['town'] }},
                                                    @endif {{ $value['county'] }}
                                    </p>
                                    <p>{{ $value['country_name'] }},{{ $value['post_code'] }}</p>
                                </div>
                                <div class="button_select">
                                    <button class="btn btn-primary" data-dismiss="modal"
                                        onclick="setAddress({{ $value['user_id'] }},{{ $value['id'] }},'primary_address')"
                                        type="button">Select</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-primary addNewAddress" data-dismiss="modal">Add new
                        address</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal custom-modal-s1" id="BIllingAddressModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="choose_addr">
                        <h3>Recently Used Addresses</h3>
                        <div class="current_address_grp">
                            @foreach ($billing_address_list as $key => $value)
                                <div class="addr_wrap">
                                    <p>
                                        @if ($value['house_number'])
                                            {{ $value['house_number'] }},
                                            @endif @if ($value['street'])
                                                {{ $value['street'] }},
                                                @endif @if ($value['locality'])
                                                    {{ $value['locality'] }},
                                                    @endif @if ($value['town'])
                                                        {{ $value['town'] }},
                                                    @endif {{ $value['county'] }}
                                    </p>
                                    <p>{{ $value['country_name'] }},{{ $value['post_code'] }}</p>
                                </div>
                                <div class="button_select">
                                    <input type="hidden" id="bil_house_number" value="{{ $value['house_number'] }}">
                                    <input type="hidden" id="bil_street" value="{{ $value['street'] }}">
                                    <input type="hidden" id="bil_locality" value="{{ $value['locality'] }}">
                                    <input type="hidden" id="bil_town" value="{{ $value['town'] }}">
                                    <input type="hidden" id="bil_county" value="{{ $value['county'] }}">
                                    <input type="hidden" id="bil_post_code" value="{{ $value['post_code'] }}">
                                    <input type="hidden" id="bil_country_name" value="{{ $value['country_name'] }}">

                                    <button class="btn btn-primary" data-dismiss="modal"
                                        onclick="setAddress({{ $value['user_id'] }},{{ $value['id'] }},'billing_address')"
                                        type="button">Select</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary addbillAddress" data-dismiss="modal">Add new
                        address</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


    <script>
        function dob_onclick(ths) {
            const today = new Date().toISOString().split('T')[0];
            ths.setAttribute("max", today);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const dontNeedButton = document.querySelector('.btn-don-need');
            if (dontNeedButton) {
                dontNeedButton.addEventListener('click', function() {
                    // alert("You have indicated that you don't need a bank account.");
                    $('#business-essential-store').submit();
                });
            }
        });

        $(document).ready(function() {
            $('.select-service').click(function() {
                // alert($(this).data('id'));
                $(".business-ess-panel").css("border", "1px solid #D9D9D9");
                $('.active-icon').css("display", "none");

                var businessBankId = $(this).data('id');
                var divSelector = ".business-ess-panel.div-" + businessBankId;
                // $('#business_bank_id').val(businessBankId);

                // Add CSS styles to the selected div
                // $(divSelector).css("border", "3px solid #01ff7e");

                var isRadioChecked = $(`.radio-${businessBankId}`).is(":checked");
                if (isRadioChecked) {
                    $(`.radio-${businessBankId}`).prop("checked", false);
                    $('#business_bank_id').val('0');
                    // Add CSS styles to the selected div
                    $(divSelector).css("border", "1px solid #D9D9D9");
                    $(`.checkbox-${businessBankId}`).css("display", "none");
                } else {
                    $(`.radio-${businessBankId}`).prop("checked", true);
                    $('#business_bank_id').val(businessBankId);
                    // Add CSS styles to the selected div
                    $(divSelector).css("border", "1px solid #87CB28");
                    $(`.checkbox-${businessBankId}`).css("display", "block");
                }
            });

            // $("#choosePrimaryAddress").click(function() {
            //     $('#choosePrimaryAddressModal').modal('show');
            // });

            $("#fetchParterDetails").change(function() {
                var mode = $(this).val();
                if (mode == 'myself' || mode == '') {
                    $("#populate_referrer_name").attr('hidden', true);
                }
                if (mode == 'somebodyelse') {
                    $("#populate_referrer_name").removeAttr('hidden', true);
                }
            })

            $('#contact_name').change(function() {
                var selectedOption = $(this).children('option:selected');
                var address = selectedOption.data('address');
                var add_id = selectedOption.data('add-id');
                address = $.trim(address);
                add_id = $.trim(add_id);
                $("#res_address").val(address);
                $("#res_address_id").val(add_id);

            });
        });
        function openModal(){
            console.log('hit');
                $('#choosePrimaryAddressModalData').modal('show');

        }


        function setAddress(userId, addressId, addressType) {
            var url = "{{ route('my_details') }}";
            // $(this).text('please wait..');
            var number = $("#bil_house_number").val();
            var steet = $("#bil_street").val();
            var locality = $("#bil_locality").val();
            var town = $("#bil_town").val();
            var county = $("#bil_county").val();
            if (county == undefined) {
                county = "";
            }
            var postcode = $("#bil_post_code").val();
            var contry = $("#bil_country_name").val();

            $.ajax({
                url: "{!! route('update-selected-address') !!}",
                type: 'GET',
                data: {
                    user_id: userId,
                    address_id: addressId,
                    address_type: addressType,
                    number: number,
                    steet: steet,
                    locality: locality,
                    town: town,
                    county: county,
                    postcode: postcode,
                    contry: contry,
                },
                success: function(result) {
                    window.location.reload();
                }
            });

        }




        $('#delivery_form').validate({
            errorClass: "my-error-class",
                rules: {
                    recipient_name: "required",
                    recipient_email: "required",
                    regulated: "required",
                    dob: {
                        dobNotLessThan18: true,
                        required: true,
                    },
                    relation_area: "required",
                    contact_name: "required",
                    contact_email: "required",
                    contact_phone: {
                        required: true
                    },
                    contact_mobile: "required",
                    res_address: "required",
                    i_confirm: "required",
                    receive_updates: "required",
                    terms: "required",
            },
            submitHandler: function() {
                $('#delivery_form').submit();
            }

        });
        $.validator.addMethod("dobNotLessThan18", function(value, element) {
                var inputDate = new Date(value);
                var minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 16);
                return inputDate <= minDate;
            }, "You must be at least 16 years old.");
    </script>
@endsection
