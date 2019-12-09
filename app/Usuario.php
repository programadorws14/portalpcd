<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'password',
        'email',
        'data_nascimento',
        'sexo',
        'cpf',
        'texto_sobre_voce',
        'telefone_residencial',
        'telefone_comercial',
        'telefone_celular',
        'foto',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
    ];
}
