<?php
	require 'fpdf/fpdf.php';

	$pdf = new FPDF('P', 'mm', 'A4'); //alineacion P vertical, L horizontal, tipo de medida pt puntos, mm milimtros cn centimetros in pulgadas, tamaño A3 A4 Letter legal // 'mm', 'A4' de esos dos se puede modificar como 'mm', array(100,50) y agrega varrias hojas
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);

	$pdf->SetX(50); //alinea la 1° linea 50, más los 10 de abajo son 60 SetY() mueve solo y, o con SetXY() los dos valores
	$pdf->Cell(100,10,'Hola Mundo',1,1,'C');
	$y=$pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->Cell(100,10,'Hola Mundo2',1,1,'C'); //100 px, 10 alto celda, texto, borde dentro celda 1 sí 0 no, salto linea 0 no 1 sí, alineacion l izquierda, c centrado, r derecha
	$pdf->Cell(100,10,'Hola Mundo3jn-lksmcaPDÑLm´w{skd,¨[,w
		¨[Ññ{ds,',1,1,'C');
	$pdf->MultiCell(100,5,'Hola Mundo3jn-lksmcaPDÑLm´w{skd,¨[,w
		¨[Ññ{ds,',1,'L',0); //5 es largo de la linea ultimo fondo 0 negro, 1 no
	$pdf->AddPage();

	$pdf->Output(); //D genera la descarga, F guarda en el disco 'F', 'reporte.pdf'
?>