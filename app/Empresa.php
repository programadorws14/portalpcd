<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $guard = 'empresas';

    protected $fillable = [
        'nivel',
        'status',
        'nome',
        'email',
        'password',
        'telefone',
        'cnpj',
        'ramo_atuacao',
        'tamanho_empresa',
        'data_fundacao',
        'especialidades',
        'estado_empresa',
        'site_empresa',
        'nome_url',
        'logo_empresa',
        'descricao',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'aprovado_user_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function links_sociais()
    {
        return $this->hasMany(LinksSociais::class, 'id', 'empresa_id');
    }


}
