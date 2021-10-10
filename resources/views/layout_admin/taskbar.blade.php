<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('page_admin')}}"><img src="{{asset('public/page_admin/img/bg-img/logo_admin.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{route('page_admin')}}"><img src="{{asset('public/page_server/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ </a>
                </li>
                <h3 class="menu-title">Quản lý</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản lý cửa hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fas fa-user-tag"></i>
                            <a href="{{route('page_add_quyenuser')}}">Quản lý quyền</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i>
                            <a href="{{ url('page-order') }}">Quản lý đơn hàng</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý sản phẩm</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('page_ncc')}}">Quản lý nhà cung cấp</a></li>
                        <li><i class="fa fa-table"></i><a href="{{ route('page_loaisp') }}">Loại sản phẩm</a></li>
                        <li><i class="fas fa-paper-plane"></i></i><a href="{{ route('page_phankhuc') }}">Phân khúc sản phẩm</a></li>
                        <li><i class="fab fa-product-hunt"></i><a href="{{ route('page_sanpham') }}">Sản Phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('page_maneger_user')}}" class="dropdown-toggle"> <i class="menu-icon fas fa-user"></i> Quản lý thành viên </a>
                </li>

                <h3 class="menu-title">Dữ liệu bán hàng</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Báo cáo thống kê</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Đơn hàng chưa duyệt</a></li>
                        <li><i class="fas fa-file-invoice-dollar"></i><a href="maps-vector.html">Hóa đơn thanh toán</a></li>
                        <li><i class="fas fa-money-check-alt"></i><a href="maps-vector.html">Doanh thu</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Trang bán hàng</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('/')}}" class="dropdown-toggle" > <i class="menu-icon fas fa-store"></i>Cửa hàng</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
