<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Company App | {{ucwords(str_replace("."," ", str_replace(".index","", \Request::route()->getName())))}}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('atmos/light/assets/img/logo.png') }}"/>
    <link rel="icon" href="{{ asset('atmos/light/assets/img/logo.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/pace/pace.css') }}">
    <script src="{{ asset('atmos/light/assets/vendor/pace/pace.min.js') }}"></script>
    <!--vendors-->
    <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/vendor/jquery-scrollbar/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/timepicker/bootstrap-timepicker.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/fonts/materialdesignicons/materialdesignicons.min.css') }}">
    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/fonts/feather/feather-icons.css') }}">
    <!--Bootstrap + atmos Admin CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/css/atmos.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('atmos/light/assets/css/atmos.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/trumbowyg/ui/trumbowyg.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('summernote/summernote.min.css') }}">

    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- include summernote css/js -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}

    <style>
        .swal-title-custom{
            font-size: 1.5rem !important;
        }
        .swal-text-custom{
            font-size: 1rem !important;
        }
        .swal-popup-custom{
            width: 25em !important;
        }
        .swal-input-custom{
            font-size: 1rem !important;
        }
        .datepicker{ z-index:99999 !important; }
        #logoutLink:hover{
            cursor: pointer;
        }
        .dataTables_processing{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
        .select2-selection__clear{
            margin-right: 10px;
            z-index: 1;
        }
        .pointer_card {cursor: pointer;}
        .no-drop_cursor {cursor: no-drop;}
        .datepicker{z-index:9999 !important}
    </style>
    @yield('custom_css')
    <!-- Additional library for page -->
</head>
<!--body with default sidebar pinned -->
<body class="sidebar-pinned">
