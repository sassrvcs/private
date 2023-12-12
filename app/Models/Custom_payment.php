<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custom_payment extends Model
{
    use HasFactory;
    protected $table = 'Custom_payment';
    protected $fillable=[
        'name',
        'email',
        'order_id',
        'user_id',
        'status',
        'custom_payment_status',
        'PAYID',
        'ACCEPTANCE',
        'SHASIGN',
        'amount',
        'uuid',
    ];
}
