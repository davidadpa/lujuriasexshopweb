<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>
<?php include("../../administrador\seccion\productos.php");
?>


<head>
    <link rel="stylesheet" href="../../administrador\css\style-crear.css">
</head>

<body>
  <div class="contenido_tabla">
        <div class="tabla">
        <h2>Crear Categoría</h2>
    <form method="post" action="crear_categoria.php">
        <label for="nombre_categoria">Nombre de la Categoría:</label>
        <input type="text" name="nombre_categoria" id="nombre_categoria" required>
        <br>
        <label for="ubicacion_categoria">Ubicación de la Categoría:</label>
        <input type="text" name="ubicacion_categoria" id="ubicacion_categoria" required>
        <br>
        <input type="submit" value="Crear Categoría">
    </form>

 
</body>