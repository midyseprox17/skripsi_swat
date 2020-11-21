<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi SWAT</title>
  <link rel="icon" type="image/png" href="<?=base_url().'assets/'?>img/icon.png" sizes="16x32">


  <!-- Custom fonts for this template-->
  <link href="<?=base_url().'assets/'?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url().'assets/'?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=base_url().'assets/'?>css/sb-admin-2.css" rel="stylesheet">
  <script src="<?=base_url().'assets/'?>vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url().'assets/'?>vendor/jquery/jquery-ui.js"></script>
  <link href="<?=base_url().'assets/'?>vendor/jquery/jquery-ui.css" rel="stylesheet">
  <link href="<?=base_url().'assets/'?>vendor/jquery/jquery-confirm.min.css" rel="stylesheet">
  <script src="<?=base_url().'assets/'?>vendor/jquery/jquery-confirm.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #15406a">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
        <div class="sidebar-brand-icon">
         <img src="<?=base_url().'assets/'?>img/logo-2.png" class="mx-auto d-block" style="width: 80%">
        </div>
        <div class="sidebar-brand-text"><p class="h6 mx-4 my-3">APLIKASI SIM</p></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <?php if($this->session->userdata('hak_akses') == 'adm'){
      ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url().'user'?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
        </li>
      <?php
      }else if($this->session->userdata('hak_akses') == 'staff'){
      ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url().'pegawai'?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url().'klien'?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Klien</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url().'kontrak'?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Kontrak</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url().'#'?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Penempatan</span></a>
        </li>
      <?php
      }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <b> Tanggal Hari Ini : <?=date("d-m-Y")?> </b>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama']?></span>
                <img class="img-profile rounded-circle" src="<?=base_url().'assets/'?>img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('swat/data_login')?>">
                  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Data
                </a>
                <a class="dropdown-item" href="<?=base_url('swat/ubah_password')?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        </div>
        <!-- /.container-fluid -->