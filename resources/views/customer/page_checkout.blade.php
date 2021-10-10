@extends('layout.master')
@section('title','Thông tin cửa hàng')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>THANH TOÁN</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Địa chỉ thanh toán</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Họ và tên <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value="" required>
                                </div>

{{--                                <div class="col-12 mb-3">--}}
{{--                                    <label for="company">Company Name</label>--}}
{{--                                    <input type="text" class="form-control" id="company" value="">--}}
{{--                                </div>--}}
{{--                                <div class="col-12 mb-3">--}}
{{--                                    <label for="country">Country <span>*</span></label>--}}
{{--                                    <select class="w-100" id="country">--}}
{{--                                        <option value="usa">United States</option>--}}
{{--                                        <option value="uk">United Kingdom</option>--}}
{{--                                        <option value="ger">Germany</option>--}}
{{--                                        <option value="fra">France</option>--}}
{{--                                        <option value="ind">India</option>--}}
{{--                                        <option value="aus">Australia</option>--}}
{{--                                        <option value="bra">Brazil</option>--}}
{{--                                        <option value="cana">Canada</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-12 mb-3">
                                    <label for="street_address">Địa chỉ giao hàng <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="street_address" value="">
                                </div>
{{--                                <div class="col-12 mb-3">--}}
{{--                                    <label for="postcode">Postcode <span>*</span></label>--}}
{{--                                    <input type="text" class="form-control" id="postcode" value="">--}}
{{--                                </div>--}}
{{--                                <div class="col-12 mb-3">--}}
{{--                                    <label for="city">Town/City <span>*</span></label>--}}
{{--                                    <input type="text" class="form-control" id="city" value="">--}}
{{--                                </div>--}}
{{--                                <div class="col-12 mb-3">--}}
{{--                                    <label for="state">Province <span>*</span></label>--}}
{{--                                    <input type="text" class="form-control" id="state" value="">--}}
{{--                                </div>--}}
                                <div class="col-12 mb-3">
                                    <label for="phone_number"> Số điện thoại người nhận <span>*</span></label>
                                    <input type="text" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email (Nếu có)</label>
                                    <input type="email" class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Ghi chú (Nếu có)</label>
                                    <input type="email" class="form-control" id="email_address" value="">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Đơn hàng của bạn</h5>
                            <p>Chi tiết đơn hàng</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Sản phẩm</span> <span>Thành tiền</span></li>
                            <li><span>Sản phẩm a</span> <span>150.000 VNĐ</span></li>
                            <li><span>Dầu ăn trị mụn</span> <span>500.000 VNĐ</span></li>
                            <li><span>Ship</span> <span>0 VNĐ</span></li>
                            <li><span>Tổng tiền</span> <span>650.000 VNĐ</span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Giờ đây bạn có thể gửi thanh toán trong nước và quốc tế từ bất kỳ đâu, dù bạn ở nhà hay đang di chuyển. Tất cả những gì bạn cần là địa chỉ email của người nhận. Nếu họ chưa sử dụng PayPal, họ có thể tạo tài khoản miễn phí trong giây lát..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>VNpay</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Tặng 100.000đ vào ví điện tử khách hàng mới là nữ, định danh, eKYC và phát sinh giao dịch. Từ 01/10 đến 20/10. 3 giải tuần mỗi tuần có cơ hội nhận KIM CƯƠNG trị giá hơn...</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="btn essence-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
