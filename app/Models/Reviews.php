<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'review';

    protected $fillable = [
        'first',
        'second',
        'third',
    ];
}
