<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0"
                                class="body current" aria-hidden="false">
    <div class="page-title">
        <h1>{{ $service_name }} <span class="total_priceAmnt" style="font-size:24px;">Price: £<small>+VAT</small></span></h1>
    </div>
    <hr>
                        <div class="pageContent mb-3">
                            <p><strong>Fields marked with an asterisk (<span class="starred">*</span>) are required.</strong></p>
                        </div>
                        <div class="col-md-8 p-3 d-block mb-3 position-relative shadow">
                            <div class="mb-3 row">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name<span class="starred">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control required_app" name="first_name" id="first_name" value="" required="" fdprocessedid="47m75j">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_name" class="col-sm-3 col-form-label">Last Name<span class="starred">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control required_app" name="last_name" id="last_name" value="" required="" fdprocessedid="mks2e3s">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone_no" class="col-sm-3 col-form-label">Telephone Number<span class="starred">*</span></label>
                                <div class="col-sm-2">
                                    @php
                                    $codes = \App\Models\Phone_code::orderBy('phonecode','asc')->get()->pluck('phonecode')->toArray();
                                    $codes = array_unique($codes)
                                @endphp
                                <select name="country_code" id="country_code" class="form-control">
                                    @foreach ($codes as $code)
                                    @if ($code!=0)
                                    <option value="{{ $code }}" @if ($code==44)selected @endif >+{{ $code }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="tel" class="form-control required_app" name="phone_no" id="phone_no" onkeyup="phone_no_validation(this)" value="" required="" maxlength="11" fdprocessedid="mnwg0u">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="stat_email" class="col-sm-3 col-form-label">Email Address<span class="starred">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control required_app" name="stat_email" id="stat_email" value="" required="" fdprocessedid="1vdw6g">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="company_name" class="col-sm-3 col-form-label">Your Company Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="company_name" id="company_name" value="" fdprocessedid="i0kl3o">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="company_number" class="col-sm-3 col-form-label">Your Company Number</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="company_number" id="company_number" value="" fdprocessedid="lqr24b">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="details" class="col-sm-3 col-form-label">Details</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="details" id="details" rows="5" cols="40"></textarea>
                                </div>
                            </div>
                        </div>
    <hr>
    <div class="total_priceAmnt d-flex justify-content-end align-items-center float-none"
        style="font-size:24px;margin-bottom:15px;">Online Application
    </div>

    <input type="hidden" name="allPriceAmnt" id="allPriceAmnt" value="">
    <input type="hidden" name="totalVatAmount" id="totalVatAmount" value="">
    <input type="hidden" name="totalGrandAmount" id="totalGrandAmount" value="">


    <div class="actions clearfix d-flex justify-content-end">
        <ul role="menu" aria-label="Pagination">
            <li aria-hidden="false" aria-disabled="false"><button role="menuitem" type="button"
                    id="next_step_1" class="btn btn-primary">Next</button>
            </li>
        </ul>
    </div>
</section>
