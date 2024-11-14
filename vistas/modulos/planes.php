<section class="content" style="margin-top: 70px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Planes de entrenamiento:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Duracion (semanas)</th>
                    <th>Cantidad de sesiones X semana</th>
                    <th>Entrenador</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $planes = ControladorPlanes::ctrMostrarPlanes(null, null);
                    foreach ($planes as $key => $plan) {
                        ?>
                  <tr>
                  <td> <?php echo $plan["nombre"] ?></td>
                  <td> <?php echo $plan["codigo"] ?></td>
                  <td> <?php echo $plan["descripcion"] ?></td>
                  <td> <?php echo $plan["duracion_semanas"] ?> semanas</td>
                  <td> <?php echo $plan["cantidadsesiones_semana"] ?> X semana</td>
                  <td> <?php echo $plan["nombre_entrenador"] ?> <?php echo $plan["apellido_entrenador"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_plan&id_plan=<?php echo $plan["id_plan"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm btnEliminarPlan" id_plan=<?php echo $plan["id_plan"]; ?>>
                          <i class="fas fa-trash"></i>
                        </a>
                  </tr>
                  <?php } ?>
                  <a class="btn btn-app" href="agregar_plan">
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

$eliminar = new ControladorPlanes();
$eliminar->ctrEliminarPlanes();

?>