<!-- modificar usuario -->
<?php

include_once '../conexion.php';


$id=$_POST['id'];
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$contrasenia=$_POST['contrasenia'];
$contraseniados=$_POST['contraseniados'];


$sql_editar='UPDATE usuarios SET usuario=?, correo=?, contrasenia=?, cotraseniados=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar ->execute(array($usuario,$correo,$contrasenia,$contraseniados,$id));


header('location:usuarios.php');