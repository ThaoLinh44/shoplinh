@extends('layout.master')
@section('title','Linhshop')
@section('content')

<style>
    .body{
        font-size: 20px;
    }
</style>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('public/page_admin/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        @if(Session::has('id_pk'))
                            <h2> Tất cả sản phẩm</h2>
                        @elseif(Session::has('id_pk_new'))
                            <h2> Sản phẩm mới</h2>
                        @elseif(Session::has('id_pk_loaisp'))
                            @foreach($tenloai as $tenloais)
                                <h2>{{trans($tenloais->ten_loaisp)}}</h2>
                            @endforeach
                        @else
                           @foreach($get_phankhuc as $get_phankhucs)
                                <h2> {{trans($get_phankhucs->tenphankhuc)}}</h2>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">DANH MỤC</h6>
                            <!--  Catagories  -->
                            <div class="catagories-menu">
{{--                                lay du lieu--}}
                                @php($loaisp = DB::table('loaisanphams')->get())
                                @php($phankhuc = DB::table('phankhucs')->get())
{{--                                dANH MUC MY PHAM--}}
                                @foreach($loaisp as $loaisps)
                                    <h6><i class="fas fa-stream"></i><a href="{{route('page_shop',[$loaisps->id,1])}}">{{trans($loaisps->ten_loaisp)}}</a></h6>
                                    @foreach($phankhuc as $phankhucs)
                                        @if($phankhucs->maloai  == $loaisps->id )
                                            <ul id="menu-content2" class="menu-content collapse show" >
                                                <li data-toggle="collapse">
                                                    <a href="{{ route('page_shop',[$phankhucs->id,0])}}"><p>{{trans($phankhucs->tenphankhuc)}}</p></a>
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Lọc</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Giá</p>

                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="59000" data-max="599000" data-unit="VND" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49000" data-value-max="599000" data-label-result="Range:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Từ 59.000 - 599.000 VNĐ</div>
                                </div>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget color mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Màu sắc</p>
                            <div class="widget-desc">
                                <ul class="d-flex">
                                    <li><a href="#" class="color1"></a></li>
                                    <li><a href="#" class="color2"></a></li>
                                    <li><a href="#" class="color3"></a></li>
                                    <li><a href="#" class="color4"></a></li>
                                    <li><a href="#" class="color5"></a></li>
                                    <li><a href="#" class="color6"></a></li>
                                    <li><a href="#" class="color7"></a></li>
                                    <li><a href="#" class="color8"></a></li>
                                    <li><a href="#" class="color9"></a></li>
                                    <li><a href="#" class="color10"></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Thương hiệu</p>
                            <div class="widget-desc">
                                <ul>
                                    <li><a href="#">Loreal</a></li>
                                    <li><a href="#">Merzy</a></li>
                                    <li><a href="#">G9skin</a></li>
                                    <li><a href="#">Romand</a></li>
                                    <li><a href="#">Innisfree</a></li>
                                    <li><a href="#">Some by mi</a></li>
                                    <li><a href="#">Black rouge</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span></span> Sản phẩm được tìm thấy</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sắp xiếp theo:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Xiếp hạng cao nhất</option>
                                                <option value="value">Sản phẩm mới</option>
                                                <option value="value">Mua nhiều nhất</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Single Product -->
                            @if(Session::has('id_pk_loaisp'))
                                @foreach($get_pk_product as $get_pk_products)
                                    @php($get_products = DB::table('sanphams')->where('ma_phankhuc', $get_pk_products->id)->get())
                                    @foreach($get_products as $data)
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    @foreach((array)json_decode($data->hinh_sp, true) as $image)
                                                        <img  src="{{asset('public/upload_img/'.$image)}}" alt="">
                                                    @break
                                                @endforeach
                                                <!-- Hover Thumb -->
                                                {{--                                        <img class="hover-img" src="{{asset('public/page_admin/img/product-img/product-2.jpg')}}" alt="">--}}

                                                <!-- Product Badge -->
                                                    <div class="product-badge offer-badge">
                                                        <span>-{{$data->giamgia_sp}}%</span>
                                                    </div>
                                                    <!-- Favourite -->
                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>

                                                <!-- Product Description -->
                                                <div class="product-description">
                                                    <span>topshop</span>
                                                    <a href="{{route('page_detail_product',$data->id)}}">
                                                        <h6>{{ $data->tensp }}</h6>
                                                    </a>
                                                    {{--                                            <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>--}}
                                                    <p class="product-price"> {{ number_format($data->gia_sp) }}đ</p>

                                                    <!-- Hover Content -->
                                                    <div class="hover-content">
                                                        <!-- Add to Cart -->
                                                        <div class="add-to-cart-btn">
                                                            <a href="{{ url('add-cart/'.Auth::id().'/'. $data->id) }}" class="btn essence-btn">
                                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                @foreach($get_products as $data)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="single-product-wrapper">
                                            <!-- Product Image -->
                                            <div class="product-img">
                                            @foreach((array)json_decode($data->hinh_sp, true) as $image)
                                                    <img  src="{{asset('public/upload_img/'.$image)}}" alt="">
                                                @break
                                            @endforeach
                                            <!-- Hover Thumb -->
                                            {{--                                        <img class="hover-img" src="{{asset('public/page_admin/img/product-img/product-2.jpg')}}" alt="">--}}

                                            <!-- Product Badge -->
                                                <div class="product-badge offer-badge">
                                                    <span>-{{$data->giamgia_sp}}%</span>
                                                </div>
                                                <!-- Favourite -->
                                                <div class="product-favourite">
                                                    <a href="#" class="favme fa fa-heart"></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product-description">
                                                <span>topshop</span>
                                                <a href="{{route('page_detail_product',$data->id)}}">
                                                    <h6>{{ $data->tensp }}</h6>
                                                </a>
                                                {{--                                            <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>--}}
                                                <p class="product-price"> {{ number_format($data->gia_sp) }}đ</p>

                                                <!-- Hover Content -->
                                                <div class="hover-content">
                                                    <!-- Add to Cart -->
                                                    <div class="add-to-cart-btn">
                                                        @if(Auth::check())
                                                            <a href="{{ url('add-cart/'.Auth::id(). '/'. $data->id) }}" class="btn essence-btn">
                                                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                                                            </a>
                                                        @else
                                                            <a href="{{ url('page-signin') }}" class="btn essence-btn">
                                                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                             <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

@endsection
