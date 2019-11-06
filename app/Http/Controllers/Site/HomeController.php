<?php

namespace App\Http\Controllers\Site;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;

class HomeController extends Controller
{
    public function index()
    {

        $empresas = Empresa::whereStatus(1)->get();
        dd($empresas);
        
        return view('site.home.index', compact('empresas'));
    }
}
