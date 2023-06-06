<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Validasi - {{ $surat->judul_surat }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
          id="bs-default-stylesheet"/>
    <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet"/>

    <link href="{{ asset('') }}assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
          id="bs-dark-stylesheet" disabled/>
    <link href="{{ asset('') }}assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
          disabled/>


    <!-- icons -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    @vite('resources/js/app.js')


</head>

<body class="authentication-bg">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card">

                    <div class="card-body">
                        <div class="badge bg-success float-end">Validasi Digital</div>
                        <p class="text-success text-uppercase fs-12">Layanan Administrasi Digital</p>
                        <h4 class="mt-0">{{ $surat->judul_surat }}</h4>
                        <div class="row">
                            <div class="col-6">
                                <!-- assignee -->
                                <p class="mt-2 mb-1 text-muted">Di Tanda Tangani oleh</p>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 fs-14">Jaimin, S.Pd., M.Pd.</h5>
                                    </div>
                                </div>
                                <!-- end assignee -->
                            </div> <!-- end col -->

                            <div class="col-6">
                                <!-- start due date -->
                                <p class="mt-2 mb-1 text-muted">Tanggal</p>
                                <div class="d-flex">
                                    <i class="uil uil-schedule text-success me-1"></i>
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 fs-14">{{ $surat->validated_at->translatedFormat('l, d F Y') }}</h5>
                                    </div>
                                </div>
                                <!-- end due date -->
                            </div> <!-- end col -->
                        </div>
                        <hr class="my-2">
                        <h4 class="mb-3">Detail Surat</h4>
                        <div class="d-flex mb-2">
                            <div class="text-center me-3 flex-shrink-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        <i class="uil uil-file-alt"></i>
                                    </span>
                                </div>
                                <p class="text-muted fs-13 mb-0">Berkas</p>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="fs-15 my-1"><a href="#" class="text-dark">Jenis Surat</a></h5>
                                <p class="text-muted fs-13 text-truncate mb-0">{{ $surat->nama_template }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="text-center me-3 flex-shrink-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft-success text-success">
                                        <i class="uil uil-code"></i>
                                    </span>
                                </div>
                                <p class="text-muted fs-13 mb-0">Hash</p>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="fs-15 my-1"><a href="#" class="text-dark">Dokumen Hash</a></h5>
                                <p class="text-muted fs-13 text-truncate mb-0">{{ $surat->url }}.scp</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="text-center me-3 flex-shrink-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft-danger text-danger">
                                        <i class="uil uil-sign-in-alt"></i>
                                    </span>
                                </div>
                                <p class="text-muted fs-13 mb-0">Sig</p>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="fs-15 my-1"><a href="#" class="text-dark">Tanda Tangan</a></h5>
                                <p class="text-muted fs-13 text-truncate mb-0"><img
                                        src="{{ Crypt::decryptString($surat->sig) }}" height="100"></p>
                            </div>
                        </div>

                    </div>

                    <div class="card-body border-top">


                        <div class="row align-items-center">
                            <div class="col-sm-auto">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="" data-bs-original-title="Titimangsa">
                                            <i class="uil uil-building"></i> SMP Negeri 1 Cipanas
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- end card -->


                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

</body>
</html>
