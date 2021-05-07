<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'user_id',
        'account_number',
        'api_token',
        'company_name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'area',
        'city',
        'province',
        'postal_code',
        'ps1970',
        'facebook_id',
        'twitter_id',
        'delivery_group',
        'newsletter',
        'is_sms',
        'is_getinked',
        'is_active'
    ];
}
