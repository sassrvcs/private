<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Contact;
use Validator;

class ContactController extends Controller
{
    public function view()
    {
        $countries = Country::all();
        return view('frontend.contact',compact('countries'));
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|digits_between:8,13',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email',
            'address_line1' => 'required',
            'comment' => 'required',

            ],[
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'address_line1.required' => 'Address line1 is required',
                'comment.required' => 'This field is required.',
            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $contact = new Contact();
            $contact->first_name = $request->first_name;
            $contact->middle_name = $request->middle_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->phone_no = $request->phone;
            $contact->address_line1 = $request->address_line1;
            $contact->address_line2 = $request->address_line2;
            $contact->city = $request->city;
            $contact->state = $request->state;
            $contact->country = $request->country;
            $contact->zip = $request->zip;
            $contact->message = $request->comment;
            $contact->save();

            return redirect()->route('contact.view')->withSuccess('Contact submitted successfully');
        }
    }
}
