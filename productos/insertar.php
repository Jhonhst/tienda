<!-- insertar producto -->
<?php

include_once '../conexion.php';

if($_POST){
    $urls= $_POST['urls'];
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
    $categoria= $_POST['categoria'];

    $sql_agregar='INSERT INTO productos (urls,nombre,precio,categoria) VALUES (?,?,?,?)';
    $sentencia_agregar =$pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($urls,$nombre,$precio,$categoria));

    header('location:productos.php');
}
?>