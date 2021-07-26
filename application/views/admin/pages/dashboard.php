    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>News</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Reports</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Online Users</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <form method="post" class="needs-validation" novalidate="">
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
        </form>
      </div>
    </div>
  </section>
</div>
