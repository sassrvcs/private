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
                        <div class="companies-topbar flex-column justify-content-start mb-4 align-items-start">
                            <h3 class="mb-2">FORMATIONSHUNT LTD</h3>
                        </div>
                        @if($cartCount > 0)
                        <div class="MyAccount-content col-md-6">
                            <span>You have {{ $cartCount }} items in your cart.
                                <a href="{{ route('cart-company', ['order' => $order_id]) }}" class="btn btn-primary col-md-3">View Cart</a>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="customer-signup-s1">
                            <form method="POST" action="#" class="form-register register">
                                @csrf
                                <fieldset class="border px-3 py-4">
                                    <legend class="float-none w-auto p-2">Would you like to file this appointment at Companies House ?</legend>
                                    <p class="mb-3">Would you also like this Company Statement to be filed at Companies House?</p>                                    
                                    <div class="px-1 d-inline-block">
                                        <input class="mr-1" id="house_radio1" name="houseChange" type="radio" value="yes">
                                        <label for="house_radio1">Yes</label>
                                    </div>
                                    <div class="px-1 d-inline-block">
                                        <input class="mr-1" id="house_radio2" name="houseChange" type="radio" value="no">
                                        <label for="house_radio2">No</label>
                                    </div>
                                </fieldset>

                                <fieldset class="border px-3 py-4">
                                    <legend class="float-none w-auto p-2">Company Statement Notification</legend>

                                    <p>Why do you want to notify Companies House of a PSC statement?</p>
                                    
                                    <div class=" px-0 col-md-12 col-12">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="ef_no_psc" name="statementNotify" value="ef_no_psc" type="radio">
                                            <label for="ef_no_psc"> The company does not have a PSC.</label>
                                        </div>
                                    </div>
                                    <div class=" px-0 col-md-12 col-12">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="ef_possible_psc" name="statementNotify" type="radio" value="ef_possible_psc">
                                            <label for="ef_possible_psc">The company believes it has a PSC but doesn't yet have the details.</label>

                                                <div class="pl-4 mt-3 psc-no-details d-none">
                                                    <p>Why does the company believe that it has a PSC but doesn't yet have the details?</p>

                                                    <div class="px-0 form-check">
                                                        <input class="mr-2" id="ef_none_psc" name="psc_statement" type="radio" value="ef_none_psc">
                                                        <label for="ef_none_psc">The company believes it has a PSC but has not identified them.</label>
                                                    </div>
                                                    <div class="px-0 form-check">
                                                        <input class="mr-2" id="ef_identified_psc" name="psc_statement" type="radio" value="ef_identified_psc">
                                                        <label for="ef_identified_psc"> The company has identified a PSC but the details have not yet been confirmed.</label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class=" px-0 col-md-12 col-12">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="ef_unknown_psc" name="statementNotify" type="radio" value="ef_unknown_psc">
                                            <label for="ef_unknown_psc">The company does not yet know if it has a PSC.</label>
                                        </div>
                                    </div>
                                    <div class=" px-0 col-md-12 col-12">
                                        <div class="px-0 form-check">
                                            <input class="mr-2" id="ef_notice_psc" name="statementNotify" type="radio" value="ef_notice_psc">
                                            <label for="ef_notice_psc">The company has issued a notice.</label>
                                            
                                                <div class="pl-4 mt-3 company-issued-notice d-none">
                                                    <p>You will need to submit for each PSC.</p>

                                                    <div class="px-0 form-check">
                                                        <input class="mr-2" id="ef_confirm_psc" name="psc_linked" type="radio" value="ef_confirm_psc">
                                                        <label for="ef_confirm_psc">The company has given notice to confirm PSC details.</label>
                                                    </div>
                                                    <div class="px-0 form-check">
                                                        <input class="mr-2" id="ef_restriction_psc" name="psc_linked" type="radio" value="ef_restriction_psc">
                                                        <label for="ef_restriction_psc">The company has issued a restriction notice.</label>
                                                    </div>
                                                    <div class="px-0 form-check">
                                                        <input class="mr-2" id="ef_failed_psc" name="psc_linked" type="radio" value="ef_failed_psc">
                                                        <label for="ef_failed_psc">The PSC has failed to provide an update of their changed details.</label>

                                                            <div class="pl-4 mt-3 failed-update-psc d-none">
                                                                <i class="d-block mb-2">The addressee has failed to comply with a notice given by the company under section 790E of the Act.</i>

                                                                <table width="100%" colspadding="0" class="addressTable">
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>DOB</th>
                                                                    </tr>
                                                                    @foreach ($appointmentsList as $val)

                                                                    <tr>
                                                                        <!-- <td>
                                                                            <span class="d-inline-block ml-2">	Amrutaben Patel</span>
                                                                        </td> -->
                                                                        <td>
                                                                            <input type="radio" class="appointment-id" name="appointment_id"  id="{{$val['id']}}" value="{{$val['id']}}">
                                                                            <span class="d-inline-block ml-2">
                                                                                @php

                                                                                    $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id'] : '');
                                                                                
                                                                                    $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                                    

                                                                                    if ($officerDetails['first_name'] != '' && $officerDetails['last_name'] != '') {

                                                                                        echo $fullName;

                                                                                    } else {

                                                                                        echo $officerDetails['legal_name'];

                                                                                    }

                                                                                @endphp
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <p>{{ $officerDetails['dob_day'] }}</p>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border p-3">
                                    <legend class="float-none w-auto p-2">Notification Date</legend>
                                    <div class="form-row form-group">
                                        <label for="">Effective From:</label>
                                        <span class="input-wrapper">
                                            <input type="date" name="notificationDate" id="notificationDate" class="form-control">
                                        </span>
                                    </div>
                                </fieldset>


                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-primary update-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#notificationDate").keydown(function (event) { event.preventDefault(); });
        
        $('#notificationDate').val(getTodayDate());

        $('input[name="statementNotify"]').change(function() {

            if ($('#ef_possible_psc').is(':checked')) {

                $('.psc-no-details').removeClass('d-none');
                $('.company-issued-notice').addClass('d-none');
                $('#ef_none_psc').prop('checked', true);
                $('#ef_confirm_psc').prop('checked', false);
                $('.failed-update-psc').addClass('d-none');
                $('.appointment-id:first').prop('checked', false);


            } else if ($('#ef_notice_psc').is(':checked')) {

                $('.company-issued-notice').removeClass('d-none');
                $('.psc-no-details').addClass('d-none');
                $('#ef_none_psc').prop('checked', false);
                $('#ef_confirm_psc').prop('checked', true);
                $('.failed-update-psc').addClass('d-none');
                $('.appointment-id:first').prop('checked', false);

                $('input[name="psc_linked"]').change(function() {

                    if ($('#ef_failed_psc').is(':checked')) { 

                        $('.failed-update-psc').removeClass('d-none');
                        $('.appointment-id:first').prop('checked', true);

                    } else {
                        $('.failed-update-psc').addClass('d-none');
                        $('.appointment-id:first').prop('checked', false);
                    }

                 });
            }
            else {

                $('.psc-no-details').addClass('d-none');
                $('.company-issued-notice').addClass('d-none');
                $('#ef_none_psc').prop('checked', false);
                $('#ef_confirm_psc').prop('checked', false);
                $('.failed-update-psc').addClass('d-none');
                $('.appointment-id:first').prop('checked', false);

            }

        });
    });

    function getTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0');
        const day = today.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>
@endsection
