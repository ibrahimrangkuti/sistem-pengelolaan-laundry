<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Login Berhasil', 'Selamat Datang ' . Auth::user()->nama);
            return redirect()->route('dashboard');
        }

        Alert::error('Login Gagal', 'Email atau Password Salah');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Logout Berhasil', 'Anda Berhasil Logout');
        return redirect()->route('login.index');
    }
}
