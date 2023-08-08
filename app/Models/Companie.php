<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','office_address','jurisdiction_id','business_address','companie_name','companie_type'];
}
