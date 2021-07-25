<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PAntura &mdash; Perwira Adventure Purbalingga</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fontawesome/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/components.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/custom.css">

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/select2/dist/js/select2.min.js"></script>
</head>


<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Riwayat
              </div>
              <div class="search-item">
                <a href="#">pramuka.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#sankar-purbalingga</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Hasil Pencarian
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?= base_url('assets/'); ?>/img/products/product-3-50.png" alt="product">
                 Tempat kemah bumi perkemahan ...
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?= base_url('assets/'); ?>/img/products/product-2-50.png" alt="product">
                  Tempat Kemah di purbalingga ...
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/'); ?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $nm_admin; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('admin/login/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
