<?php

$planes = ControladorPlanes::ctrMostrarPlanes(null, null);
$clientes = ControladorClientes::ctrMostrarClientes(null, null);

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
                <h3 class="card-title">Pago:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" >
                    <label for="id_cliente_pago" class="form-label">clientes</label>
                    <select class="form-select" name="id_cliente_pago" id="id_plan" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($clientes as $key => $cliente) { ?>

                            <option value="<?php echo $cliente["id_cliente"]; ?>"><?php echo $cliente["nombre"]; ?> <?php echo $cliente["apellido"]; ?></option>

                        <?php } ?>

                    </select>
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
                    <label for="id_plan_pago" class="form-label">Planes</label>
                    <select class="form-select" name="id_plan_pago" id="id_plan" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($planes as $key => $plan) { ?>

                            <option value="<?php echo $plan["id_plan"]; ?>"><?php echo $plan["nombre"]; ?></option>

                        <?php } ?>

                    </select>
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
