<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de tratamento de URL e redirecionamento. Este serviço considera URLs
 * sem a URL base de acesso, portanto os métodos tem função de adicionar a URL
 * base configurada no arquivo config.php para redirecionamento e afins.
 */
class Serv_Url {
    
    /**
     * Redirecionar para mesma URL sem parametros GET
     */
    public static function recarregar_sem_parametros() {
        header("location: " . Serv_Url::get_url_limpa());
        exit;
    }
    
    /**
     * Redirecionar para mesma URL com parametros GET
     * @param type $parametros_str
     */
    public static function recarregar_com_parametros($parametros_str) {
        header("location: " . Serv_Url::get_url_limpa() . "?" .$parametros_str);
        exit;
    }
    
    /**
     * Redirecionar para mesma URL com status
     * @param type $status
     */
    public static function recarregar_com_status($status) {
        header("location: " . Serv_Url::get_url_limpa() . "?status=" .$status);
        exit;
    }
    
    /**
     * Redirecionar para mesma URL
     * @param type $url
     */
    public static function recarregar() {
        header("location: " . Serv_Url::get_url());
        exit;
    }
    
    /**
     * Redirecionar para URL
     * @param type $url
     */
    public static function redirecionar($url) {
        $url_redirecionar = Serv_Url::incluir_url_base($url);
        header("location: $url_redirecionar");
        exit;
    }
    
    /**
     * Redirecionar para URL passando um status
     * @param type $url
     * @param type $status
     */
    public static function redirecionar_status($url, $status) {
        $url_redirecionar = Serv_Url::incluir_url_base($url);
        header("location: $url_redirecionar?status=$status");
        exit;
    }
    
    /**
     * Inclur url base na URL
     * @param type $url
     * @return type
     */
    public static function incluir_url_base($url) {
        return Config::URL_BASE . (substr($url, 0,1) == "/" ? $url : "/$url");
    }
    
    /**
     * Obter URL
     * @return type
     */
    public static function get_url() {
        $req = $_SERVER['REQUEST_URI'];
        $http = Serv_Url::is_https() ? "https://" : "http://";
        return $http . $_SERVER["HTTP_HOST"] . $req;
    }
    
    /**
     * Verificar se URL possui parâmetros GET
     * @return type
     */
    public static function url_possui_parametros() {
	return strpos(Serv_Url::get_url(), '?');
    }
    
    /**
     * Obter URL sem parâmetros GET
     * @return type
     */
    public static function get_url_limpa() {
        $req = explode('?', $_SERVER['REQUEST_URI'], 2);
        $http = Serv_Url::is_https() ? "https://" : "http://";
        return $http . $_SERVER["HTTP_HOST"] . $req[0];
    }
    
    /**
     * Verificar se é protocolo HTTPS
     * @return boolean
     */
    public static function is_https() {
        if(isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS'] == "on") {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Obter URL base de config.php
     * @return type
     */
    public static function get_url_base() {
        return Config::URL_BASE;
    }
    
}
