<?php
require("../config/config.php");
include("../administrador/config/db.php"); 
include("carrito.php"); 
include("../template/cabecera_carrito.php");


?>
<?php


// Obtener el ID de la venta actual
$sentencia_venta_actual = $conexion->prepare("SELECT MAX(venta_id) AS venta_actual FROM tlb_ventas");
$sentencia_venta_actual->execute();
$venta_actual = $sentencia_venta_actual->fetch(PDO::FETCH_ASSOC);
$venta_actual_id = $venta_actual['venta_actual'];

// Obtener los detalles de la venta actual
$sentencia_detalles_venta = $conexion->prepare("SELECT * FROM tlb_detalle_ventas WHERE detalle_idventa = :idventa");
$sentencia_detalles_venta->bindParam(":idventa", $venta_actual_id);
$sentencia_detalles_venta->execute();
$detalles_venta = $sentencia_detalles_venta->fetchAll(PDO::FETCH_ASSOC);

// Actualizar el stock de cada producto vendido
foreach ($detalles_venta as $detalle) {
    $id_producto = $detalle['detalle_id_producto'];
    $cantidad_vendida = $detalle['detalle_cantidad'];

    // Obtener el stock actual del producto
    $sentencia_stock_actual = $conexion->prepare("SELECT producto_cantidad FROM tlb_producto WHERE producto_id = :id_producto");
    $sentencia_stock_actual->bindParam(":id_producto", $id_producto);
    $sentencia_stock_actual->execute();
    $producto = $sentencia_stock_actual->fetch(PDO::FETCH_ASSOC);

    // Calcular el nuevo stock después de la venta
    $nuevo_stock = $producto['producto_cantidad'] - $cantidad_vendida;

    // Actualizar el stock del producto en la base de datos
    $sentencia_actualizar_stock = $conexion->prepare("UPDATE tlb_producto SET producto_cantidad = :nuevo_stock WHERE producto_id = :id_producto");
    $sentencia_actualizar_stock->bindParam(":nuevo_stock", $nuevo_stock);
    $sentencia_actualizar_stock->bindParam(":id_producto", $id_producto);
    $sentencia_actualizar_stock->execute();
}
// Después de almacenar los datos de la compra y obtener el ID de la venta
$id_venta = 1; // Por ejemplo, obtienes el ID de la venta después de realizarla

// Redireccionar al archivo generar_factura.php con el ID de la venta como parámetro
echo "<script>window.open('../Factura/factura.php?id_venta=" . $id_venta . "', '_blank');</script>";
?>



<div class="jumbotron text-center">
    <h1 class="display-4">¡Tu compra fue realizada!</h1>
    <hr class="my-4">
    <p class="lead">Los productos se enviaran a la direccion especificada 
     <br>   
     <?php

     
    
     ?>
    <strong>(Para aclaraciones escribir a: lujuriasexshop@hotmail.com)</strong>
    </p>
    <br>
   
</div>






<?php include("../template/pie_carrito.php"); ?> <!--Corresponde al pie de pagina-->