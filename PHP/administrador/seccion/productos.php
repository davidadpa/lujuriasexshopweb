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

switch($accion){
  case "agregar";
  $sentenciaSQL= $conexion->prepare("INSERT INTO tlb_producto (producto_id,producto_nombre) VALUES (:producto_id,:producto_nombre);");
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->bindParam(':producto_nombre',$txtNombre);
  $sentenciaSQL->execute();

  echo "Presionado boton agregar";
  break;

  case "modificar";
  echo "Presionado boton modificar";
  break;

  case "eliminar";
  echo "Presionado boton eliminar";
  break;


}


?>


<div class="col-md-5">

  <div class="card">
    <div class="card-header">
      Datos de productos
    </div>

    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" >

        <div class = "form-group">
        <label for="txtID">ID:</label>
        <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
        </div>

        <div class = "form-group">
        <label for="txtdescripcion">Descripcion:</label>
        <input type="text" class="form-control" name="txtdescripcion" id="txtdescripcion" placeholder="Descripcion de producto">
        </div>

        <div class = "form-group">
        <label for="txtcomponentes">Componentes:</label>
        <input type="text" class="form-control" name="txtcomponentes" id="txtcomponentes" placeholder="Componentes del producto">
        </div>

        <div class = "form-group">
        <label for="txtmodo_uso">Modo de uso:</label>
        <input type="text" class="form-control" name="txtmodo_uso" id="txtmodo_uso" placeholder="Modo de Uso">
        </div>

        <div class = "form-group">
        <label for="txtprecauciones">Precauciones:</label>
        <input type="text" class="form-control" name="txtprecauciones" id="txtprecauciones" placeholder="Precauciones">
        </div>

        <div class = "form-group">
        <label for="txtprecio_venta">Precio de venta:</label>
        <input type="text" class="form-control" name="txtprecio_venta" id="txtprecio_venta" placeholder="Precio de venta">
        </div>

        <div class = "form-group">
        <label for="txtcantidad">Cantidad:</label>
        <input type="text" class="form-control" name="txtcantidad" id="txtcantidad" placeholder="cantidad a ingresar">
        </div>

        <div class = "form-group">
        <label for="imagen_producto">Imagen:</label>
        <input type="file" class="form-control" name="imagen_producto" id="imagen_producto" placeholder="Imagen del producto">
        </div>


        <div class="btn-group" role="group" aria-label="">
          <button type="button" name="accion" value="agregar" class="btn btn-success">Agregar</button>
          <button type="button" name="accion" value="modificar" class="btn btn-warning">Modificar</button>
          <button type="button" name="accion" value="eliminar" class="btn btn-info">Cancelar</button>
        </div>


       
      </form>


    </div>

  </div>

</div>










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
      <tr>
        <td>2</td>
        <td>Aprende php</td>
        <td>descripcion del producto</td>
        <td>ingredientes</td>
        <td>como se aplica</td>
        <td>las precauciones que se deben tener</td>
        <td>El precio de venta</td>
        <td>las unidades</td>
        <td>imagen</td>
        <td>Seleccionar / borrar</td>
      </tr>
      
    </tbody>
 </table>

</div>


<?php include("../template/pie.php") ?>