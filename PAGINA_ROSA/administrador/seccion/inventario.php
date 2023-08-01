<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>

<?php include("../../administrador\seccion\productos.php") ?>

<head>
    <link rel="stylesheet" href="../../administrador\css\inventario-style.css">
</head>

<!DOCTYPE html>
<html>
<head>
    <title>Inventario Empresarial</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenido_tabla">
        <div class="tabla">
    <div class="container">
        <h2>Inventario Empresarial</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Oferta</th>
                    <th>Precio de Venta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_producto as $producto): ?>
                    <tr>
                        <td><?php echo $producto['producto_id']; ?></td>
                        <td><?php echo $producto['producto_nombre']; ?></td>
                        <td><?php echo $producto['producto_descripcion']; ?></td>
                        <td><?php echo $producto['producto_cantidad']; ?></td>
                        <td><?php echo $producto['producto_tipo']; ?></td>
                        <td><?php echo $producto['producto_oferta']; ?></td>   
                        <td>$<?php echo $producto['producto_precio_venta']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</body>
</html>
