<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Memeriksa apakah pengguna memiliki level yang sesuai dengan admin
        if (auth()->user()->level == 1) {
            return $next($request);
        }

        // Memeriksa apakah pengguna memiliki level yang sesuai dengan warga
        if (auth()->user()->level == 2) {
            return redirect()->route('dashboardwarga');
        }

        // Jika bukan admin atau warga, mungkin Anda ingin memberikan respons yang lebih sesuai
        return abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
