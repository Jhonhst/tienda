<?php
include "conexion.php";

$sql_leer= 'SELECT * FROM  productos';
$gsent= $pdo->prepare($sql_leer);
$gsent->execute();
$resultado=$gsent->fetchAll();

$articulos_x_pagina=6;

//contar articulos de nuestra base de datos
$total_articulos_db = $gsent->rowCount();

$paginas=$total_articulos_db/$articulos_x_pagina;

//redindear
$paginas= ceil($paginas);

if(!$_GET){
  header('Location:index.php?pagina=1');
}
if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
  header('Location:index.php?pagina=1');
}

//debo restar uno porque en la paginación forze a que tuviera un más uno para que no empezara de cero, por tanto le resto uno para que limit empieze en cero
$iniciar=($_GET['pagina']-1)*$articulos_x_pagina;

$sql_articulos='SELECT * FROM productos LIMIT :iniciar,:narticulos';
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
    

    <title>Mi Tienda</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-top-fixed.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <!--inicio Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">Mi Tienda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
          <!-- no registrado -->
          <?php if(!isset($_COOKIE['mail'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="ingresar.php">ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro.php">registrarse</a>
          </li>
          <?php endif ?>
         
          <!-- fin de no registrado -->
          <!-- inicio de registrado -->
          <?php if(isset($_COOKIE['mail'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="#">hola <?php echo $_COOKIE['mail'];?></a>
          </li>
          <li class="nav-item">
            <form action="cookies.php" method="POST">
            <input type="hidden" name="borrar" value="borrar">
            <input type="submit" class="btn btn-primary mr-2" value="Cerrar Seción">
            </form>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">¿Eres Administrador?</a>
          </li>
          <!-- fin del registrado -->

        </ul>
    <!-- inicio buscador -->
        <form class="form-inline mt-5 mt-md-0 ml-3" action="buscar.php" method="POST" onsubmit="return validar()">
          <input class="form-control mr-2" id="buscar" type="text" placeholder="Producto" aria-label="Search" name="name">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    <!-- fin de buscador -->
      </div>
    </nav>
    <!-- fin navbar -->

    <!-- inicio de compra -->
    <div class="container <?php if(!isset($_COOKIE['mail'])) echo 'd-none' ?> ">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-6 col-xl-6">
          <form class="form-inline mt-2 mt-md-0" action="pedidos/insertar.php" method="POST" onsubmit="return validar()">
            <input type="hidden" name="usuario" value="<?php echo $_COOKIE['mail'];?>">
            <textarea name="pedido" id="pedido" cols="60" rows="2" class="form-control" readonly></textarea>
            <button class="btn btn-outline-info my-2 my-sm-0 mr-5" onclick="alerta()" type="submit">Finalizar Compra</button>
          </form>
        </div>
      </div>
    </div>
    <!-- fin de la compra -->

    <!-- inicio tabla de productos -->
    <h1 class="text-center p-3">Has tu compra y te lo llevamos hasta tu casa gratis :)</h1>
    <div class="container">
      <div class="row"> 
        <?php 
        foreach($resultado_articulos as $dato): ?>
        <div class="col-4 col-sm-3 col-md-2 mb-5 ">
          <img src="<?php echo $dato['urls'] ?>" class="img-fluid bordes" alt="">
          <p class="nombre"><?php echo $dato['nombre'] ?> </p>
          <p class="precio"><?php echo $dato['precio'] ?> $</p>
          <input type="hidden" value="<?php echo $dato['id'] ?>">
          <button class="btn btn-outline-success boton" onclick="mandar_datos('<?php echo $dato['nombre'] ?>', <?php echo $dato['precio'] ?>)" type="button">Comprar</button>
        </div>  
        <?php endforeach ?>  
      </div>
    </div>
    <!-- fin de tabla de productos -->

    <!-- inicio de paginacion -->
    <nav aria-label="page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled': '' ?> "><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
            
            <?php  for($i=0;$i<$paginas;$i++): ?>
            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="index.php?pagina=<?php echo $i+1;  ?>"><?php echo $i+1;  ?></a></li>
            <?php endfor ?>
     
            <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?> "><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
        </ul>
    </nav>
    <!-- fin de paginacion -->


    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js//popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/pedido.js"></script>
  </body>
</html>
