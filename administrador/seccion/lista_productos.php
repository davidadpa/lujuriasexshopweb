<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>

<?php include("../../administrador\seccion\productos.php") ?>

<head>
    <link rel="stylesheet" href="../../administrador\css\lista_produc_style.css">
</head>

<body>
    <div class="contenido_tabla">
        <div class="tabla">
            
        <table class="table-custom">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio de venta</th>
                <th>Stocks</th>
                <th>Tipo de producto</th>
                <th>Tipo de oferta</th>
                <th>Imagen</th>
                <th>Imagen 2</th>
                <th>Imagen 3</th>
                <th>Acciones</th>
                </tr>
            </thead>

            
            <tbody class="contenido">

                <?php foreach($lista_producto as $producto) { ?>
                <tr>
                <td><?php echo $producto['producto_id']; ?></td>
                <td><?php echo $producto['producto_nombre']; ?></td>
                <td><?php echo $producto['producto_descripcion']; ?></td>
                <td><?php echo $producto['producto_precio_venta']; ?></td>
                <td><?php echo $producto['producto_cantidad']; ?></td>
                <td><?php echo $producto['producto_tipo']; ?></td>
                <td><?php echo $producto['producto_oferta']; ?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['producto_imagen']; ?>" width="100" alt="" srcset="">
                </td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['producto_imagen_2']; ?>" width="100" alt="" srcset="">
                </td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['producto_imagen_3']; ?>" width="100" alt="" srcset="">
                </td>


                <td>
                    <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['producto_id']; ?>"/>

                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
                </div>
    </div>
</body>