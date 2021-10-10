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

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Quản lý nhà cung cấp sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thêm mới nhà cung cấp sản phẩm</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#maneger_supplier" role="tab" aria-controls="nav-profile" aria-selected="false">Quản lý nhà cung cấp</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Dữ liệu nhà cung cấp</a>

                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="card-body card-block">
                                            <form action="{{route('post_ncc')}}" method="post" class="form-horizontal">
                                                @csrf
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên nhà cung cấp</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="tenncc" placeholder="" class="form-control">
                                                        <small class="form-text text-muted">
                                                            <a href="">Trợ giúp ?</a>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Địa chỉ nhà cung cấp</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <input name="diachincc" id="textarea-input" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="description_ncc" id="textarea-input" rows="6" placeholder="Phần mô tả quyền User..." class="form-control"></textarea></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hình ảnh đại diện</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <input name="image_ncc" type="file" id="textarea-input" placeholder="Hình ảnh" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> thêm mới
                                                    </button>
                                                    <a type="button" class="btn btn-danger btn-sm" href="{{route('page_admin')}}">
                                                        <i class="fa fa-ban"></i> Thoát
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Dữ liệu nhà cung cấp sản phẩm</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Tên nhà cung cấp</th>
                                                        <th>Sản phẩm cung cấp</th>
                                                        <th>Tùy chọn</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($dncc as $dnccs)
                                                        <tr>
                                                            <td>NCC0{{$dnccs->id}}</td>
                                                            <td>
                                                                @foreach($ncc as $nccs)
                                                                    @if($nccs->id == $dnccs->ma_ncc )
                                                                        {{$nccs->ten_ncc}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($sanpham as $sanphams)
                                                                    @if($sanphams->id == $dnccs->ma_sp  )
                                                                        {{$sanphams->tensp}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a type="button" class="btn btn-danger btn-sm" href="{{route('post_delete_dsupplier',$dnccs->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                                                    <i class="fa fa-ban"></i> Xóa</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            <strong class="card-title">Thêm mới chi tiết nhà cung cấp</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="{{route('post_detail_ncc')}}" method="post"  class="form-horizontal">
                                                @csrf
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Nhà cung cấp</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="select_ncc" id="selectLg" class="form-control-lg form-control">
                                                            <option value="0">chọn nhà cung cấp . . .</option>
                                                            @foreach($ncc as $nccs)
                                                                <option value="{{$nccs->id}}">{{ucwords($nccs->ten_ncc)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Sản phẩm</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="select_sp" id="SelectLm" class="form-control-sm form-control">
                                                            <option value="0">Chọn sản phẩm . . .</option>
                                                            @foreach($sanpham as $sanphams)
                                                                <option value="{{$sanphams->id}}">{{$sanphams->tensp}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> thêm mới
                                                    </button>
                                                    <a type="button" class="btn btn-danger btn-sm" href="{{route('page_admin')}}">
                                                        <i class="fa fa-ban"></i> Thoát
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="maneger_supplier" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Quản lý nhà cung cấp sản phẩm</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Tên nhà cung cấp</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Mô tả</th>
                                                        <th scope="col" colspan="2" style="text-align: center">Tùy chọn</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($ncc as $nccs)
                                                        <tr>
                                                            <td>NCC0{{$nccs->id}}</td>
                                                            <td>
                                                                {{$nccs->ten_ncc}}
                                                            </td>
                                                            <td>
                                                                {{$nccs->diachi_ncc}}
                                                            </td>
                                                            <td>
                                                                {{$nccs->mota_ncc}}
                                                            </td>
                                                            <td>

                                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal{{$nccs->id}}">
                                                                    <i class="far fa-edit"></i> Đổi
                                                                </button>
                                                                <div class="modal fade" id="exampleModal{{$nccs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin nhà cung cấp</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="POST" action="{{ route('post_edit_supplier',$nccs->id) }}">
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label for="products">Tên nhà cung cấp</label>
                                                                                        <input type="text" class="form-control" id="exampleInput" value="{{$nccs->ten_ncc}}" name="name_ncc" placeholder="">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="products">Địa chỉ</label>
                                                                                        <input type="text" class="form-control" id="exampleInput" name="address_ncc" value="{{$nccs->diachi_ncc}}" placeholder="">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="products">Mô tả</label>
                                                                                        <input type="text" class="form-control" id="exampleInput" name="descript_ncc" value="{{$nccs->mota_ncc}}" placeholder="">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="products">Hình Ảnh:</label>
                                                                                        <input type="file" class="form-control-file" id="imgInp" name="inputFileImage">
                                                                                        <img id="blah" src="#" style="max-width:100%;height:50px;border-radius:5px;"/>
                                                                                    </div>
                                                                                    <button class="btn btn-primary float-right" type="submit"  value="Submit">Thay đổi</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger btn-sm" href="{{route('post_delete_supplier',$nccs->id)}}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                                                    <i class="fa fa-trash"></i> Xóa
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <script>
        var msg = '{{Session::get('success_delete_dsupplier')}}';
        var exist = '{{Session::has('success_delete_dsupplier')}}';
        if(exist){
            swal({
                title: "Đăng nhập thành công",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>
@endsection
