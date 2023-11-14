<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class Purchase_address extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $table = 'purchase_address';
    protected $fillable = [
        'address_type',
        'house_number',
        'street',
        'locality',
        'town',
        'county',
        'post_code',
        'billing_country',
    ];
}
