<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nail extends Model
{
   protected $fillable = [
    'reference',
    'name',
    'phone',
    'service',
    'date',
    'time',
    'style_image',
    'notes',
];

}

