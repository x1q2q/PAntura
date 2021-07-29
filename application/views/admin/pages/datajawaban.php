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
          <table class="table table-striped" id="table-viewjwbn">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="id_quizjawaban">No.</th>
                <th scope="col" class="sort" data-sort="kode_jawaban">#KODE Soal</th>
                <th scope="col" class="sort" data-sort="siswa_regu">Penjawab</th>
                <th scope="col" class="sort" data-sort="nm_sekolah">Sekolah</th>
                <th scope="col" class="sort" data-sort="nm_pos">POS Tempat</th>
                <th scope="col" class="sort" data-sort="submited_at">TGL Submit</th>
                <th scope="col" class="sort text-center" data-sort"aksi">Aksi</th>
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

<?php
  // modal page section

  $md_hapus = array(
    'div_id'      => 'modal-delete',
    'btn_color'   => 'danger',
    'btn_title'   => 'Ya, Hapus',
  );
  $this->load->view('admin/pages/md_konfirm',$md_hapus);
?>

<script type="text/javascript">
  var tabel = null;
  var urldata = "<?php echo base_url('admin/datajawaban/') ?>";
  $(document).ready(function() {
      tabel = $('#table-viewjwbn').DataTable({
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
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [6] },
            ],

          "columns": [
              {"data": "id_quizjawaban",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "kode_jawaban",
              render: function (data, type, row, meta) {
                return '<span class="badge badge-dark">'+row.kode_jawaban+'</span>';
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                  return '<b>('+row.username+' - '+row.regu+')</b>';
              }},
              { "data": "nm_sekolah"},
              { "data": "nm_pos",
              render: function (data, type, row, meta) {
                return '<u>'+row.nm_pos+'-'+row.nm_tempat+'</u>';
              }},
              { "data": "submited_at"},
              { "render": function ( data, type, row ) {

                var btn = '<a href="'+urldata+'detail/'+row.siswa_id+'/'+row.kode_jawaban+'"'+
                  ' class="btn btn-primary btn-action mr-1" data-toggle="tooltip"'+
                  ' title="Detail" >Detail <i class="fas fa-eye"></i></a>';
                  return btn;
                }
              },
          ],
      });
    //
    //  $("#modal-delete").on('show.bs.modal', function (e) {
    //     let trgL = $(e.relatedTarget);
    //     let link = trgL.data("link");
    //     let jawaban = trgL.data("jawaban");
    //
    //     $(this).find(".modal-header .modal-title").text("Konfirmasi Hapus JAWABAN");
    //     $(this).find('.modal-footer a').attr("href",link);
    //     $(this).find(".modal-body").html("Yakin Menghapus jawban untuk:<br/> <strong>"+jawaban+"</strong> dari data Jawaban?");
    // });

  });
  </script>
