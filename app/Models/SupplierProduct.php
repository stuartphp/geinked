<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;
    protected $table ='supplier_products';
    protected $fillable = [
        'supplier_id',
        'product_id',
        'code',
        'name',
        'category_id',
        'currency',
        'price',
        'unit_id',
        'min_order_quantity'
    ];
}
