<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderServiceTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'service_data',
        'service_name',
        'company_name',
        'company_number',
        'service_slug',
        'service_payment_status',
        'PAYID',
        'ACCEPTANCE',
        'SHASIGN',
        'invoice_id',
        'base_amount',
        'vat',
        'amount',
        'step',
        'uuid',
    ];
}
