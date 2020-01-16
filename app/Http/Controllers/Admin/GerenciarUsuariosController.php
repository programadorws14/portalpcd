<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Exception;
use Illuminate\Support\Facades\Validator;

class GerenciarUsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.gerenciar_usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.gerenciar_usuario.create');
    }

    public function store(request $request)
    {



        try {
            $data = $request->except('_token', 'cv', 'laudo');
            $data['password'] = bcrypt($data['password']);

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
                }
            }

            Usuario::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao Criar' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $usuario = Usuario::find($id);
            return view('admin.gerenciar_usuario.edit', compact('usuario'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token', '_method');
            $user = Usuario::find($data['id']);

            $data['password'] = bcrypt($data['password']);

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

            if ($data['password']) {
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
            Usuario::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function deletar($id)
    {
        try {
            Usuario::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar' . $e->getMessage());
        }
    }
}
