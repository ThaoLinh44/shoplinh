<!-- ##### Header Area Start ##### -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

<header class="header_area">
    @php($loaisp = DB::table('loaisanphams')->get())
    @php($phankhuc = DB::table('phankhucs')->get())
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="" id="essenceNav">
            <!-- Logo -->
            <!-- Navbar Toggler -->
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav" style="margin-left: 150px;position: ">
                    <ul>
                        <li> <a class="nav-brand" href="{{ url('/') }}"><img  src="{{asset('public/page_admin/img/core-img/linhshop-removebg-preview.png')}}" alt=""></a></li>
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li>
                            <style>
                                .xx:hover{
                                    background-color: #00cc00;
                                    color: white;
                                }
                            </style>
                            <a class="xx" href="{{ url('page-shop/9999/1')}}">Hàng mới về</a>
                        </li>
                        <li><a href="{{ url('page-shop/0/0')}}">Cửa hàng</a>
                            <div class="megamenu">
                                @foreach($loaisp as $loaisps)
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="{{route('page_shop',[$loaisps->id,1])}}">{{trans($loaisps->ten_loaisp)}}</a></li>
                                        @foreach($phankhuc as $phankhucs)
                                            @if($phankhucs->maloai  == $loaisps->id )
                                                <li><a href="{{ route('page_shop',[$phankhucs->id,0])}}">{{trans($phankhucs->tenphankhuc)}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                                <div class="single-mega cn-col-4">
                                    <img src="{{asset('public/page_admin/img/bg-img/shop.jpg')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#">Thương hiệu</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Thương hiệu</li>
                                    <li><a href="shop.html">Loreal</a></li>
                                    <li><a href="shop.html">Merzy</a></li>
                                    <li><a href="shop.html">Merzy</a></li>
                                    <li><a href="shop.html">G9skin</a></li>
                                    <li><a href="shop.html">Romand</a></li>
                                    <li><a href="shop.html">Innisfree</a></li>
                                    <li><a href="shop.html">Some by mi</a></li>
                                    <li><a href="shop.html">Black rouge</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Tùy chọn</li>
                                    <li><a href="shop.html">Đánh giá cao</a></li>
                                    <li><a href="shop.html">Thương hiệu mới</a></li>
                                    <li><a href="shop.html">Thương hiệu lớn</a></li>

                                </ul>
                                <div class="single-mega cn-col-4"></div>
                                <div class="single-mega cn-col-6">
                                    <img src="{{asset('public/page_admin/img/bg-img/trangdiem.jpg')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="{{route('page_blog')}}">Tin Tức</a></li>
                        <li><a href="{{route('page_contact')}}">Liên Lạc</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="#" method="post">
                    <input type="text" name="user_name" id="user_name" placeholder="Bạn đang tìm gì ..." />
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- User Login Info -->
            @if(Auth::check())
                <div class="user-login-info">
                        <a href="{{route('logout')}}" title="Đăng xuất"><i class="fa fa-user"></i></a>
                </div>
            @else
                <div class="user-login-info">
                    <a href="{{url('page-signin')}}" title="Đăng Nhập"><i class="fa fa-sign-in fa-lg"></i></a>
                </div>
            @endif
            <!-- Cart Area -->
            <div class="cart-area">
                @php($show_carts = DB::table('giohangs')->where('ma_user',Auth::id())->get())
                @if (Auth::check())
                    <a href="#" id="essenceCartBtn">
                        <i class="fa fa-shopping-cart fa-lg"></i><span>{{ $show_carts->count() }}</span>
                    </a>
                @else
                    <a href="#" id="essenceCartBtn">
                        <i class="fa fa-shopping-cart fa-lg"></i><span>0</span>
                    </a>
                @endif
            </div>
        </div>

    </div>
</header>
<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>
<div class="right-side-cart-area">
    <!-- Cart Button -->
{{--     <div class="cart-button">--}}
{{--        <a href="#" id="rightSideCart"><img src="{{asset('public/page_admin/img/core-img/bag.svg')}}" alt=""> <span>3</span></a>--}}
{{--    </div> --}}
    <div class="cart-content d-flex">
        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <?php $tongcong=0; ?>
            @foreach($show_carts as $data)
                @php($show_product = DB::table('sanphams')->where('id',$data->ma_sp)->first())
                <div class="single-cart-item">
                    <a href="#" class="product-image">

                        @foreach((array)json_decode($show_product->hinh_sp, true) as $image)
                            <img src="{{asset('public/upload_img/'.$image)}}" class="cart-thumb" alt="">
                        @break
                    @endforeach
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h6 class="text-center">{{ $show_product->tensp }}</h6>
                            <p class="color">Giá: {{ number_format($show_product->gia_sp) }}đ</p>
                            <p class="quanlity" style="color: #fff;">Số lượng: </p>
                            {{-- <input type="number" value="{{ $data->soluong_sp }}" min="1" name="inputQty" class="quanlity"> --}}
                            <div class="row align-items-center">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                      <span class="glyphicon glyphicon-minus">-</span>
                                    </button>
                                </span>
                                    <input type="number" id="quantity{{$show_product->id}}" name="quantity{{$show_product->id}}" class="form-control input-number" value="{{ $data->soluong_sp }}" min="1" max="100" style="max-width: 62%;max-height: 50%px">
                                    <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <span class="glyphicon glyphicon-plus">+</span>
                                    </button>
                                </span>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    var quantitiy=0;
                                    $('.quantity-right-plus').click(function(e){

                                        // Stop acting like a button
                                        e.preventDefault();
                                        // Get the field name
                                        var quantity = parseInt($('#quantity').val());
                                        // If is not undefined
                                        $('#quantity').val(quantity + 1);
                                        // Increment
                                    });
                                    $('.quantity-left-minus').click(function(e){
                                        // Stop acting like a button
                                        e.preventDefault();
                                        // Get the field name
                                        var quantity = parseInt($('#quantity').val());
                                        // If is not undefined
                                        // Increment
                                        if(quantity>0){
                                            $('#quantity').val(quantity - 1);
                                        }
                                    });
                                });
                            </script>
                            <p class="price">Đơn giá: {{ $show_product->gia_sp }} VNĐ</p>
                            <?php
                                $gia = $show_product->gia_sp;
                                $soluong = $data->soluong_sp;
                                $tongtien = $gia * $soluong;
                                $tongcong = $tongcong + $tongtien;
                            ?>
                        </div>
                    </a>
                </div>
                <br>
                <br>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Giỏ Hàng</h2>
            <ul class="summary-table">
                <li><span>tổng tiền:</span> <span><?php echo number_format($tongcong);?> VND</span></li>
                <li><span>phí vận chuyển:</span> <span>0 VNĐ</span></li>
                <li><span>giảm giá:</span> <span>0%</span></li>
                <li><span>tổng cộng:</span> <span><?php echo number_format($tongcong);?> VND</span></li>
            </ul>

            <div class="checkout-btn mt-100">
                <a href="{{url('page-checkout/'.Auth::id())}}" class="btn essence-btn">Thanh Toán</a>
            </div>
        </div>
    </div>
</div>
<script>
    function update_cart() {
        var ktra = document.getElementById('txt_solg').value;
        if(ktra > 0 && ktra < 5){
        }else{
            swal({
                title: "Số lượng không hợp lí",
                text: "",
                type: "info",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
            document.getElementById('txt_solg').value = 1;
        }
    }
</script>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Header Area End ##### -->
