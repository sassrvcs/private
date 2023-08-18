<h5 class="edit-add-ttl">Edit Address</h5>

<form class="form-register">
    <fieldset class="border p-3">
        <input type="hidden" id="add_id" class="add_id" name="add_id"
            value="{{ !empty($address) && $address['id'] !== '' ? $address['id'] : '' }}">

        <div class="form-row form-group ">
            <label>Name / Number *:&nbsp;
                </span>
            </label>
            <span class="input-wrapper">
                <input type="text" id="house_no1" name="house_no"
                    value="{{ !empty($address) && $address['house_number'] !== '' ? $address['house_number'] : '' }}"
                    class="input-text form-control house_no blankCheckAdd">
                <div class="error d-none" style="color:red;">House
                    number is required.</div>
            </span>
        </div>
        <div class="form-row form-group ">
            <label for="billing_title">Street *:&nbsp;
            </label>
            <span class="input-wrapper">
                <input type="text"
                    value="{{ !empty($address) && $address['street'] !== '' ? $address['street'] : '' }}" name="street"
                    id="street1" class="input-text form-control steet_no blankCheckAdd">
                <div class="error d-none" style="color:red;">Street is
                    required.</div>
            </span>

        </div>
        <div class="form-row form-group">
            <label for="locality">Locality:
            </label>
            <span class="input-wrapper">
                <input type="text"
                    value="{{ !empty($address) && $address['locality'] !== '' ? $address['locality'] : '' }}"
                    name="street" name="locality" id="locality1" class="input-text form-control locality">
            </span>

        </div>
        <div class="form-row form-group">
            <label for="town">Town *:&nbsp;
            </label>
            <span class="input-wrapper">
                <input type="text" name="town"
                    value="{{ !empty($address) && $address['town'] !== '' ? $address['town'] : '' }}" id="town1"
                    class="input-text form-control town blankCheckAdd">
                <div class="error d-none" style="color:red;">Town is
                    required.</div>
            </span>

        </div>
        <div class="form-row form-group">
            <label for="county">County:&nbsp;
            </label>
            <span class="input-wrapper">
                <input type="text" name="county"
                    value="{{ !empty($address) && $address['county'] !== '' ? $address['county'] : '' }}" id="county1"
                    class="input-text form-control county">
            </span>

        </div>
        <div class="form-row form-group">
            <label for="postcode">Post Code *:&nbsp;
            </label>
            <span class="input-wrapper">
                <input type="text" id="post_code"
                    value="{{ !empty($address) && $address['post_code'] !== '' ? $address['post_code'] : '' }}"
                    name="post_code" class="input-text form-control zip blankCheckAdd">
                <div class="error d-none" style="color:red;">Post Code
                    is required.</div>
            </span>
        </div>
        <div class="form-row update_totals_on_change form-group">
            <label for="billing_country">Country&nbsp;</label>
            <span class="input-wrapper">
                <select name="billing_country" id="billing_country" name="billing_country"
                    class="contry country_to_state country_select form-control" data-label="Country"
                    autocomplete="country" data-placeholder="Select a country / region…">
                    <option value="">Select a country / region…
                    </option>
                    @foreach ($countries as $country)
                        <option value="{{ $country['id'] }}"
                            {{ !empty($address) && $country['id'] == $address['billing_country'] ? 'selected' : '' }}>
                            {{ $country['name'] }}</option>
                    @endforeach

                </select>
            </span>

        </div>

        <div class="step-btn-wrap mt-4">
            <button type="button" class="btn saveAddress">Save &
                Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
        </div>
    </fieldset>
</form>

<script>
    $('.saveAddress').click(function() {
        var id = $('#add_id').val();
        var number = $('#house_no1').val();
        var steet = $('#street1').val();
        var locality = $('#locality1').val();
        var town = $('#town1').val();
        var county = $('#county1').val();
        var postcode = $('#post_code').val();
        var contry = $('#billing_country').val();

        if (county == undefined) {
            county = "";
        }

        const currentTab = $('#currentTab').val()

        const requiredFields = document.querySelectorAll('.blankCheckAdd');
        const requiredFieldsArr = [...requiredFields];

        console.log(requiredFieldsArr);
        let validation = 0;
        requiredFieldsArr.forEach(el => {
            if (el.value === '') {
                el.classList.add('validation');
                el.nextElementSibling.classList.remove('d-none');
                return validation++;
            } else {
                el.classList.remove('validation');
                el.nextElementSibling.classList.add('d-none');
            }
        });

        console.log(validation);
        if (validation === 0) {
            console.log('gg');
            $.ajax({
                url: "{!! route('selected-address-save') !!}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id,
                    number,
                    steet,
                    locality,
                    town,
                    county,
                    postcode,
                    contry,
                },
                success: function(result) {
                    $("#actionType").val('select')
                    if (currentTab === 'details') {
                        $('#editFormAjaxLoadResidentialSection').html('')

                        $('#detailsTabAddList_id').removeClass('d-none');
                        $('.edit_from_residential').addClass('d-none');

                    }
                    if (currentTab === 'addressing') {
                        $('#editFormAjaxLoadAddressSection').html('')

                        $('#detailsTabAddList_id').removeClass('d-none');
                        // $('.hideEdit').removeClass('d-none');

                        $('.edit_from').addClass('d-none');

                    }
                    addListing();
                }
            });
        }
    })
</script>
