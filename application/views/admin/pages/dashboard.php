    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-success bg-success">
            <i class="fas fa-university"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Sekolah</h4>
            </div>
            <div class="card-body">
              <?= $this->m_global->get_summary1('totalSekolah'); ?>
            </div>
          </div>
          <div class="card-stats py-2 bg-success">
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary1('totalTempat'); ?>
                </div>
                <div class="card-stats-item-label text-white">Total Tempat</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary1('totalPOS'); ?>
                </div>
                <div class="card-stats-item-label text-white">Total POS</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-info">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa/Regu</h4>
            </div>
            <div class="card-body">
              <?= $this->m_global->get_summary2('totalSiswa'); ?>
            </div>
          </div>
          <div class="card-stats py-2 bg-info">
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary2('telahLogin'); ?>
                </div>
                <div class="card-stats-item-label text-white">Telah Login</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary2('belumLogin'); ?>
                </div>
                <div class="card-stats-item-label text-white">Belum Login</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-warning bg-warning">
            <i class="fas fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total SOAL</h4>
            </div>
            <div class="card-body">
              <?= $this->m_global->get_summary3('totalSoal'); ?>
            </div>
          </div>
          <div class="card-stats py-2 bg-warning">
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary3('totalPilgan'); ?>
                </div>
                <div class="card-stats-item-label text-white">Total PILGAN</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                    <?= $this->m_global->get_summary3('totalEsai'); ?>
                </div>
                <div class="card-stats-item-label text-white">Total ESAI</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-danger">
            <i class="fas fa-clipboard-check"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Regu Selesai </h4>
            </div>
            <div class="card-body">
              <?= $this->m_global->get_summary4('reguSelesai'); ?>
            </div>
          </div>
          <div class="card-stats py-2 bg-danger">
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                  <?= $this->m_global->get_summary4('jawabanMasuk'); ?>
                </div>
                <div class="card-stats-item-label text-white">Jawaban Masuk</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count text-white">
                  <?= $this->m_global->get_summary4('belumDiskoring'); ?>
                </div>
                <div class="card-stats-item-label text-white">Belum Diskoring</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>NOTIFIKASI</h4>
            </div>
            <div class="card-body pb-0">
              <?php if($this->session->flashdata('login_sukses')){ ?>
                <div class="alert alert-success alert-dismissible show fade alert-has-icon">
                  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                  <div class="alert-body">
                    <div class="alert-title">Sukses </div>
                    <?= $this->session->flashdata('login_sukses') ?></span>
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                  </div>
                </div>
              <?php }else{ ?>
                <p>Tidak ada notifikasi.</p>
              <?php } ?>
            </div>
            <div class="card-footer pt-0">
              <button class="btn btn-primary">Buka Notifikasi Lainnya</button>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
<style type="text/css">
.card .card-stats .card-stats-item {
  width: calc(100% / 2)!important;
}
</style>
