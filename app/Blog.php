<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $table = 'blog';
    protected $fillable = [
        'capa',
        'titulo',
        'slug',
        'categoria_id',
        'conteudo',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaBlog::class, 'categoria_id');
    }
}
