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
                        <form method="POST" action="{{ route('admin.stripe.scheduleSubscription') }}">
                            @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Select Order <span class="mandetory">*</span></label>
                                    <select class="form-select select-orderid" name="order_id" required>
                                        <option value="">Choose Order ID..</option>
                                        @foreach ($orders as $o)
                                            <option value="{{ $o->id }}">{{ $o->order_id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Company Name</label>
                                    <input type="text" id="company_name" class="form-control company-name" readonly>
                                </div>

                                <div class="col-sm-4">
                                    <label>Select Service <span class="mandetory">*</span></label>
                                    <select class="form-select select-serviceid" name="service_id" required>
                                        <option value="">Choose Service..</option>
                                        @foreach ($services as $s)
                                            <option value="{{ $s->id }}">
                                                {{ $s->service_name }} — {{ $s->price }} GBP
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label>Subscription Start Date <span class="mandetory">*</span></label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-sm mt-3" type="submit">Schedule Subscription</button>
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
$(document).ready(function() {

    // Initialize select2
    $('.select-serviceid, .select-orderid').select2({
        theme: "bootstrap-5",
        width: '100%',
    });

    // Handle order ID select
    $('.select-orderid').on('change', function() {

        let orderId = $(this).val();
        if (!orderId) return;

        let url = "{{ route('admin.getOrderDetails', ':id') }}";
        url = url.replace(':id', orderId);

        fetch(url)
            .then(res => res.json())
            .then(data => {
                $('#company_name').val(data.company_name);
            })
            .catch(err => console.error("Fetch error:", err));

    });

});
</script>

@endsection