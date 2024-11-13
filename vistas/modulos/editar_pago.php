<?php

$item = "id_pago";
$valor = $_GET["id_pago"];

$pago = ControladorPagos::ctrMostrarPagos($item, $valor);


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
                    <label for="cliente">Cliente</label>
                    <input required type="number" class="form-control" name="cliente" placeholder="cliente"
                    value="<?php echo $pago["id_cliente"]; ?>">
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
                    <label for="plan">Plan</label>
                    <input required type="number" class="form-control" name="plan" placeholder="plan"
                    value="<?php echo $pago["id_plan"]; ?>">
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
