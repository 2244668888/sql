<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array',
    ];
    protected $fillable = [
        'category_id', 'product_name', 'quantity', 'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }



}
