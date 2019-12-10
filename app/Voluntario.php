<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntario extends Model
{
    use SoftDeletes;
    protected $table = 'voluntarios';
    protected $fillable = [
        'usuario_id',
        'nome_instituicao_voluntario',
        'cargo_voluntario',
        'data_inicio',
        'data_termino',
        'recomendacoes_premiacoes',
        'descricao',
    ];
}
