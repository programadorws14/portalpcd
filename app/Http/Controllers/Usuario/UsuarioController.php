<?php

namespace App\Http\Controllers\Usuario;

use App\Candidatura;
use App\Experiencia;
use App\Formacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinksSociais;
use App\Usuario;
use App\Voluntario;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $candidaturas = Candidatura::whereUsuarioId(Auth::guard('usuario')->user()->id)->with('vaga')->get();
        return view('usuario.dashboard.index', compact('links', 'experiencias', 'formacoes', 'voluntarios', 'candidaturas'));
    }

    public function StoreProfile(request $request)
    {
        try {
            $data = $request->except('_token', 'links_social');
            $data['id'] = Auth::guard('usuario')->user()->id;
            $user =  Auth::guard('usuario')->user();


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

            if (!empty($request->cv)) {
                $validarCV = Validator::make(
                    $request->all(),
                    [
                        'cv' => 'mimes:pdf,doc,txt',
                    ],
                    [
                        'cv.mimes' => 'Você precisa enviar o Curriculum nos formatos TXT, PDF, WORD',
                    ]
                );

                if ($validarCV->fails()) {
                    return redirect()->back()->withErrors($validarCV->errors())->withInput($request->all());
                }


                $newNameCV = time() . '.' . $request->cv->getClientOriginalExtension();
                if ($request->cv->move(public_path('curriculum/'), $newNameCV)) {
                    $data['cv'] = 'curriculum/' . $newNameCV;
                    if (!empty($user->cv) && file_exists(public_path($user->cv))) {
                        unlink(public_path($user->cv));
                    }
                }
            }

            if (!empty($request->laudo)) {
                $validarLaudo = Validator::make(
                    $request->all(),
                    [
                        'laudo' => 'mimes:pdf,doc,txt',
                    ],
                    [
                        'laudo.mimes' => 'Você precisa enviar o laudo nos formatos TXT, PDF, WORD',
                    ]
                );

                if ($validarLaudo->fails()) {
                    return redirect()->back()->withErrors($validarCV->errors())->withInput($request->all());
                }

                $newNameLaudo = time() . '.' . $request->laudo->getClientOriginalExtension();
                if ($request->laudo->move(public_path('laudo/'), $newNameLaudo)) {
                    $data['laudo'] = 'laudo/' . $newNameLaudo;
                    if (!empty($user->laudo) && file_exists(public_path($user->laudo))) {
                        unlink(public_path($user->laudo));
                    }
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

    public function candidatar($id_vaga)
    {
        try {
            $data['vaga_id'] = $id_vaga;
            $data['usuario_id'] = Auth::guard('usuario')->user()->id;
            Candidatura::create($data);
            return redirect()->back()->with('success', 'Candidatado com sucesso');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }

    public function cancelarCandidatura($id)
    {
        try {
            Candidatura::find($id)->delete();
            return redirect()->back()->with('success', 'Cancelamento Efetuado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar experiencia' . $e->getMessage());
        }
    }
}
