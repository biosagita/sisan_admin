<?
if (!defined('BASEPATH')) exit('No direct script access allowed');
function generate_pdf($object, $filename='', $direct_download=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    spl_autoload_register('DOMPDF_autoload');
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($object);
 $dompdf->set_paper("A4");
    $dompdf->render();

    if ($direct_download) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>
