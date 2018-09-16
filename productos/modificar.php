<!-- modificar producto -->
<?php

include_once '../conexion.php';

if($_POST){
  $id=$_POST['id'];
  $urls= $_POST['urls'];
  $nombre= $_POST['nombre'];
  $precio= $_POST['precio'];
  $categoria= $_POST['categoria'];
    
  $sql_editar='UPDATE productos SET nombre=?, urls=?,precio=?, categoria=? WHERE id=?';
  $sentencia_editar = $pdo->prepare($sql_editar);
  $sentencia_editar ->execute(array($nombre,$urls,$precio,$categoria,$id));


  header('location:productos.php');
}



?>