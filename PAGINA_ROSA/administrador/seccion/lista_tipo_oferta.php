<?php
include("../../administrador\seccion/template-sections\barra-vertical.php"); 
include("../../administrador\seccion\productos.php"); 
?>

<?php
try {
    // Realizar la consulta para obtener los datos
    $sentenciaSQL = $conexion->prepare("SELECT * FROM oferta");
    $sentenciaSQL->execute();
    
    // Obtener los resultados como un arreglo asociativo
    $lista_tipo = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

// Función de comparación para ordenar por oferta_id de menor a mayor
function compararPorOfertaID($a, $b) {
    return $a['oferta_id'] - $b['oferta_id'];
}

// Ordenar el arreglo $lista_tipo utilizando la función de comparación
usort($lista_tipo, 'compararPorOfertaID');

// Verificar si se envió una solicitud de borrado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "Borrar") {
    try {
        // Obtener el ID del registro a borrar
        $oferta_id = $_POST["txtID"];

        // Preparar y ejecutar la consulta para borrar el registro
        $sentenciaBorrar = $conexion->prepare("DELETE FROM oferta WHERE oferta_id = :oferta_id");
        $sentenciaBorrar->bindParam(':oferta_id', $oferta_id, PDO::PARAM_INT);
        $resultado = $sentenciaBorrar->execute();

        if ($resultado) {
            // Redireccionar a la página actual para actualizar la lista de ofertas
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error al intentar borrar la oferta.";
        }
    } catch(PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>

<head>
    <link rel="stylesheet" href="../../administrador/css/tipos-style.css">
</head>
<body>
    <div class="contenido_tabla">
        <div class="tabla">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="contenido">
                    <?php foreach($lista_tipo as $tipo) { ?>
                    <tr>
                        <td><?php echo $tipo['oferta_id']; ?></td>
                        <td><?php echo $tipo['oferta_nombre']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($tipo['oferta_fecha'])); ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $tipo['oferta_id']; ?>"/>
                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>






