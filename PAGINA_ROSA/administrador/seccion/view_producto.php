 
<?php
include("../../administrador\seccion/template-sections\barra-vertical.php");
include("../../administrador\seccion\productos.php");

// Obtener el ID del producto desde $_GET['id']
$txtID = $_GET['id'];
$sentenciaSQL = $conexion->prepare("SELECT * FROM tlb_producto"); //CREA LISTA DE PRODUCTOS DESDE LA BASE DE DATOS
$sentenciaSQL->execute();
$lista_producto = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


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

<head>
	<link rel="stylesheet" href="../../administrador\css\style-producto.css">
</head>
<div class="contenido_tabla">
        <div class="tabla">
	
		<div class="container">
		<br>
		<?php if (!empty($mensaje)) { ?>
			<div class="alert alert-success">
				<?php echo $mensaje; ?>
				<a href="../../carrito/mostrar_carrito.php" class="badge badge-success">Ver carrito (
					<?php echo (!empty($_SESSION['CARRITO'])) ? count($_SESSION['CARRITO']) : 0; ?> Referencias agregadas)
				</a>
			</div>
		<?php } ?>
	</div>

	<main>
		<div class="container-img">
			<img class="primera" src="../../img/<?php echo $imagen_producto; ?>" alt="Producto" id="main-image">
		</div>

		<div class="container-info-product">
			<div class="container-price">
				<span>
					<h1>
						<?php echo $txtNombre; ?>
					</h1>
				</span>
			</div>

			<div class="container-description">
				<div class="title-description">
					<h3>Descripción</h3>
					<i class="fa-solid fa-chevron-down"></i>
				</div>
				<div class="text-description">
					<p>
					<h4>
						<?php echo $txtdescripcion; ?>
					</h4>
					</p>
				</div>
			</div>

			<span>
				<h4>Precio: $
					<?php echo $txtprecio_venta; ?>
				</h4>
				<br>
				 <p class="descri"> Cantidad disponible:
                <?php echo $producto['producto_cantidad']; ?>
              </p>
			</span>

			<div class="container-add-cart">
				<form action="" method="post">
					<!-- Use this form to add the product information to the shopping cart -->
					<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($txtID, COD, KEY); ?>">
					<input type="hidden" name="nombre" id="nombre"
						value="<?php echo openssl_encrypt($txtNombre, COD, KEY); ?>">
					<input type="hidden" name="precio" id="precio"
						value="<?php echo openssl_encrypt($txtprecio_venta, COD, KEY); ?>">
					<input type="hidden" name="cantidad" id="cantidad"
						value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
					<?php if ($producto['producto_cantidad'] > 0) { ?>
						<input type="number" name="cantidad" id="cantidad" value="1" min="1"
							max="<?php echo $producto['producto_cantidad']; ?>">
						<button class="agregar" name="btnAccion" value="Agregar" type="submit">AGREGAR AL CARRITO</button>
					<?php } else { ?>
						<p>Producto agotado</p>
					<?php } ?>
				</form>
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
</div>
</div>


<script src="../../js/kit.js"></script>
<script src="../../js/img.js"></script>
