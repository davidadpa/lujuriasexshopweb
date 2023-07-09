
<?php include("template/cabecera.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<?php
require("config/config.php");
include("administrador/config/db.php"); 


$id = mysqli_real_escape_string($conexion, $_REQUEST['producto_id'] ?? '');
$queryProducto = "SELECT id,nombre,precio,existencia FROM productos where id='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);

 ?>     
      
      

<?php include("template/pie.php"); ?> <!--Corresponde al pie de pagina-->