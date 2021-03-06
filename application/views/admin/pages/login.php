<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin PAntura Login &mdash; Perwira Adventure Purbalingga</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fontawesome/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap-social/bootstrap-social.css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/components.css">
</head>
<body>

<div id="app">
  <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        <div class="p-4 m-3">
          <div class="text-center mb-2">
              <i class="fa fa-compass fa-7x mb-2" style="color:var(--cyan)"></i>
              <h3 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">PAntura</span></h3>
              <p class="text-muted">Silakan menghubungi admin untuk mendapatkan akun.</p>
          </div>
          <?php if($this->session->flashdata('login_gagal')){ ?>
            <div class="alert alert-danger alert-dismissible show fade alert-has-icon">
              <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
              <div class="alert-body">
                <div class="alert-title">Peringatan! </div>
                <?= $this->session->flashdata('login_gagal') ?></span>
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
              </div>
            </div>
          <?php } ?>
          <form method="POST" action="<?= base_url('admin/login/dologin'); ?>" class="needs-validation" novalidate="">
            <div class="form-group">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info"> <i class="fa fa-user text-white"></i> </div>
                </div>
                <input id="username" type="text" class="form-control" name="username"
                tabindex="1" required autofocus placeholder="masukkan username anda">
                <div class="invalid-feedback">
                Silakan isi username anda
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info"> <i class="fa fa-eye text-white"></i> </div>
                </div>
                <input id="password" type="password" class="form-control" name="password"
                tabindex="2" required placeholder="masukkan password anda">
                <div class="invalid-feedback">
                 Silakan isi password anda
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div>

            <div class="form-group text-right">
              <a href="auth-forgot-password.html" class="float-left mt-3">
                Forgot Password?
              </a>
              <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                LOGIN <span class="btn-inner--icon"><i class="fa fa-key"></i></span>
              </button>
            </div>

          </form>

          <div class="text-center mt-5 text-small">
            Copyright &copy; <b>rafikbojes.</b> <br/> Made with ???? by Stisla
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
      data-background="https://images.unsplash.com/photo-1510797215324-95aa89f43c33?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1875&q=80">
        <div class="absolute-bottom-left index-2">
          <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
              <h1 class="mb-2 display-4 font-weight-bold">Perwira Adventure Purbalingga</h1>
              <h5 class="font-weight-normal text-muted-transparent">Purbalingga, Jawa Tengah Indonesia</h5>
            </div>
            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/popper/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/stisla.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>

</body>
</html>
