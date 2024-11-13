

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pago:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="id_cliente_pago">Cliente</label>
                    <input required type="number" class="form-control" name="id_cliente_pago" placeholder="cliente">
                  </div>
                  <div class="form-group">
                    <label for="monto">Monto</label>
                    <input required type="number" class="form-control" name="monto" placeholder="Monto" >
                  </div>
                  <div class="form-group">
                    <label for="metodo">Metodo de pago</label>
                    <input required type="text" class="form-control" name="metodo" placeholder="metodo de pago">
                  </div>
                  <div class="form-group">
                    <label for="id_plan_pago">Plan</label>
                    <input required type="number" class="form-control" name="id_plan_pago" placeholder="plan">
                  </div>
                  <div class="form-group">
                    <label for="estado_pago">Estado</label>
                    <select name="estado_pago" id="" class="form-select" required>
                        <option value="">Elegi una opción</option>
                        <option value="Pagado">Pagado</option>
                        <option value="A pagar">A pagar</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fecha"></label>
                    <input required type="text" class="form-control" name="fecha" placeholder="YYYY-MM-DD">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <?php
                $guardar = new ControladorPagos();
                $guardar->ctrAgregarPagos();
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
