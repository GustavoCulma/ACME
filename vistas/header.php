<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ACME | transportes ACME  </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="../public/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="../public/img/car.png">

     <!--datatables-->

     <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
     <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
     <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
     <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">




   </head>
   <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="propietario" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ACME</b>Trasnportes</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ACME</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/dist/img/gustavo.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Gustavo Adolfo Culma</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/dist/img/gustavo.jpg" class="img-circle" alt="User Image">
                    <p>
                      3133927038  gustavoculma1@gmail.com
                      <small>https://www.facebook.com/Gustavoculma1</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
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
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Ingreso propietarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="propietario"><i class="fa fa-circle-o"></i>Propietarios </a></li>
                <li><a href="vehiculo"><i class="fa fa-circle-o"></i> Vehiculos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Conductores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="conductor"><i class="fa fa-circle-o"></i> Conductores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consultas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="informe"><i class="fa fa-circle-o"></i> Informe</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">ACME</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
