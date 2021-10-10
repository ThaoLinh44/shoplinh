<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\hoadon;
use App\Models\HoadonChitiet;
use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class HomeController extends Controller
{
    //Trang chủ
    public function page_home(){
        $get_product = DB::table('sanphams')->take(4)->latest()->get();
        $get_pk_product = DB::table('phankhucs')->get();
        return view('customer.index')->with([
            'get_product'=>$get_product,
            'get_pk_product'=>$get_pk_product
        ]);
    }

    //Trang cửa hàng
    public function page_shop($id_pk,$id_loaidulieu){

        //neu =9999 thi lay 8 san pham moi them san pham
        if ($id_pk == 9999){
            $get_products = DB::table('sanphams')->take(8)->latest()->get();
            Session()->forget('id_pk');
            Session()->forget('id_pk_loaisp');
            Session()->put('id_pk_new',"Tất cả sản phẩm");
            return view('customer.page_product',['get_products'=> $get_products])->with('id_pk_new');
        }else {
            //nguoc lai  kiem tra
            //neu id_loaidulieu =1 thi lay tat ca phan khuc thuoc loai san pham id_pk
            if ($id_loaidulieu == 1){
                $get_pk_product = DB::table('phankhucs')->where('maloai', $id_pk)->get();
                $tenloai = DB::table('loaisanphams')->where('id', $id_pk)->get();
                Session()->forget('id_pk_new');
                Session()->forget('id_pk');
                Session()->put('id_pk_loaisp', "Tất cả sản phẩm");
                return view('customer.page_product')->with([
                    'get_pk_product' => $get_pk_product,
                    'tenloai' => $tenloai,
                    'id_pk_loaisp'
                ]);
                //nguoc lai
            }else{
                //lay tat ca san pham bat ke phan khuc nao
                if ($id_pk == 0) {
                    $get_products = DB::table('sanphams')->get();
                    Session()->forget('id_pk_new');
                    Session()->forget('id_pk_loaisp');
                    Session()->put('id_pk', "Tất cả sản phẩm");
                    return view('customer.page_product')->with([
                        'get_products'=>$get_products,
                        'id_pk'
                    ]);
                }else {
                    //lay san pham theo phan khuc cho truoc dua vao id_pk
                    Session()->forget('id_pk_new');
                    Session()->forget('id_pk_loaisp');
                    Session()->forget('id_pk');
                    $get_products = DB::table('sanphams')->where('ma_phankhuc', $id_pk)->get();
                    $get_phankhuc = DB::table('phankhucs')->where('id', $id_pk)->get();
                    return view('customer.page_product')->with([
                        'get_products'=>$get_products,
                        'get_phankhuc'=>$get_phankhuc
                    ]);
                }
            }
        }

    }

    //Trang chi tiết cửa hàng
    public function page_detail_shop ($id){
        $get_product = DB::table('sanphams')->where('id', $id)->get();
        $get_pk_product = DB::table('phankhucs')->get();
        return view('customer.page_detail_product')->with([
            'get_product'=>$get_product,
            'get_pk_product'=>$get_pk_product
        ]);
    }

    //Trang liên lạc
    public function page_contact (){
        return view('customer.page_contact');
    }

    //Trang blog
    public function page_blog (){
        return view('customer.page_blog');
    }
    public function page_single_blog (){
        return view('customer.page_single_blog');
    }
    public function page_reguler (){
        return view('customer.page_regular');
    }

    //Thanh toán
    public function page_checkout ($id_user){
        //Thêm vào hóa đơn mới
        $add_order = new hoadon();
        $add_order->ma_user = $id_user;
        $add_order->trangthai_hd = 0;
        $add_order->hinhthucthanhtoan = 0;
        $add_order->save();

        //Xử lí trang chi tiết hóa đơn
        //Lấy hóa đơn  mới nhất
        $get_order_new = DB::table('hoadons')->max('id');
        //Lấy giỏ hàng
        $get_carts = DB::table('giohangs')->where('ma_user',$id_user)->get();
        foreach($get_carts as $get_cart){
            //Lấy giá của sản phẩm
            $get_product = DB::table('sanphams')->where('id',$get_cart->ma_sp)->first();
            $add_detail = new HoadonChitiet();
            $add_detail->ma_hd = $get_order_new;
            $add_detail->ma_sp = $get_cart->ma_sp;
            $add_detail->soluong_sp = $get_cart->soluong_sp;
            $add_detail->giatien = $get_cart->thanhtien;
            $add_detail->save();
            //Trừ số lượng
            $soluong = ($get_product->soluong_sp - $get_cart->soluong_sp);
            DB::table('sanphams')->where('id',$get_cart->ma_sp)->update(['soluong_sp' => $soluong]);
        }
        DB::table('giohangs')->where('ma_user',$id_user)->delete();
        return redirect()->back()->with('success1','Thanh toán thành công');
    }

    //Hàm thêm vào giỏ hàng
    public function add_cart($id_user, $id_product){
        $add_cart = new GioHang();
        $add_cart->ma_user = $id_user;
        $add_cart->ma_sp = $id_product;
        $add_cart->soluong_sp = 1;
        //Lấy giá san phẩm
        $get_price = DB::table('sanphams')->where('id',$id_product)->first();
        $add_cart->thanhtien = $get_price->gia_sp;
        $add_cart->save();

        return redirect()->back()->with('success','Thêm thành công');
    }
}
