<?php

namespace App\Http\Controllers\Admin;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;
use Exception;

class GerenciarVagaController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }
    
    public function index()
    {
        $vagas = Vaga::with('empresa', 'candidaturas', 'candidaturas.candidato_vaga')->get();
        // dd($vagas);
        return view('admin.gerenciar_vaga.index', compact('vagas'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('admin.gerenciar_vaga.create', compact('empresas'));
    }

    public function store(request $request)
    {
        try {
            $data = $request->except('_token');
            $data['pausar_vaga'] = (!empty($data['pausar_vaga']) && $data['pausar_vaga'] == 'Sim' ? 1 : '');
            $data['salario_acombinar'] = (!empty($data['salario_acombinar'])  && $data['salario_acombinar'] == 'Sim' ? 1 : '');
            $data['salario_de'] = (!empty($data['salario_de']) ? $data['salario_de'] : '');
            $data['salario_ate'] = (!empty($data['salario_ate']) ? $data['salario_ate'] : '');

            Vaga::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $vaga = Vaga::with('empresa')->find($id);
        $empresas = Empresa::all();
        return view('admin.gerenciar_vaga.edit', compact('vaga', 'empresas'));
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token', '_method');
            $data['pausar_vaga'] = (!empty($data['pausar_vaga']) && $data['pausar_vaga'] == 'Sim' ? 1 : '');
            $data['salario_acombinar'] = (!empty($data['salario_acombinar'])  && $data['salario_acombinar'] == 'Sim' ? 1 : '');
            $data['salario_de'] = (!empty($data['salario_de']) ? $data['salario_de'] : '');
            $data['salario_ate'] = (!empty($data['salario_ate']) ? $data['salario_ate'] : '');

            Vaga::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }
}
