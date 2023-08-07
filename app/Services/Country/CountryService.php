<?php

namespace App\Services\Country;

use App\Models\Country;

class CountryService
{
    /**
     * Countries all list
     */
    public function countryList()
    {
        $countries = Country::all();
        return $countries;
    }
}