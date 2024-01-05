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
          <p> Your form submission has been successfully submiited</p>
          @php
          $route = route('companies-list');
         @endphp
    <a href="{{$route}}" id="home">Go to Companies List</a>
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
