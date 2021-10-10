<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('public/page_admin/img/core-img/favicon.ico')}}">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('public/page_admin/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('public/page_admin/scss/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

@include('layout.header')
@yield('content')
@include('layout.footer')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('public/page_admin/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('public/page_admin/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('public/page_admin/js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('public/page_admin/js/plugins.js')}}"></script>
<!-- Classy Nav js -->
<script src="{{asset('public/page_admin/js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('public/page_admin/js/active.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@3.1.7/src/bootstrap-input-spinner.min.js"></script>
<script src="{{asset('public/page_admin/js/map-active.js')}}"></script>

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
    var msg = '{{Session::get('success1')}}';
    var exist = '{{Session::has('success1')}}';
    if (exist) {
        swal({
            title: "Thanh toán thành công",
            icon: 'success',
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
