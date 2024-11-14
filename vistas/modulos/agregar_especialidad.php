

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Especialidad:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="nombre_especialidad">Nombre</label>
                    <input required type="text" class="form-control" name="nombre_especialidad" placeholder="Nombre">
                  </div>
                </div>
                <!-- /.card-body -->
                <?php
                $guardar = new ControladorEspecialidades();
                $guardar->ctrAgregarEspecialidades();
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
