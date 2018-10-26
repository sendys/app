<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BBPOM</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css">
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url('/') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BPOM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">eDashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><strong><?php echo $this->session->userdata('name')?></strong></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $this->session->userdata('name')?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if ($this->aauth->is_admin()){
                    echo '<a href="'. site_url('account/sign_up') .'" class="btn btn-default btn-flat">Pengaturan</a>';
									}?>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url()?>account/sign_out" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hello, <strong><?php echo $this->session->userdata('name')?></strong></p>
          <?php echo "" . date("d/m/Y") ;?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?=site_url('/') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Main Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('kategori/index') ;?>"><i class=" fa fa-file-text"></i> Kategori</a></li>
            <li><a href="<?php echo site_url('transaksi/index') ;?>"><i class="fa fa-list-alt"></i> Data Transaksi</a></li>
            <li><a href="<?php echo site_url('barang/index') ;?>"><i class="fa fa-circle-o"></i> Test</a></li>
          </ul>
        </li>
        
        <li>
            <?php if ($this->aauth->is_admin()) {
              echo '<a href="'. site_url('account/list_user') .'"><i class="fa fa-user"></i><span>Pengaturan</span></a>';
            }?>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>

    <!-- Content -->
      <?php echo $contents ;?>
    <!-- end -->
    
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy;  <a href="http://indotama.biz.id">Seven Indotama</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>
  <script src="<?php echo base_url('assets/dist/js/app.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
  <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/chartjs/Chart.min.js') ?>"></script>
</body>
</html>