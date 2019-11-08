<?php

namespace App\Http\Controllers\Site;

use App\Empresa;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profissao;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadEmpresaController extends Controller
{

    public function store(request $request)
    {
        $data = $request->except('_token', 'logo');
        $data['nome_url'] = $this->slug($data['nome']);

        $login['email'] = $data['email'];
        $login['password'] = $data['password'];
        $data['password'] = bcrypt($data['password']);

        try {
            Empresa::create($data);
            $empresa = Empresa::whereEmail($data['email'])->first();
            if (Auth::guard('empresa')->check() || $empresa && Hash::check($login['password'], $empresa->password)) {
                Auth::guard('empresa')->attempt($login);
                return redirect()->route('empresa.dashboard');
            } else {
                return redirect()->route('empresa.login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
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
