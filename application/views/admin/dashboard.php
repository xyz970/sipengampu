<?php $this->load->view('admin/common/html_start') ?>
<!-- additional css or js -->
<?php $this->load->view('admin/common/wrapper_start') ?>

<?php $this->load->view('admin/common/navbar') ?>
<?php $this->load->view('admin/common/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Selamat Datang <b><?= $this->session->userdata('nama') ?></b> !</h5>
            Di Sistem Informasi Pengampu <strong>Politeknik Negeri Jember</strong>
          </div>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= @$total_dosen ?></h3>
              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= site_url('admin/master-dosen') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= @$total_matkul ?></h3>
              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= site_url('admin/master-matkul') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= @$total_prodi ?></h3>
              <p>Program Studi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= site_url('admin/master-prodi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $total_pengampu ?></h3>
              <p>Pengampu</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= site_url('admin/master-pengampu') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <?php $i = 1; foreach ($jabatan_title as $key => $j) { ?>
        <?php $this->load->view('admin/component/chart', ['title' => 'Grafik Persebaran Total SKS Dosen '.$j, 'div' => 'chartdiv'.$i++]) ?>
        <?php } ?>
        <?php $this->load->view('admin/component/chart', ['title' => 'Grafik Persebaran Beban Mengajar Dosen ', 'div' => 'chartdivkjm', 'size' => 12]) ?>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/common/footer') ?>
<?php $this->load->view('admin/common/control') ?>

<?php $this->load->view('admin/common/wrapper_end') ?>
<!-- additional css or js at bottom -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="<?= base_url('assets') ?>/js/CAmchart.js"></script>
<!-- Chart code -->
<script>
  am5.ready(function() {
    <?php $i = 1; foreach ($jabatan as $key => $j) { ?>
      CAmchart('chartdiv<?= $i++ ?>').init({ value : 'total_sks', category : 'no'}, <?= json_encode(array_values(array_filter($statistik, function($s) use($j) { 
      if($s['id_jabatan'] == $j) return $s;
    }))) ?>)
    <?php } ?>
    CAmchart('chartdivkjm').init({ value : 'total_kjm', category : 'no'}, <?= json_encode(array_values($statistik)) ?>)
  }); // end am5.ready()
</script>
<?php $this->load->view('admin/common/html_end') ?>