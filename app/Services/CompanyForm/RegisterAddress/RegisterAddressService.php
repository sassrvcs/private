<?php

namespace App\Services\CompanyForm\RegisterAddress;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;


/**
 * @todo work in progress
 * @note extends BaseService
 */
class RegisterAddressService
{
    public function getRecentAddress($id){
        // dd($id);
        $recent_addr = Address::where('id',$id)->first();

        return $recent_addr;
    }
}
