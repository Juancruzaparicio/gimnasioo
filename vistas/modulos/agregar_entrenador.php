<?php

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

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
                <h3 class="card-title">Entrenador:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="dni_entrenador">DNI</label>
                    <input required type="number" class="form-control" name="dni_entrenador" placeholder="DNI">
                  </div>
                  <div class="form-group">
                    <label for="nombre_entrenador">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_entrenador" placeholder="Nombre" >
                  </div>
                  <div class="form-group">
                    <label for="apellido_entrenador">Apellido</label>
                    <input required type="text" class="form-control" name="apellido_entrenador" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <label for="telefono_entrenador">Telefono</label>
                    <input required type="number" class="form-control" name="telefono_entrenador" placeholder="Telefono">
                  </div>
                  <div class="form-group">
                    <label for="mail_entrenador">Mail</label>
                    <input required type="text" class="form-control" name="mail_entrenador" placeholder="Mail">
                  </div>
                  <div class="form-group">
                  <label for="id_especialidad" class="form-label">Especialidades</label>
                    <select class="form-select" name="id_especialidad" id="id_especialidad" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($especialidades as $key => $especialidad) { ?>

                            <option value="<?php echo $especialidad["id_especialidad"]; ?>"><?php echo $especialidad["nombre"]; ?></option>

                        <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fecha_contratacion_entrenador">Fecha de contratacion</label>
                    <input required type="text" class="form-control" name="fecha_contratacion_entrenador" placeholder="YYYY-MM-DD" >
                  </div>
                  <div class="form-group">
                    <label for="estado_entrenador">Estado</label>
                    <select name="estado_entrenador" id="" class="form-select" required>
                        <option value="">Elegi una opción</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>

                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <?php
                $guardar = new ControladorEntrenadores();
                $guardar->ctrAgregarEntrenadores();
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
