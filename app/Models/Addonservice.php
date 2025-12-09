<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addonservice extends Model
{
    use HasFactory;
    protected $table = 'add_on_services';
    protected $fillable = [
        'service_name', 'price',
        'short_desc', 'long_desc', 'stripe_product_id', 'stripe_price_id', 'billing_type'
    ];

    /**
     * Define the one-to-many relationship with Feature model
     */
    public function features()
    {
        return $this->hasMany(Feature::class,'service_id');
    }

    /**
     * Define the one-to-many relationship with AddonCartService model
     * @return hasMany
     */
    public function addonCartServices()
    {
        return $this->hasMany(AddonCartService::class, 'service_id');
    }

    public function service_faqs()
    {
        return $this->hasMany(Service_Faq::class, 'service_id');
    }
}
