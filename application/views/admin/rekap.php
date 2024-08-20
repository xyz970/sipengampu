<?php $this->load->view('admin/common/html_start') ?>
<!-- additional css or js -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  #table.dataTable > thead {
    height: 1px !important;
    max-height: 1px;
  }
</style>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekap</h3>
            </div>
            <div class="card-body">
              <form action="<?= site_url('admin/export') ?>" method="GET">
                <div class="row">
                  <div class="form-group col">
                    <label>Tahun Akademik</label>
                    <select class="form-control select2" style="width: 100%;" name="tahun_akademik"></select>
                  </div>
                  <div class="form-group col">
                    <label>Program Studi</label>
                    <select class="form-control select2" style="width: 100%;" name="prodi"></select>
                  </div>
                  <div class="form-group col">
                    <label>Jabatan</label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan"></select>
                  </div>
                  <div class="form-group col">
                    <label>Dosen</label>
                    <input type="text" class="form-control" placeholder="NIP / Nama dosen" name="dosen">
                  </div>
                </div>
                <button id="refresh" type="button" class="btn btn-warning"><i class="fa fa-retweet"></i></button>
                <button id="show" type="button" class="btn btn-primary"><i class="fa fa-filter"></i> Tampilkan</button>
                <button type="submit" name="export" class="btn btn-success"><i class="fa fa-file-excel"></i> Download</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
      <!-- <iframe id="content" src="<?= site_url('admin/export_view') ?>" frameborder="0" style="min-width:100%; min-height:100%; height:100%"></iframe> -->
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
      <?php if ($this->input->get('tahun_akademik') != '') : ?>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <table id="table" class="table table-bordered display table-striped" style="width: 100%;">
                <thead style="background: #FDFDFD;">
                  <tr>
                    <th rowspan="2" style="width: 60px; vertical-align: middle;" class="p-3 text-center">NO</th>
                    <th rowspan="2" style="width: 350px; vertical-align: middle;" class="p-3 text-center">NAMA DOSEN</th>
                    <th rowspan="2" style="width: 200px; vertical-align: middle;" class="p-3 text-center">JABATAN</th>
                    <?php foreach ($prodi as $key => $value) { ?>
                    <th colspan="3" class="text-center p-3"><?= $value->nama ?></th>
                    <?php } ?>
                    <th colspan="12" class="text-center p-3" style="width: 100px; vertical-align: middle;">TOTAL KJM</th>
                    <th rowspan="2" class="text-center p-3" style="width: 400px; vertical-align: middle;">PRODI</th>
                  </tr>
                  <tr>
                    <?php foreach ($prodi as $key => $value) { ?>
                      <th class="p-0 text-center" style="min-width: 100px; vertical-align: middle;">Σ MK</th>
                      <th class="p-0 text-center" style="min-width: 100px; vertical-align: middle;">Σ TEORI</th>
                      <th class="p-0 text-center" style="min-width: 100px; vertical-align: middle;">Σ PRAKTIK</th>
                    <?php } ?>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ MK</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ TEORI</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ KJM TEORI</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ PRAKTIK</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ KJM PRAKTIK</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">Σ TEORI + PRAKTIK</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">KORDINATOR</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">TIM TEACHING</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">JABATAN</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">KJM TEORI</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">KJM PRAKTIK</th>
                    <th class="p-3 text-center" style="min-width: 100px; vertical-align: middle;">TOTAL KJM</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($dosen as $key => $value) { ?>
                    <tr>
                      <td class="text-center p-2" style="min-width: 60px; vertical-align: middle;"><?= $i++ ?></td>
                      <td class="p-2" style="min-width: 350px; vertical-align: middle;"><?= $value->glr_depan . " " . $value->nama . ($value->glr_belakang != '' ? ', ' : '') . $value->glr_belakang ?></td>
                      <td class="p-2" style="min-width: 200px; vertical-align: middle;"><?= $value->nama_jabatan ?></td>
                      <?php
                      $total_mk = 0;
                      $total_sks_teori = 0;
                      $total_sks_praktik = 0;
                      $total_kordinator = 0;
                      $total_teamteaching = 0;
                      foreach ($prodi as $pkey => $pvalue) {
                        $matkul = $this->pengampu_model->getSKS($pvalue->id, $value->nip, $this->input->get('tahun_akademik'))->row();
                        $total_mk = $total_mk + floatval($matkul->total_mk);
                        $total_sks_teori = $total_sks_teori + floatval($matkul->total_sks_teori);
                        $total_sks_praktik = $total_sks_praktik + floatval($matkul->total_sks_praktik);
                        $total_kjm_sks_teori = ($total_sks_teori <= 4 ? 0 : ($total_sks_teori > 4 && $total_sks_teori <= 8 ? $total_sks_teori - 4 : 4));
                        $total_kjm_sks_praktik = ($total_sks_praktik <= 8 ? 0 : ($total_sks_praktik > 8 && $total_sks_praktik <= 12 ? $total_sks_praktik - 8 : 4));
                        $total_kordinator += $matkul->total_kordinator;
                        $total_teamteaching += $matkul->total_teamteaching;
                      ?>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $matkul->total_mk ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= floatval($matkul->total_sks_teori) ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= floatval($matkul->total_sks_praktik) ?></td>
                      <?php } ?>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_mk ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_sks_teori ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;" title="KJM Teori"><?= $total_kjm_sks_teori ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_sks_praktik ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;" title="KJM Praktik"><?= $total_kjm_sks_praktik ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_sks_teori + $total_sks_praktik ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_kordinator ?></td>
                      <td class="p-2 text-center" style="min-width: 100px; vertical-align: middle;"><?= $total_teamteaching ?></td>
                      <td class="p-2 text-right" style="min-width: 100px; vertical-align: middle;"><?= 'Rp ' . number_format($value->nominal, 2, ',', '.') ?></td>
                      <td class="p-2 text-right" style="min-width: 100px; vertical-align: middle;" title="Pendapatan KJM Teori"><?= 'Rp ' . number_format($total_kjm_sks_teori * $value->nominal * 14,  2, ',', '.') ?></td>
                      <td class="p-2 text-right" style="min-width: 100px; vertical-align: middle;" title="Pendapatan KJM Praktik"><?= 'Rp ' . number_format($total_kjm_sks_praktik * $value->nominal * 14,  2, ',', '.') ?></td>
                      <td class="p-2 text-right" style="min-width: 100px; vertical-align: middle;" title="Pendapatan KJM Total"><?= 'Rp ' . number_format(($total_kjm_sks_teori * $value->nominal * 14) + ($total_kjm_sks_praktik * $value->nominal * 14),  2, ',', '.') ?></td>
                      <td class="p-2 text-center" style="min-width: 400px; vertical-align: middle;"><?= $value->nama_prodi ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/common/footer') ?>
<?php $this->load->view('admin/common/control') ?>


<?php $this->load->view('admin/common/wrapper_end') ?>
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- additional css or js at bottom -->
<script src="<?= base_url('assets') ?>/js/CForm.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
  // Selecting the iframe element
  // var iframe = document.getElementById("content");

  // // Adjusting the iframe height onload event
  // iframe.onload = function() {
  //   iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
  // }

  $('#show').click(function(e) {
    let form = $(this).parent()
    let data = form.serialize()
    // console.log(data)
    // $('#content').attr('src', $('#content').attr('src').split('?')[0] + '?' + data)
    location.href = location.href.split('?')[0]+'?'+data
  })

  $('#refresh').click(function(e) {
    $('.select2[name=prodi]').val(null).trigger('change')
    $('.select2[name=jabatan]').val(null).trigger('change')
    $('input[name=dosen]').val('')
  })

  $('#table').DataTable({
      dom: "Bfrltip",
      autoWidth: true,
      lengthChange: true,
      scrollX: true,
      orderCellsTop: true,
      fixedHeader: true,
      pageLength: 100,
      lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
    })
</script>
<script>
  var initSelect2 = function(name, url, template) {
    $('.select2[name=' + name + ']').select2({
      theme: 'bootstrap4',
      ajax: {
        url: '<?= site_url() ?>/api/' + url,
        dataType: "json",
        type: "GET",
        headers: {
          'x-api-key': 444
        },
        data: function(params) {

          var queryParameters = {
            term: params.term
          }
          return queryParameters;
        },
        processResults: template
      }
    })
  }

  select2Ajax('.select2[name=tahun_akademik]', '<?= site_url() ?>/api/tahun-akademik', (data) => {
    return {
      id: data.id,
      text: data.tahun_ajaran + ' [' + data.keterangan + ']'
    }
  })

  select2Ajax('.select2[name=prodi]', '<?= site_url() ?>/api/prodi', (data) => {
    return {
      id: data.id,
      text: data.nama
    }
  }, () => $('.select2[name=prodi]').val('<?= $this->input->get('prodi') ?>').trigger('change'))

  select2Ajax('.select2[name=jabatan]', '<?= site_url() ?>/api/jabatan', (data) => {
    return {
      id: data.id,
      text: data.nama
    }
  }, () => $('.select2[name=jabatan]').val('<?= $this->input->get('jabatan') ?>').trigger('change'))

  $('input[name=dosen]').val('<?= $this->input->get('dosen') ?>')
</script>
<?php $this->load->view('admin/common/html_end') ?>