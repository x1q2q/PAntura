<div class="modal sld-up" tabindex="-1" role="dialog" id="detailskor-<?= $id; ?>">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update SKOR Point (<?= $nama.'-'.$regu; ?>)</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times text-dark"></i>
          </button>
        </div>
        <hr>
        <div class="modal-body">
          <?php
          $no=0;
          foreach($dt_detail as $val){
            $no++;
            ?>
            <div class="form-group">
              <h6 class="text-dark"><?= $no.'.) '.$val["nm_pos"]; ?></h6>
              <div class="row">
                <?php foreach($val["dt_skor"] as $valskor){ ?>
                  <div class="<?= count($val["dt_skor"]) > '1' ? 'col-4' : 'col-12'; ?>">
                    <label>Jawaban: <?= $valskor["jawaban"]; ?></label>
                    <input data-jenis="<?= $valskor["jenis"]; ?>" data-id="<?= $valskor["id_qjawab"]; ?>" type="number" class="form-control"
                    value="<?= $valskor['skor']; ?>" <?= $valskor["jenis"] =='pilgan'?' disabled ':''; ?>>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>

        </div>
        <div class="modal-footer justify-content-center bg-whitesmoke br">
          <a onclick="submitSkor()" class="btn btn-lg btn-round btn-success btn-shadow">SUBMIT SKOR
          <i class="fas fa-check-circle" ></i> </a>
        </div>
  </div>
</div>
</div>

<script type="text/javascript">
var id = "<?= $id; ?>";
var urldata = "<?= base_url('admin/dataskor/'); ?>";
var username = "<?= $nama; ?>";
function submitSkor(){
  var dtupdateSkor = [];
  var validated = true;
  $('.form-group input[type="number"]').each(function(){
    if($(this).attr('data-jenis') == 'esai'){
      if($(this).val() >= 0 && $(this).val() <= 100){
        let data = {
          "skor":$(this).val(),
          "id_qjawaban":$(this).attr('data-id'),
          "nm_siswa": username
        };
        dtupdateSkor.push(data);
      }else{
        $('#alert-notif').remove();
        var pesan = "Input skor masih ada yang kurang dari 0 atau lebih dari 100";
        var alert = `<div id="alert-notif" class="alert alert-danger alert-dismissible show fade alert-has-icon">
          <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
          <div class="alert-body">
            <div class="alert-title">Peringatan </div>
            ${pesan}</span>
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </div>
        </div>`;
        $('.modal-body').prepend(alert);
        validated = false;
      }
    }
  });
  if(validated){
    updateDatabase(dtupdateSkor);
  }
}
function updateDatabase(dtUpdate){
  var update = JSON.stringify(dtUpdate);
  $.ajax({
       type: "POST",
       url:  urldata+'updatedata/',
       data: {update: update},
       cache:false,
       success: function(data){
          window.location.replace(data);
        }
  });
}
$(document).ready(function(){
    $('#detailskor-'+id).modal('show');
});
</script>
