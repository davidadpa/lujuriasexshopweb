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
        <articule class="CATALOGO">
        <div class="Productos">
             <h2 class="Titulo">Nuestros Productos</h2>
            <?php foreach($lista_producto as $producto){?>
                 <img class="card-img-top" src="../img/<?php echo $producto['producto_imagen'];?>" alt="">
             <?php }?>
                <a><img src="../img/productos/cuadro.jpg"></a>
              
          
            </div>
        </div>
            </articule>
</body>
</html>