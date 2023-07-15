<?php include("../template/cabecera_tipos_productos.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->



<?php

include("../administrador/config/db.php"); //conexion a la base de datos
include("../carrito/carrito.php"); //conexion al archivo de funcionamiento del

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_tipo = 'jugetes_anales'"); //busca en la tabla producto solo los productos tipo vibrador 
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>


<div class="ubicacion">

  <a href="../index.php" class="ubicacion-texto">INICIO /</a>
  <a href="jugetes_anales.php" class="ubicacion-texto">JUGETES ANALES</a>

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


<em><h2 align="center" >JUGETES ANALES</h2></em>
<p align="justify" class="parrafo">Descubre las delicias ocultas del sexo anal con juguetes anales de todos los tamaños y formas. Toma tus primeros pasos con herramientas anales para principiantes antes de proceder con el juego avanzado de bolas anales, consoladores anales y juguetes para estimular la próstata.</p>
<br>

<div class="contenedor">
  <aside>
    <div class="menu-vibradores" id="menuv"></div>
      <ul class="lista">
        <li><a href="#" class="sub-menus"> Bolas anales</a></li>
        <li><a href="#" class="sub-menus"> Enemas y duchas anales</a></li>
        <li><a href="#" class="sub-menus"> Estimuladores de prostata</a></li>
        <li><a href="#" class="sub-menus"> Plugs anales</a></li>
        <li><a href="#" class="sub-menus"> Vibradores anales</a></li>
      </ul>

  </aside>
  <main>

  <br><br><br>
      <div class="productos">
        <div class="producto">
            
       <?php foreach($lista_producto as $producto){
        
        $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        
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
                
                  <h4 clss="nombre"><?php echo $producto['producto_nombre'];?></h4>
                  <h5 class="precio">$<?php echo $producto['producto_precio_venta']; ?></h5>
                  <p class="descri"><?php echo $producto['producto_descripcion']; ?></p>
                  
                  <form action="" method="post"><!-- informacion para agregar productos al carrito--> 

                      <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['producto_id'],COD,KEY);?>"> 
                      <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['producto_nombre'],COD,KEY);?>">
                      <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['producto_precio_venta'],COD,KEY);?>">
                      <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                      <button class="agregar" name="btnAccion" value="Agregar" type="submit">AGREGAR AL CARRITO</button>
                      
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