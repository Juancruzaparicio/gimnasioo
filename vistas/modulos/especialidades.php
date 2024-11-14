<section class="content" style="margin-top: 70px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Especialidades:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);
                    foreach ($especialidades as $key => $especialidad) {
                        ?>
                  <tr>
                  <td> <?php echo $especialidad["id_especialidad"] ?></td>
                  <td> <?php echo $especialidad["nombre"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_especialidad&id_especialidad=<?php echo $especialidad["id_especialidad"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm btnEliminarEspecialidad" id_especialidad=<?php echo $especialidad["id_especialidad"]; ?>>
                          <i class="fas fa-trash"></i>
                        </a>
                  </tr>
                  <?php } ?>
                  <a class="btn btn-app" href="agregar_especialidad">
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

$eliminar = new ControladorEspecialidades();
$eliminar->ctrEliminarEspecialidades();

?>
