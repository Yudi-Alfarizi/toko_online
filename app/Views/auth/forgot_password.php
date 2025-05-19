<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>Lupa Password</title>

      <!-- CSS AdminLTE -->
      <link rel="stylesheet" href="/Assets/plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="/Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <link rel="stylesheet" href="/Assets/css/adminlte.min.css">
      <link rel="stylesheet" href="/Assets/css/custom.css">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
      <div class="login-box">
            <div class="card card-outline card-primary">
                  <div class="card-header text-center">
                        <a href="#" class="h1"><b>Forgot</b>Password</a>
                  </div>
                  <div class="card-body">
                        <p class="login-box-msg"><?= sprintf(lang('Silakan masukkan Email Anda agar kami dapat mengirimkan email untuk mengatur ulang kata sandi Anda.'), $identity_label); ?></p>

                        <?php if ($message): ?>
                              <div id="infoMessage" class="alert alert-warning"><?= $message ?></div>
                        <?php endif; ?>

                        <?= form_open('auth/forgot_password'); ?>

                        <div class="input-group mb-3">
                              <?= form_input($identity + ['class' => 'form-control', 'placeholder' => 'Email atau Username']); ?>
                              <div class="input-group-append">
                                    <div class="input-group-text">
                                          <span class="fas fa-envelope"></span>
                                    </div>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col-12 mb-2">
                                    <?= form_submit('submit', lang('Auth.forgot_password_submit_btn'), ['class' => 'btn btn-primary btn-block']); ?>
                              </div>
                              <div class="col-12">
                                    <a href="<?= base_url('auth/login'); ?>" class="btn btn-secondary btn-block">
                                          <i class="fas fa-arrow-left mr-1"></i> Kembali ke Login
                                    </a>
                              </div>
                        </div>

                        <?= form_close(); ?>
                  </div>
            </div>
      </div>

      <!-- JS AdminLTE -->
      <script src="/Assets/plugins/jquery/jquery.min.js"></script>
      <script src="/Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/Assets/js/adminlte.min.js"></script>
</body>

</html>