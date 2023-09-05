<?php
require('fpdf.php');
include("../administrador/config/db.php");

$id_venta = 0;

try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consulta_id_venta = "SELECT MAX(detalle_idventa) AS max_id FROM tlb_detalle_ventas";
    $resultado = $conexion->query($consulta_id_venta);
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    $id_venta = $fila['max_id'];
} catch (PDOException $e) {
    echo "Error al obtener el último valor de detalle_idventa: " . $e->getMessage();
    die();
}

try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sentenciaSQL = $conexion->prepare("SELECT dv.detalle_venta_id, dv.detalle_cantidad, dv.detalle_precio_unitario, v.venta_correo 
                                       FROM tlb_detalle_ventas as dv 
                                       INNER JOIN tlb_ventas as v ON v.venta_id = dv.detalle_idventa 
                                       WHERE dv.detalle_idventa = :id_venta");
    $sentenciaSQL->bindParam(":id_venta", $id_venta, PDO::PARAM_INT);
    $sentenciaSQL->execute();

    $datos_detalle_ventas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la conexión o consulta: " . $e->getMessage();
    die();
}

// Obtener el nombre del cliente basado en el correo electrónico
try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sentenciaCliente = $conexion->prepare("SELECT cliente_nombre FROM tlb_clientes WHERE cliente_correo = :correo");
    $sentenciaCliente->bindParam(":correo", $datos_detalle_ventas[0]['venta_correo'], PDO::PARAM_STR);
    $sentenciaCliente->execute();

    $cliente_nombre = $sentenciaCliente->fetchColumn();
} catch (PDOException $e) {
    echo "Error en la conexión o consulta para obtener el nombre del cliente: " . $e->getMessage();
    die();
}

// Crear una clase personalizada para la factura que extiende FPDF
class FacturaPDF extends FPDF
{
    function Header()
    {
        // Encabezado de la factura
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Factura de Venta', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        // Pie de página de la factura
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Gracias por su compra', 0, 0, 'C');
    }

    function CeldaFactura($texto)
    {
        // Celda personalizada para la factura
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(45, 10, $texto, 0, 0, 'L');
    }
}

// Crear la factura en PDF
$pdf = new FacturaPDF();
$pdf->AddPage();

// Datos de la factura
$pdf->CeldaFactura('ID Venta:');
$pdf->Cell(0, 10, $id_venta, 0, 1, 'L');

$pdf->CeldaFactura('Correo del Cliente:');
$pdf->Cell(0, 10, $datos_detalle_ventas[0]['venta_correo'], 0, 1, 'L');

// Agregar el nombre del cliente al PDF
$pdf->CeldaFactura('Nombre del Cliente:');
$pdf->Cell(0, 10, $cliente_nombre, 0, 1, 'L');

// Tabla de detalle de la venta
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Detalle de la Venta', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 10, 'ID Producto', 1, 0, 'C');
$pdf->Cell(40, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(50, 10, 'Precio Unitario', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$total_venta = 0;
foreach ($datos_detalle_ventas as $fila) {
    $total = $fila['detalle_cantidad'] * $fila['detalle_precio_unitario'];
    $pdf->Cell(60, 10, $fila['detalle_venta_id'], 1, 0, 'C');
    $pdf->Cell(40, 10, $fila['detalle_cantidad'], 1, 0, 'C');
    $pdf->Cell(50, 10, '$' . number_format($fila['detalle_precio_unitario'], 2), 1, 0, 'C');
    $pdf->Cell(40, 10, '$' . number_format($total, 2), 1, 1, 'C');
    $total_venta += $total;
}

// Total de la venta
$pdf->Cell(150, 10, 'Total de la Venta', 1, 0, 'R');
$pdf->Cell(40, 10, '$' . number_format($total_venta, 2), 1, 1, 'C');

// Cerrar la conexión a la base de datos
$conexion = null;

// Mostrar la factura generada en el navegador
$pdf->Output('factura.pdf', 'I');
?>