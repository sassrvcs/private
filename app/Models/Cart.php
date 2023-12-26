<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'service_name',
        'slug',
        'address_id',
        'forward_address_id',
        'price',
        'effective_date',
        'vat',
        'company_account_value',
        'appointment_id',
        'data',
        'add_on_service',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
