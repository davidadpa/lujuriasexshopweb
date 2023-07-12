
<?php 
session_start();// se utiliza para trabajar con sesiones
if(isset($_SESSION['usuario'])){
    header("location:inicio.php");
  }
?>


<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../CSS\style_login_cliente.css">
    <link rel="stylesheet" href="css/style.css"> <!--conexion con el archivo css-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  

  <div class="logo-titulo">

  <a href="../Index.php"><img src="img/logo_nuevo_final.png" class="logo" alt="logo lujuriasexshop"></a>
        
        <br>
    </div>
      <div class="caja">
      <div class="ingreso">
          <a href="../login_clientes\login_clientes.php">
          <button class="usuario">Usuarios</button>
          </a>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                <br><br><br>
                
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje;?>
                        </div>
                    <?php }?>

                        <form  action="login_admin/login_admin.php" method='POST'>
                        <div class = "form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario">
                        <small id="emailHelp" class="form-text text-muted">Nunca comparta su Usuario y contraseña</small>
                        </div>
                        
                        <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Ingrese contraseña">
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        </form>
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
  </body>
</html>