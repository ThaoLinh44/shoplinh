@extends('layout.master')
@foreach($get_product as $get_products)
    @section('title',trans($get_products->tensp))
@endforeach
@section('content')

    @foreach($get_product as $get_products)
        <!-- ##### Single Product Details Area Start ##### -->
        <section class="single_product_details_area d-flex align-items-center">
            <!-- Single Product Thumb -->
            <div class="single_product_thumb clearfix">
                <div class="">
                    @foreach((array)json_decode($get_products->hinh_sp, true) as $image)
                        <img style="margin-left: 80px" width="60%" src="{{asset('public/upload_img/'.$image)}}" alt="">
                        @break
                    @endforeach
                </div>
            </div>
            <!-- Single Product Description -->
            <div class="single_product_desc clearfix">
                @foreach($get_pk_product as $get_pk_products)
                    @if($get_pk_products->id == $get_products->ma_phankhuc )
                        <span>{{trans($get_pk_products->tenphankhuc)}}</span>
                    @endif
                @endforeach
                <a href="#">
                    <h2>{{trans($get_products->tensp)}}</h2>
                </a>
                @if($get_products->giamgia_sp == 0)
                    <p class="product-price">{{number_format($get_products->gia_sp)}} VNĐ</p>
                @else
                    <p class="product-price"><span class="old-price">{{number_format($get_products->gia_sp)}}VNĐ</span>{{number_format($get_products->gia_sp-($get_products->gia_sp*($get_products->giamgia_sp/100)))}} VNĐ</p>
                @endif
                <!-- Form -->
                <form class="cart-form clearfix" method="post">
                    <!-- Select Box -->
                    <label for="#">Số Lượng:  </label>
                    <input type="number" name="inputQty" value="1" style="width: 50px;">
                    <!-- Cart & Favourite Box -->
                    <div class="cart-fav-box d-flex align-items-center">
                        <!-- Cart -->
                        <button type="submit" name="addtocart" value="5" class="btn essence-btn">Thêm Vào giỏ hàng</button>
                        <!-- Favourite -->
                        <div class="product-favourite ml-4">
                            <a href="#" class="favme fa fa-heart"></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <br>

                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="6yHBLg1B"></script>
                    <div id="fb-root">
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="550" data-numposts="1"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
