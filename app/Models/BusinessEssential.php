<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessEssential extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'companie_id', 'business_banking_id', 'business_service_id',
    ];
}
