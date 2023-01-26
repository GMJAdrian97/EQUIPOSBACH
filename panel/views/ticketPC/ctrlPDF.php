<?php
require_once('mdlPDF.php');
require_once('../../../vendor/autoload.php');

//use Dompdf\Dompdf;

//$sistema -> validarRol('Administrador');

$id_ticket = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket = isset($_GET['id_ticket']) ? $_GET['id_ticket'] : NULL;
        $accion = $_GET['accion'];
    }

switch($accion){

    case 'PDFticket':
        $pdfHTML = $ticketPDF -> ticket($id_ticket);
        
    break;


    default:
        $pdfHTML = 'nada';
    break;
    
}
use Dompdf\Dompdf;
$dompdf= new Dompdf();
$dompdf->load_html($pdfHTML);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>