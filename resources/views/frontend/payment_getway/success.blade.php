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
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, vero dolorum fugit consectetur vel debitis laborum incidunt harum quis cum tempora dolorem reiciendis, possimus praesentium id quas ut assumenda. Vitae.</p>
          @php
              if (Route::is('service-payment-success')) {
                $route = route('purchased-service-list');
              }else{
                $route = route('companies-list');
              }
          @endphp
          <a href="{{$route}}">Home</a>
        </div>
      </div>
    </div>
  </div>
@endsection
