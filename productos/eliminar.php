<!-- eliminar producto -->
<?php

include_once '../conexion.php';

$id=$_GET['id'];

$sql_eliminar='DELETE FROM productos  WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar ->execute(array($id));



header('location:productos.php');

?>