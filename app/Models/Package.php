<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Package extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $fillable = [
        'package_name', 'package_price',
        'short_description', 'description',
        'features', 'faqs', 'notes', 'special_offer'
    ];

    /*
     *Add a method to retrieve the featured image media
     */
    public function getFeaturedImage()
    {
        return $this->getFirstMedia('featured_image');
    }
    public function getImageIcon()
    {
        return $this->getFirstMedia('package_icon');
    }

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
