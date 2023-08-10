<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SicCode extends Model
{
    use HasFactory;
    // protected $table ='sic_codes';
    protected $fillable = [
        'companie_id', 'name', 'code'
    ];

    public function companies()
    {
        return $this->hasMany(Companie::class, 'companie_id', 'id');
    }
}
