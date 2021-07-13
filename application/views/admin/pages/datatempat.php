<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between">
        <div class="col">
          <h4>Semua Data </h4>
        </div>
        <div class="col-auto">
          <button data-toggle="modal" data-target="#modal-add" class="btn btn-action btn-success">
            Tambah <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
          </button>
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
          <table class="table table-striped" id="table-tempat">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="no">No.</th>
                <th scope="col" class="sort" data-sort="nm_tempat">Nama Tempat</th>
                <th scope="col" class="sort" data-sort="lokasi_tempat">Lokasi Tempat</th>
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
  $form_modal = array('add','edit');
  $dt_input = array('add' => [],'edit' =>[]);
  foreach ($form_modal as $value) {
    $dt_form = array(array(
          	   array(
          	      "form"        => "input", // input, textarea, select
          	      "type"        => "text", // text, number, dll
          		    "label"       => "TEMPAT",
          	      "name"        => "tempat",
          		    "placeholder" => "Nama Tempat",
                  "id"          => $value."-tempat",
          		    "addClass"    => "",
          		    "required"    => true
          	 )),array(
          	   array(
                "form"        => "input", // input, textarea, select
                "type"        => "text", // text, number, dll
                "label"       => "LOKASI TEMPAT",
                "name"        => "lokasi",
                "placeholder" => "Tempat Lokasi",
                "id"          => $value."-lokasi",
                "addClass"    => "",
                "required"    => true
          	 )));
    $dt_input[$value] = $dt_form;
  }


  $input_html_add = my_form($dt_input['add']);
  $input_html_edit = my_form($dt_input['edit']);
?>

<?php
  // modal page section
  $md_tambah = array(
    'div_id'      => 'modal-add',
    'btn_color'   => 'success',
    'btn_title'   => 'SUBMIT',
    'md_link'     => base_url('admin/datatempat/tambahdata/'),
    'md_title'    => 'Tambah Data Tempat',
    'md_body'     => $input_html_add
  );
  $this->load->view('admin/pages/md_form',$md_tambah);


  $md_edit = array(
    'div_id'      => 'modal-edit',
    'btn_color'   => 'primary',
    'btn_title'   => 'UPDATE',
    'md_link'     => '',
    'md_title'    => 'Edit Data Tempat',
    'md_body'     => $input_html_edit
  );
  $this->load->view('admin/pages/md_form',$md_edit);


  $md_hapus = array(
    'div_id'      => 'modal-delete',
    'btn_color'   => 'danger',
    'btn_title'   => 'Ya, Hapus',
  );
  $this->load->view('admin/pages/md_konfirm',$md_hapus);
?>

<script type="text/javascript">
  var tabel = null;
  var urldata = "<?php echo base_url('admin/datatempat/') ?>";
  $(document).ready(function() {
      tabel = $('#table-tempat').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [3] },
            ],

          "columns": [
              {"data": "id_tempat",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "nm_tempat"},
              { "data": "lokasi_tempat"},
              { "render": function ( data, type, row ) {
                var dtedit = ' data-tempat="'+row.nm_tempat+'" data-lokasi="'+row.lokasi_tempat+'" ';
                var linkedit = ' data-link="'+urldata+'editdata/'+row.id_tempat+'" ';
                var linkdel = ' data-link="'+urldata+'hapusdata/'+row.id_tempat+'" ';

                var btn = '<a data-toggle="modal" data-target="#modal-edit"'+
                ' class="btn btn-warning btn-action mr-1" data-toggle="tooltip"'+
                ' title="Edit" '+linkedit+dtedit+'>Edit <i class="fas fa-pencil-alt"></i></a>'+

                '<a data-toggle="modal" data-target="#modal-delete"'+
                ' class="btn btn-danger btn-action mr-1" data-toggle="tooltip"'+
                ' title="Edit" '+linkdel+dtedit+'>Hapus <i class="fas fa-trash"></i></a>';

                  return btn;
                }
              },
          ],
      });

      $("#modal-edit").on('show.bs.modal', function (e) {
         let trgL = $(e.relatedTarget);
         let link = trgL.data("link");
         let tempat = trgL.data("tempat");
         let lokasi = trgL.data("lokasi");

         $(this).find('input[name=tempat]').val(tempat);
         $(this).find('input[name=lokasi]').val(lokasi);
         $(this).find('form[method=post]').attr("action",link);
     });

     $("#modal-delete").on('show.bs.modal', function (e) {
        let trgL = $(e.relatedTarget);
        let link = trgL.data("link");
        let tempat = trgL.data("tempat");

        $(this).find(".modal-header .modal-title").text("Konfirmasi Hapus Tempat");
        $(this).find('.modal-footer a').attr("href",link);
        $(this).find(".modal-body").html("Yakin Menghapus <strong>"+tempat+"</strong><br/> dari data tempat?");
    });

  });
  </script>
