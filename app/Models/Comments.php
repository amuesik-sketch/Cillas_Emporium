<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;   // <-- IMPORTANT: Import the Blog model

class Comments extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'blog_id',
        'name',
        'comment',
    ];

    // Relationship: each comment belongs to a blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
