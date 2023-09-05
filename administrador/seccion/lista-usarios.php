<?php include("../../administrador\seccion/template-sections\barra-vertical.php"); 
include("../config/db.php"); 
?>

<?php
try {
    // Realizar la consulta
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tlb_clientes");
    $sentenciaSQL->execute();
    
    // Obtener los resultados como un arreglo asociativo
    $lista_clientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

// Función de comparación para ordenar por cliente_id de menor a mayor
function compararPorClienteID($a, $b) {
    return $a['cliente_id'] - $b['cliente_id'];
}

// Ordenar el arreglo $lista_clientes utilizando la función de comparación
usort($lista_clientes, 'compararPorClienteID');


?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"]) && $_POST["accion"] == "Borrar") {
        try {
            // Obtener el ID del cliente a borrar
            $cliente_id = $_POST["txtID"];
            
            // Preparar la consulta para eliminar el cliente
            $sentenciaSQL = $conexion->prepare("DELETE FROM tlb_clientes WHERE cliente_id = :cliente_id");
            $sentenciaSQL->bindParam(":cliente_id", $cliente_id, PDO::PARAM_INT);
            
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
    <link rel="stylesheet" href="../../administrador\css\lista_usuarios_style.css">
</head>

<body>
    <div class="contenido_tabla">
        <div class="tabla">
            
        <table class="table-custom">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Acciones</th>
                </tr>
            </thead>

            
            <tbody class="contenido">

                <?php foreach($lista_clientes as $usuario) { ?>
                <tr>
                <td><?php echo $usuario['cliente_id']; ?></td>
                <td><?php echo $usuario['cliente_nombre']; ?></td>
                <td><?php echo $usuario['cliente_correo']; ?></td>
                <td><?php echo $usuario['cliente_telefono']; ?></td>
                <td><?php echo $usuario['cliente_usuario']; ?></td>
                <td>
                    <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $usuario['cliente_id']; ?>"/>


                    <input type="submit" name="accion" value="Modificar" class="btn btn-primary"/>
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