<?php

namespace App\Services\User;

use App\Models\DeviceToken;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    // public function __construct(protected AgentService $agentService)
    // { }

    /**
     * User Listing
     * @param array $filter
     * @param array $role
     * @return Builder
     *
    */
    public function index($filter = [], $role = [], $perPage = 0)
    {   
        $userQuery = User::with('roles');

        if (!empty($filter['email'])) {
            $userQuery->where('email', 'like', "%{$filter['email']}%");
        }

        if (!empty($role)) {
            $userQuery->whereRelation('roles', 'name', $role);
        }

        return $userQuery;
    }

    /**
     * Verify Credential
     * @param  string  $email_id
     * @param  string  $password
     * @return array first element User or numeric error code, second element token or null
     */
    public function checkAuth($email_id, $password)
    {
        $user = User::with('roles')->where(['email' => $email_id])->first();
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
     * Store user and assig role as per need
     * @param array $userData
     * @param string $role
     * @param bool $beAgent
     * @return $user
     */
    public function storeUser($userData, $role)
    {
        return DB::transaction(function () use ($userData, $role) {
            // Create user as per request validate data
            $userData['email_verified_at'] = now();
            $userData['password'] = Hash::make('Password@01');
            $userData['status']   = true;

            $user = User::create($userData);

            // Assign role as per request role 
            $user->assignRole($role);

            return $user;
        });
    }

    /**
     * Verify Password.
     * @param  int  $user_id
     * @param  string  $password
     * @return Response
     */
    public function updatePassword($email_id, $password)
    {
        $user = User::with('roles')->where('email', $email_id)->first();
        // dd($user->roles[0]->name);
        if ($user != null ) {

            $user->password = Hash::make($password);
            $user->save();

            return $user;
        } else {
            return UserService::USER_NOT_FOUND;
        }
    }

    /**
     * User Details
     * @param int $userId
     * @return Builder
     */
    public function show($userId)
    {
        $userQuery = User::with('roles', 'media')->where('id', $userId);
        return $userQuery;
    }

    /**
     * User Details via email
     * @param int $userId
     * @return Builder
     */
    public function showUser($email_id)
    {
        $userQuery = User::with('roles', 'media')->where('email', $email_id);
        return $userQuery;
    }

    /**
     * Destroy auth or logout
     * @param User $user
     */
    public function destroyAuth(User $user)
    {
        $user->user()->currentAccessToken()->delete();
    }

    public function destroyAllTokens(User $user)
    {
        $user->tokens()->delete();
        Log::notice("exited 1");
    }

    /**
     * Update user status active/deactive
     * @param array $userData
     * @param int $userId
     * @return User status
     */
    public function changeStatus(array $userData, $userId)
    {
        try {
            $user = User::findOrFail($userId);
            
            $user['status'] = $userData['status'];
            $user->save();

            return $user->status;

        } catch (ModelNotFoundException $e) {
            return UserService::USER_NOT_FOUND;
        }
    }

    /**
     * Destroy or delete user as per user ID
     * @param string $id
     * @return bool
     */
    public function destroyUser($id)
    {
        $user = User::find($id); 
        return $user->delete();
    }

    /**
     * Store device token as per userID
     * @param array $request
     * @return bool
     */
    public function storeDeviceToken($userId, $deviceToken)
    {
        return DB::transaction(function () use ($userId, $deviceToken) {
            
            $deviceTokenModel = new DeviceToken();
            $deviceTokenModel->user_id = $userId;
            $deviceTokenModel->device_token = $deviceToken;
            $deviceTokenModel->save();

            return true;
        });
    }
}
