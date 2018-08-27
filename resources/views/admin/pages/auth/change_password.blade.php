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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulir Ubah Kata Sandi User</h5>
                    <div class="card-header-right btn-head">
                        <a href="{{ route('auth_profile') }}" class="btn btn-sm btn-primary btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="ti-back-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="{{ route('auth_change_password_update') }}" method="POST" class="form-horizontal">
                        <!-- AREA NOTIF -->
                        @include('admin.common.notif')
                
                        <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Nama</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('current_password') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Kata Sandi Saat Ini</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="current_password" class="form-control {{ $errors->has('current_password') ? ' form-control-danger' : '' }}" value="{{ Request::old('current_password') ?: '' }}" required="" autofocus>
                                @if ($errors->has('current_password'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Kata Sandi Baru</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" value="{{ Request::old('password') ?: '' }}" required="">
                                @if ($errors->has('password'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                            <div class="col-md-2">
                                <label class="col-form-label">Ulang Kata Sandi Baru</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' form-control-danger' : '' }}" value="{{ Request::old('password_confirmation') ?: '' }}" required="">
                                @if ($errors->has('password_confirmation'))
                                    <span class="col-form-label">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
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
