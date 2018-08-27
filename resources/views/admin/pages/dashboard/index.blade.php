@extends('admin.layouts.app')

@section('title_web')Dashboard @endsection
@section('title_page')Dashboard @endsection
@section('sub_title_page')Selamat datang di Area Admin @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">Dashboard</li>
@endsection


@section('content')
    <div class="row">                                            
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fa fa-book f-30 text-c-purple"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Tickets Answered</h6>
                            <h2 class="m-b-0">379</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fa fa-rocket f-30 text-c-green"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Projects Launched</h6>
                            <h2 class="m-b-0">205</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fa fa-user f-30 text-c-red"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Happy Customers</h6>
                            <h2 class="m-b-0">5984</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fa fa-lightbulb-o f-30 text-c-blue"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Unique Innovation</h6>
                            <h2 class="m-b-0">325</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>                     
    </div> <!-- end row -->

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Recent Tickets</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Subject</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label class="label label-success">open</label></td>
                                    <td>Website down for one week</td>
                                    <td>Support</td>
                                    <td>Today 2:00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right m-r-20">
                            <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

@endsection
