<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Accounting extends Model
{
    //use HasFactory, SoftDeletes;
    protected $fillable = [
        'accounting_software_name', 'image',
        'short_desc', 'long_desc',
        
    ];
    
}
