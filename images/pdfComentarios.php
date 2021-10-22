<?php
  include 'plantilla.php';
  require 'config.php';

  $sql="SELECT userName, comentario FROM comentarios WHERE nombreProv='".$_GET['reg']."'";
  $result = $link->query($sql);
         /* if ($result->num_rows > 0) {
               // output data of each row
            

            }*/
    $pdf=new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(47,246,171);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30,6,'Cliente',1,0,'C',1);
    $pdf->Cell(70,6,'Comentario',1,1,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = $result->fetch_assoc()) {
          $pdf->Cell(30,6,$row['userName'],1,0,'C');
        $pdf->Cell(70,6,$row['comentario'],1,1,'C');
    }

    $pdf->Output();
?>