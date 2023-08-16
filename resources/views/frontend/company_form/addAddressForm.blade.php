<div class="sectiongap customer-signup-s1 addAddressForm">
    <div class="container">
        <div class="sec-common-title-s2">
            <h1>Add New Address
            </h1>

        </div>
        <form class="form-register register" target="_blank">
            @csrf
            <input type="hidden" id="where" value="{{ isset($where) ? $where : '' }}" readonly>

            <fieldset class="border p-3">
                <div class="row p-3" style="padding-top: 0 !important;">

                    <div class="form-row form-group">
                        <label>Post Code: </label>
                        <div class="input-wrapper with-rg-btn">
                            <input type="text" class="form-control" id="post_code_for_search">
                            <button type="button" class="btn btn-primary" id="findAddress">Find
                                Address</button>
                        </div>

                    </div>

                    <div class="form-row form-group ">
                        <label>House Name / Number: &nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" id="house_noNew" name="house_noNew"
                                class="input-text form-control blankCheckForNewEntry">
                            <div class="error d-none" style="color:red;">House number is required.</div>
                        </span>

                    </div>
                    <div class="form-row form-group ">
                        <label for="billing_title">Street:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="streetNew" id="streetNew"
                                class="input-text form-control blankCheckForNewEntry">
                            <div class="error d-none" style="color:red;">Street is required.</div>
                        </span>

                    </div>

                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Locality:
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="localityNew" id="localityNew" class="input-text form-control">

                        </span>

                    </div>

                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Town:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="townNew" id="townNew"
                                class="input-text form-control blankCheckForNewEntry">
                            <div class="error d-none" style="color:red;">Town is required.</div>
                        </span>

                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">County:&nbsp;
                        </label>
                        <span class="input-wrapper">
                            <input type="text" name="countyNew" id="countyNew" class="input-text form-control">
                        </span>

                    </div>
                    <div class="form-row col-md-12 form-group">
                        <label for="billing_first_name">Post Code:&nbsp;<abbr class="required" title="required">*</abbr>
                        </label>

                        <span class="input-wrapper">
                            <input type="text" name="post_codeNew" id="zip_code"
                                class="input-text form-control blankCheckForNewEntry">
                            <div class="error d-none" style="color:red;">Post Code is required.</div>
                        </span>

                    </div>
                    <div class="form-row update_totals_on_change col-md-12 col-12 form-group">
                        <label for="billing_country">Country&nbsp;<abbr class="required"
                                title="required">*</abbr></label>
                        <span class="input-wrapper">

                            <select id="billing_countryNew" name="billing_countryNew"
                                class="country_to_state country_select form-control" data-label="Country"
                                autocomplete="country" data-placeholder="Select a country / region…">
                                <option value="">Select a country / region…</option>
                                <option value="72" selected>England</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country['id'] }}">
                                        {{ $country['name'] }}</option>
                                @endforeach
                            </select>
                            @error('billing_countryNew')
                                <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>


                </div>
            </fieldset>
            <div class="mb-3">
                <button type="button" onClick="AddMoreAddSave(this)" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

{{-- <div class="step-btn-wrap mt-4">
    <button class="btn prev-btn" onclick="theCancelButtonFunction()">Cancel</button>
</div> --}}
