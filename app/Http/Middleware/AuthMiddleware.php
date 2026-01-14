<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session('id' == null)) {
            return redirect('/');
        } else {

            $url = match (session('role_id')) {
                1  => "/pmb/dashboard",
                2 => "/keuangan/dashboard",
                3 => "/user/dashboard",
                4 => "/akademik/dashboard",
                default => "/"
            };

            return redirect($url);
        }

        return $next($request);
    }
}
