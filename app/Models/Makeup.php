<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makeup extends Model
{
    protected $fillable = [
        'reference',
        'name',
        'phone',
        'email',
        'location',
        'makeup_type',
        'event_type',
        'event_date',
        'event_time',
        'faces',
        'style_image',
        'notes',
         ];
}
