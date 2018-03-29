<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/chosen.css"> 

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <?php header('Access-Control-Allow-Origin: *'); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>RK</b>WineShop</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>RK Wineshop</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>

                 <?php if($this->session->userdata('logged_in')) {

                  $session_dat = $this->session->userdata('logged_in');
                  $first_name    = $session_dat['first_name'];  
                  $last_name     = $session_dat['last_name'];
                  $users_role_id = $session_dat['users_role_id'];
                   } ?>
                  <span class="hidden-xs"><?php echo $first_name." ".$last_name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
  
                      <small><?php if($users_role_id == 1) { echo "Admin"; } elseif($users_role_id == 2) { echo "manager"; } else { echo "Employee"; } ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>login_controller/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                <i class="fa fa-plus" aria-hidden="true"></i> 
                <span>Brands</span>
                <span class="pull-right-container"><i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-right: 10px;"></i></span>
              </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="<?php echo base_url(); ?>brand_controller/add_brand" >
                      <i class="fa fa-plus" aria-hidden="true"></i> 
                      <span>Add Brand</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>brand_controller/view_brands" >
                        <i class="fa fa-list" aria-hidden="true"></i> 
                        <span>View Brands</span>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                <i class="fa fa-plus" aria-hidden="true"></i> 
                <span>Stock</span>
                <span class="pull-right-container"><i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-right: 10px;"></i></span>
              </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="<?php echo base_url(); ?>stock_controller/add_stock" >
                      <i class="fa fa-plus" aria-hidden="true"></i> 
                      <span>Add Stock</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>stock_controller/view_stock" >
                        <i class="fa fa-list" aria-hidden="true"></i> 
                        <span>View Stock</span>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="treeview">
              <a href="">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>Sales</span> <span class="pull-right-container"><i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-right: 10px;"></i></span>
              </a>
         		<ul class="treeview-menu">
			      <li>
			        <a href="<?php echo base_url(); ?>sales_controller/add_sales" >
			          <i class="fa fa-plus" aria-hidden="true"></i>
			          <span>Add Sales</span>
			        </a>
			      </li>
			      <li>
			        <a href="<?php echo base_url(); ?>sales_controller/view_sales" >
			          <i class="fa fa-list" aria-hidden="true"></i> 
			          <span>View Sales</span>
			        </a>
			      </li>
			    </ul>
             </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>users/users_list">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
          
            <li class="treeview">
              <a href="reports.php" >
                <i class="fa fa-money"></i>
                <span>Expenditure</span> <span class="pull-right-container"><i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-right: 10px;"></i></span>
              </a>
              <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url(); ?>expenditure_controller/set_expenditure">
                      <i class="fa fa-plus"></i>
                      <span>Add Expenditure</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>expenditure_controller/get_expenditure">
                      <i class="fa fa-list"></i>
                      <span>View Expenditure</span>
                    </a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="reports.php" >
                <i class="fa fa-files-o"></i>
                <span>Reports</span> <span class="pull-right-container"><i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-right: 10px;"></i></span>
              </a>
              <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url(); ?>report_controller/view_reports">
                      <i class="fa fa-file"></i>
                      <span>Reports Sheet</span>
                    </a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>