<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between">
        <div class="col">
          <h4>Semua Data </h4>
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
          <table class="table table-striped" id="table-papanskor">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="no">No.</th>
                <th scope="col" class="sort" data-sort="username">Username</th>
                <th scope="col" class="sort" data-sort="regu">Regu</th>
                <th scope="col" class="sort" data-sort="nm_sekolah">Sekolah</th>
                <th scope="col" class="sort" data-sort="pos_selesai">POS Status</th>
                <th scope="col" class="sort" data-sort="total_skor">Total Skor</th>
                <th scope="col" class="sort" data-sort="peringkat">Peringkat</th>
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
  var urldata = "<?php echo base_url('admin/papanskor/') ?>";
  var totPos = "<?= count(DATAPOS); ?>";
  $(document).ready(function() {
      tabel = $('#table-papanskor').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 5, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 20, 30],[ 10, 20, 30]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [0] },
            ],

          "columns": [
              {"data": "username",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "username"},
              {"data": "regu",
              render: function (data, type, row, meta) {
                  return '<span class="badge badge-dark">'+row.regu+'</span>';
              }},
              { "data": "nm_sekolah"},
              {"data": "pos_selesai",
              render: function (data, type, row, meta) {
                  return row.pos_selesai+' Pos / '+totPos+' Pos';
              }},
              {"data": "total_skor",
              render: function (data, type, row, meta) {
                  return row.total_skor+' Point';
              }},
              {"data": "peringkat",
              render: function (data, type, row, meta) {
                // 5 besar berwarna hijau, 10 besar berwarna biru & selanjutnya kuning
                var warna = (row.peringkat <= 5)?'success':((row.peringkat >= 6 && row.peringkat <= 10 ) ? 'primary' :'warning');
                  return '<span class="badge badge-'+warna+'">'+'Peringkat ke-'+ row.peringkat+'</span>';
              }},
          ],
      });


  });
  </script>
