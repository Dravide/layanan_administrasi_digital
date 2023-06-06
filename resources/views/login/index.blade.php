<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In - Layanan Administrasi Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Layanan Administrasi Digital SMP Negeri 1 Cipanas" name="description"/>
    <meta content="Dery Supriady" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}assets/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('') }}assets/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}assets/ico/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('') }}assets/ico/site.webmanifest">

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

</head>

<body class="authentication-bg">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6 p-4">
                                <div class="mx-auto">
                                    <a href="index.html">
                                        <img src="{{ asset('') }}assets/images/logo-dark.png" alt="" height="50"/>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-3">Selamat Datang Kembali!</h6>
                                <p class="text-muted mt-1 mb-4">
                                    Masukan Username dan Password.
                                </p>

                                <form action="{{ route('login.post') }}" class="authentication-form" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                            <input type="text" class="form-control" id="username"
                                                   placeholder="Username" name="username">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="Masukan Password" name="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center d-grid">
                                        <button class="btn btn-primary" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <p class="fs-24 fw-bold text-white mb-1">I simply love it!</p>
                                        <p class="lead">"It's a elegent templete. I love it very much!"</p>
                                        <p>- Admin User</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
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

<!-- Vendor js -->
<script src="{{ asset('') }}assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="{{ asset('') }}assets/js/app.min.js"></script>

</body>
</html>
