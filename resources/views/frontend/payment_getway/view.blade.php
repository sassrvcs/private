@extends('layouts.app')
@section('content')
    <!-- <form action="" id="payment_getway" method="POST">
        <input type="text" name="" value="">

    </form> -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#payment_getway").submit();
        });
    </script>
@endsection
