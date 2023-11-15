<?php

include("db.php");

if(isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "DELETE FROM tbl_Clientes WHERE id_cliente = $id_cliente";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Borrado con Exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>