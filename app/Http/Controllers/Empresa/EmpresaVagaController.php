<?php

namespace App\Http\Controllers\Empresa;

use App\Estado;
use App\Exports\CandidaturasExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Municipio;
use App\Profissao;
use App\Vaga;
use Exception;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\CssSelector\Node\FunctionNode;

class EmpresaVagaController extends Controller
{
    public function __construct()
    {
        $this->middleware('EmpresaAuth');
    }

    public function store(request $request)
    {
        $data = $request->except('_token');

        $data['pausar_vaga'] = (!empty($data['pausar_vaga']) ? 1 : '');
        $data['salario_acombinar'] = (!empty($data['salario_acombinar']) ? 1 : '');
        $data['salario_de'] = (!empty($data['salario_de']) ? $data['salario_de'] : '');
        $data['salario_ate'] = (!empty($data['salario_ate']) ? $data['salario_ate'] : '');

        try {
            Vaga::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $vaga = Vaga::find($id);
            return response(array(
                'vaga' => $vaga,
                'status' => 'success'
            ));
        } catch (Exception $e) {
            return response(array(
                'error' => $e->getMessage(),
                'status' => 'error'
            ));
        }
    }


    public function update(request $request)
    {
        try {
            $data = $request->except("_token", 'vaga_id');
            $data['pausar_vaga'] = (!empty($data['pausar_vaga']) ? $data['pausar_vaga'] : '');
            $data['salario_acombinar'] = (!empty($data['salario_acombinar']) ? $data['salario_acombinar'] : '');


            Vaga::whereId($request['vaga_id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Vaga::whereId($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar ' . $e->getMessage());
        }
    }

    // public function index()
    // {   
    //     $estados = Estado::orderBy('nome', 'asc')->get();
    //     $profissoes = Profissao::all();
    //     return view('empresa.vagas.create', compact('estados', 'profissoes'));
    // }

    // public function store(Request $request)
    // {   
    //     $data = $request->except('_token');
    //     $data['user_id'] = Auth::guard('empresas')->user()->id;
    //     try{
    //         Vaga::create($data);
    //         return redirect()->route('empresa.vaga.index')->with('success', 'Cadastrado com sucesso!');
    //     }catch(Exception $e){
    //         return redirect()->route('empresa.vaga.index')->with('error', 'Erro ao cadastrar - '. $e->getMessage())->withInput($data);
    //     }
    // }

    // public function EmAndamento()
    // {
    //     $vagas = Vaga::where('status','!=', 3)->where('status','!=', 4)->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
    //     return view('empresa.vagas.list_emandamento', compact('vagas'));
    // }

    // public function Recusado()
    // {
    //     $vagas = Vaga::where('aprovacao_user_id', '!=', null)->whereStatus(3)->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
    //     return view('empresa.vagas.list_recusada', compact('vagas'));
    // }

    // public function Vencido()
    // {
    //     $vagas = Vaga::where('aprovacao_user_id', '!=', null)->whereStatus(4)->where('data_vencimento', '<', date('Y-m-d'))->whereUserId(Auth::guard('empresas')->user()->id)->with('estado', 'municipio')->get();
    //     return view('empresa.vagas.list_vencido', compact('vagas'));
    // }

    // public function edit($id)
    // {
    //     $edit = Vaga::find($id);
    //     $profissoes = Profissao::all();
    //     $estados = Estado::orderBy('nome', 'asc')->get();
    //     $municipios = Municipio::whereEstadoId($edit->estado_id)->get();
    //     return view('empresa.vagas.edit', compact('edit', 'profissoes', 'estados', 'municipios'));
    // }

    // public function update(Request $request)
    // {
    //     $data = $request->except('_token');
    //     try{
    //         Vaga::whereId($data['id'])->update($data);
    //         return redirect()->route('empresa.vaga.edit', $data['id'])->with('success', 'Atualizado com sucesso!');
    //     }catch(Exception $e){
    //         return redirect()->route('empresa.vaga.edit', $data['id'])->with('error', 'Erro ao cadastrar - ' . $e->getMessage())->withInput($data);
    //     }
    // }

    // public function delete($id)
    // {
    //     try {
    //         Vaga::find($id)->delete();
    //         return redirect()->route('empresa.vaga.emandamento')->with('success', 'Deletado com sucesso!');
    //     }catch(Exception $e){
    //         return redirect()->route('empresa.vaga.emandamento')->with('error', 'Erro ao deletar - ' . $e->getMessage());
    //     }
    // }

    /**Expotar candidatos PDF */
    public function export($id = null)
    {
        $id_vaga = ($id ? $id : null);
        return Excel::download(new CandidaturasExport($id_vaga), 'candidatos.xlsx');
    }
}
