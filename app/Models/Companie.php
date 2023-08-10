<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Companie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id', 'jurisdiction_id',
        'office_address', 'business_address',
        'companie_name', 'companie_type',
        'section_name', 'step_name'
    ];

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('documents')
    //         ->singleFile();
    //     // Add more collections if needed
    // }
}
