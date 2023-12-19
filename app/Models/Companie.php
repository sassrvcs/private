<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Companie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id', 'jurisdiction_id',
        'office_address', 'business_address',
        'companie_name', 'companie_type',
        'section_name', 'step_name','order_id',
        'forwarding_registered_office_address',
        'forwarding_business_office_address',
        'legal_document', 'statement'
    ];

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('documents')
    //         ->singleFile();
    //     // Add more collections if needed
    // }

    public function sicCodes()
    {
        return $this->hasMany(SicCode::class, 'companie_id', 'id');
    }

    /**
     * @return hasMany
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function businessBanking()
    {
        return $this->hasOne(BusinessEssential::class, 'companie_id', 'id');
    }

    public function jurisdiction()
    {
        return $this->belongsTo(Jurisdiction::class, 'jurisdiction_id','id');
    }

    public function officeAddressWithoutForwAddress()
    {
        return $this->belongsTo(Address::class, 'office_address','id');
    }


    public function forwAddress()
    {
        return $this->belongsTo(Address::class, 'forwarding_registered_office_address','id');
    }

    public function officeAddressWithForwAddress()
    {
        return $this->belongsTo(Address::class, 'forwarding_registered_office_address','id');
    }

    public function businessAddressWithoutForwAddress()
    {
        return $this->belongsTo(Address::class, 'business_address','id');
    }

    public function businessAddressWithForwAddress()
    {
        return $this->belongsTo(Address::class, 'forwarding_business_office_address','id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'company_name', 'companie_name');
    }
}
