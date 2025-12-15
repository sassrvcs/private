@extends('layouts.app')
@section('content')
<div class="tank-you-sec">
    <div class="container">
      <div class="tank-you-wrap">
        <div class="icon">
          <img src="{{ asset('frontend/assets/images/check-mark.png')}}" alt="">

        </div>
        <div class="text">
          <h2>Thank You!</h2>
          <p>Payment is successfully done for this company. Please check dashboard using your registered email address.</p>
          @php
                $route = route('companies-list');

              if (Route::is('service-payment-success')) {
                $route = route('purchased-service-list');
              }
              if (Route::is('custom-payment-success')) {
                $route = route('index');
              }
              if (Route::is('cart-payment-success')) {
                $route = route('accepted-company', ['order' => $company_order_id,'c_id'=>$company_id]);
              }
          @endphp
          <a href="{{$route}}" id="home">Home</a>
        </div>
      </div>
    </div>
  </div>
@endsection

<script>
   setTimeout(() => {
    document.getElementById("home").click();
   }, 4000);
</script>
