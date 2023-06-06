<?php include("../template/cabecera.php") ?>

<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtdescripcion=(isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$txtcomponentes=(isset($_POST['txtcomponentes']))?$_POST['txtcomponentes']:"";
$txtmodo_uso=(isset($_POST['txtmodo_uso']))?$_POST['txtmodo_uso']:"";
$txtprecauciones=(isset($_POST['txtprecauciones']))?$_POST['txtprecauciones']:"";
$txtprecio_venta=(isset($_POST['txtprecio_venta']))?$_POST['txtprecio_venta']:"";
$txtcantidad=(isset($_POST['txtcantidad']))?$_POST['txtcantidad']:"";
$imagen_producto=(isset($_FILES['imagen_producto']['name']))?$_FILES['imagen_producto']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php"); 

switch($accion){ //Sirve para ingresar los tatos a la base de datos

  case "agregar";
  $sentenciaSQL= $conexion->prepare("INSERT INTO tlb_producto (producto_id,producto_nombre,producto_descripcion,producto_componenetes,producto_modo_uso,producto_precauciones,producto_precio_venta,producto_cantidad,producto_imagen) VALUES (:producto_id,:producto_nombre,:producto_descripcion,:producto_componenetes,:producto_modo_uso,:producto_precauciones,:producto_precio_venta,:producto_cantidad,:producto_imagen);");
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->bindParam(':producto_nombre',$txtNombre);
  $sentenciaSQL->bindParam(':producto_descripcion',$txtdescripcion);
  $sentenciaSQL->bindParam(':producto_componenetes',$txtcomponentes);
  $sentenciaSQL->bindParam(':producto_modo_uso',$txtmodo_uso);
  $sentenciaSQL->bindParam(':producto_precauciones',$txtprecauciones);
  $sentenciaSQL->bindParam(':producto_precio_venta',$txtprecio_venta);
  $sentenciaSQL->bindParam(':producto_cantidad',$txtcantidad);
  $sentenciaSQL->bindParam(':producto_imagen',$imagen_producto);
  $sentenciaSQL->execute();
  //echo "Presionado boton agregar";
  break;



  case "modificar";

  $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_nombre=:producto_nombre, producto_descripcion=:producto_descripcion, producto_componenetes=:producto_componenetes, producto_modo_uso=:producto_modo_uso, producto_precauciones=:producto_precauciones, producto_precio_venta=:producto_precio_venta, producto_cantidad=:producto_cantidad WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->bindParam(':producto_nombre',$txtNombre);
  $sentenciaSQL->bindParam(':producto_descripcion',$txtdescripcion);
  $sentenciaSQL->bindParam(':producto_componenetes',$txtcomponentes);
  $sentenciaSQL->bindParam(':producto_modo_uso',$txtmodo_uso);
  $sentenciaSQL->bindParam(':producto_precauciones',$txtprecauciones);
  $sentenciaSQL->bindParam(':producto_precio_venta',$txtprecio_venta);
  $sentenciaSQL->bindParam(':producto_cantidad',$txtcantidad);
  $sentenciaSQL->execute();

  if($imagen_producto!=""){

    $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_imagen=:producto_imagen WHERE producto_id=:producto_id"); 
    $sentenciaSQL->bindParam(':producto_imagen',$imagen_producto);
    $sentenciaSQL->bindParam(':producto_id',$txtID);
    $sentenciaSQL->execute();
  }
  //echo "Presionado boton modificar";
  break;

  case "eliminar";
  echo "Presionado boton eliminar";
  break;




  case "Seleccionar";
  $sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
  $txtNombre=$producto['producto_nombre'];
  $txtdescripcion=$producto['producto_descripcion'];
  $txtcomponentes=$producto['producto_componenetes'];
  $txtmodo_uso=$producto['producto_modo_uso'];
  $txtprecauciones=$producto['producto_precauciones'];
  $txtprecio_venta=$producto['producto_precio_venta'];
  $txtcantidad=$producto['producto_cantidad'];
  $imagen_producto=$producto['producto_imagen'];
  //echo "Presionado boton Seleccionar";
  break;

  case "Borrar";
  $sentenciaSQL= $conexion->prepare("DELETE FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 
  //echo "Presionado boton Borrar";
  break;


}

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 



?>

<br>
<div class="col-md-5">

  <div class="card">
    <div class="card-header">
      Datos de productos
    </div>

    <div class="card-body">
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
        <label for="txtprecio_venta">Precio de venta:</label>
        <input type="number" class="form-control" value="<?php echo $txtprecio_venta; ?>" name="txtprecio_venta" id="txtprecio_venta" placeholder="Precio de venta">
        </div>

        <div class = "form-group">
        <label for="txtcantidad">Cantidad:</label>
        <input type="number" class="form-control" value="<?php echo $txtcantidad; ?>" name="txtcantidad" id="txtcantidad" placeholder="cantidad a ingresar">
        </div>

        <div class = "form-group">
        <label for="imagen_producto">Imagen:</label>
        <?php echo $imagen_producto; ?>
        <input type="file" class="form-control"  name="imagen_producto" id="imagen_producto" placeholder="Imagen del producto">
        </div>


        <div class="btn-group" role="group" aria-label="">
          <input type="submit" name="accion" value="agregar" class="btn btn-success">
          <button type="submit" name="accion" value="modificar" class="btn btn-warning">Modificar</button>
          <button type="button" name="accion" value="eliminar" class="btn btn-info">Cancelar</button>
          
          
        </div>


       
      </form>


    </div>

  </div>

</div>

<br>




<div class="col-md-7">
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Componentes</th>
        <th>Modo de uso</th>
        <th>Precauciones</th>
        <th>Precio de venta</th>
        <th>Cantidad</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach($lista_producto as $producto) { ?>
      <tr>
        <td><?php echo $producto['producto_id']; ?></td>
        <td><?php echo $producto['producto_nombre']; ?></td>
        <td><?php echo $producto['producto_descripcion']; ?></td>
        <td><?php echo $producto['producto_componenetes']; ?></td>
        <td><?php echo $producto['producto_modo_uso']; ?></td>
        <td><?php echo $producto['producto_precauciones']; ?></td>
        <td><?php echo $producto['producto_precio_venta']; ?></td>
        <td><?php echo $producto['producto_cantidad']; ?></td>
        <td><?php echo $producto['producto_imagen']; ?></td>
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


<?php include("../template/pie.php") ?>