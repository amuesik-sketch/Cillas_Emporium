<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
      // Tell Laravel the correct table name
    protected $table = 'billings';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        
    ];
}
