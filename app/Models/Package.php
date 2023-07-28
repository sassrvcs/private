<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
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

    /**
     * Define the one-to-many relationship with Faq model
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
