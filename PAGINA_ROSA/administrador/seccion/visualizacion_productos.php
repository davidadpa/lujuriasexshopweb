

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
<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>
<?php
include("../config/db.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<br>
<head>
  <link rel="stylesheet" href="../../administrador\css\view-style.css">
</head>
<div class="productos">
        <div class="producto">
            
       <?php foreach($lista_producto as $producto){
        
        $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
        
        ?> 


            <div class="container_v"> <!-- caja de los productos -->
                <div class="card_v"> 
              <a href="../../administrador\seccion\view_producto.php?id=<?php echo $txtID; ?>">  
              <img 
                title="<?php echo $producto['producto_nombre'];?>"
                alt="<?php echo $producto['producto_nombre'];?>"
                class="card-img-top" 
                src="../../img/<?php echo $producto['producto_imagen'];?>"
                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['producto_descripcion']; ?>"
                height="317px"
                >
                </a>
                <div class="card-body">
                  <h5 class="id">ID:<?php echo $producto['producto_id']; ?></h5><br>
                  <h4 class="nombre"><?php echo $producto['producto_nombre'];?></h4>
                  <h5 class="precom">Compra:<br>$<?php echo $producto['producto_precio_compra']; ?></h5>
                  <h5 class="precio">Venta:<br>$<?php echo $producto['producto_precio_venta']; ?></h5><br>

              
             
                </div>
              </div>
            </div>

            <?php } ?>

        </div>
       
      </div>

  







<?php include("../template/pie.php") ?>