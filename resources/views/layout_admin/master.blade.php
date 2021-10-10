<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('public/page_server/apple-icon.png')}}">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('public/page_server/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_server/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_server/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_server/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_server/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_server/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('public/page_server/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

@include('layout_admin.taskbar')
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    @include('layout_admin.header')
    @yield('content')
</div>
<script src="{{asset('public/page_server/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/page_server/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('public/page_server/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/page_server/assets/js/main.js')}}"></script>


<script src="{{asset('public/page_server/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{asset('public/page_server/assets/js/dashboard.js')}}"></script>
<script src="{{asset('public/page_server/assets/js/widgets.js')}}"></script>
<script src="{{asset('public/page_server/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/page_server/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('public/page_server/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
<script>
    var msg = '{{Session::get('success')}}';
    var exist = '{{Session::has('success')}}';
    if (exist) {
        swal({
            title: "Thêm thành công",
            icon: 'success',
            text: "",
            type: "error",
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
        });
    }
</script>

<script>
    var msg = '{{Session::get('edit')}}';
    var exist = '{{Session::has('edit')}}';
    if (exist) {
        swal({
            title: "Đã thay đổi",
            text: "",
            type: "error",
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
        });
    }
</script>

<script>
    var msg = '{{Session::get('xoa')}}';
    var exist = '{{Session::has('xoa')}}';
    if (exist) {
        swal({
            title: "Xóa thành công",
            icon: "success",
            text: "",
            type: "error",
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
        });
    }
</script>

</body>

</html>
