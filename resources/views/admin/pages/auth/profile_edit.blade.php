@extends('admin.layouts.app')

@section('title_web')Edit Profil User @endsection
@section('title_page')User @endsection
@section('sub_title_page')Formulir ubah data user @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('auth_profile') }}">User</a>
    </li>
    <li class="breadcrumb-item">Ubah Profil</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulir Ubah Profil</h5>
                    <div class="card-header-right btn-head">
                        <a href="{{ route('auth_profile') }}" class="btn btn-sm btn-primary btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="ti-back-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="{{ route('auth_profile_update') }}" method="POST" class="form-horizontal">
                        <!-- AREA NOTIF -->
                        @include('admin.common.notif')
                
                        <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Nama</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' form-control-danger' : '' }}" value="{{ Request::old('name') ?: Auth::user()->name }}" autofocus required="">
                                @if ($errors->has('name'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" value="{{ Request::old('email') ?: Auth::user()->email }}" required="">
                                @if ($errors->has('email'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('username') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Username</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="username" class="form-control {{ $errors->has('username') ? ' form-control-danger' : '' }}" value="{{ Request::old('username') ?: Auth::user()->username }}" required="">
                                @if ($errors->has('username'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                <div class="text-muted small mt-1"><i class="fa fa-info-circle fa-fw"></i> Kolom Hanya boleh diisi <b>tulisan</b>, <b>angka</b> dan <b>garis bawah</b>. contoh : <b>Admin_ke2</b></div>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="ti-save"></i> Ubah</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
    </div> <!-- end row -->
@endsection
