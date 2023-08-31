<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'package_id', 'quantity', 'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Define the one-to-many relationship with AddonCartService model
     * @return hasMany
     */
    public function addonCartServices()
    {
        return $this->hasMany(AddonCartService::class, 'cart_id', 'id');
    }
}
