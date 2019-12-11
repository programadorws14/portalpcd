<?php

namespace App\Http\Controllers\Usuario;

use App\Experiencia;
use App\Formacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinksSociais;
use App\Usuario;
use App\Voluntario;
use Exception;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('UsuarioAuth');
    }

    public function dashboard()
    {
        $links = LinksSociais::whereUsuarioId(Auth::guard('usuario')->user()->id)->get();
        $experiencias = Experiencia::whereUsuarioId(Auth::guard('usuario')->user()->id)->get();
        $formacoes = Formacao::whereUsuarioId(Auth::guard('usuario')->user()->id)->get();
        $voluntarios = Voluntario::whereUsuarioId(Auth::guard('usuario')->user()->id)->get();
        
        return view('usuario.dashboard.index', compact('links', 'experiencias', 'formacoes', 'voluntarios'));
    }

    public function StoreProfile(request $request)
    {
        try {
            $data = $request->except('_token', 'links_social');
            $data['id'] = Auth::guard('usuario')->user()->id;


            if (!empty($data['password'])) {
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

            $usuario = Usuario::whereId($data['id'])->update($data);

            if (!in_array("", $request->links_social)) {

                for ($i = 0; $i < count($request->links_social); $i++) {
                    LinksSociais::create([
                        'link' => $request->links_social[$i],
                        'usuario_id' => $data['id']
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

    public function AdicionaExperiencia(request $request)
    {
        try {
            $data = $request->except('_token');
            Experiencia::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

    public function AdicionaFormacao(request $request)
    {
        try {
            $data = $request->except('_token');
            Formacao::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

    public function AdicionaVoluntario(request $request)
    {
        try {
            $data = $request->except('_token');
                Voluntario::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }


    public function getExperiencia($id)
    {   
        return Experiencia::whereId($id)->get();
    }

    public function getFormacao($id)
    {
        return Formacao::whereId($id)->get();
    }

    public function getVoluntario($id)
    {
        return Voluntario::whereId($id)->get();
    }

    public function UpdateExperiencie(request $request)
    {
        try {
            $data = $request->except('_token');
            Experiencia::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

    public function UpdateFormacao(request $request)
    {
        try {
            $data = $request->except('_token');
            Formacao::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

    public function UpdateVoluntario(request $request)
    {
        try {
            $data = $request->except('_token');
            Voluntario::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

}
