@extends('layout_admin.master')
@section('title','Quản lý nhà cung cấp')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quản lý nhà cung cấp</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('/')}}">Trang chủ</a></li>
                        <li><a href="#">Quản lý sản phẩm</a></li>
                        <li><a href="#">Phân khúc</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                THÊM PHÂN KHÚC
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ route('post_add_segment') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="segment">Tên phân khúc:</label>
                                    </div>

                                    <div class="col-9">
                                        <input type="text" name="inputSegment" class="form-control" placeholder="Nhập tên phân khúc...">
{{--                                        <small class="text-danger">{{ $errors->first('inputSegment') }}</small>--}}
                                    </div>
                                    <br><br/>
                                    <div class="col-3">
                                        <label for="segment">Hình ảnh:</label>
                                    </div>

                                    <div class="col-9">
                                        <input type="file" class="form-control-file" id="imgInp" name="inputFileImage">
                                        <img id="blah" src="#" style="max-width:100%;height:50px;border-radius:5px;"/>
                                    </div>

                                    <div class="col-3">
                                        <label for="segment">Loại sản phẩm:</label>
                                    </div>
                                    <br/><br>
                                    <div class="col-9">
                                        <select name="inputCate" class="form-control" style="width: 200px;">
                                            <option value="">- - - Chọn loại sp - - -</option>
                                            @php($get_cate2 = DB::table('loaisanphams')->get())
                                            @foreach($get_cate2 as $get_cate)
                                                <option value="{{ $get_cate->id }}"> &emsp; &emsp;{{ $get_cate->ten_loaisp }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                {{-- Hiển thị loại sản phẩm --}}
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                LOẠI PHÂN KHÚC
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Tên phân khúc</th>
                                    <th>Ảnh</th>
                                    <th scope="row" colspan="2" style="text-align: center;">Tùy chọn</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($show_segments as $key => $data)
                                <tr>
                                    <td> {{ ++$key }}</td>
                                    <td>
                                        @php($show_cate = DB::table('loaisanphams')->where('id',$data->maloai)->first())
                                        {{ $show_cate->ten_loaisp }}
                                    </td>
                                    <td> {{$data->tenphankhuc}}</td>
                                    <td>
                                        <img src="{{ url('public/upload_img/'.$data->anh_phankhuc) }}"
                                             class="img-circle elevation-2" alt="Segment Image " width="30px" height="30px">
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal{{ $data->id }}" title="Chỉnh Sửa">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{ url('delete-segment/'.$data->id) }}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cập nhật dữ liệu phân khúc</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('post_edit_segment',$data->id)}}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Loại sản phẩm:</label>
                                                        <select name="inputCate" class="form-control" style="width: 200px;">
                                                            <option value="">- - - Chọn loại sp - - -</option>
                                                            @php($get_cate2 = DB::table('loaisanphams')->get())
                                                            @foreach($get_cate2 as $get_cate)
                                                                <option value="{{ $get_cate->id }}"> &emsp; &emsp;{{ $get_cate->ten_loaisp }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tên Phân Khúc:</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="tenPK"
                                                        aria-describedby="emailHelp" value="{{ $data->tenphankhuc }}" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Hình Ảnh:</label>
                                                        <img src="{{ url('public/upload_img/'.$data->anh_phankhuc) }}"
                                                        class="img-circle elevation-2" alt="Segment Image " width="60px" height="50px" style="margin: 0px 0px 5px 10px;">
                                                        <input type="file" class="form-control-file" id="imgInp" name="inputFileImage" value="{{$data->anh_phankhuc}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
