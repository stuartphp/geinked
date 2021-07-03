<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'code',
        'name',
        'short_description',
        'description',
        'slug',
        'keywords',
        'category_id',
        'category_parent_id',
        'unit_id',
        'cost',
        'on_hand',
        'main_image',
        'min_order_quantity',
        'viewed',
        'expire',
        'is_service',
        'is_feature',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class)->where('is_approved', 1);
    }
}
