<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sexshop</title> <!--Titulo de la pagina-->
    <link rel="stylesheet" href="../CSS/nav-index-style.css"> <!--conexion con el archivo css-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- esta es la lista de iconos para desarrolladores de crome-->
    <link rel="stylesheet" href="../CSS\style-productos_masvendidos.css">
  </head>


  <body>
    <nav>

        <div class="Logo">
           <a href="../Index.php"><img src="../img\logo\logo oficial.png"></a> 
        </div>


        <div class="buscador">
            <input type="text" placeholder="Busqueda">
            <div class="acciones">
                <button><span class="material-icons">search</span></button> <!-- esta es la estructura qye se utiliza para utilizar los iconos-->
                <a href="../carrito/mostrar_carrito.php" class="espacio1"><button><span class="material-icons">shopping_cart</span></button></a>
            </div>
        </div>
        

        <ul class="menu"> <!-- se crea el menu principal sin especificar ruta-->
          <li><a href="../tipos_productos/vibradores.php">Vibradores</a></li>
          <li><a href="../tipos_productos/consoladores.php">Consoladores</a></li>
          <li><a href="../tipos_productos/jugetes_anales.php">Jugetes anales</a></li>
          <li><a href="../tipos_productos/hombres.php">Hombres</a></li>
          <li><a href="../tipos_productos/lubricantes.php">lubricantes</a></li>
          <li><a href="../tipos_productos/lenceria.php">Lenceria</a></li>
          <li><a href="../tipos_productos/sado.php">Sado y Fetiche</a></li>
          <li><a href="../tipos_productos/extras.php">Extras</a></li>
          <li><a href="../tipos_productos/contacto.php">Contacto</a></li>
        </ul>

        <div class="ingresos">
            <a href="../carrito/mostrar_carrito.php" class="pedidos"><img src="../img\Iconos\pedidos.png"></a>
            <a href="../login_clientes/login_clientes.php" class="usuarios"><img src="../img\Iconos\usuario.png"></a>
        </div>
    </nav>
    <articule>
    <div class="menu-iconos">
                <ul>
                    <a href=""><img  src="../img/iconos/recoleccion-discreta.png" alt=""></a>
                    <a href=""><img  src="../Img/Iconos/entrega-rapida.png"></a>
                    <a href=""><img  src="../Img/Iconos/entrega-urgente.png"></a>
                    <a href=""><img  src="../Img/Iconos/metodo-de-pago.png"></a>
                </ul>
              </div>
    </articule>




    
    </html>