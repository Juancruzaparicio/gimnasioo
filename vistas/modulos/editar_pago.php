<?php

$item = "id_pago";
$valor = $_GET["id_pago"];

$pago = ControladorPagos::ctrMostrarPagos($item, $valor);
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
                <h3 class="card-title">Pagos:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="cliente" class="form-label">clientes</label>
                    <select class="form-select" name="cliente" id="id_plan" required>

                        <option value="<?php echo $pago["id_cliente"]; ?>">Selecciona una opción</option>

                        <?php foreach ($clientes as $key => $cliente) { ?>

                            <option value="<?php echo $cliente["id_cliente"]; ?>"><?php echo $cliente["nombre"]; ?> <?php echo $cliente["apellido"]; ?></option>

                        <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="monto">Monto</label>
                    <input required type="number" class="form-control" name="monto" placeholder="monto" 
                    value="<?php echo $pago["monto_pagado"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="metodo">Metodo</label>
                    <input required type="text" class="form-control" name="metodo" placeholder="metodo"
                    value="<?php echo $pago["metodo_pago"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="plan" class="form-label">Planes</label>
                    <select class="form-select" name="plan" id="id_plan" required>

                        <option value="<?php echo $pago["id_plan"]; ?>">Selecciona una opción</option>

                        <?php foreach ($planes as $key => $plan) { ?>

                            <option value="<?php echo $plan["id_plan"]; ?>"><?php echo $plan["nombre"]; ?></option>

                        <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="estado">Estado</label>
                    <input required type="text" class="form-control" name="estado" placeholder="estado"
                    value="<?php echo $pago["estado_pago"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="fecha">Fecha de pago</label>
                    <input required type="text" class="form-control" name="fecha" placeholder="YYYY-MM-DD" 
                    value="<?php echo $pago["fecha_pago"]; ?>">
                  </div>
                </div>
                <input type="hidden" name="id_pago" value="<?php echo $pago["id_pago"]; ?>">
                <?php
                $editar = new ControladorPagos();
                $editar->ctrEditarPagos();
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
