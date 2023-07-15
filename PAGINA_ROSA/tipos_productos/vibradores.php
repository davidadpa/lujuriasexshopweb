<?php include("../template/cabecera_tipos_productos.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<?php

include("../administrador/config/db.php"); //conexion a la base de datos
include("../carrito/carrito.php"); //conexion al archivo de funcionamiento del

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_tipo = 'vibradores'"); //busca en la tabla producto solo los productos tipo vibrador 
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>


<div class="ubicacion">
      <a href="../index.php" class="ubicacion-texto">INICIO /</a>
      <a href="vibradores.php" class="ubicacion-texto">VIBRADORES</a>
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

   <h2 align="center">VIBRADORES</h2>
   <p align="justify" class="parrafo">Los vibradores son Juguetes Sexuales que pueden ser usados por una sola persona o por parejas. Debido a su motor generan movimientos de vibración que te permitirán estimular la zona erógena deseada y te ayudarán a llegar al orgasmo más fácilmente. En nuestra colección de juguetes sexuales encontrarás los mejores vibradores y juguetes para mujeres, hombres y parejas a los mejores precios.</p>

    <div class="contenedor">
      <aside>
        <div class="menu-vibradores" id="menuv"></div>
        <ul class="lista">
          <li><a href="#" class="sub-menus"> Masajeadores</a></li>
          <li><a href="#" class="sub-menus"> Balas vibradoras</a></li>
          <li><a href="#" class="sub-menus"> Vibradores para el clítoris</a></li>
          <li><a href="#" class="sub-menus"> Succionadores para el clítoris</a></li>
          <li><a href="#" class="sub-menus"> Vibradores discretos</a></li>
          <li><a href="#" class="sub-menus"> Vibradores para la mano y lengua</a></li>
          <li><a href="#" class="sub-menus"> Estimuladores de punto-G</a></li>
          <li><a href="#" class="sub-menus"> Vibradores manos libres</a></li>
          <li><a href="#" class="sub-menus"> Vibradores de lujo</a></li>
          <li><a href="#" class="sub-menus"> Vibradores de bolsillo</a></li>
          <li><a href="#" class="sub-menus"> Vibradores conejo o mariposa</a></li>
          <li><a href="#" class="sub-menus"> Tradicionales</a></li>
          <li><a href="#" class="sub-menus"> KITS</a></li>
        </ul>
        <img src="../img/3 vibradores.jpg" alt="3 vibradores" class="imagen-debajo-sub-menus">
        <img src="../img/varios vibradores.jpg" alt="3 vibradores" class="imagen-debajo-sub-menus">
        <img src="../img/4-vibrador.jpg" alt="3 vibradores" class="imagen-debajo-sub-menus">

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




    <?php include("../template/pie_tipos_productos.php"); ?>  <!--Corresponde al pie de pagina-->