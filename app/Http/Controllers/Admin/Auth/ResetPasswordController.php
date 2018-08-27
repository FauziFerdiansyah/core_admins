<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\PasswordReset;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null)
    {
      $check_url   = PasswordReset::where('token', '=', $token)->count();
      if($check_url > 0){
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
      }else{
        return redirect()->guest('/password/reset')
          ->with('error', 'Maaf URL sudah tidak bisa digunakan.');
      }
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
      $input = $request->all();
      $rules   = array(
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
      );
      $rule_message   = array(
        'email.required' => 'Silahkan isi field email',
        'password.required' => 'Silahkan isi field password',
      );
      $validation = Validator::make($input, $rules, $rule_message);
      if ($validation->passes()) {
        $password_reset   = PasswordReset::where('email', '=', $request->input('email'))->first();
        if($password_reset == null) {
          return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Maaf email Anda salah, silahkan cek kembali.');
        }else {
          $update_data = Customer::where('email', $request->input('email'))
            ->update([
                'password'   => bcrypt($request->input('password')),
                'updated_by' => $request->input('email'),
                'updated_ip' => $request->ip()
              ]);
          if ($update_data) {
            PasswordReset::where('email', '=', $request->input('email'))->delete();
            return redirect()->guest('/login')
              ->with('info', 'Password telah diubah silahkan untuk login.');
          }else{
            return redirect()
              ->back()
              ->withInput()
              ->with('error', 'Maaf proses ubah password gagal. Silahkan coba kembali.');
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
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Get the notification message.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\MessageBuilder
     */
    public function message($notifiable)
    {
        return $this->line('Anda menerima email ini karena kami menerima permintaan setel ulang sandi untuk akun Anda. Klik tombol di bawah ini untuk mereset kata sandi Anda:')
                    ->action('Reset Kata Sandi', url('password/reset', $this->token).'?email='.urlencode($notifiable->email))
                    ->line('Jika Anda tidak meminta penyetelan ulang kata sandi, tidak diperlukan tindakan lebih lanjut.');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
