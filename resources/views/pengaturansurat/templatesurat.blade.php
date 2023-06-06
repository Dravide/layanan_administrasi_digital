@extends('layouts.app', ['title' => 'Template Surat'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Template Surat
            </x-slot>
        </x-title>

        <!-- end page title -->
        <div class="row">
            <div class="col">
                <div class="inbox-rightbar">
                    <div class="btn-group mb-2">
                        <a href="{{ route('arsip') }}" class="btn btn-light" data-bs-toggle="tooltip"
                           data-bs-placement="top" title="" data-bs-original-title="Arsip">
                            <i class="uil uil-envelope-bookmark"></i>
                        </a>
                        <button type="button" class="btn btn-light" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="" data-bs-original-title="Tandai Unggulan">
                            <i class="uil uil-star"></i>
                        </button>
                    </div>

                    <div class="d-inline-block align-middle float-lg-end">
                        <div class="row">
                            <div class="col-8 align-self-center fst-italic small">
                                {{--                                Menampilkan 1 - 10 dari 100--}}
                            </div> <!-- end col-->

                            <div class="col-4">
                                <div class="btn-group float-end">

                                    <a href="{{ route('templatesurat.create') }}"
                                       class="btn btn-success dropdown-toggle"

                                       aria-expanded="false">
                                        <i class="uil uil-plus-circle me-1"></i> Tambah Template

                                    </a>
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
                @if(session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('sukses') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-0 border-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                    <th scope="col" class="align-middle">Layanan Administrasi</th>
                                    <th scope="col" class="align-middle">Klasifikasi</th>
                                    <th scope="col" class="align-middle">File Template</th>
                                    <th scope="col" class="align-middle">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="align-middle">
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('surat.index',$data->id) }}">
                                                    <button type="button" class="btn btn-soft-dark btn-sm"><i
                                                            class="uil uil-envelope-redo"></i> Buat Surat
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="btn-group">

                                                <a href="{{ route('templatesurat.edit', $data->id) }}"
                                                   class="btn btn-soft-danger btn-sm"><i
                                                        class="uil uil-envelope-edit"></i> Edit
                                                </a>
                                            </div>

                                            <div class="btn-group">
                                                <form action="{{ route('status',$data->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status"
                                                           value="{{ $data->status == 'arsip' ? 'aktif' :  'arsip' }}">

                                                    <button type="submit"
                                                            class="btn btn-soft-{{ $data->status == 'arsip' ? 'success' :  'warning' }} btn-sm align-middle">
                                                        <i class="uil uil-envelope-star"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="align-middle"><strong>{{ $data->nama_template }}</strong></td>
                                        <td class="align-middle">{{ $data->klasifikasi->uraian }}</td>
                                        <td class="align-middle">
                                            <a href="{{ asset('storage/'.$data->file.'') }}">
                                                <i class="uil uil-file-alt"></i></a>
                                        </td>
                                        <td class="align-middle"><span
                                                class="badge badge-soft-{{ $data->status == 'aktif' ? 'success' : 'warning' }} py-1">{{ strtoupper($data->status)  }}</span>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- end card -->


            </div>
            <!-- end col-12 -->
        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
