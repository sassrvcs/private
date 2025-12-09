<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="https://js.stripe.com/v4/"></script>
</head>
<body>

<h2>Select Package</h2>
@foreach($packages as $p)
<label>
<input type="radio" name="package" value="{{ $p->stripe_price_id }}">
{{ $p->package_name }} - ${{ $p->package_price }}
</label><br>
@endforeach

<h2>Add-ons</h2>
@foreach($addons as $a)
<label>
<input type="checkbox" name="addons[]" value="{{ $a->stripe_price_id }}">
{{ $a->service_name }} ({{ $a->billing_type }}) - ${{ $a->price }}
</label><br>
@endforeach

<br><hr>

<!-- <h3>Your Info</h3>
<input type="text" id="name" placeholder="Full Name"><br><br>
<input type="email" id="email" placeholder="Email"><br><br> -->

<button id="startPay">Continue</button>
<script src="https://js.stripe.com/v3/"></script>

<div id="payment-element"></div>
<button id="submit" style="display:none">Pay Now</button>

<script>
let clientSecret = null;

document.getElementById("startPay").onclick = async function() {

    let formData = new FormData();
    formData.append("package", document.querySelector("input[name=package]:checked").value);
    document.querySelectorAll("input[name='addons[]']:checked")
        .forEach(c => formData.append("addons[]", c.value));

    // formData.append("name", document.getElementById("name").value);
    // formData.append("email", document.getElementById("email").value);

    let res = await fetch("{{ route('payment.create') }}", {
        method: "POST",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        body: formData
    }).then(r => r.json());

    clientSecret = res.clientSecret;

    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements({ clientSecret });

    const paymentElement = elements.create("payment");
    paymentElement.mount("#payment-element");

    document.getElementById("submit").style.display = "block";

    document.getElementById("submit").onclick = async function() {
        const { error } = await stripe.confirmPayment({
            elements,
            confirmParams: { return_url: window.location.href }
        });

        if (error) alert(error.message);
    };
}
</script>

</body>
</html>
