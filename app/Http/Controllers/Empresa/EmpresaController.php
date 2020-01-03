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
        $vagas = Vaga::whereEmpresaId(Auth::guard('empresa')->user()->id)->with('candidaturas')->paginate(15);
        $links = LinksSociais::whereEmpresaId(Auth::guard('empresa')->user()->id)->get();

        return view('empresa.dashboard.index', compact('ramos', 'links', 'vagas'));
    }

    public function StoreProfile(request $request)
    {
        try {
            $data = $request->except('_token', 'links_social');
            $data['nome_url'] = $this->slug($data['nome']);

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

            if (!in_array("", $request->links_social)) {

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



    /**PRIVATE */
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
