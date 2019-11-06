<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'data_abertura',
        'data_vencimento',
        'titulo',
        'status',
        'descricao',
        'estado_id',
        'municipio_id',
        'cep',
        'endereco',
        'beneficios',
        'salario',
        'qtd_vagas',
        'horario',
        'profissao_id',
        'info_adicionais',
        'aprovacao_user_id',
        'info_aprovacao_user_id'
    ];

    public function estado()
    {
        return $this->hasMany(Estado::class, 'id', 'estado_id');
    }

    public function municipio()
    {
        return $this->hasMany(Municipio::class, 'id', 'municipio_id');
    }

    public function user()
    {
        return $this->hasMany(Empresa::class, 'id', 'user_id');
    }

    public function profissao()
    {
        return $this->hasMany(profissao::class, 'id', 'profissao_id');
    }


}
