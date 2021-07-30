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
                <?php foreach(DATAPOS as $vals){ ?>
                  <th scope="col" class="sort" data-sort="<?= rep_pos($vals["NAMA"]); ?>"><?= $vals["NAMA"]; ?></th>
                <?php } ?>
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
  $(document).ready(function() {
      tabel = $('#table-dataskor').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 1, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [0,5] },
            ],

          "columns": [
              { "data": "username",
              render: function (data, type, row, meta) {
                var sekolah = '<br/>'+row.sekolah;
                  return '<b>('+row.username+' - '+row.regu+')</b>'+sekolah;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                var txt ="";
                for(var i=0; i<row.POS_A.length; i++){
                  txt+=row.POS_A[i]+' <br/>';
                }
                  return txt;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                  return row.POS_B;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                var txt ="";
                for(var i=0; i<row.POS_C.length; i++){
                  txt+=row.POS_C[i]+' <br/>';
                }
                  return txt;
              }},
              { "data": "username",
              render: function (data, type, row, meta) {
                var txt ="";
                for(var i=0; i<row.POS_D.length; i++){
                  txt+=row.POS_D[i]+' <br/>';
                }
                  return txt;
              }},
              { "data": "POS_E",
              render: function (data, type, row, meta) {
                var txt ="";
                for(var i=0; i<row.POS_E.length; i++){
                  txt+=row.POS_E[i]+' <br/>';
                }

                  return txt;
              }},
              { "render": function ( data, type, row ) {

              var btn = '<form class="btn-group" method="post" action="'+urlUpdate+'"> <button type="submit" '+
                ' class="btn btn-success btn-lg btn-rounded shadow mr-1" title="update skor" >Update</a></form>';

                  return btn;
                }
              },
          ],
      });
  });
  </script>
