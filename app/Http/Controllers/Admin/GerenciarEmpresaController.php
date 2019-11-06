<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Empresa;
use App\Estado;
use App\Http\Controllers\Controller;
use App\Municipio;
use Exception;
use Illuminate\Support\Facades\Auth;


class GerenciarEmpresaController extends Controller
{

    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function Create()
    {
        $estados = Estado::all();
        return view('admin.gerenciar_empresa.create', compact('estados'));
    }

    public function Store(Request $request)
    {
        $data = $request->except('_token', 'logo');
        $data['password'] = bcrypt($data['password']);
        $data['nivel'] = 'empresa';
        $data['status'] = 1;

        if (!empty($request->logo)) {
            $newName = time() . '.' . $request->logo->getClientOriginalExtension();
            if ($request->logo->move(public_path('img_empresas/logotipo/'), $newName)) {
                $data['logo'] = 'img_empresas/logotipo/' . $newName;
            }
        }

        try {
            Empresa::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function Edit($id)
    {
        $edit = Empresa::find($id);
        $estados = Estado::all();
        $municipios = Municipio::whereEstadoId($edit->estado_id)->get();
        return view('admin.gerenciar_empresa.edit', compact('edit', 'estados', 'municipios'));
    }

    public function Update(Request $request)
    {
        $edit = Empresa::find($request->id);

        $data = $request->except('_token', 'logo');
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if (!empty($request->logo)) {
            $newName = time() . '.' . $request->logo->getClientOriginalExtension();
            if ($request->logo->move(public_path('img_empresas/logotipo/'), $newName)) {
                unlink(public_path($edit->logo));
                $data['logo'] = 'img_empresas/logotipo/' . $newName;
            }
        }

        try {
            Empresa::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function Listar()
    {
        $empresas = Empresa::where('aprovado_user_id', '!=', null)->where('status', '!=', 3)->get();
        return view('admin.gerenciar_empresa.list_listar', compact('empresas'));
    }

    public function Delete($id)
    {
        try {
            Empresa::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function Pendente()
    {
        $empresas = Empresa::whereAprovadoUserId(null)->get();
        return view('admin.gerenciar_empresa.list_pendente', compact('empresas'));
    }

    public function Recusadas()
    {
        $empresas = Empresa::where('aprovado_user_id', '!=', '')->whereStatus(3)->get();
        return view('admin.gerenciar_empresa.list_recusadas', compact('empresas'));
    }

    public function Detalhes($id)
    {
        $edit = Empresa::with('estado')->find($id);
        $municipio = Municipio::find($edit->municipio_id);
        return view('admin.gerenciar_empresa.detalhes', compact('edit', 'municipio'));
    }

    public function Aprovar($id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->aprovado_user_id = Auth::user()->id;
            $empresa->status = 1;
            $empresa->save();
            return redirect()->route('admin.empresa.pendente')->with('success', 'Aprovado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('admin.empresa.pendente')->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function Recusar($id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->aprovado_user_id = Auth::user()->id;
            $empresa->status = 3;
            $empresa->save();
            return redirect()->route('admin.empresa.pendente')->with('success', 'Recusado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('admin.empresa.pendente')->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
