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
                        <li><a href="#">Quản lý nhà cung cấp</a></li>
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
                                THÊM LOẠI
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ route('post_add_category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="">Tên loại:</label>
                                    </div>

                                    <div class="col-9">
                                        <input type="text" name="inputCategory" class="form-control" placeholder="Nhập tên loại...">
                                        <small class="text-danger">{{ $errors->first('inputCategory') }}</small>
                                    </div>

                                    <div class="col-3">
                                        <label for="">Hình ảnh:</label>
                                        <input type="file" class="form-control-file" id="imgInp" name="inputFileImage">
                                        <img id="blah" src="#" style="max-width:100%;height:50px;border-radius:5px;"/>
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
                                LOẠI SẢN PHẨM
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên loại</th>
                                    <th>Hình ảnh</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($show_categories as $key => $data)
                                <tr>
                                    <td> {{ ++$key }}</td>
                                    <td> {{$data->ten_loaisp}}</td>
                                    <td>
                                        <img src="{{ url('public/upload_img/'.$data->anh_loaisp) }}"
                                             class="img-circle elevation-2" alt="Category Image " width="30px" height="30px">
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-xs"
                                           href="{{ url('delete-cate/'.$data->id) }}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <ul class="pagination justify-content-xl-end" style="margin:20px 0">
                                {{ $show_categories->links() }}
                            </ul>

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