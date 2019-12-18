<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use SoftDeletes;
    protected $table = 'newsletters';
    protected $fillable = [
        'nome',
        'email',
    ];
}
