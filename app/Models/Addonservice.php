<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addonservice extends Model
{
    protected $table = 'add_on_services';
    protected $fillable = [
        'service_name', 'price',
        'short_desc', 'long_desc'
    ];

    /**
     * Define the one-to-many relationship with Feature model
     */
    public function features()
    {
        return $this->hasMany(Feature::class,'service_id');
    }
}
