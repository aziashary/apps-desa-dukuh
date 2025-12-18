<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginwargaController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.warga-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nik', 'password');

        if (Auth::guard('auth:warga')->attempt($credentials)) {
            return redirect()->intended('/dashboardwarga');
        }

        return redirect()->back()->withErrors([
            'nik' => 'nik atau password yang Anda masukkan salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('warga')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}