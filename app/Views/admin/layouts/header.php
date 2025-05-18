<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- Sidebar toggle -->
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Toggle Sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <!-- Kembali ke Home -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url('/') ?>" class="nav-link font-weight-bold">
                <i class="fas fa-home mr-1"></i> Kembali ke Home
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="<?= base_url('Assets/img/avatar.png') ?>" alt="Admin Avatar" class="img-circle" style="width:36px; height:36px; object-fit:cover; border: 2px solid #fff;">
                <span class="ml-2 text-white font-weight-bold d-none d-md-inline">Admin</span>
                <i class="fas fa-caret-down ml-1 text-white"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow">
                <a href="<?= site_url('admin/profile') ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="<?= site_url('admin/settings') ?>" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt mr-2"></i> Logout
                    ( <?php echo $currentUser->first_name ?>)
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->