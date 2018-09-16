<!-- lista de productos -->
<?php

include_once '../conexion.php';

$sql_leer= 'SELECT * FROM  productos';
$gsent= $pdo->prepare($sql_leer);
$gsent->execute();
$resultado=$gsent->fetchAll();

$articulos_x_pagina=8;

//contar articulos de nuestra base de datos
$total_articulos_db = $gsent->rowCount();

$paginas=$total_articulos_db/$articulos_x_pagina;

//redindear
$paginas= ceil($paginas);

if(!$_GET){
  header('Location:productos.php?pagina=1');
}
if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
  header('Location:productos.php?pagina=1');
}

//debo restar uno porque en la paginación forze a que tuviera un más uno para que no empezara de cero, por tanto le resto uno para que limit empieze en cero
$iniciar=($_GET['pagina']-1)*$articulos_x_pagina;

$sql_articulos='SELECT productos.id as pri, urls ,productos.nombre as pn, precio, productos.categoria as pc, categorias.id as ci,categorias.nombre as cn FROM productos join categorias on productos.categoria=categorias.id LIMIT :iniciar,:narticulos';
$sentencia_articulos =$pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);//es para convertir la variable string para el LIMIT lo acepte
$sentencia_articulos->bindParam(':narticulos',$articulos_x_pagina,PDO::PARAM_INT);
$sentencia_articulos->execute();
$resultado_articulos = $sentencia_articulos->fetchAll();


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
    <title>administrador de productos</title>
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
            <a class="nav-link" href="#">administrar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pedidos/pedidos.php">administrar pedidos</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- fin navbar -->

    <!-- inicio buscador -->
    <form class="form-inline mt-5 mt-md-0 ml-3" action="buscar.php" method="POST" onsubmit="return validar_dos()">
      <input class="form-control mr-2" id="buscarr" type="text" placeholder="Producto" aria-label="Search" name="name">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <!-- fin de buscador -->

    <!-- inicio  de insertar --> 
    <div class="col-12 mt-4">
      <h3 class="ml-3">Nuevo producto</h3>
      <form class="form-inline mt-5 mt-md-0 ml-3" action="insertar.php" method="POST" onsubmit="return validar()">
        <input class="form-control mr-2" id="nombre" name="nombre" type="text" placeholder="Nombre">
        <input class="form-control mr-2" id="urls" name="urls" type="text" placeholder="url">
        <input class="form-control mr-2" id="precio" name="precio" type="text" placeholder="precio">
        <select name="categoria" id="categoria" class="form-control mr-2">
          <option disabled selected>Categoría</option>
          <option value="1">Verduras</option>
          <option value="2">Carnes</option>
          <option value="3">Viveres</option>
        </select>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">guardar</button>
      </form>
    </div>
    <!-- fin de  insertar -->

    <!-- inicio tabla de productos --> 
    <div class="col-12">
      <h3 class="ml-3 mt-5">lista de productos</h3>
        <div>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                      <td>Id</td>
                      <td>Nombre</td>
                      <td>urls imagen</td>
                      <td>Precio</td>
                      <td>Categoría</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach($resultado_articulos as $dato): ?>
                    <tr>
                      <td><?php echo $dato['pri'] ?></td>
                      <td><?php echo $dato['pn'] ?></td>
                      <td><img class="imagenpro" src="<?php echo $dato['urls'] ?>" alt=""></td>
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

  
    <!-- inicio de paginacion -->
    <nav aria-label="page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled': '' ?> "><a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
            
            <?php  for($i=0;$i<$paginas;$i++): ?>
            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="productos.php?pagina=<?php echo $i+1;  ?>"><?php echo $i+1;  ?></a></li>
            <?php endfor ?>
     
            <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?> "><a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
        </ul>
    </nav>
    <!-- fin de paginacion -->

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/pedido.js"></script>
  </body>
</html>