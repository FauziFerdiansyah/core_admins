@extends('layouts.app')

@section('title_web')Profil User @endsection
@section('title_page')Users @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">User</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5 class="card-header-text">Data User</h5>
                    <a href="{{ route('user_profile_edit') }}" class="btn btn-sm btn-primary btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="ti-pencil-alt"></i> Edit</a>
                </div>
                <div class="card-block">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama</th>
                                                <td>{{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Username</th>
                                                <td>{{ Auth::user()->username }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kata Sandi</th>
                                                <td><a href="{{ route('user_change_password') }}" class="btn btn-primary btn-sm">
                                                    Ganti Kata Sandi    
                                                </a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
