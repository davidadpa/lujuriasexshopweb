<?php
include("../../administrador\seccion/template-sections\barra-vertical.php");
include("../config/db.php");

try {
    // Realizar la consulta
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tlb_usuario_admin");
    $sentenciaSQL->execute();

    // Obtener los resultados como un arreglo asociativo
    $lista_admin = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

// Función de comparación para ordenar por usuario_admin_id de menor a mayor
function compararPorAdminID($a, $b) {
    return $a['usuario_admin_id'] - $b['usuario_admin_id'];
}

// Ordenar el arreglo $lista_admin utilizando la función de comparación
usort($lista_admin, 'compararPorAdminID');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"]) && $_POST["accion"] == "Borrar") {
        try {
            // Obtener el ID del cliente a borrar
            $admin_id = $_POST["txtID"];

            // Preparar la consulta para eliminar el cliente
            $sentenciaSQL = $conexion->prepare("DELETE FROM tlb_usuario_admin WHERE `usuario-admin_id` = :admin_id");
            $sentenciaSQL->bindParam(":admin_id", $admin_id, PDO::PARAM_INT);

            // Ejecutar la consulta
            $resultado = $sentenciaSQL->execute();

            if ($resultado) {
                // Redireccionar a la página actual para actualizar la lista de clientes
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                echo "Error al intentar borrar el administrador.";
            }
        } catch(PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="../../administrador\css\lista_admin_styles.css">
</head>

<body>
    <div class="contenido_tabla">
        <div class="tabla">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="contenido">
                    <?php foreach($lista_admin as $admin) { ?>
                    <tr>
                        <td><?php echo $admin['usuario_admin_id']; ?></td>
                        <td><?php echo $admin['usuario_admin']; ?></td>
                        <td><?php echo $admin['usuario_admin_nombre']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $admin['usuario_admin_id']; ?>"/>
 
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
