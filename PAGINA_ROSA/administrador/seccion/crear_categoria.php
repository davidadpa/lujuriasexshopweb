<?php
include("../config/db.php"); 
try {
    // Obtener los datos del formulario
    $nombre_categoria = $_POST['nombre_categoria'];
    $ubicacion_categoria = $_POST['ubicacion_categoria'];

    // Preparar la consulta SQL para insertar la nueva categoría
    $sql = "INSERT INTO categoria (categoria_nombre, categoria_ubicacion) VALUES (:nombre, :ubicacion)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre_categoria);
    $stmt->bindParam(':ubicacion', $ubicacion_categoria);

    // Ejecutar la consulta
    $stmt->execute();

    // Mostrar el mensaje de éxito
    echo "Categoría creada con éxito";

    // Redireccionar a otra página después de unos segundos
    header("Refresh: 1; url=../../administrador\seccion\Lista_tipo-producto.php"); // Cambia 'otra_pagina.php' por la URL que desees

    // Cerrar la conexión
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al crear la categoría: " . $e->getMessage();
}
?>
