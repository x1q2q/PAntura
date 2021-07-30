<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between">
        <div class="col">
          <h4>Semua Data </h4>
        </div>
        <div class="col-auto">

        </div>
      </div>
      <div class="col">
        <?php if($this->session->flashdata('hijau')){ ?>
          <div class="m-2 alert alert-success alert-dismissible show fade alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Sukses </div>
              <?= $this->session->flashdata('hijau') ?></span>
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
            </div>
          </div>
         <?php } ?>
         <?php if($this->session->flashdata('merah')){ ?>
           <div class="m-2 alert alert-danger alert-dismissible show fade alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
             <div class="alert-body">
               <div class="alert-title">Peringatan </div>
               <?= $this->session->flashdata('merah') ?></span>
               <button class="close" data-dismiss="alert">
                 <span>&times;</span>
               </button>
             </div>
           </div>
          <?php } ?>
      </div>
      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table table-striped" id="table-dataskor">
            <thead>
                <th scope="col" class="sort" data-sort="username">IDENTITAS</th>
                <th scope="col" class="sort" data-sort="nm_sekolah">Sekolah</th>
                <th scope="col" class="sort" data-sort="pos_selesai">Pos Status</th>
                <th scope="col" class="sort" data-sort="tot_skor">Total Skor</th>
                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</section>
</div>

<script type="text/javascript">
  var tabel = null;
  var urldata = "<?php echo base_url('admin/dataskor/') ?>";
  var urlUpdate = urldata+'updateSkor/';
  var totPos = "<?= count(DATAPOS); ?>";
  $(document).ready(function() {
      tabel = $('#table-dataskor').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 0,'desc']], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [0,4] },
            ],

          "columns": [
              { "data": "username",
              render: function (data, type, row, meta) {
                  return '<b>('+row.username+' - '+row.regu+')</b>';
              }},
              { "data": "nm_sekolah",
              render: function (data, type, row, meta) {
                  return row.nm_sekolah;
              }},
              { "data": "pos_selesai",
              render: function (data, type, row, meta) {
                  return row.pos_selesai+' Pos / '+totPos+' Pos';
              }},
              { "data": "tot_skor",
              render: function (data, type, row, meta) {
                  return row.tot_skor+' Point';
              }},
              { "render": function ( data, type, row ) {

              var btn = '<a href="'+urldata+'detail/'+row.id_siswa+'/" class="btn btn-info btn-action shadow mr-1" '+
              ' title="update skor"> Edit <i class="fa fa-recycle"></i></a>';

                return btn;
                }
              },
          ],
      });
  });
  </script>
