<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>Edit User</title>

      <!-- CSS AdminLTE -->
      <link rel="stylesheet" href="/Assets/plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="/Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <link rel="stylesheet" href="/Assets/css/adminlte.min.css">
      <link rel="stylesheet" href="/Assets/css/custom.css">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
      <div class="login-box" style="width: 600px;">
            <div class="card card-outline card-info">
                  <div class="card-header text-center">
                        <a href="#" class="h1"><b>Edit</b> Profile</a>
                  </div>
                  <div class="card-body">
                        <p class="login-box-msg"><?= lang('Silakan masukkan informasi pengguna di bawah ini.'); ?></p>

                        <?php if ($message): ?>
                              <div class="alert alert-info auto-dismiss"><?= $message ?></div>
                        <?php endif; ?>

                        <?= form_open(uri_string()); ?>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_fname_label'), 'first_name'); ?>
                              <?= form_input($first_name + ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_lname_label'), 'last_name'); ?>
                              <?= form_input($last_name + ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_company_label'), 'company'); ?>
                              <?= form_input($company + ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_phone_label'), 'phone'); ?>
                              <?= form_input($phone + ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_password_label'), 'password'); ?>
                              <?= form_input($password + ['class' => 'form-control']); ?>
                        </div>

                        <div class="form-group">
                              <?= form_label(lang('Auth.edit_user_password_confirm_label'), 'password_confirm'); ?>
                              <?= form_input($password_confirm + ['class' => 'form-control']); ?>
                        </div>

                        <?php if ($ionAuth->isAdmin()): ?>
                              <h5 class="mt-4"><?= lang('Auth.edit_user_groups_heading'); ?></h5>
                              <div class="form-group">
                                    <?php foreach ($groups as $group): ?>
                                          <?php
                                          $gID = $group['id'];
                                          $checked = null;
                                          foreach ($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                      $checked = ' checked="checked"';
                                                      break;
                                                }
                                          }
                                          ?>
                                          <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="groups[]" value="<?= $group['id']; ?>" <?= $checked; ?>>
                                                <label class="form-check-label"><?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></label>
                                          </div>
                                    <?php endforeach; ?>
                              </div>
                        <?php endif; ?>

                        <?= form_hidden('id', $user->id); ?>

                        <div class="row">
                              <div class="col-6">
                                    <?= form_submit('submit', lang('Auth.edit_user_submit_btn'), ['class' => 'btn btn-info btn-block']); ?>
                              </div>
                              <div class="col-6">
                                    <a href="<?= base_url('/'); ?>" class="btn btn-secondary btn-block">
                                          <i class="fas fa-home mr-1"></i> Kembali ke Home
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

      <!-- Auto-dismiss alert -->
      <script>
            setTimeout(() => {
                  $(".auto-dismiss").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                  });
            }, 3000);
      </script>

</body>

</html>