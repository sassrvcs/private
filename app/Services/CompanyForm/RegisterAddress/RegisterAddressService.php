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
    public function getRecentAddress(){

        $recent_addr = User::with('address')->where('id',auth::user()->id)->get();
        return $recent_addr;
    }
}
