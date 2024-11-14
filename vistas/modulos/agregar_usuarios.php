

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuario:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="usuario">User</label>
                    <input required type="text" class="form-control" name="usuario" placeholder="user">
                  </div>
                  <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input required type="password" class="form-control" name="contrasena" placeholder="Contraseña" >
                  </div>
                  <div class="form-group">
                    <label for="nombre_usuario">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_usuario" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="apellido_usuario">Apellido</label>
                    <input required type="text" class="form-control" name="apellido_usuario" placeholder="Apellido">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <?php
                $guardar = new ControladorUsuarios();
                $guardar->ctrAgregarUsuarios();
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
