<?php $this->load->view('admin/common/html_start') ?>
<!-- additional css or js -->
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
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
              <h3 class="card-title">Rasio</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="form-group col">
                    <label>Semester</label>
                    <select class="form-control select2" style="width: 100%;" name="semester">
                    <option value="">Semua semester</option>
                    <?php for($i=1; $i<=8; $i++): ?>
                    <option value="<?= $i ?>">Semester <?= $i ?></option>
                    <?php endfor ?>
                    </select>
                  </div>
                  <div class="form-group col">
                    <label>Mata Kuliah</label>
                    <input type="text" class="form-control" placeholder="Kode Matkul / Nama Matkul" name="matkul">
                  </div>
                </div>
                <button id="show" type="button" class="btn btn-primary mr-auto"><i class="fa fa-filter"></i> Tampilkan</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
      <iframe id="content" src="<?= site_url('admin/export') ?>" frameborder="0" style="min-width:100%; min-height:100%; height:100%"></iframe>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/common/footer') ?>
<?php $this->load->view('admin/common/control') ?>


<?php $this->load->view('admin/common/wrapper_end') ?>
<!-- additional css or js at bottom -->
<script src="<?= base_url('assets') ?>/js/CForm.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
  // Selecting the iframe element
  var iframe = document.getElementById("content");
  
  // Adjusting the iframe height onload event
  iframe.onload = function(){
      iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
  }

  $('#show').click(function(e) {
    let form = $(this).parent()
    let data = form.serialize()
    // console.log(data)
    $('#content').attr('src', $('#content').attr('src').split('?')[0] + '?'+data)
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

  initSelect2('tahun_akademik', 'tahun_akademik', function(data) {
    return {
      results: $.map(data.data, function(item) {
        return {
          text: item.keterangan,
          id: item.id
        }
      })
    };
  })

  initSelect2('prodi', 'prodi', function(data) {
    data.data.unshift({
      id : '',
      nama: '-- Tidak dipilih --'
    })
    return {
      results: $.map(data.data, function(item) {
        return {
          text: item.nama,
          id: item.id
        }
      })
    };
  })

  initSelect2('jabatan', 'jabatan', function(data) {
    data.data.unshift({
      id : '',
      nama: '-- Tidak dipilih --'
    })
    return {
      results: $.map(data.data, function(item) {
        return {
          text: item.nama,
          id: item.id
        }
      })
    };
  })
</script>
<?php $this->load->view('admin/common/html_end') ?>