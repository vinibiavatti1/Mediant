<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de importação de módulos. Este serviço é utilizado para importar 
 * links externos CSS e JS nas páginas HTML.
 */
class Serv_Importacao {

    /**
     * Importar módulos css
     */
    public static function importar_modulos_css() {
        ?>
        <link href="<?= Serv_Url::incluir_url_base("/app/estilos/css_geral.css") ?>" rel="stylesheet" type="text/css"/>    
        <link href="<?= Serv_Url::incluir_url_base(Config::MATERIAL_DESIGN ? "/plugins/materialize-1.0.0/css/materialize.min.css" : "/plugins/bootstrap-4.3.1/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Config::MATERIAL_DESIGN ? "https://fonts.googleapis.com/icon?family=Material+Icons" : "https://use.fontawesome.com/releases/v5.6.0/css/all.css" ?>" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous" rel="stylesheet">
        <link href="<?= Serv_Url::incluir_url_base("/plugins/datatable-1.10.18/css/jquery.dataTables.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/select2-4.0.6/css/select2.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/fancybox-3.5.7/jquery.fancybox.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/toastr-2.1.4/toastr.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/dropify-0.2.2/css/dropify.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/charjs-2.8.0/Chart.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= Serv_Url::incluir_url_base("/plugins/jquery-loading-1.3.0/jquery.loading.min.css") ?>" rel="stylesheet" type="text/css"/>
        <?php
    }

    /**
     * Importar módulos js
     */
    public static function importar_modulos_js() {
        ?>
        <script src="<?=Serv_Url::incluir_url_base("/app/scripts/js_geral.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/jquery-3.3.1/jquery.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/datatable-1.10.18/js/jquery.dataTables.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/bootstrap-4.3.1/js/popper.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base(Config::MATERIAL_DESIGN ? "/plugins/materialize-1.0.0/js/materialize.min.js" : "/plugins/bootstrap-4.3.1/js/bootstrap.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/select2-4.0.6/js/select2.full.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/fancybox-3.5.7/jquery.fancybox.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/sweetalert-2.1.1/sweetalert.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/toastr-2.1.4/toastr.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/jquery-mask-1.14.15/jquery.mask.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/dropify-0.2.2/js/dropify.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/charjs-2.8.0/Chart.bundle.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/charjs-2.8.0/Chart.min.js")?>" type="text/javascript"></script>
        <script src="<?=Serv_Url::incluir_url_base("/plugins/jquery-loading-1.3.0/jquery.loading.min.js")?>" type="text/javascript"></script>
        <?php
    }
    
    /**
     * Importar todas os módulos PHP da aplicação. Serão importadas as classes
     * dos diretórios/arquivo:<br>
     * <ul>
     *  <li>/app/componentes</li>
     *  <li>/app/constantes</li>
     *  <li>/app/cruds</li>
     *  <li>/app/servicos</li>
     *  <li>/app/config.php</li>
     * </ul>
     */
    public static function importar_modulos_php() {
        Serv_Importacao::importar_modulos_php_diretorio(__DIR__ . "/../componentes");
        Serv_Importacao::importar_modulos_php_diretorio(__DIR__ . "/../constantes");
        Serv_Importacao::importar_modulos_php_diretorio(__DIR__ . "/../cruds");
        Serv_Importacao::importar_modulos_php_diretorio(__DIR__ . "/../servicos");
        require_once(__DIR__ . "/../../config.php");
    }
    
    /**
     * Importar conteudo PHP de diretório. Serão importados somente arquivos
     * que terminam com o sufixo <b>.php</b> e que não contenham o prefixo 
     * <b>ignorar_</b>
     * @param type $dir
     */
    public static function importar_modulos_php_diretorio($dir) {
        $arquivos = scandir($dir);
        foreach($arquivos as $arquivo) {
            if($arquivo == "." || $arquivo == "..") {
                continue;
            }
            if(substr($arquivo, -4) != ".php" || substr($arquivo, 0, 8) == "ignorar_") {
                continue;
            }
            require_once($dir . "/" . $arquivo);
        }
    }
}
