<?php
if (isset($_GET['export'])) {
  // fungsi header dengan mengirimkan raw data excel
  header("Content-type: application/vnd-ms-excel");
  // membuat nama file ekspor "export-to-excel.xls"
  header("Content-Disposition: attachment; filename=REKAP-".$this->input->get('tahun_akademik').".xls");
}
?>
<?php $this->load->view('admin/common/html_start') ?>
<style>
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }
</style>
</head>

<body>
  <div class="container-fluid m-0">
    <?php if ($this->input->get('tahun_akademik') != '') : ?>
      <div class="row">
        <div class="col-12 p-0 m-0">
          <table border="1" class="bg-white" style="width: auto;">
            <thead style="background: #efefef">
              <tr>
                <th rowspan="2" style="width: 50px;" class="p-3 text-center">NO</th>
                <th rowspan="2" style="width: 300px;" class="p-3 text-center">NAMA DOSEN</th>
                <th rowspan="2" style="width: 200px;" class="p-3 text-center">JABATAN</th>
                <?php foreach ($prodi as $key => $value) { ?>
                  <th colspan="3" class="text-center p-3"><?= $value->nama ?></th>
                <?php } ?>
                <th colspan="12" class="text-center p-3">TOTAL KJM</th>
                <th rowspan="2" class="text-center p-3">PRODI</th>
              </tr>
              <tr>
                <?php foreach ($prodi as $key => $value) { ?>
                  <th class="p-0 text-center" style="min-width: 90px">Σ MK</th>
                  <th class="p-0 text-center" style="min-width: 90px">Σ TEORI</th>
                  <th class="p-0 text-center" style="min-width: 90px">Σ PRAKTIK</th>
                <?php } ?>
                <th class="p-3 text-center" style="min-width: 100px">Σ MK</th>
                <th class="p-3 text-center" style="min-width: 100px">Σ TEORI</th>
                <th class="p-3 text-center" style="min-width: 100px">Σ KJM TEORI</th>
                <th class="p-3 text-center" style="min-width: 100px">Σ PRAKTIK</th>
                <th class="p-3 text-center" style="min-width: 100px">Σ KJM PRAKTIK</th>
                <th class="p-3 text-center" style="min-width: 100px">Σ TEORI + PRAKTIK</th>
                <th class="p-3 text-center" style="min-width: 100px">KORDINATOR</th>
                <th class="p-3 text-center" style="min-width: 100px">TIM TEACHING</th>
                <th class="p-3 text-center" style="min-width: 100px">JABATAN</th>
                <th class="p-3 text-center" style="min-width: 100px">KJM TEORI</th>
                <th class="p-3 text-center" style="min-width: 100px">KJM PRAKTIK</th>
                <th class="p-3 text-center" style="min-width: 100px">TOTAL KJM</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($dosen as $key => $value) { ?>
                <tr>
                  <td class="text-center p-2"><?= $i++ ?></td>
                  <td class="p-2"><?= $value->glr_depan . " " . $value->nama . ($value->glr_belakang != '' ? ', ' : '') . $value->glr_belakang ?></td>
                  <td class="p-2"><?= $value->nama_jabatan ?></td>
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
                    <td class="p-2 text-center"><?= $matkul->total_mk ?></td>
                    <td class="p-2 text-center"><?= floatval($matkul->total_sks_teori) ?></td>
                    <td class="p-2 text-center"><?= floatval($matkul->total_sks_praktik) ?></td>
                  <?php } ?>
                  <td class="p-2 text-center"><?= $total_mk ?></td>
                  <td class="p-2 text-center"><?= $total_sks_teori ?></td>
                  <td class="p-2 text-center" title="KJM Teori"><?= $total_kjm_sks_teori ?></td>
                  <td class="p-2 text-center"><?= $total_sks_praktik ?></td>
                  <td class="p-2 text-center" title="KJM Praktik"><?= $total_kjm_sks_praktik ?></td>
                  <td class="p-2 text-center"><?= $total_sks_teori + $total_sks_praktik ?></td>
                  <td class="p-2 text-center"><?= $total_kordinator ?></td>
                  <td class="p-2 text-center"><?= $total_teamteaching ?></td>
                  <td class="p-2 text-right"><?= 'Rp ' . number_format($value->nominal, 2, ',', '.') ?></td>
                  <td class="p-2 text-center" title="Pendapatan KJM Teori"><?= 'Rp ' . number_format($total_kjm_sks_teori * $value->nominal * 14,  2, ',', '.') ?></td>
                  <td class="p-2 text-center" title="Pendapatan KJM Praktik"><?= 'Rp ' . number_format($total_kjm_sks_praktik * $value->nominal * 14,  2, ',', '.') ?></td>
                  <td class="p-2 text-center" title="Pendapatan KJM Total"><?= 'Rp ' . number_format(($total_kjm_sks_teori * $value->nominal * 14) + ($total_kjm_sks_praktik * $value->nominal * 14),  2, ',', '.') ?></td>
                  <td class="p-2 text-center"><?= $value->nama_prodi ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif ?>
  </div>
</body>

</html>