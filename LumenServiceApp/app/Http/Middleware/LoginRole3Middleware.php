<?php
namespace App\Http\Middleware;
use Closure;
class LoginRole3Middleware
{
    // Tugas Pertemuan 3
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'supervisor' && $request->input('password') == 'supervisor')) {
            return "Anda tidak dizinkan untuk mengakses data akun ini, karena username dan password anda salah.";
        }
        return $next($request);
    }
}