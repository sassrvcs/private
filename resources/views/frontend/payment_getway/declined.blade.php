@extends('layouts.app')
@section('content')
<div class="tank-you-sec">
    <div class="container">
      <div class="tank-you-wrap">
        <div class="icon">
          <img src="{{ asset('frontend/assets/images/decline.png')}}" alt="">

        </div>
        <div class="text">
          <h2 style="color: yellow">Opps</h2>
          <p style="color: yellow">Payment has been Declined due to some error</p>
          <a href="{{route('index')}}">Home</a>
        </div>
      </div>
    </div>
  </div>
@endsection
