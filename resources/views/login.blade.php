<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="QuizOnline -  Login Page">
    <meta name="author" content="QuizOnline">
    {{-- <meta name="keywords"
        content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template"> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.ico" type') }}="image/x-icon" />

    <!-- Title -->
    <title>QuizOnline -  Login Page</title>

    <!---Fontawesome css-->
    <link href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!---Ionicons css-->
    <link href="{{ asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!---Typicons css-->
    <link href="{{ asset('assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">

    <!---Feather css-->
    <link href="{{ asset('assets/plugins/feather/feather.css') }}" rel="stylesheet">

    <!---Falg-icons css-->
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

    <!---Style css-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-dark-style.css') }}" rel="stylesheet">

</head>

<body class="main-body">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page main-signin-wrapper">
            <!-- Row -->
            <div class="row text-center pl-0 pr-0 ml-0 mr-0">
                <div class="col-lg-3 d-block mx-auto">
                    {{-- <div class="text-center mb-2">
                    <img src="{{ asset('assets/img/brand/logo.png') }}" class="header-brand-img" alt="logo">
                    <img src="{{ asset('assets/img/brand/logo-light.png') }}" class="header-brand-img theme-logos"
                        alt="logo">
                </div> --}}
                    <div class="card custom-card">
                        <div class="card-body">
                            <h1 class="text-center tx-bold">Login</h1>
                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @if (Session::has('success'))
                                <p class="text-success">{{ Session::get('success') }}</p>
                            @endif

                            <form action="login" method="post">
                                @csrf
                                <div class="form-group text-left">
                                    <label>Email</label>
                                    <input name="email" class="form-control" placeholder="Enter your email"
                                        type="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group text-left">
                                    <label>Password</label>
                                    <input name="password" class="form-control" placeholder="Enter your password"
                                        type="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn ripple btn-main-primary btn-block">Sign In</button>
                            </form>
                            {{-- <div class="mt-3 text-center">
                                <p class="mb-1"><a href="">Forgot password?</a></p>
                                <p class="mb-0">Don't have an account? <a href="signup.html">Create an Account</a></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
    </div>
    <!-- End Page -->

    <!-- Jquery js-->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Ionicons js-->
    <script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
