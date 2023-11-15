<?php

include('db.php');

if (isset($_POST['savetbl_Clientes'])) {
  $Nombre = $_POST['Nombre'];
  $Apellidos = $_POST['Apellidos'];
  $Telefono = $_POST['Telefono'];
  $Correo = $_POST['Correo'];
  $Direccion = $_POST['Direccion'];
  $Ciudad = $_POST['Ciudad'];
  $Estado = $_POST['Estado'];
  $query = "INSERT INTO tbl_Clientes(Nombre, Apellidos, Telefono, Correo, Direccion, Ciudad, Estado) VALUES ('$Nombre', '$Apellidos', '$Telefono', '$Correo', '$Direccion', '$Ciudad', '$Estado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>