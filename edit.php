<?php
include("db.php");
$Nombre = '';
$Apellidos= '';
$Telefono= '';
$Correo= '';
$Direccion= '';
$Ciudad= '';
$Estado= '';

if  (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "SELECT * FROM tbl_Clientes WHERE id_cliente=$id_cliente";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Apellidos = $row['Apellidos'];
    $Telefono = $row['Telefono'];
    $Correo = $row['Correo'];
    $Direccion = $row['Direccion'];
    $Ciudad = $row['Ciudad'];
    $Estado = $row['Estado'];
  }
}

if (isset($_POST['update'])) {
  $id_cliente = $_GET['id_cliente'];
  $Nombre= $_POST['Nombre'];
  $Apellidos = $_POST['Apellidos'];
  $Telefono = $_POST['Telefono'];
  $Correo = $_POST['Correo'];
  $Direccion = $_POST['Direccion'];
  $Ciudad = $_POST['Ciudad'];
  $Estado = $_POST['Estado'];

  $query = "UPDATE tbl_Clientes set Nombre = '$Nombre', Apellidos = '$Telefono', Telefono = '$Apellidos', Correo = '$Correo', Direccion = '$Direccion', Ciudad = '$Ciudad', Estado = '$Estado' WHERE id_cliente=$id_cliente";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id_cliente=<?php echo $_GET['id_cliente']; ?>" method="POST">
      <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
        <input name="Apellidos"  type="text" class="form-control" value="<?php echo $Apellidos;?> " placeholder="Apellidos">
        </div>
        <div class="form-group">
        <input name="Telefono"  type="text" class="form-control" value="<?php echo $Telefono;?>" placeholder=" Telefono">
        </div>
        <div class="form-group">
        <input name="Correo"  type="email" class="form-control" value="<?php echo $Correo;?>" placeholder="Correo">
        </div>
        <div class="form-group">
        <input name="Direccion"  type="text" class="form-control" value="<?php echo $Direccion;?>" placeholder="Direccion">
        </div>
        <div class="form-group">
          <input name="Ciudad" type="text" class="form-control" value="<?php echo $Ciudad; ?>" placeholder="Ciudad">
        </div>
        <div class="form-group">
          <input name="Estado" type="text" class="form-control" value="<?php echo $Estado; ?>" placeholder="Estado">
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>