<?php

$item = "id_cliente";
$valor = $_GET["id_cliente"];

$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);
$planes = ControladorPlanes::ctrMostrarPlanes(null, null);


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
                    <label for="dni_cliente">DNI</label>
                    <input required type="number" class="form-control" name="dni_cliente" placeholder="DNI"
                    value="<?php echo $cliente["dni"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre_cliente">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_cliente" placeholder="Nombre" 
                    value="<?php echo $cliente["nombre"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido_cliente">Apellido</label>
                    <input required type="text" class="form-control" name="apellido_cliente" placeholder="Apellido"
                    value="<?php echo $cliente["apellido"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="telefono_cliente">Telefono</label>
                    <input required type="number" class="form-control" name="telefono_cliente" placeholder="Telefono"
                    value="<?php echo $cliente["telefono"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="mail_cliente">Mail</label>
                    <input required type="text" class="form-control" name="mail_cliente" placeholder="Mail"
                    value="<?php echo $cliente["mail"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="fecha_nacimiento_cliente">Fecha de Nacimiento</label>
                    <input type="text" class="form-control" name="fecha_nacimiento_cliente" placeholder="yyyy-mm-dd"
                    value="<?php echo $cliente["fecha_nacimiento"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="direccion_cliente">Direccion</label>
                    <input required type="text" class="form-control" name="direccion_cliente" placeholder="Direccion" 
                    value="<?php echo $cliente["direccion"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="fecha_inscripcion_cliente">Fecha de inscripcion</label>
                    <input type="text" class="form-control" name="fecha_inscripcion_cliente" placeholder="Fecha de inscripcion" 
                    value="<?php echo $cliente["fecha_inscripcion"]; ?>">
                  </div>
                  <div class="form-group">
                  <label for="id_plan_cliente" class="form-label">Planes</label>
                    <select  name="id_plan_cliente" id="id_plan" class="form-select" required>

                        <option value="<?php echo $cliente["id_plan"]; ?>">Selecciona una opción</option>

                        <?php foreach ($planes as $key => $plan) { ?>

                            <option value="<?php echo $plan["id_plan"]; ?>"><?php echo $plan["nombre"]; ?></option>

                        <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="estado_cliente">Estado</label>
                    <input required type="text" class="form-control" name="estado_cliente" placeholder="Estado"
                    value="<?php echo $cliente["estado"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]; ?>">
                <?php
                $editar = new ControladorClientes();
                $editar->ctrEditarClientes();
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
