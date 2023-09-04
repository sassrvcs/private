@extends('layouts.app')
@section('content')
<div class="tank-you-sec">
    <div class="container">
      <div class="tank-you-wrap">
        <div class="icon">
          <img src="{{ asset('frontend/assets/images/decline.png')}}" alt="">

        </div>
        <div class="text">
          <h2 style="color: red">Opps</h2>
          <p style="color: red">Payment has been Cancled</p>
          <a href="{{route('checkout')}}" style="background: red; color:white">Back to Checkout</a>
        </div>
      </div>
    </div>
  </div>
@endsection
