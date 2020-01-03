<?php

namespace App\Exports;

use App\Candidatura;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CandidaturasExport implements FromView
{
    public function view(): View
    {
        $candidaturas = Candidatura::with('candidato_vaga', 'vaga')->get();
        
        return view('empresa.vagas.exportar_candidaturas_excel', compact('candidaturas'));
    }
}
