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

    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}" type="text/css">
</head>

<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
@yield('script')
</body>
</html>
