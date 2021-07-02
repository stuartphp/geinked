<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentItem extends Model
{
    use HasFactory;
    protected $table = 'document_items';
    protected $fillable = [
        'document_id',
        'product_id',
        'code',
        'name',
        'unit',
        'quantity',
        'unit_price',
        'tax',
        'price_excl',
        'total',
        'is_service',
    ];

    public function document()
    {
        return $this->belongsToMany(Document::class);
    }
}
