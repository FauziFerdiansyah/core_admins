@extends('admin.layouts.app')

@section('title_web')Edit User @endsection
@section('title_page')User @endsection
@section('sub_title_page')Formulir ubah data user @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">User</a>
    </li>
    <li class="breadcrumb-item">Ubah data user</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Formulir ubah user</h5>
            <div class="card-header-right btn-head">
                <a href="{{ route('users.index') }}" class="btn waves-effect waves-light btn-primary btn-sm"><i class="ti-back-left"></i> Kembali</a>
            </div>
        </div>
        <div class="card-block">
            <!-- AREA NOTIF -->
            @include('admin.common.notif')

            <form action="{{ route('users.update', $data->id) }}" method="POST" class="form-horizontal">
                <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' form-control-danger' : '' }}"   value="{{ old('name') ?: $data->name }}" autofocus required>
                        @if ($errors->has('name'))
                            <div class="messages mt-1">
                              <p class="text-danger error">{{ $errors->first('name') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Alamat E-mail</label>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" value="{{ old('email') ?: $data->email }}" required>
                        @if ($errors->has('email'))
                            <div class="messages mt-1">
                              <p class="text-danger error">{{ $errors->first('email') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('username') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Username</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="username" class="form-control {{ $errors->has('username') ? ' form-control-danger' : '' }}" value="{{ old('username') ?: $data->username }}" required>

                        @if ($errors->has('username'))
                          <div class="messages mt-1">
                            <p class="text-danger error">{{ $errors->first('username') }}</p>
                          </div>
                        @endif

                        <div class="text-muted small mt-1"><i class="fa fa-info-circle fa-fw"></i> Kolom Hanya boleh diisi <b>tulisan</b>, <b>angka</b> dan <b>garis bawah</b>. contoh : <b>Admin_ke2</b></div>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('status') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Status User</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-radio">
                            <div class="radio radiofill radio-inline">
                                <label>                              
                                    <input type="radio" name="status" @if($data->status == 2) checked="checked" @endif value="2">
                                    <i class="helper"></i>Aktif
                                </label>
                            </div>
                            <div class="radio radiofill radio-inline">
                                <label>
                                    <input type="radio" name="status" @if($data->status == 1) checked="checked" @endif value="1">
                                    <i class="helper"></i>Tidak Aktif
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('status'))
                            <div class="messages mt-1">
                              <p class="text-danger error">{{ $errors->first('status') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="ti-save"></i> Ubah</button>
                    </div>
                </div>
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div> <!-- end card -->
</div>
@endsection
