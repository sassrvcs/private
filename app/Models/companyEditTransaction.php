<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyEditTransaction extends Model
{
    use HasFactory;

    public function companyEditRequests()
    {
        return $this->hasMany(companyEditRequest::class,'payment_order_id','order_id');
    }
    
}
