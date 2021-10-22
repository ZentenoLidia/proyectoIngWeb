 <?php

      require './vendor/autoload.php';

      use Spipu\Html2Pdf\Html2Pdf;
      //Obtener contenido de otro fichero
      ob_start();
      require_once 'cc.php';
      $p=ob_get_clean();

      $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
      $html2pdf->writeHTML($p);
      $html2pdf->output('pdf_generated.pdf');

?>