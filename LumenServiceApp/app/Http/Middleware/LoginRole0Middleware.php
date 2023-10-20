<?php
namespace App\Http\Middleware;
use Closure;
class LoginRole0Middleware
{
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'direktur' && $request->input('password') == 'direktur')) {
            return "Anda tidak dizinkan untuk mengakses data akun ini, karena username dan password anda salah.";
        }
        return $next($request);
    }
}