<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
//        dd(request()->all());
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->with('loginError', 'Login gagal! Silahkan coba lagi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
