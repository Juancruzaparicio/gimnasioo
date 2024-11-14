<?php

$entrenadores = ControladorEntrenadores::ctrMostrarEntrenador(null, null);


?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Plan:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="nombre_plan">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_plan" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="codigo_plan">Codigo</label>
                    <input required type="number" class="form-control" name="codigo_plan" placeholder="Codigo" >
                  </div>
                  <div class="form-group">
                    <label for="descripcion_plan">descripcion</label>
                    <input required type="text" class="form-control" name="descripcion_plan" placeholder="Descripcion">
                  </div>
                  <div class="form-group">
                    <label for="duracion">Duracion en Semanas</label>
                    <input required type="number" class="form-control" name="duracion" placeholder="Duracion">
                  </div>
                  <div class="form-group">
                    <label for="cantidad">Cantidad de sesiones por semana</label>
                    <input required type="number" class="form-control" name="cantidad" placeholder="Cantidad">
                  </div>
                  <div class="form-group">
                    <label for="entrenador" class="form-label">Entrenador</label>
                    <select class="form-select" name="entrenador" id="entrenador" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($entrenadores as $key => $entrenador) { ?>

                            <option value="<?php echo $entrenador["id_entrenador"]; ?>"><?php echo $entrenador["nombre"]; ?> <?php echo $entrenador["apellido"]; ?></option>

                        <?php } ?>

                    </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <?php
                $guardar = new ControladorPlanes();
                $guardar->ctrAgregarPlanes();
                ?>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
