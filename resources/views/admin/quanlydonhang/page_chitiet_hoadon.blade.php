@extends('layout_admin.master')
@section('title','Quản lý nhà cung cấp')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chi tiết đơn hàng</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('page-admin')}}">Trang chủ</a></li>
                    <li><a href="{{url('page-order')}}">Hóa Đơn</a></li>
                    <li><a href="#">Chi Tiết</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            Ngày đặt hàng:
            <strong>{{ $show_order->created_at }}</strong>
            <span class="float-right"> <strong>Trạng thái:</strong> Đang giao hàng</span>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong style="color: #D96B5F;">LINHSHOP.COM.VN</strong>
                    </div>
                    <div>Địa Chỉ: Ninh Kiểu, Cần Thơ</div>
                    <div>Email: linhshop@gmail.com</div>
                    <div>Phone: +84 892 068 263</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    @php($show_user = DB::table('users')->where('id',$show_order->ma_user)->first())
                    <div>
                        <strong>Họ Tên: {{ $show_user->hoten }}</strong>
                    </div>
                    <div>Địa Chỉ: {{ $show_user->diachi}}</div>
                    <div>Email: {{$show_user->email }}</div>
                    <div>Liên Lạc: 0{{$show_user->sdt }}</div>
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá bán</th>
                        <th class="right">Số lượng</th>
                        <th class="right">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_price = 0; ?>
                    @php($get_details = DB::table('chitiet_hds')->where('ma_hd', $show_order->id)->get())
                    @foreach($get_details as $key =>$data)
                        <tr>
                            <td class="center">{{ ++$key }} </td>
                            @php($get_product = DB::table('sanphams')->where('id', $data->ma_sp)->first())
                            <td class="left strong">{{$get_product->tensp}}</td>
                            <td>
                                @foreach((array)json_decode($get_product->hinh_sp, true) as $image)
                                <img class="img-circle elevation-2" width="50px" height="40px" src="{{asset('public/upload_img/'.$image)}}" alt="">
                                @break
                                @endforeach
                            </td>
                            <td class="left">{{ number_format($get_product->gia_sp)}} VND</td>
                            <td class="right">{{ $data->soluong_sp }}</td>
                            <td class="right">
                                <?php
                                $price = $get_product->gia_sp;
                                $qty = $data->soluong_sp;
                                $total = $price * $qty;
                                $total_price = $total_price + $total;
                                ?>
                                <span class="amount">{{ number_format($total) }} VND</span>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr class="shipping">
                            <td class="left">
                                <strong>Phí vận chuyển</strong>
                            </td>

                            <td>
                                <b>Miễn phí vận chuyển</b>
                            </td>
                        </tr>

                        <tr>
                            <td class="left">
                                <strong>Tổng tiền thanh toán</strong>
                            </td>

                            <td class="right">
                                <?php $total_payment = $total_price ?>
                                <strong>{{ number_format($total_payment) }} VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="card-tools text-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('export-order/'.$show_order->id) }}" role="button">
                            <i class="fa fa-plus-circle"></i> Xuất hóa đơn
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
