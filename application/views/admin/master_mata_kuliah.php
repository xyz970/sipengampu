<?php $this->load->view('admin/common/html_start') ?>
<!-- additional css or js -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
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
              <h3 class="card-title">Data Mata Kuliah</h3>
              <button class="btn btn-success btn-sm ml-auto" onclick="add()"><i class="fa fa-plus"></i> Tambah Mata Kuliah</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Total SKS Teori</th>
                    <th>Total SKS Praktik</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Total SKS Teori</th>
                    <th>Total SKS Praktik</th>
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
          <h4 class="modal-title">Tambah Mata Kuliah</h4>
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
            <label>Kode MK</label>
            <input type="text" class="form-control" placeholder="Kode MK" name="kode">
          </div>
          <div class="form-group">
            <label>Nama MK</label>
            <input type="text" class="form-control" placeholder="Nama MK" name="nama">
          </div>
          <div class="form-group">
            <label>Semester</label>
            <input type="number" min="1" max="8" class="form-control" placeholder="Semester" name="semester">
          </div>
          <div class="form-group">
            <label>Status</label>
            <div class="col-6 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1">
                <label class="form-check-label">Teori</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="2">
                <label class="form-check-label">Praktik</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="3">
                <label class="form-check-label">Teori + Praktik</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Total SKS Teori</label>
            <input type="number" class="form-control" placeholder="Total SKS Teori" name="tot_teori">
          </div>
          <div class="form-group">
            <label>Total SKS Praktik</label>
            <input type="number" class="form-control" placeholder="Total SKS Praktik" name="tot_praktik">
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

<script>
  var table = CDatatable("#table", {
    url: '<?= site_url() ?>/api/matkul',
    type: 'GET'
  }, [{
      targets: 0,
      data: 'id',
      width: 50,
      render: (data, type, row, meta) => meta.row + 1
    },
    {
      targets: 1,
      data: 'kode',
    },
    {
      targets: 2,
      data: 'nama',
      width: 500
    },
    {
      targets: 3,
      data: 'nama_prodi',
      width: 500
    },
    {
      targets: 4,
      data: 'semester',
    },
    {
      targets: 5,
      data: 'tot_teori',
    },
    {
      targets: 6,
      data: 'tot_praktik',
    },
    {
      targets: 7,
      data: 'status',
      render: function(data, type, row, meta) {
        let arr = [
          {
            text : 'Teori',
            color : 'primary'
          },
          {
            text : 'Praktik',
            color : 'success'
          },
          {
            text : 'Teori + Praktik',
            color : 'warning'
          }
        ]
        return data != undefined && parseInt(data) > 0 ? `
        <span class="badge badge-${arr[(parseInt(data)-1)].color}">${arr[(parseInt(data)-1)].text}</span>
        ` : ``
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
      url: '<?= site_url('api/matkul') ?>',
      type: 'POST'
    },
    $('#modal').find('form'), {
      success: function(res) {
        table.reload()
        $('#modal').modal('hide')
      },
      error: function(err) {}
    })

  var add = function() {
    let modal = $('#modal')
    modal.find('.modal-title').html('Tambah data Matkul')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
  }

  var showUpdate = (id) => {
    let modal = $('#modal')
    modal.find('.modal-title').html('Perbarui data Matkul')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
    $.get('<?= site_url('api/matkul/') ?>' + id, (res) => {
      if (res.success) {
        form.find('input[name=id]').val(res.data.id)
        form.find('input[name=kode]').val(res.data.kode)
        form.find('input[name=nama]').val(res.data.nama)
        form.find('input[name=semester]').val(res.data.semester)
        $('input:radio[name=status]').filter('[value='+res.data.status+']').prop('checked', true)
        form.find('input[name=tot_teori]').val(res.data.tot_teori)
        form.find('input[name=tot_praktik]').val(res.data.tot_praktik)
      }
    })
  }

  var deleteData = function(id) {
    var d = CForm({
      url: '<?= site_url('api/matkul/') ?>' + id,
      type: 'DELETE'
    }, null, {
      success: function(res) {
        table.reload()
      },
      error: function(err) {}
    })

    d.delete()
  }

  $(document).ready(function() {
    table.init()
    form.init()
  })
</script>
<?php $this->load->view('admin/common/html_end') ?>