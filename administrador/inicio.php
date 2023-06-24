

<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css"> <!--conexion con el archivo css-->

  </head>
  <body>

  <div class="logo-titulo">
    <img src="img/logo_nuevo_final.png" class="logo" alt="logo lujuriasexshop">
    <br>
  </div>

  <br>
  <br>
  <br>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/pagina_web" ?>
    <nav class="navbar navbar-expand navbar-light bg-light" >
      <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Administrador <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php">Ingreso de productos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/visualizacion_productos.php">Visualización de productos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>">Ver sitio web</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar seción</a>
      </div>
    </nav>
  

    <div class="container">
     <br> 
      <div class="row">
        <div class="col-md-12">
              
          <div class="jumbotron">
          <h1 class="display-3">Bienvenido</h1>
          <p class="lead">En este aplicativo podemos administrar los productos de Sexshop</p>
          <hr class="my-2">
          
          
        </div>
      </div>   
      </div>
    </div>


    <?php include('template/pie.php'); ?>