<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Session;
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

    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function data()
    {
      $users = User::select([
          'users.id',
          'users.name',
          'users.username',
          'users.email',
          'users.status',
          'users.created_at',
          'users.updated_at'
        ])
        ->where('users.id', '!=', Auth::user()->id);

      return Datatables::of($users)
        ->editColumn('status', function($users) {
          return status($users->status);
        })
        ->addColumn('actions', function($r_data) {
            $delete_route = route('users.destroy', $r_data->id);
            return '
                <div class="dropdown-primary dropdown">
                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light btn-sm btn-block" type="button" id="drpd_'.$r_data->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-settings"></i> Aksi </button>
                    <div class="dropdown-menu" aria-labelledby="drpd_'.$r_data->id.'" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item waves-light waves-effect btn-datatable-group" href="'.route('users.edit', $r_data->id).'"><i class="ti-pencil-alt"></i> Ubah</a>
                        <a class="dropdown-item waves-light waves-effect btn-datatable-group" href="'.route('users.change_password', $r_data->id).'"><i class="ti-pencil-alt"></i> Ganti Kata Sandi</a>
                        <div class="dropdown-divider"></div>

                        

                        <a class="dropdown-item waves-light waves-effect btn-datatable-group" href="javascript:void(0)" onclick="deleteModal(' . "'" . $delete_route . "','" . $r_data->id . "','" . $r_data->name . "','" . Session::token() . "'" . ')" data-toggle="modal" data-target="#delete_form'.$r_data->id.'"><i class="ti-trash"></i> Hapus Data Ini</a>
                    </div>
                </div>
              <div id="area_modal' . $r_data->id . '"></div>
            ';
        })
        ->make(true);
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
      $input = $request->all();
      $validation = Validator::make($input, User::$rules);
      if ($validation->passes()) {
          $data = User::create(
            [
              'name' => $request->input('name'),
              'username' => $request->input('username'),
              'email' => $request->input('email'),
              'password' => bcrypt($request->input('password')),
              'status' => $request->input('status'),
              'created_by' => Auth::user()->id,
              'updated_by' => Auth::user()->id
          ]);
          if ($data) {
              return redirect()
              ->back()
              ->with('alt_green', $request->input('name') . ' berhasil disimpan.');
          }else{
              return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors($validation->errors());
          }

      }else {
          return redirect()
            ->back()
            ->withInput()
            ->withErrors($validation->errors());
      }
    }

    public function show($id)
    {
      $data = User::select(
          [
            'users.id',
            'users.name',
            'users.email',
            'users.status',
            'users.updated_by',
            'users.created_at',
            'users.updated_at',
            'groups.group_name'
          ]
        )
      ->leftJoin('groups', 'groups.id', '=', 'users.group_id')
      ->where('users.id', $id)
      ->first();
      return view('admin.pages.users.show')->with(compact('data'));
    }

    public function edit($id)
    {
      $data   = User::findOrFail($id);
      return view('admin.pages.users.edit')->with(compact('data'));
    }

    public function update(Request $request, $id)
    {
      $input = $request->all();
      $validation = Validator::make($request->all(), User::rule_edit($id));
      if ($validation->passes()) {
          $data = User::findOrFail($id);
          User::where('id', $data->id)
            ->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'username' => $request->input('username'),
              'status' => $request->input('status'),
              'updated_by' => Auth::user()->id
            ]);

          return redirect()
              ->back()
              ->with('alt_green', $request->input('name') . ' berhasil diubah.');
      }else{
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validation->errors());
      }
    }

    public function destroy($id)
    {
      $data = User::findOrFail($id);
      if($data == null) {
        return redirect()
        ->back()
        ->with('alt_red', 'Maaf data tidak ditemukan.');
      }else if(User::destroy($id)) {
        return redirect()
        ->back()
        ->with('alt_green', $data->email . ' berhasil dihapus.');
      }else {
        return redirect()
        ->back()
        ->with('alt_red', 'Data gagal dihapus.');
      }
    }

    public function change_password($id)
    {
        $data           = User::findOrFail($id);
        return view('admin.pages.users.change_password')->with(compact('data'));
    }
    public function change_password_update(Request $request, $id)
    {
        $rules = array(
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|required_with:password'
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->passes())
        {
            $data   = User::findOrFail($id);
            User::where('id', $id)
                ->update(
                    [
                        'password'      => bcrypt($request->input('password')),
                        'updated_by'    => Auth::user()->id
                    ]);
            return redirect()
                ->route('users.index')
                ->with('alt_green', 'Data berhasil diubah.');
        }else{
            return redirect()
                ->route('users.change_password_update', ['id' => $id])
                ->withInput()
                ->withErrors($validation);
        }
    }


}
