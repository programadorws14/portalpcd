<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CadUsuarioController extends Controller
{

    public function CadastrarUsuario()
    {
return view('site.usuario.index');
    }
}
