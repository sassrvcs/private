<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email','phone_no','address_line1','address_line2','city','state','country','zip','message'
    ];
}
