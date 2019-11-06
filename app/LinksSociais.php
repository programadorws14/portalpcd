<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinksSociais extends Model
{
    use SoftDeletes;
    protected $table = 'links_sociais';
    protected $fillable = ['link', 'empresa_id'];
}
