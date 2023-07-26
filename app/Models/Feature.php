<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id', 'feature'
    ];

    /**
     * Define the inverse of the one-to-many relationship with Package model
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
