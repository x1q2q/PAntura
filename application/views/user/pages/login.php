<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <link rel="shortcut icon" href="<?= base_url('assets/') ?>/img/favicon.ico" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fontawesome/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap-social/bootstrap-social.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/components.css">
</head>

<body style="background-image: url('http://localhost/pantura/assets/img/PIC1.jpg'); background-position: center; background-size: cover;">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header mt-5 justify-content-center">
                                <i class="fa fa-compass fa-3x mb-2 text-primary"></i>
                                <div>
                                    <h3 class="font-32 text-primary">PANTURA</h3>
                                </div>
                            </div>

                            <div class="card-body mb-5">
                                <?php if ($this->session->flashdata('login_gagal')) { ?>
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
                                <form method="POST" action="<?= base_url('user/login/dologin'); ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>

                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <!-- <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div> -->
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

                                    </div>

                                    <div class="form-group pt-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
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