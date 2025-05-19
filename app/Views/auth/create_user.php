<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>Register Akun Baru</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- ====== CSS ====== -->
      <!-- Font Awesome -->
      <link rel="stylesheet" href="/Assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
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
      <!-- Summernote -->
      <link rel="stylesheet" href="/Assets/plugins/summernote/summernote-bs4.css">
      <!-- Sweetalert2 -->
      <link rel="stylesheet" href="/Assets/plugins/sweetalert2/sweetalert2.min.css">
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

      <div class="container mt-5">
            <div class="row justify-content-center">
                  <div class="col-md-6">
                        <div class="card card-primary shadow">
                              <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-user-plus"></i> <?= lang('Register Akun Baru') ?></h3>
                              </div>
                              <div class="card-body">
                                    <p><?= lang('Auth.create_user_subheading') ?></p>

                                    <?php if (!empty($message)): ?>
                                          <div id="infoMessage" class="alert alert-danger auto-dismiss">
                                                <?= $message ?>
                                          </div>
                                    <?php endif; ?>

                                    <?= form_open('auth/create_user') ?>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_fname_label'), 'first_name') ?>
                                          <?= form_input($first_name + ['class' => 'form-control', 'placeholder' => 'Nama Depan']) ?>
                                    </div>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_lname_label'), 'last_name') ?>
                                          <?= form_input($last_name + ['class' => 'form-control', 'placeholder' => 'Nama Belakang']) ?>
                                    </div>

                                    <?php if ($identity_column !== 'email'): ?>
                                          <div class="form-group">
                                                <?= form_label(lang('Auth.create_user_identity_label'), 'identity') ?>
                                                <?= form_input($identity + ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                                                <small class="text-danger"><?= \Config\Services::validation()->getError('identity') ?></small>
                                          </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_company_label'), 'company') ?>
                                          <?= form_input($company + ['class' => 'form-control', 'placeholder' => 'Perusahaan']) ?>
                                    </div>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_email_label'), 'email') ?>
                                          <?= form_input($email + ['class' => 'form-control', 'placeholder' => 'Email']) ?>
                                    </div>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_phone_label'), 'phone') ?>
                                          <?= form_input($phone + ['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) ?>
                                    </div>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_password_label'), 'password') ?>
                                          <?= form_input($password + ['class' => 'form-control', 'placeholder' => 'Kata Sandi']) ?>
                                    </div>

                                    <div class="form-group">
                                          <?= form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm') ?>
                                          <?= form_input($password_confirm + ['class' => 'form-control', 'placeholder' => 'Konfirmasi Kata Sandi']) ?>
                                    </div>

                                    <div class="row">
                                          <div class="col-6">
                                                <?php echo form_submit('submit', lang('Buat akun'), ['class' => 'btn btn-primary btn-block']); ?>
                                          </div>
                                          <div class="col-6">
                                                <a href="<?= base_url('auth/login'); ?>" class="btn btn-secondary btn-block">
                                                      <i class="fas fa-sign-in-alt mr-1"></i> Kembali ke Login
                                                </a>
                                          </div>
                                    </div>


                                    <?= form_close() ?>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- ====== JAVASCRIPT ====== -->
      <!-- jQuery -->
      <script src="/Assets/plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI -->
      <script src="/Assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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
      <!-- jQuery Knob -->
      <script src="/Assets/plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- Daterangepicker -->
      <script src="/Assets/plugins/moment/moment.min.js"></script>
      <script src="/Assets/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus -->
      <script src="/Assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="/Assets/plugins/summernote/summernote-bs4.min.js"></script>
      <!-- OverlayScrollbars -->
      <script src="/Assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE -->
      <script src="/Assets/js/adminlte.js"></script>
      <!-- SweetAlert2 -->
      <script src="/Assets/plugins/sweetalert2/sweetalert2.min.js"></script>

      <!-- Flash message dismiss -->
      <script>
            $(document).ready(function() {
                  window.setTimeout(function() {
                        $(".auto-dismiss").fadeTo(500, 0).slideUp(500, function() {
                              $(this).remove();
                        });
                  }, 3000);
            });
      </script>

</body>

</html>