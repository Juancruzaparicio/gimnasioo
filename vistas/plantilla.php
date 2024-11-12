<?php
$url = ControladorPlantilla::url();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <!-- Topbar Start -->
            <?php include 'modulos/encabezado.php' ?>
            <!-- end Topbar -->

            <?php

                if (isset($_GET["pagina"])) {

                    $rutas = explode('/', $_GET["pagina"]);
                    if (
                        $rutas[0] == "clientes" ||
                        $rutas[0] == "agregar_cliente" 
                    ) {

                        include "vistas/modulos/" . $rutas[0] . ".php";
                    } else {

                        include "vistas/modulos/404.php";
                    }
                }

                ?>

            <!-- Left Sidebar Start -->
            <?php include 'modulos/pie.php' ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->