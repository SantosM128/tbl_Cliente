<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD tbl_Clientes FORM -->
      <div class="card card-body">
        <form action="savetbl_Clientes.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input name="Apellidos" rows="2" class="form-control" placeholder="Apellidos"></input>
          </div>
          <div class="form-group">
            <input type="number" name="Telefono" class="form-control" placeholder="Telefono"></input>
          </div>
          <div class="form-group">
            <input type="email" name="Correo" class="form-control" placeholder="Correo"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Direccion" class="form-control" placeholder="Direccion"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Ciudad" class="form-control" placeholder="Ciudad"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Estado" class="form-control" placeholder="Estado"></input>
          </div>
          <input type="submit" name="savetbl_Clientes" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre (s)</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_Clientes";
          $result_tbl_Clientes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tbl_Clientes)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellidos']; ?></td>
            <td><?php echo $row['Telefono']; ?></td>
            <td><?php echo $row['Correo']; ?></td>
            <td><?php echo $row['Direccion']; ?></td>
            <td><?php echo $row['Ciudad']; ?></td>
            <td><?php echo $row['Estado']; ?></td>
            <td>
              <a href="edit.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deletetbl_Clientes.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>