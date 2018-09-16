<!-- ingresar usuario -->
<?php
include "conexion.php";

if($_POST){
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql_leer= 'SELECT * FROM  usuarios';
    $gsent= $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado=$gsent->fetchAll();
    foreach($resultado as $dato){
      if($dato['correo'] == $correo && $dato['contrasenia'] == $clave){
        setcookie("mail",$dato['usuario'],time()+(60*60*24*365),"/");
        header('location:index.php');
      }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ingresar usuario</title>
     <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="ingresar.php" method="POST" class="form-signin" onsubmit="return validar()">
      <h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>

      <label for="inputEmail" class="sr-only">Correo</label>
      <input name="correo" type="email" id="correo" class="form-control" placeholder="Email" >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input name="clave" type="password" id="contrasenia" class="form-control" placeholder="Password" >

      <a href="index.php">Pagina Principal</a>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/pedido.js"></script>
  </body>
</html>