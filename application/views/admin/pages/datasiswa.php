<div class="row">
  <div class="col-12">
    <div class="card mb-2">
      <div class="card-header row mb-0 justify-content-between">
        <div class="col">
          <h4>Semua Data</h4>
        </div>
        <div class="col-auto">
          <button data-toggle="modal" data-target="#modal-add" class="btn btn-action btn-success">
            Tambah Data <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
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
          <table class="table table-striped" id="table-siswa">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="no">No.</th>
                <th scope="col" class="sort" data-sort="username">Username</th>
                <th scope="col" class="sort" data-sort="password">Password</th>
                <th scope="col" class="sort" data-sort="nm_sekolah">Sekolah Asal</th>
                <th scope="col" class="sort" data-sort="nm_regu">REGU Asal</th>
                <th scope="col" class="sort" data-sort="jenkel">Jns.Kelamin</th>
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
  $query = $this->m_global->get_all('pa_sekolah')->result_array();
  $dt_sekolah = array('' => 'Pilih Sekolah');
  foreach ($query as $value) {
    $dt_sekolah[$value['id_sekolah']] = $value['nm_sekolah'];
  }

  $dt_jenkel = array('' => 'Pilih Jen.Kelamin','laki-laki' => 'Laki-laki','perempuan' => 'Perempuan');
  $dt_selected = array();
  $form_modal = array('add','edit');
  $dt_input = array('add' => [],'edit' =>[]);
  foreach ($form_modal as $value) {
    $dt_form = array(array(
               array(
                  "form"        => "input", // input, textarea, select
                  "type"        => "text", // text, number, dll
                  "label"       => "USERNAME",
                  "name"        => "username",
                  "placeholder" => "Nama Siswa",
                  "id"          => $value."-username",
                  "addClass"    => "",
                  "required"    => true,
             )),array(
               array(
                  "form"        => "input", // input, textarea, select
                  "type"        => "text", // text, number, dll
                  "label"       => "PASSWORD",
                  "name"        => "password",
                  "placeholder" => "Password Siswa",
                  "id"          => $value."-password",
                  "addClass"    => "",
                  "required"    => true,
             )),array(
                 array(
                   "form"        => "select", // input, textarea, select
                   "type"        => "", // text, number, dll
                   "label"       => "Jns.Kelamin",
                   "name"        => "jenkel",
                   "placeholder" => "Jns Kelamin",
                   "id"          => $value."-jenkel",
                   "addClass"    => "",
                   "required"    => true,
                   "dt_select"   => $dt_jenkel,
                   "dt_selected" => $dt_selected,
               )),array(
               	   array(
               	      "form"        => "input", // input, textarea, select
               	      "type"        => "text", // text, number, dll
               		    "label"       => "REGU",
               	      "name"        => "regu",
                       "placeholder" => "Nama REGU",
                       "id"          => $value."-regu",
               		    "addClass"    => "",
               		    "required"    => true,
               	 )),array(
                     array(
                       "form"        => "select", // input, textarea, select
                       "type"        => "", // text, number, dll
                       "label"       => "SEKOLAH",
                       "name"        => "sekolah",
                       "placeholder" => "Nama Sekolah",
                       "id"          => $value."-sekolah",
                       "addClass"    => "select2-sekolah",
                       "required"    => true,
                       "dt_select"   => $dt_sekolah,
                       "dt_selected" => $dt_selected,
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
    'md_link'     => base_url('admin/datasiswa/tambahdata/'),
    'md_title'    => 'Tambah Data SISWA',
    'md_body'     => $input_html_add
  );
  $this->load->view('admin/pages/md_form',$md_tambah);


  $md_edit = array(
    'div_id'      => 'modal-edit',
    'btn_color'   => 'primary',
    'btn_title'   => 'UPDATE',
    'md_link'     => '',
    'md_title'    => 'Edit Data SISWA',
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
  var urldata = "<?php echo base_url('admin/datasiswa/') ?>";
  $(document).ready(function() {


      tabel = $('#table-siswa').DataTable({
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
              { className: "text-center", "targets": [6] },
            ],

          "columns": [
              {"data": "id_siswa",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              { "data": "username"},
              { "data": "password"},
              { "data": "nm_sekolah"},
              {"data": "regu",
              render: function (data, type, row, meta) {
                  return '<span class="badge badge-dark">'+row.regu+'</span>';
              }},
              { "data": "jenkel"},
              { "render": function ( data, type, row ) {
                var dtedit = ' data-username="'+row.username+'" data-password="'+row.password+'" '+
                    ' data-sekolah="'+row.id_sekolah+'" data-regu="'+row.regu+'" '+
                    '" data-jenkel="'+row.jenkel+'" ';
                var linkedit = ' data-link="'+urldata+'editdata/'+row.id_siswa+'" ';
                var linkdel = ' data-link="'+urldata+'hapusdata/'+row.id_siswa+'" ';

                var btn = '<a data-toggle="modal" data-target="#modal-edit"'+
                ' class="btn btn-warning btn-action mr-1" data-toggle="tooltip"'+
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
         $('.select2-sekolah').select2({
           tags: false,
           dropdownParent: $("#modal-edit")
         });

         let trgL = $(e.relatedTarget);
         let link = trgL.data("link");
         let username = trgL.data("username");
         let password = trgL.data("password");
         let sekolah = trgL.data("sekolah");
         let regu = trgL.data("regu");
         let jenkel = trgL.data("jenkel")

         $(this).find('select#edit-sekolah option[value="'+sekolah+'"]').attr("selected","selected");
         $(this).find('select#edit-jenkel option[value="'+jenkel+'"]').attr("selected","selected");
         $(this).find('input[name=regu]').val(regu);
         $(this).find('input[name=username]').val(username);
         $(this).find('input[name=password]').val(password);
         $(this).find('form[method=post]').attr("action",link);
     });
     $("#modal-edit").on('hidden.bs.modal', function (e) {
        $(this).find('select#edit-sekolah').children("option:selected").removeAttr('selected');
        $(this).find('select#edit-jenkel').children("option:selected").removeAttr('selected');
     });

     $("#modal-add").on('show.bs.modal', function (e) {
        $('.select2-sekolah').select2({
          tags: false,
          dropdownParent: $("#modal-add")
        });
     });

     $("#modal-delete").on('show.bs.modal', function (e) {
        let trgL = $(e.relatedTarget);
        let link = trgL.data("link");
        let siswa = trgL.data("username");

        $(this).find(".modal-header .modal-title").text("Konfirmasi Hapus SISWA");
        $(this).find('.modal-footer a').attr("href",link);
        $(this).find(".modal-body").html("Yakin Menghapus <strong>"+siswa+"</strong><br/> dari data SISWA?");
    });

  });
  </script>
