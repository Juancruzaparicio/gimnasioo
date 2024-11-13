<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pagos:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cliente</th>
                    <th>Monto</th>
                    <th>Metodo</th>
                    <th>Plan</th>
                    <th>Estado</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $pagos = ControladorPagos::ctrMostrarPagos(null, null);
                    foreach ($pagos as $key => $pago) {
                        ?>
                  <tr>
                  <td> <?php echo $pago["id_cliente"] ?></td>
                  <td> <?php echo $pago["monto_pagado"] ?></td>
                  <td> <?php echo $pago["metodo_pago"] ?></td>
                  <td> <?php echo $pago["id_plan"] ?></td>
                  <td> <?php echo $pago["estado_pago"] ?></td>
                  <td> <?php echo $pago["fecha_pago"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_pago&id_pago=<?php echo $pago["id_pago"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm btnEliminarPago" id_pago=<?php echo $pago["id_pago"]; ?>>
                          <i class="fas fa-trash"></i>
                        </a>
                  </tr>
                  <?php } ?>
                  <a class="btn btn-app" href="agregar_pago">
                  <i class="fas fa-plus"></i> Agregar</a>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
      <!-- /.container-fluid -->
    </section>
    <?php

$eliminar = new ControladorPagos();
$eliminar->ctrEliminarPagos();

?>