<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsWarga
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah login
        if (!auth()->check()) {
            return abort(404); // Atau Anda bisa mengarahkannya ke halaman login
        }

        // Memeriksa apakah pengguna memiliki level yang sesuai dengan warga (misal level 2)
        if (auth()->user()->level == 2) {
            return $next($request);
        }

        // Jika bukan warga, mungkin Anda ingin memberikan respons yang lebih sesuai
        return abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini sebagai warga.');
    }
}
