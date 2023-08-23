@extends('layouts.master')
@section('content')
    {{-- Include Inner Header View --}}
    @include('layouts.inner_header')
    {{-- Additional CSS for now --}}
    <style>
        ul.ef-16-benefits-list {
            list-style: inside;
        }

        .terms-condition {
            cursor: pointer;
        }
    </style>
    <section class="sectiongap legal rrr fix-container-width ">
        <form action="" id="delivery_form">
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
                                                            <th>Quality</th>
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


                                                            <td>{{$all_order->cart->package->package_name}} </td>
                                                            <td>1</td>
                                                            <td>${{$all_order->cart->package->package_price}}</td>
                                                            <td>${{$all_order->cart->package->package_price}}</td>
                                                            <td>${{($all_order->cart->package->package_price*20)/100}}</td>
                                                        </tr>
                                                        @foreach ($all_order->cart->addonCartServices as $item)

                                                        @php

                                                                $net_total =$net_total+ $item->service->price;
                                                                $vat = ($item->service->price*20)/100;
                                                                $total_vat = $total_vat+$vat;
                                                        @endphp

                                                        <tr>

                                                            <td>{{$item->service->service_name}} </td>
                                                            <td>1</td>
                                                            <td>${{$item->service->price}}</td>
                                                            <td>${{$item->service->price}}</td>
                                                            <td>${{$vat}}</td>
                                                        </tr>

                                                        @endforeach
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
                                                                <p>${{$net_total+$all_order->cart->package->package_price}}</p>
                                                                <p>${{$total_vat+(($all_order->cart->package->package_price*20)/100)}}</p>
                                                                <strong>${{$net_total+$all_order->cart->package->package_price+$total_vat}}</strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="delivery-details-info">
                                                <h4 class="form-ttl">Delivery Details</h4>
                                                <p>Please check the recipient information below is correct, as these details
                                                    will be used to deliver your order to you.</p>
                                                <div class="delivery-feild-panel">
                                                    <label for="">Order Description (optional) : </label>
                                                    <div class="feild-block">
                                                        <input type="text" class="form-control"
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
                                                            <input type="radio" id="no" name="regulated">
                                                            <label for="no">NO</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="yes" name="regulated">
                                                            <label for="yes">yes</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="feild-list">
                                                    <li>
                                                        <label>Your Date of Birth :</label>
                                                        <input type="date" name="dob" class="form-control">
                                                    </li>
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
                                                        {{-- <button type="button" id="choosePrimaryAddress"  class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="openModalButton" role="button" aria-disabled="false" fdprocessedid="4xigk"><span class="ui-button-text"> Choose Another</span></button> --}}
                                                        <button class="btn" id="choosePrimaryAddress" role="button"
                                                            aria-disabled="false">Choose Address</button>
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
                                                        <select class="form-control" name="contact_referer">
                                                            <option value="">Please Select</option>
                                                            <option value="myself" selected="selected">Myself</option>
                                                            <option value="somebodyelse">Somebody Else</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <label>Contact Name : </label>
                                                        <select class="form-control">
                                                            <option value="">Please Select</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <label>Contact Email : </label>
                                                        <input type="email" class="form-control" name="contact_email">
                                                    </li>
                                                    <li>
                                                        <label>Contact Phone : </label>
                                                        <input type="number" class="form-control" name="contact_phone">
                                                    </li>
                                                    <li>
                                                        <label>Contact Mobile : </label>
                                                        <input type="number" class="form-control" name="contact_mobile">
                                                    </li>
                                                    <li>
                                                        <label>Preferred Call Time : </label>
                                                        <select class="form-control">
                                                            <option value="Morning">Morning</option>
                                                            <option value="Afternoon">Afternoon</option>
                                                            <option value="Evening">Evening</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <label for="">Residential Address : </label>
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                        {{-- <span>@foreach ($primary_address as $key => $value)


                                                    <p>@if ($value['house_number']){{ $value['house_number']}},@endif @if ($value['street']){{$value['street']}},@endif  @if ($value['locality']){{$value['locality']}}, @endif @if ($value['town']){{ $value['town']}}, @endif  @if ($value['county']){{ $value['county']}} @endif</p>
                                                    <p>{{ $value['country_name']}},{{ $value['post_code']}}</p>

                                                    @endforeach</span>
                                                    {{-- <button type="button" id="choosePrimaryAddress"  class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="openModalButton" role="button" aria-disabled="false" fdprocessedid="4xigk"><span class="ui-button-text"> Choose Another</span></button>
                                                <button class="btn" id="choosePrimaryAddress" role="button" aria-disabled="false">Choose Address</button> --}}
                                                    </li>
                                                </ul>
                                                <div class="checkbox-panel">
                                                    <input type="checkbox" id="lorem" name="checkbox_one">
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
                                                    <input type="checkbox" id="updates" name="checkbox_two">
                                                    <label for="updates"><strong>I would like to receive updates from 1st
                                                            Formations</strong></label>
                                                </div>
                                                <div class="checkbox-panel">
                                                    <input type="checkbox" id="lorem" name="checkbox_three">
                                                    <label for="lorem"><strong>I agree to the <a href="#">Terms
                                                                and Conditions</a> & <a href="#">Privacy
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
    <div class="modal custom-modal-s1" id="choosePrimaryAddressModal" tabindex="-1" role="dialog"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
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

            $("#choosePrimaryAddress").click(function() {
                $('#choosePrimaryAddressModal').modal('show');
            });



        });

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

        $("#delivery_form").submit(function(e) {
            e.preventDefault();
            return false;
        });

        $("#delivery_form").validate({
            rules: {
                recipient_name: "required",
                recipient_email: "required",
                regulated: "required",
                dob: "required",
                relation_area: "required",
                contact_email: "required",
                contact_phone: "required",
                contact_mobile: "required",
                checkbox_one: "required",
                checkbox_two: "required",
                checkbox_three: "required",


            },
            errorClass: "my-error-class",
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.appendTo(element.parent("li").parent('ul').parent('div'));
                } else {
                    error.insertAfter(element);
                }
            }

        });
    </script>

    <style>
        .my-error-class {
            color: #FF0000 !important;
            margin-left: 2px;
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
