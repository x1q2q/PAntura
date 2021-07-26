<?php $this->load->view($template); ?>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
<script src="<?= base_url('assets/'); ?>vendor/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/summernote/summernote-bs4.js"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>

<script>
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
      console.log("hidden")
    } else {
      location.reload()
    }
  })
  String.prototype.toHHMMSS = function() {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours < 10) {
      hours = "0" + hours;
    }
    if (minutes < 10) {
      minutes = "0" + minutes;
    }
    if (seconds < 10) {
      seconds = "0" + seconds;
    }
    return hours + ':' + minutes + ':' + seconds;
  }

  // console.log("5678".toHHMMSS())

  function progressBar(i) {
    let time
    if (localStorage.getItem('waktu') === null) {
      time = i
    } else {
      time = localStorage.getItem('waktu')
    }
    let progress = 1
    let timer
    let percent
    let bar = document.getElementById("progressbar");
    let loop = function loop(progress) {
      if (progress >= time + 1) {
        clearTimeout(timer);
        document.getElementById('submit').click()
        localStorage.removeItem('waktu')
      } else {
        // let lah
        percent = progress * (100 / 60);
        waktu = time - progress;
        if (waktu < 10) {
          bar.classList.add('bg-danger')
        }
        // if(localStorage.getItem('bar') === null){
        //   bar.style.width = 100 + "%"
        // }else{
        //   lah = localStorage.getItem('bar')
        //   lah = lah.slice(0,-1)
        //   console.log(lah)
        // }
        // bar.style.width = 100 - Math.floor(percent) + "%";
        bar.style.width = 100 + "%";
        bar.textContent = waktu.toString().toHHMMSS();
        timer = setTimeout(loop, 1000, ++progress);
        // localStorage.setItem('bar', percent)
        localStorage.setItem('waktu', waktu)
      }
    };
    loop(progress);
  }

  progressBar(60);

  var urldata = "<?php echo base_url('user/quiz/') ?>";

  function submitAll(){
    var dtJawaban = [];
    var pos_id = $('#pos_id').val();
    var kode_jawaban = $('#kode_jawaban').val();
    var dtpilihane = [];
    $('#kawah-soal .box-soal').each(function(){
      $(this).find('.row .col .card .card-body').each(function(){
        var pilbenar = $(this).find('.row .col label input:checked').val();
          dtpilihane.push({
            "quizsoal_id": $(this).find('.row .col label input:checked').attr('name'),
            "quizpilihan_id": $(this).find('.row .col label input:checked').data('idpilihan'),
            "jawaban_pilihan": $(this).find('.row .col label input:checked').data('pilihan'),
            "is_benar": (pilbenar=='1')?pilbenar:'0'
          });
      });
      //
      dtJawaban.push({
          "kode_jawaban": kode_jawaban,
          "pos_id": pos_id,
          "dtpilihan":dtpilihane
      });
    }); // each lsiting box soal
    inputDatabase(dtJawaban);
  }
  function inputDatabase(dtJawaban){
    var jawaban = JSON.stringify(dtJawaban);
    $.ajax({
         type: "POST",
         url:  urldata+'inputjawaban/',
         data: {jawaban: jawaban},
         cache:false,
         success: function(data){
            window.location.replace(data);
          }
    });
  }

  function killCopy(e) {
    return false;
  }

  function reEnable() {
    return true;
  }
  document.onselectstart = new Function("return false");
  if (window.sidebar) {
    document.onmousedown = killCopy;
    document.onclick = reEnable;
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
