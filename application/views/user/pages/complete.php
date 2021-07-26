<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PANTURA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/components.css">
  </head>

  <body class="bg-primary-black">
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg bg-primary d-flex justify-content-center navbar-user"
    >
      <a
        class="navbar-brand"
        href="#"
        >PANTURA</a
      >
    </nav>
    <!-- Navbar -->

    <!-- Main -->
    <main>
      <div class="container">
        <section>
          <div class="card lengkung-20 bg-primary my-5">
            <div class="card-header d-inline">
              <h1 class="text-center mt-5">
                SELAMAT TUGAS POS 1 <br />
                SELESAI
              </h1>
            </div>
            <div class="card-body text-center mb-3">
              <img
                src="<?= base_url('assets/'); ?>img/misi_selesai.png"
                alt="success"
                class="img-fluid"
              />
              <h4 class="mt-5">PERGI KE POS SELANJUTNYA</p>
            </div>
            <div class="card-footer">
              <a
                href="<?= base_url('/user'); ?>"
                class="btn btn-success d-block w-100 py-3 font-32 lengkung-15"
                >Home</a
              >
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- Main -->

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/tooltip.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/moment.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/'); ?>js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/'); ?>js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.js"></script>
  </body>
</html>
