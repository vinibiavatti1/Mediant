<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/*
 * Carregar Dicionário
 */
Serv_Traducao::carregar_dicionario();

/**
 * Serviço de Tradução de aplicação. Para que a tradução seja configurada
 * dinâmicamente, o índice <b>idioma</b> deve estar inserido na sessão com o
 * valor referente ao idioma utilizado: "pt-br, en-us...".
 */
class Serv_Traducao {
    
    /**
     * Traduzir texto com base no idioma configurado
     * @param type $texto
     */
    public static function traduzir($texto) {
        if(!defined("DICIONARIO")) {
            return $texto;
        }
        if(!array_key_exists($texto, DICIONARIO)) {
            return $texto;
        }
        return DICIONARIO[$texto];
    }
    
    /**
     * Carregar dicionário
     */
    public static function carregar_dicionario() {
        $idioma = Serv_Sessao::get(Serv_Sessao::CHAVE_IDIOMA);
        @include_once(__DIR__ . "/../traducoes/" . ((isset($idioma) && $idioma != null) ? $idioma : Config::IDIOMA) . ".php");
    }
    
}

/**
 * Acesso global a <code>Serv_Traducao::traduzir</code>
 * @param type $texto
 * @return type
 */
function __($texto) {
    return Serv_Traducao::traduzir($texto);
}

