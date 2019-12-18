<?php

namespace App\Http\Controllers\Site;

use App\Blog;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;

class HomeController extends Controller
{
    public function index()
    {
        $vagas = Vaga::with('empresa')->wherePausarVaga('')->get();
        $posts = Blog::all();
        return view('site.home.index', compact('vagas', 'posts'));
    }
}
