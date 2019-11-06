<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaBlog extends Model
{
    use SoftDeletes;
    
    protected $table = 'blog_categorias';
    protected $fillable = ['descricao', 'slug'];
}
