<?php

require('fpdf181/fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(0, 10, 'Bon de livraison');
$pdf->Output();
?>
