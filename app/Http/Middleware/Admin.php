<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki level 'admin'
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman not_admin
        return response()->view('not_admin');// Jika bukan admin, arahkan ke halaman beranda
    }
}
