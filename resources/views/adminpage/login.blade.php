<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('admin/img/logo/logo.png') }}" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="d-flex flex-column justify-content-center bg-primary" style="height: 100vh">
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        </div>
                                        <form class="user" action="/login" method="POST">
                                            @if (session()->has('loginError'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('loginError') }}
                                                </div>
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="exampleInputEmail"
                                                    aria-describedby="emailHelp" name="email"
                                                    placeholder="Enter Email Address">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="exampleInputPassword"
                                                    placeholder="Password" name="password">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/ruang-admin.min.js') }}"></script>
</body>
