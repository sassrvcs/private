<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $customers = User::with('address')->where('users.id', '!=', 1)->get();
        return $customers;
    }


}
