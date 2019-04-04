<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de manipulação de cabeçalho HTTP
 */
class Serv_Cabecalho {
    
    const CHARSET_UTF_8 = "utf-8";
    const CHARSET_ISO_8859_1 = "iso-8859-1";
    const CONTEUDO_JSON = "application/json";
    const CONTEUDO_JSONP = "application/javascript";
    const CONTEUDO_TEXTO = "text/html";
    
    /**
     * Atribuir valor ao cabeçalho
     * @param type $nome
     * @param type $valor
     */
    public static function set($nome, $valor) {
        header("$nome: $valor");
    }
    
    /**
     * Atributir tipo de conteúdo ao cabeçalho<br>
     * <code>Content-Type</code>
     * @param type $valor
     */
    public static function set_conteudo($conteudo, $charset) {
        header("Content-Type: $conteudo; charset=$charset");
    }
    
    /**
     * Definir conteúdo JSON para página
     * @param type $charset
     */
    public static function set_conteudo_json($charset = Serv_Cabecalho::CHARSET_UTF_8) {
        Serv_Cabecalho::set_conteudo(Serv_Cabecalho::CONTEUDO_JSON, $charset);
    }
}
