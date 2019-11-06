<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissao extends Model
{
    use SoftDeletes;

    protected $table = 'profissoes';
    protected $fillable = ['descricao', 'status'];
}
