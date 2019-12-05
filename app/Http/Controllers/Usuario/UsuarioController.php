<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('UsuarioAuth');
    }

    public function dashboard()
    {
        return view('usuario.dashboard.index');
    }

}
