<!-- registro de usuario -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de usuario</title>
     <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="usuarios/registrousuario.php" method="POST" class="form-signin" onsubmit="return validar()">
      <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
      
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre"  >
      
      <label for="inputEmail" class="sr-only">Correo</label>
      <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo" >
      
      <label for="inputPassword" class="sr-only">contaseña</label>
      <input type="text" name="contrasenia" id="contrasenia" class="form-control" placeholder="Cotraseña" >
      
      <label for="inputPassword" class="sr-only">Repita Contraseña</label>
      <input type="text" name="contraseniados" id="contraseniados" class="form-control" placeholder="Repita la contraseña">
      
      <a href="index.php">Pagina Principal</a>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/pedido.js"></script>
  </body>
</html>
