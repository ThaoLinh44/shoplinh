@extends('layout_admin.master')
@section('title','Quản lý người dùng')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quản lý thành viên</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('/')}}">Trang chủ</a></li>
                        <li><a >Quản lý thành viên</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                @foreach($user as $users)
                    <div class="col-md-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                            @if($users->gioitinh == "Nam")
                                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('public/page_server/images/nam.jfif')}}">
                                            @else
                                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('public/page_server/images/nu.jfif')}}">
                                            @endif
                                        </a>
                                        <div class="media-body">
                                            <h2 style="font-size: 18px" class="text-light display-6">{{trans($users->hoten)}}</h2>
                                            @php($quyen = DB::table('quyentruycaps')->get())
                                            @foreach($quyen as $quyens)
                                                @if($quyens->id == $users->maquyen )
                                                    <p>{{trans($quyens->tenquyen)}}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-envelope-o"></i> Email:{{$users->email}}  <i class="far fa-check-circle" style="color: #00A000"></i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-tasks"></i> Phone:{{$users->sdt}} <i class="far fa-check-circle" style="color: #00A000"></i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-bell-o"></i> Địa chỉ: {{$users->diachi}}<i class="far fa-check-circle" style="color: #00A000"></i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-comments-o"></i> Giới tính:{{$users->gioitinh}}<i class="far fa-check-circle" style="color: #00A000"></i></a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                    </div>
                @endforeach


            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
