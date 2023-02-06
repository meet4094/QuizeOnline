{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="QuizOnline -  Admin Panel">
    <meta name="author" content="Spruko Technologies Private Limited">
    {{-- <meta name="keywords"
        content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css file -->
    @include('components.cssfile')
    <!-- end css file -->
</head>

<body>

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        @include('components.sidebar')
        <!-- End Sidemenu -->

        <!-- Main Content-->
        <div class="main-content side-content pt-0">

            <!-- Main Header-->
            @include('components.header')
            <!-- End Main Header-->

            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <h1>Dashboard</h1>
                </div>
                <!-- End Page Header -->
                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card custom-card">
                            <a href="appsetting">
                                <div class="card-body dash1">
                                    <div class="d-flex">
                                        <p class="mb-1 tx-inverse">Language Count</p>
                                        <div class="ml-auto">
                                            <i class="fas fa-chart-line fs-20 text-primary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="dash-25 text-primary">{{ $languages_data }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card custom-card">
                            <a href="button">
                                <div class="card-body dash1">
                                    <div class="d-flex">
                                        <p class="mb-1 tx-inverse">Categories Count</p>
                                        <div class="ml-auto">
                                            <i class="fab fa-rev fs-20 text-secondary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="dash-25 text-secondary">{{ $categories_data }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card custom-card">
                            <a href="apicall">
                                <div class="card-body dash1">
                                    <div class="d-flex">
                                        <p class="mb-1 tx-inverse">Questions Count</p>
                                        <div class="ml-auto">
                                            <i class="fas fa-dollar-sign fs-20 text-success"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="dash-25 text-success">{{ $questions_data }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card custom-card">
                            <a href="video">
                                <div class="card-body dash1">
                                    <div class="d-flex">
                                        <p class="mb-1 tx-inverse">Api Call Count</p>
                                        <div class="ml-auto">
                                            <i class="fas fa-signal fs-20 text-info"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="dash-25 text-info">{{ $api_calls_data }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Main Content-->

        <!-- Footer-->
        @include('components.footer')
        <!-- End Footer-->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- scrip file -->
    @include('components.jsfile')
    <!-- end scrip file -->
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>

    <!-- Ajex Call -->
    <script type='text/javascript'></script>

</body>

</html>
{{-- @endsections --}}
