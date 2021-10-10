@extends('layout_admin.master')
@section('title','Thêm mới quyền user')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Thêm mới quyền User</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('/')}}">Trang chủ</a></li>
                        <li><a >Dữ liệu bán hàng</a></li>
                        <li class="active">Thêm mới quyền user</li>
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
                                THÊM QUYỀN TRUY CẬP
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <form action="{{route('post_add_quyenuser')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Tên quyền:</label>
                                    <input type="text" name="name_role" class="form-control"
                                           placeholder="Nhập tên quyền..." required>
                                    <div class="invalid-feedback">Chưa nhập tên quyền</div>
                                    <small class="text-danger">{{ $errors->first('inputRoleName') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" name="descript_quyentruycap" id="" rows="8" placeholder="Nhập mô tả..."></textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>


                <section class="col-lg-6 connectedSortable">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                     @endif
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                QUYỀN TRUY CẬP
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Quyền</th>
                                        <th>Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($show_user_roles as $key => $show_user_role)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $show_user_role->hoten }}</td>
                                            <td>
                                                @php($show_role = DB::table('quyentruycaps')->where('id',$show_user_role->maquyen)->first())
                                                {{ $show_role->tenquyen }} 
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal{{ $show_user_role->id }}">
                                                    Thay đổi 
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $show_user_role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thay đổi quyền</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="">
                                                        <div class="form-group">
                                                          <label for="exampleInputEmail1">Họ Tên:</label>
                                                          <input type="email" class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" value="{{ $show_user_role->hoten }}" disabled>
                                                         </div>
                                    
                                                        <div class="form-group">
                                                          <label for="exampleInputPassword1">Quyền</label>
                                                            <select name="inputRoleId" class="form-control">
                                    
                                                                <option value="">- - Chọn quyền - -</option>
                                                                @php($get_role_2 = DB::table('quyentruycaps')->get())
                                                                @foreach($get_role_2 as $data)
                                                                    <option value="{{ $data->id }}">{{ $data->tenquyen }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Thay Đổi</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
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
        <!-- Modal -->
    
    </section>
    <script>
        var msg = '{{Session::get('success')}}';
        var exist = '{{Session::has('success')}}';
        if (exist) {
            swal({
                title: "Thêm thành công",
                text: "",
                type: "error",
                timer: 2000,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>
@endsection
