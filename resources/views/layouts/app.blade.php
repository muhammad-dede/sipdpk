<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    @hasSection('title')
        <title>@yield('title')&nbsp;|&nbsp;{{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="apple-touch-icon" href="{{ asset('') }}templates/app/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('') }}templates/app/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/app/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/app/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/app/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}templates/app/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/app/assets/css/style.css">
    <!-- END: Custom CSS-->
    @stack('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.partials.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.partials.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.partials.footer')
    <!-- END: Footer-->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>


    <script>
        var baseUrl = "{{ url('/') }}";
    </script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js">
    </script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js">
    </script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js">
    </script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="{{ asset('') }}templates/app/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('') }}templates/app/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('') }}templates/app/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @stack('js')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>
