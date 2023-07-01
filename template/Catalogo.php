<?php
include("../administrador/config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS\catalogo-style.css">
    <title>Catalogo</title>
</head>
<body>
<?php foreach($lista_producto as $producto){?>

<div class="container_v">
    <div class="card_v"> 
      <img  src="../../img/<?php echo $producto['producto_imagen'];?>" alt="">
        <h4 class="card-title"> <?php echo $producto['producto_nombre']?></h4>
        <a name="" id="" class="btn btn-primary" href="" role="button"> ver mas </a>
      
    </div>
    <br>
  
<?php }?>

</div>

        
</body>
</html>