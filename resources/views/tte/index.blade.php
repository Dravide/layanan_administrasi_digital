<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Tanda Tangan Elektronik - {{ $surat->judul_surat }}</title>
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


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
          rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
        .wrapper {
            position: relative;
            max-width: 500px;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: solid 1px #ddd;

        }


        #signature-pad canvas {
            width: 100% !important;
            height: auto;
            border: 1px solid gray;
        }
    </style>
</head>

<body class="authentication-bg">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card">
                    <form method="POST" action="{{ route('tte.store', $surat->id) }}" id="form-submit">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Validasi Digital</div>
                            <p class="text-success text-uppercase fs-12">Layanan Administrasi Digital</p>
                            <h5><p class="text-dark text-uppercase">{{ $surat->judul_surat }}</p></h5>
                            <p class="fs-11">{{ $surat->deskripsi }}</p>

                            <p class="small text-muted mb-1">Titimangsa
                                : {{ $surat->titimangsa->translatedFormat('d F Y')}}</p>
                            <p class="text-muted mb-2">Kepala SMP Negeri 1 Cipanas Menandatangani secara Resmi
                                menggunakan
                                Layanan Administrasi Digital.</p>


                            @csrf
                            <div class="col-md-12">
                                <label class="mb-1" for="">Tanda Tangan:</label>
                                <p class="text-muted fst-italic small"> Tanda Tangan Digital telah dienkripsi
                                    secara
                                    end to
                                    end.</p>
                                <div class="wrapper">
                                    <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                                    <input type="hidden" name="sig"/>
                                </div>
                                <button id="clear" class="btn btn-danger btn-sm mt-2"><i class="uil uil-redo"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body border-top">


                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="" data-bs-original-title="Titimangsa">
                                                <i class="uil uil-calender"></i> {{ now('Asia/Jakarta')->translatedFormat('d F Y H:m') }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col offset-sm-1">

                                    <button type="submit" class="btn btn-success btn-sm float-end"><i
                                            class="uil uil-check-circle"></i> Validasi
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
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


<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.3/dist/signature_pad.umd.min.js"></script>
<script>
    // init signaturepad
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 62, 189)'
    });

    function getSignaturePad() {
        var imageData = signaturePad.toDataURL();
        document.getElementsByName("sig")[0].setAttribute("value", imageData);
    }

    $('#form-submit').submit(function () {
        getSignaturePad(); // call this function here, sets the imageData right before submitting the form.
        return true; // returning true submits the form.
    });
    // action on click button clea
    $('#clear').click(function (e) {
        e.preventDefault();
        signaturePad.clear();
    });
</script>
</body>
</html>
