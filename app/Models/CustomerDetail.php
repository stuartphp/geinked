<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;
    protected $table ='customer_details';
    protected $fillable = [
        'user_id',
        'account_number',
        'ps1970',
        'address_1',
        'address_2',
        'suburb',
        'city',
        'province',
        'postal_code',
        'delivery_group',
        'cart',
        'wish_list',
        'is_newsletter',
        'is_sms',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
