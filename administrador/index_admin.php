
<?php 
session_start();
if($_POST){
    if(($_POST['usuario']=="administrador")&&($_POST['contrasenia']=="sexshop")){
        $_SESSION['usuario']=="ok";
        $_SESSION['nombreUsuario']=="administrador";
        header('Location: inicio.php');
    }else{
        $mensaje="Error: EL usuario y/o contraseña son incorrectos";
    }
};



?>


<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css"> <!--conexion con el archivo css-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <div class="logo-titulo">
       
        <img src="img/logo_nuevo_final.png" class="logo" alt="logo lujuriasexshop">
        
        <br>
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

                        <form  method='POST'>
                        <div class = "form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario">
                        <small id="emailHelp" class="form-text text-muted">Nunca comparta su Usuario y contraseña</small>
                        </div>
                        
                        <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Ingrese contraseña">
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