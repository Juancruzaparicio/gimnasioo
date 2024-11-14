<?php

$item = "id_usuario";
$valor = $_GET["id_usuario"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);


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
                <h3 class="card-title">usuario:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input required type="text" class="form-control" name="usuario" placeholder="username"
                    value="<?php echo $usuario["username"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="contra_usuario">Nueva Contraseña</label>
                    <input required type="password" class="form-control" name="contra_usuario" placeholder="******">
                  </div>
                  <div class="form-group">
                    <label for="nombre_usuario">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_usuario" placeholder="Nombre"
                    value="<?php echo $usuario["nombre"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido_usuario">Apellido</label>
                    <input required type="text" class="form-control" name="apellido_usuario" placeholder="Apellido"
                    value="<?php echo $usuario["apellido"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_usuario" value="<?php echo $usuario["id_usuario"]; ?>">
                <?php
                $editar = new ControladorUsuarios();
                $editar->ctrEditarUsuarios();
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
