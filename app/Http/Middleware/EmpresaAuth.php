<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmpresaAuth
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
        if (!Auth::guard('empresa')->check()) {
            return redirect('/login');
        }
        return $next($request);


        // } elseif (Auth::guard('empresas')->user()->nivel != 'empresa') {
        //     Auth::guard('empresas')->logout();
        //     return redirect()->route('empresa.login');
        // } elseif (Auth::guard('empresas')->user()->aprovado_user_id == null) {
        //     Auth::guard('empresas')->logout();
        //     return redirect()->route('empresa.login')->with('error', 'Seu cadastro ainda não foi aprovado, aguarde ate que tenha aprovação');
        // } elseif (Auth::guard('empresas')->user()->aprovado_user_id != null && Auth::guard('empresas')->user()->status == 3) {
        //     Auth::guard('empresas')->logout();
        //     return redirect()->route('empresa.login')->with('error', 'O seu cadastro foi reprovado!');
        // } else {
        //     return $next($request);
        // }
    }
}
