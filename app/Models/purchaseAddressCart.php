<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseAddressCart extends Model
{
    use HasFactory;
    protected $table="purchase_address_cart";
    protected $fillable = [
        'order_id',
        'address_type',
        'appointment_id',
        'price',
        'qnt',
    ];
}
