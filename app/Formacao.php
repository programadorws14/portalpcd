<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formacao extends Model
{
    use SoftDeletes;
    protected $table = 'formacoes';
    protected $fillable = [
        'usuario_id',
        'nome_instituicao',
        'formacao',
        'data_inicio',
        'data_termino',
        'descricao_formacao',
        'recomendacoes_premiacoes',
    ];
}
