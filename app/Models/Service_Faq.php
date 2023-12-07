<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Faq extends Model
{
    use HasFactory;
    protected $table = 'service_faqs';
    protected $fillable = [
        'service_id',
        'question',
        'answer',
    ];
}
