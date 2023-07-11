
<?php include("template/cabecera_index.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<?php
require("config/config.php");
include("administrador/config/db.php"); 
include("carrito/carrito.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

                    <div class="container">
                      <br>

                      <?php if($mensaje!=""){ ?>
                      <div class="alert alert-success">
                        <?php echo $mensaje;?>
                        <a href="carrito/mostrar_carrito.php" class="badge badge-success">Ver carritoCarrito (<?php echo (empty($_SESSION['CARRITO']))?0: count($_SESSION['CARRITO']);?> Referencias agregadas)</a><!-- se utiliza para que tiga la cantidad de los articulos agregados-->
                      </div>
                      <?php  }?>
                    </div>


    <main>
      <div class="cajas">
        <div class="caja">
          <img src="img/paquete discreto.jpg" alt="paquete discreto" class="caja-img">
        </div>
        <div class="caja">
          <img src="img/despacho agil.png" alt="despacho agil" class="caja-img">
        </div>
        <div class="caja">
          <img src="img/envios a todo el pais.png" alt="envio a todo el pais" class="caja-img">
        </div>
        <div class="caja">
          <img src="img/medio de pago.png" alt="medio de pago" class="caja-img">
        </div>
      </div>

      <div class="slider"> <!-- corresponde a las imagenes en movimiento-->
        <ul>
          <li><img src="img/IMAGEN VULVA.jpg" alt="Promociones" ></li>
          <li><img src="img/slider lenceria.jpg" alt="Promociones" ></li>
          <li><img src="img/slider vibradores.jpg" alt="Promociones"></li>
          <li><img src="img/slider LUBRICANTES-647x608.jpg" alt="Promociones"></li>
        </ul>
      </div>

      <h2>LO MAS VENDIDO</h2> <!-- se deja el espacio para los 8 productos mas vendidos-->
    



      <div class="container">
        <div class="row">
            
       <?php foreach($lista_producto as $producto){
        
        $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        
        ?> 


        <div class="col-3">
              <div class="card">
              <a href="catalogo/catalogo.php?id=<?php echo $txtID; ?>">  
              <img 
                title="<?php echo $producto['producto_nombre'];?>"
                alt="<?php echo $producto['producto_nombre'];?>"
                class="card-img-top" 
                src="img/<?php echo $producto['producto_imagen'];?>"
                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['producto_descripcion']; ?>"
                height="317px"
                >
                </a>
                <div class="card-body">
                
                  <span><?php echo $producto['producto_nombre'];?></span>
                  <h5 class="card-title">$<?php echo $producto['producto_precio_venta']; ?></h5>
                  <p class="card-text"><?php echo $producto['producto_descripcion']; ?></p>
                  
                  <form action="" method="post">

                      <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['producto_id'],COD,KEY);?>"> 
                      <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['producto_nombre'],COD,KEY);?>">
                      <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['producto_precio_venta'],COD,KEY);?>">
                      <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                      <button class="ver-mas" name="btnAccion" value="Agregar" type="submit">AGREGAR AL CARRITO</button>
                    </form>

              
             
                </div>
              </div>
            </div>

            <?php } ?>

        </div>
       
      </div>

  
  </main>

      <br>
      <div >
        <h2>NUESTRO PRODUCTOS</h2> <!--Es el mismo menu principal pero en forma de imagenes-->
        <div class="menus-iconos">
          <div class="menus-iconos-bloque1">
            <a href="tipos_productos/vibradores.php"><img src="img/VIBRADORES.jpg" alt="menu vibradores" class="menus-iconos-bloque1-img"></a>
            <a href="tipos_productos/consoladores.php"><img src="img/CONSOLADORES.jpg" alt="menu consoladores" class="menus-iconos-bloque1-img"></a>
            <a href="tipos_productos/jugetes_anales.php"><img src="img/JUGETES ANALES.jpg" alt="menu jugetes anales" class="menus-iconos-bloque1-img"> </a>
            <a href="tipos_productos/hombres.php"><img src="img/HOMBRES.jpg" alt="menu hombres" class="menus-iconos-bloque1-img"></a>
          </div>
          <br>
          <div class="menus-iconos-bloque2">
            <a href="tipos_productos/lubricantes.php"><img src="img/lubricante-intimo-primer-plano-sexual-comodo-sobre-fondo-color_441923-229.jpg" alt="menu lubricantes" class="menus-iconos-bloque2-img"></a>
            <a href="tipos_productos/lenceria.php"><img src="img/LENCERIA.jpg" alt="menu lenceria" class="menus-iconos-bloque2-img"></a>
            <a href="tipos_productos/sado.php"><img src="img/SADO.jpg" alt="menu sado y fetiche" class="menus-iconos-bloque2-img"></a>
            <a href="tipos_productos/extras.php"><img src="img/EXTRAS.jpg" alt="menu extras" class="menus-iconos-bloque2-img"></a>
          </div>
        </div>
      </div>
    
 

    <script src="js/script_modal.js"></script>
    <script>
      $(function () {
        $('[data-toggle="popover"]').popover()
      });

    </script>



    
<?php include("template/pie_index.php"); ?> <!--Corresponde al pie de pagina-->