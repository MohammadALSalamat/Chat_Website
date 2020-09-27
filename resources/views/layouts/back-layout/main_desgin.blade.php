<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abo-shop | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ url('admin-style/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('admin-style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin-style/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ url('admin-style/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <!-- here to add extra links from other pages -->
    <!-- here to add Style for editor -->
    <!-- Summernote -->
    <script src="{{ url('admin-style/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- buttons style-->
    <link rel="stylesheet" href="{{ url('css/backend_css/theme.css') }}">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- navbar-->
        @include('layouts.back-layout.navbar');
        <!-- sidebar-->
        @include('layouts.back-layout.sidebar');
        <!-- main content-->
        @yield('content')

        <!-- /.Footer-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-pre
            </div>
            <strong>Copyright &copy;2020 <a href="#">Mohammad Al Salamat</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div> <!-- end of div Wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin-style/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('admin-style/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin-style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('admin-style/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('admin-style/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('admin-style/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('admin-style/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('admin-style/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('admin-style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ url('admin-style/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ url('admin-style/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ url('admin-style/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ url('admin-style/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ url('admin-style/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('admin-style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin-style/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admin-style/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('admin-style/dist/js/pages/dashboard.js') }}"></script>
    <!-- here to add extra links from other pages -->
    <!-- dropzonejs -->
    <script src="{{ url('admin-style/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ url('admin-style/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/toastr/extra_toastr.js') }}"></script>
    <!-- sweet alert -validation -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- //sweet alert for confirmation --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"></script>
    {{-- //sweet alert for confirmation --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    {{-- //sweet alert for confirmation --}}

    {!! Toastr::message() !!}
    @yield('script')
    <script>
        // New Way to Delet Recods

        $(".deleteRecord").click(function() {
            let id = $(this).attr("rel");
            let deletProduct = $(this).attr("rel1");
            // use swal from the sweetAlert page plugin
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this File again!",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'No,Cancel',
                    confirmButtonText: 'Yes, Delete it',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                },
                function() {
                    window.location.href = "/admin/" + deletProduct + "/" + id;
                    swal("Poof! Your imaginary file has been deleted!", {
                        type: "success",

                    });
                });

        });

    </script>
</body>

</html>
