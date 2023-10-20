<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use Validator;
use App\Models\User;
use Redirect;

class CustomerController extends Controller
{

    public function __construct(protected UserService $UserService)
    {
        $this->userService = $UserService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $customerlist = $this->userService->index($search);

        return view('admin.customer.index',compact('customerlist','search'));
    }


    /**
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $customerDetails = $this->userService->edit($id);
        return view('admin.customer.edit',compact('customerDetails'));
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'forename' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'house_number' => 'required',
            'street' => 'required',
            'town' => 'required',
            'postcode' => 'required'
            ],[
                'title.required' =>'This title field is required.',
                'forename.required' => 'This forename field is required.',
                'surname.required' => 'This surname field is required.',
                'phone.required' =>'This phone field is required.',
                'email.required' => 'This email field is required.',
                'email.email' => 'This email field should be an valid email type.',
                'house_number.required' => 'This house number field is required.',
                'street.required' => 'This street field is required.',
                'town.required' => 'This town field is required.',
                'postcode.required' => 'This postcode field is required.',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = $this->userService->update($input,$id);
            if($user){
                return Redirect::to("admin/customer")->withSuccess('Customer Details updated');
            }

        }
    }

    public function destroy(string $id)
    {
        $customer = $this->userService->destroy($id);
        if($customer) {
            return 1;
        } else {
            return 0;
        }
    }



}
