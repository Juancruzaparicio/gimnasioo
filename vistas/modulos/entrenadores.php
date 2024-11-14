<section class="content" style="margin-top: 70px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Entrenadores:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Mail</th>
                    <th>Especialidad</th>
                    <th>Fecha de contratacion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $entrenadores = ControladorEntrenadores::ctrMostrarEntrenador(null, null);
                    foreach ($entrenadores as $key => $entrenador) {
                        ?>
                  <tr>
                  <td> <?php echo $entrenador["dni"] ?></td>
                  <td> <?php echo $entrenador["nombre"] ?></td>
                  <td> <?php echo $entrenador["apellido"] ?></td>
                  <td> <?php echo $entrenador["telefono"] ?></td>
                  <td> <?php echo $entrenador["mail"] ?></td>
                  <td> <?php echo $entrenador["nombre_especialidad"] ?></td>
                  <td> <?php echo $entrenador["fecha_contratacion"] ?> </td>
                  <td> <?php echo $entrenador["estado"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_entrenador&id_entrenador=<?php echo $entrenador["id_entrenador"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm btnEliminarEntrenador" id_entrenador=<?php echo $entrenador["id_entrenador"]; ?>>
                          <i class="fas fa-trash"></i>
                        </a>
                  </tr>
                  <?php } ?>
                  <a class="btn btn-app" href="agregar_entrenador">
                  <i class="fas fa-plus"></i> Agregar</a>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
      <!-- /.container-fluid -->
    </section>
    <?php

$eliminar = new ControladorEntrenadores();
$eliminar->ctrEliminarEntrenadores();

?>