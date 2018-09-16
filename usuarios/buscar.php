<!-- buscar usuarios -->
<?php

include_once '../conexion.php';

$usuario = $_POST['name'];

$sql_leer= "SELECT * FROM usuarios WHERE usuario LIKE '%".$usuario."%' OR correo LIKE '%".$usuario."%'";
$gsent= $pdo->prepare($sql_leer);
$gsent->execute();
$resultado=$gsent->fetchAll();


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icono">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/navbar-top-fixed.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Busqueda de usuarios</title>

  </head>

  <body>

    <!--inicio Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../index.php">Mi Tienda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">administrar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../productos/productos.php">administrar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pedidos/pedidos.php">administrar pedidos</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- fin navbar -->
    <!-- inicio buscador -->
    <form class="form-inline mt-5 mt-md-0 ml-3" action="buscar.php" method="POST" onsubmit="return validar()">
      <input class="form-control mr-2" id="buscar" type="text" placeholder="Usuario o correo" aria-label="Search" name="name">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <!-- fin de buscador -->

    <!-- inicio tabla de usuario encontrado --> 
    <div class="col-12">
        <div>
            <table class="table table-bordered table-sm">
                <h3>Usuarios encontrados</h3>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Usuario</td>
                        <td>Correo</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach($resultado as $dato): ?>
                    <tr>
                        <td><?php echo $dato['id'] ?></td>
                        <td><?php echo $dato['usuario'] ?></td>
                        <td><?php echo $dato['correo'] ?></td>
                        <td><a href="editarusuario.php?id=<?php echo $dato['id'] ?>" class="float-right ml-3">editar</a></td>
                        <td><a href="eliminarusuario.php?id=<?php echo $dato['id'] ?>" class="float-right ml-3">eliminar</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- fin de tabla usuario encontrado -->


    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/pedido.js"></script>
  </body>
</html>