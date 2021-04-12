<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'name',
        'slug',
        'short_description',
        'long_description',
        'category_id',
        'sku',
        'stock_status',
        'on_hand',
        'image',
        'images',
        'unit',
        'regular_price',
        'special_price',
        'special_start',
        'special_end',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}
