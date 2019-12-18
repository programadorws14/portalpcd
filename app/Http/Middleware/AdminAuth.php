<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        } elseif (Auth::guard('admin')->user()->nivel != 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('error', 'Você não tem nível administrador para entrar');
        } else {
            return $next($request);
        }
    }
}
