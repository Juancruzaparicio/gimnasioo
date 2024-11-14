<?php
session_start();
if (isset($_SESSION["iniciarSesion"])) {
  echo "Sesión iniciada correctamente.";
} else {
  echo "Error: sesión no iniciada.";
}
$url = ControladorPlantilla::url();

?>
<?php if (isset($_SESSION["iniciarSesion"])) { ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <section class="content">
        <!-- Topbar Start -->
            <?php include 'modulos/encabezado.php' ?>
            <!-- end Topbar -->

            <?php

                  // Si no se especifica una página, cargar el menú por defecto
                if (!isset($_GET["pagina"])) {
                  include "vistas/modulos/menu.php";
                } else {
                  $rutas = explode('/', $_GET["pagina"]);
                  if (
                      $rutas[0] == "clientes" ||
                      $rutas[0] == "entrenadores" ||
                      $rutas[0] == "pagos" ||
                      $rutas[0] == "planes" ||
                      $rutas[0] == "especialidades" ||
                      $rutas[0] == "usuarios" ||
                      $rutas[0] == "agregar_entrenador" ||
                      $rutas[0] == "agregar_pago" ||
                      $rutas[0] == "agregar_plan" ||
                      $rutas[0] == "agregar_especialidad" ||
                      $rutas[0] == "editar_entrenador" ||
                      $rutas[0] == "editar_plan" ||
                      $rutas[0] == "editar_pago" ||
                      $rutas[0] == "editar_cliente" ||
                      $rutas[0] == "editar_especialidad" ||
                      $rutas[0] == "editar_usuario" ||
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
</div>
<!-- ./wrapper -->

<?php } else {
    include "vistas/modulos/login.php";
}

?>