@extends('includes.layouts.admin')
@section('page-title')
    Stripe Customer Payments
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Stripe Customer Pay </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Stripe Customer Pay </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.stripe.createIntent') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="select-order">Select Order&nbsp;<span class="mandetory">* </span></label>
                                    <select class="form-select select-orderid" name="order_id" id="" data-placeholder="Choose Order id">
                                        <option value="">Choose Order id..</option>
                                        @foreach ($orders as $order)
                                        <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="select-service">Select Order&nbsp;<span class="mandetory">* </span></label>
                                    <select class="form-select select-serviceid" name="service_id" id="" data-placeholder="Choose Service" required>
                                        <option value="">Choose Service..</option>
                                        @foreach ($services as $s)
                                        <option value="{{ $s->id }}">
                                            {{ $s->service_name }} — {{ $s->amount }} USD ({{ $s->billing_type }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn_baseColor btn-sm mt-2" type="submit">Proceed to Stripe Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($clientSecret))
    <h3>Payment Form</h3>
    @include("components.stripe-embedded-form")
    <script>
        loadEmbeddedStripe("{{ $clientSecret }}", "{{ env('STRIPE_KEY') }}");
    </script>
@endif
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $( '.select-serviceid, .select-orderid' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: true,
    });
});
</script>
@endsection