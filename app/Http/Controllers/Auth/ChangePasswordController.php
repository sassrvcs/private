<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct(protected UserService $userService)
    { }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auth.change-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChangePasswordRequest $request)
    {
        //
            
     
            $old_password = auth()->user()->password;
            $email_id = auth()->user()->email;

     
           if (Hash::check($request->old_password, $old_password) ) {

                if (!Hash::check($request->new_password, $old_password)) {
                    $user = $this->userService->updatePassword($email_id, $request->new_password);
                    if($user === UserService::USER_NOT_FOUND) {
                        return redirect()->back()->with('error', UserService::USER_NOT_FOUND);
                    } else {
                        session()->flash('success', 'Password updated successfully');
                        return back();
                    }
                } else {
                    return redirect()->back()->with('error', 'New password can not be the old password!');
                }

            } elseif($request->new_password != $request->confirm_password){
                return redirect()->back()->with('error', 'New password doesn`t match confirm password!');
            } else {
                return redirect()->back()->with('error', 'Old password doesn\'t match!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //dd($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
