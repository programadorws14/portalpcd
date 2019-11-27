<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadUsuarioController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);

        //Login
        $login['email'] = $data['email'];
        $login['password'] = $data['password'];


        try {
            Usuario::create($data);
            $usuario = Usuario::whereEmail($data['email'])->first();
            if (Auth::guard('usuario')->check() || $usuario && Hash::check($login['password'], $usuario->password)) {
                Auth::guard('usuario')->attempt($login);
                return redirect()->route('usuario.dashboard');
            } else {
                return redirect()->route('site.login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
