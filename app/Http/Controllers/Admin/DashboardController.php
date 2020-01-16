<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Blog;
use App\Empresa;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Usuario;
use App\Vaga;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
        $countEmp = Empresa::select('id')->get();
        $countUsu = Usuario::select('id')->get();
        $countVag = Vaga::select('id')->get();
        $countPos = Blog::select('id')->get();
        $countAdmin = Admin::select('id')->get();
        $countNews = Newsletter::select('id')->get();

        $empresas = Empresa::take(10)->orderBy('id', 'desc')->get();
        $usuarios = Usuario::take(10)->orderBy('id', 'desc')->get();
        $vagas = Vaga::take(10)->orderBy('id', 'desc')->with('empresa', 'candidaturas')->get();

        return view('admin.dashboard.index', compact('countEmp', 'countUsu', 'countVag', 'countPos', 'countAdmin', 'countNews', 'empresas', 'usuarios', 'vagas'));
    }
}
