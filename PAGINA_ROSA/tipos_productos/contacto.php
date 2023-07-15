<?php include("../template/cabecera_tipos_productos.php"); ?><!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<?php

include("../administrador/config/db.php"); //conexion a la base de datos
include("../carrito/carrito.php"); //conexion al archivo de funcionamiento del

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_oferta = 'destacados'"); //busca en la tabla producto solo los productos tipo vibrador 
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<div class="ubicacion">
  <a href="../index.php" class="ubicacion-texto">INICIO /</a>
  <a href="contacto.php" class="ubicacion-texto">CONTACTO</a>
</div>

<h2>CONTACTO</h2>
<div class="contacto">
  <aside>
    <div class="contacto1" id="contacto1"></div>
    <h3>Informacion de contacto</h3>
    <h4> Whatsapp 3168245409</h4>
    <h4> Correo electronico contacto@lujuriasexshop.com.co</h4>
    <h3>Dejanos un mensaje</h3>
    <form action="enviar mensaje">
      <input type="text" class="mensaje-parte1" placeholder="Nombre completo"  required  >
      <br>
      <br>
      <input type="text" class="mensaje-parte1" placeholder="Correo electonico" required>
      <br>
      <br>
      <input type="text" class="mensaje-parte1" placeholder="Asunto" required>
      <br>
      <p>Mensaje</p>
      <input type="text" class="mensaje-parte2"  required>
      <br>
      <br>
      <button type="submit" class="boton-enviar">Enviar</button>
    </form>
  </aside>

  <main>
    <div class="main-cajas">
    <h3 class="titulo-productos-destacados-contacto">Productos destacados</h3>
    <br><br>
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

      
    </div>
  </main>

</div>

<?php include("../template/pie_tipos_productos.php"); ?> <!--Corresponde al pie de pagina-->