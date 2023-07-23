<?php
require('fpdf.php');
include("../administrador\config\db.php");

// Supongamos que tenemos el identificador único de la venta
$id_venta = 1; // Aquí deberías obtener el ID de la venta después de realizarla

try {
  
    // Configurar el modo de error para que PDO lance excepciones en caso de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realizar la consulta para obtener los datos de la tabla tlb_detalle_ventas para la venta en cuestión
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tlb_detalle_ventas WHERE detalle_venta_id = :detalle_venta_id");
    $sentenciaSQL->bindParam(":detalle_venta_id", $id_venta, PDO::PARAM_INT);
    $sentenciaSQL->execute();

    // Obtener los resultados como un arreglo asociativo
    $datos_detalle_ventas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    // Verificar que haya datos para generar la factura
    if (count($datos_detalle_ventas) === 0) {
        die("No hay datos para generar la factura.");
    }
} catch (PDOException $e) {
    // Manejo de errores en caso de que falle la conexión o la consulta
    echo "Error en la conexión o consulta: " . $e->getMessage();
    die();
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Factura - Detalle de Ventas', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(30, 10, 'ID Detalle Venta', 1);
$pdf->Cell(30, 10, 'ID Venta', 1);
$pdf->Cell(30, 10, 'ID Producto', 1);
$pdf->Cell(30, 10, 'Cantidad', 1);
$pdf->Cell(40, 10, 'Precio Unitario', 1);
$pdf->Cell(30, 10, 'Total', 1);

$pdf->SetFont('Arial', '', 12);

foreach ($datos_detalle_ventas as $detalle_venta) {
    $pdf->Ln();
    $pdf->Cell(30, 10, $detalle_venta['detalle_venta_id'], 1);
    $pdf->Cell(30, 10, $detalle_venta['detalle_idventa'], 1);
    $pdf->Cell(30, 10, $detalle_venta['detalle_id_producto'], 1);
    $pdf->Cell(30, 10, $detalle_venta['detalle_cantidad'], 1);
    $pdf->Cell(40, 10, '$' . number_format($detalle_venta['precio_unitario'], 2), 1);
    $pdf->Cell(30, 10, '$' . number_format($detalle_venta['total'], 2), 1);
}

$pdf->Output();
