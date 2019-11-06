<?php

namespace App\Http\Controllers\Empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
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
        $empresa = Empresa::whereEmail($data['email'])->first();

        if (Auth::check() || $empresa && Hash::check($data['password'], $empresa->password)) {
            Auth::guard('empresa')->attempt($data);
            return redirect()->route('empresa.dashboard');
        } else {
            return redirect()->route('site.login');
        }
    }

    public function sair()
    {
        Auth::guard('empresa')->logout();
        return redirect()->route('site.login');
    }
}
