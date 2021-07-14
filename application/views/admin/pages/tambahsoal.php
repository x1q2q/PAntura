<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between p-2">
        <div class="col m-1">
          <div class="mb-2">
            <span class="badge badge-dark"><h4 class="text-white">KODE: <?= $kode; ?> </h4></span>
          </div>
          <div>
            <span class="badge badge-secondary"><h4 class="text-dark">JML SOAL: <?= $jml_soal; ?> BUTIR</h4></span>
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
        <div class="row box-soal" data-soal="soal1">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="soal-nomor align-items-start flex-grow"> <!--  untuk no. soal -->
                <span><h4 class="text-dark">1. </h4></span>
              </div>
              <div class="align-self-center flex-fill soal-text"> <!--  untuk soal text -->
                <div class="form-group">
                  <textarea name="soal" value="" class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="align-self-start btn-submit">
                <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('soal1')">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-2">
              <div class="col-1"></div>
              <div class="col-11  pilihan-input">
                <ol class="p-0" data-soal="soal1">
                 <li data-id="1">
                   <div class="form-group btn-group">
                     <textarea type="text" name="pilihan" value="" class="form-control"
                     placeholder="Input Opsi Jawaban" rows="1"></textarea>
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
        </div>
        <div class="row box-soal" data-soal="soal2">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="soal-nomor align-items-start flex-grow"> <!--  untuk no. soal -->
                <span><h4 class="text-dark">2. </h4></span>
              </div>
              <div class="align-self-center flex-fill soal-text"> <!--  untuk soal text -->
                <div class="form-group">
                  <textarea name="soal" value="" class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="align-self-start btn-submit">
                <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('soal2')">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-2">
              <div class="col-1"></div>
              <div class="col-11  pilihan-input">
                <ol class="p-0" data-soal="soal2">
                 <li data-id="1">
                   <div class="form-group btn-group">
                     <textarea type="text" name="pilihan" value="" class="form-control"
                     placeholder="Input Opsi Jawaban" rows="1"></textarea>
                     <button type="button" class="btn btn-icon btn-danger" onclick="rmvOpsi('soal2-1')">
                       <i class="fa fa-times"></i>
                     </button>
                   </div>
                 </li>
                </ol>
                <div class="btn-btn">
                  <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="addOpsi('soal2')">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
        </div>
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
        <button class="btn btn-lg btn-success">
          SELESAI <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item has-icon" onclick="buatPilgan()"><i class="fas fa-list-ul"></i> Pilihan Ganda</a>
            <a class="dropdown-item has-icon" onclick="buatEsai()"><i class="fas fa-pencil-ruler"></i> Esai</a>
        </div>
    </div>
  </div>
</div>

</div>
</section>
</div>
<style type="text/css">
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
 .soal-nomor span{
    display: block;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    padding: 6px;

    background: rgba(0,0,0,0.3);
    border: 2px solid #666;
    text-align: center;
  }
  .pa-pilihan ol{
    list-style-type:upper-alpha;
  }
  .note-editor .note-editing-area .note-editable p,
  .box-soal textarea{
    font-size: 1.1rem !important;
  }
  .note-editor .note-editing-area .note-editable,
  .box-soal textarea{
    background: #efefef !important;
  }
  .pa-pilihan .form-group{
    width: 55%;
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
  @media screen and (min-width: 1240px){
    .pa-soal{
      margin-left:30px;
    }
  }
  @media screen and (max-width: 640px){
    .pa-pilihan .form-group{
      width: 75%;
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
</style>

<script type="text/javascript">
  var urldata = "<?php echo base_url('admin/datasoal/') ?>";

  function buatPilgan(){
    var no = $('#kawah-soal .box-soal:last-of-type()').attr('data-soal');
        no = no.substr(4,no.length);
        no = parseInt(no)+1;
    var idLast = 1;

    var soal = "soal"+no;
    var soalhitung = soal+"-"+idLast;
    var totalSoal = $('input[name="jmlsoal"]').val();
    var htmlInputPilgan = `<div class="row box-soal" data-soal="${soal}">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="soal-nomor align-items-start flex-grow"> <!--  untuk no. soal -->
                <span><h4 class="text-dark">${no} </h4></span>
              </div>
              <div class="align-self-center flex-fill soal-text"> <!--  untuk soal text -->
                <div class="form-group">
                  <textarea name="soal" value="" class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="align-self-start btn-submit">
                <button type="button" class="btn btn-lg btn-icon btn-danger" onclick="rmvSoal('${soal}')">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-2">
              <div class="col-1"></div>
              <div class="col-11  pilihan-input">
                <ol class="p-0" data-soal="${soal}">
                 <li data-id="1">
                   <div class="form-group btn-group">
                     <textarea type="text" name="pilihan" value="" class="form-control"
                     placeholder="Input Opsi Jawaban" rows="1"></textarea>
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
        </div>`;
    $('#kawah-soal').append(htmlInputPilgan);
    $(".summernote-simple").summernote({
       dialogsInBody: true,
        minHeight: 78,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['para', ['paragraph']]
        ]
      });
  }
  function buatEsai(){
    var total;
    total = $('input[name="jmlsoal"]').val();
    alert('esai '+total);
  }
  function rmvSoal(kdsoal){
    $('#kawah-soal .box-soal[data-soal="'+kdsoal+'"]').remove();
  }
  function rmvOpsi(kode){
    var splKode = kode.split('-');
    var soaldt = splKode[0];
    var lidt = splKode[1];
    $('.box-soal[data-soal="'+soaldt+'"] .pa-pilihan .pilihan-input ol').find('li[data-id="'+lidt+'"]').remove();
  }
  function addOpsi(dtsoal){
    var idLast = $('.box-soal[data-soal="'+dtsoal+'"] ol[data-soal="'+dtsoal+'"] li:last-of-type()').attr('data-id');
    var hitung = idLast+1; // attr data-id dari li
    var soalhitung = "'"+dtsoal+"-"+hitung+"'";
    var idAttr = 'onclick="rmvOpsi('+soalhitung+')" ';
    var htmlList = '<li data-id="'+hitung+'">'+
       '<div class="form-group btn-group">'+
         ' <textarea type="text" name="pilihan" value="" class="form-control"'+
          'placeholder="Input Opsi Jawaban" rows="1"></textarea>'+
         '<button type="button" class="btn btn-icon btn-danger " '+idAttr+'>'+
           '<i class="fa fa-times"></i>'+
         '</button>'+
       '</div>'+
     '</li>';
    $('.box-soal[data-soal="'+dtsoal+'"] ol[data-soal="'+dtsoal+'"]').append(htmlList);
  }


  </script>
