<?php

namespace App\Http\Controllers\Site;

use App\Empresa;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profissao;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadEmpresaController extends Controller
{

    public function store(request $request)
    {
        $data = $request->except('_token', 'logo');
        $login['email'] = $data['email'];
        $login['password'] = $data['password'];
        $data['password'] = bcrypt($data['password']);

        try {
            Empresa::create($data);
            $empresa = Empresa::whereEmail($data['email'])->first();
            if (Auth::guard('empresa')->check() || $empresa && Hash::check($login['password'], $empresa->password)) {
                Auth::guard('empresa')->attempt($login);
                return redirect()->route('empresa.dashboard');
            } else {
                return redirect()->route('empresa.login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
