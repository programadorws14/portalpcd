<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'salario_de',
        'salario_ate',
        'pausar_vaga',
        'salario_acombinar',
        'tipo_emprego',
        'numero_vagas',
        'descricao_vaga',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
    ];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }
}
