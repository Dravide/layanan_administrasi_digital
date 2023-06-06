@extends('layouts.app', ['title' => 'Surat Masuk'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Surat Masuk
            </x-slot>
        </x-title>

        <!-- end page title -->
        <div class="row">
            <div class="col">
                <div class="inbox-rightbar">
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="" data-bs-original-title="Arsip">
                            <i class="uil uil-archive-alt"></i>
                        </button>
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

                                    <a href="{{ route('templatesurat.index') }}"
                                       class="btn btn-success dropdown-toggle"

                                       aria-expanded="false">
                                        <i class="uil uil-plus-circle me-1"></i> Buat Surat

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
                                        <div class="form-check mb-1">
                                            <input type="checkbox" class="form-check-input" id="checkAll">

                                        </div>
                                    </th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                    <th scope="col" class="align-middle">Layanan Administrasi</th>
                                    <th scope="col" class="align-middle">File</th>
                                    <th scope="col" class="align-middle">Titimangsa</th>
                                    <th scope="col" class="align-middle">Validasi</th>
                                    <th scope="col" class="align-middle">Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check mb-1">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">

                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if($data->validasi == 'Tidak' OR $data->validasi == null)
                                                <div class="btn-group">


                                                    <button type="button" class="btn btn-warning btn-sm" disabled><i
                                                            class="uil uil-cloud-times"></i> Belum Validasi
                                                    </button>

                                                </div>
                                            @else
                                                <div class="btn-group">
                                                    <form action="{{ route('surat.generate') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                                        <button type="submit" class="btn btn-info btn-sm"><i
                                                                class="uil uil-envelope-redo"></i> Generate
                                                        </button>

                                                    </form>
                                                </div>
                                            @endif

                                            <div class="btn-group">

                                                <a href="{{ route('surat.edit', $data->id) }}"
                                                   class="btn btn-danger btn-sm"><i
                                                        class="uil uil-envelope-edit"></i> Edit
                                                </a>
                                            </div>

                                        </td>
                                        <td class="align-middle">{{ $data->judul_surat }}
                                            <p class="text-muted mb-0 small text-truncate">{{ $data->deskripsi ? $data->deskripsi : '-' }}</p>
                                        </td>
                                        <td class="align-middle">
                                            @if($data->file)
                                                <a
                                                    href="{{ asset($data->file) }}" target="_blank">
                                                    <button type="button" class="btn btn-soft-primary btn-sm">
                                                        <i class="uil uil-envelope-shield text-primary"></i>
                                                    </button>
                                                </a>

                                            @else

                                                <button type="button" class="btn btn-soft-danger btn-sm" disabled>
                                                    <i class="uil uil-envelope-times"></i>
                                                </button>

                                            @endif

                                        </td>
                                        <td class="align-middle">{{ $data->titimangsa->translatedFormat('d M Y') }}</td>

                                        <td class="align-middle"><span
                                                class="badge badge-soft-{{ $data->validasi == 'Ya' ? 'success' : 'warning' }} py-1">{!!   $data->validasi == 'Ya' ? '<i class="uil uil-file-check-alt"></i>' : '<i class="uil uil-file-info-alt"></i>' !!}</span>
                                        </td>
                                        <td class="align-middle"><span
                                                class="badge badge-soft-info py-1">{{ url('tte/'.$data->url)  }}</span>
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
