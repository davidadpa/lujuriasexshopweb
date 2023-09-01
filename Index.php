<?php
include("template/cabecera_index.php");

require("config/config.php");
include("administrador/config/db.php");
include("carrito/carrito.php");

// Verificar si hay un mensaje y mostrarlo en caso de que exista
$mensaje = ""; // Se define $mensaje para evitar errores si no está definido en otra parte del código.
if (isset($_SESSION['mensaje'])) {
  $mensaje = $_SESSION['mensaje'];
  unset($_SESSION['mensaje']); // Eliminar el mensaje para que no se muestre nuevamente en otras páginas.
}

// Consulta para obtener los productos más vendidos
$sentenciaSQL = $conexion->prepare("SELECT * FROM tlb_producto WHERE producto_oferta = 'lo_mas_vendido'");
$sentenciaSQL->execute();
$lista_producto = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
  <br>
  <?php if (!empty($mensaje)) { ?>
    <div class="alert alert-success">
      <script>alert("<?php echo $mensaje; ?>");</script>
      <a href="carrito/mostrar_carrito.php" class="badge badge-success">Ver carrito (
        <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?> Referencias agregadas)
      </a>
    </div>
  <?php } ?>
</div>
<br>

<head>
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/style-productos_masvendidos.css">
  <!-- Se incluye la librería jQuery y el script de Bootstrap para que el popover funcione -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</head>

<main>
  <div class="Titulo">
    <h2>Los más vendidos</h2>
  </div>
  <div class="productos">
    <div class="producto">
      <?php foreach ($lista_producto as $producto) {
         $inventario = $producto['producto_cantidad']; // Se crea variable inventario para limitar la cantidad de compra que puede realizar el cliente
         $txtID = $producto['producto_id']; // Obtener el ID del producto dentro del bucle
      ?>
        <div class="container_v">
          <div class="card_v">
            <a href="catalogo/catalogo.php?id=<?php echo $txtID; ?>">
              <img title="<?php echo $producto['producto_nombre']; ?>" alt="<?php echo $producto['producto_nombre']; ?>"
                class="card-img-top" src="img/<?php echo $producto['producto_imagen']; ?>" data-toggle="popover"
                data-trigger="hover" data-content="<?php echo $producto['producto_descripcion']; ?>" height="317px">
            </a>
            <div class="card-body">
              <h4 class="nombre">
                <?php echo $producto['producto_nombre']; ?>
              </h4>
              <h5 class="precio">$<?php echo $producto['producto_precio_venta']; ?></h5>
              <p class="descri"><?php echo $producto['producto_descripcion']; ?></p>
              <p class=""> Cantidad disponible: <br>
                <?php echo $producto['producto_cantidad']; ?>
              </p>

              <form action="" method="post"><!-- información para agregar productos al carrito-->
                <input type="hidden" name="id" id="id"
                  value="<?php echo openssl_encrypt($producto['producto_id'], COD, KEY); ?>">
                <input type="hidden" name="nombre" id="nombre"
                  value="<?php echo openssl_encrypt($producto['producto_nombre'], COD, KEY); ?>">
                <input type="hidden" name="precio" id="precio"
                  value="<?php echo openssl_encrypt($producto['producto_precio_venta'], COD, KEY); ?>">
                <?php if ($producto['producto_cantidad'] > 0) { ?>
                  <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo $inventario; ?>">
                  <button class="agregar" name="btnAccion" value="Agregar" type="submit">AGREGAR AL CARRITO</button>
                <?php } else { ?>
                  <p>Producto agotado</p>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</main>

<script>
  // Actualización de la inicialización del popover
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
</script>

<?php include("template/pie_index.php"); ?>
