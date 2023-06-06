@extends('layouts.app',['title' => 'Pengaturan'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Pengaturan Aplikasi
            </x-slot>
        </x-title>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nama Aplikasi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nama Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Alamat Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Logo Instansi</label>
                                    <input type="file" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nama Kepala Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">NIP Kepala Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Jabatan Kepala
                                        Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nama Sekretaris
                                        Instansi</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" id="btn-block"><i
                                        class="uil uil-plane"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
