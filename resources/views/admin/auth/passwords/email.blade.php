@extends('admin.layouts.login')

@section('content')
<section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-sm-12 m-t-10">
            <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="text-center">
                    <img src="{{ asset('img/logo-white.png') }}" alt="logo.png" width="200">
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center">Lupa Kata Sandi</h3>
                            </div>
                        </div>
                        <div class="form-group form-primary {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            <span class="form-bar"></span>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label class="float-label">Email Anda</label>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Ganti Kata Sandi</button>
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-12">
                                <div class="forgot-phone text-right f-right">
                                    <a href="{{ route('login') }}" class="text-right f-w-600"> Kembali ke halaman login</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection
