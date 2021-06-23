<div class="modal sld-up" tabindex="-1" role="dialog" id="<?= $div_id; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= $md_link; ?>" method="post" class="needs-validation" novalidate="">
        <div class="modal-header">
          <h5 class="modal-title"><?= $md_title; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times text-dark"></i>
          </button>
        </div>
        <?= $md_body; ?>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-<?= $btn_color; ?>"><?= $btn_title; ?></button>
        </div>
    </form>
  </div>
</div>
</div>
