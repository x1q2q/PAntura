<?php $this->load->view($template); ?>
<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    <strong>Customized With <i class="fa fa-heart"></i> By rafikbojes </strong>
  </div>
</footer>
</div>
</div>


<!-- General JS Scripts -->
<script src="<?= base_url('assets/'); ?>vendor/popper/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/stisla.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url('assets/'); ?>js/page/bootstrap-modal.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<?php if($for == 'dashboard'){ ?>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chocolat/dist/js/jquery.chocolat.min.js"></script>
<?php } ?>



<!-- Template JS File -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>

</body>
</html>
