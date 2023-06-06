@extends('layouts.app', ['title' => 'Header Surat'])

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <x-title>
            <x-slot name="title">
                Pengaturan Header Surat
            </x-slot>
        </x-title>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('header.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h6 class="mt-0 header-title mb-3">Pengaturan Header Surat</h6>
                            <label for="myeditorinstance" class="form-label">Header Surat</label>
                            <textarea id="myeditorinstance" name="isi">
                                @if(!empty($data))
                                    {!! $data->isi  !!}
                                @endif
                            </textarea>

                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </div> <!-- end card body-->
                    </form>
                </div> <!-- end card -->
            </div>
            <!-- end col-12 -->
        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            height: "480",
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists image ',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
        });
    </script>
@endpush
