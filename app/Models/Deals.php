<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    
    // Tell Laravel the correct table name
    protected $table = 'deals';

    protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
        'fifth',
        'picture',
        'countdown_until',
    ];
}


