@extends('layouts.app', ['title' => 'Tambah Template Surat'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Tambah Template Surat
            </x-slot>
        </x-title>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="badge bg-success float-end">Aktif</div>
                        <p class="text-success text-uppercase fs-12 mb-2">{{ $data->nama_template }}</p>
                        <h5><a href="#" class="text-dark">{{ $data->nama_template }}</a></h5>
                        <p class="text-muted mb-0">If several languages coalesce, the grammar of the resulting language
                            is
                            more regular.</p>

                    </div>
                    <div class="card-body border-top">
                        <div class="row align-items-center">
                            <div class="col-sm-auto">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item pe-2">
                                        <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="" data-bs-original-title="Due date">
                                            <i class="uil uil-calender me-1"></i> 15 Dec
                                        </a>
                                    </li>
                                    <li class="list-inline-item pe-2">
                                        <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="" data-bs-original-title="Tasks">
                                            <i class="uil uil-bars me-1"></i> 56
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="" data-bs-original-title="Comments">
                                            <i class="uil uil-comments-alt me-1"></i> 224
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col offset-sm-1">
                                <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="" data-bs-original-title="100% completed">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('surat.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h6 class="mt-0 header-title mb-3">Judul Surat</h6>
                            <label for="nama_template" class="mb-1">Judul Surat</label>
                            <input type="text" class="form-control @error('judul_surat') is-invalid @enderror"
                                   name="judul_surat" id="nama_template"
                                   placeholder="Nama Template"
                                   value="{{ old('judul_surat') }}">
                            @error('judul_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="deskripsi" class="mb-1 mt-2">Deskripsi Surat</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                      id="deskripsi"
                                      placeholder="Deskripsi Surat">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="hidden" name="templates_id" value="{{ $data->id }}">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nomo_surat_id" class="mb-1 mt-2">Nomor Surat</label>
                                    <input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat"
                                           id="nomo_surat_id"
                                           value="{{ $data->klasifikasi->kode }}/200/SMPN1CIPANAS/{{ date('Y') }}">
                                </div>
                                <div class="col-6">
                                    <label for="tanggal_id" class="mb-1 mt-2">Titi Mangsa</label>
                                    <input type="date" class="form-control" name="titimangsa" placeholder="Titi Mangsa"
                                           id="tanggal_id" value="{{ old('tanggal') }}">
                                </div>

                            </div>


                            <hr class="my-2">
                            <h3 class="mb-2 mt-0 text-center">DATA SURAT</h3>

                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Input</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach(json_decode($data->data) as $key => $value)
                                    <tr>
                                        <td class="align-middle">
                                            <h5>{{ $value}}</h5>
                                        </td>
                                        <td class="align-middle">
                                            <x-input>
                                                <x-slot name="value">{{ $value }}</x-slot>
                                                <x-slot name="old">{{ old($value) }}</x-slot>
                                            </x-input>
                                        </td>

                                    </tr>
                                @endforeach

                            </table>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1" name="tte" value="1">
                                <label class="form-check-label" for="customCheck1">Tanda Tangan Digital</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            </div>

                        </div> <!-- end card body-->
                    </form>
                </div> <!-- end card -->
            </div>
            <!-- end col-12 -->
        </div>
    </div>
@endsection

@push('css')
    <!-- Plugins css -->
    <link href="{{ asset('') }}assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('') }}assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('') }}assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('') }}assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet">

@endpush

@push('js')
    <!-- Plugins Js -->
    <script src="{{ asset('') }}assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('') }}assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ asset('') }}assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!--Color picker-->
    <script src="{{ asset('') }}assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <!-- Init js-->
    <script src="{{ asset('') }}assets/js/pages/form-advanced.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="data[data' + i +
                ']" placeholder="Masukan Input" class="form-control form-control-sm" /></td><td><button type="button" class="btn-sm btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
