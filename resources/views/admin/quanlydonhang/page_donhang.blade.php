@extends('layout_admin.master')
@section('title','Quản lý nhà cung cấp')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quản lý đơn hàng</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('/')}}">Trang chủ</a></li>
                        <li><a href="#">Quản lý đơn hàng</a></li>
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
                            ĐƠN HÀNG
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>MÃ ĐƠN HÀNG</th>
                                <th>TÊN KHÁCH HÀNG</th>
                                <th>ĐỊA CHỈ GIAO HÀNG</th>
                                <th>TRẠNG THÁI</th>
                                {{-- <th>PHƯƠNG THỨC THANH TOÁN</th> --}}
                                <th scope="col" colspan="3" style="text-align: center;">TÙY CHỌN</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($show_orders as $key => $data)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td>000{{ $data->id }}</td>

                                        <td>
                                            @php($show_user = DB::table('users')->where('id',$data->ma_user)->first())
                                            {{ $show_user->hoten }}
                                        </td>

                                        <td>{{ $show_user->diachi}}</td>
                                        
                                        @if ($data->trangthai_hd == 0)
                                            <td><span>Đang chờ xác nhận</span></td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="{{ url('check-order/'.$data->id) }}">
                                                    <i class="fa fa-check"></i> Duyệt
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="#" role="button" onclick="return confirm('Bạn có chắc muốn hủy không?');">
                                                    <i class="fa fa-trash"></i> Hủy
                                                </a>
                                            </td>
                                        @elseif ($data->trangthai_hd == 1)
                                           <td> <span>Đang giao hàng</span></td>
                                           <td>
                                            <a class="btn btn-success btn-sm" href="{{ url('check-order/'.$data->id) }}">
                                                <i class="fa fa-check"></i> Xác Nhận
                                            </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="#" role="button" onclick="return confirm('Bạn có chắc muốn hủy không?');">
                                                    <i class="fa fa-trash"></i> Hủy
                                                </a>
                                            </td>
                                        @elseif ($data->trangthai_hd == 2)
                                            <td><span>Đã giao hàng</span></td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" type="button" disabled>
                                                    <i class="fa fa-check"></i> Xác Nhận
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" type="button" disabled>
                                                    <i class="fa fa-trash"></i> Hủy
                                                </button>
                                            </td>
                                        @else
                                            <span>Đã hủy</span>
                                            <td>
                                                <button class="btn btn-danger btn-sm" type="button" disabled>
                                                    <i class="fa fa-check"></i> Xác Nhận
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" type="button" disabled>
                                                    <i class="fa fa-trash"></i> Hủy
                                                </button>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{ url('page-detail/'.$data->id) }}">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <ul class="pagination justify-content-xl-end" style="margin:20px 0">
                            {{ $show_orders->links() }}
                        </ul>
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

