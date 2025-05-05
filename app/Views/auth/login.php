<!-- Bootstrap 4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<div class="container mt-5" style="max-width: 400px;">
  <h2 class="mb-4 text-center"><?php echo lang('Auth.login_heading'); ?></h2>
  <p class="text-muted text-center"><?php echo lang('Auth.login_subheading'); ?></p>

  <?php if ($message): ?>
    <div id="infoMessage" class="alert alert-danger text-center">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>

  <?php echo form_open('auth/login'); ?>

  <div class="form-group">
    <?php echo form_label(lang('Auth.login_identity_label'), 'identity'); ?>
    <?php echo form_input($identity + ['class' => 'form-control']); ?>
  </div>

  <div class="form-group">
    <?php echo form_label(lang('Auth.login_password_label'), 'password'); ?>
    <?php echo form_input($password + ['class' => 'form-control']); ?>
  </div>

  <div class="form-group form-check">
    <?php echo form_checkbox('remember', '1', false, ['class' => 'form-check-input', 'id' => 'remember']); ?>
    <?php echo form_label(lang('Auth.login_remember_label'), 'remember', ['class' => 'form-check-label']); ?>
  </div>

  <div class="form-group">
    <?php echo form_submit('submit', lang('Auth.login_submit_btn'), ['class' => 'btn btn-primary btn-block']); ?>
  </div>

  <?php echo form_close(); ?>

  <p class="text-center">
    <a href="forgot_password"><?php echo lang('Auth.login_forgot_password'); ?></a>
  </p>
</div>







