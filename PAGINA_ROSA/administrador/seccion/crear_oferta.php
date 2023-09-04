<?php
include("../config/db.php"); 
try {
    // Obtener los datos del formulario
    $oferta_nombre = $_POST['oferta_nombre'];
    $oferta_fecha = $_POST['oferta_fecha'];

    // Preparar la consulta SQL para insertar la nueva categoría
    $sql = "INSERT INTO oferta (oferta_nombre, oferta_fecha) VALUES (:nombre, :fecha)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $oferta_nombre);
    $stmt->bindParam(':fecha', $oferta_fecha);

    // Ejecutar la consulta
    $stmt->execute();

    // Mostrar el mensaje de éxito
    echo "Oferta creada con éxito";

    // Redireccionar a otra página después de unos segundos
    header("Refresh: 1; url=../../administrador\seccion\lista_tipo_oferta.php"); // Cambia 'otra_pagina.php' por la URL que desees

    // Cerrar la conexión
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al crear la oferta: " . $e->getMessage();
}
?>