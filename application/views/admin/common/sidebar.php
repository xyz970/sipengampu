<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets') ?>/img/logo/logo.png" alt="Logo POLIJE" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SI PENGAMPU</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets') ?>/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= @$this->session->nama ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link <?= in_array($this->uri->segment(2), ['master-user','master-puskesmas','master-kegiatan','master-pagu-kegiatan']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if(in_array($this->session->status_pegawai, [1, 2])): ?>
              <li class="nav-item">
                <a href="<?= site_url('admin/master-admin') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-admin' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= site_url('admin/master-tahun-akademik') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-tahun-akademik' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tahun Akademik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/master-jabatan') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-jabatan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/master-prodi') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-prodi' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Program Studi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/master-dosen') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-dosen' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
            <?php endif ?>
            <?php if(in_array($this->session->status_pegawai, [1, 2, 3, 4])): ?>
            <li class="nav-item">
              <a href="<?= site_url('admin/master-matkul') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-matkul' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mata Kuliah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/master-pengampu') ?>" class="nav-link <?= $this->uri->segment(2) == 'master-pengampu' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengampu</p>
              </a>
            </li>
            <?php endif ?>
          </ul>
        </li>
        <?php if(in_array($this->session->status_pegawai, [1, 2, 3, 4])): ?>
        <li class="nav-item">
          <a href="<?= site_url('admin/rekap') ?>" class="nav-link <?= $this->uri->segment(2) == 'rekap' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Rekap
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('admin/rasio') ?>" class="nav-link <?= $this->uri->segment(2) == 'rasio' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-percent"></i>
            <p>
              Rasio
            </p>
          </a>
        </li>
        <?php endif ?>
        <?php if(in_array($this->session->status_pegawai, [1, 2, 3, 4, 5])): ?>
        <li class="nav-item" hidden>
          <a href="<?= site_url('admin/info-mengampu') ?>" class="nav-link <?= $this->uri->segment(2) == 'info-mengampu' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Informasi Mengampu
            </p>
          </a>
        </li>
        <?php endif ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>