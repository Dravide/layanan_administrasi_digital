@extends('layouts.app', ['title' => 'Klasifikasi Surat'])

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
                                    <th scope="col">KODE</th>
                                    <th scope="col">URAIAN</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $hasil)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $hasil->kode }}</td>
                                        <td>{{$hasil->uraian}}</td>
                                        <td>{{ $hasil->keterangan }}</td>
                                        <td>
                                            <form action="{{ route('klasifikasi.destroy',$hasil->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs">
                                                    <i class="uil uil-file-times"></i>
                                                </button>
                                            </form>
                                        </td>
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
                        <h6 class="mt-0 header-title mb-3">Tambah Kode Klasifikasi</h6>

                        <form action="{{ route('klasifikasi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Klasifikasi</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                                       name="kode" placeholder="Masukkan Kode Klasifikasi"
                                       value="{{ old('kode') }}">
                                @error('kode')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="uraian" class="form-label">Uraian Klasifikasi</label>
                                <input type="text" class="form-control @error('uraian') is-invalid @enderror"
                                       id="uraian" name="uraian" placeholder="Masukkan Nama Klasifikasi"
                                       value="{{ old('uraian') }}">
                                @error('uraian')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                       id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"
                                       value="{{ old('keterangan') }}">
                                @error('keterangan')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
