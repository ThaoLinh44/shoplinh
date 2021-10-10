<?php

namespace App\Http\Controllers;

use App\Models\ncc_sanpham;
use App\Models\nhacungcap;
use App\Models\quyentruycap;

use App\Models\User;

use App\Models\loaisanpham;
use App\Models\phankhuc;
use App\Models\sanpham;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class AdminController extends Controller
{
    public function page_admin(){
        return view('admin.page_index_admin');
    }
// trang quan ly user
    //Trang quyền truy cập
    public function page_add_quyenuser(){
        $show_user_roles = DB::table('users')->latest()->paginate(5);
        return view('admin.quanlynguoidung.page_add_quyenuser',[
            'show_user_roles'=>$show_user_roles
        ]);
    }

    public function post_add_quyenuser(Request $res){
        $quyentruycap= new quyentruycap();
        $quyentruycap->tenquyen = $res->input('name_role');
        $quyentruycap->mota = $res->input('descript_quyentruycap');
        $quyentruycap->save();
        $register_success = Session::get('success');
        Session()->put('success');
        return redirect()->back()->with('success', 'Thêm thành công');
    }
    public function page_maneger_user(){
        $user = DB::table('users')->get();
        return view('admin.quanlynguoidung.page_maneger_user')->with([
            'user'=>$user
        ]);
    }

    //quản lý nhà cung cấp
    public function page_ncc(){
        $dncc = DB::table('ncc_sanphams')->get();
        $ncc= DB::table('nhacungcaps')->get();
        $sanpham = DB::table('sanphams')->get();
        return view('admin.page_add_ncc')->with([
            'ncc'=>$ncc,
            'sanpham'=>$sanpham,
            'dncc'=>$dncc
        ]);
    }
//theem nha cung cap
    public function post_ncc(Request $res){
            $ncc = new nhacungcap();
            $ncc->ten_ncc = $res->input('tenncc');
            $ncc->diachi_ncc = $res->input('diachincc');
            $ncc->mota_ncc = $res->input('description_ncc');
            $ncc->hinhanh_ncc = $res->input('image_ncc');
            $ncc->save();
            $register_success = Session::get('success');
            Session()->put('success');
            return redirect()->back()->with('success', 'Thêm thành công');
    }
//thêm chi tiet nha cung cap
    public function  post_detail_ncc(Request $res){
        $ncc_sp = new ncc_sanpham();
        $ncc_sp->ma_ncc = $res->input('select_ncc');
        $ncc_sp->ma_sp  =$res->input('select_ncc');
        $ncc_sp ->save();
        $register_success = Session::get('success');
        Session()->put('success');
        return redirect()->back()->with('success', 'Thêm thành công');
    }
    //xoa nha cung cap san pham
    public function post_delete_supplier($id){
        nhacungcap::find($id)->delete();
        $register_success = Session::get('xoa');
        Session()->put('xoa');
        return redirect()->back()->with('xoa', 'Xóa thành công');
    }
    //xoa chi tiet nha cung cap san pham
    public function post_delete_dsupplier($id){
        ncc_sanpham::find($id)->delete();
        $register_success = Session::get('xoa');
        Session()->put('xoa');
        return redirect()->back()->with('xoa', 'Xóa thành công');
    }

    //cap nhat nha cung cap san pham
    public function post_edit_supplier($id,Request $res){
        $ncc = nhacungcap::find($id);
        $ncc->ten_ncc= $res->input('name_ncc');
        $ncc->diachi_ncc= $res->input('address_ncc');
        $ncc->mota_ncc= $res->input('descript_ncc');
        $ncc->hinhanh_ncc= $res->input('inputFileImage');
        $ncc->save();
        $register_success = Session::get('edit');
        Session()->put('edit');
        return redirect()->back()->with('edit', 'Xóa thành công');
    }

    //tim kiem
    public function action(Request $request){
        $data = $request->all();

        $query = $data['query'];

        $filter_data = User::select('email')
            ->where('email', 'LIKE', '%'.$query.'%')
            ->get();

        return response()->json($filter_data);
    }

    //============QUẢN LÝ SẢN PHẨM ===========//
    //Trang loại sản phẩm
    public function page_loaisp(){
        $show_categories = DB::table('loaisanphams')->latest()->paginate(5);
        return view('admin.quanlysanpham.page_loaisp',['show_categories'=>$show_categories]);
    }

    //Thêm loại sản phẩm
    public function post_add_category(Request $request){
        $this->validate($request,[
            'inputCategory'=>'unique:loaisanphams,ten_loaisp',
        ],[
            'inputCategory.unique'=>'Tên loại đã tồn tại',
        ]);

        $add_category = new loaisanpham();
        $add_category->ten_loaisp = $request->input('inputCategory');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_img'), $image_name);
            $add_category->anh_loaisp = $image_name;
        }

        $add_category->save();

        return redirect()->back()->with('success', 'Thêm thành công');
    }
    //Xóa loại sản phẩm
    public function delete_cate($id_loaisp){
        loaisanpham::find($id_loaisp)->delete();
        $register_success = Session::get('edit');
        Session()->put('edit');
        return redirect()->back()->with('edit', 'Xóa thành công');

    }

    //Trang phân khúc sản phẩm
    public function page_phankhuc(){
        $show_segments = DB::table('phankhucs')->get();
        return view('admin.quanlysanpham.page_phankhuc',['show_segments'=>$show_segments]);
    }
    //Thêm phân khúc sản phẩm
    public function post_add_segment(Request $request){
//        $this->validate($request,[
//            'inputSegment'=>'unique:phankhucs,tenphankhuc',
//        ],[
//            'inputSegment.unique'=> 'Tên phân khúc này đã tồn tại',
//        ]);
        $add_segment = new phankhuc();
        $add_segment->tenphankhuc = $request->input('inputSegment');
        $add_segment->maloai = $request->input('inputCate');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_img'), $image_name);
            $add_segment->anh_phankhuc = $image_name;
        }
        $add_segment->save();
        return redirect()->back()->with('success','Đã thêm thành công');
    }

        // cap nhat phan khuc
    public function post_edit_segment($id , Request $res){
        $update_phankhuc = phankhuc::find($id);
        $update_phankhuc ->maloai = $res->input('inputCate');
        $update_phankhuc ->tenphankhuc = $res->input('tenPK');
        $update_phankhuc ->mota = null;
        $update_phankhuc ->anh_phankhuc = $res->input('inputFileImage');
        $update_phankhuc->save();
        $register_success = Session::get('edit');
        Session()->put('edit');
        return redirect()->back()->with('edit', 'cap nhat thành công');

    }
    //Xóa phân khúc
    public function delete_segment($id_segment){
        DB::table('phankhucs')->where('id','=',$id_segment)->delete();
        return redirect()->back()->with('xoa','Đã xóa thành công');
    }

    //Trang sản phẩm
    public function page_sanpham(){
        $show_products = DB::table('sanphams')->latest()->paginate(8);
        return view('admin.quanlysanpham.page_sanpham',['show_products'=>$show_products]);
    }

    //Hàm thêm sản phẩm
    public function add_product(Request $request){
        $add_product = new sanpham();
        $add_product->ma_phankhuc = $request->input('inputPK');
        $add_product->tensp = $request->input('inputName');
        $add_product->gia_sp = $request->input('inputPrice');
        $add_product->soluong_sp = $request->input('inputQty');
        $add_product->giamgia_sp = $request->input('inputDis');
        $add_product->donvi = $request->input('inputUnit');
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $imgData[] = $name;
            }
        }
        $add_product->hinh_sp=json_encode($imgData);
        $add_product -> save();

        return redirect()->back()->with('success','Đã thêm thành công');
    }

    //xoa san pham
    public function post_delete_product($id){
        sanpham::find($id)->delete();
        $register_success = Session::get('xoa');
        Session()->put('xoa');
        return redirect()->back()->with('xoa', 'cap nhat thành công');
    }
    public function post_edit_product($id, Request $request){
        $edit_product = sanpham::find($id);
        $edit_product->ma_phankhuc = $request->input('inputPK');
        $edit_product->tensp = $request->input('inputName');
        $edit_product->gia_sp = $request->input('inputPrice');
        $edit_product->soluong_sp = $request->input('inputQty');
        $edit_product->giamgia_sp = $request->input('inputDis');
        $edit_product->donvi = $request->input('inputUnit');
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $imgData[] = $name;
            }
        }
        $edit_product->hinh_sp=json_encode($imgData);
        $edit_product -> save();
        return redirect()->back()->with('success','Đã thêm thành công');
    }

    //==QUẢN LÝ ĐƠN HÀNG====//
    //Trang quản lý đơn hàng
    public function page_order(){
        $show_orders = DB::table('hoadons')->latest()->paginate(8);
        return view('admin.quanlydonhang.page_donhang',['show_orders'=> $show_orders]);
    }
    //Check đơn hàng
    public function check_order($id_order){
        $order = DB::table('hoadons')->where('id',$id_order)->first();
        if($order->trangthai_hd == 0){
            DB::table('hoadons')->where('id',$id_order)->update(['trangthai_hd'=> 1]);
        }else{
            DB::table('hoadons')->where('id',$id_order)->update(['trangthai_hd'=> 2]);
        }
        return redirect()->back();
    }
    //Xem chi tiết đơn hàng
    public function page_detail($id_order){
        $show_order = DB::table('hoadons')->find($id_order);
        return view('admin.quanlydonhang.page_chitiet_hoadon',['show_order'=>$show_order]);
    }

    //Hàm xuất hóa đơn
    public function export_order($id_order){
        $show_export = DB::table('hoadons')->find($id_order);
        return view('admin.quanlydonhang.xuat_hoadon',['show_export'=> $show_export]);
    }
}
