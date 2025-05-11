<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/Assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/Assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/Assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/Assets/css/adminlte.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Assets/css/custom.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/Assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/Assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/Assets/plugins/summernote/summernote-bs4.css">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="/Assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php echo $this->include('admin/layouts/header'); ?>
        <!-- End Navbar -->

        <!-- Main Sidebar Container -->
        <?php echo $this->include('admin/layouts/sidebar'); ?>
        <!-- End sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- content -->
            <?php echo $this->renderSection('content'); ?>
        </div>
        <!-- Endcontent-wrapper -->

        <!-- Footer -->
        <?php echo $this->include('admin/layouts/footer'); ?>
        <!-- End Footer -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="/Assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/Assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/Assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/Assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/Assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/Assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/Assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/Assets/plugins/moment/moment.min.js"></script>
    <script src="/Assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/Assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/Assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/Assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/Assets/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/Assets/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/Assets/js/demo.js"></script>
    <!-- sweet alert -->
    <script src="/Assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- flash message alert -->
    <script>
        $(".delete").on("submit", function(e) {
            e.preventDefault();
            const form = this;

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(function(result) {
                if (result.value) {
                    form.submit();
                }
            });
        });
    </script>

    <!-- flash message simple -->
    <!-- <script>
        $(".delete").on("submit", function() {
            return confirm("Apakah kamu yakin ingin menghapusnya?");
        });
    </script> -->

    <!-- alert animasi -->
    <script>
        $(document).ready(function() {
            // Seleksi semua alert yang ada class auto-dismiss
            window.setTimeout(function() {
                $(".auto-dismiss").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        });

        function showSimpleProductAttributes() {
            $('#productStatus').prop("required", true);
            $('#productPrice').prop("required", true);
            $('#productStock').prop("required", true);
            $('#productWeight').prop("required", true);
            $(".simple-attributes").show();
        }

        function hideSimpleProductAttributes() {
            $('#productStatus').prop("required", false);
            $('#productPrice').prop("required", false);
            $('#productStock').prop("required", false);
            $('#productWeight').prop("required", false);
            $(".simple-attributes").hide();
        }

        function hideConfigurableAttributes() {
            $(".configurable-attributes").hide();
        }

        function showConfigurableAttributes() {
            $(".configurable-attributes").show();
        }

        function showHideProductAttributes() {
            var productType = $(".product-type").val();

            if (productType == 'simple') {
                showSimpleProductAttributes();
                hideConfigurableAttributes();
            } else if (productType == 'configurable') {
                showConfigurableAttributes();
                hideSimpleProductAttributes();
            } else {
                hideSimpleProductAttributes();
                hideConfigurableAttributes();
            }
        }

        $(function() {
            showHideProductAttributes();
            $(".product-type").change(function() {
                showHideProductAttributes();
            });
        });
    </script>
</body>

</html>