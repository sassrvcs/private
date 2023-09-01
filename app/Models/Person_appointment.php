<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person_appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Define the inverse of the one-to-many relationship with ShoppingCart model
     * @return belongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    function forwarding_address(){
        return $this->belongsTo(Address::class,'forwarding_address_id','id');
    }
    function own_address(){
        return $this->belongsTo(Address::class,'own_address_id','id');
    }
}
