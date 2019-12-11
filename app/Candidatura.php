<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidatura extends Model
{   
    use SoftDeletes;
    protected $table = 'candidaturas';
    protected $fillable = [
        'vaga_id',
        'usuario_id'
    ];
}
