
<?php include("template/cabecera.php"); ?> <!--corresponde a todo el encabezado de las paginas web desde el logo hasta los menus-->

<?php
include("administrador/config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

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
      
      <?php foreach($lista_producto as $producto){?>

        <div>  
          <div class="col-md-3" >
            <div class="card"> 
              <img class="card-img-top" src="img/<?php echo $producto['producto_imagen'];?>" alt="">
              <div class="card-body">
                <h4 class="card-title"> <?php echo $producto['producto_nombre']?></h4>
                <h4> <?php echo $producto['producto_precio_venta']?></h4>
                <a name="" id="" class="btn btn-primary" href="" role="button"> ver mas </a>
              </div>
            </div>
            <br>
          </div>
       <?php }?>
        </div>
      
      
      
      <br>
      <h2>NUESTRO PRODUCTOS</h2> <!--Es el mismo menu principal pero en forma de imagenes-->
      <div class="menus-iconos">
        <div class="menus-iconos-bloque1">
          <a href="vibradores.php"><img src="img/VIBRADORES.jpg" alt="menu vibradores" class="menus-iconos-bloque1-img"></a>
          <a href="consoladores.php"><img src="img/CONSOLADORES.jpg" alt="menu consoladores" class="menus-iconos-bloque1-img"></a>
          <a href="jugetes_anales.php"><img src="img/JUGETES ANALES.jpg" alt="menu jugetes anales" class="menus-iconos-bloque1-img"> </a>
          <a href="hombres.php"><img src="img/HOMBRES.jpg" alt="menu hombres" class="menus-iconos-bloque1-img"></a>
        </div>
        <br>
        <div class="menus-iconos-bloque2">
          <a href="lubricantes.php"><img src="img/lubricante-intimo-primer-plano-sexual-comodo-sobre-fondo-color_441923-229.jpg" alt="menu lubricantes" class="menus-iconos-bloque2-img"></a>
          <a href="lenceria.php"><img src="img/LENCERIA.jpg" alt="menu lenceria" class="menus-iconos-bloque2-img"></a>
          <a href="sado.php"><img src="img/SADO.jpg" alt="menu sado y fetiche" class="menus-iconos-bloque2-img"></a>
          <a href="extras.php"><img src="img/EXTRAS.jpg" alt="menu extras" class="menus-iconos-bloque2-img"></a>
        </div>
      </div>
    </main>

<?php include("template/pie.php"); ?> <!--Corresponde al pie de pagina-->