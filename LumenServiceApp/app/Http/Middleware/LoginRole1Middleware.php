<?php
namespace App\Http\Middleware;
use Closure;
class LoginRole1Middleware
{
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'wakildirektur' && $request->input('password') == 'wakildirektur')) {
            return "Anda tidak dizinkan untuk mengakses data akun ini, karena username dan password anda salah.";
        }
        return $next($request);
    }
}