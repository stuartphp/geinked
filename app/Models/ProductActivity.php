<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductActivity extends Model
{
    use HasFactory;
    protected $table = 'product_activities';
    protected $fillable =[
        'product_id',
        'action_date',
        'document_id',
        'down',
        'up'
    ];
}
