<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Empresa;
use App\Estado;
use App\Http\Controllers\Controller;
use App\Municipio;
use Exception;
use Illuminate\Support\Facades\Auth;


class GerenciarEmpresasController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.gerenciar_empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('admin.gerenciar_empresa.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $data['nome_url'] = $this->slug($data['nome']);
            $data['password'] = bcrypt($data['password']);

            if (!empty($request->logo_empresa)) {
                $newName = time() . '.' . $request->logo_empresa->getClientOriginalExtension();
                if ($request->logo_empresa->move(public_path('img_empresas/logotipo/'), $newName)) {
                    $data['logo_empresa'] = 'img_empresas/logotipo/' . $newName;
                }
            }
            Empresa::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('admin.gerenciar_empresa.edit', compact('empresa'));
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token', '_method');
            $data['nome_url'] = $this->slug($data['nome']);
            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            if (!empty($request->logo_empresa)) {
                $newName = time() . '.' . $request->logo_empresa->getClientOriginalExtension();
                if ($request->logo_empresa->move(public_path('img_empresas/logotipo/'), $newName)) {
                    $data['logo_empresa'] = 'img_empresas/logotipo/' . $newName;
                }
            }
            Empresa::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar' . $e->getMessage());
        }
    }

    private function slug($string)
    {
        $string = preg_replace('/[\t\n]/', ' ', $string);
        $string = preg_replace('/\s{2,}/', ' ', $string);
        $list = array(
            'Š' => 'S',
            'š' => 's',
            'Đ' => 'Dj',
            'đ' => 'dj',
            'Ž' => 'Z',
            'ž' => 'z',
            'Č' => 'C',
            'č' => 'c',
            'Ć' => 'C',
            'ć' => 'c',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
            'Ŕ' => 'R',
            'ŕ' => 'r',
            '/' => '-',
            ' ' => '-',
            ',' => '-',
            '.' => '-',
            "'" => '-',
            ';' => '',
            '"' => '',
            '!' => '',
            '?' => '',
            'º' => 'o',
            'ª' => 'a',
            '\'' => '',
            '(' => '',
            ')' => '',
            'R$' => '',
            '|' => '',
            '%' => '',
            '¨' => '',
            '&' => '',
            '*' => '',
            '@' => '',
            '=' => '',
            '+' => '',
        );

        $string = strtr($string, $list);
        $string = preg_replace('/-{2,}/', '-', $string);
        $string = strtolower($string);

        return $string;
    }
}
