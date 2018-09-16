<!-- modificar pedidos -->
<?php

include_once '../conexion.php';


$id=$_POST['id'];
$usuario=$_POST['usuario'];
$pedido=$_POST['pedido'];

$sql_editar='UPDATE pedidos SET usuario=?, pedido=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar ->execute(array($usuario,$pedido,$id));


header('location:pedidos.php');