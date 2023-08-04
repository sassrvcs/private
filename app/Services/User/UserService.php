<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class UserService
{
    const INACTIVE_ERROR_CODE = "This id is inactive. Please contact with admin.";
    const AUTH_ERROR_INACTIVE = "Your account is Inactive.";
    const EMAIL_NOT_REGISTERED = 'This email is not registered with us.';
    const USER_NOT_FOUND = 'User not found.';
    const WRONG_PASSWORD = 'Supplied password is wrong.';
    const OTP_EXPIRED = 'Otp expired.';
    const INVALID_OTP = 'Invalid Otp';
    const EMAIL_NOT_VERIFIED = "Email Not Verified";
    const PASSWORD_RESET_LINK_SENT = "Password Reset Link Send";


    /**
     * Verify Credential
     * @param  string  $email_id
     * @param  string  $password
     * @return array first element User or numeric error code, second element token or null
     */
    public function checkAuth($email_id, $password)
    {
        $user = User::where(['email' => $email_id])->first();
        if (empty($user)) {
            return [UserService::USER_NOT_FOUND, null];
        } elseif (!(Hash::check($password, $user->password))) {
            return [UserService::WRONG_PASSWORD, null];
        } elseif (!$user->email_verified_at) {
            return [UserService::EMAIL_NOT_VERIFIED, null];
        } elseif($user->status == false) {
            return [UserService::INACTIVE_ERROR_CODE, null];
        } elseif (Hash::check($password, $user->password)) {
            $token = $user->createToken($user->email);
            return [$user, $token];
        }
    }


    /**
     * User Details
     * @param int $userId
     * @return Builder
     */
    // public function show($userId)
    // {
    //     $userQuery = User::with('roles')->where('id', $userId);
    //     return $userQuery;
    // }

    public function index($search = "")
    {
        //print_r($search);exit;
        $customers = User::with('address')->where('users.id', '!=', 1);
        if (!empty($search)) {
            $customers = $customers->where('email', 'like', "%{$search}%")
            ->orWhere('forename', 'like', "%{$search}%")
            ->orWhere('surname', 'like', "%{$search}%");
        }
        $customers = $customers->paginate(2);
        //print_r($customers);exit;
        return $customers;
    }

    public function edit($id)
    {
        $customers = User::with('address')->where("id",$id)->first();
        return $customers;
    }

    public function update($request, $id)
    {
        $customer = User::findOrFail($id);
        $customer->forename = $request['forename'];
        $customer->surname = $request['surname'];
        $customer->email = $request['email'];
        $customer->phone_no = $request['phone'];
        $customer->organisation = $request['organisation'];
        $customer->save();

        $address = Address::where('user_id',$id)->first();
        
        if(!empty($request['house_number'])) {
            $address->house_number = $request['house_number']; 
        }
        if(!empty($request['street'])) {
            $address->street = $request['street']; 
        }
        if(!empty($request['locality'])) {
            $address->locality = $request['locality']; 
        }
        if(!empty($request['town'])) {
            $address->town = $request['town']; 
        }
        if(!empty($request['country'])) {
            $address->country = $request['country']; 
        }
        if(!empty($request['postcode'])) {
            $address->post_code = $request['postcode']; 
        }
        $address->save();

        return true;
    }

    public function destroy($id)
    {
        //User::FindOrFail($id)->delete();
        $customer = User::FindOrFail($id)->delete();
        return $customer;
    }


}
