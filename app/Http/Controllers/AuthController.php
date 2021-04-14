<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showPageLogin()
    {
        return view('guest.login');
    }

    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $request->session()->regenerate();

            return redirect()->route('home'); // đường dẫn sau khi login ở đây
        }

        return back()->withErrors([
            'username' => 'Tên người dùng hoặc mật khẩu sai !',
        ]);
    }
    public function showPageRegister(){
        return view('guest.register');
    }
    public function register(RegisterUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
