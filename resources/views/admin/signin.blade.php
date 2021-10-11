<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('resources/css/signup.css') }}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <div class="container" >
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form class="myForm text-center" action="{{route('post_sign_in')}}" method="post">
                            @csrf
                            <header>ĐĂNG NHẬP</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Tài Khoản" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <input type="submit" class="butt" value="ĐĂNG NHẬP">

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header>Welcome!</header>
                                <p style="font-size: 23px; color: #fff;">Chào mừng bạn đến với Chảnh Conmetics</p>
                                <p>Nếu chưa có tài khoản, vui lòng nhấn vào nút đăng ký bên dưới để tạo tài khoản nhé!</p>
                                <form method="get" action="{{route('page_signup')}}">
                                    <input type="submit" class="butt_out" value="ĐĂNG KÝ">
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var msg = '{{Session::get('signup_success')}}';
        var exist = '{{Session::has('signup_success')}}';
        if(exist){
            swal({
                title: "Đăng ký thành công",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var msg = '{{Session::get('no_login_success')}}';
        var exist = '{{Session::has('no_login_success')}}';
        if(exist){
            swal({
                title: "Đăng nhập không thành công",
                text: "",
                type: "error",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>
</body>
</html>

