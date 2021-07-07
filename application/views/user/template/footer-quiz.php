<?php $this->load->view($template); ?>

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

<script>
      
      function progressBar() {
        var progress = 1,
          timer,
          percent;
        var bar = document.getElementById("progressbar");
        var loop = function loop(progress) {
          if (progress === 60) {
            clearTimeout(timer);
          } else {
            percent = progress * 1;
            bar.style.width = percent + "px";
            bar.textContent = percent + "%";
            timer = setTimeout(loop, 1000, ++progress);
          }
        };
        loop(progress);
      }

      progressBar();

      function killCopy(e){
        return false;
    }
    function reEnable(){
        return true;
    }
    document.onselectstart=new Function ("return false");
    if (window.sidebar){
        document.onmousedown=killCopy;
        document.onclick=reEnable;
    }

      const btnfull = document.getElementById("fullscreenbtn");
      function toggleFullScreen() {
        if (
          (document.fullScreenElement && document.fullScreenElement !== null) ||
          (!document.mozFullScreen && !document.webkitIsFullScreen)
        ) {
          if (document.documentElement.requestFullScreen) {
            btnfull.setAttribute("name", "contract-outline");
            document.documentElement.requestFullScreen();
          } else if (document.documentElement.mozRequestFullScreen) {
            btnfull.setAttribute("name", "contract-outline");
            document.documentElement.mozRequestFullScreen();
          } else if (document.documentElement.webkitRequestFullScreen) {
            btnfull.setAttribute("name", "contract-outline");
            document.documentElement.webkitRequestFullScreen(
              Element.ALLOW_KEYBOARD_INPUT
            );
          }
        } else {
          if (document.cancelFullScreen) {
            btnfull.setAttribute("name", "expand-outline");
            document.cancelFullScreen();
          } else if (document.mozCancelFullScreen) {
            btnfull.setAttribute("name", "expand-outline");
            document.mozCancelFullScreen();
          } else if (document.webkitCancelFullScreen) {
            btnfull.setAttribute("name", "expand-outline");
            document.webkitCancelFullScreen();
          }
        }
      }
    </script>
</body>

</html>