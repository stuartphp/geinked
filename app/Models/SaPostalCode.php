<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaPostalCode extends Model
{
    use HasFactory;
    protected $table = 'sa_postal_codes';
    protected $fillable = [
        'suburb',
        'street_code',
        'postal_code',
        'city',
        'province'
    ];
}
