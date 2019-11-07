<?php

namespace App\Http\Controllers\Empresa;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinksSociais;
use App\Ramo;
use App\Vaga;
use Exception;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{

    public function __construct()
    {
        $this->middleware('EmpresaAuth');
    }

    /**DASHBOARD */
    public function index()
    {
        $ramos = Ramo::all();
        $vagas = Vaga::whereEmpresaId(Auth::guard('empresa')->user()->id)->get();
        $links = LinksSociais::whereEmpresaId(Auth::guard('empresa')->user()->id)->get();

        return view('empresa.dashboard.index', compact('ramos', 'links', 'vagas'));
    }

    public function StoreProfile(request $request)
    {
        try {
            $data = $request->except('_token', 'links_social');

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            if ($data['ramo_atuacao'] == 'outros') {
                $data['ramo_outros'] = strtoupper($data['ramo_outros']);
                $ramo = Ramo::whereDescricao($data['ramo_outros'])->first();
                if (empty($ramo)) {
                    $novo_ramo = Ramo::create(['descricao' => $data['ramo_outros']]);
                    $data['ramo_atuacao'] = $novo_ramo->id;
                    unset($data['ramo_outros']);
                } else {
                    unset($data['ramo_outros']);
                    $data['ramo_atuacao'] = $ramo->id;
                }
            }

            if (!empty($request->logo_empresa)) {
                $newName = time() . '.' . $request->logo_empresa->getClientOriginalExtension();
                if ($request->logo_empresa->move(public_path('img_empresas/logotipo/'), $newName)) {
                    $data['logo_empresa'] = 'img_empresas/logotipo/' . $newName;
                }
            }

            $empresa = Empresa::whereId($data['id'])->update($data);

            if (!empty($request->links_social)) {

                for ($i = 0; $i < count($request->links_social); $i++) {
                    LinksSociais::create([
                        'link' => $request->links_social[$i],
                        'empresa_id' => $data['id']
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function delLinks($id)
    {
        try {
            LinksSociais::whereId($id)->delete();
            return response()->json(array(
                'status' => 'success'
            ));
        } catch (Exception $e) {
            return response()->json(array(
                'status' => 'error',
                'erro' => $e->getMessage()
            ));
        }
    }
}
