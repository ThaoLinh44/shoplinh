<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//server

//Trang chủ
Route::get('/',[HomeController::class,'page_home'])->name('/');
//Trang cửa hàng
Route::get('/page-shop/{id_pk}/{id_loaidulieu}',[HomeController::class,'page_shop'])->name('page_shop');
//Trang chi tiết sản phẩm
Route::get('/page-detail-shop/{id}',[HomeController::class,'page_detail_shop'])->name('page_detail_product');
//Trang liên lạc
Route::get('/page-contact',[HomeController::class,'page_contact'])->name('page_contact');
Route::get('/page-blog',[HomeController::class,'page_blog'])->name('page_blog');
Route::get('/page-single-blog',[HomeController::class,'page_single_blog'])->name('page_single_blog');
Route::get('/page-regular',[HomeController::class,'page_reguler'])->name('page_reguler');
//Trang thanh toán
Route::get('/page-checkout/{id_user}',[HomeController::class,'page_checkout']);
//Hàm thêm vào giỏ hàng
Route::get('/add-cart/{id_user}/{id_product}',[HomeController::class,'add_cart']);


//Trang đăng ký
Route::get('/page-signup', function () {
    return view('admin.signup');
})->name('page_signup');
//Trang đăng nhập
Route::get('/page-signin', function () {
    return view('admin.signin');
})->name('page_signin');

Route::post('/post-sign-up',[LoginController::class,'post_sign_up'])->name('post_sign_up');
Route::post('/post-sign-in',[LoginController::class,'post_sign_in'])->name('post_sign_in');

//Đăng Xuất
Route::get('/logout',[LoginController::class,'logout'])->name('logout');




//==================ADMIN======================//
//Trang chủ
Route::get('page-admin',[AdminController::class,'page_admin'])->name('page_admin');

//QUẢN LÝ NGƯỜI DÙNG
Route::get('page-add-roleUser',[AdminController::class,'page_add_quyenuser'])->name('page_add_quyenuser');
Route::post('post-add-roleUser',[AdminController::class,'post_add_quyenuser'])->name('post_add_quyenuser');

//quan ly nguoi dung
Route::get('page-maneger-user',[AdminController::class,'page_maneger_user'])->name('page_maneger_user');

//Trang xử lí nhà cung cấp
Route::get('page-manager-supplier',[AdminController::class,'page_ncc'])->name('page_ncc');
Route::post('post-manager-supplier',[AdminController::class,'post_ncc'])->name('post_ncc');
Route::post('post-manager-dsupplier',[AdminController::class,'post_detail_ncc'])->name('post_detail_ncc');
//xoa nhà cung cấp sản phẩm
Route::get('post-delete-supplier/{id}',[AdminController::class,'post_delete_supplier'])->name('post_delete_supplier');
//xoa chi tiet nhà cung cấp sản phẩm
Route::get('post-delete-dsupplier/{id}',[AdminController::class,'post_delete_dsupplier'])->name('post_delete_dsupplier');
//cap nhat nha cung cap san pham
Route::post('post-edit-supplier/{id}',[AdminController::class,'post_edit_supplier'])->name('post_edit_supplier');

//QUẢN LÝ SẢN PHẨM
//Xứ li loại sản phẩm
Route::get('page-loaisp',[AdminController::class,'page_loaisp'])->name('page_loaisp');
Route::post('post-add-category',[AdminController::class,'post_add_category'])->name('post_add_category');
Route::get('delete-cate/{id_cate}',[AdminController::class,'delete_cate']);
//Xử lí phân khúc sản phẩm
Route::get('page-phankhuc',[AdminController::class,'page_phankhuc'])->name('page_phankhuc');
Route::post('post-edit-segment/{id}',[AdminController::class,'post_edit_segment'])->name('post_edit_segment');
Route::post('post-add-segment',[AdminController::class,'post_add_segment'])->name('post_add_segment');
Route::get('delete-segment/{id_segment}',[AdminController::class,'delete_segment']);
//Trang thêm, sửa, xóa, hiển thị sản phẩm
Route::get('page-sanpham',[AdminController::class,'page_sanpham'])->name('page_sanpham');
Route::post('post-add-product',[AdminController::class,'add_product']);
Route::get('post-delete-product/{id}',[AdminController::class,'post_delete_product'])->name('post_delete_product');
Route::post('post-edit-product/{id}',[AdminController::class,'post_edit_product'])->name('post_edit_product');

//QUẢN LÝ ĐƠN HÀNG
Route::get('page-order',[AdminController::class,'page_order']);
Route::get('check-order/{id_order}',[AdminController::class,'check_order']);
Route::get('page-detail/{id_order}',[AdminController::class,'page_detail']);
Route::get('export-order/{id_order}',[AdminController::class,'export_order']);

