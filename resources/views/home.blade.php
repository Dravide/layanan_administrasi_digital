@extends('layouts.app', ['title' => 'Dasbor Surat'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Dashboard
            </x-slot>
        </x-title>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-3 col-6">
                                <img src="{{ asset('') }}assets/images/cal.png" class="me-4 align-self-center img-fluid"
                                     alt="cal">
                            </div>
                            <div class="col-xl-10 col-lg-9">
                                <div class="mt-4 mt-lg-0">
                                    <h5 class="mt-0 mb-1 fw-bold">Layanan Administrasi Digital</h5>
                                    <p class="text-muted mb-2">
                                        Selamat Datang di Layanan Administrasi Digital SMP Negeri 1 Cipanas
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
            <!-- end col-12 -->
        </div>
    </div>
@endsection
