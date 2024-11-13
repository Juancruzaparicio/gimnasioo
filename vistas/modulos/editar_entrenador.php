<?php

$item = "id_entrenador";
$valor = $_GET["id_entrenador"];

$entrenador = ControladorEntrenadores::ctrMostrarEntrenador($item, $valor);


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
                <h3 class="card-title">Clientes:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="dni_entrenador">DNI</label>
                    <input required type="number" class="form-control" name="dni_entrenador" placeholder="DNI"
                    value="<?php echo $entrenador["dni"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre_entrenador">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_entrenador" placeholder="Nombre" 
                    value="<?php echo $entrenador["nombre"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido_entrenador">Apellido</label>
                    <input required type="text" class="form-control" name="apellido_entrenador" placeholder="Apellido"
                    value="<?php echo $entrenador["apellido"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="telefono_entrenador">Telefono</label>
                    <input required type="number" class="form-control" name="telefono_entrenador" placeholder="Telefono"
                    value="<?php echo $entrenador["telefono"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="mail_entrenador">Mail</label>
                    <input required type="text" class="form-control" name="mail_entrenador" placeholder="Mail"
                    value="<?php echo $entrenador["mail"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="id_especialidad">Especialidad</label>
                    <input required type="text" class="form-control" name="id_especialidad" placeholder="especialidad" 
                    value="<?php echo $entrenador["especialidad"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="fecha_contratacion_entrenador">Fecha de contratacion</label>
                    <input type="text" class="form-control" name="fecha_contratacion_entrenador" placeholder="Fecha de contratacion" 
                    value="<?php echo $entrenador["fecha_contratacion"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="estado_entrenador">Estado</label>
                    <input required type="text" class="form-control" name="estado_entrenador" placeholder="Estado"
                    value="<?php echo $entrenador["estado"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">
                <?php
                $editar = new ControladorEntrenadores();
                $editar->ctrEditarEntrenadores();
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
