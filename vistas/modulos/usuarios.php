<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre de usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);
                    foreach ($usuarios as $key => $usuario) {
                        ?>
                  <tr>
                  <td> <?php echo $usuario["username"] ?></td>
                  <td> <?php echo $usuario["contra"] ?></td>
                  <td> <?php echo $usuario["nombre"] ?></td>
                  <td> <?php echo $usuario["apellido"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_usuario&id_usuario=<?php echo $usuario["id_usuario"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm btnEliminarPlan" id_usuario=<?php echo $usuario["id_usuario"]; ?>>
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