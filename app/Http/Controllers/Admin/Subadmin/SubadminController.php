<?php

namespace App\Http\Controllers\Admin\Subadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Redirect;
use Spatie\Permission\Models\Permission;
use DB;

class SubadminController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if(!empty($search)){
            $users = User::where('email', 'like', "%{$search}%")
                            ->orWhere('forename', 'like', "%{$search}%")
                            ->orWhere('surname', 'like', "%{$search}%")
                            ->orWhere(DB::raw('CONCAT_WS(" ", forename, surname)'), 'like', "%{$search}%")
                            ->orWhere('phone_no', 'like', "%{$search}%")
                            ->paginate(10);
        }else{
            $users = User::role('subadmin')->paginate(10);
        }
        return view('admin.sub-admin.index',compact('users','search'));
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
            $user->givePermissionTo($request->menu);
            return redirect()->route('admin.sub-admin.index')->withSuccess('Sub admin added successfully');
        }
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $permission_names = $user->getPermissionNames()->toArray();
        $menu_list = Permission::get();
        return view('admin.sub-admin.edit', compact('user','menu_list','permission_names'));
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
            $user->syncPermissions($request->menu);
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
