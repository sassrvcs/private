@extends('layouts.app')
@section('content')
<style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
<!-- ================ start: common-inner-page-banner ================ -->
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png')}})">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg')}}"></span>
                </div>
                <figcaption>My <span>Account</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="{{ url('')}}">Home</a></li>
                <li><a>My Details</a></li>
            </ul>
        </div>
        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <div class="icon-container">
                <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg')}}">
            </div>
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: common-inner-page-banner ================ -->
<!-- ================ start: customer_login ================ -->
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <div class="woocommerce">
            <div class="row woo-account">
                @include('layouts.navbar')
                <div class="col-12 col-md-12">
                    <div class="sec-common-title-s2 mt-4">
                        <h1>My Details</h1>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="customer-signup-s1">
                        <form method="post" action="{{ route('my-details-save')}}" class="form-register register">
                            @csrf
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto p-2">Account Holder</legend>
                                <div class="form-row form-group ">
                                    <label for="username">Organisation
                                    </label>
                                    <span class="input-wrapper">
                                        <input type="text" class="input-text form-control @error('organisation') is-invalid @enderror" name="organisation" value="{{ $user->organisation }}">
                                    </span>
                                </div>
                                <div class="form-row form-group ">
                                    <label>Title:&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <span class="input-wrapper ">
                                        <select class="select form-control @error('title') is-invalid @enderror" name="title" data-placeholder="Please select...">
                                            <option value="">Please select...</option>
                                            <option value="Mr" @if($user->title == "Mr") selected @endif>Mr</option>
                                            <option value="Mrs" @if($user->title == "Mrs") selected @endif>Mrs</option>
                                            <option value="Miss" @if($user->title == "Miss") selected @endif>Miss</option>
                                            <option value="Sir" @if($user->title == "Sir") selected @endif>Sir</option>
                                            <option value="Ms" @if($user->title == "Ms") selected @endif>Ms</option>
                                            <option value="Dr" @if($user->title == "Dr") selected @endif>Dr</option>
                                            <option value="Madam" @if($user->title == "Madam") selected @endif>Madam</option>
                                            <option value="Ma'am" @if($user->title == "Ma'am") selected @endif>Ma'am</option>
                                            <option value="Lord" @if($user->title == "Lord") selected @endif>Lord</option>
                                            <option value="Lady" @if($user->title == "Lady") selected @endif>Lady</option>
                                        </select>
                                    </span>
                                </div>

                                <div class="form-row form-group ">
                                    <label>Firstname:&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <span class="input-wrapper ">
                                        <input class="form-control @error('forename') is-invalid @enderror" type="text" name="forename" value={{ $user->forename}}>
                                    </span>
                                </div>


                                <div class="form-row form-group ">
                                    <label>Lastname:&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <span class="input-wrapper ">
                                        <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value={{$user->surname}}>
                                    </span>
                                </div>


                                <div class="form-row form-group ">
                                    <label>Username:&nbsp;<abbr class="required" title="required">*</abbr></label>
                                    <span class="input-wrapper ">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value={{$user->email}}>
                                    </span>
                                </div>


                                <div class="form-row form-group ">
                                    <label>New Password:&nbsp;</label>
                                    <span class="input-wrapper ">
                                        <input class="form-control" type="password" name="password" placeholder="Optional" value={{ old('password') }}>
                                        @error('password')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>



                                <div class="form-row form-group ">
                                    <label>Confirm Password:&nbsp;</label>
                                    <span class="input-wrapper ">
                                        <div class="custom-input-with-right-icon">
                                            <div class="input-box">
                                                <input class="form-control" type="password" name="confirm_password" placeholder="Optional">
                                            </div>
                                        </div>
                                        @error('confirm_password')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>
                            </fieldset>
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto p-2">Contact Addresses</legend>
                                <div class="row p-3" style="padding-top: 0 !important;">
                                    <div class="form-row form-group" id="contactgrp">
                                        <table class="efPostalAddresses efTableCondensed">
                                            <tbody>
                                                <tr>
                                                    <th style="vertical-align:top" class="th-label">
                                                        <label>Primary <span class="required_mark">*</span></label>
                                                    </th>
                                                    <td class="td-value-td">
                                                        <div class="td-value-inner">
                                                            <span class="efTextInput address bill-addr text-container" id="primaryPostalAddress" name="primaryPostalAddress" data-email-address="PRIMARY">

                                                                @foreach($primary_address as $key => $value)

                                                                <p>@if($value['house_number']){{ $value['house_number']}},@endif @if($value['street']){{$value['street']}},@endif  @if($value['locality']){{$value['locality']}}, @endif @if($value['town']){{ $value['town']}}, @endif  @if($value['county']){{ $value['county']}} @endif</p>
                                                                <p>{{ $value['billing_country']}},{{ $value['post_code']}}</p>
                                                                @endforeach
                                                            </span>
                                                            <div class="action-container">
                                                                <button type="button" id="choosePrimaryAddress"  class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="openModalButton" role="button" aria-disabled="false" fdprocessedid="4xigk"><span class="ui-button-text"> Choose Another</span></button>
                                                                <button type="button" id="editPrimaryAddress" class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="edit-bill-addr" role="button" aria-disabled="false" fdprocessedid="ruzkzh"><span class="ui-button-text"> Edit</span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @if($billing_address)
                                                <tr>
                                                    <th style="vertical-align:top" class="th-label">
                                                        <label>Billing <span class="required_mark">*</span></label>
                                                    </th>
                                                    <td class="td-value-td">
                                                        <div class="td-value-inner">
                                                            <span class="efTextInput address bill-addr text-container" id="primaryPostalAddress" name="primaryPostalAddress" data-email-address="PRIMARY">
                                                                @foreach($billing_address as $key => $value)

                                                                <p>{{ $value['house_number']}}, {{$value['street']}},{{$value['locality']}},{{ $value['town']}}, {{ $value['county']}}</p>
                                                                <p>{{ $value['billing_country']}},{{ $value['post_code']}}</p>
                                                                @endforeach
                                                            </span>
                                                            <div class="action-container">
                                                                <button type="button" class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force" id="openBIllingModalButton"  role="button" aria-disabled="false" fdprocessedid="4xigk"><span class="ui-button-text"> Choose Another</span></button>
                                                                <button type="button"  class="efButton efEditButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only theme-btn-primary-force editBillingAddress" id="edit-bill-addr" role="button" aria-disabled="false" fdprocessedid="ruzkzh"><span class="ui-button-text"> Edit</span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="loader" style="display:none"></div>

                                    </div>
                                </div>
                            </fieldset>



                            <fieldset class="border p-3">
                                <legend class="float-none w-auto p-2">Email Addresses
                                </legend>
                                <div class="form-row form-group ">
                                    <label for="username">Primary&nbsp;</label>
                                    <span class="input-wrapper">
                                        <input type="email" name="email" value={{$user->email}} class="input-text form-control" readonly>
                                        @error('email')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-row form-group ">
                                    <label>Billing&nbsp;</label>
                                    <span class="input-wrapper ">
                                        <input class="form-control" type="email" name="billing_email" value={{$user->billing_email}}>
                                    </span>
                                </div>

                            </fieldset>
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto p-2">Phone Numbers</legend>
                                <div class="form-row form-group ">
                                    <label for="username">Primary&nbsp;</label>
                                    <span class="input-wrapper">
                                        <input type="number" class="input-text form-control" name="phone" value={{ $user->phone_no}}>
                                    </span>
                                </div>


                                <div class="form-row form-group ">
                                    <label>Billing&nbsp;</label>
                                    <span class="input-wrapper ">
                                        <input class="form-control" type="number" class="input-text form-control" name="billing_phone" value={{ $user->billing_phone_no}}>
                                    </span>
                                </div>

                            </fieldset>
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto p-2">Notifications
                                </legend>
                                <div class=" px-0 col-md-12 col-12 mb-2">
                                    <div class="px-0 form-check">
                                        <b class="mr-2">Newsletter</b><input class="" id="chek1" name="chek1" type="checkbox">
                                        <label for="chek1"> I would like to sign up to the newsletter distribution list
                                        </label>
                                        @error('chek1')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" px-0 col-md-12 col-12 mb-2">
                                    <div class="px-0 form-check">
                                        <b class="mr-2">Confirmation Statement</b> <input class="" id="chek2" name="chek2" type="checkbox">
                                        <label for="chek2"> I would like to receive updates on the confirmation statement</label>
                                        @error('chek2')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" px-0 col-md-12 col-12">
                                    <div class="px-0 form-check">
                                        <b class="mr-2">Accounts</b> <input class="" id="chek3" name="chek3" type="checkbox">
                                        <label for="chek3"> I would like to receive updates on my accounts
                                        </label>
                                        @error('chek3')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: customer_login ================ -->
<div class="modal" id="choosePrimaryAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="choose_addr">
                    <h3>Recently Used Addresses</h3>
                    <div class="current_address_grp">
                        @foreach($primary_address as $key => $value)
                        <div class="addr_wrap">
                            <p>{{ $value['house_number']}}, {{$value['street']}},{{$value['locality']}},{{ $value['town']}}, {{ $value['county']}}</p>
                            <p>{{ $value['billing_country']}},{{ $value['post_code']}}</p>
                        </div>
                        <div class="button_select">
                            <button class="btn btn-primary" data-dismiss="modal" type="button">Select</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary addNewAddress" data-dismiss="modal">Add new address</button>
              </div>
        </div>
    </div>
</div>

<div class="modal" id="BIllingAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div>
                    <h3>Recently Used Addresses</h3>
                    <div>
                        @foreach($billing_address as $key => $value)
                            <p>{{ $value['house_number']}}, {{$value['street']}},{{$value['locality']}},{{ $value['town']}}, {{ $value['county']}}</p>
                            <p>{{ $value['billing_country']}},{{ $value['post_code']}}</p>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">Select</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary addbillAddress" data-dismiss="modal">Add new address</button>
              </div>
        </div>
    </div>
</div>
<!--For primary Address Modal Popup-->
<!-- Billing Address modal pop up -->
<div class="modal" id="chooseBIllingAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div>
                    <h3>Recently Used Addresses</h3>
                    <div>
                        @foreach($billing_address as $key => $value)
                            <p>{{$value['house_number'] }}, {{$value['street']}},{{$value['locality']}},{{ $value['town']}}, {{ $value['county']}}</p>
                            <p>{{ $value['billing_country']}},{{ $value['post_code']}}</p>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">Select</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary addNewAddress" data-dismiss="modal">Add new address</button>
              </div>
        </div>
    </div>
</div>
{{-- edit billing address modal --}}
<div class="modal" id="editbillingAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation required</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div>
                    Are you sure you wish to edit this address?
                    Do not use this option if you wish to use a different address.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirmShowbill" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
              </div>
        </div>
    </div>
</div>



<div class="modal" id="billingAddressConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form class="billingAddrUpdateForm formInput" >
                    <input type="hidden" name="user_id" class="user_id" value="{{ $user->id }}">

                    @foreach($billing_address as $key => $v)
                        <div class="form-row form-group ">
                            <label>Name / Number:
                                </span>
                            </label>
                            <span class="input-wrapper">
                                <input type="text" id="house_no1" name="house_no" class="input-text form-control house_no" value="{{ $v['house_number'] }}">
                            </span>
                        </div>
                        <p class="form-row form-group ">
                            <label for="billing_title">Street:
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="street" id="street1" class="input-text form-control steet_no @error('street') is-invalid @enderror" value="{{$v['street']}}">
                            </span>

                        </p>
                        <div class="form-row col-md-12 form-group">
                            <label for="locality">Locality:
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="locality" id="locality1" class="input-text form-control locality @error('locality') is-invalid @enderror" value="{{$v['locality']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="town">Town:
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="town" id="town1" class="input-text form-control town @error('town') is-invalid @enderror" value="{{$v['town']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">County:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="county" id="county1" class="input-text form-control county @error('county') is-invalid @enderror" value="{{$v['county']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">Post Code:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="post_code" class="input-text form-control zip @error('post_code') is-invalid @enderror" value="{{$v['post_code']}}">
                            </span>
                        </div>
                        <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                            <label for="billing_country">Country:</label>
                            <span class="input-wrapper">
                                <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                    <option value="">Select a country / region…</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="PW">Belau</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo (Brazzaville)</option>
                                    <option value="CD">Congo (Kinshasa)</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="SZ">Eswatini</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="England" selected>England</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="MK">North Macedonia</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PS">Palestinian Territory</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="SX">Saint Martin (Dutch part)</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                    <option value="US">United States (US)</option>
                                    <option value="UM">United States (US) Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="VI">Virgin Islands (US)</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </span>

                        </div>
                        <input type="hidden" class="address_type" name="address_type" value="billing_address">
                    @endforeach
                    <div class="modal-footer">
                        <button type="button" id="billing_submit" class="btn btn-primary primaryAddrSubmit" data-dismiss="modal">Submit Changes</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<!----- END ----->
<div class="modal" id="primaryAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation required</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div>
                    Are you sure you wish to edit this address?
                    Do not use this option if you wish to use a different address.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirmShow" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
              </div>
        </div>
    </div>
</div>

<div class="modal" id="primaryAddressConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form class="primaryAddrUpdateForm formInput" id="inputs">
                    <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                    @foreach($primary_address as $key => $v)


                        <div class="form-row form-group ">
                            <label>Name / Number:&nbsp;
                                </span>
                            </label>
                            <span class="input-wrapper">
                                <input type="text" id="house_no1" name="house_no" class="input-text form-control house_no" value="{{$v['house_number']}}">
                            </span>
                        </div>
                        <p class="form-row form-group ">
                            <label for="billing_title">Street:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="street" id="street1" class="input-text form-control steet_no" value="{{$v['street']}}">
                            </span>

                        </p>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">Locality:
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="locality" id="locality1" class="input-text form-control locality" value="{{$v['locality']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">Town:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="town" id="town1" class="input-text form-control town" value="{{$v['town']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">County:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="county" id="county1" class="input-text form-control county" value="{{$v['county']}}">
                            </span>

                        </div>
                        <div class="form-row col-md-12 form-group">
                            <label for="billing_first_name">Post Code:&nbsp;
                            </label>
                            <span class="input-wrapper">
                                <input type="text" name="post_code" class="input-text form-control zip" value="{{$v['post_code']}}">
                            </span>
                        </div>
                        <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                            <label for="billing_country">Country&nbsp;</label>
                            <span class="input-wrapper">
                                <select name="billing_country" id="billing_country" name="billing_country" class="contry country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                    <option value="">Select a country / region…</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="PW">Belau</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo (Brazzaville)</option>
                                    <option value="CD">Congo (Kinshasa)</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="SZ">Eswatini</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="England" selected>England</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="MK">North Macedonia</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PS">Palestinian Territory</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="SX">Saint Martin (Dutch part)</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                    <option value="US">United States (US)</option>
                                    <option value="UM">United States (US) Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="VI">Virgin Islands (US)</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </span>

                        </div>
                    @endforeach
                    <input type="hidden" class="address_type" name="address_type" value="primary_address">
                    <div class="modal-footer">
                        <button type="button" id="primary_submit" class="btn btn-primary billingAddrSubmit" data-dismiss="modal">Submit Changes</button>
                      </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal" id="addNewAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose Address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="row p-3" style="padding-top: 0 !important;">
                    <div class="form-row form-group">
                        <label>Post Code:</label>
                        <div class="input-wrapper with-rg-btn">
                            <input type="text" class="form-control" name="post_code" id="post_code">
                            <button type="button" class="btn btn-primary" id="findAddress">Find
                                Address</button>
                            <p class="adderr text-danger"></p>
                        </div>
                    </div>
                <form class="billingAddrUpdateForm formInputModal" >
                    <div class="form-row form-group ">
                        <label>House Name / Number: &nbsp;<span class="optional">
                            </span>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" id="house_no" name="house_no" class="input-text form-control house_no" value={{old('house_no')}}>
                        </span>
                    </div>
                    <p class="form-row form-group ">
                        <label for="billing_title">Street:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="street" id="street" class="input-text form-control steet_no @error('street') is-invalid @enderror" value={{old('street')}}>
                        </span>
                        @error('street')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </p>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Locality:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="locality" id="locality" class="input-text form-control locality @error('locality') is-invalid @enderror" value={{old('locality')}}>
                        </span>
                        @error('locality')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Town:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="town" id="town" class="input-text form-control town @error('town') is-invalid @enderror" value={{old('town')}}>
                        </span>
                        @error('town')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">County:&nbsp;
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="county" id="county" class="input-text form-control county @error('county') is-invalid @enderror" value="{{ old('county')}}">
                        </span>
                        @error('country')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Post Code:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="post_code" id="zip" class="input-text form-control zip @error('post_code') is-invalid @enderror" value={{old('post_code')}}>
                        </span>
                        @error('post_code')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                        <label for="billing_country">Country&nbsp;<abbr class="required" title="required">*</abbr></label>
                        <span class="input-wrapper">
                            <select name="billing_country" id="billing_country" name="billing_country" class="contry  @error('billing_country') is-invalid @enderror country_to_state country_select form-control" data-label="Country" autocomplete="country" data-placeholder="Select a country / region…">
                                <option value="">Select a country / region…</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="PW">Belau</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo (Brazzaville)</option>
                                <option value="CD">Congo (Kinshasa)</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="SZ">Eswatini</option>
                                <option value="ET">Ethiopia</option>
                                <option value="England" selected>England</option>
                                <option value="FK">Falkland Islands</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Laos</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="KP">North Korea</option>
                                <option value="MK">North Macedonia</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PS">Palestinian Territory</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Reunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="ST">São Tomé and Príncipe</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="SX">Saint Martin (Dutch part)</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia/Sandwich Islands</option>
                                <option value="KR">South Korea</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syria</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                <option value="US">United States (US)</option>
                                <option value="UM">United States (US) Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="VG">Virgin Islands (British)</option>
                                <option value="VI">Virgin Islands (US)</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </span>
                        @error('billing_country')
                            <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="address_type" name="address_type" value="primary_address">
                    <input type="hidden" name="user_id" value="{{ $user->id }}" class="user_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveAddr">Submit</button>
                      </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!--For Find Postal Code Address Api Modal Popup-->
<div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                <button type="button" class="btn-close btn-address"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="post_address_blk">
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#editPrimaryAddress').click(function(){
            $('#primaryAddressModal').modal('show');
        });

        $('.confirmShow').click(function(){
            $('#primaryAddressConfirmModal').modal('show');
        });
        $('.primaryAddrSubmit').click(function(){

            var formdata = $(".primaryAddrUpdateForm").serialize();

            $.ajax({
                url: "{!! route('primary-address-save') !!}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    formdata: formdata
                },
                success: function(result) {
                   $("#primaryAddressConfirmModal").modal('hide');
                   $(window).load();

                }
            });
        });

        $("#primary_submit,#billing_submit").click(function() {

            $(".loader").show();
            // Validation
            $(".formInput").each(function() {
                var number   = $(this).find(".house_no").val();
                var steet    = $(this).find(".steet_no").val();
                var locality = $(this).find(".locality").val();
                var town     = $(this).find(".town").val();
                var county   = $(this).find(".county").val();
                if(county==undefined){
                    county = "";
                }
                var postcode = $(this).find(".zip").val();
                var contry   = $(this).find(".contry").val();
                var address_type = $(this).find(".address_type").val();
                var user_id   = $(this).find(".user_id").val();


                if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
                    //alert(number+"---"+address_type);
                    $.ajax({
                        url: "{!! route('primary-address-save') !!}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number,
                            steet:steet,
                            locality:locality,
                            town:town,
                            county:county,
                            postcode:postcode,
                            contry:contry,
                            address_type:address_type,
                            user_id:user_id
                        },
                        success: function(result) {
                        $("#primaryAddressConfirmModal").modal('hide');
                        setTimeout(function () {
                            $(".loader").hide();
                            location.reload(true);
                        }, 2500);
                        }
                    });
                }

            });
        });

        $("#saveAddr").click(function() {
            $(".loader").show();
            // Validation
            $(".formInputModal").each(function() {
                var number   = $(this).find(".house_no").val();
                var steet    = $(this).find(".steet_no").val();
                var locality = $(this).find(".locality").val();
                var town     = $(this).find(".town").val();
                var county   = $(this).find(".county").val();
                if(county==undefined){
                    county ="";
                }

                var postcode = $(this).find(".zip").val();
                var contry   = $(this).find(".contry").val();
                var address_type = $(this).find(".address_type").val();
                var user_id   = $(this).find(".user_id").val();
                //alert(number+steet+locality+town+postcode+contry+address_type+user_id);
                if(number!=undefined && steet!=undefined && locality!=undefined && town!=undefined  && postcode !=undefined && contry !=undefined && address_type!=undefined && user_id !=undefined){
                    //alert(number+"---"+address_type);
                    $.ajax({
                        url: "{!! route('primary-address-save') !!}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number,
                            steet:steet,
                            locality:locality,
                            town:town,
                            county:county,
                            postcode:postcode,
                            contry:contry,
                            address_type:address_type,
                            user_id:user_id
                        },
                        success: function(result) {
                        $("#addNewAddressModal").modal('hide');
                        setTimeout(function () {
                            $(".loader").hide();
                            location.reload(true);
                        }, 2500);
                        }
                    });
                }

            });
        });

        $("#choosePrimaryAddress").click(function(){
            $('#choosePrimaryAddressModal').modal('show');
        });

        $("#openModalButton").click(function(){
            $('#chooseBillingAddressModal').modal('show');
        });
        $("#openBIllingModalButton").click(function(){
            $('#BIllingAddressModal').modal('show');
        });

        $(".addNewAddress").click(function(){
            $('.address_type').val('primary_address');
            $('#addNewAddressModal').modal('show');
        });
        $(".addbillAddress").click(function(){
            $('.address_type').val('billing_address');
            $('#addNewAddressModal').modal('show');
        });
        $(".editBillingAddress").click(function(){
            $('#editbillingAddressModal').modal('show');
        });

        $('.confirmShowbill').click(function(){
            $('#billingAddressConfirmModal').modal('show');
        });

        $('#findAddress').click(function(){
            var post_code = $("#post_code").val();
            if(post_code==""){
                $('.adderr').html('Please enter zipcode');
                return false ;
            }else{
                $('#zip').val(post_code);
                $('.adderr').html('');
            }
            $('#findAddress').html('Please Wait...');
            $.ajax({
                url: "{!! route('find-address') !!}",
                type: 'GET',
                data: {
                    post_code: post_code
                },
                success: function(result) {

                    $("#exampleModalCenterAddress").show();
                    $("#post_address_blk").html(result);
                    $('#findAddress').html('Find Address');
                }
            });
        });



    });



    function selectPostalAddrApp(val){
        var value = val.split(',');
        $("#house_no").val(value[0]);
        $("#street").val(value[1]);
        $("#locality").val(value[2]);
        $("#town").val(value[3]);
        $("#exampleModalCenterAddress").hide();
    }

</script>
@endsection
