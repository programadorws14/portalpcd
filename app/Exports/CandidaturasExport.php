<?php

namespace App\Exports;

use App\Candidatura;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CandidaturasExport implements FromView
{

    public function __construct($id_vaga)
    {
        $this->id_vaga = $id_vaga;
    }

    public function view(): View
    {
        if (!is_null($this->id_vaga)) {
            $candidaturas = Candidatura::whereVagaId($this->id_vaga)->with('candidato_vaga', 'vaga')->get();
        } else {
            $candidaturas = Candidatura::with('candidato_vaga', 'vaga')->get();
        }
        return view('empresa.vagas.exportar_candidaturas_excel', compact('candidaturas'));
    }
}
