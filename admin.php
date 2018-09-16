<!-- ingresar administrador -->
<?php
include "conexion.php";


if($_POST){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql_leer= 'SELECT * FROM  administrador';
    $gsent= $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado=$gsent->fetchAll();
    foreach($resultado as $dato){
        if($dato['administrador'] == $usuario && $dato['clave'] == $clave){
          header('location:usuarios/usuarios.php');
          
        }else{
            echo '<script>alert("Datos incorrectos");</script>';
            header('location:admin.php');
        }
    };
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ingresar administrador</title>
     <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="admin.php" method="POST" class="form-signin" onsubmit="return validar()">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Ingresar Administrador</h1>

      <label for="" class="sr-only">Usuario</label>
      <input name="usuario" type="text" id="usuario" class="form-control" placeholder="Email" >
      <label for="" class="sr-only">Contraseña</label>
      <input name="clave" type="text" id="contrasenia" class="form-control" placeholder="Password" >

      
      <a href="index.php">Pagina Principal</a>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/pedido.js"></script>
  </body>
</html>