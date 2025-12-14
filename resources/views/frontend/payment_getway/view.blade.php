@extends('layouts.app')
@section('content')
    <!-- <form action="{{ $paymentUrl }}" id="payment_getway" method="POST">
        @foreach ($formData as $key => $value)
            <input type="text" name="{{ $key }}" value="{{ $value }}">
        @endforeach

    </form> -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#payment_getway").submit();
        });
    </script>
@endsection
