<?php

namespace App\Services\Facility;

// use App\Models\Addonservice;

use App\Models\Facility;

class FacilityService
{
    const NO_RESPONSE = 'Please try again.';
    
    /**
     * Get all features list
     */
    public function getFacilitys()
    {
        $facilitysList = Facility::get();
        // dd($facilitysList);

        return $facilitysList;
    }
}