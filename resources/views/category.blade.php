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
                    <h1>Category Data</h1>
                    <div class="">
                        <div class="text-danger" style="{{$mes_dis}}">{{ $mes }}</div>
                        <div class="" style="display:{{ $btn }}">
                            <a class="btn ripple btn-primary" style="border-radius:3px"
                                data-target="#add_edit_categorydata" id="add_data" data-toggle="modal"
                                href=""><i class="fe fe-plus-circle mr-2"></i>Add
                                Category</a>
                            <a href="#" class="btn ripple btn-secondary navresponsive-toggler mb-0"
                                data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="fe fe-filter mr-1"></i> Filter <i class="fas fa-caret-down ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!--Navbar-->
                <div class="responsive-background">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="advanced-search">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <div class="form-group mb-lg-0">
                                        <label class="">Status :</label>
                                        <select id="statusvalue" class="form-control select2-flag-search">
                                            <option value="" disabled selected>Select..</option>
                                            <option value="0">Enable</option>
                                            <option value="1">Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-lg-0">
                                        <label for="">Language :</label>
                                        <select id="lan_id" name="language_id"
                                            class="form-control select2-flag-search lan_select2">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="#" id="statusApply" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                    <!--End Navbar -->
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
                                                        <th class="wd-15p">Language Name</th>
                                                        <th class="wd-15p">Category Name</th>
                                                        <th class="wd-15p">category Image</th>
                                                        <th class="wd-15p">Status</th>
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
            <div class="modal fade" id="add_edit_categorydata">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="border-radius:7px">
                        <div class="modal-body pd-20 pd-sm-40">
                            <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title mb-4 text-center"></h5>
                            <form id="categorydata" action="{{ route('Add_Edit_CategoryData') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input id="category_id" name="id" value="" type="hidden">
                                <div class="form-group">
                                    <label for="">Language :</label>
                                    <select id="language_id" name="language_id"
                                        class="form-control select2-flag-search lan_select2">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Category Name :</label>
                                    <input id="category_name" name="category_name" class="form-control"
                                        placeholder="Enter category name" type="text">
                                    <span class="text-danger category_name_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Image :</label>
                                    <input name="category_image" class="form-control" type="file" <span
                                        class="text-danger
                                    category_image_error"></span>
                                    <span class="text-danger category_image_error"></span>
                                </div>
                                <div class="form-group" id="category_image">
                                </div>
                                <div class="form-group">
                                    <label for="">Status :</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="rdiobox"><input id="enable" checked=""
                                                    value="0" name="is_del" type="radio">
                                                <span>Enable</span></label>
                                        </div>
                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                            <label class="rdiobox"><input id="disable" value="1"
                                                    name="is_del" type="radio">
                                                <span>Disable</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex; justify-content: center; margin: auto">
                                    <button value="submit" type="submit" class="btn ripple btn-info add_edit_data"
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

        </div>

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

    <!-- Ajex Call -->
    <script type='text/javascript'>
        // CREATE CSRF TOKEN
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // FETCH APP DATA CALL
        $(document).ready(function() {
            load_datatable('');
        });

        function load_datatable(status_id = '', language_id = '') {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                // "order": [
                //     [0, "desc"]
                // ],
                ajax: {
                    url: '{{ route('Get_CategoryData') }}',
                    data: {
                        'status_id': status_id,
                        'language_id': language_id
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'language_name',
                        name: 'language_name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#statusApply').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });
        };

        // ADD EDIT APP DATA CALL
        $(document).on('click', '#add_data', function() {
            document.getElementById("categorydata").reset();
            $('.modal-title').html('Add Category Data');
            $('#category_image').html('');
        })

        $(".lan_select2").select2({
            placeholder: "--Select Language--",
            width: "100%",
            ajax: {
                url: "{{ url('LanguageData') }}",
                type: "post",
                allowClear: true,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $(document).on('click', '.add_edit_data', function() {
            $("#categorydata").submit(function(e) {
                e.preventDefault();

                var formData = new FormData($('#categorydata')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ route('Add_Edit_CategoryData') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success) {
                            $('#add_edit_categorydata').modal('hide');
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
        function edit_Categorydata(editCategoryData) {

            var category_id = $(editCategoryData).data('val');
            $('#add_edit_categorydata').modal('show');
            $('.modal-title').html('Edit Category Data');
            $('#category_image').html('');

            $.ajax({
                type: "GET",
                url: "Edit_CategoryData/" + category_id,
                success: function(response) {
                    if (response.edit_data) {
                        var lan_name = response.edit_data.lan_name;
                        var lan_capspeciality = lan_name[0].toUpperCase() + lan_name.substring(1)
                            .toLowerCase();
                        $('#language_id').append(
                            `<option class="d-none" value="${response.edit_data.lan_name}" selected>${lan_capspeciality}</option>`
                        );
                        $('#category_name').val(response.edit_data.category_name);
                        $('#category_image').append('<img width="150"; src="' +
                            response.edit_data
                            .category_image +
                            '" />');
                        if (response.edit_data.is_del == 0) {
                            $('#enable').prop("checked", "true");
                        } else if (response.edit_data.is_del == 1) {
                            $('#disable').prop("checked", "true");
                        }
                        $('#category_id').val(category_id);
                    }
                },
            });
        }

        // DELETE DATA CALL ID BAY
        function delete_Categorydata(deleteCategoryData) {
            var category_id = $(deleteCategoryData).data('val');

            $.ajax({
                type: "POST",
                url: "{{ route('Delete_CategoryData') }}",
                data: {
                    'id': category_id
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

        // Filtter by Status ID BAY
        $('#statusApply').click(function() {
            var status_id = $('#statusvalue').val();
            var language_id = $('#lan_id').val();
            if (status_id != '' || language_id != '') {
                $('#table_list_data').DataTable().destroy();
                load_datatable(status_id, language_id);
            }
        });
    </script>

</body>

</html>
{{-- @endsections --}}
