<?php include("../template\cabecera_bienvenida.php"); ?>
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "login_clientes.php";
    </script>
    ';
    
    session_destroy();
    die();// don die no deja ejecutar el codigo de abajo si no tiene usuario registrado
    
}

    session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sexshop</title> <!--Titulo de la pagina-->
    <link rel="stylesheet" href="../CSS/style.css"> <!--conexion con el archivo css-->
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon"> <!--Logo de la pagina de titulo-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- esta es la lista de iconos para desarrolladores de crome-->
    <link rel="preconnect" href="https://fonts.googleapis.com"><!--estas 3 lineas corresponden a google fonts, los estilos de letras-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Beau+Rivage&family=Courgette&family=Petit+Formal+Script&family=Pinyon+Script&display=swap" rel="stylesheet">
  </head>


  <body>
    
    <div>
      <h1> Cuenta</h1>
      <a href="cerrar_sesion.php">Cerrar sesion</a>
    </div>

    <div>
      <h1> Historial de pedidos</h1>
      <p>Aún no has realizado ningún pedido </p>
    </div>

    <br>
    <br>
    <br>

  
    <?php include("../template\pie_bienvenida.php"); ?>
  </body>
</html>