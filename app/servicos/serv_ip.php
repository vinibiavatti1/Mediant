<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de endereço de IP
 */
class Serv_Ip {
    
    /**
     * Obter IP do cliente
     * @return type
     */
    public static function get_ip() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } else if(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }
    
    /**
     * Obter dados do IP
     * @return type
     */
    public static function get_dados_ip($ip) {
        return json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
    }
    
}

