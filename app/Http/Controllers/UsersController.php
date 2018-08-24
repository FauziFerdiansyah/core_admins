<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Validator;
use DB;
use App\User;
use Yajra\Datatables\Datatables;
class UsersController extends Controller
{
    public function __construct()
    {

    }

    public function profile(Request $request)
    {
        return view('pages.users.profile');
    }

    public function profile_edit(Request $request)
    {
        if($request->isMethod('post'))
        {
            $id                 = Auth::user()->id;
            $request->id        = Auth::user()->id;
            $request->name      = $request->input('name');
            $request->email     = $request->input('email');
            $request->username  = $request->input('username');
            $rule_message       = [
                'email.required' => 'Email tidak boleh kosong'
            ];
            $validation = Validator::make($request->all(), User::rule_edit($id), $rule_message);
            if ($validation->passes())
            {
                $data   = User::findOrFail(Auth::user()->id);
                User::where('id', $data->id)
                    ->update(
                        [
                            'name'          => $request->input('name'),
                            'email'         => $request->input('email'),
                            'username'      => $request->input('username'),
                            'updated_by'    => Auth::user()->id
                        ]);
                return redirect()
                    ->route('user_profile_edit')
                    ->with('alt_green', 'Data has been saved.');

            }else{
                return redirect()
                    ->route('user_profile_edit')
                    ->withInput()
                    ->withErrors($validation);
            }
        }
        return view('pages.users.profile_edit');
    }

    public function change_password(Request $request)
    {
        if($request->isMethod('post'))
        {

            $rules = array(
                'current_password'      => 'required',
                'password'              => 'required|min:6|confirmed|different:current_password',
                'password_confirmation' => 'required|required_with:password'
            );
            $validation = Validator::make($request->all(), $rules);
            if ($validation->passes())
            {
                if(Hash::check($request->input('current_password'), Auth::user()->password))
                {

                    $data   = User::findOrFail(Auth::user()->id);
                    User::where('id', Auth::user()->id)
                        ->update(
                            [
                                'password'      => bcrypt($request->input('password')),
                                'updated_by'    => Auth::user()->id,
                                'updated_by_ip' => $_SERVER['REMOTE_ADDR']
                            ]);
                    return redirect()
                        ->route('user_profile')
                        ->with('alt_green', 'Data has been saved.');
                }else{
                    return redirect()
                        ->route('user_change_password')
                        ->withInput()
                        ->with('alt_red', 'Current password not match.')
                        ->withErrors($validation);
                }


            }else{
                return redirect()
                    ->route('user_change_password')
                    ->withInput()
                    ->withErrors($validation);
            }
        }
        return view('pages.backend.users.admin_change_password');
    }

}
