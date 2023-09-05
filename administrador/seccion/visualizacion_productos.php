<?php include("../template/cabecera.php") ?>

<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../index_admin.php";
    </script>
    ';
    
    session_destroy();
    die();// don die no deja ejecutar el codigo de abajo si no tiene usuario registrado 
}
?>

<?php
include("../config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<br>
<div class="Catalogo">
                <div class="productos">
                    <div class="producto">
                        <?php foreach($lista_producto as $producto){?>
                            <div class="container_v">
                                <div class="card_v"> 
                                  <img  src="../../img/<?php echo $producto['producto_imagen'];?>" alt="">
                                  <h4 class="nombre"> <?php echo $producto['producto_nombre']?></h4>
                                  <h5 class="descri">Descripcion:<br><?php echo $producto['producto_descripcion']; ?></h5>
                                  <h4 class="precioco">Precio de compra:<br>$<?php echo $producto['producto_precio_venta']; ?></h4>
                                  <h4 class="precio">Precio de venta:<br>$<?php echo $producto['producto_precio_venta']; ?></h4>
                                  <form method="POST">
                                      <!-- Opción oculta para enviar el ID del producto que se quiere borrar -->
                                      <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
                                      <!-- Botón para borrar con una clase de Bootstrap para darle estilo -->
                                      <button type="submit" class="btn btn-danger" name="accion" value="Borrar">Borrar Producto</button>
                                  </form>
                                  <button class="ver-mas">Ver Producto</button>
                                </div>
                            </div>
                            <br>
                        
                        <?php }?>
                        

                    </div>

                </div>
            </div>      

           





<?php include("../template/pie.php") ?>