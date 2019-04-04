<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de tratamento de Tags, atributos, etc... para arquivos HTML.
 */
class Serv_Html {
    
    /**
     * Renderizar título
     * @param type $nome_pagina
     */
    public static function titulo($nome_pagina) {
        ?><title><?= Config::TITULO?> | <?=$nome_pagina?></title><?php
    }
    
    /**
     * Renderizar metatags
     */
    public static function metatags() {
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta name="description" content="<?= Config::DESCRICAO?>">
        <meta name="keywords" content="<?= Config::PALAVRAS_CHAVE?>">
        <meta name="author" content="<?= Config::AUTOR?>">
        <?php if(Config::RESPONSIVO) { ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php } ?>
        <?php
    }
    
}
