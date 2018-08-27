@extends('admin.layouts.app')

@section('title_web')User @endsection
@section('title_page')User @endsection
@section('sub_title_page')Menampilkan semua data user @endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
    </li>
    <li class="breadcrumb-item">User</li>
@endsection

@section('content')

<!-- Datatables -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Data Admin</h5>
            <div class="card-header-right btn-head">
                <a href="{{ route('users.create') }}" class="btn waves-effect waves-light btn-primary btn-sm"><i class="ti-plus"></i> Tambah Admin Baru</a>
            </div>
        </div>
        <div class="card-block">
            <!-- AREA NOTIF -->
            @include('admin.common.notif')
            <div id="notif_info"></div>

            <div class="dt-responsive table-responsive">
                <table id="tables" class="table table-striped table-bordered nowrap dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Tgl Dibuat</th>
                            <th>Tgl Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
                
    <!-- <div id="modals"></div> -->
    <!-- END Datatables -->
</div>



@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datatables/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    {{-- Custom css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datatables/css/custom.datatable.css') }}">
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/app_tools.js') }}" async></script>
    <script src="{{ asset('backend/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/buttons.print.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/datatables/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var table;
        $(document).ready(function() {
            table = $('#tables').DataTable({
                responsive: false,
                ajax: '{!! route('users.data') !!}',
                order: [[0, "desc" ]],
                aoColumnDefs: [
                    {
                        'sWidth': '0%',
                        'bVisible': false,
                        'aTargets': [0]
                    },
                    {
                        'className': "t_act",
                        'sWidth': '10%',
                        'aTargets':[-1]
                    },
                    {
                        'sWidth': '20%',
                        'aTargets':[1]
                    }
                ],
                columns: [
                    { data: 'id', name: 'id', searchable:false,visible: false},
                    { data: 'name', name: 'users.name'},
                    { data: 'username', name: 'users.username'},
                    { data: 'email', name: 'users.email' },
                    { data: 'status', name: 'users.status',searchable: false, sClass: 'text-center' },
                    { data: 'created_at', name: 'users.created_at', orderable:true },
                    { data: 'updated_at', name: 'users.updated_at', orderable:true },
                    { data: 'actions', name: 'actions',"searchable": false ,'orderable' : false }
                    
                ]
            });
            table.on('responsive-resize.dt', function(e, datatable, columns) {
                columns.forEach(function(is_visible, index) {
                    $.each($('tr', datatable.table().header()), function() {
                        var col = $($(this).children()[index]);
                        is_visible == true ? col.show() : col.hide();
                    });
                });
            });
        });

    </script>
    <script src="{{ asset('backend/plugins/datatables/js/addons.dataTable.min.js') }}" type="text/javascript"></script>
@endpush



