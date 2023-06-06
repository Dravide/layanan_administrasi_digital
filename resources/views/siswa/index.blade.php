@extends('layouts.app', ['title' => 'Daftar Siswa'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Daftar Nama Siswa
            </x-slot>
        </x-title>
        <!-- end page title -->
        @if(session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <table id="siswa-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mt-0 header-title mb-2">Keterangan</h6>
                        <p class="text-muted mb-3">Daftar Nama Siswa berasal dari sinkronisasi Aplikasi eSCIPSA dengan
                            Layanan Administrasi Digital SMP Negeri 1 Cipanas</p>
                        <button class="btn btn-soft-info">
                            <i class="uil-sync"></i> Sync Data Siswa
                        </button>
                        <small class="text-muted fst-italic ms-2">Last Sync {{ $updated_at }}</small>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- third party js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="assets/js/pages/datatables.init.js"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('#siswa-datatable').DataTable({
                ajax: "{{asset('storage/data.json')}}",
                columns: [
                    {data: 'nis', name: 'nis'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jk', name: 'jk'},
                    {data: 'kelas', name: 'kelas'},
                    {data: 'ket', name: 'ket'},
                ]
            });
        });

    </script>
@endpush

@push('css')
    <!-- third party css -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
@endpush
