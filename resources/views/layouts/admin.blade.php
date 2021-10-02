<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/admin_logo.png') }}">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" />

    <!-- Icons Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.min.css') }}" />

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" />

    <!-- Responsive datatable examples -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom1.css') }}" />
    @yield('componentcss')
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="app">

        <div class="ajax-loader11" style="background-image:url('{{ asset('assets/images/Ripple-1s-200px.gif') }}" );">
        </div>

        @include("partials.topbar")
        @include("partials.sidebar")

        <section class="main-content">
            @yield('content')
        </section>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Demo.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Demo
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- END layout-wrapper -->
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8" charset="UTF-8"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>


    <!-- Required datatable js -->
    <script type="text/javascript" src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script> -->

    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/datatable-custom-cdn/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <!-- App js -->
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

    @yield('scripts')
    @php
    $routeName = Route::currentRouteName();

    $route = str_replace(".index","",$routeName);
    $all_routes =
    array("admin.forms");
    @endphp

    @if(in_array($route, $all_routes))

    <script>
        $(function() {
            var _token = $('meta[name="csrf-token"]').attr('content');

            var table = $('.datatable-User').DataTable({
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(5).footer()).html(
                        '$' + pageTotal + ' ( $' + total + ' total)'
                    );
                },
                dom: 'lBfrtip',
                buttons: [{
                        extend: 'print',
                        footer: true,
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        autoFilter: true,
                        sheetName: 'Exported data'
                    }
                ],
            });


            $('body').on('click', '.switch_checkbox_btn', function() {
                var ids = $(this).attr('entry-id');
                jQuery('.main-loader').show();
                $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: "{{ route($route.'.switchUpdate'," + ids + ") }}",
                        data: {
                            ids: ids,
                            _method: 'POST'
                        }
                    })
                    .done(function() {
                        jQuery('.main-loader').hide();
                    })
            });
            $('body').on('click', '.action-delete', function() {
                var current = $(this);
                var ids = $(this).attr('entry-id');
                Swal.fire({
                    icon: "warning",
                    title: "Are you sure delete this?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: "{{ route($route.'.destroy'," + ids + ") }}",
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                Swal.fire("Deleted!", "Successfully.",
                                    "success");
                                table.row(current.parents('tr'))
                                    .remove()
                                    .draw();
                            })
                    }
                });
            });
        });
    </script>
    @endif

    @yield('bottom-scripts')
</body>

</html>