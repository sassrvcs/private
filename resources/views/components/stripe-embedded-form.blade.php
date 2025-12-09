<div id="payment-element"></div>
<button id="submit-payment">Pay Now</button>

<script src="https://js.stripe.com/v3/"></script>

<script>
async function loadEmbeddedStripe(clientSecret, publishableKey) {

    const stripe = Stripe(publishableKey);

    const elements = stripe.elements({
        clientSecret: clientSecret,
        appearance: { theme: 'stripe' }
    });

    const paymentElement = elements.create("payment");
    paymentElement.mount("#payment-element");

    document.getElementById("submit-payment").onclick = async () => {
        const { error } = await stripe.confirmPayment({
            elements,
            redirect: "if_required"
        });

        if (error) {
            alert(error.message);
            return;
        }

        // Notify server to finalize order
        await fetch("{{ route('admin.stripe.complete') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                payment_intent_id: clientSecret.split('_secret')[0]
            })
        });

        alert("Payment Successful!");
        location.reload();
    };
}
</script>
