<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="/Assets/css/adminlte.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/Assets/css/custom.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b><?= lang('Auth.login_heading'); ?></b>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?= lang('Silakan login dengan email/nama pengguna & kata sandi Anda di bawah ini.'); ?></p>

        <?php if ($message): ?>
          <div id="infoMessage" class="alert alert-danger auto-dismiss">
            <?= $message ?>
          </div>
        <?php endif; ?>

        <?= form_open('auth/login') ?>
        <div class="input-group mb-3">
          <?= form_input($identity + ['class' => 'form-control', 'placeholder' => lang('Auth.login_identity_label')]) ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <?= form_input($password + [
            'class' => 'form-control',
            'placeholder' => lang('Auth.login_password_label'),
            'id' => 'password',
          ]) ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <?= form_checkbox('remember', '1', false, ['id' => 'remember']) ?>
              <label for="remember">
                <?= lang('Auth.login_remember_label') ?>
              </label>
            </div>
          </div>
          <div class="col-4">
            <?= form_submit('submit', lang('Auth.login_submit_btn'), ['class' => 'btn btn-primary btn-block']) ?>
          </div>
        </div>
        <?= form_close() ?>

        <div class="text-center mt-3">
          <a href="<?= site_url('auth/forgot_password') ?>" class="btn btn-outline-secondary btn-sm mb-2">
            <i class="fas fa-unlock-alt mr-1"></i> <?= lang('Auth.login_forgot_password'); ?>
          </a>
          <br>
          <a href="<?= site_url('auth/create_user') ?>" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-user-plus mr-1"></i> <?= lang('Buat akun baru') ?? 'Daftar Akun Baru'; ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== JS ====== -->
  <script src="/Assets/plugins/jquery/jquery.min.js"></script>
  <script src="/Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/Assets/js/adminlte.min.js"></script>
  <script>
    // Auto dismiss alert
    $(document).ready(function() {
      window.setTimeout(function() {
        $(".auto-dismiss").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 3000);
    });
  </script>
  <script>
    // Toggle show/hide password
    $(document).ready(function() {
      $('#togglePassword').on('click', function() {
        const passwordField = $('#password');
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
      });

      // Auto dismiss alert
      window.setTimeout(function() {
        $(".auto-dismiss").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 3000);
    });
  </script>
</body>

</html>