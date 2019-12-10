<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experiencia extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'usuario_id',
        'nome_empresa',
        'cargo',
        'data_inicio',
        'data_termino',
        'cidade',
        'descricao'
    ];
}
