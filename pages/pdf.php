<?php
    require_once './classes/dompdf/autoload.inc.php';

    use Dompdf\Dompdf;


        $pdf = new Dompdf();

        ob_start();
        require 'relatorios.php';
        $pdf->loadHtml(ob_get_clean());

        $pdf->setPaper("A4");

        $pdf->render();

        $pdf->stream("file.pdf", ["Attachment" =>false]);
?>