<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'created_by',
        'document_flow_id',
        'document_type',
        'gcs',
        'action_date',
        'account_number',
        'entity_id',
        'entity_name',
        'document_number',
        'physical_address',
        'delivery_address',
        'entity_reference',
        'salesperson_id',
        'due_date',
        'notes',
        'financial_period',
        'courier_id',
        'tracking_number',
        'document_image',
        'total_nett_price',
        'total_excl',
        'total_discount',
        'total_tax',
        'total_amount',
        'is_locked',
        'on_hold',
    ];

    public function createdBy()
    {
        return $this->belongsToMany(User::class);
    }

    public function salesPerson()
    {
        return $this->belongsToMany(User::class);
    }

    public function items()
    {
        $this->hasMany(DocumentItem::class);
    }
}
