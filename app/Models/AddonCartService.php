<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonCartService extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'service_id'
    ];

    /**
     * Define the inverse of the one-to-many relationship with ShoppingCart model
     * @return belongsTo
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id', 'id');
    }

    /**
     * Define the many-to-one relationship with Service model
     * @return belongsTo
     */
    public function service()
    {
        return $this->belongsTo(Addonservice::class, 'service_id');
    }
}
