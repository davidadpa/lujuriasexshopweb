<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>

<?php include("../../administrador\seccion\productos.php");
	$txtID = $_GET['id'];
?>
<?php

try {


    // Obtener la lista de categorías desde la base de datos
    $sql = "SELECT categoria_id, categoria_nombre FROM categoria";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error al obtener las categorías: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
<head>
<link rel="stylesheet" href="../../administrador\css\agregar-style.css">
</head>
<body>
    
<br>
<div class="contenido_tabla">
        <div class="tabla">
<div align=center>
  <div class="col-md-7">

    <div class="card">
      <div class="card-header">
        Datos de productos
      </div>

      <div class="card-body" align=left>
        <form method="POST" enctype="multipart/form-data" >

          <div class = "form-group">
          <label for="txtID">ID:</label>
          <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
          </div>

          <div class = "form-group">
          <label for="txtNombre">Nombre:</label>
          <input type="text" class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
          </div>

          <div class = "form-group">
          <label for="txtdescripcion">Descripcion:</label>
          <input type="text" class="form-control" value="<?php echo $txtdescripcion; ?>" name="txtdescripcion" id="txtdescripcion" placeholder="Descripcion de producto">
          </div>

          <div class = "form-group">
          <label for="txtcomponentes">Componentes:</label>
          <input type="text" class="form-control" value="<?php echo $txtcomponentes; ?>" name="txtcomponentes" id="txtcomponentes" placeholder="Componentes del producto">
          </div>

          <div class = "form-group">
          <label for="txtmodo_uso">Modo de uso:</label>
          <input type="text" class="form-control" value="<?php echo $txtmodo_uso; ?>" name="txtmodo_uso" id="txtmodo_uso" placeholder="Modo de Uso">
          </div>

          <div class = "form-group">
          <label for="txtprecauciones">Precauciones:</label>
          <input type="text" class="form-control" value="<?php echo $txtprecauciones; ?>"  name="txtprecauciones" id="txtprecauciones" placeholder="Precauciones">
          </div>

          <div class = "form-group">
          <label for="txtprecio_compra">Precio de compra:</label>
          <input type="number" class="form-control" value="<?php echo $txtprecio_compra; ?>" name="txtprecio_compra" id="txtprecio_compra" placeholder="Precio de compra">
          </div>

          <div class = "form-group">
          <label for="txtprecio_venta">Precio de venta:</label>
          <input type="number" class="form-control" value="<?php echo $txtprecio_venta; ?>" name="txtprecio_venta" id="txtprecio_venta" placeholder="Precio de venta">
          </div>

          <div class = "form-group">
          <label for="txtcantidad">Inventario inicial:</label>
          <input type="number" class="form-control" value="<?php echo $txtcantidad; ?>" name="txtcantidad" id="txtcantidad" placeholder="Inventario inicial a ingresar">
          </div>

          <div class="form-group">
    <label for="txttipo">Tipo de producto:</label>
    <select class="form-control" value="<?php echo $txttipo; ?>" name="txttipo" id="txttipo">
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?php echo $categoria['categoria_id']; ?>"><?php echo $categoria['categoria_nombre']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

          <div class = "form-group">
            <label for="txtoferta">Tipo de oferta:</label>
            <select type="text" class="form-control" value="<?php echo $txtoferta; ?>" name="txtoferta" id="txtoferta"> 
              <option value="ninguna">ninguna</option>
              <option value="lo_mas_vendido">lo_mas_vendido</option>
              <option value="destacados">destacados</option>
              
            </select> 
          </div>

          <div class = "form-group">
            <label for="imagen_producto">Imagen:</label>
            <br>
            <?php

              if($imagen_producto!=""){?>
                <img class="img-thumbnail rounded" src="../../img/<?php echo $imagen_producto; ?>" width="100" alt="" srcset="">

            <?php }?>
            <input type="file" class="form-control"   name="imagen_producto" id="imagen_producto" placeholder="Imagen del producto">
          </div>


          <div class = "form-group">
            <label for="imagen_producto">Imagen 2:</label>
            <br>
            <?php

              if($imagen_producto_2!=""){?>
                <img class="img-thumbnail rounded" src="../../img/<?php echo $imagen_producto_2; ?>" width="100" alt="" srcset="">

            <?php }?>
            <input type="file" class="form-control"   name="imagen_producto_2" id="imagen_producto_2" placeholder="Imagen del producto">
          </div>



          <div class = "form-group">
            <label for="imagen_producto">Imagen 3:</label>
            <br>
            <?php

              if($imagen_producto_3!=""){?>
                <img class="img-thumbnail rounded" src="../../img/<?php echo $imagen_producto_3; ?>" width="100" alt="" srcset="">

            <?php }?>
            <input type="file" class="form-control"   name="imagen_producto_3" id="imagen_producto_3" placeholder="Imagen del producto">
          </div>


          <div class="btn-group" role="group" aria-label="">
            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
            <button type="submit" name="accion" value="modificar" class="btn btn-warning">Modificar</button>
            <button type="button" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
            
          </div>


        
        </form>


      </div>

    </div>

  </div>
</div>
</div>
                </div>
</body>