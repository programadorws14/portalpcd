<?php

namespace App\Http\Controllers\Admin;

use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Municipio;
use App\Profissao;
use App\Vaga;
use Illuminate\Support\Facades\Auth;

class GerenciarVagaController extends Controller
{
    public function pendente()
    {
        $vagas = Vaga::whereAprovacaoUserId(null)->whereStatus(1)->with('user', 'estado', 'municipio')->get();
        return view('admin.gerenciar_vaga.list_pendente',compact('vagas'));
    }

    public function detalhes($id)
    {
        try {
            $vaga = Vaga::with('user', 'estado', 'municipio')->find($id);
            return view('admin.gerenciar_vaga.detalhes', compact('vaga'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function aceitar($id)
    {
         try {
            $vaga = Vaga::find($id);
            $vaga->status = 1;
            $vaga->aprovacao_user_id = Auth::guard('admin')->user()->id;
            $vaga->save();
            return redirect()->back()->with('success', 'Aprovado com sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao aprovar - ' . $e->getMessage());
        }
    }

    public function recusar($id)
    {
         try {
            $vaga = Vaga::find($id);
            $vaga->status = 3;
            $vaga->aprovacao_user_id = Auth::guard('admin')->user()->id;
            $vaga->save();
            return redirect()->back()->with('success', 'Recusado com sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao aprovar - ' . $e->getMessage());
        }
    }

    public function listar()
    {
        $vagas = Vaga::where('aprovacao_user_id', '!=', '')->where('status', '!=', 3)->where('status', '!=', 4)->with('user', 'estado', 'municipio')->get();
        return view('admin.gerenciar_vaga.list',compact('vagas'));
    }

    public function recusadas()
    {
        $vagas = Vaga::whereStatus(3)->with('user', 'estado', 'municipio')->get();
        return view('admin.gerenciar_vaga.recusadas', compact('vagas'));
    }

    public function edit($id)
    {   
        try {
            $edit = Vaga::find($id);
            $estados = Estado::all();
            $municipios = Municipio::whereEstadoId($edit->estado_id)->get();
            $profissoes = Profissao::all();
            return view('admin.gerenciar_vaga.edit', compact('edit', 'estados', 'municipios', 'profissoes'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao editar - ' . $e->getMessage());
        }
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token');
            $data['aprovacao_user_id'] =  Auth::guard('admin')->user()->id;
            Vaga::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao editar - ' . $e->getMessage());
        } 
    }

    public function delete($id)
    {   
        try {
            Vaga::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
