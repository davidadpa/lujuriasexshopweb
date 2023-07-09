<?php include("../template/cabecera_catalogo.php"); ?>

<?php
include("../administrador/config/db.php"); 
// Obtener el ID del producto desde $_GET['id']
$txtID = $_GET['id'];
$sentenciaSQL= $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 


try {

     // Establecer el modo de error de PDO a excepción
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // Tu consulta para obtener el producto específico de la base de datos
     $consulta = "SELECT * FROM tlb_producto WHERE producto_id = :id";
     $sentencia = $conexion->prepare($consulta);
     $sentencia->bindParam(':id', $txtID);
     $sentencia->execute();
 
     // Verificar si se encontró el producto
     if ($sentencia->rowCount() > 0) {
         // Obtener los datos del producto
         $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
 
         // Acceder a los datos del producto
         $txtNombre = $producto['producto_nombre'];
         $txtdescripcion = $producto['producto_descripcion'];
         $txtprecio_venta = $producto['producto_precio_venta'];
         $imagen_producto = $producto['producto_imagen'];
         $imagen_producto_2 = $producto['producto_imagen_2'];
         $imagen_producto_3 = $producto['producto_imagen_3'];
         // ... Otros campos del producto
     } else {
         echo 'No se encontró el producto.';
     }
 } catch (PDOException $e) {
     echo "Error al conectar a la base de datos: " . $e->getMessage();
 }
 
 // Cerrar la conexión a la base de datos
 $conexion = null;

?>
        
		    <main>
			<div class="container-img">
            <img class="primera" src="img/<?php echo $imagen_producto; ?>" alt="Producto" id="main-image">
             <div class="thumbnail-images">
                 <?php foreach ($lista_producto as $producto) { ?>
                    <img src="img/<?php echo $imagen_producto; ?>" alt="Imagen adicional" class="thumbnail" data-image="img/<?php echo $imagen_producto; ?>">  
                      <img src="img/<?php echo $imagen_producto_2; ?>" alt="Imagen adicional" class="thumbnail" data-image="img/<?php echo $imagen_producto_2; ?>">
                      <img src="img/<?php echo $imagen_producto_3; ?>" alt="Imagen adicional" class="thumbnail" data-image="img/<?php echo $imagen_producto_3; ?>">
                  <?php } ?>
             </div>

            
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span><?php  echo '<h2>' . $txtNombre . '</h2>';?> </span>
				</div>
                <span><?php  echo '<h4>Precio: $' . $txtprecio_venta . '</h4>';?> </span>
				<div class="container-details-product">
					

				<div class="container-add-cart">
                    
					<div class="container-quantity">
						<input
							type="number"
							placeholder="1"
							value="1"
							min="1"
							class="input-quantity"
						/>
						<div class="btn-increment-decrement">
							<i class="fa-solid fa-chevron-up" id="increment"></i>
							<i class="fa-solid fa-chevron-down" id="decrement"></i>
						</div>
					</div>
					<button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						Añadir al carrito
					</button>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descripción</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-description">
						<p><?php  echo '<p>' .  $txtdescripcion . '</p>';
?>
						</p>
					</div>
				</div>

				<div class="container-additional-information">
					<div class="title-additional-information">
						<h4>Información adicional</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-additional-information hidden">
						<p>-----------</p>
					</div>
				</div>

				<div class="container-reviews">
					<div class="title-reviews">
						<h4>Reseñas</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-reviews hidden">
						<p>-----------</p>
					</div>
				</div>

				<div class="container-social">
					<span>Compartir</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-solid fa-envelope"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-twitter"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
						<a href="#"><i class="fa-brands fa-pinterest"></i></a>
					</div>
				</div>
		</div>
		    </main>
       
            
		
		

    <script src="../js/catalogo.js"></script>
    <script src="../js/kit.js"></script>
    <script src="../js/img.js"></script>


	<?php include("../template/pie_catalogo.php"); ?>