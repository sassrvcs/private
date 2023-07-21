<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Formations Hunt</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo.svg')}}">
    <!-- =============== all css =============== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.4.5.2.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/slick/slick.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}" type="text/css">
</head>

<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
</body>

</html>
