@extends('layouts.app', ['title' => 'Daftar Siswa'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Klasifikasi
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
                        <h6 class="mt-0 header-title mb-3">Daftar Kode Klasifikasi</h6>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">KELAS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $hasil)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $hasil['nis'] }}</td>
                                        <td>{{ $hasil['nama'] }}</td>
                                        <td>{{ $hasil['kelas'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mt-0 header-title mb-3">Daftar Siswa</h6>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush

@push('css')

@endpush
