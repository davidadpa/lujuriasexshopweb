<?php
require('fpdf.php');

// Configurar la conexión a la base de datos
include ("../administrador\config\db.php")

// Obtener datos de la factura desde la base de datos (reemplaza con tu consulta SQL real)
$sql = "SELECT * FROM tlb_detalle_ventas";
$resultado = $conn->query($sql);

$pdf = new FPDF('P', 'mm', array(80, 150));
$pdf->AddPage();

// El resto del código sigue siendo el mismo hasta la sección "PRODUCTOS"

// PRODUCTOS
$pdf->SetFont('Helvetica', '', 7);

// Recorrer los datos obtenidos y generar la factura
while ($fila = $resultado->fetch_assoc()) {
    $nombre_producto = $fila['nombre_producto'];
    $cantidad = $fila['cantidad'];
    $precio = $fila['precio'];

    $pdf->MultiCell(30, 4, $nombre_producto, 0, 'L');
    $pdf->Cell(35, -5, $cantidad, 0, 0, 'R');
    $pdf->Cell(10, -5, number_format(round($precio, 2), 2, ',', ' ') . EURO, 0, 0, 'R');
    $pdf->Cell(15, -5, number_format(round($cantidad * $precio, 2), 2, ',', ' ') . EURO, 0, 0, 'R');
    $pdf->Ln(3);
}

// El resto del código sigue siendo el mismo.

// Cerrar la conexión a la base de datos
$conn->close();

// Mostrar la factura generada
$pdf->Output('factura.pdf', 'i');
?>