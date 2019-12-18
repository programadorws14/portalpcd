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

    public function store(request $request)
    {
        try {
            $data = $request->except('_token', 'capa');
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
