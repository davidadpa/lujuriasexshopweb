<?php
// Include the header file
include("../template/cabecera_catalogo.php");

// Check if the 'id' parameter is set in $_GET
if (isset($_GET['id'])) {
	// Include the database configuration file and the cart functionalities
	include("../administrador/config/db.php");
	include("../carrito/carrito.php");

	try {
		// Set PDO error mode to exception
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Get the product ID from $_GET['id']
		$txtID = $_GET['id'];

		// Prepare and execute the SQL query to fetch the specific product from the database
		$consulta = "SELECT * FROM tlb_producto WHERE producto_id = :id";
		$sentencia = $conexion->prepare($consulta);
		$sentencia->bindParam(':id', $txtID);
		$sentencia->execute();

		// Check if the product is found
		if ($sentencia->rowCount() > 0) {
			// Fetch the product data
			$producto = $sentencia->fetch(PDO::FETCH_ASSOC);

			// Extract product data
			$txtNombre = $producto['producto_nombre'];
			$txtdescripcion = $producto['producto_descripcion'];
			$txtprecio_venta = $producto['producto_precio_venta'];
			$imagen_producto = $producto['producto_imagen'];
			$imagen_producto_2 = $producto['producto_imagen_2'];
			$imagen_producto_3 = $producto['producto_imagen_3'];

			// ... Other fields of the product

		} else {
			echo 'No se encontró el producto.';
			exit; // Terminate the script if the product is not found
		}
	} catch (PDOException $e) {
		echo "Error al conectar a la base de datos: " . $e->getMessage();
		exit; // Terminate the script if there's a database error
	}

	// Close the database connection
	$conexion = null;
} else {
	echo 'No se proporcionó un ID de producto válido.';
	exit; // Terminate the script if 'id' parameter is not provided in $_GET
}
?>

<head>
	<link rel="stylesheet" href="../CSS/cata-style.css">
</head>

<div class="caja">
	<div class="container">
		<br>
		<?php if (!empty($mensaje)) { ?>
			<div class="alert alert-success">
				<?php echo $mensaje; ?>
				<a href="../carrito/mostrar_carrito.php" class="badge badge-success">Ver carrito (
					<?php echo (!empty($_SESSION['CARRITO'])) ? count($_SESSION['CARRITO']) : 0; ?> Referencias agregadas)
				</a>
			</div>
		<?php } ?>
	</div>

	<main>
		<div class="container-img">
			<img class="primera" src="../img/<?php echo $imagen_producto; ?>" alt="Producto" id="main-image">
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

<script src="../js/kit.js"></script>
<script src="../js/img.js"></script>

<?php
// Include the footer file
include("../template/pie_catalogo.php");
?>