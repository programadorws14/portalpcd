<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Exception;

class GerenciarUsuariosController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.gerenciar_usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.gerenciar_usuario.create');
    }

    public function store(request $request)
    {
        try {
            $data = $request->except('_token');
            $data['password'] = bcrypt($data['password']);

            if (!empty($request->foto)) {
                $newName = time() . '.' . $request->foto->getClientOriginalExtension();
                if ($request->foto->move(public_path('img_usuario/fotoperfil/'), $newName)) {
                    $data['foto'] = 'img_usuario/fotoperfil/' . $newName;
                }
            }
            Usuario::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $usuario = Usuario::find($id);
            return view('admin.gerenciar_usuario.edit', compact('usuario'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token', '_method');
            $data['password'] = bcrypt($data['password']);

            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            if (!empty($request->foto)) {
                $newName = time() . '.' . $request->foto->getClientOriginalExtension();
                if ($request->foto->move(public_path('img_usuario/fotoperfil/'), $newName)) {
                    $data['foto'] = 'img_usuario/fotoperfil/' . $newName;
                }
            }
            Usuario::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function deletar($id)
    {
        try {
            Usuario::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar' . $e->getMessage());
        }
    }
}
