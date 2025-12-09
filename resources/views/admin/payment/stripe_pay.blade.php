{{--@extends('admin.layout')

@section('content')--}}
<h2>Stripe Pay</h2>

<form method="POST" action="{{ route('admin.stripe.createIntent') }}">
    @csrf

    {{--<label>Select Customer:</label>
    <select name="user_id" required>
        @foreach ($customers as $c)
            <option value="{{ $c->id }}">{{ $c->name }} ({{ $c->email }})</option>
        @endforeach
    </select>--}}

    <label>Select Order:</label>
    <select name="order_id" required>
        @foreach ($orders as $order)
            <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
        @endforeach
    </select>

    <br><br>

    <label>Select Service:</label>
    <select name="service_id" required>
        @foreach ($services as $s)
            <option value="{{ $s->id }}">
                {{ $s->service_name }} — {{ $s->amount }} USD ({{ $s->billing_type }})
            </option>
        @endforeach
    </select>

    <br><br>
    <button type="submit">Proceed to Stripe Form</button>
</form>

@if(isset($clientSecret))
    <h3>Payment Form</h3>
    @include("components.stripe-embedded-form")

    <script>
        loadEmbeddedStripe("{{ $clientSecret }}", "{{ env('STRIPE_KEY') }}");
    </script>
@endif
{{--@endsection--}}
