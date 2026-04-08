<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Đăng nhập hệ thống ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=""/>
        <meta name="author" content="Expoplus"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
        <!-- App css -->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    </head>

    <body>
        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-0">
                <div class="row align-items-center g-0 px-3 py-3 vh-100">

                    <div class="col-md-4 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-0 p-0 p-lg-3">
                                    <div class="mb-0 border-0 p-md-4 p-lg-0">

                                        <div class="mb-4 p-0 text-lg-start text-center">
                                            <div class="auth-brand">
                                                <a href="#" class="logo logo-light">
                                                    <span class="logo-lg">
                                                        <img src="{{ asset('assets/images/logo-white.png') }}" alt="" width="200">
                                                    </span>
                                                </a>
                                                <a href="#" class="logo logo-dark">
                                                    <span class="logo-lg">
                                                        <img src="{{ asset('assets/images/logo.png') }}" alt="" width="200">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        @include('admin.blocks.notification')
                                        @yield('content')
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        
    </body>
</html>