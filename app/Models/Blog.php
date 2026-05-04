<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;   // <-- ADD THIS LINE

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
        'views_count',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
