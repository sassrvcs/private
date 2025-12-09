<form method="POST" action="{{ route('stripe.checkout.all') }}">
@csrf

<h3>Select Package</h3>
@foreach($packages as $p)
  <label>
    <input 
        type="radio" 
        name="package_price_id"
        class="package"
        value="{{ $p->stripe_price_id }}"
        data-price="{{ $p->package_price }}"
        required
    >
    {{ $p->package_name }} — {{ $p->package_price }} {{ $p->currency ?? 'USD' }}
  </label><br>
@endforeach

<hr>

<h3>Add-ons</h3>
@foreach($addons as $a)
  <label>
    <input 
        type="checkbox"
        name="addons[]"
        class="addon"
        value="{{ $a->stripe_price_id }}"
        data-price="{{ $a->price }}"
        data-billing="{{ $a->billing_type }}"
    >
    {{ $a->service_name }} ({{ $a->billing_type }}) — {{ $a->price }} {{ $a->currency ?? 'USD' }}
  </label><br>
@endforeach

<hr>

<h2>
    ✅ Total Amount: <span id="currency">USD</span> $<span id="total">0</span>
</h2>

<input type="hidden" name="total_amount" id="total_input" value="0">

<br>
<button type="submit">Pay Now</button>

</form>
<script>
let total = 0;

// ✅ PACKAGE SELECTION (RADIO)
document.querySelectorAll('.package').forEach(function (radio) {
    radio.addEventListener('change', function () {
        let packagePrice = parseFloat(this.dataset.price);

        // Reset total first, then re-add addons
        total = packagePrice;

        document.querySelectorAll('.addon:checked').forEach(function (addon) {
            total += parseFloat(addon.dataset.price);
        });

        updateTotal();
    });
});

// ✅ ADD-ON SELECTION (CHECKBOX)
document.querySelectorAll('.addon').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {

        let packageSelected = document.querySelector('.package:checked');
        let basePrice = packageSelected ? parseFloat(packageSelected.dataset.price) : 0;

        total = basePrice;

        document.querySelectorAll('.addon:checked').forEach(function (addon) {
            total += parseFloat(addon.dataset.price);
        });

        updateTotal();
    });
});

// ✅ UPDATE TOTAL UI
function updateTotal() {
    document.getElementById('total').innerText = total.toFixed(2);
    document.getElementById('total_input').value = total.toFixed(2);
}
</script>
