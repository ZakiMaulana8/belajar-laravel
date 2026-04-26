<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image', 'title', 'description', 'price', 'stock', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime', // ganti dari 'timestamp' ke 'datetime'
    ];
}