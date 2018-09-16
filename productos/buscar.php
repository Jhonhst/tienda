<!-- buscar producto -->
<?php

include_once '../conexion.php';

$nombre = $_POST['name'];

$sql_leer="SELECT productos.id as pri,urls, productos.nombre as pn, precio, productos.categoria as pc, categorias.id as ci,categorias.nombre as cn FROM productos join categorias on productos.categoria=categorias.id  WHERE productos.nombre LIKE '%".$nombre."%' OR categorias.nombre LIKE '%".$nombre."%'";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/navbar-top-fixed.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Busqueda de productos</title>
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
            <a class="nav-link" href="../usuarios/usuarios.php">administrar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productos.php">administrar productos</a>
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
      <input class="form-control mr-2" id="buscar" type="text" placeholder="Producto" aria-label="Search" name="name">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <!-- fin de buscador -->


    <!-- inicio tabla de productos --> 
    <div class="col-12">
      <h3 class="ml-3 mt-5">lista de productos encontrados</h3>
        <div>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                      <td>Id</td>
                      <td>urls imagen</td>
                      <td>Nombre</td>
                      <td>Precio</td>
                      <td>Categoría</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach($resultado as $dato): ?>
                    <tr>
                      <td><?php echo $dato['pri'] ?></td>
                      <td><img class="imagenpro" src="<?php echo $dato['urls'] ?>" alt=""></td>
                      <td><?php echo $dato['pn'] ?></td>
                      <td><?php echo $dato['precio'] ?></td>
                      <td><?php echo $dato['cn'] ?></td>
                      <td><a href="editar.php?id=<?php echo $dato['pri'] ?>" class="float-right ml-3">editar</a></td>
                      <td><a href="eliminar.php?id=<?php echo $dato['pri'] ?>" class="float-right ml-3">eliminar</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- fin de tabla productos -->

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/pedido.js"></script>
  </body>
</html>