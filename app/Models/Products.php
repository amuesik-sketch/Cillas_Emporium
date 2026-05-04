<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // Optional: specify table name if it doesn't follow Laravel pluralization
    // protected $table = 'products';
protected $table = 'products';
    // Allow mass assignment for these columns
    protected $fillable = [
        'picture',
        'first',        // product name/title
        'second',       // product description
        'rating',       // number of stars
        'reviews_count' // number of reviews
    ];
}
