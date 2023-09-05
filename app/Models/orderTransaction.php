<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','status',
        'PAYID','ACCEPTANCE','SHASIGN','invoice_id',
        'amount'
    ];
}
