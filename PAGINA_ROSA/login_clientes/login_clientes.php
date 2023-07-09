
<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("location:bienvenida.php");
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registo</title>
    <link rel="stylesheet" href="../CSS/style_login_cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arvo&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
  </head>
  <body>
    <main>
      <div class="contenedor__todo">
        
        <div class="caja__trasera">
            
          <div class="caja__trasera-login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesion para entrar en la pagina </p>
            <button id="btn__iniciar-sesion">Iniciar Sesion</button>
          </div>

          <div class="caja__trasera-register">
            <h3>¿Aun no tienes una cuenta?</h3>
            <p>Registrate para que puedas iniciar sesion </p>
            <button id="btn__registrarse">Registrarse</button>
          </div>
        </div>
        
        <!--formulario de login y registro -->
        <div class="contenedor__login-register">
            <!--formulario de login -->
          <form action="login_usuario_be.php" method="POST" class="formulario__login">
            <h2>Iniciar sesion</h2>
            <input type="text" placeholder="Correo electronico" name="correo">
            <input type="password" placeholder="contraseña" name="contrasena">
            <button>Entrar</button>
          </form>

          <!--formulario de registro -->
          <form action="registro_usuario_be.php" method="POST" class="formulario__register">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Nombre completo" name="nombre_completo">
            <input type="text" placeholder="Correo electronico" name="correo" >
            <input type="number" placeholder="numero de telefono" min="10" name="telefono">
            <input type="text" placeholder="Usuario" name="usuario">
            <input type="password" placeholder="contraseña" name="contrasena">
            <button>Registrarse</button>
          </form>


        </div>
      </div>
      
    </main>
    <script src="../js/script_ingreso_cliente.js"></script>
  </body>
</html>