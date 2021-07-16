
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between p-2">
        <div class="col m-1">
          <div class="mb-2">
            <span class="badge badge-dark"><h4 class="text-white">KODE: <?= $kode; ?> </h4></span>
          </div>
          <div>
            <span class="badge badge-secondary jml-soal"><h4 class="text-dark">JML SOAL: 1 BUTIR</h4></span>
          </div>
        </div>
        <div class="col-auto m-1">
          <h5 style="border:2px dashed grey;" class="p-2">
            <?php
            foreach($dt_pos as $res){
              echo $res["nm_pos"].'('.$res["nm_tempat"].')<br/>';
            }
            ?>
          </h5>
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
      <div class="card-body p-3" id="kawah-soal">
        <ol class="listing-soal">
          <li class="row box-soal" data-soal="soal1" data-jenis="pilgan">
                  <div class="col-12 d-flex justify-content-start pa-soal">
                    <div class="align-self-center flex-fill soal-text"> <!--  untuk soal text -->
                      <div class="form-group">
                        <textarea name="soal" value="" class="summernote-simple"></textarea>
                      </div>
                    </div>
                    <div class="align-self-start btn-submit">
                      <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('soal1')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-12 row pa-pilihan mt-2">
                    <div class="col-1"></div>
                    <div class="col-11 pilihan-input">
                      <ol class="p-0" data-soal="soal1">
                       <li data-id="1">
                         <div class="form-group btn-group">
                           <textarea name="pilihan" class="form-control" placeholder="Input Opsi Jawaban" rows="1"></textarea>
                           <div class="switch-field">
                        		<input  type="radio" id="jwbn-soal1-1" name="opsi-soal1" value="1">
                        		<label for="jwbn-soal1-1" data-on-label="Benar" data-off-label="Salah"></label>
                          </div>
                           <button type="button" class="btn btn-icon btn-danger" onclick="rmvOpsi('soal1-1')">
                             <i class="fa fa-times"></i>
                           </button>
                         </div>
                       </li>
                      </ol>
                      <div class="btn-btn">
                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="addOpsi('soal1')">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
              </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 text-center">
      <div class="btn-group dropup" role="group">
        <input type="number" name="jmlsoal" value="1" placeholder="JML" style="padding-left:5px;width:60px">
        <button class="btn btn-outline-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BUAT SOAL
        </button>
        <a class="btn btn-lg btn-success" onclick="prosesData()">
          SELESAI <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item has-icon" onclick="buatSoal('pilgan')"><i class="fas fa-list-ul"></i> Pilihan Ganda</a>
            <a class="dropdown-item has-icon" onclick="buatSoal('esai')"><i class="fas fa-pencil-ruler"></i> Esai</a>
        </div>
    </div>
  </div>
</div>

</div>
</section>
</div>
<?php
  $md_info = array(
    'div_id'      => 'modal-info',
    'btn_color'   => 'warning',
    'btn_title'   => 'OKE',
  );
  $this->load->view('admin/pages/md_konfirm',$md_info);

  $md_submit = array(
    'div_id'      => 'modal-submitall',
    'btn_color'   => 'success',
    'btn_title'   => 'SAYA YAKIN',
  );
  $this->load->view('admin/pages/md_konfirm',$md_submit);
?>
<style type="text/css">

  ol.listing-soal {
    width: 100%!important;
    counter-reset: my-awesome-counter;
    list-style: none;
    padding-left: 20px;
  }
  ol.listing-soal li.box-soal {
    margin: 0 0 0.5rem 0;
    counter-increment: my-awesome-counter;
    position: relative;
  }
  ol.listing-soal li.box-soal::before {
    content: counter(my-awesome-counter);
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    position: absolute;
    --size: 32px;
    left: calc(-0.5 * var(--size));
    line-height: var(--size);
    width: var(--size);
    height: var(--size);
    top: 0;
    background: black;
    border-radius: 50%;
    text-align: center;
    box-shadow: 1px 1px 0 #999;
  }
  /* bates */
  .btn-submit{
    margin-right: 30px!important;
  }
  .dropdown-menu .dropdown-item{
    cursor: pointer!important;
  }
  .box-soal{
    padding: 0px!important;
    margin: 4px 4px 25px 4px;
    border-bottom:1px solid silver;
  }
 .soal-text{
   border-bottom:1px dashed #000;
   margin:0 20px;
 }
  .pa-pilihan ol{
    list-style-type:upper-alpha;
  }
  .note-editor .note-editing-area .note-editable p,
  .box-soal textarea{
    font-size: 1rem !important;
  }
  .note-editor .note-editing-area .note-editable,
  .box-soal textarea{
    background: #efefef !important;
  }
  .pa-pilihan .form-group{
    width: 60%;
  }
  .pilihan-input{
    position: relative!important;
  }
  .pilihan-input .btn-btn{
    position: absolute;
    bottom:7px;
    left:25%;
  }
  .pilihan-input .btn-btn button{
    border-radius: 50%;
    width: 30px;
    height: 30px;
    padding:3px;
  }
  @media screen and (max-width: 640px){
    .pa-pilihan .form-group{
      width: 80%;
    }
    .btn-submit{
      margin:0px!important;
    }
    .soal-nomor span .text-white{
      color: #000!important;
    }
    .soal-nomor{
      align-items: center!important;
    }
    .soal-text{
      margin-left:8px;
    }
    .soal-nomor span{
      padding: 0px!important;
      border-radius:0%;
      width: auto;
      height: auto;
      background: none!important;
      border:none!important;
    }
    .pa-pilihan{
      padding: 8px;
    }
  }
  .note-editor .note-editing-area .note-editable{
    min-height: auto!important;
    max-height: 200px !important;
  }
  .note-editor .note-editing-area .note-editable p,
  .note-editor .note-editing-area .note-editable ul:not(.list-unstyled),
  .note-editor .note-editing-area .note-editable ol{
    line-height: 10px!important;
  }
  /* styling toggle */
  .switch-field {
  	display: flex;
  	overflow: hidden;
  }

  .switch-field input {
  	position: absolute !important;
  	clip: rect(0, 0, 0, 0);
  	height: 1px;
  	width: 1px;
  	border: 0;
  	overflow: hidden;
  }
  .switch-field input + label:before {
    content: attr(data-off-label);
  }
  .switch-field label {
    margin:0px!important;
  	background-color: #e4e4e4;
  	color: rgba(0, 0, 0, 0.6);
  	font-size: 14px;
  	text-align: center;
  	padding: 8px 16px;
  	border: 1px solid rgba(0, 0, 0, 0.2);
  	box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  	transition: all 0.1s ease-in-out;
  }

  .switch-field label:hover {
  	cursor: pointer;
  }

  .switch-field input:checked + label {
  	background-color: #a5dc86;
  	box-shadow: none;
  }
  .switch-field input:checked + label:before {
    color: #fff;
    font-weight: bolder;
    content: attr(data-on-label);
  }

</style>

<script type="text/javascript">
  var kodeSoal = "<?php echo $kode;  ?>";
  var posId = "<?php echo $dt_posid; ?>";
  var dtPosId = posId.split('-');

  var urldata = "<?php echo base_url('admin/datasoal/') ?>";
  var dtFieldKosong = [];
  function refreshJml(){
    var totalSoal = $('#kawah-soal .box-soal').length;
    $('span.jml-soal .text-dark').html('JML SOAL: '+totalSoal+' BUTIR');
  }
  function buatSoal(tipe){
    var inputJmlSoal = $('input[name="jmlsoal"]').val();
    for(var i=0; i<parseInt(inputJmlSoal);i++){
      if(tipe == 'pilgan'){
        htmlPilgan();
      }else if(tipe == 'esai'){
        htmlEsai();
      }
    }
    refreshJml();
  }
  function htmlPilgan(){
    var no = $('#kawah-soal ol.listing-soal li.box-soal:last-of-type()').attr('data-soal');
        no = (no == undefined) ? 0: no.substr(4,no.length);
        no = parseInt(no)+1;
    var idLast = 1;

    var soal = "soal"+no;
    var soalhitung = soal+"-"+idLast;
    var htmlInputPilgan = `<li class="row box-soal" data-soal="${soal}" data-jenis="pilgan">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="align-self-center flex-fill soal-text">
                <div class="form-group">
                  <textarea name="soal" value="" class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="align-self-start btn-submit">
                <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('${soal}')">
                  <i class="fa fa-trash"></i>
                </button>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-2">
              <div class="col-1"></div>
              <div class="col-11 pilihan-input">
                <ol class="p-0" data-soal="${soal}">
                 <li data-id="${idLast}">
                   <div class="form-group btn-group">
                     <textarea name="pilihan" class="form-control" placeholder="Input Opsi Jawaban" rows="1"></textarea>
                     <div class="switch-field">
                      <input  type="radio" id="jwbn-${soalhitung}" name="opsi-${soal}" value="1">
                      <label for="jwbn-${soalhitung}" data-on-label="Benar" data-off-label="Salah"></label>
                    </div>
                     <button type="button" class="btn btn-icon btn-danger" onclick="rmvOpsi('${soalhitung}')">
                       <i class="fa fa-times"></i>
                     </button>
                   </div>
                 </li>
                </ol>
                <div class="btn-btn">
                  <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="addOpsi('${soal}')">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
        </li>`;
    $('#kawah-soal ol.listing-soal').append(htmlInputPilgan);
    $(".summernote-simple").summernote({
       dialogsInBody: true,
        minHeight: 80,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['para', ['paragraph']]
        ]
      });
  }

  function htmlEsai(){
    var no = $('#kawah-soal ol.listing-soal li.box-soal:last-of-type()').attr('data-soal');
        no = (no == undefined) ? 0: no.substr(4,no.length);
        no = parseInt(no)+1;
    var idLast = 1;

    var soal = "soal"+no;
    var soalhitung = soal+"-"+idLast;
    var htmlInputEsai = `<li class="row box-soal" data-soal="${soal}" data-jenis="esai">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="align-self-center flex-fill soal-text"> <!--  untuk soal text -->
                <div class="form-group">
                  <textarea name="soal" value="" class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="align-self-start btn-submit">
                <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('${soal}')">
                  <i class="fa fa-trash"></i>
                </button>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-2">
              <div class="col-1"></div>
              <div class="col-11 pilihan-input">
                 <div class="form-group btn-group">
                   <textarea name="pilihan" class="form-control" placeholder="Input Jawaban Esai Benar" rows="2"></textarea>
                 </div>
              </div>
            </div>
        </li>`;
    $('#kawah-soal ol.listing-soal').append(htmlInputEsai);
    $(".summernote-simple").summernote({
       dialogsInBody: true,
        minHeight: 120,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['para', ['paragraph']]
        ]
      });
  }
  function prosesData(){
    var no = 0;
    var jmlSoal = $('#kawah-soal ol.listing-soal li').length;
    $('#kawah-soal .box-soal').each(function(){
      no++;
      var summernote = $(this).find('.pa-soal .soal-text .form-group textarea[name="soal"]');
      var soal = summernote.val();
      var jenis = $(this).attr('data-jenis');
      if($(summernote).summernote('isEmpty')){
        dtFieldKosong.push("-<b>SOAL No."+no+"</b> masih kosong. <br/>");
      }

      var dtpilihane = [];
      if(jenis == 'pilgan'){
        var pilno = 0;
        var dtCekPilgan = [];
        $(this).find('.pa-pilihan .pilihan-input ol li').each(function(){
          pilno++;
          var jwbnopsi = $(this).find('.form-group textarea[name="pilihan"]').val();
          var pilbenar = $(this).find('.form-group .switch-field input:checked').val();
          if(pilbenar == '1'){
            dtCekPilgan.push(pilbenar);
          }
          if(jwbnopsi.trim().length > 0){
            dtpilihane.push({
              "pilihan":jwbnopsi,
              "is_benar": (pilbenar=='1')?pilbenar:'0'
            });
          }else{
            dtFieldKosong.push("-<b>SOAL No."+no+"</b>, input opsi jawaban ke-"+pilno+" masih kosong. <br/>")
          }
        });
        if(dtCekPilgan.length == 0){
          dtFieldKosong.push("-<b>SOAL No."+no+"</b> data opsi jawaban belum ada yang dipilih untuk jawaban benar. <br/>");
          dtCekPilgan = [];
        }

      }else if(jenis == 'esai'){
          var jwbnEsaiBenar = $(this).find('.pa-pilihan .pilihan-input .form-group textarea[name="pilihan"]').val();
          if(jwbnEsaiBenar.trim().length > 0){
            dtpilihane.push({
              "pilihan":jwbnEsaiBenar,
              "is_benar": '1'
            });
          }else{
            dtFieldKosong.push("-<b>SOAL No."+no+"</b> input jawaban esai masih kosong <br/>")
          }
      }

    });
    $('#modal-info').on('show.bs.modal', function (e) {
       $(this).find(".modal-header .modal-title").text("PERINGATAN! Ada data yang kosong");
       $(this).find(".modal-footer a").attr('data-dismiss','modal');
       $(this).find(".modal-body").html("<b>Catatan</b>:<br/>"+txtKosong);
       dtFieldKosong = [];
   });
   if(jmlSoal == 0){
     dtFieldKosong.push("-<b>SOAL Masih Kosong, lur!</b>")
   }
    if(dtFieldKosong.length > 0 || jmlSoal == 0){
      var txtKosong ="";
      for(var i=0; i<dtFieldKosong.length; i++){
        txtKosong += dtFieldKosong[i];
      }
      $('#modal-info').modal('show');
    }else{ // jika tidak ada yg empty field, konfirmasi submit
      $('#modal-submitall').modal('show');
    }
  }
  function submitAll(){
    var dtSoal = [];
    $('#kawah-soal .box-soal').each(function(){
      var soale = $(this).find('.pa-soal .soal-text .form-group textarea[name="soal"]').val();
      var jenis = $(this).attr('data-jenis');

      var dtpilihane = [];
        if(jenis == 'pilgan'){
          $(this).find('.pa-pilihan .pilihan-input ol li').each(function(){
            var pilbenar = $(this).find('.form-group .switch-field input:checked').val();
              dtpilihane.push({
                "pilihan":$(this).find('.form-group textarea[name="pilihan"]').val(),
                "is_benar": (pilbenar=='1')?pilbenar:'0'
              });
          });
        }else if(jenis == 'esai'){
          var jwbnEsaiBenar = $(this).find('.pa-pilihan .pilihan-input .form-group textarea[name="pilihan"]').val();
          if(jwbnEsaiBenar.trim().length > 0){
            dtpilihane.push({
              "pilihan":jwbnEsaiBenar,
              "is_benar": '1'
            });
          }
        }

      dtSoal.push({
          "soal":soale,
          "jenis":jenis,
          "posid":dtPosId,
          "kode":kodeSoal,
          "dtpilihan":dtpilihane
      });
    });
    inputDatabase(dtSoal);
  }
  function inputDatabase(dtSoal){
    var soal = JSON.stringify(dtSoal);
    $.ajax({
         type: "POST",
         url:  urldata+'inputsoal/',
         data: {soal: soal},
         cache:false,
         success: function(data){
            window.location.replace(data);
          }
    });
  }
  function rmvSoal(kdsoal){
    $('#kawah-soal .box-soal[data-soal="'+kdsoal+'"]').remove();
    refreshJml();
  }
  function rmvOpsi(kode){
    var splKode = kode.split('-');
    var soaldt = splKode[0];
    var lidt = splKode[1];
    $('.box-soal[data-soal="'+soaldt+'"] .pa-pilihan .pilihan-input ol').find('li[data-id="'+lidt+'"]').remove();
  }
  function addOpsi(dtsoal){
    var idLast = $('.box-soal[data-soal="'+dtsoal+'"] ol[data-soal="'+dtsoal+'"] li:last-of-type()').attr('data-id');
    var hitung = parseInt(idLast)+1; // attr data-id dari li
    var soalhitung = dtsoal+"-"+hitung;
    var htmlList = `<li data-id="${hitung}">
      <div class="form-group btn-group">
        <textarea name="pilihan" class="form-control" placeholder="Input Opsi Jawaban" rows="1"></textarea>
        <div class="switch-field">
         <input type="radio" id="jwbn-${soalhitung}" name="opsi-${dtsoal}" value="1">
         <label for="jwbn-${soalhitung}" data-on-label="Benar" data-off-label="Salah"></label>
       </div>
        <button type="button" class="btn btn-icon btn-danger" onclick="rmvOpsi('${soalhitung}')" >
          <i class="fa fa-times"></i>
        </button>
      </div>
    </li>`;
    $('.box-soal[data-soal="'+dtsoal+'"] ol[data-soal="'+dtsoal+'"]').append(htmlList);
  }

  $("#modal-submitall").on('show.bs.modal', function (e) {
     $(this).find(".modal-header .modal-title").text("Konfirmasi Submit SOAL");
     $(this).find('.modal-footer a').attr("onClick",'submitAll()');
     $(this).find(".modal-body").html("Yakin untuk mengirimkan data SOAL yang telah diinputkan ke database?");
 });


  </script>
