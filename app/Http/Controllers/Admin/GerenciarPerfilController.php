<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GerenciarPerfilController extends Controller
{
    public function index()
    {
        return view('admin.gerenciar_perfil.index');
    }

    public function update(request $request)
    {
        $data = $request->except('_token');


        if (Auth::guard('admin')->user() && Hash::check($data['senhaAtual'], Auth::guard('admin')->user()->password)) {

            if ($data['novaSenha'] !=  $data['repetirNovaSenha']) {
                return redirect()->back()->with('error', 'Por favor digite a mesma senha em Nova Senha e Repetir Nova Senha');
            } else {
                Admin::whereId(Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['novaSenha'])]);
                return redirect()->back()->with('success', 'Senha Atualizada com sucesso!');
            }
        } else {
            return redirect()->back()->with('error', 'Senha atual Invalida');
        }
    }
}
