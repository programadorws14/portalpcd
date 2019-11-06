<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostBlog extends Model
{   
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['capa', 'titulo', 'conteudo', 'data_publicacao', 'categoria_id', 'autor_id'];

    public function categoria()
    {
        return $this->hasMany(CategoriaBlog::class, 'id', 'categoria_id');
    }

    public function autor()
    {
        return $this->hasMany(Admin::class, 'id', 'autor_id');
    }
}
