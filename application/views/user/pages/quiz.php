<!-- Main -->
<style>
/* input[type=radio]{
  float: left;
} */
</style>
<main>
  <div class="container">
    <section>
      <div class="row mt-5">
        <div class="col">
          <div class="progress mb-3">
            <div class="progress-bar font-32" role="progressbar" id="progressbar" data-width="100" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              50%
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="row">
        <div class="col mt-5">
          <div class="card text-center lengkung-20">
            <div class="card-header d-inline pt-5" style="background-image: url('<?= base_url('assets/'); ?>img/PIC1.jpg'); min-height: 217px; background-position: center; background-size: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;">
              <h1 class="text-white text-shadow"><?php
                                                  foreach ($dt_pos as $res) {
                                                    echo strtoupper($res["nm_pos"]) . '</br>' . $res["deskripsi_pos"];
                                                  }
                                                  ?></h1>
              <p class="text-white text-shadow">
                <?php
                foreach ($dt_pos as $res) {
                  echo strtoupper($res["lokasi_pos"]);
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
      <form action="<?= base_url('user/inputjawaban');?>" method="post">
      <input type="text" name="user" id="user" value="<?= $this->session->userdata('user'); ?>" hidden>
      <?php
      foreach ($dt_soal as $value) :
      ?>
        <section>
          <div class="row d-flex align-items-star justify-content-between">
            <div class="col">
              <div class="card lengkung-20 bg-primary">
                <div class="card-header d-inline">
                  <div class="row">
                    <?php if ($value["gambar"] > 0) { ?>
                      <div class="col-lg-6 col-sm-12">
                        <img src="<?= base_url('assets/'); ?>img/img_soal_placeholder.png" alt="image soal" class="img-fluid" />
                      </div>
                    <?php } ?>
                    <div class="col-lg-6 col-sm-12 mt-3">
                      <p class="font-20" id="soal">
                        <?= strip_tags($value["soal"]); ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center">

                  <?php
                  $nopil = 1;
                  foreach ($value["dt_pilihan"] as $ans) : ?>
                    <div class="row">
                      <div class="col mb-3">
                        <label class="d-block
                          w-100" for="<?=$value["id_soal"]?>-<?= $nopil?>"><div type="button" class="
                          btn 
                          <?php if ($nopil == 1) : ?>
                          btn-info
                          <?php elseif ($nopil == 2) : ?>
                          btn-danger
                          <?php elseif ($nopil == 3) : ?>
                          btn-warning
                          <?php elseif ($nopil == 4) : ?>
                          btn-dark
                          <?php endif; ?>

                          d-block
                          w-100
                          font-20
                          lengkung-20
                          white-space
                          py-3
                        ">
                            <input type="radio" name="<?=$value["id_soal"]?>" value="<?= $nopil?>" id="<?=$value["id_soal"]?>-<?= $nopil?>">
                            <?= $ans["pilihan"] ?>
                          </div>
                        </label>
                      </div>
                    </div>
                  <?php
                    $nopil++;
                  endforeach; ?>
                </div>
              </div>
            </div>
        </section>
      <?php endforeach; ?>
      <section class="mb-5">
        <div class="row">
          <div class="col">
            <button type="submit" id="submit" class="btn btn-success d-block w-100 py-3 font-32 lengkung-15">Kirim</a>
          </div>
        </div>
      </section>
      </form>
  </div>
</main>
<!-- Main -->