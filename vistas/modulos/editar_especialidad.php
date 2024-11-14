<?php

$item = "id_especialidad";
$valor = $_GET["id_especialidad"];

$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);


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
                    <label for="nombre_especialidad">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_especialidad" placeholder="nombre"
                    value="<?php echo $especialidad["nombre"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">
                <?php
                $editar = new ControladorEspecialidades();
                $editar->ctrEditarEspecialidades();
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
