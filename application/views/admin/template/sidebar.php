<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a class="text-primary" href="index.html"><i class="fa fa-compass"></i> <b>Pantura</b></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a class="text-primary" href="index.html"><b>PA</b></a>
    </div>
    <hr>
    <ul class="sidebar-menu">
        <li class="<?php if($for == 'dashboard'){echo "active";} ?>">
          <a class="nav-link" href="<?= base_url('admin/'); ?>">
            <i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item dropdown <?php if($dropdown == 'alldata'){echo "active";} ?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>General Data</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if($for == 'datasekolah'){echo "active";} ?>">
              <a class="nav-link" href="<?= base_url('admin/datasekolah'); ?>">Data Sekolah</a>
            </li>
            <li class="<?php if($for == 'datatempat'){echo "active";} ?>">
              <a class="nav-link" href="<?= base_url('admin/datatempat'); ?>">Data Tempat</a>
            </li>
            <li class="<?php if($for == 'datapos'){echo "active";} ?>">
              <a class="nav-link" href="<?= base_url('admin/datapos'); ?>">Data POS</a>
            </li>
            <li class="<?php if($for == 'datasiswa'){echo "active";} ?>">
              <a class="nav-link" href="<?= base_url('admin/datasiswa'); ?>">Data Siswa</a>
            </li>
          </ul>
        </li>
        <hr>
        <li class="menu-header px-4">Quiz</li>
        <li class="<?php if($for == 'datasoal'){echo "active";} ?>">
          <a class="nav-link" href="<?= base_url('admin/datasoal'); ?>">
            <i class="fas fa-file-medical"></i><span>Data Soal</span></a>
        </li>
        <li class="<?php if($for == 'datajawaban'){echo "active";} ?>">
          <a class="nav-link" href="<?= base_url('admin/datajawaban'); ?>">
            <i class="fas fa-pencil-ruler"></i><span>Data Jawaban</span></a>
        </li>
        <li class="<?php if($for == 'esaipanitia'){echo "active";} ?>">
          <a class="nav-link" href="<?= base_url('admin/esaipanitia'); ?>">
            <i class="fas fa-keyboard"></i><span>Esai Panitia</span></a>
        </li>
        <hr>
        <li class="menu-header px-4">Skor</li>
        <li class="nav-item dropdown <?php if($dropdown == 'dataskor'){echo "active";} ?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i> <span>Data Skor</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if($for == 'skorotomatis'){echo "active";} ?>">
              <a href="<?= base_url('admin/skorotomatis'); ?>">Skor Otomatis</a>
            </li>
            <li class="<?php if($for == 'skormanual'){echo "active";} ?>">
              <a href="<?= base_url('admin/skormanual'); ?>">Skor Manual</a>
            </li>
          </ul>
        </li>
        <li class="<?php if($for == 'papanskor'){echo "active";} ?>">
          <a class="nav-link" href="<?= base_url('admin/papanskor'); ?>">
            <i class="fas fa-trophy"></i><span>Papan Skor</span></a>
        </li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="http://rbojjes.medium.com" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Panduan Apps
        </a>
      </div>
  </aside>
</div>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $titlebread; ?></h1>
      <div class="section-header-breadcrumb">
        <?php
          for ($i=0; $i < count($contentbread); $i++) {
            $out = ($contentbread[$i][0] == '#') ? $contentbread[$i][1]:
                  "<a href='".$contentbread[$i][0]."'>".$contentbread[$i][1]."</a>";
            echo "<div class='breadcrumb-item'>".$out."</div>";
          }
        ?>
      </div>
    </div>
<style type="text/css">
  .sidebar-brand a{
    font-size: 1.8em!important;
    text-align: left!important;
  }
  .sidebar-brand{
    padding-top:10px!important;
    height:55px !important;
    line-height: 55px !important;
  }
</style>
