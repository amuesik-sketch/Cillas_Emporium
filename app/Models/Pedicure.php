<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedicure extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'name',
        'phone',
        'type',
        'date',
        'time',
        'notes',
    ];
}
