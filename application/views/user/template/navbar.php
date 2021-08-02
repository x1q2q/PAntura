<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANTURA</title>

    <link rel="shortcut icon" href="<?= base_url('assets/') ?>/img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
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

<body class="bg-primary">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-user">
        <a class="navbar-brand" href="<?= base_url('user/'); ?>">PANTURA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('user/'); ?>">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="panduan.html">PANDUAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user/profil'); ?>">PROFIL</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->