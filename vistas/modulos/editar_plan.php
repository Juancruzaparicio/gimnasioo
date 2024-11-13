<?php

$item = "id_plan";
$valor = $_GET["id_plan"];

$plan = ControladorPlanes::ctrMostrarPlanes($item, $valor);


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
                    <label for="nombre_plan">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_plan" placeholder="nombre"
                    value="<?php echo $plan["nombre"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="codigo_plan">Codigo</label>
                    <input required type="number" class="form-control" name="codigo_plan" placeholder="codigo" 
                    value="<?php echo $plan["codigo"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="descripcion_plan">Descripcion</label>
                    <input required type="text" class="form-control" name="descripcion_plan" placeholder="Descripcion"
                    value="<?php echo $plan["descripcion"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="duracion">Duracion en semanass</label>
                    <input required type="number" class="form-control" name="duracion" placeholder="Duracion"
                    value="<?php echo $plan["duracion_semanas"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="cantidad">Cantidad sesiones X semana</label>
                    <input required type="number" class="form-control" name="cantidad" placeholder="cantidad"
                    value="<?php echo $plan["cantidadsesiones_semana"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="entrenador">Entrenador</label>
                    <input required type="number" class="form-control" name="entrenador" placeholder="entrenador" 
                    value="<?php echo $plan["id_entrenador"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">
                <?php
                $editar = new ControladorPlanes();
                $editar->ctrEditarPlanes();
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
