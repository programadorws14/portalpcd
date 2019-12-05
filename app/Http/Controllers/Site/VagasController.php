<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;

class VagasController extends Controller
{
    public function index()
    {   
        return 'teste';
    }

    public function show($id)
    {
        $vaga = Vaga::with('empresa')->find($id);
        return view('site.vaga.vaga_single', compact('vaga'));
    }


}
