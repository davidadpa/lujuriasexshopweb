<?php include("../../administrador\seccion/template-sections\barra-vertical.php"); 
include("../../administrador\seccion\productos.php"); 
?>

<?php
try {
    // Realizar la consulta
    $sentenciaSQL = $conexion->prepare("SELECT * FROM categoria");
    $sentenciaSQL->execute();
    
    // Obtener los resultados como un arreglo asociativo
    $lista_tipo = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

// Función de comparación para ordenar por cliente_id de menor a mayor
function compararPorClienteID($a, $b) {
    return $a['categoria_id'] - $b['categoria_id'];
}

// Ordenar el arreglo $lista_clientes utilizando la función de comparación
usort($lista_tipo, 'compararPorClienteID');


?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"]) && $_POST["accion"] == "Borrar") {
        try {
            // Ejecutar la consulta
            $resultado = $sentenciaSQL->execute();
            
            if ($resultado) {
                // Redireccionar a la página actual para actualizar la lista de clientes
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                echo "Error al intentar borrar el cliente.";
            }
        } catch(PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}
?>




<head>
    <link rel="stylesheet" href="../../administrador\css\tipos-style.css">
</head>

<body>
    <div class="contenido_tabla">
        <div class="tabla">
            
        <table class="table-custom">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>Acciones</th>
                </tr>
            </thead>

            
            <tbody class="contenido">

                <?php foreach($lista_tipo as $tipo) { ?>
                <tr>
                <td><?php echo $tipo['categoria_id']; ?></td>
                <td><?php echo $tipo['categoria_nombre']; ?></td>
                <td><?php echo $tipo['categoria_ubicacion']; ?></td>
                <td>
                    <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $tipo['categoria_id']; ?>"/>
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
                </div>
    </div>
</body>