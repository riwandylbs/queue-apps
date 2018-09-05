<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets_matrix/images/favicon.png') }}">
    @yield('css')
    <title>MayApss - Queue Appliacations</title>
    <!-- Custom CSS -->
    <link href="{{ asset ('assets_matrix/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset ('dist_matrix/css/style.min.css') }}" rel="stylesheet">
   
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- INCLUDE HEADER HERE !!! -->
        @include('layouts.admin_layouts.header')

        <!-- INCLUDE SIDEBAR HERE -->
        @include('layouts.admin_layouts.sidebar')


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @yield('breadcrumbs')
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <!-- CONTENT HERE -->
            @yield('content')
                       
            <!-- INCLUDE FOOTER HERE  -->
            @include('layouts.admin_layouts.footer');

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets_matrix/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets_matrix/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets_matrix/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist_matrix/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist_matrix/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist_matrix/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ asset('dist_matrix/js/pages/dashboards/dashboard1.js"></') }}script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('assets_matrix/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('assets_matrix/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('dist_matrix/js/pages/chart/chart-page-init.js') }}"></script>
    @yield('js')
</body>

</html>