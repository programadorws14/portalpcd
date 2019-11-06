<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\CategoriaBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostBlog;
use Exception;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $posts = PostBlog::with('categoria', 'autor')->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $usuarios = Admin::select('id', 'nome')->get();
        $categorias = CategoriaBlog::select('id', 'descricao')->get();
        return view('admin.blog.posts.create', compact('usuarios', 'categorias'));
    }

    public function store(request $request)
    {
        try {
            $data = $request->except('_token', 'capa');
            $data['data_publicacao'] = Carbon::parse($data['data_publicacao'])->format('Y-m-d H:i:s');

            if (!empty($request->capa)) {
                $newName = time() . '.' . $request->capa->getClientOriginalExtension();
                if ($request->capa->move(public_path('posts/capa/'), $newName)) {
                    $data['capa'] = 'posts/capa/' . $newName;
                }
            }
            PostBlog::create($data);
            return redirect()->back()->with('success', 'Cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $edit = PostBlog::find($id);
        $usuarios = Admin::select('id', 'nome')->get();
        $categorias = CategoriaBlog::select('id', 'descricao')->get();
        return view('admin.blog.posts.edit', compact('edit', 'usuarios', 'categorias'));
    }

    public function update(request $request)
    {
        try {

            $data = $request->except('_token', '_method', 'capa');
            $data['data_publicacao'] = Carbon::parse($data['data_publicacao'])->format('Y-m-d H:i:s');

            if (!empty($request->capa)) {
                $newName = time() . '.' . $request->capa->getClientOriginalExtension();
                if ($request->capa->move(public_path('posts/capa/'), $newName)) {
                    $edit = PostBlog::find($data['id']);
                    unlink(public_path($edit->capa));
                    $data['capa'] = 'posts/capa/' . $newName;
                }
            }
            PostBlog::whereId($data['id'])->update($data);
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $post = PostBlog::find($id);
            if (!empty($post->capa)) {
                unlink(public_path($post->capa));
            }
            $post->delete();
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
