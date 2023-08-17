<div class="choose-own-address">
    <h3>Search Addresses</h3>
    <div class="src-are">
        <input type="text" placeholder="Address Search...."
            onkeyup="searchBarAdd()" id="searchBarAdd_id"
            class="form-control">
        @if (!empty($used_address))
            @foreach ($used_address as $key => $value)
                <input type="text"
                    class="form-control d-none addressSelect"
                    data-search="{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }},{{ $value->billing_country }}"
                    data-id="{{ $value->id }}"
                    value="{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }}"
                    onclick="selectedAdd(this,'{{ $value->id }}')"
                    readonly>
            @endforeach
        @endif
    </div>
</div>

<div class="recently-used-addresses">
    <h4>Recently used Addresses</h4>
    <div class="row">
        @if (!empty($used_address))
            @foreach ($used_address as $key => $value)
                <div class="col-md-6 col-sm-12">
                    <div class="used-addresses-panel">
                        <div class="text">
                            <p>{{ $value->house_number }},{{ $value->street }},{{ $value->locality }},{{ $value->town }},{{ $value->county }},{{ $value->post_code }},{{ $value->billing_country }}
                            </p>
                        </div>
                        <div class="btn-wrap">
                            <button type="submit" class="btn"
                                onclick="editAddress('{{ $value->id }}')">Edit</button>
                            <input type="hidden"
                                class="{{ $value->id }}_add_id"
                                value="{{ $value->id }}">
                            <input type="hidden"
                                class="{{ $value->id }}_add_house_number"
                                value="{{ $value->house_number }}">
                            <input type="hidden"
                                class="{{ $value->id }}_add_street"
                                value="{{ $value->street }}">
                            <input type="hidden"
                                class="{{ $value->id }}_add_locality"
                                value="{{ $value->locality }}">
                            <input type="hidden"
                                class="{{ $value->id }}_add_town"
                                value="{{ $value->town }}">
                            <input type="hidden"
                                class="{{ $value->id }}_user_county"
                                value="{{ $value->county }}">
                            <input type="hidden"
                                class="{{ $value->id }}_address_post_code"
                                value="{{ $value->post_code }}">
                            <input type="hidden"
                                class="{{ $value->id }}_address_billing_country"
                                value="{{ $value->billing_country }}">

                            <button type="button"
                                class="btn select-btn selc-addr"
                                onclick="selectedAdd(this,'{{ $value->id }}','listing')">Select</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="new-address-block">
    <h3>Or enter a new Address</h3>
    <div class="new-address-field">
        <button type="submit" class="btn" onclick="addAddress()">Add
            New
            Address</button>
    </div>
</div>