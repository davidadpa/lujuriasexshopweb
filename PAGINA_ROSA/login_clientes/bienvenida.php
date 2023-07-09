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
    <div class="barra-titulo">
      <div class="whatsapp">
        <img src="../img/whatsapp.png" alt="icono whatsapp" class="whatsapp-img">
        <p>3168245409</p><p>contacto@lujuriasexshop.com.co</p>
        <div class="redes-sociales">
          <img src="../img/icon_facebook.png" alt="facebook" class="redes-sociales-img"  >
          <img src="../img/twiter.png" alt="twiter" class="redes-sociales-img" >
          <img src="../img/logo-instagram-rosa.jpg" alt="instagram" class="redes-sociales-img" >
          <img src="../img/youtube.png" alt="youtube" class="redes-sociales-img" >
        </div> 
      </div>  
      
      <div class="logo-titulo">
        <a href="../index.php">
        <img src="../img/LOGO.png" alt="logo lujuriasexshop">
        </a>
        <h1>Lujuria sexshop</h1>
        <br>
        <div class="usuario">
          <br>
          <a href="login_clientes.php">
          <img src="../img/usuario.png" alt="usuario" class="img-usuario">
          </a>
        </div>
      </div>
    </div>

    <div class="buscador">
      <input type="text" placeholder="Busqueda">
      <div class="acciones">
        <button><span class="material-icons">search</span></button> <!-- esta es la estructura qye se utiliza para utilizar los iconos-->
        <a href="8-Carrito de compras.html" class="espacio1"><button><span class="material-icons">shopping_cart</span></button></a>
      </div>
    </div>

    <br>
    <ul class="menu"> <!-- se crea el menu principal sin especificar ruta-->
      <li><a href="../tipos_productos/vibradores.php">Vibradores</a></li>
      <li><a href="../tipos_productos/consoladores.php">Consoladores</a></li>
      <li><a href="../tipos_productos/jugetes_anales.php">Jugetes anales</a></li>
      <li><a href="../tipos_productos/hombres.php">Hombres</a></li>
      <li><a href="../tipos_productos/lubricantes.php">Aceites y lubricantes</a></li>
      <li><a href="../tipos_productos/lenceria.php">Lenceria</a></li>
      <li><a href="../tipos_productos/sado.php">Sado y Fetiche</a></li>
      <li><a href="../tipos_productos/extras.php">Extras</a></li>
      <li><a href="../tipos_productos/contacto.php">Contacto</a></li>
    </ul>
    <br>

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

  
    <br>
    <footer>
      <div class="pie-de-pagina"><!--corresponde al pie de pagina, se muestra en 3 columnas-->
        <div class="caja">
          <h4>SOBRE NOSOTROS</h4>
          <p> Somos un grupo de colombianos que comprendemos la importancia de vivir una vida sexual activa y conforme a nuestros gustos y necesidades personales.</p>
          <img src="../img/facebook-pie de pagina.png" alt="redes" class="iconos-pie-de-pagina">
          <img src="../img/instagra-pie de pagina.png" alt="redes" class="iconos-pie-de-pagina">
        </div>

        <div class="caja">
          <h4>BOLETIN DE NOVEDADES</h4>
          <p>Regístrate en nuestro boletín de novedades y ofertas de nuestros productos.</p>
          <FORM action="sin especificar">
          <input type="text" placeholder="Correo">    
          <button type="submit" >Suscribir</button>
        </div>

        <div class="caja">
          <h4>PAGA SEGURO</h4>
          <img src="../img/Bancolombia_S.A._logo.svg.png" alt="medios de pago" class="imagenes-medios-de-pago" > 
          <img src="../img/efecty-logo-61614EE55D-seeklogo.com.png" alt="medios de pago" class="imagenes-medios-de-pago">
          <br>
          <img src="../img/daviplata.png" alt="medios de pago" class="imagenes-medios-de-pago" >
          <img src="../img/mastercard.png" alt="medios de pago" class="imagenes-medios-de-pago" >
          <img src="../img/PSE.png" alt="medios de pago" class="imagenes-medios-de-pago">
          <img src="../img/VISA.png" alt="medios de pago" class="imagenes-medios-de-pago"> 
        </div>
          
      </div>
    </footer>
    
      
  </body>
</html>