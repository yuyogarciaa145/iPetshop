<?php
require('./fpdf/fpdf.php');
require 'conexion.php';
$query = "SELECT * FROM carrito";
$result = $connection->query($query);
if (!$result) {
    echo("No se ha podido realizar la consulta!");
    exit();
    }
$nrows=$result-> num_rows;
$connection->close ();
$subtotal=0.0;
$total=0.0;
$cargos=.035;



$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('./img/log.jpg',75,0,60,60,'JPG');
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'Nombre',1,0,'C',0);
$pdf->Cell(15,10,'Cant',1,0,'C',0);
$pdf->Cell(25,10,'Precio',1,0,'C',0);
$pdf->Cell(35,10,'Subtotal',1,1,'C',0);

for ($i =0; $i <$nrows ; $i++) {
    $result->data_seek($i);
    $row = $result->fetch_assoc();
    $pdf->Cell(100,10, $row['nombre'], 1,0,'C',0);
    $pdf->Cell(15,10, $row['cantidad'], 1,0,'C',0);
    $pdf->Cell(25,10, $row['precio'], 1,0,'C',0);
    $pdf->Cell(35,10, $row['subtotal'], 1,1,'C',0);
    $subtotal = $row ['subtotal'];
    $total = $total + $subtotal;
    $total = $total + 66;
}
$pdf->Cell(140,10, 'Cargos:',1,0,'C',0);
$pdf->Cell(35,10, '$66',1,1,'C',0);
$pdf->Cell(140,10, 'TOTAL:',1,0,'C',0);
$pdf->Cell(35,10,$total,1,1,'C',0);
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'',0,1);
$pdf->Cell(100,10,'',0,1);

$pdf->Image('./img/cod.jpg',15,180,110,60,'JPG');
$pdf->Image('./img/qr.jpg',140,180,65,50,'JPG');
$pdf->Output();
?>