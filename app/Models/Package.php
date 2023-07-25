<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name', 'package_price',
        'short_description', 'description',
        'features', 'faqs', 'notes'
    ];

    /**
     * Define the one-to-many relationship with Feature model
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
