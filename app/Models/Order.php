<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id','cart_id','order_id','payable_amount',
        'company_number','company_name','auth_code','payment_mode',
        'payment_status', 'order_status','paid_amount',
        'stripe_customer_id', 'stripe_subscription_id', 'stripe_session_id', 'currency', 'payment_intent_id'
    ];

    /**
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return belongsTo
     */
    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }


    public function myCompany()
    {
        return $this->belongsTo(Companie::class, 'company_name', 'companie_name');
    }
    public function getCompanyByOrderId()
    {
        return $this->belongsTo(Companie::class, 'order_id', 'order_id');
    }
    /**
     * @return hasMany
     */
    public function transactions()
    {
        return $this->hasMany(orderTransaction::class,'order_id','order_id');
    }
}
