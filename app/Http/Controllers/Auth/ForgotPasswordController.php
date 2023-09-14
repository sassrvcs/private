<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Mail\PasswordReset; // Replace with your own Mail class
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('frontend.auth.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ],[
              'email.exists' => 'Email is not registered.',
          ]);

          $token = Str::random(64);

          if(DB::table('password_resets')->where('email',$request->email))
          {
            DB::table('password_resets')->where('email', $request->email)->delete();
          }
          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

        //   Mail::send('frontend.mail.forgetPassword', ['token' => $token], function($message) use($request){
        //       $message->to($request->email);
        //       $message->subject('Reset Password');
        //   });

        try {
            Mail::to($request->email)->send(new PasswordReset($token));
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with('message', 'There is a problem to send email! please try after some time.');
        }

          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) {
         return view('frontend.auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|min:8|string',
              'password_confirmation' => 'required|same:password'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
