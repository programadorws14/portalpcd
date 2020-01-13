<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class GerenciarAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.gerenciar_admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.gerenciar_admin.create');
    }

    public function store(request $request)
    {
        try {
            $data = $request->except('_token');
            $data['password'] = bcrypt($data['password']);

            $verificEmail = Admin::whereEmail($data['email'])->get();
            if (count($verificEmail) > 0) {
                return redirect()->back()->with('error', 'Este e-mail já está em uso');
            }
            Admin::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $admin = Admin::find($id);
            return view('admin.gerenciar_admin.edit', compact('admin'));
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

            $admin = Admin::select('email')->find($data['id']);
            if ($admin->email != $data['email']) {
                $verificEmail = Admin::whereEmail($data['email'])->get();
                if (count($verificEmail) > 0) {
                    return redirect()->back()->with('error', 'Este e-mail já está em uso');
                }
            }

            Admin::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function deletar($id)
    {
        try {
            Admin::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar' . $e->getMessage());
        }
    }
}
