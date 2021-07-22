<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header row mb-2 justify-content-between p-2">
        <div class="col m-1">
          <div class="mb-2">
            <span class="badge badge-dark"><h4 class="text-white">PENJAWAB: BOJES - YAKUZA </h4></span>
          </div>
          <div>
            <span class="badge badge-secondary"><h4 class="text-dark">TGL SUBMIT: 2021-09-02</h4></span>
          </div>
        </div>
        <div class="col-auto m-1">
          <h5 style="border:2px dashed grey;" class="p-2">
            POS - A
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

        <div class="row box-soal">
            <div class="col-12 d-flex justify-content-start pa-soal">
              <div class="soal-nomor"> <!--  untuk no. soal -->
                <span><h4 class="text-dark">1. </h4></span>
              </div>
              <div class="align-self-center soal-text"> <!--  untuk soal text -->
                <h5 class="text-dark">Contoh soal </h5>
              </div>
            </div>
            <div class="col-12 row pa-pilihan">
              <div class="col-1">
              </div>
              <div class="col-11">
                <?p
                <ol class="p-0">

                 <li class="s">
                      <h6></h6>
                 </li>

                </ol>
              </div>
            </div>
        </div>

      <div class="p-2">
        <i><p class="text-danger">*pada soal pilihan ganda, jika pilihan berwarna <b class="text-success">hijau</b> & memiliki checkmark
          ( <i class="fa fa-check text-success"></i> ), itu menandakan pilihan jawaban yang benar.</p></i>
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

    background: rgba(0,0,0,0.3);
    border: 2px solid #666;
    text-align: center;
  }
  .pa-pilihan ol{
    list-style-type:upper-alpha;
  }
  @media screen and (min-width: 1240px){
    .pa-soal{
      margin-left:30px;
    }
  }
  @media screen and (max-width: 640px){
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
