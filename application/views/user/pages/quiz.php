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
      <form action="<?= base_url('user/inputjawaban'); ?>" method="post" id="kawah-soal">
      <?php
        foreach ($dt_pos as $res) {
      ?>
        <input type="text" name="pos_id" id="pos_id" value="<?= $res['pos_id'];?>" hidden>
        <input type="text" name="kode_jawaban" id="kode_jawaban" value="<?= $res['kode'];?>" hidden>
      <?php
        }
      ?>
      <?php
      foreach ($dt_soal as $value) :
      ?>
        <section class="box-soal">
          <div class="row d-flex align-items-star justify-content-between">
            <div class="col">
              <div class="card lengkung-20 bg-primary">
                <div class="card-header d-inline">
                  <div class="row">
                    <div class="col-lg-12 col-sm-12 mt-3">
                      <div class="font-20" id="soal" data-jenis="<?= $value["jenis"];?>">
                        <?= $value["soal"]; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center">
                  <?php if($value["jenis"] == "pilgan"):?>
                  <?php
                  $nopil = 1;
                  foreach ($value["dt_pilihan"] as $ans) : ?>
                    <div class="row">
                      <div class="col mb-3">
                        <label class="d-block
                          w-100" for="<?= $value["id_soal"] ?>-<?= $nopil ?>">
                          <div type="button" class="
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
                            <input type="radio" data-idpilihan="<?= $ans["id_quizpilihan"] ?>" data-pilihan="<?= $ans["pilihan"]; ?>" name="<?= $value["id_soal"] ?>"
                            value="<?= $ans['is_benar'] ?>" id="<?= $value["id_soal"] ?>-<?= $nopil ?>">
                            <?= $ans["pilihan"] ?>
                          </div>
                        </label>
                      </div>
                    </div>
                  <?php
                    $nopil++;
                  endforeach; ?>
                  <?php else:?>
                    <?php foreach ($value["dt_pilihan"] as $ans) :  ?>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                              <textarea class="form-control lengkung-15 jawaban-essay" data-idpilihan="<?= $ans["id_quizpilihan"] ?>" data-pilihan="<?= $ans["pilihan"]; ?>" name="<?= $value["id_soal"] ?>" placeholder="isi disini" style="height: 240px !important;"></textarea>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif;?>
                </div>
              </div>
            </div>
        </section>
      <?php endforeach; ?>
      <section class="mb-5">
        <div class="row">
          <div class="col">
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" id="submit" class="btn btn-success d-block w-100 py-3 font-32 lengkung-15">Kirim</a>
          </div>
        </div>
      </section>
    </form>
  </div>
</main>
<!-- Main -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-24">
        Apakah Anda yakin sudah selesai?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger font-24 p-3" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-success font-24 p-3" onclick="submitAll()">Ya, kirim</button>
      </div>
    </div>
  </div>
</div>
