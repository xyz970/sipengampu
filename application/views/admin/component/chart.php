<div class="col-<?= !isset($size) ? '6' : $size ?>">
  <div class="card">
    <div class="card-header ui-sortable-handle">
      <h3 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i>
        <?= $title ?>
      </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div style="width: 100%; height: 450px" id="<?= $div ?>"></div>
    </div><!-- /.card-body -->
  </div>
</div>