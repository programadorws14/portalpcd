<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinksSociais;
use App\Usuario;
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
        return view('usuario.dashboard.index', compact('links'));
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
}
