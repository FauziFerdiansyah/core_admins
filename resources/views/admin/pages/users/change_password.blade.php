@extends('admin.layouts.app')

@section('title_web')Change Password User @endsection
@section('title_page')User @endsection
@section('sub_title_page')Formulir ubah kata sandi @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('auth_profile') }}">User</a>
    </li>
    <li class="breadcrumb-item">Ubah Kata Sandi</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Formulir ubah kata sandi</h5>
            <div class="card-header-right btn-head">
                <a href="{{ route('users.index') }}" class="btn waves-effect waves-light btn-primary btn-sm"><i class="ti-back-left"></i> Kembali</a>
            </div>
        </div>
        <div class="card-block">
            <!-- AREA NOTIF -->
            @include('admin.common.notif')

            <form action="{{ route('users.change_password_update', $data->id) }}" method="POST" class="form-horizontal">
                <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Kata Sandi</label>
                    </div>
                    <div class="col-md-4">
                        <input type="password" name="password" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="col-md-2 text-right">
                        <label class="col-form-label">Ulangi Kata Sandi</label>
                    </div>
                    <div class="col-md-4">
                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" required>

                        @if ($errors->has('password'))
                          <div class="messages mt-1">
                            <p class="text-danger error">{{ $errors->first('password') }}</p>
                          </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="ti-save"></i> Simpan</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div> <!-- end card -->
</div>
@endsection
