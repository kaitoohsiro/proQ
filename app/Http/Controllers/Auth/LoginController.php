<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }
    // ログイン画面
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect(route('top'));
    }
}
