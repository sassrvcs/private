<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonserviceFeature extends Model
{
    use HasFactory;
    protected $table = 'add_on_service_features';
    protected $fillable = [
        'add_on_service_id', 'feature'
    ];

    /**
     * Define the inverse of the one-to-many relationship with Package model
     * @return belongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
