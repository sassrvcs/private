<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonOfficer extends Model
{
    use HasFactory;
    protected $guarded = [];

    function address(){
        return $this->belongsTo(Address::class,'add_id','id');
    }

    function nationality(){
        return $this->belongsTo(Nationality::class,'nationality','id');
    }
}
