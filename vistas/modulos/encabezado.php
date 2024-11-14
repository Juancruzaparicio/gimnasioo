<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GILAPA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/img/gilapa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GILAPA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php if(isset($_SESSION["id_usuario"])): ?>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre_usuario"] . " " . $_SESSION["apellido_usuario"]; ?></a>
        </div>
        <?php endif; ?>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="clientes" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="entrenadores" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entrenadores
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pagos" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pagos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="planes" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Planes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="especialidades" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Especialidades
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Usuarios
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="salir" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Salir
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
