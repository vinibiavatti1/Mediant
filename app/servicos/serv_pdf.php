<?php
require_once(__DIR__ . "/../../plugins/dompdf-0.8.3/src/Autoloader.php");
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Dompdf\Autoloader::register();
Serv_Importacao::importar_modulos_php();

use Dompdf\Dompdf;

/**
 * Serviço de geração de documentos PDF. Este serviço utiliza o plugin
 * Dompdf.
 */
class Serv_Pdf {
    
    /**
     * Gerar PDF 
     * @param type $html
     * @param type $tipo_papel
     * @param type $orientacao
     */
    public static function gerar_pdf($html, $tipo_papel = "A4", $orientacao = "portrait") {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($tipo_papel, $orientacao);
        $dompdf->render();
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    }
    
}

