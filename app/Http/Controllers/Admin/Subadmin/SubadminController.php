<?php

namespace App\Http\Controllers\Admin\Subadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Redirect;
use Spatie\Permission\Models\Permission;

class SubadminController extends Controller
{
    public function index(){
        $user = User::role('subadmin')->get();
        return view('admin.sub-admin.index',compact('user'));
    }

    public function create()
    {
        $menu_list = Permission::get();
        return view('admin.sub-admin.create',compact('menu_list'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users',
            'password' => 'required|min:8',

            ],[
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'password.required' => 'Password is required',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = new User();
            $user->forename = $request->first_name;
            $user->surname = $request->last_name;
            $user->phone_no = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole('subadmin');
            $user->syncPermissions($request->menu);
            return redirect()->route('admin.sub-admin.index')->withSuccess('Sub admin added successfully');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.sub-admin.edit', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|digits_between:8,13',

            ],[
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',

            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = User::findOrFail($id);
            $user->forename = $request->first_name;
            $user->surname = $request->last_name;
            $user->phone_no = $request->phone;
            $user->save();
            return redirect()->route('admin.sub-admin.index')->withSuccess('Sub admin updated successfully');
        }
    }

    public function destroy($id){
        $data = User::FindOrFail($id)->delete();
        if($data){
            return 1;
        }else{
            return 0;
        }
    }
}
