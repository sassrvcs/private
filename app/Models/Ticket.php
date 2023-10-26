<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'phone',
        'email',
        'description'
    ];

    public function ticket_replie(){
        return $this->hasMany(Ticket_replie::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
