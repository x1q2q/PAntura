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
          <table class="table table-striped" id="table-skoringesai">
            <thead>
                <th scope="col" class="sort" data-sort="kode_jawaban">Kode - POS</th>
                <th scope="col" class="sort" data-sort="nm_sekolah">Penjawab - Sekolah</th>
                <th scope="col" class="sort" data-sort="soal">Soal - Jawaban</th>
                <th scope="col" class="sort" data-sort="jawaban">JWBN. SISWA</th>
                <th scope="col" class="sort text-center" data-sort"skoring">Skoring</th>
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
<style type="text/css">
  .input-skor{
    width: 80px;
  }
</style>
<script type="text/javascript">
  var tabel = null;
  var urldata = "<?php echo base_url('admin/skoringesai/') ?>";
  $(document).ready(function() {
      tabel = $('#table-skoringesai').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 3, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [4] },
            ],

          "columns": [
              { "data": "kode_jawaban",
              render: function (data, type, row, meta) {
                var pos = '<br/>'+row.nm_pos+'<br/>'+row.nm_tempat;
                return '<span class="badge badge-dark">'+row.kode_jawaban+'</span>'+pos;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                var sekolah = '<br/>'+row.nm_sekolah;
                  return '<b>('+row.username+' - '+row.regu+')</b>'+sekolah;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                var jwbn = '(Jawaban: '+row.pilihan+')';
                  return row.soal+jwbn;
              }},
              { "data": "jawaban"},
              { "render": function ( data, type, row ) {

                var btn = '<div class="btn-group"> <input type="number" class="input-skor" placeholder="0-100">'+
                  '<a class="btn btn-success btn-action mr-1" data-toggle="tooltip"'+
                  ' title="Detail" >Update</a></div>';
                  return btn;
                }
              },
          ],
      });
  });
  </script>
