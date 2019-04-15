<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de manipulação de sessões de usuário.
 */
class Serv_Sessao {

    /**
     * Iniciar sessão
     */
    public static function iniciar() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Definir informação na sessão
     * @param type $chave
     * @param type $valor
     */
    public static function set($chave, $valor) {
        Serv_Sessao::iniciar();
        $_SESSION[$chave] = $valor;
    }

    /**
     * Obter informação da sessão
     * @param type $chave
     */
    public static function get($chave) {
        Serv_Sessao::iniciar();
        if (isset($_SESSION[$chave])) {
            return $_SESSION[$chave];
        }
        return null;
    }

    /**
     * Encerrar sessão
     */
    public static function encerrar() {
        Serv_Sessao::iniciar();
        $_SESSION = array();
        session_destroy();
    }
    
    /**
     * Definir sessão como ativa.
     */
    public static function set_sessao_ativa() {
        Serv_Sessao::set(Const_Sessao::CHAVE_SESSAO, true);
    }
    
    /**
     * Definir id de usuário da sessão
     */
    public static function set_id_usuario($id_usuario) {
        Serv_Sessao::set(Const_Sessao::CHAVE_ID_USUARIO, $id_usuario);
    }
    
    /**
     * Definir modulos que o usuário tem permissão.
     */
    public static function set_modulos(array $modulos) {
        Serv_Sessao::set(Const_Sessao::CHAVE_MODULOS, $modulos);
    }
    
    /**
     * Definir modulos que o usuário tem permissão.
     */
    public static function set_permissoes(array $permissoes) {
        Serv_Sessao::set(Const_Sessao::CHAVE_PERMISSOES, $permissoes);
    }
    
    /**
     * Definir licença do usuário.
     */
    public static function set_licenca($licenca) {
        Serv_Sessao::set(Const_Sessao::CHAVE_LICENCA, $licenca);
    }
    
    /**
     * Definir token do usuário.
     */
    public static function set_token($token) {
        Serv_Sessao::set(Const_Sessao::CHAVE_TOKEN, $token);
    }

}
