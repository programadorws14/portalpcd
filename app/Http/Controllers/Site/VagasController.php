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
        $estados_sel = (!empty($_GET['estado']) && !in_array('', $_GET['estado']) ? $_GET['estado'] : null);
        $pesquisa_texto = (!empty($_GET['pesquisa-text']) ? $_GET['pesquisa-text'] : null);

        $vagas = Vaga::with('empresa')->Where(function ($query) use ($estados_sel, $pesquisa_texto) {
            $query->wherePausarVaga('');

            if (!is_null($pesquisa_texto)) {
                $query->where('titulo', 'like', '%' . $pesquisa_texto . '%');
            }

            if (!is_null($estados_sel)) {
                foreach ($estados_sel as $sel) {
                    $query->whereIn('estado', $estados_sel);
                }
            }
        })->take(5)->get();

        $estados = Vaga::select('estado')->groupBy('estado')->get();
        return view('site.vaga.vagas', compact('vagas', 'estados', 'estados_sel', 'pesquisa_texto'));
    }
}
