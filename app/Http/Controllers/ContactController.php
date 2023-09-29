<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
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
            'g-recaptcha-response' => 'required|captcha',
            'first_name' => 'required',
            'last_name' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => [
                'required',
                'numeric',
                'digits:10',
                'digits_between:8,13',
                function ($attribute, $value, $fail) {
                    $startsWith = '0'; // Specify the value you want to exclude as the starting characters
                    if (strpos($value, $startsWith) === 0) {
                        $fail($attribute . ' cannot start with ' . $startsWith);
                    }
                },
            ],
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email',
            'address_line1' => 'required',
            'comment' => 'required|string|min:1|max:150',

            ],[
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Please enter valid phone number.',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide valid email',
                'address_line1.required' => 'Address line1 is required',
                'comment.required' => 'This field is required.',
                'state.required'=>'State field is required',
                'city.required'=>'City field is required',
                'zip.required'=>'Zip field is required',
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

            $contactDetails = $contact;

            $country_name = Country::where('id', $request->country)->pluck('name')->first();
            // return view('frontend.mail.contactMailBlade',compact('contactDetails','country_name'));
            try {
                Mail::to('contact@formationshunt.co.uk')->send(new ContactMail($contactDetails,$country_name));
            } catch (\Throwable $th) {
                //throw $th;
            }
            return redirect()->route('contact.view')->withSuccess('Contact details submitted successfully');
        }
    }
}
