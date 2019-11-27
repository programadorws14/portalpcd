<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->except('_token');
        $usuario = Usuario::whereEmail($data['email'])->first();


        if (Auth::check() || $usuario && Hash::check($data['password'], $usuario->password)) {
            Auth::guard('usuario')->attempt($data);
            return redirect()->route('usuario.dashboard');
        } else {
            return redirect()->route('site.login');
        }
    }

    public function sair()
    {
        Auth::guard('usuario')->logout();
        return redirect()->route('site.login');
    }
}
