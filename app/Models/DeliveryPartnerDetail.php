<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPartnerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','order_desc','recipient_name','recipient_email','regulated_body','dob','residential_address','relation','referrer_name','referring','contact_name','contact_email','contact_phone','contact_mobile','contact_calltime','contact_address'
    ];
}
