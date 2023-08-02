<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Formations Hunt | @yield('page-title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo.svg')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('admin/css/ionicons/ionicons.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{-- Page Level Styles --}}
    @yield('styles')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <!-- Tree View -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-treeview.min.css') }}">

    <!-- Load calender -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/main.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" href="{{ asset('admin/css/toaster/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    {{-- Page level Css --}}
    @yield('css')

    {{-- Custom Css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('images/template-logo.svg') }}" alt="Five Star Payment" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            @include('includes.common.navbar')
        </nav>
        <!-- /.navbar -->

        {{-- <div class="main-header navbar navbar-expand navbar-light text-center" id="pushNotificationAlert" align="center">
            You will no longer receive push notification. Reset Notifications and reload page to enable it.
        </div> --}}
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('includes.common.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    {{-- <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        @include('backend.admin.common.controlbar');
    </aside> --}}
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        Copyright &copy; 2022-2023 <a href="#">{{ Str::title(config('app.name')) }}</a>.
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            {{-- <b>Version</b> 3.1.0 --}}
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/inputmask/inputmask.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- jQuery UI -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>


    <!-- AdminLTE -->
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>

    <!-- summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>

    <!-- Calender Js -->
    <script src="{{ asset('admin/plugins/fullcalendar/main.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/js/demo.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/js/pages/dashboard3.js') }}"></script>

    {{-- <script src="{{ asset('admin/js/pages/dashboard.js') }}"></script> --}}

    <!-- Tree View -->
    <script src="{{ asset('admin/js/bootstrap-treeview.min.js') }}"></script>

    {{-- Toaster --}}
    <script src="{{ asset('admin/js/toaster/toastr.min.js') }}"></script>

    {{-- Date Range Picker --}}
    <script src="{{ asset('admin/js/daterangepicker.js') }}"></script>

    {{-- OPTIONAL SCRIPTS --}}
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>


    {{-- Axios --}}
    {{-- <script src="{{ asset('admin/js/axios/axios.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    {{-- Page level Scripts --}}
    @yield('scripts')

    {{-- @include('backend.admin.common.message-alert') --}}
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif --}}
    <script>
        // Ssn masking
        // $('[data-mask]').inputmask();

        // Phone validation
        $(document).ready(function() {
            $('#phone').keypress(function(e) {
                var charCode = (e.which) ? e.which : event.keyCode
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });
        });
    </script>

    {{-- For notification --}}
    <script>
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');
        // $.ajaxSetup({
        //     headers:
        //     { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        // });
    </script>
<script>
    var ctx = document.getElementById("barChart").getContext('2d');
    var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sst", "Sun"],
        datasets: [{
        label: 'data-1',
        data: [12, 19, 3, 17, 28, 24, 7],
        backgroundColor: "rgba(255,0,0,1)"
        }, {
        label: 'data-2',
        data: [30, 29, 5, 5, 20, 3, 10],
        backgroundColor: "rgba(0,0,255,1)"
        }]
    }
    });
</script>
    {{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script src="{{ asset('admin/js/fcm/firebase.js') }}"></script> --}}
</body>

</html>
