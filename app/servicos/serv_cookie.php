<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço para tratamento de cookies.
 */
class Serv_Cookie {
    
    /**
     * Obter valor do cookie caso existir.
     * @param type $nome
     * @param type $outro
     * @return type
     */
    public static function get_cookie($nome, $outro = null) {
        return isset($_COOKIE[$nome]) ? $_COOKIE[$nome] : $outro;
    }
    
    /**
     * Remover cookie.
     * @param type $nome
     */
    public static function remover_cookie($nome) {
        if (isset($_COOKIE[$nome])) {
            unset($_COOKIE[$nome]);
            setcookie($nome, null, -1, '/');
        }
    }
    
    /**
     * Definir valor para cookie.
     * @param type $email
     */
    public static function set_cookie($nome, $valor) {
        setcookie($nome, $valor);
    }
}