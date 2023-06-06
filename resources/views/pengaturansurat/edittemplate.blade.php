@extends('layouts.app', ['title' => 'Edit Template Surat'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Tambah Template Surat
            </x-slot>
        </x-title>
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('templatesurat.update', $data->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h6 class="mt-0 header-title mb-3">Template Surat</h6>
                            <label for="nama_template" class="mb-1">Nama Template</label>
                            <input id="nama_template" type="text"
                                   class="form-control @error('nama_template') is-invalid @enderror"
                                   name="nama_template"
                                   placeholder="Nama Template"
                                   value="{{ $data->nama_template }}">
                            @error('nama_template')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="klasifikasi_id" class="mb-1 mt-2">Nomor Surat</label>
                            <select name="klasifikasi_id" id="klasifikasi_id" data-plugin="customselect"
                                    class="form-select"
                                    data-placeholder="Select an option">
                                <option value="">Pilih Nomor Surat</option>
                                @foreach($nomorsurat as $item)
                                    <option
                                        value="{{ $item->id }}" {{ $item->id == $data->klasifikasi_id ? 'selected' : '' }}>{{ $item->kode }}
                                        ({{ $item->uraian }})
                                    </option>
                                @endforeach
                            </select>
                            @error('klasifikasi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="file_template" class="mb-1 mt-2">File Template</label>
                            <input type="file" class="form-control" id="example-fileinput" name="file"
                                   accept=".docx,.docm,.doc">
                            <hr class="mb-3">
                            <label for="data" class="mb-1 mt-2">Isi Template</label>
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Input</th>
                                    <th>Aksi</th>

                                </tr>
                                @foreach(json_decode($data->data)  as $key => $value)
                                    <tr>
                                        <td><input type="text" name="data[{{ $key }}]"
                                                   placeholder="Masukan Input" class="form-control form-control-sm"
                                                   value="{{ $value }}">
                                        </td>
                                        <td>
                                            @if($key != 'data0')
                                                <button type="button"
                                                        class="btn-sm btn btn-outline-danger remove-input-field">
                                                    Delete
                                                </button>
                                            @else
                                                <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary btn-sm">Tambah Input
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
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
    <link href="{{ asset('') }}assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endpush

@push('js')
    <script src="{{ asset('') }}assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = {{ $jumlahdata-1 }};
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
