<?php
namespace App\Http\Middleware;
use Closure;
class LoginRole4Middleware
{
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'pegawai' && $request->input('password') == 'pegawai')) {
            return "Anda tidak dizinkan untuk mengakses data akun ini, karena username dan password anda salah.";
        }
        return $next($request);
    }
}