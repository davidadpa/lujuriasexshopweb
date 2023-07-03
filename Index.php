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
                            
                        <section class="contenido">
                        <div class="mostrador" id="mostrador">
                            <div class="fila">
                                <div class="item" onclick="cargar(this)">
                                    <div class="contenedor-foto">
                                        <img src="img/<?php echo $producto['producto_imagen'];?>" alt="">
                                    </div>
                                    <p class="descripcion"><?php echo $producto['producto_nombre']?></p>
                                    <span class="precio">$<?php echo $producto['producto_precio_venta']; ?></span>
                                </div>
                                <?php }?> 
                            </div> 
                        </div>

                        <!-- CONTENEDOR DEL ITEM SELECCIONADO -->
        <div class="seleccion" id="seleccion">
            <div class="cerrar" onclick="cerrar()">
                &#x2715
            </div>
            <div class="info">
                <img src="img/<?php echo $producto['producto_imagen'];?>" alt="" id="img">
                <h2 id="modelo"><?php echo $producto['producto_nombre']?></h2>
                <p id="descripcion"><?php echo $producto['producto_descripcion']?></p>
                
                <span class="precio" id="precio">$<?php echo $producto['producto_precio_venta']; ?></span>

                <div class="fila">
                    <div class="size">
                        <label for="">Cantidad</label>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                        </select>
                    </div>
                    <button>AGREGAR AL CARRITO</button>
                </div>
            </div>
        </div>















                    </div>

                </div>
            </div>             
           <footer>
             <?php include("template/pie.php"); ?>
            </footer>
            <script src="js/script_modal.js"></script>
    </body>
</html>
