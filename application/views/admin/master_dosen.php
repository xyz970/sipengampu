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
              <h3 class="card-title">Data Dosen</h3>
              <button class="btn btn-success btn-sm ml-auto" onclick="add()"><i class="fa fa-plus"></i> Tambah Dosen</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Prodi</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Status Pegawai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Prodi</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Status Pegawai</th>
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
    <form method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
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
            <label>Program Studi</label>
            <select class="form-control select2" placeholder="Prodi" name="id_prodi"></select>
          </div>
          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" placeholder="NIP" name="nip">
          </div>
          <div class="form-group">
            <label>Nama Lengkap (Beserta gelar)</label>
            <div class="container-fluid">
              <div class="row">
              <input type="text" class="form-control col-2" name="glr_depan" placeholder="Gelar">
              <input type="text" class="form-control col ml-2 mr-2" placeholder="Nama" name="nama">
              <input type="text" class="form-control col-2" name="glr_belakang" placeholder="Gelar">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>NIDN</label>
            <input type="text" class="form-control" placeholder="NIDN" name="nidn">
          </div>
          <div class="form-group">
            <label>Golongan</label>
            <input type="text" class="form-control" placeholder="Golongan" name="golongan">
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select name="jabatan" class="form-control select2"></select>
          </div>
          <div class="form-group">
            <label>Status Pegawai</label>
            <select class="form-control select2" name="status_pegawai">
              <option value="1">Admin</option>
              <option value="2">Ketua Program Studi</option>
              <option value="3">Ketua Jurusan</option>
              <option value="4">Sekertaris Jurusan</option>
              <option value="5">Dosen</option>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="Password" name="password">
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
<script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>

<script>
  var table = CDatatable("#table", {
    url: '<?= site_url() ?>/api/dosen',
    type: 'GET'
  }, [{
      targets: 0,
      data: 'id',
      width: 50,
      render: (data, type, row, meta) => meta.row + 1
    },
    {
      targets: 1,
      data: 'nama_prodi',
    },
    {
      targets: 2,
      data: 'nip',
      width: 150,
    },
    {
      targets: 3,
      data: null,
      width: 300,
      render: function(data, type, row, meta) {
        return `${data.glr_depan} ${data.nama} ${data.glr_belakang}`;
      }
    },
    {
      targets: 4,
      data: 'nidn',
    },
    {
      targets: 5,
      data: 'golongan',
    },
    {
      targets: 6,
      data: 'jabatan',
    },
    {
      targets: 7,
      data: 'status_pegawai',
      render: function(data, type, row, meta) {
        let arr = ['Admin', 'Ketua Program Studi', 'Ketua Jurusan', 'Sekertaris Jurusan', 'Dosen']
        return arr[(parseInt(data)-1)]
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

  var add = function() {
    let modal = $('#modal')
    modal.find('.modal-title').html('Tambah data dosen')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
    form.find('.select2').val(null).trigger('change')
  }

  var showUpdate = (id) => {
    let modal = $('#modal')
    modal.find('.modal-title').html('Perbarui data dosen')
    modal.modal('show')
    let form = modal.find('form')
    form[0].reset()
    form.find('.select2').val(null).trigger('change')
    $.get('<?= site_url('api/dosen/') ?>'+id, (res) => {
      if(res.success) {
        form.find('input[name=id]').val(res.data.id)
        form.find('select[name=id_prodi]').val(res.data.id_prodi).trigger('change')
        form.find('input[name=nip]').val(res.data.nip)
        form.find('input[name=glr_depan]').val(res.data.glr_depan)
        form.find('input[name=nama]').val(res.data.nama)
        form.find('input[name=glr_belakang]').val(res.data.glr_belakang)
        form.find('input[name=nidn]').val(res.data.nidn)
        form.find('input[name=golongan]').val(res.data.golongan)
        form.find('select[name=jabatan]').val(res.data.id_jabatan).trigger('change')
        form.find('select[name=status_pegawai]').val(res.data.status_pegawai).trigger('change')
      }
    })
  }

  var form = CForm({
      url: '<?= site_url('api/dosen') ?>',
      type: $('#modal').find('form').attr('method')
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
      url: '<?= site_url('api/dosen/') ?>'+id,
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

    select2Ajax('.select2[name=id_prodi]', '<?= site_url() ?>/api/prodi', (data) => {
      return {
        id : data.id,
        text: data.nama
      }
    })
    
    select2Ajax('.select2[name=jabatan]', '<?= site_url() ?>/api/jabatan', (data) => {
      return {
        id : data.id,
        text: data.nama
      }
    })

    $('.select2[name=status_pegawai]').select2({theme: 'bootstrap4'})
  })
</script>
<?php $this->load->view('admin/common/html_end') ?>