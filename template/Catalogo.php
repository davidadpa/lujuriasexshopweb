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
        <div class="Catalogo">
            <div class="productos">
                <div class="producto">
                    <?php foreach($lista_producto as $producto){?>
                        <img class="card-img-top" src="../img/<?php echo $producto['producto_imagen'];?>" alt="">
                        <div class="informacion">
                            <h3 class="name"><?php echo $producto['producto_nombre']; ?></h3>
                                <p class="price"><?php echo $producto['producto_precio_venta']; ?></p>
                        </div>
                    <?php }?>
                

                </div>

            </div>
        </div>

        
</body>
</html>