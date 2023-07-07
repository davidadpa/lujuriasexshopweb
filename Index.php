<?php include("template/Navegador.php"); ?>
<?php include("template/inicio.php"); ?>
<?php
include("administrador/config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 


try {
    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tu consulta para obtener los productos de la base de datos
    $consulta = "SELECT * FROM tlb_producto";
    $resultado = $conexion->query($consulta);

    // Verificar si hay resultados
    if ($resultado->rowCount() > 0) {
        // Recorrer los productos utilizando el bucle foreach
        while ($producto = $resultado->fetch(PDO::FETCH_ASSOC)) {
            // Acceder a los datos del producto
            $txtID = $producto['producto_id'];
            $txtNombre = $producto['producto_nombre'];
            $txtdescripcion = $producto['producto_descripcion'];
            $txtprecio_venta = $producto['producto_precio_venta'];
            $imagen_producto = $producto['producto_imagen'];
            // ... Otros campos del producto

        }
    } else {
        echo 'No se encontraron productos.';
    }
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conexion = null;

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
        <?php foreach($lista_producto as $producto) {
            $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        ?>
            <div class="container_v">
                <div class="card_v"> 
                    <a href="catalogo.php?id=<?php echo $txtID; ?>"> <!-- Enlace a la página del producto con el ID -->
                        <img src="img/<?php echo $producto['producto_imagen']; ?>" alt="">
                        <h4 class="nombre"><?php echo $producto['producto_nombre']; ?></h4>
                        <h5 class="descri">Descripcion:<br><?php echo $producto['producto_descripcion']; ?></h5>
                        <h4 class="precio">Precio:<br>$<?php echo $producto['producto_precio_venta']; ?></h4>
                        <button class="ver-mas">Ver más</button>
                    </a>
                </div>
            </div>
            <br>
        <?php } ?>
        </div>
    </div>
</div>
           <footer>
             <?php include("template/pie.php"); ?>
            </footer>

    </body>
</html>
