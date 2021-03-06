<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaBlog extends Model
{
    use SoftDeletes;
    protected $table = 'categorias';
    protected $fillable = [
        'descricao',
        'slug'
    ];
}
