{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Video Downloader -  Admin Panel">
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
                    <h1>App Data</h1>
                    <div class="">
                        <a class="btn ripple btn-primary" style="border-radius:3px" data-target="#add_edit_appdata"
                            id="add_data" data-toggle="modal" href=""><i class="fe fe-plus-circle mr-2"></i>Add
                            App</a>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header-divider">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table table-striped table-hover table-fw-widget"
                                            id="table_list_data" width="100%">
                                            <!-- data-filter_data is static as there are different tabs for filtering that are already defined -->
                                            <thead>
                                                <tr>
                                                    <th class="wd-5p">Id</th>
                                                    <th class="wd-15p">App Name</th>
                                                    <th class="wd-15p">Package Name</th>
                                                    <th class="wd-15p">Account Name</th>
                                                    <th class="wd-10p">App Version</th>
                                                    <th class="wd-10p">Req-Token</th>
                                                    <th class="wd-10p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>

        </div>
        <!-- End Main Content-->

        <!-- Form Modal -->
        <div class="modal fade" id="add_edit_appdata">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border-radius:7px">
                    <div class="modal-body pd-20 pd-sm-40">
                        <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title mb-4 text-center"></h5>
                        <form id="appdata" action="Add_Edit_AppSettingdata" method="post" enctype="text/plain">
                            @csrf
                            <input id="app_id" name="id" value="" type="hidden">
                            <div class="form-group">
                                <label for="">App Name :</label>
                                <input id="app_name" name="app_name" class="form-control" placeholder="Enter app name"
                                    type="text">
                                <span class="text-danger app_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Package Name :</label>
                                <input id="package_name" name="package_name" class="form-control"
                                    placeholder="Enter package name" type="text">
                                <span class="text-danger package_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Account Name :</label>
                                <input id="account_name" name="account_name" class="form-control"
                                    placeholder="Enter account name" type="text">
                                <span class="text-danger account_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">App Version :</label>
                                <input id="app_version" name="app_version" class="form-control"
                                    placeholder="Enter app version" type="text">
                                <span class="text-danger app_version_error"></span>
                            </div>
                            <input id="request_token" name="request_token" value="" class="form-control"
                                type="hidden">
                            <div class="form-group" style="display: flex; justify-content: center; margin: auto">
                                <button value="submit" type="submit" class="btn ripple btn-info add_appdata"
                                    style="border-radius:3px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Modal -->

        <!-- Success popup -->
        <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false"
            data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false"
            data-animation="pop" data-timer="null" style="display: none; margin-top: -169px;">
            <div class="sa-icon sa-success animate" style="display: block;">
                <span class="sa-line sa-tip animateSuccessTip"></span>
                <span class="sa-line sa-long animateSuccessLong"></span>

                <div class="sa-placeholder"></div>
                <div class="sa-fix"></div>
            </div>
            <h2>Success!</h2>
            <p style="display: block;" id="message"></p>
            <div class="sa-icon sa-custom"
                style="display: none; background-image: url(&quot;{{ asset('assets/img/brand/logo.png&quot') }};); width: 80px; height: 80px;">
            </div>
            <div class="sa-button-container">
                <div class="sa-confirm-button-container">
                    <button class="confirm" onclick="
                    closepopup()" tabindex="1"
                        style="display: inline-block; background-color: rgb(87, 169, 79); box-shadow: rgba(87, 169, 79, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">OK</button>
                    <div class="la-ball-fall">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Success popup -->

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
    <script type='text/javascript'>
        // CREATE CSRF TOKEN
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // FETCH APP DATA CALL
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                // "order": [
                //     [0, "desc"]
                // ],
                ajax: "{{ route('Get_AppSettingData') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'app_name',
                        name: 'app_name'
                    },
                    {
                        data: 'package_name',
                        name: 'package_name'
                    },
                    {
                        data: 'account_name',
                        name: 'account_name'
                    },
                    {
                        data: 'app_version',
                        name: 'app_version'
                    },
                    {
                        data: 'request_token',
                        name: 'request_token'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        // ADD EDIT APP DATA CALL
        $(document).on('click', '#add_data', function() {
            document.getElementById("appdata").reset();
            $('.modal-title').html('Add App Data');
        })

        $(document).on('click', '.add_appdata', function() {
            $("#appdata").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var actionUrl = form.attr("action");

                $.ajax({
                    type: "POST",
                    url: "Add_Edit_AppSettingData",
                    data: form.serialize(),
                    success: function(data) {
                        if (data.success) {
                            $('#add_edit_appdata').modal('hide');
                            $('#message').html(data.success);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.success,
                            }).then(() => {
                                location.reload()
                            });
                        } else {
                            $.each(data.error, function(key, value) {
                                $("span." + key + "_error").text(value).show().delay(
                                        5000)
                                    .fadeOut();
                            });
                        }
                    },
                });
            });
        })

        // GET EDIT DATA CALL ID BAY
        function edit_appData(editappData) {

            var app_id = $(editappData).data('val');
            $('#add_edit_appdata').modal('show');
            $('.modal-title').html('Edit App Data');

            $.ajax({
                type: "GET",
                url: "Edit_AppSettingData/" + app_id,
                success: function(response) {
                    if (response.edit_data) {
                        $('#app_name').val(response.edit_data.app_name);
                        $('#package_name').val(response.edit_data.package_name);
                        $('#account_name').val(response.edit_data.account_name);
                        $('#app_version').val(response.edit_data.app_version);
                        $('#request_token').val(response.edit_data.request_token);
                        $('#app_id').val(app_id);
                    }
                },
            });
        }

        // DELETE DATA CALL ID BAY
        function delete_appData(deleteappData) {
            var app_id = $(deleteappData).data('val');

            $.ajax({
                type: "POST",
                url: "Delete_AppSettingData",
                data: {
                    'id': app_id
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success,
                    }).then(() => {
                        location.reload()
                    });
                },
            });
        }
    </script>

</body>

</html>
{{-- @endsections --}}
