<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PANTURA</title>

    <link rel="shortcut icon" href="<?= base_url('assets/') ?>/img/favicon.ico" type="image/x-icon">
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
      class="navbar navbar-expand-lg bg-primary d-flex justify-content-between navbar-user"
    >
      <a
        class="navbar-brand btn-white px-3 lengkung-15 text-primary py-2"
        href="#"
        >Kembali</a
      >
      <ion-icon
        name="expand-outline"
        id="fullscreenbtn"
        class="text-white"
        style="width: 40px; height: 40px"
        onclick="toggleFullScreen()"
      ></ion-icon>
    </nav>
    <!-- Navbar -->