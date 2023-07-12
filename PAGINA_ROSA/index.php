
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
                        <br>
<head>
  <link rel="stylesheet" href="CSS\style.css">
  <link rel="stylesheet" href="CSS\style-productos_masvendidos.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
    <main>
      <div class="Titulo">
        <h2>Nuestros Productos</h2>
      </div>
      <div class="productos">
        <div class="producto">
            
       <?php foreach($lista_producto as $producto){
        
        $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        
        ?> 


            <div class="container_v">
                <div class="card_v"> 
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
                
                  <h4 clss="nombre"><?php echo $producto['producto_nombre'];?></h4>
                  <h5 class="precio">$<?php echo $producto['producto_precio_venta']; ?></h5>
                  <p class="descri"><?php echo $producto['producto_descripcion']; ?></p>
                  
                  <form action="" method="post">

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

  
  
    
 

    <script src="js/script_modal.js"></script>
    <script>
      $(function () {
        $('[data-toggle="popover"]').popover()
      });

    </script>



    
<?php include("template/pie_index.php"); ?> <!--Corresponde al pie de pagina-->