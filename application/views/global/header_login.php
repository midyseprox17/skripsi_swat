<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'; ?>"></script>
      <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	</head>
	<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>">LaundryKuh</a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url().'laundry/logout'; ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>