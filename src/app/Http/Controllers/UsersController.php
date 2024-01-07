<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Users;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Session;

session_start();

class UsersController extends Controller
{

    //login
    public function display_login(Request $request)
    {
        $title = 'Đăng nhập';
        return view('clients.login.frmlogin', compact('title'));
    }

    public function login_user(Request $request)
    {
        $email = $request->user_email;

        $password = $request->user_password;

        if ($email == null) {
            return redirect('/Login')
                ->with('msg', 'Vui lòng điền tên đăng nhập!');
        }

        if ($password == null) {
            return redirect('/Login')
                ->with('msg', 'Vui lòng điền mật khẩu!');
        }

        $result = DB::table('users')->where('email', $email)->where('email', $password)->first();
        if ($result) {
            Session::put('user_id', $result->id);
            Session::put('user_name', $result->fullname);
            return redirect('/')
                ->with('msg', 'Đăng nhập thành công');
        } else {
            return redirect('/Login')
                ->with('msg', 'Tên đăng nhập hoặc mật khẩu sai! Vui lòng kiểm tra lại');
        }
    }

    // Đăng xuất
    public function logout_user()
    {
        Session::flush();
        return Redirect('/');
    }
}
