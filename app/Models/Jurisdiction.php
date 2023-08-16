<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
    use HasFactory;

    public function companie()
    {
        return $this->hasOne(Companie::class, 'jurisdiction_id','id');
    }
}
