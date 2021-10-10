<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Session;

class LoginController extends Controller
{
    public function page_signup(){
        return view('customer_admin.signup');
    }


    //post dang ky
    public function post_sign_up(Request $res)
    {
        $password = $res->input('password');
        $confirm = $res->input('xacnhan');
        if($password == $confirm){
            if (User::where('email', '=',$res->input('email'))->count() > 0) {
                $register_success = Session::get('no_success');
                Session()->put('no_success');
                return redirect()->back()->with('no_success', 'Thêm không thành công');
            }else {
                //image
                $user = new User;
                $user->maquyen = 13;
                $user->hoten = $res->input('hoten');
                $user->taikhoan = $res->input('username');
                $user->email = $res->input('email');
                $user->password = bcrypt($res->input('password'));
                $user->diachi = $res->input('diachi');
                $user->sdt = $res->input('dienthoai');
                $user->gioitinh = "Nam";
                $user->ngaysinh = $res->input('date');
                $user->save();
                $register_success = Session::get('signup_success');
                Session::put('signup_success');
                return redirect()->route('page_signin')->with('signup_success', 'Đăng ký tài khoản thành công');
                }
        }else{
            $register_success = Session::get('no_success');
            Session::put('no_success');
            return redirect()->route('login')->with('no_success', 'Đăng ký tài khoản thành công');
        }


    }


    //posst dang nhap
        public function post_sign_in(Request $request){
            $email = $request->input('username');
            $password = $request->input('password');
            if (Auth::attempt(['taikhoan' => $email, 'password' => $password,'maquyen'=>1||2])){
                $register_success = Session::get('login_success');
                Session()->put('login_success');
                return redirect()->route('page_admin')->with('login_success','thanh cong');
            }elseif (Auth::attempt(['taikhoan' => $email, 'password' => $password,'maquyen'=>13])){
                $register_success = Session::get('register_success');
                Session()->put('register_success');
                return redirect()->route('/')->with('register_success','thanh cong');
            } else{
                $register_success = Session::get('no_login_success');
                Session()->put('no_login_success');
                return redirect()->back()->with('no_login_success', 'Email hoặc mật khẩu của bạn không đúng!');
            }

        }
    //Đăng Xuất
        public function logout(Request $request){
            if (Auth::check()){
                if (Auth::user()->maquyen == 1 or Auth::user()->maquyen == 2){
                    Auth::logout();
                    Session::forget('cart');
                    return redirect()->route('page_signin');
                }else{
                    Auth::logout();
                    Session::forget('cart');
                    return redirect()->route('/');
                }
            }else{
                Auth::logout();
                Session::forget('cart');
                return redirect()->route('page_signin');
            }
        }
}
