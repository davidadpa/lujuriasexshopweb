

<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../administrador\css\nav-style.css"> <!--conexion con el archivo css-->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    
  
    <?php $url="http://".$_SERVER['HTTP_HOST']."/pagina_web" ?>
  <nav class="caja">


    <div class="navegador"> <!-- se crea el menu principal sin especificar ruta-->
        <div class="menu navbar-expand" >
          <div class="nav navbar-nav">
          <a class="nav-item nav-link" href="../administrador\seccion\inventario.php">Ver inventario</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Ver sitio web</a>
            <a class="nav-item nav-link" href="../administrador\seccion\visualizacion_productos.php">Ver catalogo</a>
          </div>

        </div>
        
    </div>

<div class="cerrar-session">
          <a class="cerrar nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php"><img src="../img\Iconos\usuario.png"> Cerrar seción</a>
          </div>
  
</nav>