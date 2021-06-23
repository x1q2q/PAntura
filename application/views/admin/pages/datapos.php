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
          <table class="table table-striped" id="table-pos">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="no">No.</th>
                <th scope="col" class="sort" data-sort="nm_pos">Nama POS</th>
                <th scope="col" class="sort" data-sort="nm_tempat">Nama Tempat</th>
                <th scope="col" class="sort" data-sort="lokasi_pos">Lokasi POS</th>
                <th scope="col" class="sort" data-sort="deskripsi">Deskripsi</th>
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
  $query = $this->m_global->get_all('pa_tempat')->result_array();
  $dt_tempat = array('' => 'Pilih Tempat');
  $dt_selected = array();
  foreach ($query as $value) {
    $dt_tempat[$value['id_tempat']] = $value['nm_tempat'];
  }
  $form_modal = array('add','edit');
  $dt_input = array('add' => [],'edit' =>[]);
  foreach ($form_modal as $value) {
    $dt_form = array(array(
          	   array(
          	      "form"        => "select", // input, textarea, select
          	      "type"        => "", // text, number, dll
          		    "label"       => "TEMPAT",
          	      "name"        => "tempat",
                  "placeholder" => "Nama Tempat",
                  "id"          => $value."-tempat",
          		    "addClass"    => "",
          		    "required"    => true,
          		    "dt_select"   => $dt_tempat,
          		    "dt_selected" => $dt_selected,
          	 )),array(
          	   array(
          	      "form"        => "input", // input, textarea, select
          	      "type"        => "text", // text, number, dll
          		    "label"       => "POS",
          	      "name"        => "pos",
          		    "placeholder" => "Nama POS",
                  "id"          => $value."-pos",
          		    "addClass"    => "",
          		    "required"    => true,
          	 )),array(
          	   array(
          	      "form"        => "textarea", // input, textarea, select
          	      "type"        => "", // text, number, dll
          		    "label"       => "LOKASI POS",
          	      "name"        => "lokasi",
          		    "placeholder" => "Lokasi POS",
                  "id"          => $value."-lokasi",
          		    "addClass"    => "",
          		    "required"    => true,
          	 )),array(
          	   array(
                "form"        => "textarea", // input, textarea, select
                "type"        => "", // text, number, dll
                "label"       => "DESKRIPSI",
                "name"        => "deskripsi",
                "placeholder" => "Deskripsi POS",
                "id"          => $value."-deskripsi",
                "addClass"    => "",
                "required"    => false,
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
    'md_link'     => base_url('admin/datapos/tambahdata/'),
    'md_title'    => 'Tambah Data POS',
    'md_body'     => $input_html_add
  );
  $this->load->view('admin/pages/md_form',$md_tambah);


  $md_edit = array(
    'div_id'      => 'modal-edit',
    'btn_color'   => 'primary',
    'btn_title'   => 'UPDATE',
    'md_link'     => '',
    'md_title'    => 'Edit Data POS',
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
  var urldata = "<?php echo base_url('admin/datapos/') ?>";
  $(document).ready(function() {
      tabel = $('#table-pos').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax":
          {
              "url": urldata+'alldata/',
              "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [[10, 15, 25],[ 10, 15, 25]], // Combobox Limit
          "columnDefs": [
              { className: "text-center", "targets": [5] },
            ],

          "columns": [
              {"data": "id_pos",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "nm_pos"},
              { "data": "nm_tempat"},
              { "data": "lokasi_pos"},
              { "data": "deskripsi_pos"},
              { "render": function ( data, type, row ) {
                var dtedit = ' data-tempat="'+row.tempat_id+'" data-lokasi="'+row.lokasi_pos+'" '+
                    ' data-pos="'+row.nm_pos+'"  data-deskripsi="'+row.deskripsi_pos+'" ';
                var linkedit = ' data-link="'+urldata+'editdata/'+row.id_pos+'" ';
                var linkdel = ' data-link="'+urldata+'hapusdata/'+row.id_pos+'" ';

                var btn = '<a data-toggle="modal" data-target="#modal-edit"'+
                ' class="btn btn-primary btn-action mr-1" data-toggle="tooltip"'+
                ' title="Edit" '+linkedit+dtedit+' >Edit <i class="fas fa-pencil-alt"></i></a>'+

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
         let pos = trgL.data("pos")
         let lokasi = trgL.data("lokasi");
         let deskripsi = trgL.data("deskripsi")

         $(this).find('select option[value='+tempat+']').attr("selected","");
         $(this).find('input[name=pos]').val(pos);
         $(this).find('textarea[name=lokasi]').val(lokasi);
         $(this).find('textarea[name=deskripsi]').val(deskripsi);
         $(this).find('form[method=post]').attr("action",link);
     });
     $("#modal-edit").on('hidden.bs.modal', function (e) {
        $(this).find('select').children("option:selected").removeAttr('selected');
     });

     $("#modal-delete").on('show.bs.modal', function (e) {
        let trgL = $(e.relatedTarget);
        let link = trgL.data("link");
        let pos = trgL.data("pos");

        $(this).find(".modal-header .modal-title").text("Konfirmasi Hapus POS");
        $(this).find('.modal-footer a').attr("href",link);
        $(this).find(".modal-body").html("Yakin Menghapus <strong>"+pos+"</strong><br/> dari data POS?");
    });

  });
  </script>
