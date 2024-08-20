<?php $this->load->view('admin/common/html_start') ?>
<!-- additional css or js -->
<style>
  div.btn-container {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
  }

  div.btn-container i {
    display: inline-block;
    position: relative;
    top: -9px;
  }

  label {
    font-size: 13px;
    color: #424242;
    font-weight: 500;
  }

  .btn-color-mode-switch {
    display: inline-block;
    margin: 0px;
    position: relative;
  }

  .btn-color-mode-switch>label.btn-color-mode-switch-inner {
    margin: 0px;
    width: 140px;
    height: 30px;
    background: #E0E0E0;
    border-radius: 26px;
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
    /*box-shadow: 0px 0px 8px 0px rgba(17, 17, 17, 0.34) inset;*/
    display: block;
  }

  .btn-color-mode-switch>label.btn-color-mode-switch-inner:before {
    content: attr(data-on);
    position: absolute;
    font-size: 12px;
    font-weight: 500;
    top: 6px;
    right: 20px;

  }

  .btn-color-mode-switch>label.btn-color-mode-switch-inner:after {
    content: attr(data-off);
    width: 70px;
    height: 27px;
    background: #fff;
    border-radius: 26px;
    position: absolute;
    left: 2px;
    top: 1px;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0px 0px 6px -2px #111;
    padding: 5px 0px;
  }

  .btn-color-mode-switch>.alert {
    display: none;
    background: #FF9800;
    border: none;
    color: #fff;
  }

  .btn-color-mode-switch input[type="checkbox"] {
    cursor: pointer;
    width: 50px;
    height: 25px;
    opacity: 0;
    position: absolute;
    top: 0;
    z-index: 1;
    margin: 0px;
  }

  .btn-color-mode-switch input[type="checkbox"]:checked+label.btn-color-mode-switch-inner {
    background: #151515;
    color: #fff;
  }

  .btn-color-mode-switch input[type="checkbox"]:checked+label.btn-color-mode-switch-inner:after {
    content: attr(data-on);
    left: 68px;
    background: #387E3C;
  }

  .btn-color-mode-switch input[type="checkbox"]:checked+label.btn-color-mode-switch-inner:before {
    content: attr(data-off);
    right: auto;
    left: 20px;
  }

  .btn-color-mode-switch input[type="checkbox"]:checked+label.btn-color-mode-switch-inner {
    background: #66BB6A;
    /*color: #fff;*/
  }

  .btn-color-mode-switch input[type="checkbox"]:checked~.alert {
    display: block;
  }

  /*mode preview*/
  .dark-preview {
    background: #696969;
  }

  .dark-preview div.btn-container i.fa-sun-o {
    color: #777;
  }

  .dark-preview div.btn-container i.fa-moon-o {
    color: #fff;
    text-shadow: 0px 0px 11px #fff;
  }

  .white-preview {
    background: #dedede;
  }

  .white-preview div.btn-container i.fa-sun-o {
    color: #ffa500;
    text-shadow: 0px 0px 16px #ffa500;
  }

  .white-preview div.btn-container i.fa-moon-o {
    color: #777;
  }

  p.by {}

  p.by a {
    text-decoration: none;
    color: #000;
  }

  .dark-preview p.by a,
  .dark-preview .login-logo>a,
  .dark-preview .login-logo>h3 {
    color: #fff;
  }

  .white-preview p.by a,
  .white-preview .login-logo>a,
  .white-preview .login-logo>h3 {
    color: #000;
  }
</style>
</head>

<body class="hold-transition login-page white-preview">

  <div class="login-box">
    <div class="login-logo">
      <img src="assets/img/logo/logo.png" class="mb-4" style="width: 150px" />
      <h3>SI PENGAMPU</h3>
      <h3><b>POLITEKNIK NEGERI JEMBER</b></h3>
    </div>
    <?php if(isset($_GET['gagal'])) { ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> <b>Login gagal</b></h5>
      <b>Silahkan periksa kembali akun anda !</b> <br>
      <i>Atau jika ada kendala, silahkan hubungi Admin</i>
    </div>
    <?php } ?>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Pilih peran untuk masuk ke sistem</p>

        <form action="auth/login" method="post">
          <div class="d-flex justify-content-center">
            <div class="btn-container mt-3 mb-3" style="transform: scale(1.5, 1.5);">
              <i class="fa fa-sun-o" aria-hidden="true"></i>
              <label class="switch btn-color-mode-switch">
                <input type="checkbox" name="status_pegawai" id="color_mode" value="1">
                <label for="color_mode" data-on="ADMIN" data-off="USER" class="btn-color-mode-switch-inner"></label>
              </label>
              <i class="fa fa-moon-o" aria-hidden="true"></i>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="NIP" name="nip">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <?php $this->load->view('admin/common/wrapper_end') ?>

  <script>
    $(document).ready(function() {
      $("#color_mode").on("change", function() {
        colorModePreview(this);
      })
    });

    function colorModePreview(ele) {
      if ($(ele).prop("checked") == true) {
        $('body').addClass('dark-preview');
        $('body').removeClass('white-preview');
      } else if ($(ele).prop("checked") == false) {
        $('body').addClass('white-preview');
        $('body').removeClass('dark-preview');
      }
    }
  </script>
  <?php $this->load->view('admin/common/html_end') ?>