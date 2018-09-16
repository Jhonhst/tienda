<!-- insertar pedidos -->
<?php
include "../conexion.php";

if($_POST){
    $usuario = $_POST['usuario'];
    $pedido = $_POST['pedido'];

    $sql_agregar='INSERT INTO pedidos (usuario, pedido) VALUES (?,?)';
    $sentencia_agregar =$pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($usuario,$pedido));

    echo '<script>alert("Su compra se a realizado con exito");</script>';

    header('location:../index.php');
}


?>