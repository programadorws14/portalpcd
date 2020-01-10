<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Blog;
use App\CategoriaBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostBlog;
use Exception;
use Illuminate\Support\Carbon;

class GerenciarBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $posts = Blog::with('categoria')->get();
        return view('admin.gerenciar_blog.index', compact('posts'));
    }

    public function create()
    {
        $usuarios = Admin::select('id', 'nome')->get();
        $categorias = CategoriaBlog::select('id', 'descricao')->get();
        return view('admin.gerenciar_blog.posts.create', compact('usuarios', 'categorias'));
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


    public function store(request $request)
    {
        try {
            $data = $request->except('_token', 'capa');
            $data['slug'] = $this->slug($data['titulo']);
            if (!empty($request->capa)) {
                $newName = time() . '.' . $request->capa->getClientOriginalExtension();
                if ($request->capa->move(public_path('posts/capa/'), $newName)) {
                    $data['capa'] = 'posts/capa/' . $newName;
                }
            }
            Blog::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $edit = Blog::find($id);
        $categorias = CategoriaBlog::select('id', 'descricao')->get();
        return view('admin.gerenciar_blog.posts.edit', compact('edit', 'categorias'));
    }

    public function update(request $request)
    {
        try {
            $data = $request->except('_token', '_method', 'capa');

            if (!empty($request->capa)) {
                $newName = time() . '.' . $request->capa->getClientOriginalExtension();
                if ($request->capa->move(public_path('posts/capa/'), $newName)) {
                    $edit = Blog::find($data['id']);
                    unlink(public_path($edit->capa));
                    $data['capa'] = 'posts/capa/' . $newName;
                }
            }
            Blog::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $post = Blog::find($id);
            if (!empty($post->capa)) {
                unlink(public_path($post->capa));
            }
            $post->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
