<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyEditRequest extends Model
{
    use HasFactory;
    protected $table = 'company_edit_requests';

    protected $fillable = [
        'user_id',
        'payment_order_id',
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
    ];
}
