<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'brand',
        'release_date',
        'price',
        'image',
    ];

    public static function showAll()
    {
        return Product::all();
    }
}
