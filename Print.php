<?php

    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once 'dompdf/autoload.inc.php';

    $options= new Options();
    //$dompdf = new DOMPDF($options);
    $dompdf = new Dompdf($options);

    $options -> set('defaultFont', 'Courier' );

    $html = file_get_contents('genCarte.php');
    
    //$dompdf->load_html_file('genCarte.html');
    $dompdf->loadHtml($html); 

    
    $dompdf->set_paper("a4", "portrait");
    // Render the HTML as PDF
    $dompdf->render();

    //$dompdf->setPaper('A4','landscape');

    $fichier = 'carte.pdf';

    $dompdf->stream($fichier);
?>