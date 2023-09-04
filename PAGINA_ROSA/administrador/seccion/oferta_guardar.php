<?php include("../../administrador\seccion/template-sections\barra-vertical.php") ?>
<?php include("../../administrador\seccion\productos.php");
?>


<head>
    <link rel="stylesheet" href="../../administrador\css\style-crear.css">
</head>

<body>
  <div class="contenido_tabla">
        <div class="tabla">
        <h2>Crear Oferta</h2>
    <form method="post" action="crear_oferta.php">
        <label for="oferta_nombre">Nombre de la Oferta:</label>
        <input type="text" name="oferta_nombre" id="oferta_nombre" required>
        <br>
        <label for="oferta_fecha">Fecha de creacion:</label>
        <input type="date" name="oferta_fecha" id="oferta_fecha" required>
        <br>
        <input type="submit" value="Crear Oferta">
    </form>

 
</body>