<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $input = $request->all();
        $rules   = array(
          'email' => 'required|email'
        );
        $rule_message   = array(
          'email.required' => 'Silahkan isi field email'
        );
        $validation = Validator::make($input, $rules, $rule_message);
        if ($validation->passes()) {
          $user = User::where('email', '=', $request->input('email'))->first();
          if ($user == null) {
            return redirect()
              ->back()
              ->withInput()
              ->withErrors(
                  ['email' => 'Email anda tidak terdaftar']
              );
          }else{
            $password_reset   = PasswordReset::where('email', '=', $request->input('email'))->first();
            if($password_reset == null) {
              $data_password_reset = PasswordReset::create([
                'email' => $request->input('email'),
                'token' => sha1($request->input('email').date('ymdhis')),
              ]);
              Mail::to($request->input('email'))->queue(new ResetPasswordMail([
                'actionUrl' => url('/password/reset/'.$data_password_reset->token.''),
                'data' => $user
              ]));

              return redirect()
                ->back()
                ->with('info', 'Kami telah mengirimkan email untuk reset kata sandi Anda!');
            }else {
              $data_password_reset = PasswordReset::where('email', $request->input('email'))->update([
                'email' => $request->input('email'),
                'token' => sha1($request->input('email').date('ymdhis')),
              ]);
              Mail::to($request->input('email'))->queue(new ResetPasswordMail([
                'actionUrl' => url('/password/reset/'.$data_password_reset->token.''),
                'data' => $user
              ]));
              return redirect()
                ->back()
                ->with('info', 'Kami telah mengirimkan email untuk reset kata sandi Anda!');
            }


          }
        }else {
          return redirect()
            ->back()
            ->withInput()
            ->withErrors($validation->errors());
        }


    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

}
