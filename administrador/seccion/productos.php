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

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtdescripcion=(isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$txtcomponentes=(isset($_POST['txtcomponentes']))?$_POST['txtcomponentes']:"";
$txtmodo_uso=(isset($_POST['txtmodo_uso']))?$_POST['txtmodo_uso']:"";
$txtprecauciones=(isset($_POST['txtprecauciones']))?$_POST['txtprecauciones']:"";
$txtprecio_compra=(isset($_POST['txtprecio_compra']))?$_POST['txtprecio_compra']:"";
$txtprecio_venta=(isset($_POST['txtprecio_venta']))?$_POST['txtprecio_venta']:"";
$txtcantidad=(isset($_POST['txtcantidad']))?$_POST['txtcantidad']:"";
$txttipo=(isset($_POST['txttipo']))?$_POST['txttipo']:"";
$txtoferta=(isset($_POST['txtoferta']))?$_POST['txtoferta']:"";
$imagen_producto=(isset($_FILES['imagen_producto']['name']))?$_FILES['imagen_producto']['name']:"";
$imagen_producto_2=(isset($_FILES['imagen_producto_2']['name']))?$_FILES['imagen_producto_2']['name']:"";
$imagen_producto_3=(isset($_FILES['imagen_producto_3']['name']))?$_FILES['imagen_producto_3']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php"); 

switch($accion){ //Sirve para ingresar los tatos a la base de datos

  case "agregar";
  $sentenciaSQL= $conexion->prepare("INSERT INTO tlb_producto (producto_id,producto_nombre,producto_descripcion,producto_componenetes,producto_modo_uso,producto_precauciones,producto_precio_compra,producto_precio_venta,producto_cantidad,producto_tipo,producto_oferta,producto_imagen,producto_imagen_2,producto_imagen_3 ) VALUES (:producto_id,:producto_nombre,:producto_descripcion,:producto_componenetes,:producto_modo_uso,:producto_precauciones,:producto_precio_compra,:producto_precio_venta,:producto_cantidad,:producto_tipo,:producto_oferta,:producto_imagen,:producto_imagen_2,:producto_imagen_3);");
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->bindParam(':producto_nombre',$txtNombre);
  $sentenciaSQL->bindParam(':producto_descripcion',$txtdescripcion);
  $sentenciaSQL->bindParam(':producto_componenetes',$txtcomponentes);
  $sentenciaSQL->bindParam(':producto_modo_uso',$txtmodo_uso);
  $sentenciaSQL->bindParam(':producto_precauciones',$txtprecauciones);
  $sentenciaSQL->bindParam(':producto_precio_compra',$txtprecio_compra);
  $sentenciaSQL->bindParam(':producto_precio_venta',$txtprecio_venta);
  $sentenciaSQL->bindParam(':producto_cantidad',$txtcantidad);
  $sentenciaSQL->bindParam(':producto_tipo',$txttipo);
  $sentenciaSQL->bindParam(':producto_oferta',$txtoferta);

  //este codigo se utiliza para colocar la fecha en la imagen insertada como tambien guardarla en la carpeta img
  $fecha= new DateTime();
  $nombreArchivo=($imagen_producto!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto"]["name"]:"imagen.jpg";
  $tmpIMagen=$_FILES["imagen_producto"]["tmp_name"];
  if($tmpIMagen!=""){
    move_uploaded_file($tmpIMagen,"../../img/".$nombreArchivo);
  }
  $sentenciaSQL->bindParam(':producto_imagen',$nombreArchivo);


  //ingreso de segunda imagen
  $nombreArchivo_2=($imagen_producto_2!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto_2"]["name"]:"imagen.jpg";
  $tmpIMagen_2=$_FILES["imagen_producto_2"]["tmp_name"];
  if($tmpIMagen_2!=""){
    move_uploaded_file($tmpIMagen_2,"../../img/".$nombreArchivo_2);
  }
  $sentenciaSQL->bindParam(':producto_imagen_2',$nombreArchivo_2);


 //ingreso de tercera imagen
 $nombreArchivo_3=($imagen_producto_3!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto_3"]["name"]:"imagen.jpg";
 $tmpIMagen_3=$_FILES["imagen_producto_3"]["tmp_name"];
 if($tmpIMagen_3!=""){
   move_uploaded_file($tmpIMagen_3,"../../img/".$nombreArchivo_3);
 }
 $sentenciaSQL->bindParam(':producto_imagen_3',$nombreArchivo_3); 


  $sentenciaSQL->execute();
  //echo "Presionado boton agregar";
  break;



  case "modificar";

  $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_nombre=:producto_nombre, producto_descripcion=:producto_descripcion, producto_componenetes=:producto_componenetes, producto_modo_uso=:producto_modo_uso, producto_precauciones=:producto_precauciones, producto_precio_compra=:producto_precio_compra, producto_precio_venta=:producto_precio_venta, producto_cantidad=:producto_cantidad, producto_tipo=:producto_tipo,producto_oferta=:producto_oferta  WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->bindParam(':producto_nombre',$txtNombre);
  $sentenciaSQL->bindParam(':producto_descripcion',$txtdescripcion);
  $sentenciaSQL->bindParam(':producto_componenetes',$txtcomponentes);
  $sentenciaSQL->bindParam(':producto_modo_uso',$txtmodo_uso);
  $sentenciaSQL->bindParam(':producto_precauciones',$txtprecauciones);
  $sentenciaSQL->bindParam(':producto_precio_compra',$txtprecio_compra);
  $sentenciaSQL->bindParam(':producto_precio_venta',$txtprecio_venta);
  $sentenciaSQL->bindParam(':producto_cantidad',$txtcantidad);
  $sentenciaSQL->bindParam(':producto_tipo',$txttipo);
  $sentenciaSQL->bindParam(':producto_oferta',$txtoferta);
  $sentenciaSQL->execute();


  if($imagen_producto!=""){

    $fecha= new DateTime();
    $nombreArchivo=($imagen_producto!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto"]["name"]:"imagen.jpg";
    $tmpIMagen=$_FILES["imagen_producto"]["tmp_name"];
    move_uploaded_file($tmpIMagen,"../../img/".$nombreArchivo);

    $sentenciaSQL= $conexion->prepare("SELECT producto_imagen FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

  if(isset($producto["producto_imagen"]) &&($producto["producto_imagen"]!="imagen.jpg")){
    if(file_exists("../../img/".$producto["producto_imagen"])){
      unlink("../../img/".$producto["producto_imagen"]);
    }

  }
    $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_imagen=:producto_imagen WHERE producto_id=:producto_id"); 
    $sentenciaSQL->bindParam(':producto_imagen',$nombreArchivo);
    $sentenciaSQL->bindParam(':producto_id',$txtID);
    $sentenciaSQL->execute();
  }



  if($imagen_producto_2!=""){

    $fecha= new DateTime();
    $nombreArchivo_2=($imagen_producto_2!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto_2"]["name"]:"imagen.jpg";
    $tmpIMagen_2=$_FILES["imagen_producto_2"]["tmp_name"];
    move_uploaded_file($tmpIMagen_2,"../../img/".$nombreArchivo_2);

    $sentenciaSQL= $conexion->prepare("SELECT producto_imagen_2 FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

  if(isset($producto["producto_imagen_2"]) &&($producto["producto_imagen_2"]!="imagen.jpg")){
    if(file_exists("../../img/".$producto["producto_imagen_2"])){
      unlink("../../img/".$producto["producto_imagen_2"]);
    }

  }
    $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_imagen_2=:producto_imagen_2 WHERE producto_id=:producto_id"); 
    $sentenciaSQL->bindParam(':producto_imagen_2',$nombreArchivo_2);
    $sentenciaSQL->bindParam(':producto_id',$txtID);
    $sentenciaSQL->execute();
  }



  if($imagen_producto_3!=""){

    $fecha= new DateTime();
    $nombreArchivo_3=($imagen_producto_3!="")?$fecha->getTimestamp()."_".$_FILES["imagen_producto_3"]["name"]:"imagen.jpg";
    $tmpIMagen_3=$_FILES["imagen_producto_3"]["tmp_name"];
    move_uploaded_file($tmpIMagen_3,"../../img/".$nombreArchivo_3);

  $sentenciaSQL= $conexion->prepare("SELECT producto_imagen_3 FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

  if(isset($producto["producto_imagen_3"]) &&($producto["producto_imagen_3"]!="imagen.jpg")){
    if(file_exists("../../img/".$producto["producto_imagen_3"])){
      unlink("../../img/".$producto["producto_imagen_3"]);
    }

  }
    $sentenciaSQL= $conexion->prepare("UPDATE tlb_producto SET producto_imagen_3=:producto_imagen_3 WHERE producto_id=:producto_id"); 
    $sentenciaSQL->bindParam(':producto_imagen_3',$nombreArchivo_3);
    $sentenciaSQL->bindParam(':producto_id',$txtID);
    $sentenciaSQL->execute();
  }


  //echo "Presionado boton modificar";
  break;

  case "Cancelar";
  header("Location:productos.php");
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
  $txtprecio_compra=$producto['producto_precio_compra'];
  $txtprecio_venta=$producto['producto_precio_venta'];
  $txtcantidad=$producto['producto_cantidad'];
  $txttipo=$producto['producto_tipo'];
  $txtoferta=$producto['producto_oferta'];
  $imagen_producto=$producto['producto_imagen'];
  $imagen_producto_2=$producto['producto_imagen_2'];
  $imagen_producto_3=$producto['producto_imagen_3'];

  //echo "Presionado boton Seleccionar";
  break;

  case "Borrar";
  
  $sentenciaSQL= $conexion->prepare("SELECT producto_imagen FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);


  if(isset($producto["producto_imagen"]) &&($producto["producto_imagen"]!="imagen.jpg")){
    if(file_exists("../../img/".$producto["producto_imagen"])){
      unlink("../../img/".$producto["producto_imagen"]);
    }

  }

  $sentenciaSQL= $conexion->prepare("DELETE FROM tlb_producto WHERE producto_id=:producto_id"); 
  $sentenciaSQL->bindParam(':producto_id',$txtID);
  $sentenciaSQL->execute();
  $lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 


  
    /*if(isset($producto["producto_imagen_2"]) &&($producto["producto_imagen_2"]!="imagen.jpg")){
      if(file_exists("../../img/".$producto["producto_imagen_2"])){
        unlink("../../img/".$producto["producto_imagen_2"]);
      }
    }

  
    if(isset($producto["producto_imagen_3"]) &&($producto["producto_imagen_3"]!="imagen.jpg")){
      if(file_exists("../../img/".$producto["producto_imagen_3"])){
        unlink("../../img/".$producto["producto_imagen_3"]);
      }
    }
  */

  
  //echo "Presionado boton Borrar";
  break;


}

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 



?>

<br>
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

          <div class = "form-group">
            <label for="txttipo">Tipo de producto:</label>
            <select type="text" class="form-control" value="<?php echo $txttipo; ?>" name="txttipo" id="txttipo"> 
              <option value="sin_clasificar">sin_clasificar</option>
              <option value="vibradores">vibradores</option>
              <option value="consoladores">consoladores</option>
              <option value="jugetes_anales">jugetes_anales</option>
              <option value="hombres">hombres</option>
              <option value="lubricantes">lubricantes</option>
              <option value="lenceria">lenceria</option>
              <option value="sado">sado</option>
              <option value="extras">extras</option>
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
            <input type="submit" name="accion" value="agregar" class="btn btn-success">
            <button type="submit" name="accion" value="modificar" class="btn btn-warning">Modificar</button>
            <button type="button" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
            
            
          </div>


        
        </form>


      </div>

    </div>

  </div>
</div>
<br>



<div >
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
          <th>Precio de compra</th>
          <th>Precio de venta</th>
          <th>Inventario inicial</th>
          <th>Tipo de producto</th>
          <th>Tipo de oferta</th>
          <th>Imagen</th>
          <th>Imagen 2</th>
          <th>Imagen 3</th>
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
          <td><?php echo $producto['producto_precio_compra']; ?></td>
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

<?php include("../template/pie.php") ?>
