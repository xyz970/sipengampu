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
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">Data Tahun Akademik</h3>
              <button class="btn btn-success btn-sm ml-auto" onclick="add()"><i class="fa fa-plus"></i> Tambah Tahun Akademik</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Akademik</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tahun Akademik</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/common/footer') ?>
<?php $this->load->view('admin/common/control') ?>


<div class="modal fade" id="modal">
  <div class="modal-dialog modal-lg">
    <form>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Tahun Akademik</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" hidden>
            <label>ID</label>
            <input type="text" class="form-control" placeholder="id" name="id">
          </div>
          <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="text" class="form-control" placeholder="Nama tahun akademik" name="tahun_ajaran">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <select name="keterangan" class="form-control">
              <option value="GANJIL">GANJIL</option>
              <option value="GENAP">GENAP</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <div class="col-6 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1">
                <label class="form-check-label">Aktif</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0">
                <label class="form-check-label">Tidak aktif</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $this->load->view('admin/common/wrapper_end') ?>
<!-- additional css or js at bottom -->
<!-- DataTables  & Plugins -->
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
<script src="<?= base_url('assets') ?>/js/CDatatable.js"></script>
<script src="<?= base_url('assets') ?>/js/CForm.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
  var table = CDatatable("#table", {
    url: '<?= site_url() ?>/api/tahun-akademik',
    type: 'GET'
  }, [{
      targets: 0,
      data: 'id',
      width: 50,
      render: (data, type, row, meta) => meta.row + 1
    },
    {
      targets: 1,
      data: 'tahun_ajaran',
    },
    {
      targets: 2,
      data: 'keterangan',
    },
    {
      targets: 3,
      data: 'status',
      render: function(data, type, row, meta) {
        if(data == 1) return `<span class="badge badge-success">AKTIF</span>`;
        else return `<span class="badge badge-secondary">TIDAK AKTIF</span>`;
      }
    },
    {
      targets: -1,
      data: null,
      class: 'text-center',
      sortable: false,
      searchable: false,
      width: 50,
      render: function(data, type, row, meta) {
        return `
          <div class="btn-group">
            <button type="button" onclick="showUpdate('${data.id}')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
            <button type="button" onclick="deleteData('${data.id}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
          </div>
          `
      }
    },
  ])

  var form = CForm({
      url: '<?= site_url('api/tahun-akademik') ?>',
      type: 'POST'
    },
    $('#modal').find('form'), {
      success: function(res) {
        table.reload()
        $('#modal').modal('hide')
      },
      error: function(err) {}
    })


  var deleteData = function(id) {
    var d = CForm({
      url: '<?= site_url('api/tahun-akademik/') ?>' + id,
      type: 'DELETE'
    }, null, {
      success: function(res) {
        table.reload()
      },
      error: function(err) {}
    })

    d.delete()
  }

  
  var add = function() {
    let modal = $('#modal')
    modal.find('.modal-title').html('Tambah data tahun akademik')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
  }

  var showUpdate = (id) => {
    let modal = $('#modal')
    modal.find('.modal-title').html('Perbarui data tahun akademik')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
    $.get('<?= site_url('api/tahun-akademik/') ?>'+id ,(res) => {
      if(res.success) {
        form.find('input[name=id]').val(res.data.id)
        form.find('input[name=tahun_ajaran]').val(res.data.tahun_ajaran)
        form.find('select[name=keterangan]').val(res.data.keterangan)
        $('input:radio[name=status]').filter('[value='+res.data.status+']').prop('checked', true)
      }
    })
  }

  $(document).ready(function() {
    table.init()
    form.init()
  })
</script>
<?php $this->load->view('admin/common/html_end') ?>