<?php
namespace App\Http\Middleware;
use Closure;
class LoginRole2Middleware
{
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'manajer' && $request->input('password') == 'manajer')) {
            return "Anda tidak dizinkan untuk mengakses data akun ini, karena username dan password anda salah.";
        }
        return $next($request);
    }
}