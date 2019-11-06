<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profissao;

class ProfissaoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $profissoes = Profissao::all();
        return view('admin.config.profissao.index', compact('profissoes'));
    }

    public function store(request $request)
    {   
        $data = $request->except('_token');
        try {
            Profissao::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Profissao $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $profissoes = Profissao::all();
        $edit = Profissao::find($id);
        return view('admin.config.profissao.edit', compact('profissoes', 'edit'));
    }

    public function update(request $request)
    {
        $data = $request->except('_token');
        try {
            Profissao::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Profissao $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function delete($id)
    {   
        try {
            Profissao::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Profissao $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }


}
