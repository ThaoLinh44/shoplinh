@extends('layout_admin.master')
@section('title','Quản lý nhà cung cấp')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quản lý sản phẩm</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('/')}}">Trang chủ</a></li>
                        <li><a href="#">Quản lý sản phẩm</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            SẢN PHẨM
                        </h3>
                        <div class="card-tools">
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Thêm mới
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Phân khúc</th>
                                <th>Nhà cung cấp</th>
                                <th style="text-align: center;">Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>SL</th>
                                <th>Giá bán</th>
                                <th scope="col" colspan="2">Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($show_products as $key => $data)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td>
                                            @php($show_segment = DB::table('phankhucs')->where('id',$data->ma_phankhuc)->first())
                                            {{ $show_segment->tenphankhuc }}
                                        </td>

                                        <td>
                                            {{-- @php($get_product_suppliers = DB::table('product_suppliers')->where('product_id',$data->id)->first()) --}}
                                            {{-- @php($get_suppliers = DB::table('suppliers')->where('id', $get_product_suppliers->supplier_id)->first()) --}}
                                            {{-- {{ $get_suppliers->supplier_name }} --}}
                                            Nhà Cung Cấp
                                        </td>

                                        <td>{{$data->tensp}}</td>
{{--                                        <td>--}}
{{--                                            <img src="{{ url('public/upload_img/'.$data->hinh_sp) }}"--}}
{{--                                                class="img-circle elevation-2" alt="Product Image " width="50px" height="40px">--}}
{{--                                        </td>--}}
                                        <td>
                                            @foreach((array)json_decode($data->hinh_sp, true) as $image)
                                                <img class="img-circle elevation-2" width="50px" height="40px" src="{{asset('public/upload_img/'.$image)}}" alt="">
                                                @break
                                            @endforeach
                                        </td>
                                        <td>{{$data->soluong_sp}}</td>
                                        <td>{{number_format($data->gia_sp)}} VND</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#edit_product{{$data->id}}">
                                                <i class="fa fa-plus-circle"></i> Đổi
                                            </button>
                                            <div class="modal fade" id="edit_product{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('post_edit_product',$data->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="products">Phân Khúc</label>
                                                                    <select name="inputPK" class="form-control">

                                                                        @php($get_segments = DB::table('phankhucs')->get())
                                                                        @foreach($get_segments as $get_segment)
                                                                            @if($get_segment->id == $data->ma_phankhuc )
                                                                                <option value="{{ $get_segment->id }}"> &emsp; &emsp;{{ $get_segment->tenphankhuc }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                        @foreach($get_segments as $get_segment)
                                                                            @if($get_segment->id == $data->ma_phankhuc )
                                                                                @continue
                                                                            @else
                                                                                <option value="{{ $get_segment->id }}"> &emsp; &emsp;{{ $get_segment->tenphankhuc }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="products">Tên Sản Phẩm</label>
                                                                    <input type="text" class="form-control" id="exampleInput" name="inputName" value="{{$data->tensp}}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="products">Số lượng</label>
                                                                    <input type="number" class="form-control" id="exampleInput" name="inputQty" value="{{$data->soluong_sp}}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="products">Đơn Vị:</label>
                                                                    <input type="text" class="form-control" id="exampleInput" name="inputUnit" value="{{$data->donvi}}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="products">Giá bán(VNĐ):</label>
                                                                    <input type="text" class="form-control" id="exampleInput" name="inputPrice" value="{{number_format($data->gia_sp)}}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="products">Giảm giá:</label>
                                                                    <input type="number" class="form-control" id="exampleInput" name="inputDis" value="{{$data->giamgia_sp}}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="products">Hình Ảnh:</label>
                                                                    <input required type="file" class="form-control-file" id="imgInp" name="image[]" placeholder="images" multiple>
                                                                    @foreach((array)json_decode($data->hinh_sp, true) as $image)
                                                                        <img id="blah" class="img-circle elevation-2" style="max-width:100%;height:50px;border-radius:5px;" src="{{asset('public/upload_img/'.$image)}}" alt="">
                                                                    @endforeach
                                                                </div>
                                                                <button class="btn btn-primary float-right" type="submit"  value="Submit">Cập nhật</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm" href="{{route('post_delete_product',$data->id)}}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <ul class="pagination justify-content-xl-end" style="margin:20px 0">
                            <span>{{ $show_products->links() }}</span>
                        </ul>
                        <style>
                            .w-5{
                                display: none;
                            }
                        </style>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('post-add-product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="products">Phân Khúc</label>
                                <select name="inputPK" class="form-control">
                                    <option value="">- - - Chọn phân khúc - - -</option>
                                    @php($get_segments = DB::table('phankhucs')->get())
                                    @foreach($get_segments as $get_segment)
                                        <option value="{{ $get_segment->id }}"> &emsp; &emsp;{{ $get_segment->tenphankhuc }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="products">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="exampleInput" name="inputName" placeholder="Nhập tên sản phẩm...">
                            </div>

                            <div class="form-group">
                                <label for="products">Số lượng</label>
                                <input type="number" class="form-control" id="exampleInput" name="inputQty" placeholder="Nhập số lượng...">
                            </div>

                            <div class="form-group">
                                <label for="products">Đơn Vị:</label>
                                <input type="text" class="form-control" id="exampleInput" name="inputUnit" placeholder="Nhập tên đơn vị...">
                            </div>

                            <div class="form-group">
                                <label for="products">Giá bán:</label>
                                <input type="number" class="form-control" id="exampleInput" name="inputPrice" placeholder="Nhập giá bán...">
                            </div>

                            <div class="form-group">
                                <label for="products">Giảm giá:</label>
                                <input type="number" class="form-control" id="exampleInput" name="inputDis" placeholder="Nhập giá bán...">
                            </div>

                            <div class="form-group">
                                <label for="products">Hình Ảnh:</label>
                                <input required type="file" class="form-control-file" id="imgInp" name="image[]" placeholder="images" multiple>
                                <img id="blah" src="#" style="max-width:100%;height:50px;border-radius:5px;"/>
                            </div>
                            <button class="btn btn-primary float-right" type="submit"  value="Submit">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

