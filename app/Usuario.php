<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

    public function experiencias()
    {
        return $this->hasMany(Experiencia::class, 'usuario_id', 'id');
    }

    public function formacoes()
    {
        return $this->hasMany(Formacao::class, 'usuario_id', 'id');
    }

    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class, 'usuario_id', 'id');
    }
}
