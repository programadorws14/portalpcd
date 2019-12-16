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

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'vaga_id');
    }

    public function candidato_vaga()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
