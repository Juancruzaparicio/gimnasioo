<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clientes:</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Mail</th>
                    <th>Fecha de nacimiento</th>
                    <th>Direccion</th>
                    <th>Fecha de inscripcion</th>
                    <th>Plan</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $clientes = ControladorClientes::ctrMostrarClientes(null, null);
                    foreach ($clientes as $key => $cliente) {
                        ?>
                  <tr>
                  <td> <?php echo $cliente["dni"] ?></td>
                  <td> <?php echo $cliente["nombre"] ?></td>
                  <td> <?php echo $cliente["apellido"] ?></td>
                  <td> <?php echo $cliente["telefono"] ?></td>
                  <td> <?php echo $cliente["mail"] ?></td>
                  <td> <?php echo $cliente["fecha_nacimiento"] ?></td>
                  <td> <?php echo $cliente["direccion"] ?> </td>
                  <td> <?php echo $cliente["fecha_inscripcion"] ?></td>
                  <td> <?php echo $cliente["id_plan"] ?></td>
                  <td> <?php echo $cliente["estado"] ?></td>
                    <td><a class="btn btn-block bg-gradient-primary btn-sm" href="index.php?pagina=editar_cliente&id_cliente=<?php echo $cliente["id_cliente"]?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-block bg-gradient-primary btn-sm" id_cliente=<?php echo $cliente["id_cliente"]; ?>>
                          <i class="fas fa-trash"></i>
                        </a>
                  </tr>
                  <?php } ?>
                  <a class="btn btn-app" href="agregar_cliente">
                  <i class="fas fa-plus"></i> Agregar</a>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
      <!-- /.container-fluid -->
    </section>