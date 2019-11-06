<?php

namespace App\Http\Controllers\Admin;

use App\CategoriaBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoriaBlogController extends Controller
{
    public function index()
    {   
        $categorias = CategoriaBlog::all();
        return view('admin.blog.categoria.index', compact('categorias'));
    }

    public function store(request $request)
    {
        try {
            $data = $request->except('_token');
            $data['slug'] = $this->slug($data['descricao']);
            CategoriaBlog::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $categorias = CategoriaBlog::all();
            $edit = CategoriaBlog::find($id);
            return view('admin.blog.categoria.edit', compact('edit', 'categorias'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function update(request $request)
    {       
        try {
            $data = $request->except('_token', '_method');
            $data['slug'] = $this->slug($data['descricao']);
            CategoriaBlog::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            CategoriaBlog::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
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
