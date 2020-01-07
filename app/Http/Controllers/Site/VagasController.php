<?php

namespace App\Http\Controllers\Site;

use App\Candidatura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;
use Illuminate\Support\Facades\Auth;

class VagasController extends Controller
{
    public function show($id)
    {
        $vaga = Vaga::with('empresa')->find($id);
        if (Auth::guard('usuario')->user()) {
            $cadastrado_vaga = Candidatura::whereVagaId($id)->whereUsuarioId(Auth::guard('usuario')->user()->id)->first();
        } else {
            $cadastrado_vaga = null;
        }
        $vagas = Vaga::with('empresa')->wherePausarVaga('')->orderBy('id', 'desc')->take(6)->get();
        return view('site.vaga.vaga_single', compact('vaga', 'vagas', 'cadastrado_vaga'));
    }

    public function vagas()
    {
        $estados_sel = (!empty($_GET['estado']) ? $_GET['estado'] : 0);
        $pesquisa_texto = (!empty($_GET['pesquisa-text']) ? $_GET['pesquisa-text'] : '');

        $vagas = Vaga::with('empresa')->wherePausarVaga('')->when($estados_sel, function ($query, $estados_sel) {
                foreach($estados_sel as $sel){
                $query->whereEstado($sel);
                $query->orWhere('estado', $sel);
                }
        })->when($pesquisa_texto, function ($query, $pesquisa_texto) {
            $query->Where('titulo', 'like', '%' . $pesquisa_texto . '%')->get();
        })->get();

        $estados = Vaga::select('estado')->groupBy('estado')->get();
        return view('site.vaga.vagas', compact('vagas', 'estados', 'estados_sel', 'pesquisa_texto'));
    }
}
