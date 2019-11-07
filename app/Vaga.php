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

    // public function estado()
    // {
    //     return $this->hasMany(Estado::class, 'id', 'estado_id');
    // }

    // public function municipio()
    // {
    //     return $this->hasMany(Municipio::class, 'id', 'municipio_id');
    // }

    // public function user()
    // {
    //     return $this->hasMany(Empresa::class, 'id', 'user_id');
    // }

    // public function profissao()
    // {
    //     return $this->hasMany(profissao::class, 'id', 'profissao_id');
    // }
}
