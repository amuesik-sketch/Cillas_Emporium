<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $table = 'usage';

     protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
       ];
}
