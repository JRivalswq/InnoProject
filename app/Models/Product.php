<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public static function showAll()
    {
        return Product::all();
    }
}
