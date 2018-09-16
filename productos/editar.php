<!-- editar peoducto -->
<?php

include_once '../conexion.php';


if($_GET){
  $id=$_GET['id'];
  $sql_unico= 'SELECT * FROM  productos WHERE id=?';
  $gsent_unico= $pdo->prepare($sql_unico);
  $gsent_unico->execute(array($id));
  $resultado_unico=$gsent_unico->fetch();

}
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
    <title>Modificar productos</title>
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
    <form class="form-inline mt-5 mt-md-0 ml-3" action="buscar.php" method="POST">
      <input class="form-control mr-2" id="buscar" type="text" placeholder="Producto" aria-label="Search" name="name">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <!-- fin de buscador -->

    <!-- inicio tabla de productos a editar --> 
    <div class="col-12">
      <h2>editar producto</h2>
         <form method="POST" action="modificar.php" onsubmit="return validar()">
            Agregar Nuevo Nombre:
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $resultado_unico['nombre']; ?>">
            
            Agregar Nueva url de la imagen:
            <input type="text" class="form-control" id="urls" name="urls" value="<?php echo $resultado_unico['urls']; ?>">
            
            Agregar Nuevo precio:
            <input type="text" class="form-control mt-3" id="precio" name="precio" value="<?php echo $resultado_unico['precio']; ?>">
           
            Agregar Nueva categoria: <!-- debo mejorar el select para que salga la categoria que este tiene -->
            <select name="categoria" id="categoria" class="form-control mr-2">
                <option disabled selected>Categoría</option>
                <option value="1">Verduras</option>
                <option value="2">Carnes</option>
                <option value="3">Viveres</option>
            </select>

            <input type="hidden" name="id" value="<?php echo $resultado_unico['id']; ?>">
            
            <input type="submit" class="btn btn-primary mt-3" value="editar">
         </form>
         
         </div>
    <!-- fin de tabla productos a editar -->

  

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/pedido.js"></script>
  </body>
</html>