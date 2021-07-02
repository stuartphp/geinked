<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $table = 'product_options';
    protected $fillable =[
        'product_id',
        'name',
        'weight',
        'length_cm',
        'width_cm',
        'height_cm',
        'unit_id',
        'price',
        'deductable_value',
        'on_hand',
        'special',
        'special_start',
        'special_end',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
