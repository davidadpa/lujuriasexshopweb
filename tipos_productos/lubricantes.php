<?php include("../template/cabecera_tipos_productos.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->


<?php

include("../administrador/config/db.php"); //conexion a la base de datos
include("../carrito/carrito.php"); //conexion al archivo de funcionamiento del

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_tipo = 'lubricantes'"); //busca en la tabla producto solo los productos tipo vibrador 
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>



<div class="ubicacion">

  <a href="../index.php" class="ubicacion-texto">INICIO /</a>
  <a href="lubricantes.php" class="ubicacion-texto">LUBRICANTES</a>

</div>


<div class="container">
                      <br>

                      <?php if($mensaje!=""){ ?>
                      <div class="alert alert-success">
                        <script>alert(" <?php echo $mensaje;?>");</script>
                        <a href="carrito/mostrar_carrito.php" class="badge badge-success">Ver carritoCarrito (<?php echo (empty($_SESSION['CARRITO']))?0: count($_SESSION['CARRITO']);?> Referencias agregadas)</a><!-- se utiliza para que tiga la cantidad de los articulos agregados-->
                      </div>
                      <?php  }?>
</div>

<em><h2 align="center" >LUBRICANTES</h2></em>
<p align="justify" class="parrafo">Son muchos los beneficios de usar lubricantes en las relaciones sexuales. Sin embargo, a veces no se utilizan por desconocer cómo pueden resultar de ayuda ante distintas situaciones. Por eso conviene conocer los diferentes usos de los lubricantes y recurrir a ellos siempre que se desee</p>
<br>

<div class="contenedor">
  <aside>
    <div class="menu-vibradores" id="menuv"></div>
    <ul class="lista">
      <li><a href="#" class="sub-menus"> Lubricantes</a></li>
      <li><a href="#" class="sub-menus"> Aceites para Masaje</a></li>
      <li><a href="#" class="sub-menus"> Potenciadores Femeninos</a></li>
      <li><a href="#" class="sub-menus"> Potenciadores Masculinos</a></li>
      <li><a href="#" class="sub-menus"> Retardantes Masculinos</a></li>
    </ul>

  </aside>
  <main>


  <br><br><br>
      <div class="productos">
        <div class="producto">
            
       <?php foreach($lista_producto as $producto){
        
        $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        $inventario = $producto['producto_cantidad']; // Se crea variable inventario para limitar la cantidad de compra que puede realizar el cliente
        ?> 


            <div class="container_v"> <!-- caja de los productos -->
                <div class="card_v"> 
              <a href="../catalogo/catalogo.php?id=<?php echo $txtID; ?>">  
              <img 
                title="<?php echo $producto['producto_nombre'];?>"
                alt="<?php echo $producto['producto_nombre'];?>"
                class="card-img-top" 
                src="../img/<?php echo $producto['producto_imagen'];?>"
                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['producto_descripcion']; ?>"
                height="317px"
                >
                </a>
                <div class="card-body">
              <h4 class="nombre">
                <?php echo $producto['producto_nombre']; ?>
              </h4>
              <h5 class="precio">$<?php echo $producto['producto_precio_venta']; ?></h5>
              <p class="descri"><?php echo $producto['producto_descripcion']; ?></p>
              <p class=""> Cantidad disponible: <br>
                <?php echo $producto['producto_cantidad']; ?>
              </p>
              
              <form action="" method="post"><!-- información para agregar productos al carrito-->
                <input type="hidden" name="id" id="id"
                  value="<?php echo openssl_encrypt($producto['producto_id'], COD, KEY); ?>">
                <input type="hidden" name="nombre" id="nombre"
                  value="<?php echo openssl_encrypt($producto['producto_nombre'], COD, KEY); ?>">
                <input type="hidden" name="precio" id="precio"
                  value="<?php echo openssl_encrypt($producto['producto_precio_venta'], COD, KEY); ?>">
                <?php if ($producto['producto_cantidad'] > 0) { ?>
                  <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo $inventario; ?>">
                  <button class="agregar" name="btnAccion" value="Agregar" type="submit">AGREGAR AL CARRITO</button>
                <?php } else { ?>
                  <p>Producto agotado</p>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>





  </main>

</div>


<?php include("../template/pie_tipos_productos.php"); ?> <!--Corresponde al pie de pagina-->