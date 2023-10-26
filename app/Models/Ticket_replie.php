<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_replie extends Model
{

    use HasFactory;
    Protected $fillable=[
        'replies'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
