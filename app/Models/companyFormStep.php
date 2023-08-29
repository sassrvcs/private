<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyFormStep extends Model
{
    use HasFactory;
    protected $fillable = [
        'order', 'order_id',
        'company_id ','section','step',
    ];
}
