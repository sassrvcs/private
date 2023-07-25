<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formations Hunt | @yield('page-title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" />
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" href="{{ asset('admin/css/toaster/toastr.min.css') }}">

    {{-- Additional CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('images/template-logo.svg') }}" alt="Logo" />
        </div>
        @yield('content')
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
    {{-- @include('includes.common.message-alert') --}}
    @yield('script')
</body>

{{-- Toaster --}}
<script src="{{ asset('admin/js/toaster/toastr.min.js') }}"></script>

@if (Session::has('status'))
    <script>
        toastr.success('{{ Session::get('status') }}');
    </script>
@endif

{{-- @if (session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif --}}

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif --}}

</html>
