<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between p-2">
        <div class="col m-1">
          <div class="mb-2">
            <span class="badge badge-info"><h4 class="text-white">PENJAWAB :
              <?= $inf_jawaban['username'].'-'.$inf_jawaban['regu']; ?> </h4></span>
          </div>
          <div>
            <span class="badge badge-secondary"><h4 class="text-dark">SKOR :
              <?= $inf_jawaban['skor']; ?> point</h4></span>
          </div>
        </div>
        <div class="col-auto m-1">
          <h5 style="border:2px solid grey;" class="p-2">
            <?= $inf_jawaban['pos'].' ('.$inf_jawaban['tempat'].')'; ?>
            <br/>
            Submit Pada <?= $inf_jawaban['submited_at']; ?>
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
      <div class="card-body p-3">
        <?php
          $no=0;
        foreach($dt_jawaban as $value):
          $no++;
          $wrn_nomor = ($value["is_benar"] == '1') ?'success':'danger';
          ?>
        <div class="row box-soal <?= $wrn_nomor; ?>">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="soal-nomor <?= $wrn_nomor; ?>"> <!--  untuk no. soal -->
                <span><h4 class="text-<?= $wrn_nomor; ?>"><?= $no; ?>. </h4></span>
              </div>
              <div class="align-self-center soal-text"> <!--  untuk soal text -->
                <h5 class="text-dark"><?= $value["soal"]; ?> </h5>
              </div>
            </div>
            <div class="col-12 row pa-pilihan mt-1">
              <div class="col-1">
              </div>
              <div class="col-11">
                <?php if($value["jenis"] == "pilgan"){ ?>
                <ol class="p-0">
                <?php foreach($value["dt_pilihan"] as $val2){
                  $wrn_pilihan ='';
                  if($val2['id_terpilih'] == $val2['id_pilihan']){
                    $wrn_pilihan .= 'text-outline ';
                  }
                ?>
                 <li>
                   <h6 class="<?= $wrn_pilihan; ?>"><?= $val2["pilihan"]; ?>
                     <?= ($val2['is_benar'] == '1')?'<i class="fa fa-check"></i>': '' ; ?>
                   </h6>
                 </li>
               <?php } ?>
                </ol>
                <?php }else{ ?>
                  <div class="form-group">
                    <p>Jawaban: <?php foreach($value["dt_pilihan"] as $val2){
                        echo '<b class="text-outline">'.$val2["pilihan"].'</b>';
                      } ?></p>
                    <textarea class="form-control" name="" rows="6"
                    disabled >Jawaban siswa: <?= $value["jawaban"]; ?></textarea>
                  </div>
                <?php } ?>
              </div>
            </div>
        </div>
      <?php endforeach; ?>
      <div class="p-2">
        <i><p class="text-dark">*soal yang terdapat <b class="text-success">garis tepi berwarna hijau menandakan jawaban benar</b> dari penjawab; sedangkan
          <b class="text-danger">garis tepi strip berwarna merah menandakan jawaban salah</b> dari penjawab.</p></i>
      </div>
      <div class="p-2">
        <i><p class="text-dark">*pada soal pilihan ganda, jika pilihan memiliki checkmark ( <i class="fa fa-check"></i> )
           menandakan pilihan adalah jawaban yang benar; sementara pilihan yang <b class="text-outline"> dilingkari & berwarna biru</b> menandakan jawaban dari penjawab.</p></i>
      </div>

      </div>

    </div>
  </div>
</div>

</div>
</section>
</div>
<style type="text/css">
  .box-soal{
    padding: 0px!important;
    margin: 4px 4px 25px 4px;
    border-bottom:1px solid silver;
  }
 .soal-text{
   border-bottom:1px dashed #000;
   margin-left:20px;
 }
 .soal-nomor span{
    display: block;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    padding: 6px;
    text-align: center;
  }
  .box-soal.success{
    padding: 20px 0px!important;
    border:2px solid #47c363;
  }
  .box-soal.danger{
    padding: 20px 0px!important;
    border:2px dashed #fc544b;
  }
  .soal-nomor.success span{
    border: 2px solid #47c363;
  }
  .soal-nomor.danger span{
    border: 2px solid #fc544b;
  }
  .pa-pilihan ol{
    list-style-type:upper-alpha;
  }
  .pa-pilihan h6{
    padding: 4px;
    display: inline-block;
  }
  .text-outline{
    background: rgba(58, 186, 244, 0.5)!important;
    border:1px solid  rgba(58, 186, 244, 1);
    border-radius: 20px;
    padding:0 7px;
    color: rgba(0,0,0,0.8)!important;
  }
  @media screen and (min-width: 1240px){
    .pa-soal{
      margin-left:30px;
    }
  }
  @media screen and (max-width: 640px){
    .soal-nomor{
      align-items: center!important;
    }
    .soal-text{
      margin-left:8px;
    }
    .soal-nomor span{
      padding: 0px!important;
      boroder-radius:0%;
      width: auto;
      height: auto;
      background: none!important;
      border:none!important;
    }
    .pa-pilihan{
      padding: 8px;
    }
  }
</style>

<script type="text/javascript">
  var urldata = "<?php echo base_url('admin/datasoal/') ?>";
  $(document).ready(function() {

  });
  </script>
