<h3 id="steps-uid-0-h-2" tabindex="-1" class="title">3.Confirmation</h3>
<section id="steps-uid-0-p-2" role="tabpanel" aria-labelledby="steps-uid-0-h-2" class="body" aria-hidden="true"
    style="display: none;">
    <input type="text" hidden name="slug" value="{{$slug}}" id="slug_name">
    <div class="page-title">
        <h1>Order Confirmation</h1>
    </div>
    <hr>
    <p>Please check and confirm your order below by accepting the terms and conditions before
        proceeding to payment.</p>
    <div id="order_blk">
        <table class="table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Details</th>
                    <th class="numeric">Price</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody id="order_blk_details">

            </tbody>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="bc-f0f0f0 br-top-left">&nbsp;</td>
                <td class="bc-f0f0f0">Price excl. VAT</td>
                <td id="totals" class="numeric bc-f0f0f0"></td>
                <td class="bc-f0f0f0 br-top-right">&nbsp;</td>
            </tr>
            <tr>
                <td class="bc-f0f0f0">&nbsp;</td>
                <td class="bc-f0f0f0">VAT @ 20%</td>
                <td id="vat_totals" class="numeric bc-f0f0f0"></td>
                <td class="bc-f0f0f0">&nbsp;</td>
            </tr>
            <tr>
                <td class="bc-f0f0f0">&nbsp;</td>
                <td class="bc-f0f0f0">Total for this Transaction</td>
                <td id="grand_totals" class="numeric bc-f0f0f0"></td>
                <td class="bc-f0f0f0">&nbsp;</td>
            </tr>
        </table>
    </div>
    {{-- <div class="p-3 mb-3 mt-3">
                                    <p>Please create your account or login before proceed.</p>
                                    <ul class="login-ul d-flex">
                                        <li class="me-3">
                                            <input type="radio" class="btn-check" name="user-type" id="option1"
                                                value="register">
                                            <label class="btn btn-primary" for="option1">New Customers</label>
                                        </li>
                                        <li>
                                            <input type="radio" class="btn-check" name="user-type" id="option2"
                                                value="login">
                                            <label class="btn btn-primary" for="option2">Returning Customer</label>
                                        </li>
                                    </ul>
                                    <div class="row register-box mt-3" style="display:none;">
                                        <div class="col-md-12 mb-2">
                                            <label for="user-pass1" class="form-label">Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="user-pass1"
                                                name="user-pass" value="" disabled="disabled">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="userconpass" class="form-label">Confirm Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="userconpass"
                                                name="user-conpass" value="" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="row login-box mt-3" style="display:none;">
                                        <div class="col-md-12 mb-2">
                                            <label for="user-email" class="form-label">Email<span
                                                    class="starred">*</span></label>
                                            <input type="email" class="form-control w-50" id="user-email"
                                                name="user-email" value="" disabled="disabled">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="user-pass2" class="form-label">Password<span
                                                    class="starred">*</span></label>
                                            <input type="password" class="form-control w-50" id="user-pass2"
                                                name="user-pass" value="" disabled="disabled">
                                        </div>
                                    </div>
                                </div> --}}
    <div class="col-md-8 p-3 d-block mb-3" style="margin-top:15px;">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Yes" id="accept_terms" name="accept_terms"
                required="">
            <label class="form-check-label" for="accept_terms">
                I have read and accept the <a href="{{ route('page', ['slug' => 'terms-conditions'] ) }}" class="link-primary"
                    target="_blank">Terms and Conditions</a> &amp; <a
                    href="{{ route('page', ['slug' => 'refund-cancellation'] ) }}" class="link-primary"
                    target="_blank">Privacy Policy</a>.
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Yes" id="provide_id" name="provide_id"
                required="">
            <label class="form-check-label" for="provide_id">
                I agree to provide the <a href="https://formationshunt.co.uk/id-requirements/" class="link-primary"
                    target="_blank">Required ID</a>.
            </label>
        </div>
        <div class="form-check">
            <span class="error d-none terms_error">Please accept the terms and
                conditions</span>
        </div>
    </div>
    <div class="actions clearfix d-flex justify-content-end">
        <ul role="menu" aria-label="Pagination" class="d-flex">
            <li aria-hidden="false" aria-disabled="false"><button type="button" role="menuitem" id="previous_step_2"
                    class="btn btn-primary mr-2">Previous</button></li>
            <li aria-hidden="false" aria-disabled="false"><button type="submmit" role="menuitem" id="Pay_now"
                    class="btn btn-primary">Pay</button></li>
        </ul>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#serviceForm").submit(function(e) {
            let check_terms = $("#accept_terms").is(":checked")
            if (($("#accept_terms").is(":checked") == true) && ($("#provide_id").is(":checked") ==
                    true)) {
                $(".terms_error").addClass('d-none')
                e.submit()
            } else {
                e.preventDefault()
                $(".terms_error").removeClass('d-none')

            }
        })
    })
</script>
