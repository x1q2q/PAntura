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
          <table class="table table-striped" id="table-viewsoal">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="no">No.</th>
                <th scope="col" class="sort" data-sort="pos_tempat">Untuk POS</th>
                <th scope="col" class="sort" data-sort="kode">Kode</th>
                <th scope="col" class="sort" data-sort="created_at">Dibuat TGL</th>
                <th scope="col" class="sort" data-sort="jml_soal">JML. Soal</th>
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
  $query = $this->m_pos->get_join_array();
  $dt_pos = array();
  foreach ($query as $value) {
    $dt_pos[$value['id_pos']] = $value['nm_pos'].'-'.$value['nm_tempat'];
  }

  $dt_selected = array();
  $form_modal = array('add');
  $dt_input = array('add' => []);
  foreach ($form_modal as $value) {
    $dt_form = array(array(
          	   array(
          	      "form"        => "multiselect", // input, textarea, select
          	      "type"        => "", // text, number, dll
          		    "label"       => "Untuk POS",
          	      "name"        => "pos[]",
          		    "placeholder" => "pos",
                  "id"          => "add-pos",
          		    "addClass"    => "select2-pos",
          		    "required"    => true,
                  "dt_select"   => $dt_pos,
                  "dt_selected" => $dt_selected,
          	 )),array(
          	   array(
                "form"        => "input", // input, textarea, select
                "type"        => "text", // text, number, dll
                "label"       => "KODE (QR/Input)",
                "name"        => "kode",
                "placeholder" => "max.10 karakter",
                "id"          => "add-kode",
                "addClass"    => "",
                "required"    => true
          	 )));
    $dt_input[$value] = $dt_form;
  }


  $input_html_add = my_form($dt_input['add']);
?>

<?php
  // modal page section
  $md_tambah = array(
    'div_id'      => 'modal-add',
    'btn_color'   => 'success',
    'btn_title'   => 'SUBMIT',
    'md_link'     => base_url('admin/datasoal/tambah/'),
    'md_title'    => 'Tambah Data SOAL',
    'md_body'     => $input_html_add
  );
  $this->load->view('admin/pages/md_form',$md_tambah);


  $md_hapus = array(
    'div_id'      => 'modal-delete',
    'btn_color'   => 'danger',
    'btn_title'   => 'Ya, Hapus',
  );
  $this->load->view('admin/pages/md_konfirm',$md_hapus);
?>

<script type="text/javascript">
  var tabel = null;
  var urldata = "<?php echo base_url('admin/datasoal/') ?>";
  $(document).ready(function() {
      tabel = $('#table-viewsoal').DataTable({
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
              { className: "text-center", "targets": [4,5] },
            ],

          "columns": [
              {"data": "id_quizsoal",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "pos_tempat",
              render: function (data, type, row, meta) {
                var txtPosTempat = "";
                  for(var i=0; i<row.pos_tempat.length; i++){
                    txtPosTempat += '('+row.pos_tempat[i]+')'+'<br/>';
                  }
                return txtPosTempat;
              }},
              { "data": "kode",
              render: function (data, type, row, meta) {
                  return '<b><u>'+row.kode+'</u></b>';
              }},
              { "data": "created_at"},
              { "data": "jml_soal",
              render: function (data, type, row, meta) {
                  return '<span class="badge badge-dark">'+row.jml_soal+' Butir</span>';
              }},
              { "render": function ( data, type, row ) {
                var txtPosTempat = "";
                  for(var i=0; i<row.pos_tempat.length; i++){
                    txtPosTempat += row.pos_tempat[i]+', ';
                  }
                var dtdetail = ' data-soal="'+txtPosTempat+'" ';
                var linkdel = ' data-link="'+urldata+'hapusdata/'+row.kode+'" ';

                var btn = '<a href="'+urldata+'detail/'+row.jml_soal+'/'+row.kode+'"'+
                ' class="btn btn-primary btn-action mr-1" data-toggle="tooltip"'+
                ' title="Detail" '+dtdetail+'>Detail <i class="fas fa-eye"></i></a>'+

                '<a data-toggle="modal" data-target="#modal-delete"'+
                ' class="btn btn-danger btn-action mr-1" data-toggle="tooltip"'+
                ' title="Edit" '+linkdel+dtdetail+'>Hapus <i class="fas fa-trash"></i></a>';

                  return btn;
                }
              },
          ],
      });

      $("#modal-add").on('show.bs.modal', function (e) {
        var kode = gen_rand_kode();
            kode = 'PA-'+kode.substr(0,7).toUpperCase();
        $('.select2-pos').select2({
          tags: false,
          dropdownParent: $("#modal-add")
        });
        $(this).find('input[name=kode]').val(kode);
      });

     $("#modal-delete").on('show.bs.modal', function (e) {
        let trgL = $(e.relatedTarget);
        let link = trgL.data("link");
        let soal = trgL.data("soal");

        $(this).find(".modal-header .modal-title").text("Konfirmasi Hapus SOAL");
        $(this).find('.modal-footer a').attr("href",link);
        $(this).find(".modal-body").html("Yakin Menghapus soal untuk:<br/> <strong>"+soal+"</strong> dari data SOAL?<br/><br/><i>"+
        "*menghapus SOAL berarti menghapus data jawaban siswa yang sudah masuk.</i>");
    });

  });
  </script>
