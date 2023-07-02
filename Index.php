<?php include("template/Navegador.php"); ?>
<?php include("template/inicio.php"); ?>
<?php
include("administrador/config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\index-style.css">
    <link rel="stylesheet" href="CSS\catalogo-style.css">
    
    <title>Document</title>
    </head>
    <body>
            <div class="menu-iconos">
                <ul>
                    <a href=""><img  src="img/iconos/recoleccion-discreta.png" alt=""></a>
                    <a href=""><img  src="Img/Iconos/entrega-rapida.png"></a>
                    <a href=""><img  src="Img/Iconos/entrega-urgente.png"></a>
                    <a href=""><img  src="Img/Iconos/metodo-de-pago.png"></a>
                </ul>
            </div>

            <div class="Promociones">
                <ul>
                    <a href=""><img src="Img/Pomociones/bola china.jpg"></a>
                    <a href=""><img src="Img/Pomociones/CEq-aceites-para-masajes-1.jpg"></a>
                    <a href=""><img src="img/Pomociones/copa mestrual.jpg"></a>
                    <a href=""><img src="Img/Pomociones/slider vibradores.jpg"></a>
                    <a href=""><img src="img/Pomociones/cosoladores varios 3.jpg"></a>
                    <a href=""><img src="img/Pomociones/cosoladores varios.jpg"></a>
                    <a href=""><img src="img/Pomociones/jugetes anales -1.jpg"></a>
                    <a href=""><img src="Img/Pomociones/jugetes anales -2.jpg" alt=""></a>
                    <a href=""><img src="Img/Pomociones/jugetes anales -3.jpg"></a>
                    <a href=""><img src="Img/Pomociones/slider vibradores.jpg"></a>
                    <a href=""><img src="Img/Pomociones/bola china.jpg"></a>
                    <a href=""><img src="Img/Pomociones/CEq-aceites-para-masajes-1.jpg"></a>
                </ul>
            
            
            </div>
            <article class="TOP">
                        <div class="Top">
                            <h2 class="Titulo_Top">Lo mas Vendido</h2><br>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                            <a><img src="img/productos/cuadro.jpg"></a>
                        </div>

                    </article>
            <div class="Catalogo">
                <div class="productos">
                    <div class="producto">
                    <?php foreach($lista_producto as $producto){?>
                            <div class="container_v">
                                <div class="card_v"> 
                                  <img  src="img/<?php echo $producto['producto_imagen'];?>" alt="">
                                  <h4 class="nombre"> <?php echo $producto['producto_nombre']?></h4>
                                  <h5 class="descri">Descripcion:<br><?php echo $producto['producto_descripcion']; ?></h5>
                                  <h4 class="precio">Precio:<br>$<?php echo $producto['producto_precio_venta']; ?></h4>
                                  <button class="ver-mas">Ver más</button>
                                  <button name="" id="" class="ver-mas" href="" role="button"> añadir al carrito </button>
                                </div>
                            </div>
                            <br>
                        
                        <?php }?>
                        

                    </div>

                </div>
            </div>             
           <footer>
             <?php include("template/pie.php"); ?>
            </footer>

    </body>
</html>
