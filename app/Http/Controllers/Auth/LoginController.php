<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $user = $request->user;
        $password = $request->password;

        if(Auth::attempt(['email' => $user, 'password' => $password], $request->remember) || Auth::attempt(['phone_number' => $user, 'password' => $password], $request->remember)){
            return redirect(route('login'))->with('msg', 'login thành công');
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }
}
