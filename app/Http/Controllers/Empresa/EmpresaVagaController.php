<?php

namespace App\Http\Controllers\Empresa;

use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Municipio;
use App\Profissao;
use App\Vaga;
use Illuminate\Support\Facades\Auth;

class EmpresaVagaController extends Controller
{   
    public function __construct()
    {    
        $this->middleware('EmpresaAuth');
    }

    public function index()
    {   
        $estados = Estado::orderBy('nome', 'asc')->get();
        $profissoes = Profissao::all();
        return view('empresa.vagas.create', compact('estados', 'profissoes'));
    }

    public function store(Request $request)
    {   
        $data = $request->except('_token');
        $data['user_id'] = Auth::guard('empresas')->user()->id;
        try{
            Vaga::create($data);
            return redirect()->route('empresa.vaga.index')->with('success', 'Cadastrado com sucesso!');
        }catch(Exception $e){
            return redirect()->route('empresa.vaga.index')->with('error', 'Erro ao cadastrar - '. $e->getMessage())->withInput($data);
        }
    }

    public function EmAndamento()
    {
        $vagas = Vaga::where('status','!=', 3)->where('status','!=', 4)->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
        return view('empresa.vagas.list_emandamento', compact('vagas'));
    }

    public function Recusado()
    {
        $vagas = Vaga::where('aprovacao_user_id', '!=', null)->whereStatus(3)->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
        return view('empresa.vagas.list_recusada', compact('vagas'));
    }

    public function Vencido()
    {
        $vagas = Vaga::where('aprovacao_user_id', '!=', null)->whereStatus(4)->where('data_vencimento', '<', date('Y-m-d'))->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
        return view('empresa.vagas.list_vencido', compact('vagas'));
    }

    public function edit($id)
    {
        $edit = Vaga::find($id);
        $profissoes = Profissao::all();
        $estados = Estado::orderBy('nome', 'asc')->get();
        $municipios = Municipio::whereEstadoId($edit->estado_id)->get();
        return view('empresa.vagas.edit', compact('edit', 'profissoes', 'estados', 'municipios'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        try{
            Vaga::whereId($data['id'])->update($data);
            return redirect()->route('empresa.vaga.edit', $data['id'])->with('success', 'Atualizado com sucesso!');
        }catch(Exception $e){
            return redirect()->route('empresa.vaga.edit', $data['id'])->with('error', 'Erro ao cadastrar - ' . $e->getMessage())->withInput($data);
        }
    }

    public function delete($id)
    {
        try {
            Vaga::find($id)->delete();
            return redirect()->route('empresa.vaga.emandamento')->with('success', 'Deletado com sucesso!');
        }catch(Exception $e){
            return redirect()->route('empresa.vaga.emandamento')->with('error', 'Erro ao deletar - ' . $e->getMessage());
        }
    }

}
