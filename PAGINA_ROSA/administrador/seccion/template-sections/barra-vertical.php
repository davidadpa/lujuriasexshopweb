<?php include("../../administrador\seccion/template-sections\cabecera.php"); ?>
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../..\administrador\css\barra-style.css"> <!--conexion con el archivo css-->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     
    <?php $url="http://".$_SERVER['HTTP_HOST']."/pagina_web" ?>

    <div class="sidebar">
     <div class="logo">
      <a href="<?php echo $url;?>/administrador/inicio.php"><img src="../../img\logo\logo oficial.png"></a> 
      <h1>Lujuria Sexshop</h1>
    </div>
    <ul class="menu-barra">
      <li><a href="../../administrador\seccion\agregar_producto.php">Agregar un Producto</a></li>
      <li><a href="../../administrador\seccion\lista_productos.php">Lista de Productos</a></li>
      <li><a href="../../administrador\seccion\lista-administradores.php">Lista de administradores</a></li>
      <li><a href="../../administrador\seccion\lista-usarios.php">Lista de clientes</a></li>
      <li><a href="../../administrador\seccion\Lista_tipo-producto.php">Lista de tipos de Productos</a></li>
      <li><a href="../../administrador\seccion\Configuraciones.php">Configuración</a></li>
    </ul>
  </div>
</body>
  
