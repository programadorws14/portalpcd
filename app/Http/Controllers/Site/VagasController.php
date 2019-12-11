<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;

class VagasController extends Controller
{
    public function show($id)
    {
        $vaga = Vaga::with('empresa')->find($id);
        $vagas = Vaga::with('empresa')->wherePausarVaga('')->get();
        return view('site.vaga.vaga_single', compact('vaga', 'vagas'));
    }

    public function vagas()
    {
        return view('site.vaga.vagas');
    }
}
